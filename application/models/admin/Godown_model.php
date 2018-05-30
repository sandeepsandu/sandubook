<?php
	class Godown_model extends CI_Model{

		public function add_godown($data){
			$this->db->insert('godown', $data);
			return true;
		}

		public function get_all_godowns(){
			$query = $this->db->get('godown');
			return $result = $query->result_array();
		}

		public function get_godown_by_id($id){
			$query = $this->db->get_where('godown', array('godown_id' => $id));
			return $result = $query->row_array();
		}

		public function edit_godown($data, $id){
			$this->db->where('godown_id', $id);
			$this->db->update('godown', $data);
			return true;
		}


	}

?>