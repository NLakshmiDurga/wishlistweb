<?php
	session_start();
	include "connection.php";
	$db_connection = get_sql_connection();
	$itemstosave = $_GET['saveitems'];
	$jsonobj = json_decode($itemstosave);
	$userId = $_SESSION['userid'];
	$sql_query = "DELETE FROM userbasket WHERE user_id='$userId'";
	$db_connection->query($sql_query);
	foreach ($jsonobj as $itemresults)
	{
		$query = "INSERT INTO userbasket (user_id,item_id) VALUES (%s,%s)";
		$string_query = sprintf($query,$_SESSION['userid'],$itemresults->itemId);
		echo $string_query;
		$db_connection->query($string_query);
	}
	// echo "Inserted items successfully";
?>