<?php
require_once "data-pedido.php";
require_once "response.php";

use IntoTheZone\JsonResponse;

if(!empty($_GET['total'])){
    //$datos = unserialize($_GET['items']);

	$pedido = insert_pedido("1" , "1", false, '2021-12-22', $_GET['total']);
	


	if($pedido == false)
	{
		new JsonResponse('ok', 'Pedido No Insertado' );
	}
	else
	{
		new JsonResponse('ok', 'Pedido Agregado', $pedido);
	}
	
}
else
{
	new JsonResponse('badrequest', 'Invalid Request' );
}
?>