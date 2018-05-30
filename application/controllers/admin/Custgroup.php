<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Custgroup extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/custgroup_model', 'custgroup_model');
		}

		public function index(){
			$data['all_custgroups'] =  $this->custgroup_model->get_all_custgroups();
			$data['view'] = 'admin/custgroup/custgroup_list';
			$this->load->view('admin/layout', $data);
		}
		
		public function add(){

			if($this->input->post('submit')){

				$this->form_validation->set_rules('custgroupname', 'Username', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['view'] = 'admin/custgroup/custgroup_add';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(


						'cust_groupname' => $this->input->post('custgroupname'),



					);
					$data = $this->security->xss_clean($data);
					$result = $this->custgroup_model->add_custgroup($data);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Added Successfully!');
						redirect(base_url('admin/custgroup'));
					}
				}
			}
			else{

				$data['view'] = 'admin/custgroup/custgroup_add';
				$this->load->view('admin/layout', $data);
			}
			
		}

		public function edit($id = 0){

			if($this->input->post('submit')){
				$this->form_validation->set_rules('custgroupname', 'custgroup', 'trim|required');
					if ($this->form_validation->run() == FALSE) {
					$data['user'] = $this->custgroup_model->get_custgroup_by_id($id);
					$data['view'] = 'admin/custgroup/custgroup_edit';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(

						'cust_groupname' => $this->input->post('custgroupname'),

					);
					$data = $this->security->xss_clean($data);
					$result = $this->custgroup_model->edit_custgroup($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
						redirect(base_url('admin/custgroup'));
					}
				}
			}
			else{
				$data['user'] = $this->custgroup_model->get_custgroup_by_id($id);
				$data['view'] = 'admin/custgroup/custgroup_edit';
				$this->load->view('admin/layout', $data);
			}
		}

		public function del($id = 0){
			$this->db->delete('customer_group', array('cust_groupid' => $id));
			$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
			redirect(base_url('admin/custgroup'));
		}

	}


?>