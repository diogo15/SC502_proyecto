<?php

require "data-products.php";
require_once "response.php";

use IntoTheZone\JsonResponse;

$products = get_all_products();

if(empty($products))
{
	new JsonResponse('ok', 'Products Not Found', NULL);
}
else
{
	new JsonResponse('ok', 'Products Found', $products);
}