<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Customers extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/customer_model', 'customer_model');
		}

		public function index(){
			$data['all_customers'] =  $this->customer_model-> get_accurate_cust();
			$data['view'] = 'admin/customer/customer_list';
			$this->load->view('admin/layout', $data);
		}
		
		public function add(){
            $data['cust_group'] =  $this->customer_model->get_all_custgroups();
			if($this->input->post('submit')){

				$this->form_validation->set_rules('firstname', 'Username', 'trim|required');
				$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
				$this->form_validation->set_rules('email', 'Email', 'trim|required');
				$this->form_validation->set_rules('mobile_no', 'Number', 'trim|required');

				$this->form_validation->set_rules('user_role', 'User Role', 'trim|required');
                $this->form_validation->set_rules('cust_group', 'Customer Group', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					$data['view'] = 'admin/customer/customer_add';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(

                        'cust_gp_id' => $this->input->post('cust_group'),
						'cust_name' => $this->input->post('firstname'),
						'cust_address' => $this->input->post('lastname'),
						'cust_email' => $this->input->post('email'),
						'cust_mob' => $this->input->post('mobile_no'),
                        'cust_opendebit' => $this->input->post('opendebit'),
                        'cust_opencredit' => $this->input->post('opencredit'),
						'cust_status' => $this->input->post('user_role'),
						'cust_addeddate' => date('Y-m-d'),

					);
					$data = $this->security->xss_clean($data);
					$result = $this->customer_model->add_user($data);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Added Successfully!');
						redirect(base_url('admin/customers'));
					}
				}
			}
			else{

				$data['view'] = 'admin/customer/customer_add';
				$this->load->view('admin/layout', $data);
			}
			
		}

		public function edit($id = 0){
            $data['cust_group'] =  $this->customer_model->get_all_custgroups();
			if($this->input->post('submit')){
				$this->form_validation->set_rules('firstname', 'Username', 'trim|required');
				$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
				$this->form_validation->set_rules('email', 'Email', 'trim|required');
				$this->form_validation->set_rules('mobile_no', 'Number', 'trim|required');
				$this->form_validation->set_rules('user_role', 'User Role', 'trim|required');
                $this->form_validation->set_rules('cust_group', 'Customer Group', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					$data['user'] = $this->customer_model->get_user_by_id($id);
					$data['view'] = 'admin/customer/customer_edit';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
                        'cust_gp_id' => $this->input->post('cust_group'),
						'cust_name' => $this->input->post('firstname').' '.$this->input->post('lastname'),
						'cust_name' => $this->input->post('firstname'),
						'cust_address' => $this->input->post('lastname'),
						'cust_email' => $this->input->post('email'),
						'cust_mob' => $this->input->post('mobile_no'),
                        'cust_opendebit' => $this->input->post('opendebit'),
                        'cust_opencredit' => $this->input->post('opencredit'),
						'cust_status' => $this->input->post('user_role'),
						'cust_updatedat' => date('Y-m-d : h:m:s'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->customer_model->edit_customer($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
						redirect(base_url('admin/customers'));
					}
				}
			}
			else{
				$data['user'] = $this->customer_model->get_user_by_id($id);
				$data['view'] = 'admin/customer/customer_edit';
				$this->load->view('admin/layout', $data);
			}
		}

		public function del($id = 0){
			$this->db->delete('customer', array('cust_id' => $id));
			$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
			redirect(base_url('admin/customers'));
		}

	}


?>