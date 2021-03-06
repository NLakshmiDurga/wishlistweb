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
		print_r($add_task);
		return($add_task);
	}
	public function get_user_tasks(){
		if(isset($_POST['status']) && isset($_POST['token'])){
			$user_token = $_POST['token'];
			$status = $_POST['status'];
			$userid = $this->Items_model->get_userid_from_token($user_token);
			$user_tasks = $this->UserTaskModel->get_tasks($userid,$status);
			print_r($user_tasks);
			return($user_tasks);
		}
		else{
			$user_tasks_response['status'] = "False";
			$user_tasks_response['message'] = "invalid payload";
			echo json_encode($user_tasks_response);
			return json_encode($user_tasks_response);
		}
	}

	public function delete_user_task(){
		$user_token = $_POST['token'];
		$user_task_id = $_POST['taskid'];
		$userid = $this->Items_model->get_userid_from_token($user_token);
		$user_tasks = $this->UserTaskModel->delete_task($user_task_id,$userid);
		print_r($user_tasks);
		return($user_tasks);
	}
	public function update_user_task(){
		$user_token = $_POST['token'];
		$task_id = $_POST['taskid'];
		$user_status = $_POST['status'];
		$userid = $this->Items_model->get_userid_from_token($user_token);
		$user_tasks = $this->UserTaskModel->update_task($task_id,$user_status,$userid);
		print_r($user_tasks);
		return($user_tasks);
	}
}
