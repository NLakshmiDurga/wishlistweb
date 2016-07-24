<?php
class UserTaskModel extends CI_Model
{
	public function __construct()
	{
        // $this->load->library('session');
        $this->load->database('db_connection');
        $this->load->helper('date');
    }
    public function add_task($userid,$task){
        $parse_json = json_decode($userid);
        $userid = $parse_json->user_id;
        $date = date('Y-m-d H:i:s'); 
        $sql = "INSERT INTO user_tasks (user_id,task,added_task_on) VALUES(?,?,?)";
        $query = $this->db->query($sql,array($userid,$task,$date));
        $affected_rows = $this->db->affected_rows();
        if ($affected_rows>0) {
            $user_add_tasks = array();
            $user_add_tasks['status'] = "True";
            $user_add_tasks['message'] = "You have added task(s) successfully";
            $user_add_tasks_json = json_encode($user_add_tasks);
            return $user_add_tasks_json;
        }
        else{
            $user_add_tasks = array();
            $user_add_tasks['status'] = "False";
            $user_add_tasks['message'] = "Tasks have not successfully added";
            $user_add_tasks_json_false = json_encode($user_add_tasks);
            return $user_add_tasks_json_false;
        }
    }
    public function get_tasks($userid,$status){
        $parse_json = json_decode($userid);
        $userid = $parse_json->user_id;
        $sql = "SELECT task_id,task,status FROM user_tasks WHERE user_id = ? AND status = ?";
        $query = $this->db->query($sql,array($userid,$status));
        $result_set = $query->result();
        $tasks = array();
        $affected_rows = $this->db->affected_rows();
        if ($affected_rows>0) {
            foreach ($result_set as $row) {
                $tasks[] = $row;
            }
            $user_task_details = array();
            $user_task_details['status'] = "True";
            $user_task_details['message'] = "User saved tasks";
            $user_task_details['tasks'] = $tasks;
            $tasks_json_true = json_encode($user_task_details);
//            print_r($tasks_json_true);
            return $tasks_json_true;
        }
        else
        {
            $user_task_details = array();
            $user_task_details['status'] = "False";
            $user_task_details['message'] = "There are no tasks yet";
            $tasks_json_false = json_encode($user_task_details);
            return $tasks_json_false;
        }
    }
    public function delete_task($task_id,$userid){
        $parse_json = json_decode($userid);
        $userid = $parse_json->user_id;

        $sql = "DELETE FROM user_tasks WHERE user_id = ? AND task_id = ?";
        $query = $this->db->query($sql,array($userid,$task_id));
        $affected_rows = $this->db->affected_rows();
        if ($affected_rows>0) {
            $user_details = array();
            $user_details['status'] = "True";
            $user_details['message'] = "Deleted your task";
            $delete_items_true_json = json_encode($user_details);
            return $delete_items_true_json;
        }
        else
        {
            $user_details = array();
            $user_details['status'] = "False";
            $user_details['message'] = "There are no records";
            $delete_items_false_json = json_encode($user_details);
            return $delete_items_false_json;
        }
    }
    public function update_task($task_id,$status,$userid){
        $parse_json = json_decode($userid);
        $userid = $parse_json->user_id;
        $date = date('Y-m-d H:i:s');
        $sql = "UPDATE user_tasks SET status = ?,modified_task_on = ? WHERE user_id = ? AND task_id = ?";
        $query = $this->db->query($sql,array($status,$date,$userid,$task_id));
//        $str = $this->db->last_query();
//        print_r($str);
        $affected_rows = $this->db->affected_rows();
        if ($affected_rows>0) {
            $user_details = array();
            $user_details['status'] = "True";
            $user_details['message'] = "Updated your task";
            $delete_items_true_json = json_encode($user_details);
            return $delete_items_true_json;
        }
        else
        {
            $user_details = array();
            $user_details['status'] = "False";
            $user_details['message'] = "There are no records";
            $delete_items_false_json = json_encode($user_details);
            return $delete_items_false_json;
        }
    }
}