<?php
require "data-registro.php";
require_once "response.php";

use IntoTheZone\JsonResponse;

if(empty($_POST['nombre'])){
	new JsonResponse('badrequest', 'Falta nombre');
	die();
}
if(empty($_POST['apellidos'])){
	new JsonResponse('badrequest', 'Falta apellidos');
	die();
}
if(empty($_POST['fechaNacimiento'])){
	new JsonResponse('badrequest', 'Falta fechaNacimiento');
	die();
}
if(empty($_POST['correo'])){
	new JsonResponse('badrequest', 'Falta correo');
	die();
}
if(empty($_POST['passwordConfirm'])){
	new JsonResponse('badrequest', 'Falta passwordConfirm');
	die();
}
if(empty($_POST['telefono'])){
	new JsonResponse('badrequest', 'Falta telefono');
	die();
}

$usuario = registrar_usuario($_POST["nombre"],$_POST["password"],$_POST["correo"],$_POST["fechaNacimiento"],$_POST["passwordConfirm"],$_POST["telefono"]);

if(isset($usuario["error"]))
{
	new JsonResponse('ok', 'user not added');
}
else
{
	new JsonResponse('ok', 'user added');
}



