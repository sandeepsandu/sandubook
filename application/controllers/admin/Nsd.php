<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Nsd extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/nsd_model', 'nsd_model');
		}

		public function index(){
            $data['customer'] =  $this->nsd_model->get_all_customers();
            $data['supplier'] =  $this->nsd_model->get_all_suppliers();
            $data['godown'] =  $this->nsd_model->get_all_godowns();
			$data['view'] = 'admin/nsd/nsd_add';
			$this->load->view('admin/layout', $data);
		}
        public function nsd_list(){
            $data['salelist'] =  $this->nsd_model->get_all_nsd();
            $data['view'] = 'admin/nsd/nsd_list';
            $this->load->view('admin/layout', $data);
        }
		public function add(){
            $data['customer'] =  $this->nsd_model->get_all_customers();
            $data['supplier'] =  $this->nsd_model->get_all_suppliers();
            $data['godown'] =  $this->nsd_model->get_all_godowns();
			if($this->input->post('submit')){

				$this->form_validation->set_rules('cust_name', 'Customer', 'trim|required');
                $this->form_validation->set_rules('suplr_name', 'Supplier', 'trim|required');
				$this->form_validation->set_rules('datepicker', 'Date', 'trim|required');
				$this->form_validation->set_rules('description', 'Description', 'trim|required');

				$this->form_validation->set_rules('qty', 'Quantity', 'trim|required');
                $this->form_validation->set_rules('purrate', 'Purchase Rate', 'trim|required');
                $this->form_validation->set_rules('puramount', 'Purchase Amount', 'trim|required');
                $this->form_validation->set_rules('salerate', 'Sale Rate', 'trim|required');
                $this->form_validation->set_rules('saleamount', 'Sale Amount', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					$data['view'] = 'admin/nsd/nsd_add';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(

                        'nsd_cust_id' => $this->input->post('cust_name'),
                        'nsd_suplr_id' => $this->input->post('suplr_name'),
						'nsd_date' => date("Y-m-d", strtotime($this->input->post('datepicker'))),
						'nsd_desc' => $this->input->post('description'),
						'nsd_qty' => $this->input->post('qty'),
                        'nsd_purrate' => $this->input->post('purrate'),
                        'nsd_puramount' => $this->input->post('puramount'),
                        'nsd_salerate' => $this->input->post('salerate'),
                        'nsd_saleamount' => $this->input->post('saleamount'),
						'nsd_addeddate' => date('Y-m-d'),

					);
					$data = $this->security->xss_clean($data);
					$result = $this->nsd_model->add_nsd($data);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Added Successfully!');
						redirect(base_url('admin/nsd/nsd_list'));
					}
				}
			}
			else{

				$data['view'] = 'admin/nsd/nsd_add';
				$this->load->view('admin/layout', $data);
			}
			
		}

		public function edit($id = 0){
            $data['customer'] =  $this->nsd_model->get_all_customers();
            $data['supplier'] =  $this->nsd_model->get_all_suppliers();
            $data['godown'] =  $this->nsd_model->get_all_godowns();
			if($this->input->post('submit')){
                $this->form_validation->set_rules('cust_name', 'Customer', 'trim|required');
                $this->form_validation->set_rules('suplr_name', 'Supplier', 'trim|required');
                $this->form_validation->set_rules('datepicker', 'Date', 'trim|required');
                $this->form_validation->set_rules('description', 'Description', 'trim|required');

                $this->form_validation->set_rules('qty', 'Quantity', 'trim|required');
                $this->form_validation->set_rules('purrate', 'Purchase Rate', 'trim|required');
                $this->form_validation->set_rules('puramount', 'Purchase Amount', 'trim|required');
                $this->form_validation->set_rules('salerate', 'Sale Rate', 'trim|required');
                $this->form_validation->set_rules('saleamount', 'Sale Amount', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					$data['user'] = $this->nsd_model->get_nsd_by_id($id);
					$data['view'] = 'admin/nsd/nsd_edit';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
                        'nsd_cust_id' => $this->input->post('cust_name'),
                        'nsd_suplr_id' => $this->input->post('suplr_name'),
                        'nsd_date' =>date("Y-m-d", strtotime($this->input->post('datepicker'))),
                        'nsd_desc' => $this->input->post('description'),
                        'nsd_qty' => $this->input->post('qty'),
                        'nsd_purrate' => $this->input->post('purrate'),
                        'nsd_puramount' => $this->input->post('puramount'),
                        'nsd_salerate' => $this->input->post('salerate'),
                        'nsd_saleamount' => $this->input->post('saleamount'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->nsd_model->edit_nsd($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
						redirect(base_url('admin/nsd/nsd_list'));
					}
				}
			}
			else{
				$data['user'] = $this->nsd_model->get_nsd_by_id($id);
				$data['view'] = 'admin/nsd/nsd_edit';
				$this->load->view('admin/layout', $data);
			}
		}

		public function del($id = 0){
			$this->db->delete('nsd', array('nsd_id' => $id));
			$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
			redirect(base_url('admin/nsd/nsd_list'));
		}

	}


?>