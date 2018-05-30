<?php
	class Customer_model extends CI_Model{

		public function add_user($data){
			$this->db->insert('customer', $data);
			return true;
		}

		public function get_all_customers(){
			$query = $this->db->get('customer');
			return $result = $query->result_array();
		}

		public function get_user_by_id($id){
			$query = $this->db->get_where('customer', array('cust_id' => $id));
			return $result = $query->row_array();
		}

		public function edit_customer($data, $id){
			$this->db->where('cust_id', $id);
			$this->db->update('customer', $data);
			return true;
		}

        public function get_all_custgroups(){
            $query = $this->db->get('customer_group');
            return $result = $query->result_array();
        }
        public function get_accurate_cust()
        {
            $this->db->select('cust_id,cust_name,cust_address,cust_mob,cust_status,cust_opencredit,cust_opendebit,sum(sale_amount)-sum(sale_recievedamount) as saledebitamt');
            $this->db->from('customer');
            $this->db->join('sale','customer.cust_id = sale.sale_cust_id','left');

            $this->db->group_by('cust_name,cust_id,cust_name,cust_address,cust_mob,cust_status,cust_opencredit,cust_opendebit');
            $query = $this->db->get();
            return $result = $query->result_array();
        }
	}

?>