<?php

header("Content-Type:application/json");
require "data-products.php";

$products = get_all_products();

if(empty($products))
{
	response(200,"products Not Found",NULL);
}
else
{
	response(200,"products Found",$products);
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



