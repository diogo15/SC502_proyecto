<?php
require_once "data-categories.php";
require_once "response.php";

use IntoTheZone\JsonResponse;


if(!empty($_GET['idCategoria']))
{
	$idCategoria = $_GET['idCategoria'];
	$cat = get_categoryById($idCategoria);
	
	if(empty($cat))
	{
		new JsonResponse('ok', 'Categories Not Found' );
	}
	else
	{
		new JsonResponse('ok', 'Category Found', $cat);
	}
	
}
else
{
	new JsonResponse('badrequest', 'Invalid Request' );
}



