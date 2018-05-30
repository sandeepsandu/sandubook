<?php
	class Custgroup_model extends CI_Model{

		public function add_custgroup($data){
			$this->db->insert('customer_group', $data);
			return true;
		}

		public function get_all_custgroups(){
			$query = $this->db->get('customer_group');
			return $result = $query->result_array();
		}

		public function get_custgroup_by_id($id){
			$query = $this->db->get_where('customer_group', array('cust_groupid' => $id));
			return $result = $query->row_array();
		}

		public function edit_custgroup($data, $id){
			$this->db->where('cust_groupid', $id);
			$this->db->update('customer_group', $data);
			return true;
		}


	}

?>