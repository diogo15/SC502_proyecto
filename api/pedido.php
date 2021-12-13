<?php
require_once "data-pedido.php";
require_once "response.php";

use IntoTheZone\JsonResponse;

if(!empty($_POST['items'])){
	
    $items = json_decode($_POST['items'],true);

	$pedido = insert_pedido("1" , "1", 0, '2021-12-22', 0);

	if(isset($pedido["error"]))
	{
		new JsonResponse('ok', 'Pedido No Insertado', $pedido );
	}
	else
	{
		foreach($items as $item){
			$detalle = insert_detalle($pedido["id"], $item["idProducto"], $item["cantidad"]);
		}
		
		new JsonResponse('ok', 'Pedido y Detalle Agregado', $pedido );		
		
	}
	
}
else
{
	new JsonResponse('badrequest', 'Invalid Request' );
}
?>