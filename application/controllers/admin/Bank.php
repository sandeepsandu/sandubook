<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Bank extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/bank_model', 'bank_model');
		}

		public function index(){
			$data['all_banks'] =  $this->bank_model->get_all_banks();
			$data['view'] = 'admin/bank/bank_list';
			$this->load->view('admin/layout', $data);
		}
		
		public function add(){
            $data['bank_group'] =  $this->bank_model->get_all_bankgroups();
			if($this->input->post('submit')){

				$this->form_validation->set_rules('firstname', 'Username', 'trim|required');
				$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
				$this->form_validation->set_rules('email', 'Email', 'trim|required');
				$this->form_validation->set_rules('mobile_no', 'Number', 'trim|required');

				$this->form_validation->set_rules('user_role', 'User Role', 'trim|required');
                $this->form_validation->set_rules('bank_group', 'Customer Group', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					$data['view'] = 'admin/bank/bank_add';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(

                        'bank_gp_id' => $this->input->post('bank_group'),
						'bank_name' => $this->input->post('firstname'),
						'bank_address' => $this->input->post('lastname'),
						'bank_email' => $this->input->post('email'),
						'bank_mob' => $this->input->post('mobile_no'),
                        'bank_opendebit' => $this->input->post('opendebit'),
                        'bank_opencredit' => $this->input->post('opencredit'),
						'bank_status' => $this->input->post('user_role'),
						'bank_addeddate' => date('Y-m-d'),

					);
					$data = $this->security->xss_clean($data);
					$result = $this->bank_model->add_bank($data);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Added Successfully!');
						redirect(base_url('admin/bank'));
					}
				}
			}
			else{

				$data['view'] = 'admin/bank/bank_add';
				$this->load->view('admin/layout', $data);
			}
			
		}

		public function edit($id = 0){
            $data['bank_group'] =  $this->bank_model->get_all_bankgroups();
			if($this->input->post('submit')){
				$this->form_validation->set_rules('firstname', 'Username', 'trim|required');
				$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
				$this->form_validation->set_rules('email', 'Email', 'trim|required');
				$this->form_validation->set_rules('mobile_no', 'Number', 'trim|required');
				$this->form_validation->set_rules('user_role', 'User Role', 'trim|required');
                $this->form_validation->set_rules('bank_group', 'Supplier Group', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					$data['user'] = $this->bank_model->get_bank_by_id($id);
					$data['view'] = 'admin/bank/bank_edit';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
                        'bank_gp_id' => $this->input->post('bank_group'),
						'bank_name' => $this->input->post('firstname'),
						'bank_address' => $this->input->post('lastname'),
						'bank_email' => $this->input->post('email'),
						'bank_mob' => $this->input->post('mobile_no'),
                        'bank_opendebit' => $this->input->post('opendebit'),
                        'bank_opencredit' => $this->input->post('opencredit'),
						'bank_status' => $this->input->post('user_role'),
						'bank_updatedat' => date('Y-m-d : h:m:s'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->bank_model->edit_bank($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
						redirect(base_url('admin/bank'));
					}
				}
			}
			else{
				$data['user'] = $this->bank_model->get_bank_by_id($id);
				$data['view'] = 'admin/bank/bank_edit';
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