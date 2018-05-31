<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Sale extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/sale_model', 'sale_model');
            $this->load->model('admin/bank_model', 'bank_model');
		}

		public function index(){
            $data['customer'] =  $this->sale_model->get_all_customers();
            $data['godown'] =  $this->sale_model->get_all_godowns();
            $data['paymodes'] =  $this->sale_model->get_all_paymodes();
            $data['all_banks'] =  $this->bank_model->get_all_banks();
			$data['view'] = 'admin/sale/sale_add';
			$this->load->view('admin/layout', $data);
		}
        public function sale_list(){
            $data['salelist'] =  $this->sale_model->get_all_sale();
            $data['view'] = 'admin/sale/sale_list';
            $this->load->view('admin/layout', $data);
        }
		public function add(){
            $data['customer'] =  $this->sale_model->get_all_customers();
            $data['godown'] =  $this->sale_model->get_all_godowns();
            $data['paymodes'] =  $this->sale_model->get_all_paymodes();
            $data['all_banks'] =  $this->bank_model->get_all_banks();
			if($this->input->post('submit')){

				$this->form_validation->set_rules('cust_name', 'Customer', 'trim|required');
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
					$data['view'] = 'admin/sale/sale_add';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(

                        'sale_cust_id' => $this->input->post('cust_name'),
                        'sale_date' => date("Y-m-d", strtotime($this->input->post('datepicker'))),
						'sale_godownid' => $this->input->post('godownid'),
						'sale_desc' => $this->input->post('description'),
						'sale_qty' => $this->input->post('qty'),
                        'sale_rate' => $this->input->post('rate'),
                        'sale_amount' => $this->input->post('amount'),
                        'sale_paymode' => $this->input->post('paymentmode'),
                        'sale_bankid' => $bankid,
                        'sale_recievedamount' => $this->input->post('amountpaid'),
						'sale_addeddate' => date('Y-m-d'),

					);
					$data = $this->security->xss_clean($data);
					$result = $this->sale_model->add_sale($data);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Added Successfully!');
						redirect(base_url('admin/sale/sale_list'));
					}
				}
			}
			else{

				$data['view'] = 'admin/sale/sale_add';
				$this->load->view('admin/layout', $data);
			}
			
		}

		public function edit($id = 0){
            $data['customer'] =  $this->sale_model->get_all_customers();
            $data['godown'] =  $this->sale_model->get_all_godowns();
            $data['paymodes'] =  $this->sale_model->get_all_paymodes();
            $data['all_banks'] =  $this->bank_model->get_all_banks();
			if($this->input->post('submit')){
                $this->form_validation->set_rules('cust_name', 'Customer', 'trim|required');
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
					$data['user'] = $this->sale_model->get_sale_by_id($id);
					$data['view'] = 'admin/sale/sale_edit';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
                        'sale_cust_id' => $this->input->post('cust_name'),
                        'sale_date' => date("Y-m-d", strtotime($this->input->post('datepicker'))),
                        'sale_godownid' => $this->input->post('godownid'),
                        'sale_desc' => $this->input->post('description'),
                        'sale_qty' => $this->input->post('qty'),
                        'sale_rate' => $this->input->post('rate'),
                        'sale_amount' => $this->input->post('amount'),
                        'sale_paymode' => $this->input->post('paymentmode'),
                        'sale_bankid' => $bankid,
                        'sale_recievedamount' => $this->input->post('amountpaid'),
                        'sale_updatedate' => date('Y-m-d'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->sale_model->edit_sale($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
						redirect(base_url('admin/sale/sale_list'));
					}
				}
			}
			else{
				$data['user'] = $this->sale_model->get_sale_by_id($id);
				$data['view'] = 'admin/sale/sale_edit';
				$this->load->view('admin/layout', $data);
			}
		}

		public function del($id = 0){
			$this->db->delete('sale', array('sale_id' => $id));
			$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
			redirect(base_url('admin/sale/sale_list'));
		}

	}


?>