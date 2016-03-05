<?php
	include "connection.php";
	$searchkeyword = $_GET['search'];
	$query = "SELECT * FROM items WHERE item_name LIKE '$searchkeyword%'";
	if($result = $mysqli->query($query))
	{
		while($row = $result->fetch_assoc())
		{
			$string_array = "<li>%s<input type='checkbox' class='showCheckBox' value='%s' data-id='%d'></li>";
			echo sprintf($string_array,$row['item_name'],$row['item_name'],$row['item_id']);
		}
	}
?>