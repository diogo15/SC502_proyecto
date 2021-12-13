<?php

require "data-products.php";
require_once "response.php";

use IntoTheZone\JsonResponse;

$products = get_all_products();

if(!empty($_GET['idCategoria']))
{
	$idCat = $_GET['idCategoria'];
	$products = get_productosByCategory($idCat);
	
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