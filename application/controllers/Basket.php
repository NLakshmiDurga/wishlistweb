<?php
// defined('BASEPATH') OR exit('No direct script access allowed');
class Basket extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Items_model');
	}
	public function index()
	{
		$get_token = $_POST['token'];
		$useridfromtoken = $this->Items_model->get_userid_from_token($get_token);
		// print_r($useridfromtoken);
		$saved_items = $this->Items_model->user_saved_items($useridfromtoken);
		return $saved_items;
		// $user_items = array();
		// $user_items['saved_items'] = $saved_items;
		// // print_r($user_items);
		// $this->load->view('User_saved_items_view',$user_items);
	}
	public function add_user_task(){
		$user_token = $_POST['token'];
		$user_task = $_POST['task'];
		$user_id = $this->Items_model->get_userid_from_token($get_token);
		$add_task = $this->Items_model->add_task($user_id,$task);
	}
	public function get_user_tasks(){
		$user_token = $_POST['token'];
		$userid = $this->Items_model->get_userid_from_token($get_token);
		$user_tasks = $this->Items_model->get_tasks($userid);
		// return $user_tasks;
		return($user_tasks);
	}
	public function item_search_results()
	{
		// $search_keyword = $_GET['searchkeyword'];
		$search_items = $this->Items_model->get_search_results();
		$items = array();
		$items['results'] = $search_items;
		//return $items;
		//$this->load->view('Search_view',$items);
		
	}
	public function save_user_items()
	{
		$items_to_save = $_POST['saveitems'];
		$user_token = $_POST['token'];
		$useridfromtoken = $this->Items_model->get_userid_from_token($user_token);
		$user_items_to_save = $this->Items_model->save_items($useridfromtoken,$items_to_save);
		return $user_items_to_save;
	}
	public function delete()
	{
		// $userid = $this->session->userid;
		$user_token = $_POST['token'];
		$itemid = $_POST['item_id'];
		$useridfromtoken = $this->Items_model->get_userid_from_token($user_token);
		$deleted_item = $this->Items_model->delete_item($useridfromtoken,$itemid);
		//print_r($deleted_item);
		return $deleted_item;
		// echo $deleted_item;
	}
	public function categories()
	{
		$category = array();
		$categories = $this->Items_model->get_categories();
		$category['category_results'] = $categories;
		$this->load->view("Categories",$category);
	}
	public function categoryitems()
	{
		$categoryitems = array();
		$category_id = $_POST['categoryid'];
		$category_items_result = $this->Items_model->get_category_items($category_id);
		$categoryitems['category_items'] = $category_items_result;
		$this->load->view("Categoryitems",$categoryitems);
	}
}
?>
