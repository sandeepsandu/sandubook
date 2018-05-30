<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Suplrgroup extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/suplrgroup_model', 'suplrgroup_model');
		}

		public function index(){
			$data['all_suplrgroups'] =  $this->suplrgroup_model->get_all_suplrgroups();
			$data['view'] = 'admin/suplrgroup/suplrgroup_list';
			$this->load->view('admin/layout', $data);
		}
		
		public function add(){

			if($this->input->post('submit')){

				$this->form_validation->set_rules('suplrgroupname', 'Username', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['view'] = 'admin/suplrgroup/suplrgroup_add';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(


						'suplr_groupname' => $this->input->post('suplrgroupname'),



					);
					$data = $this->security->xss_clean($data);
					$result = $this->suplrgroup_model->add_suplrgroup($data);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Added Successfully!');
						redirect(base_url('admin/suplrgroup'));
					}
				}
			}
			else{

				$data['view'] = 'admin/suplrgroup/suplrgroup_add';
				$this->load->view('admin/layout', $data);
			}
			
		}

		public function edit($id = 0){

			if($this->input->post('submit')){
				$this->form_validation->set_rules('suplrgroupname', 'suplrgroup', 'trim|required');
					if ($this->form_validation->run() == FALSE) {
					$data['user'] = $this->suplrgroup_model->get_suplrgroup_by_id($id);
					$data['view'] = 'admin/suplrgroup/suplrgroup_edit';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(

						'suplr_groupname' => $this->input->post('suplrgroupname'),

					);
					$data = $this->security->xss_clean($data);
					$result = $this->suplrgroup_model->edit_suplrgroup($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
						redirect(base_url('admin/suplrgroup'));
					}
				}
			}
			else{
				$data['user'] = $this->suplrgroup_model->get_suplrgroup_by_id($id);
				$data['view'] = 'admin/suplrgroup/suplrgroup_edit';
				$this->load->view('admin/layout', $data);
			}
		}

		public function del($id = 0){
			$this->db->delete('supplier_group', array('suplr_groupid' => $id));
			$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
			redirect(base_url('admin/suplrgroup'));
		}

	}


?>