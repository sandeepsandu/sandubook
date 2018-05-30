<?php
	class Nsd_model extends CI_Model{

		public function add_nsd($data){
			$this->db->insert('nsd', $data);
			return true;
		}

		public function get_all_nsd(){
            $this->db->select('nsd.nsd_id,nsd.nsd_date,customer.cust_name,supplier.suplr_name,nsd.nsd_desc,nsd.nsd_qty,nsd.nsd_purrate,nsd.nsd_puramount,nsd.nsd_salerate,nsd.nsd_saleamount');
            $this->db->from('nsd');
            $this->db->join('customer', 'nsd.nsd_cust_id = customer.cust_id');
            $this->db->join('supplier', 'nsd.nsd_suplr_id = supplier.suplr_id');
            $query = $this->db->get();
			return $result = $query->result_array();
		}

		//search

        public function get_search_nsd($from,$to)
        {
            // $from1="2018-04-23";
            // $to1="2018-04-26";
            $this->db->select('nsd.nsd_id,nsd.nsd_date,customer.cust_name,supplier.suplr_name,nsd.nsd_desc,nsd.nsd_qty,nsd.nsd_purrate,nsd.nsd_puramount,nsd.nsd_salerate,nsd.nsd_saleamount');
            $this->db->from('nsd');
            $this->db->join('customer', 'nsd.nsd_cust_id = customer.cust_id');
            $this->db->join('supplier', 'nsd.nsd_suplr_id = supplier.suplr_id');


            $this->db->where('nsd.nsd_date >=', $from);
            $this->db->where('nsd.nsd_date <=', $to);

            $query = $this->db->get();
            return $result = $query->result_array();

        }
		public function get_nsd_by_id($id){
			$query = $this->db->get_where('nsd', array('nsd_id' => $id));
			return $result = $query->row_array();
		}

		public function edit_nsd($data, $id){
			$this->db->where('nsd_id', $id);
			$this->db->update('nsd', $data);
			return true;
		}

        public function get_all_customers(){
            $query = $this->db->get('customer');
            return $result = $query->result_array();
        }
        public function get_all_suppliers(){
            $query = $this->db->get('supplier');
            return $result = $query->result_array();
        }

        public function get_all_godowns(){
            $query = $this->db->get('godown');
            return $result = $query->result_array();
        }

	}

?>