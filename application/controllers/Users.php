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
			$user_sign_up = $this->User_authentication->register($user_name,$user_emailid,$user_password);
			print_r($user_sign_up);
			// if (!$user_sign_up) {
			// 	print_r($user_sign_up);
			// 	echo "Successfully inserted";
			// }
			// else{
			// 	echo "Not inserted properly";
			// }
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
		// 	$this->session->unset_userdata('userid');
		// }
	}
?>