<?php
	class Sale_model extends CI_Model{

		public function add_sale($data){
			$this->db->insert('sale', $data);
			return true;
		}

		public function get_all_sale(){
            $this->db->select('sale.sale_id,sale.sale_recievedamount,sale.sale_paymode,sale.sale_date,godown.godown_name,customer.cust_name,sale.sale_godownid,sale.sale_desc,sale.sale_qty,sale.sale_rate,sale.sale_amount');
            $this->db->from('sale');
            $this->db->join('customer', 'sale.sale_cust_id = customer.cust_id');
            $this->db->join('godown', 'sale.sale_godownid = godown.godown_id');
            $query = $this->db->get();
			return $result = $query->result_array();
		}
        public function get_search_sale($from,$to,$cust)
        {
            $this->db->select('sale.sale_id,sale.sale_recievedamount,sale.sale_paymode,sale.sale_date,godown.godown_name,customer.cust_name,sale.sale_godownid,sale.sale_desc,sale.sale_qty,sale.sale_rate,sale.sale_amount');
            $this->db->from('sale');
            $this->db->join('customer', 'sale.sale_cust_id = customer.cust_id');
            $this->db->join('godown', 'sale.sale_godownid = godown.godown_id');
            if($cust!=0)
            {
                $this->db->where('sale.sale_cust_id', $cust);
            }

            $this->db->where('sale.sale_date >=', $from);
            $this->db->where('sale.sale_date <=', $to);

            $query = $this->db->get();
            return $result = $query->result_array();
        }

        ///Outstanding Customer
        public function get_all_outstandingcust(){
            $this->db->select('sale.sale_id,payment_mode.pm_name,sale.sale_recievedamount,sale.sale_paymode,sale.sale_date,godown.godown_name,customer.cust_name,sale.sale_godownid,sale.sale_desc,sale.sale_qty,sale.sale_rate,sale.sale_amount');
            $this->db->from('sale');
            $this->db->join('customer', 'sale.sale_cust_id = customer.cust_id');
            $this->db->join('godown', 'sale.sale_godownid = godown.godown_id');
            $this->db->join('payment_mode', 'sale.sale_paymode = payment_mode.pm_id');
            $query = $this->db->get();
            return $result = $query->result_array();
        }
        public function get_search_outstandingcust($from,$to,$cust)
        {
            $this->db->select('sale.sale_id,payment_mode.pm_name,sale.sale_recievedamount,sale.sale_paymode,sale.sale_date,godown.godown_name,customer.cust_name,sale.sale_godownid,sale.sale_desc,sale.sale_qty,sale.sale_rate,sale.sale_amount');
            $this->db->from('sale');
            $this->db->join('customer', 'sale.sale_cust_id = customer.cust_id');
            $this->db->join('godown', 'sale.sale_godownid = godown.godown_id');
            $this->db->join('payment_mode', 'sale.sale_paymode = payment_mode.pm_id');
            if($cust!=0)
            {
                $this->db->where('sale.sale_cust_id', $cust);
            }

            $this->db->where('sale.sale_date >=', $from);
            $this->db->where('sale.sale_date <=', $to);

            $query = $this->db->get();
            return $result = $query->result_array();
        }
		public function get_sale_by_id($id){
			$query = $this->db->get_where('sale', array('sale_id' => $id));
			return $result = $query->row_array();
		}

		public function edit_sale($data, $id){
			$this->db->where('sale_id', $id);
			$this->db->update('sale', $data);
			return true;
		}

        public function get_all_customers(){
            $query = $this->db->get('customer');
            return $result = $query->result_array();
        }

        public function get_all_godowns(){
            $query = $this->db->get('godown');
            return $result = $query->result_array();
        }
        public function get_all_paymodes(){
            $query = $this->db->get('payment_mode');
            return $result = $query->result_array();
        }
	}

?>