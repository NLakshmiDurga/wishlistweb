<?php
// defined('BASEPATH') OR exit('No direct script access allowed');
class Usertasks extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Items_model');
		$this->load->model('UserTaskModel');
	}
	public function add_user_task(){
		$user_token = $_POST['token'];
		$user_task = $_POST['task'];
		$user_id = $this->Items_model->get_userid_from_token($user_token);
		$add_task = $this->UserTaskModel->add_task($user_id,$user_task);
//		print_r($add_task);
		return($add_task);
	}
	public function get_user_tasks(){
		$user_token = $_POST['token'];
		$userid = $this->Items_model->get_userid_from_token($user_token);
		$user_tasks = $this->UserTaskModel->get_tasks($userid);
		 print_r($user_tasks);
		return($user_tasks);
	}
	public function delete_user_task(){
		$user_token = $_POST['token'];
		$user_task_id = $_POST['taskid'];
		$userid = $this->Items_model->get_userid_from_token($user_token);
		$user_tasks = $this->UserTaskModel->delete_task($user_task_id,$userid);
		return($user_tasks);
//		print_r($user_tasks);
	}
	public function update_user_task(){
		$user_token = $_POST['token'];
		$task_id = $_POST['taskid'];
		$user_status = $_POST['status'];
		$userid = $this->Items_model->get_userid_from_token($user_token);
		$user_tasks = $this->UserTaskModel->update_task($task_id,$user_status,$userid);
//		print_r($user_tasks);
		return($user_tasks);
	}
}
