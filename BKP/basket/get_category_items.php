<?php
	include "connection.php";
	include "phpmodels.php";
	include "views.php";
	$db_connection = get_sql_connection();
	$category_id = $_GET['categoryid'];
	$category_items = get_category_items($db_connection,$category_id);
	echo render_json_category_items($category_items);
?>