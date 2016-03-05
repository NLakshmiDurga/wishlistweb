<?php
	function render_json_search_results_view($search_results){
		$json_search_results = json_encode($search_results);
		return $json_search_results;
	}
	function render_json_categories($categories){
		$json_categories = json_encode($categories);
		return $json_categories;
	}
	function render_json_category_items($category_items){
		$json_category_items = json_encode($category_items);
		return $json_category_items;
	}
	function render_json_saved_items($saved_items){
		$json_saved_items = json_encode($saved_items);
		return $json_saved_items;
	}
	function render_html_search_results($search_results){
		echo "<ul>";
		foreach ($search_results as $results) {
		echo "<li>".$results['itemname']."<input type=checkbox></li>";
		}
		echo "</ul>";
	}
?>