<?php
class Users extends CI_controller
{
	public function __construct()
	{
		parent::__construct();
		// $this->load->library('session');
		$this->load->model('User_authentication');
	}
	public function signup()
	{
		if(isset($_POST['username']) && isset($_POST['emailid']) && isset($_POST['password']) && isset($_POST['type'])){
			
			$user_name = $_POST['username'];
			$user_emailid = $_POST['emailid'];
			$user_password = $_POST['password'];
			$sinup_type = $_POST['type'];
			$user_sign_up = $this->User_authentication->register($user_name,$user_emailid,$user_password,$sinup_type);
			print_r($user_sign_up);
			return $user_sign_up;
		}
		else{
			$user_signup_response['status'] = "False";
			$user_signup_response['message'] = "invalid payload";
			echo json_encode($user_signup_response);
		}


	}
	public function login()
	{
		$email_id = $_POST['emailid'];
		$password = $_POST['password'];
		$user_login = $this->User_authentication->user_log_in($email_id,$password);
		print_r($user_login);
		return $user_login;
	}
                // public function logout()
                // {
                //      $this->session->unset_userdata('userid');
                // }
	// }
	// else{
	//      echo "Not inserted properly";
	// }
	// public function logout()
	// {
	//      $this->session->unset_userdata('userid');
	// }
}
?>

