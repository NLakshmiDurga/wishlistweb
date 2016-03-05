<?php
	require_once '/var/www/html/Unirest/vendor/mashape/unirest-php/src/Unirest.php';
	// Creating a Request
	// $headers = array("Accept" => "application/json");
	// $body = array("foo" => "hellow", "bar" => "world");

	// $response = Unirest\Request::post("http://mockbin.com/request", $headers, $body);

	// $response->code;        // HTTP Status code
	// $response->headers;     // Headers
	// $response->body;        // Parsed body
	// $response->raw_body;    // Unparsed body
	// print_r($response->body);

	// File Uploads
	// $headers = array("Accept" => "application/json");
	// $body = array("file" => Unirest\File::add("/home/durga/lakshmi/Student.java"));

	// $response = Unirest\Request::post("http://mockbin.com/request", $headers, $body);
	// print_r($response->body);

	// Custom Entity Body
	$headers = array("Accept" => "application/json");
	$body =   json_encode(array("foo" => "hellow", "bar" => "world"));

	$response = Unirest\Request::get("http://google.com/?q=set", $headers, $body);
	// print_r($response);
	foreach ($response as $value) {
		echo $value;
	}
?>