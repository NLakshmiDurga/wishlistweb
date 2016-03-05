<?php
	session_start();
	include "phpmodels.php";
	include "views.php";
	function search_controller($db_connection,$searchkeyword){
		$search_results=get_search_results($db_connection,$searchkeyword);
	 	// echo  render_html_search_results($search_results);
	 	return render_json_search_results_view($search_results);
	}
	function categories_controller($db_connection){
		$categories = render_category_items($db_connection);
		return render_json_categories($categories); 
	}
	function saved_items_controller($db_connection){
		$user_id = $_SESSION['userid'];
		$saved_items = get_saved_items($db_connection,$user_id);
		return render_json_saved_items($saved_items);
	}
	function get_category_items_controller($db_connection,$category_id){
		$category_items = get_category_items($db_connection,$category_id);
		return render_json_category_items($category_items);
	}
?>