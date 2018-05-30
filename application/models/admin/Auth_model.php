<?php
	class Auth_model extends CI_Model{

		public function login($data){
			$query = $this->db->get_where('ci_users', array('email' => $data['email']));
			if ($query->num_rows() == 0){
				return false;
			}
			else{
				//Compare the password attempt with the password we have stored.
				$result = $query->row_array();

			    $validPassword = password_verify($data['password'], $result['password']);
			    if($validPassword){
//                    echo $result['password']."<br>".$data['password'];
//                    exit;
			        return $result = $query->row_array();
			    }
				
			}
		}

		public function change_pwd($data, $id){
			$this->db->where('id', $id);
			$this->db->update('ci_users', $data);
			return true;
		}

	}

?>