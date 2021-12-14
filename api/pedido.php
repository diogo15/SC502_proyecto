<?php
require_once "data-pedido.php";
require_once "response.php";

use IntoTheZone\JsonResponse;

session_start();

if(!empty($_POST['items']) && isset($_SESSION['user'])){
	$userID = $_SESSION['user'];
	
    $items = json_decode($_POST['items'],true);

	$fecha = date('y-m-d');

	$pedido = insert_pedido("1" , "1", $userID, 0, $fecha, 0);

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