<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Cashbank extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/cashbank_model', 'cashbank_model');
            $this->load->model('admin/customer_model', 'customer_model');
            $this->load->model('admin/supplier_model', 'supplier_model');
		}

		public function index(){
            $data['banklist'] =  $this->cashbank_model->get_all_bank();
            $data['all_customers'] =  $this->customer_model-> get_all_customers();
            $data['all_suppliers'] =  $this->supplier_model->get_all_suppliers();
			$data['view'] = 'admin/cashbank/cashbank_add';
			$this->load->view('admin/layout', $data);
		}
        public function cashbank_list(){
            $data['cashbanklist'] =  $this->cashbank_model->get_all_cashbank();
            $data['view'] = 'admin/cashbank/cashbank_list';
            $this->load->view('admin/layout', $data);
        }
		public function add(){
            $data['banklist'] =  $this->cashbank_model->get_all_bank();
			if($this->input->post('submit')){

				$this->form_validation->set_rules('bank_name', 'Cash/Bank', 'trim|required');
				$this->form_validation->set_rules('datepicker', 'Date', 'trim|required');
				$this->form_validation->set_rules('accname[]', 'Name', 'trim|required');
				$this->form_validation->set_rules('desc[]', 'Description', 'trim|required');

				$this->form_validation->set_rules('paymenttype[]', 'Payment Type', 'trim|required');
                $this->form_validation->set_rules('amount[]', 'Amount', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					$data['view'] = 'admin/cashbank/cashbank_add';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(

                        'cb_bank_id' => $this->input->post('bank_name'),
						'cb_date' =>date("Y-m-d", strtotime($this->input->post('datepicker'))),
						'cb_addeddate' => date('Y-m-d'),

					);
					$data2= array(

                        'accname' => $this->input->post('accname[]'),
                        'desc' => $this->input->post('desc[]'),
                        'paytype' => $this->input->post('paymenttype[]'),
                        'amount' => $this->input->post('amount[]'),

                    );
					$data = $this->security->xss_clean($data);
					$result = $this->cashbank_model->add_cashbank($data,$data2);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Added Successfully!');
						redirect(base_url('admin/cashbank/cashbank_list'));
					}
				}
			}
			else{

				$data['view'] = 'admin/bank/bank_add';
				$this->load->view('admin/layout', $data);
			}
			
		}

		public function edit($id = 0){
            $data['banklist'] =  $this->cashbank_model->get_all_bank();
            $data['all_customers'] =  $this->customer_model-> get_all_customers();
            $data['all_suppliers'] =  $this->supplier_model->get_all_suppliers();
			if($this->input->post('submit')){
                $this->form_validation->set_rules('suplr_name', 'Supplier', 'trim|required');
                $this->form_validation->set_rules('datepicker', 'Date', 'trim|required');
                $this->form_validation->set_rules('godownid', 'Godown', 'trim|required');
                $this->form_validation->set_rules('description', 'Description', 'trim|required');

                $this->form_validation->set_rules('qty', 'Quantity', 'trim|required');
                $this->form_validation->set_rules('rate', 'Rate', 'trim|required');
                $this->form_validation->set_rules('amount', 'Amount', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					$data['user'] = $this->cashbank_model->get_purchase_by_id($id);
					$data['view'] = 'admin/cashbank/cashbank_edit';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
                        'cb_suplr_id' => $this->input->post('suplr_name'),
                        'cb_date' => date("Y-m-d", strtotime($this->input->post('datepicker'))),
                        'cb_godownid' => $this->input->post('godownid'),
                        'cb_desc' => $this->input->post('description'),
                        'cb_qty' => $this->input->post('qty'),
                        'cb_rate' => $this->input->post('rate'),
                        'cb_amount' => $this->input->post('amount'),
                        'cb_updatedate' => date('Y-m-d'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->cashbank_model->edit_purchase($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
						redirect(base_url('admin/cashbank/cashbank_list'));
					}
				}
			}
			else{
				$data['user'] = $this->cashbank_model->get_cashbank_by_id($id);
                $data['cbtranslist'] = $this->cashbank_model->get_cashbanktrans_by_id($id);
               // print_r($data['user']);
                //print_r($data['cbtrans']);
             //   exit;
				$data['view'] = 'admin/cashbank/cashbank_edit';
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