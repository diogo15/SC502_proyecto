<?php

header("Content-Type:application/json");
require "data-categories.php";

$cats = get_categories();

if(empty($cats))
{
	response(200,"Categories Not Found",NULL);
}
else
{
	response(200,"Categories Found",$cats);
}


function response($status,$status_message,$data)
{
	header("HTTP/1.1 ".$status);
	
	$response['status']=$status;
	$response['status_message']=$status_message;
	$response['data']=$data;
	
	$json_response = json_encode($response);
	echo $json_response;
}



