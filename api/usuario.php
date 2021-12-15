<?php

require_once "data-usuario.php";
require_once "response.php";

use IntoTheZone\JsonResponse;

session_start();

if(isset($_SESSION['user']))
{
	$uid = $_SESSION['user'];
	
	$usuario = get_usuario($uid);

	$pedidos = get_pedidosPasados($uid);
	
	if(empty($usuario))
	{
		new JsonResponse('ok', 'User Not Found' );
	}
	else
	{
		new JsonResponse('ok', 'User Found', [$usuario,$pedidos]);
	}
}
else
{
	new JsonResponse('badrequest', 'Invalid Request' );
}