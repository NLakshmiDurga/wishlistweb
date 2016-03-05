<?php
	include "connection.php";
	include "phpmodels.php";
	include "views.php";
	$db_connection = get_sql_connection();
	$categories = render_category_items($db_connection);
	echo render_json_categories($categories); 
?>