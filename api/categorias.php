<?php

require_once "data-categories.php";
require_once "response.php";

use IntoTheZone\JsonResponse;

$cats = get_categories();

if(empty($cats))
{
	new JsonResponse('ok', 'Categories Not Found' );
}
else
{
	new JsonResponse('ok', 'Categories Found', $cats);
}




