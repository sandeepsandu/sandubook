<?php
	class Dashboard_model extends CI_Model{


		public function get_all_customers(){
			$query = $this->db->get('customer');
			return $result =$query->num_rows();
		}
        public function get_all_banks(){
            $query = $this->db->get('bank');
            return $result =$query->num_rows();
        }
        public function get_all_suppliers(){
            $query = $this->db->get('supplier');
            return $result =$query->num_rows();
        }
        public function get_all_users(){
            $query = $this->db->get('ci_users');
            return $result =$query->num_rows();
        }
        public function get_all_godowns(){
            $query = $this->db->get('godown');
            return $result =$query->num_rows();
        }
        public function get_all_purchases(){
            $query = $this->db->get('purchase');
            return $result =$query->num_rows();
        }
        public function get_all_sales(){
            $query = $this->db->get('sale');
            return $result =$query->num_rows();
        }
	}

?>