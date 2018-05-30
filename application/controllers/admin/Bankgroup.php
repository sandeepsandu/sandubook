<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Bankgroup extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/bankgroup_model', 'bankgroup_model');
		}

		public function index(){
			$data['all_bankgroups'] =  $this->bankgroup_model->get_all_bankgroups();
			$data['view'] = 'admin/bankgroup/bankgroup_list';
			$this->load->view('admin/layout', $data);
		}
		
		public function add(){

			if($this->input->post('submit')){

				$this->form_validation->set_rules('bankgroupname', 'Username', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['view'] = 'admin/bankgroup/bankgroup_add';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(


						'bank_groupname' => $this->input->post('bankgroupname'),



					);
					$data = $this->security->xss_clean($data);
					$result = $this->bankgroup_model->add_bankgroup($data);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Added Successfully!');
						redirect(base_url('admin/bankgroup'));
					}
				}
			}
			else{

				$data['view'] = 'admin/bankgroup/bankgroup_add';
				$this->load->view('admin/layout', $data);
			}
			
		}

		public function edit($id = 0){

			if($this->input->post('submit')){
				$this->form_validation->set_rules('bankgroupname', 'bankgroup', 'trim|required');
					if ($this->form_validation->run() == FALSE) {
					$data['user'] = $this->bankgroup_model->get_bankgroup_by_id($id);
					$data['view'] = 'admin/bankgroup/bankgroup_edit';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(

						'bank_groupname' => $this->input->post('bankgroupname'),

					);
					$data = $this->security->xss_clean($data);
					$result = $this->bankgroup_model->edit_bankgroup($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
						redirect(base_url('admin/bankgroup'));
					}
				}
			}
			else{
				$data['user'] = $this->bankgroup_model->get_bankgroup_by_id($id);
				$data['view'] = 'admin/bankgroup/bankgroup_edit';
				$this->load->view('admin/layout', $data);
			}
		}

		public function del($id = 0){
			$this->db->delete('bank_group', array('bank_groupid' => $id));
			$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
			redirect(base_url('admin/bankgroup'));
		}

	}


?>