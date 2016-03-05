<?php
	class DB_connection
	{
		// public $hostname = 'localhost';
		// public $username = 'root';
		// public $password = 'password';
		// public $dbname = 'mybasket';
		function get_connection($hostname,$username,$password,$dbname)
		{
			$mysqli = new mysqli($hostname,$username,$password,$dbname);
			if ($mysqli->connect_errno) {
			    printf("Connect failed: %s\n", $mysqli->connect_error);
			    exit();
			}
			else
			{
				return $mysqli;	
			}
		}
	}
	$conn_object = new DB_connection();
	$object1 = $conn_object->get_connection("localhost","root","password","mybasket");
	// print_r($object1);

	class SampleClass
	{

		function get_all($object1)
		{
			$items = array();
			$query = "SELECT * from items";
			if ($result = $object1->query($query)) {
				foreach ($result as $row) {
					$items[] = $row;
				}
			}
			return json_encode($items);
		}
	}
	$db_conn = new DB_connection();
	$object1 = $conn_object->get_connection("localhost","root","password","mybasket");
	$object2 = new SampleClass();
	echo $object2->get_all($object1);
?>