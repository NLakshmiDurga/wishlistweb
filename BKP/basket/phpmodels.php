<?php
	get_sql_connection();
	function get_search_results($db_connection,$search_keyword){
		$items_array = array();
		$query = "SELECT * FROM items WHERE item_name LIKE '$search_keyword%'";
		if($result = $db_connection->query($query))
		{
			while($row = $result->fetch_assoc())
			{
				$items_array[] = array('itemid'=>$row['item_id'],'itemname'=>$row['item_name']);
			}
		}
		return $items_array;
	}
	function render_category_items($db_connection){
		$categories = array();
		$query = "SELECT * FROM categories";
		if($result = $db_connection->query($query)) {
			while ($row = $result->fetch_assoc()) {
				$categories[] = array('categoryId'=>$row['category_id'],'categoryname'=>$row['category_name']);
			}
		}
		return $categories;
	}
	function get_category_items($db_connection,$category_id){
		$category_list = array();
		$query = "SELECT * from items WHERE catagory_id = '$category_id'";
		$execute_query = $db_connection->query($query);
		foreach ($execute_query as $results) {
			$category_list[] = array('itemname'=>$results['item_name'],'itemid'=>$results['item_id']);
		}
		return $category_list;
	}
	function get_saved_items($db_connection,$user_id){
		$user_items = array();
		$query = " SELECT userbasket.item_id,items.item_name from userbasket,items  where userbasket.item_id=items.item_id and userbasket.user_id='$user_id'";
		if($result = $db_connection->query($query)){
			while ($row = $result->fetch_assoc()) {
				$user_items[] = array('itemId' => $row['item_id'],'itemName' => $row['item_name']);
			}
		}
		return $user_items;
	}
?>