<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Supplier extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/supplier_model', 'supplier_model');
		}

		public function index(){
			//$data['all_suppliers'] =  $this->supplier_model->get_all_suppliers();

            $data['all_suppliers'] =  $this->supplier_model->get_accurate_suplr();
            $data['view'] = 'admin/supplier/supplier_list';
			$this->load->view('admin/layout', $data);
		}
		
		public function add(){
            $data['suplr_group'] =  $this->supplier_model->get_all_custgroups();
			if($this->input->post('submit')){

				$this->form_validation->set_rules('firstname', 'Username', 'trim|required');
				$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
				$this->form_validation->set_rules('email', 'Email', 'trim|required');
				$this->form_validation->set_rules('mobile_no', 'Number', 'trim|required');

				$this->form_validation->set_rules('user_role', 'User Role', 'trim|required');
                $this->form_validation->set_rules('suplr_group', 'Customer Group', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					$data['view'] = 'admin/supplier/supplier_add';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(

                        'suplr_gp_id' => $this->input->post('suplr_group'),
						'suplr_name' => $this->input->post('firstname'),
						'suplr_address' => $this->input->post('lastname'),
						'suplr_email' => $this->input->post('email'),
						'suplr_mob' => $this->input->post('mobile_no'),
                        'suplr_opendebit' => $this->input->post('opendebit'),
                        'suplr_opencredit' => $this->input->post('opencredit'),
						'suplr_status' => $this->input->post('user_role'),
						'suplr_addeddate' => date('Y-m-d'),

					);
					$data = $this->security->xss_clean($data);
					$result = $this->supplier_model->add_user($data);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Added Successfully!');
						redirect(base_url('admin/supplier'));
					}
				}
			}
			else{

				$data['view'] = 'admin/supplier/supplier_add';
				$this->load->view('admin/layout', $data);
			}
			
		}

		public function edit($id = 0){
            $data['suplr_group'] =  $this->supplier_model->get_all_custgroups();
			if($this->input->post('submit')){
				$this->form_validation->set_rules('firstname', 'Username', 'trim|required');
				$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
				$this->form_validation->set_rules('email', 'Email', 'trim|required');
				$this->form_validation->set_rules('mobile_no', 'Number', 'trim|required');
				$this->form_validation->set_rules('user_role', 'User Role', 'trim|required');
                $this->form_validation->set_rules('suplr_group', 'Supplier Group', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					$data['user'] = $this->supplier_model->get_user_by_id($id);
					$data['view'] = 'admin/supplier/supplier_edit';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
                        'suplr_gp_id' => $this->input->post('suplr_group'),
						'suplr_name' => $this->input->post('firstname'),
						'suplr_address' => $this->input->post('lastname'),
						'suplr_email' => $this->input->post('email'),
						'suplr_mob' => $this->input->post('mobile_no'),
                        'suplr_opendebit' => $this->input->post('opendebit'),
                        'suplr_opencredit' => $this->input->post('opencredit'),
						'suplr_status' => $this->input->post('user_role'),
						'suplr_updatedat' => date('Y-m-d : h:m:s'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->supplier_model->edit_supplier($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
						redirect(base_url('admin/supplier'));
					}
				}
			}
			else{
				$data['user'] = $this->supplier_model->get_user_by_id($id);
				$data['view'] = 'admin/supplier/supplier_edit';
				$this->load->view('admin/layout', $data);
			}
		}

		public function del($id = 0){
			$this->db->delete('supplier', array('suplr_id' => $id));
			$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
			redirect(base_url('admin/supplier'));
		}

	}


?>