<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Stocktransfer extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/stocktransfer_model', 'stocktransfer_model');
		}

		public function index(){
            $data['godownlist'] =  $this->stocktransfer_model->get_all_godown();
			$data['view'] = 'admin/stocktransfer/stocktransfer_add';
			$this->load->view('admin/layout', $data);
		}
        public function stocktransfer_list(){
            $data['stocktransferlist'] =  $this->stocktransfer_model->get_all_stocktransfer();
            $data['view'] = 'admin/stocktransfer/stocktransfer_list';
            $this->load->view('admin/layout', $data);
        }
		public function add(){
            $data['godownlist'] =  $this->stocktransfer_model->get_all_godown();
			if($this->input->post('submit')){

				$this->form_validation->set_rules('transfer_from', 'Transfer From', 'trim|required');
                $this->form_validation->set_rules('transfer_to', 'Transfer To', 'trim|required');
				$this->form_validation->set_rules('datepicker', 'Date', 'trim|required');

				$this->form_validation->set_rules('description', 'Description', 'trim|required');

				$this->form_validation->set_rules('qty', 'Qty', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['view'] = 'admin/stocktransfer/stocktransfer_add';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(

                        'st_from' => $this->input->post('transfer_from'),
                        'st_to' => $this->input->post('transfer_to'),
                        'st_qty' => $this->input->post('qty'),
                        'st_desc' => $this->input->post('description'),
						'st_date' =>date("Y-m-d", strtotime($this->input->post('datepicker'))),
						'st_addeddate' => date('Y-m-d'),

					);

					$data = $this->security->xss_clean($data);
					$result = $this->stocktransfer_model->add_stocktransfer($data);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Added Successfully!');
						redirect(base_url('admin/stocktransfer/stocktransfer_list'));
					}
				}
			}
			else{

				$data['view'] = 'admin/bank/bank_add';
				$this->load->view('admin/layout', $data);
			}
			
		}

		public function edit($id = 0){
            $data['suplr'] =  $this->stocktransfer_model->get_all_suppliers();
            $data['godown'] =  $this->stocktransfer_model->get_all_godowns();
			if($this->input->post('submit')){
                $this->form_validation->set_rules('suplr_name', 'Supplier', 'trim|required');
                $this->form_validation->set_rules('datepicker', 'Date', 'trim|required');
                $this->form_validation->set_rules('godownid', 'Godown', 'trim|required');
                $this->form_validation->set_rules('description', 'Description', 'trim|required');

                $this->form_validation->set_rules('qty', 'Quantity', 'trim|required');
                $this->form_validation->set_rules('rate', 'Rate', 'trim|required');
                $this->form_validation->set_rules('amount', 'Amount', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					$data['user'] = $this->stocktransfer_model->get_purchase_by_id($id);
					$data['view'] = 'admin/stocktransfer/stocktransfer_edit';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
                        'cb_suplr_id' => $this->input->post('suplr_name'),
                        'cb_date' => date("Y-m-d", strtotime($this->input->post('datepicker'))),
                        'cb_godownid' => $this->input->post('godownid'),
                        'cb_desc' => $this->input->post('description'),
                        'cb_qty' => $this->input->post('qty'),
                        'cb_rate' => $this->input->post('rate'),
                        'cb_amount' => $this->input->post('amount'),
                        'cb_updatedate' => date('Y-m-d'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->stocktransfer_model->edit_purchase($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
						redirect(base_url('admin/stocktransfer/stocktransfer_list'));
					}
				}
			}
			else{
				$data['user'] = $this->stocktransfer_model->get_purchase_by_id($id);
				$data['view'] = 'admin/stocktransfer/stocktransfer_edit';
				$this->load->view('admin/layout', $data);
			}
		}

		public function del($id = 0){
			$this->db->delete('stock_transfer', array('st_id' => $id));
			$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
			redirect(base_url('admin/bank'));
		}

	}


?>