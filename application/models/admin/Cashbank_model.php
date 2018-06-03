<?php
	class Cashbank_model extends CI_Model{

		public function add_cashbank($data,$data2){
			$this->db->insert('cashbank_entry', $data);

            $insert_id = $this->db->insert_id();

            $data2['cbt_cb_id']=$insert_id;

            foreach($data2['accname'] as $key => $siblingName) {
                $acccode = str_split($siblingName, 2);
               // echo $acccode;
              //  exit;
                if($acccode[0]=='BK')
                {
                    $transfromtype=1;
                    $transferid=$acccode[1];
                }
                elseif ($acccode[0]=='CU')
                {
                    $transfromtype=2;
                    $transferid=$acccode[1];
                }
                else
                {
                    $transfromtype=3;
                    $transferid=$acccode[1];
                }
                $dataToSave[] = array(
                    'cbt_cb_id'=>$insert_id,
                    'cbt_transfrom_type' => $transfromtype,
                    'cbt_transfrom_id' => $transferid,
                    'cbt_desc' => $data2['desc'][$key],
                    'cbt_paymenttype' => $data2['paytype'][$key],
                    'cbt_amount' => $data2['amount'][$key],

                );
            }
            $this->db->insert_batch('cashbank_transaction', $dataToSave);

            return true;
		}

		public function get_all_cashbank(){
            $this->db->select('*');
            $this->db->from('cashbank_entry');
            $this->db->join('cashbank_transaction', 'cashbank_entry.cb_id = cashbank_transaction.cbt_cb_id','left outer');
            $this->db->join('bank', 'cashbank_entry.cb_bank_id = bank.bank_id');
            $query = $this->db->get();
			return $result = $query->result_array();
		}
public function get_search_cashbank($from,$to,$sup)
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

        public function get_cashbank_by_id($id){
			$query = $this->db->get_where('cashbank_entry', array('cb_id' => $id));
			return $result = $query->row_array();
		}
    public function get_cashbanktrans_by_id($id){
    $query = $this->db->get_where('cashbank_transaction', array('cbt_cb_id' => $id));
    return $result = $query->result_array();
    }
		public function edit_cashbank($data, $id){
			$this->db->where('cb_id', $id);
			$this->db->update('cashbank_entry', $data);
			return true;
		}

        public function get_all_suppliers(){
            $query = $this->db->get('supplier');
            return $result = $query->result_array();
        }

        public function get_all_bank(){
            $query = $this->db->get('bank');
            return $result = $query->result_array();
        }

	}

?>