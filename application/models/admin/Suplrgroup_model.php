<?php
	class Suplrgroup_model extends CI_Model{

		public function add_suplrgroup($data){
			$this->db->insert('supplier_group', $data);
			return true;
		}

		public function get_all_suplrgroups(){
			$query = $this->db->get('supplier_group');
			return $result = $query->result_array();
		}

		public function get_suplrgroup_by_id($id){
			$query = $this->db->get_where('supplier_group', array('suplr_groupid' => $id));
			return $result = $query->row_array();
		}

		public function edit_suplrgroup($data, $id){
			$this->db->where('suplr_groupid', $id);
			$this->db->update('supplier_group', $data);
			return true;
		}


	}

?>