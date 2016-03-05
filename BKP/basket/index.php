<?php
include "connection.php";
include "controllers.php";
$db_connection = get_sql_connection();
$uri=parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
// echo $uri;
if('/basket/index.php/searchitems' === $uri && isset($_GET['search'])){
	// echo "You have entered ",$_GET['search'];
	echo search_controller($db_connection,$_GET['search']);
}
elseif ('/basket/index.php/categories' === $uri) {
	// echo "You have entered categories";
	echo categories_controller($db_connection);
}
elseif ('/basket/index.php/saveditems' === $uri) {
	echo saved_items_controller($db_connection);
}
elseif ('/basket/index.php/get_saved_items' === $uri && isset($_GET['categoryid'])) {
	echo get_category_items_controller($db_connection,$_GET['categoryid']);
}
?>