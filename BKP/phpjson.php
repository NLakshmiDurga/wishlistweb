<?php
require_once 'vendor/autoload.php';
include "connection.php";
function get_search_results($search_keyword){
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
		

$search_results = get_search_results("to");

$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);


$model['results'] =$search_results;
echo $twig->render('items_list_divs.html',$model);
?>
