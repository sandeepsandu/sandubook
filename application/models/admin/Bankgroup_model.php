<?php
	class Bankgroup_model extends CI_Model{

		public function add_bankgroup($data){
			$this->db->insert('bank_group', $data);
			return true;
		}

		public function get_all_bankgroups(){
			$query = $this->db->get('bank_group');
			return $result = $query->result_array();
		}

		public function get_bankgroup_by_id($id){
			$query = $this->db->get_where('bank_group', array('bank_groupid' => $id));
			return $result = $query->row_array();
		}

		public function edit_bankgroup($data, $id){
			$this->db->where('bank_groupid', $id);
			$this->db->update('bank_group', $data);
			return true;
		}


	}

?>