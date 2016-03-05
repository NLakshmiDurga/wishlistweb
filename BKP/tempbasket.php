<?php
	session_start();
	$_SESSION["item1"] = $_GET['value1'];
	$_SESSION["item2"] = $_GET['value2'];
	echo $_SESSION["item1"];
	echo $_SESSION["item1"];
?>