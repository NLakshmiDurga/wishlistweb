<?php
require_once 'vendor/autoload.php';
// include "controllers.php";

$router = new AltoRouter();
$router->map( 'GET', '/searchitems/', 'search_controller#display_items','controllers');

?>