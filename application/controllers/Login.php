<?php
/**
 * Created by PhpStorm.
 * User: durga
 * Date: 22/12/16
 * Time: 11:40 PM
 */
    header('Access-Control-Allow-Origin:*');
	$postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
	echo "\nemailid : ",$request->email;
	echo "\npassword : ",$request->pass;
	// echo "<script> console.log('i am in php file')</script>";
?>