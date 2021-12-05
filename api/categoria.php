<?php
require_once "data-categories.php";
require_once "response.php";

use IntoTheZone\JsonResponse;


if(!empty($_GET['name']))
{
	$name = $_GET['name'];
	$cat = get_category($name);
	
	if(empty($cat))
	{
		new JsonResponse('ok', 'Categories Not Found', NULL);
	}
	else
	{
		new JsonResponse('ok', 'Category Found', $cat);
	}
	
}
else
{
	new JsonResponse('badrequest', 'Invalid Request', NULL);
}



