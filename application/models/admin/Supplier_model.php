<?php
	class Supplier_model extends CI_Model{

		public function add_user($data){
			$this->db->insert('supplier', $data);
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

        public function get_accurate_suplr()
        {
            $this->db->select('suplr_id,suplr_name,suplr_address,suplr_mob,suplr_status,suplr_opencredit,suplr_opendebit,sum(pur_amount)-sum(pur_payamount) as purdebitamt');
            $this->db->from('supplier');
            $this->db->join('purchase', 'supplier.suplr_id = purchase.pur_suplr_id','left');

            $this->db->group_by('suplr_name,suplr_id,suplr_name,suplr_address,suplr_mob,suplr_status,suplr_opencredit,suplr_opendebit');
            $query = $this->db->get();
            return $result = $query->result_array();
        }

		public function get_all_custgroups(){
            $query = $this->db->get('supplier_group');
            return $result = $query->result_array();
        }
        public function GetRow($keyword) {
            $this->db->select('*')->from('supplier');
            $this->db->like('suplr_name',$keyword,'after');
            $query = $this->db->get();
            return $query->result();
        }

	}

?>