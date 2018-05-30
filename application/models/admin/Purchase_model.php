<?php
	class Purchase_model extends CI_Model{

		public function add_purchase($data){
			$this->db->insert('purchase', $data);
			return true;
		}

		public function get_all_purchase(){
            $this->db->select('purchase.pur_id,purchase.pur_date,godown.godown_name,supplier.suplr_name,purchase.pur_godownid,purchase.pur_desc,purchase.pur_qty,purchase.pur_rate,purchase.pur_amount');
            $this->db->from('purchase');
            $this->db->join('supplier', 'purchase.pur_suplr_id = supplier.suplr_id');
            $this->db->join('godown', 'purchase.pur_godownid = godown.godown_id');
            $query = $this->db->get();
			return $result = $query->result_array();
		}
public function get_search_purchase($from,$to,$sup)
{
   // $from1="2018-04-23";
   // $to1="2018-04-26";
    $this->db->select('purchase.pur_id,purchase.pur_date,godown.godown_name,supplier.suplr_name,purchase.pur_godownid,purchase.pur_desc,purchase.pur_qty,purchase.pur_rate,purchase.pur_amount');
    $this->db->from('purchase');
    $this->db->join('supplier', 'purchase.pur_suplr_id = supplier.suplr_id');
    $this->db->join('godown', 'purchase.pur_godownid = godown.godown_id');
    if($sup!=0)
    {
        $this->db->where('purchase.pur_suplr_id', $sup);
    }

    $this->db->where('purchase.pur_date >=', $from);
$this->db->where('purchase.pur_date <=', $to);

    $query = $this->db->get();
    return $result = $query->result_array();

}

        public function get_all_outstandingsuplr(){
            $this->db->select('purchase.pur_id,purchase.pur_payamount,payment_mode.pm_name,purchase.pur_date,godown.godown_name,supplier.suplr_name,purchase.pur_godownid,purchase.pur_desc,purchase.pur_qty,purchase.pur_rate,purchase.pur_amount');
            $this->db->from('purchase');
            $this->db->join('supplier', 'purchase.pur_suplr_id = supplier.suplr_id');
            $this->db->join('godown', 'purchase.pur_godownid = godown.godown_id');
            $this->db->join('payment_mode', 'purchase.pur_paymode = payment_mode.pm_id');
            $query = $this->db->get();
            return $result = $query->result_array();
        }
        public function get_search_outstandingsuplr($from,$to,$sup)
        {
            // $from1="2018-04-23";
            // $to1="2018-04-26";
            $this->db->select('purchase.pur_id,purchase.pur_payamount,payment_mode.pm_name,purchase.pur_date,godown.godown_name,supplier.suplr_name,purchase.pur_godownid,purchase.pur_desc,purchase.pur_qty,purchase.pur_rate,purchase.pur_amount');
            $this->db->from('purchase');
            $this->db->join('supplier', 'purchase.pur_suplr_id = supplier.suplr_id');
            $this->db->join('godown', 'purchase.pur_godownid = godown.godown_id');
            $this->db->join('payment_mode', 'purchase.pur_paymode = payment_mode.pm_id');
            if($sup!=0)
            {
                $this->db->where('purchase.pur_suplr_id', $sup);
            }

            $this->db->where('purchase.pur_date >=', $from);
            $this->db->where('purchase.pur_date <=', $to);

            $query = $this->db->get();
            return $result = $query->result_array();

        }

        public function get_purchase_by_id($id){
			$query = $this->db->get_where('purchase', array('pur_id' => $id));
			return $result = $query->row_array();
		}

		public function edit_purchase($data, $id){
			$this->db->where('pur_id', $id);
			$this->db->update('purchase', $data);
			return true;
		}

        public function get_all_suppliers(){
            $query = $this->db->get('supplier');
            return $result = $query->result_array();
        }

        public function get_all_godowns(){
            $query = $this->db->get('godown');
            return $result = $query->result_array();
        }
        public function get_all_paymodes(){
            $query = $this->db->get('payment_mode');
            return $result = $query->result_array();
        }
	}

?>