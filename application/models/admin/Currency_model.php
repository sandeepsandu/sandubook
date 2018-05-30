<?php
	class Currency_model extends CI_Model{

		public function add_user($data){
			$this->db->insert('Supplier', $data);
			return true;
		}

		public function get_all_suppliers(){
			$query = $this->db->get('supplier');
			return $result = $query->result_array();
		}

		public function get_user_by_id($id){
			$query = $this->db->get_where('supplier', array('suplr_id' => $id));
			return $result = $query->row_array();
		}

		public function edit_supplier($data, $id){
			$this->db->where('suplr_id', $id);
			$this->db->update('supplier', $data);
			return true;
		}

        public function get_all_custgroups(){
            $query = $this->db->get('supplier_group');
            return $result = $query->result_array();
        }

	}

?>