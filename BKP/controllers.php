<?php
require_once 'vendor/autoload.php';
include "connection.php";
include "models.php";	


class search_controller {
    public function display_items($args) {
        $search_results = get_search_results_model("to");
		$loader = new Twig_Loader_Filesystem('templates');
		$twig = new Twig_Environment($loader);
		$model['results'] =$search_results;
		echo $twig->render('items_list.html',$model);
    }
?>