<?php

function get_search_results_model($search_keyword){
	$new_array = array();
	$query = "SELECT * FROM items where item_name like '$search_keyword%'";
	global $mysqli;
	if($result = $mysqli->query($query))
	{
		while($row = $result->fetch_assoc())
		{
			$new_array[]=array('id'=>$row['item_id'],'title'=>$row['item_name']);
		}
	}
	return $new_array;
}

?>