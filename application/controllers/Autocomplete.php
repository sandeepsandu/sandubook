<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autocomplete extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('admin/customer_model', 'customer_model');
        $this->load->model('admin/supplier_model', 'supplier_model');
    }

    public function supplier()
    {
        $keyword=$this->input->post('suppliername');
        $data['response'] = 'false'; //Set default response
        $query=$this->supplier_model->GetRow($keyword);
        if( ! empty($query) )
        {
            $data['response'] = 'true'; //Set response
            $data['message'] = array(); //Create array
            foreach($query as $row )
            {
                $data['message'][] = array(
                    'suplr_id'=>$row->suplr_id,
                    'suplr_name' => $row->suplr_name,
                    ''
                );  //Add a row to array
            }
        }

            echo json_encode($data); //echo json string if ajax request

    }
}


?>