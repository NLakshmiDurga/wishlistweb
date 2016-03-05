<?php
	session_start();
	include "connection.php";
	$user_name = $_GET['username'];
	$user_emailid = $_GET['emailid'];
	$user_password = $_GET['password'];
	echo $user_name;
	echo "<br>",$user_emailid;
	echo "<br>",$user_password;
	$query = "INSERT INTO users (user_name,email_id,password) VALUES ('$user_name','$user_emailid','$user_password')";
	$result = $mysqli->query($query);
?>