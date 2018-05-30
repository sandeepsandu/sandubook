<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Outstandingsuplr extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/purchase_model', 'purchase_model');
            $this->load->model('admin/sale_model', 'sale_model');
		}

		public function index(){
            $data['suplr'] =  $this->purchase_model->get_all_suppliers();
            $data['godown'] =  $this->purchase_model->get_all_godowns();

            if($this->input->post('submit')) {

                $this->form_validation->set_rules('datefrom', 'From Date', 'trim|required');
                $this->form_validation->set_rules('dateto', 'To Date', 'trim|required');
//                if ($this->form_validation->run() == FALSE) {
//                    $data['view'] = 'admin/report/purchase_list';
//                    $this->load->view('admin/layout', $data);
//                }
                $fromdate=date("Y-m-d", strtotime($this->input->post('datefrom')));
                $todate=date("Y-m-d", strtotime($this->input->post('dateto')));
                //default selected date
                $data['datefrom']=$this->input->post('datefrom');
                $data['dateto']=$this->input->post('dateto');
                $data['suplrid'] = $this->input->post('suplr_name');


                $suplr = $this->input->post('suplr_name');
                $data['purch'] =  $this->purchase_model->get_search_outstandingsuplr($fromdate,$todate,$suplr);
            }
            else
            {
                $data['datefrom']="";
                $data['dateto']="";
                $data['suplrid'] = 0;
               // $data['datefrom']=date('Y-m/d/Y');
               // $data['dateto']=date('m/d/Y ');
                $data['purch'] =  $this->purchase_model->get_all_outstandingsuplr();
            }
			$data['view'] = 'admin/report/outstandingsuplr_list';
			$this->load->view('admin/layout', $data);
		}
        public function purchase_list(){
            $data['purch'] =  $this->purchase_model->get_all_purchase();
            $data['view'] = 'admin/purchase/purchase_list';
            $this->load->view('admin/layout', $data);
        }
		public function add(){
            $data['suplr'] =  $this->purchase_model->get_all_suppliers();
            $data['godown'] =  $this->purchase_model->get_all_godowns();
			if($this->input->post('submit')){

				$this->form_validation->set_rules('suplr_name', 'Supplier', 'trim|required');
				$this->form_validation->set_rules('datepicker', 'Date', 'trim|required');
				$this->form_validation->set_rules('godownid', 'Godown', 'trim|required');
				$this->form_validation->set_rules('description', 'Description', 'trim|required');

				$this->form_validation->set_rules('qty', 'Quantity', 'trim|required');
                $this->form_validation->set_rules('rate', 'Rate', 'trim|required');
                $this->form_validation->set_rules('amount', 'Amount', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					$data['view'] = 'admin/purchase/purchase_add';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(

                        'pur_suplr_id' => $this->input->post('suplr_name'),
						'pur_date' => date("Y-m-d", strtotime($this->input->post('datepicker'))),
						'pur_godownid' => $this->input->post('godownid'),
						'pur_desc' => $this->input->post('description'),
						'pur_qty' => $this->input->post('qty'),
                        'pur_rate' => $this->input->post('rate'),
                        'pur_amount' => $this->input->post('amount'),
						'pur_addeddate' => date('Y-m-d'),

					);
					$data = $this->security->xss_clean($data);
					$result = $this->purchase_model->add_purchase($data);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Added Successfully!');
						redirect(base_url('admin/purchase/purchase_list'));
					}
				}
			}
			else{

				$data['view'] = 'admin/bank/bank_add';
				$this->load->view('admin/layout', $data);
			}
			
		}

		public function edit($id = 0){
            $data['suplr'] =  $this->purchase_model->get_all_suppliers();
            $data['godown'] =  $this->purchase_model->get_all_godowns();
			if($this->input->post('submit')){
                $this->form_validation->set_rules('suplr_name', 'Supplier', 'trim|required');
                $this->form_validation->set_rules('datepicker', 'Date', 'trim|required');
                $this->form_validation->set_rules('godownid', 'Godown', 'trim|required');
                $this->form_validation->set_rules('description', 'Description', 'trim|required');

                $this->form_validation->set_rules('qty', 'Quantity', 'trim|required');
                $this->form_validation->set_rules('rate', 'Rate', 'trim|required');
                $this->form_validation->set_rules('amount', 'Amount', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					$data['user'] = $this->purchase_model->get_purchase_by_id($id);
					$data['view'] = 'admin/purchase/purchase_edit';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
                        'pur_suplr_id' => $this->input->post('suplr_name'),
                        'pur_date' => date("Y-m-d", strtotime($this->input->post('datepicker'))),
                        'pur_godownid' => $this->input->post('godownid'),
                        'pur_desc' => $this->input->post('description'),
                        'pur_qty' => $this->input->post('qty'),
                        'pur_rate' => $this->input->post('rate'),
                        'pur_amount' => $this->input->post('amount'),
                        'pur_updatedate' => date('Y-m-d'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->purchase_model->edit_purchase($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
						redirect(base_url('admin/purchase/purchase_list'));
					}
				}
			}
			else{
				$data['user'] = $this->purchase_model->get_purchase_by_id($id);
				$data['view'] = 'admin/purchase/purchase_edit';
				$this->load->view('admin/layout', $data);
			}
		}

		public function del($id = 0){
			$this->db->delete('bank', array('bank_id' => $id));
			$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
			redirect(base_url('admin/bank'));
		}

	}


?>