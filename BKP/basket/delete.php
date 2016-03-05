<?php
	include "connection.php";
	$db_connection = get_sql_connection();
	session_start();
	$itemtodelete = $_GET['deleteitem'];
	$query = "DELETE FROM userbasket WHERE user_id=%s AND item_id=%s";
	$deletequery_string = sprintf($query,$_SESSION['userid'],$itemtodelete);
	echo $deletequery_string;
	$db_connection->query($deletequery_string);
	/*echo "Deleted items successfully";*/
?>