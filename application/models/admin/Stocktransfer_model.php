<?php
	class Stocktransfer_model extends CI_Model{

		public function add_stocktransfer($data,$data2){
			$this->db->insert('stock_transfer', $data);

            return true;
		}

		public function get_all_stocktransfer(){
            $this->db->select('g_from.godown_name as gfrom,g_to.godown_name as gto,st_id,st_date,st_desc,st_qty');
            $this->db->from('stock_transfer');
            $this->db->join('godown as g_from', 'stock_transfer.st_from = g_from.godown_id');
            $this->db->join('godown as g_to', 'stock_transfer.st_to = g_to.godown_id');
            $query = $this->db->get();
			return $result = $query->result_array();
		}
public function get_search_stocktransfer($from,$to,$sup)
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

        public function get_stocktransfer_by_id($id){
			$query = $this->db->get_where('stock_transfer', array('st_id' => $id));
			return $result = $query->row_array();
		}

		public function edit_stocktransfer($data, $id){
			$this->db->where('st_id', $id);
			$this->db->update('stock_transfer', $data);
			return true;
		}

        public function get_all_godown(){
            $query = $this->db->get('godown');
            return $result = $query->result_array();
        }

        public function get_all_bank(){
            $query = $this->db->get('bank');
            return $result = $query->result_array();
        }
        public function get_tot_stock($g_id)
        {


            $query = $this->db->query('select distinct(select sum(pur_qty) from purchase where pur_godownid='.$g_id.')-(select sum(sale_qty) from sale where sale_godownid='.$g_id.') as totalqty
from purchase ,sale');
           // print_r($query->result_array());
            return $result = $query->result_array();
            //return $response;
        }

    }

?>