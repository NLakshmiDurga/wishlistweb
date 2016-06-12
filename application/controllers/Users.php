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
		$user_name = $_POST['username'];
		$user_emailid = $_POST['emailid'];
		$user_password = $_POST['password'];
		$login_type = $_POST['type'];
		$user_sign_up = $this->User_authentication->register($user_name,$user_emailid,$user_password,$login_type);
		//print_r($user_sign_up);
		return($user_sign_up);
		// if (!$user_sign_up) {
		// 	print_r($user_sign_up);
		// 	echo "Successfully inserted";
		// }
		// else{
		// 	echo "Not inserted properly";
		// }
		print_r($user_sign_up);
		//return $user_sign_up;
	}
	public function signupwithgoogle()
	{
		echo "signup with google";
		$user_name = $_POST['username'];
		$user_emailid = $_POST['emailid'];
		$user_token = $_POST['usertoken'];
		$login_type = $_POST['type'];
		$user_signupwithgoogle = $this->User_authentication->user_signup_with_google($user_name,$user_emailid,$user_token,$login_type);
		return $user_signupwithgoogle;
	}
	public function login()
	{
		$email_id = $_POST['emailid'];
		$password = $_POST['password'];
		$user_login = $this->User_authentication->user_log_in($email_id,$password);
		return $user_login;
	}
	// public function logout()
	// {
	// 	$this->session->unset_userdata('userid');
	// }
}
?>
