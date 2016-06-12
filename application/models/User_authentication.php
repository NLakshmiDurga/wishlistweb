<?php
class User_authentication extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database('db_connection');
	}
	public function register($user_name,$email_id,$password,$type)
	{
		$check_query = $this->db->query("SELECT email_id From users WHERE email_id='$email_id'");
		if ($check_query->num_rows() != 0){
			echo "User already exist";
		}
		else{
			$token_id = uniqid();
			$query = $this->db->query("INSERT INTO users (user_name,email_id,password,token,signup_type) VALUES ('$user_name','$email_id','$password','$token_id','$type')");
			print_r($query);
			$affected_rows = $this->db->affected_rows();
			if($affected_rows > 0){
				$user_signup_response = array();
				$user_signup_response['status'] = "True";
				$user_signup_response['message'] = "Your query is successfull";
				$user_signup_response['user_token'] = $token_id;
				$user_signup_details = json_encode($user_signup_response);
				return $user_signup_details;
			}
			else{
				$user_signup_responsef = array();
				$user_signup_responsef['status'] = "False";
				$user_signup_responsef['message'] = "The token is not generated";
				$user_signup_details_false = json_encode($user_signup_responsef);
				return $user_signup_details_false;
			}
		}

	}
	public function user_log_in($emailid,$password)
	{
		$sql = "SELECT token FROM users WHERE  email_id = ? AND password = ?";
		$query = $this->db->query($sql,array($emailid,$password));
		$result_set = $query->result();
		$affected_rows = $this->db->affected_rows();
		if ($affected_rows>0) 
		{
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
