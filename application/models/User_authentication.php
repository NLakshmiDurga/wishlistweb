<?php
	class User_authentication extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->database('db_connection');
		}
		public function register($user_name,$email_id,$password)
		{
			$token_id = uniqid();
			$query = $this->db->query("INSERT INTO users (user_name,email_id,password,token) VALUES ('$user_name','$email_id','$password','$token_id')");
			// print_r($query);
		}
		public function user_log_in($emailid,$password)
		{
			
			$sql = "SELECT token FROM users WHERE  email_id = ? AND password = ?";
			$query = $this->db->query($sql,array($emailid,$password));
			$result_set = $query->result();
			$affected_rows = $this->db->affected_rows();
	        if ($affected_rows>0) {
				foreach ($result_set as $row) {
					$token = $row->token;
				}
				$user_auth = array();
	            $user_auth['status'] = "True";
	            $user_auth['message'] = "Your query is successfull";
	            $user_auth['token'] = $token;
	            $json_auth_true_object = json_encode($user_auth);
	            return $json_auth_true_object;
			}
			else
	        {
	            $user_auth = array();
	            $user_auth['status'] = "False";
	            $user_auth['message'] = "There is no token";
	            $json_auth_false_object = json_encode($user_auth);
	            return $json_auth_false_object;
	        }
		}
	}
?>