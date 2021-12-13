<?php
require_once "data-marcas.php";
require_once "response.php";

use IntoTheZone\JsonResponse;


if(!empty($_GET['idMarca']))
{
	$idMarca = $_GET['idMarca'];
	$marc = get_marcaById($idMarca);
	
	if(empty($marc))
	{
		new JsonResponse('ok', 'Categories Not Found' );
	}
	else
	{
		new JsonResponse('ok', 'Category Found', $marc);
	}
	
}
else
{
	new JsonResponse('badrequest', 'Invalid Request' );
}