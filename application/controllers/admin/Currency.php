<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Currency extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/bank_model', 'bank_model');
		}

		public function index(){
            $data['view'] = 'admin/adminlte/ui/framecurrency';
            $this->load->view('admin/layout', $data);
		}
		


	}


?>