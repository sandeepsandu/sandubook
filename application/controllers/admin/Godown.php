<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Godown extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/godown_model', 'godown_model');
		}

		public function index(){
			$data['all_godowns'] =  $this->godown_model->get_all_godowns();
			$data['view'] = 'admin/godown/godown_list';
			$this->load->view('admin/layout', $data);
		}
		
		public function add(){

			if($this->input->post('submit')){

				$this->form_validation->set_rules('godownname', 'Username', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['view'] = 'admin/godown/godown_add';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(


						'godown_name' => $this->input->post('godownname'),



					);
					$data = $this->security->xss_clean($data);
					$result = $this->godown_model->add_godown($data);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Added Successfully!');
						redirect(base_url('admin/godown'));
					}
				}
			}
			else{

				$data['view'] = 'admin/godown/godown_add';
				$this->load->view('admin/layout', $data);
			}
			
		}

		public function edit($id = 0){

			if($this->input->post('submit')){
				$this->form_validation->set_rules('godownname', 'Godown', 'trim|required');
					if ($this->form_validation->run() == FALSE) {
					$data['user'] = $this->godown_model->get_godown_by_id($id);
					$data['view'] = 'admin/godown/godown_edit';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(

						'godown_name' => $this->input->post('godownname'),

					);
					$data = $this->security->xss_clean($data);
					$result = $this->godown_model->edit_godown($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
						redirect(base_url('admin/godown'));
					}
				}
			}
			else{
				$data['user'] = $this->godown_model->get_godown_by_id($id);
				$data['view'] = 'admin/godown/godown_edit';
				$this->load->view('admin/layout', $data);
			}
		}

		public function del($id = 0){
			$this->db->delete('godown', array('godown_id' => $id));
			$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
			redirect(base_url('admin/godown'));
		}

	}


?>