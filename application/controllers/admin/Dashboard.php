<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Dashboard extends MY_Controller {
		public function __construct(){
			parent::__construct();
            $this->load->model('admin/dashboard_model', 'dashboard_model');
		}

		public function index(){

            $data['cust_count'] =  $this->dashboard_model->get_all_customers();
            $data['suplr_count'] =  $this->dashboard_model->get_all_banks();
            $data['bank_count'] =  $this->dashboard_model->get_all_suppliers();
            $data['user_count'] =  $this->dashboard_model->get_all_users();
            $data['pur_count'] =  $this->dashboard_model->get_all_purchases();
            $data['godown_count'] =  $this->dashboard_model->get_all_godowns();
            $data['sale_count'] =  $this->dashboard_model->get_all_sales();
			$data['view'] = 'admin/dashboard/index';
			$this->load->view('admin/layout', $data);
		}

		public function index2(){
			$data['view'] = 'admin/dashboard/index2';
			$this->load->view('admin/layout', $data);
		}
	}

?>	