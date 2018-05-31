<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Ledger extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/ledger_model', 'ledger_model');
            $this->load->model('admin/sale_model', 'sale_model');
		}

		public function index(){
            $data['ledgergroups'] =  $this->ledger_model->get_all_ledgergroups();
			$data['view'] = 'admin/ledger/ledger_add';
			$this->load->view('admin/layout', $data);
		}
        public function ledger_list(){
            $data['ledgerlist'] =  $this->ledger_model->get_all_ledgers();
            $data['view'] = 'admin/ledger/ledger_list';
            $this->load->view('admin/layout', $data);
        }
		public function add(){
            $data['ledgergroups'] =  $this->ledger_model->get_all_ledgergroups();

			if($this->input->post('submit')){

				$this->form_validation->set_rules('ledgergpid', 'Ledger Group', 'trim|required');
				$this->form_validation->set_rules('datepicker', 'Date', 'trim|required');

				$this->form_validation->set_rules('description', 'Description', 'trim|required');



                $this->form_validation->set_rules('amount', 'Amount', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					$data['view'] = 'admin/ledger/ledger_add';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(

                        'led_gpid' => $this->input->post('ledgergpid'),
                        'led_date' => date("Y-m-d", strtotime($this->input->post('datepicker'))),
						'led_desc' => $this->input->post('description'),
                        'led_amount' => $this->input->post('amount'),
                        'led_paymode' => $this->input->post('paymentmode'),
						'led_addeddate' => date('Y-m-d'),

					);
					$data = $this->security->xss_clean($data);
					$result = $this->ledger_model->add_ledger($data);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Added Successfully!');
						redirect(base_url('admin/ledger/ledger_list'));
					}
				}
			}
			else{

				$data['view'] = 'admin/ledger/ledger_add';
				$this->load->view('admin/layout', $data);
			}
			
		}

		public function edit($id = 0){
            $data['ledgergroups'] =  $this->ledger_model->get_all_ledgergroups();
			if($this->input->post('submit')){

                $this->form_validation->set_rules('ledgergpid', 'Ledger Group', 'trim|required');
                $this->form_validation->set_rules('datepicker', 'Date', 'trim|required');

                $this->form_validation->set_rules('description', 'Description', 'trim|required');



                $this->form_validation->set_rules('amount', 'Amount', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					$data['user'] = $this->ledger_model->get_ledger_by_id($id);
					$data['view'] = 'admin/ledger/ledger_edit';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
                        'led_gpid' => $this->input->post('ledgergpid'),
                        'led_date' =>date("Y-m-d", strtotime($this->input->post('datepicker'))),
                        'led_desc' => $this->input->post('description'),
                        'led_amount' => $this->input->post('amount'),
                        'led_paymode' => $this->input->post('paymentmode'),
                        'led_addeddate' => date('Y-m-d'),

                    );
					$data = $this->security->xss_clean($data);
					$result = $this->ledger_model->edit_ledger($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
						redirect(base_url('admin/ledger/ledger_list'));
					}
				}
			}
			else{
				$data['user'] = $this->ledger_model->get_ledger_by_id($id);
				$data['view'] = 'admin/ledger/ledger_edit';
				$this->load->view('admin/layout', $data);
			}
		}

		public function del($id = 0){
			$this->db->delete('ledger', array('led_id' => $id));
			$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
			redirect(base_url('admin/ledger/ledger_list'));
		}

	}


?>