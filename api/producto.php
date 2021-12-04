<?php

require_once "data-products.php";
require_once "response.php";

use IntoTheZone\JsonResponse;

if(!empty($_GET['pid']) && is_numeric($_GET['pid']))
{
	$pid = $_GET['pid'];
	
	$product = get_product($pid);
	
	if(empty($product))
	{
		new JsonResponse('ok', 'Product Not Found', NULL);
	}
	else
	{
		new JsonResponse('ok', 'Product Found', $product);
	}
	
}
else
{
	new JsonResponse('badrequest', 'Invalid Request', NULL);
}
