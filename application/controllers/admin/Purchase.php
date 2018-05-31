<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Purchase extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/purchase_model', 'purchase_model');
            $this->load->model('admin/bank_model', 'bank_model');
		}

		public function index(){
            $data['suplr'] =  $this->purchase_model->get_all_suppliers();
            $data['godown'] =  $this->purchase_model->get_all_godowns();
            $data['paymodes'] =  $this->purchase_model->get_all_paymodes();
            $data['all_banks'] =  $this->bank_model->get_all_banks();
			$data['view'] = 'admin/purchase/purchase_add';
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
            $data['paymodes'] =  $this->purchase_model->get_all_paymodes();
            $data['all_banks'] =  $this->bank_model->get_all_banks();
			if($this->input->post('submit')){

				$this->form_validation->set_rules('suplr_name', 'Supplier', 'trim|required');
				$this->form_validation->set_rules('datepicker', 'Date', 'trim|required');
				$this->form_validation->set_rules('godownid', 'Godown', 'trim|required');
				$this->form_validation->set_rules('description', 'Description', 'trim|required');

				$this->form_validation->set_rules('qty', 'Quantity', 'trim|required');
                $this->form_validation->set_rules('rate', 'Rate', 'trim|required');
                $this->form_validation->set_rules('amount', 'Amount', 'trim|required');


                $paymode=$this->input->post('paymentmode');
                if($paymode==2)
                {
                    $bankid=$this->input->post('bankid');

                }
                else{
                    $bankid="0" ;
                }
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

                        'pur_paymode' => $this->input->post('paymentmode'),
                        'pur_bankid' => $bankid,
                        'pur_payamount' => $this->input->post('amountrecieved'),
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
            $data['paymodes'] =  $this->purchase_model->get_all_paymodes();
            $data['all_banks'] =  $this->bank_model->get_all_banks();
			if($this->input->post('submit')){
                $this->form_validation->set_rules('suplr_name', 'Supplier', 'trim|required');
                $this->form_validation->set_rules('datepicker', 'Date', 'trim|required');
                $this->form_validation->set_rules('godownid', 'Godown', 'trim|required');
                $this->form_validation->set_rules('description', 'Description', 'trim|required');

                $this->form_validation->set_rules('qty', 'Quantity', 'trim|required');
                $this->form_validation->set_rules('rate', 'Rate', 'trim|required');
                $this->form_validation->set_rules('amount', 'Amount', 'trim|required');
                $paymode=$this->input->post('paymentmode');
                if($paymode==2)
                {
                    $bankid=$this->input->post('bankid');

                }
                else{
                    $bankid="0" ;
                }


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
                        'pur_paymode' => $this->input->post('paymentmode'),
                        'pur_bankid' => $bankid,
                        'pur_payamount' => $this->input->post('amountrecieved'),
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
			$this->db->delete('purchase', array('pur_id' => $id));
			$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
			redirect(base_url('admin/purchase/purchase_list'));
		}

	}


?>