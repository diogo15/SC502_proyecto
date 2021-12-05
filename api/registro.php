<?php
require "data-registro.php";
require_once "response.php";

use IntoTheZone\JsonResponse;

if(empty($_POST['nombre'])){
	new JsonResponse('badrequest', 'Falta parametro', NULL);
	die();
}
if(empty($_POST['apellidos'])){
	new JsonResponse('badrequest', 'Falta parametro', NULL);
	die();
}
if(empty($_POST['fechaNacimiento'])){
	new JsonResponse('badrequest', 'Falta parametro', NULL);
	die();
}
if(empty($_POST['correo'])){
	new JsonResponse('badrequest', 'Falta parametro', NULL);
	die();
}
if(empty($_POST['passwordConfirm'])){
	new JsonResponse('badrequest', 'Falta parametro', NULL);
	die();
}
if(empty($_POST['telefono'])){
	new JsonResponse('badrequest', 'Falta parametro', NULL);
	die();
}

$usuario = registrar_usuario($_POST["nombre"],$_POST["password"],$_POST["correo"],$_POST["fechaNacimineto"],$_POST["passwordConfirm"],$_POST["telefono"]);

if(empty($usuario))
{
	new JsonResponse('ok', 'user not added', NULL);
}
else
{
	new JsonResponse('ok', 'user added', $usuario);
}



