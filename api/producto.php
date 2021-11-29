<?php

header("Content-Type:application/json");
require "data-products.php";

if(!empty($_GET['pid']) && is_numeric($_GET['pid']))
{
	$pid = $_GET['pid'];
	
	$product = get_product($pid);
	
	if(empty($product))
	{
		response(200,"product Not Found",NULL);
	}
	else
	{
		response(200,"product Found",$product);
	}
	
}
else
{
	response(400,"Invalid Request",NULL);
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



