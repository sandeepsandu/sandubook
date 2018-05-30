<?php
	class Bank_model extends CI_Model{

		public function add_bank($data){
			$this->db->insert('bank', $data);
			return true;
		}

		public function get_all_banks(){
			$query = $this->db->get('bank');
			return $result = $query->result_array();
		}

		public function get_bank_by_id($id){
			$query = $this->db->get_where('bank', array('bank_id' => $id));
			return $result = $query->row_array();
		}

		public function edit_bank($data, $id){
			$this->db->where('bank_id', $id);
			$this->db->update('bank', $data);
			return true;
		}

        public function get_all_bankgroups(){
            $query = $this->db->get('bank_group');
            return $result = $query->result_array();
        }

	}

?>