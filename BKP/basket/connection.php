<?php
	function get_sql_connection(){
		$mysqli = new mysqli("localhost", "root", "password", "mybasket");
	
		/* check connection */
		if ($mysqli->connect_errno) {
		    printf("Connect failed: %s\n", $mysqli->connect_error);
		    exit();
		}	
		return $mysqli;
	}
?>