<?php
require_once "data-pedido.php";
require_once "response.php";

use IntoTheZone\JsonResponse;

if(!empty($_GET['total'])){
    //$datos = unserialize($_GET['items']);

	$pedido = insert_pedido("1" , "1", 0, '2021-12-22', $_GET['total']);

	if(isset($pedido["error"]))
	{
		new JsonResponse('ok', 'Pedido No Insertado', $pedido );
	}
	else
	{
		$detalle = insert_detalle($pedido["id"], 1, 1);

		if(isset($detalle["error"])){
			new JsonResponse('ok', 'Error al agregar Detalle', $detalle );
		}else{
			new JsonResponse('ok', 'Pedido y Detalle Agregado', array_merge($detalle,$pedido));
		}
		
	}
	
}
else
{
	new JsonResponse('badrequest', 'Invalid Request' );
}
?>