<?php

require "data-products.php";
require_once "response.php";

use IntoTheZone\JsonResponse;

$products = get_all_products();

if(!empty($_GET['idMarca']))
{
	$idMarca = $_GET['idMarca'];
	$products = get_productosByMarca($idMarca);
	
	if(empty($products))
	{
		new JsonResponse('ok', 'products Not Found' );
	}
	else
	{
		new JsonResponse('ok', 'Products Found', $products);
	}
	
}
else
{
	new JsonResponse('badrequest', 'Invalid Request' );
}