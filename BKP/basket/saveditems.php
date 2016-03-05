<?php
	session_start();
	include "connection.php";
	include "phpmodels.php";
	include "views.php";
	$db_connection = get_sql_connection();
	$user_id = $_SESSION['userid'];
	$saved_items = get_saved_items($db_connection,$user_id);
	echo render_json_saved_items($saved_items);
?>