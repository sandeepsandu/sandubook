<?php
	class Ledger_model extends CI_Model{
//ledgers

		public function add_ledgergroup($data){
			$this->db->insert('ledger_group', $data);
			return true;
		}

		public function get_all_ledgergroups(){
			$query = $this->db->get('ledger_group');
			return $result = $query->result_array();
		}

		public function get_ledgergroup_by_id($id){
			$query = $this->db->get_where('ledger_group', array('ledger_groupid' => $id));
			return $result = $query->row_array();
		}

		public function edit_ledgergroup($data, $id){
			$this->db->where('ledger_groupid', $id);
			$this->db->update('ledger_group', $data);
			return true;
		}

// ledgers
    public function add_ledger($data){
        $this->db->insert('ledger', $data);
        return true;
    }

    public function get_all_ledgers(){
        $query = $this->db->get('ledger');
        return $result = $query->result_array();
    }
    public function get_search_ledgers($from,$to)
    {
        // $from1="2018-04-23";
        // $to1="2018-04-26";
        $this->db->select('*');
        $this->db->from('ledger');

        $this->db->where('led_date >=', $from);
        $this->db->where('led_date <=', $to);

        $query = $this->db->get();
        return $result = $query->result_array();

    }
    public function get_ledger_by_id($id){
        $query = $this->db->get_where('ledger', array('led_id' => $id));
        return $result = $query->row_array();
    }

    public function edit_ledger($data, $id){
        $this->db->where('led_id', $id);
        $this->db->update('ledger', $data);
        return true;
    }

	}

?>