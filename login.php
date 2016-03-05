<?php
	session_start();
	include "connection.php";
	$db_connection = get_sql_connection();
	$user_emailid = $_GET['emailid'];
	$user_password = $_GET['password'];
	// echo $user_emailid;
	// echo $user_password;
	$query = "SELECT user_id from users where email_id='$user_emailid' and password='$user_password'";
	if ($result = $db_connection->query($query))
	{
		while($row = $result->fetch_assoc())
		{
			$_SESSION['userid'] = $row['user_id'];
			echo $_SESSION['userid'];
		}
	}
?>