<?php

header("Content-Type:application/json");
require "data-registro.php";
if(empty($_POST['nombre'])){
	response(400,"Falta parametro",NULL);
	die();
}
if(empty($_POST['apellidos'])){
	response(400,"Falta parametro",NULL);
	die();
}
if(empty($_POST['fechaNacimiento'])){
	response(400,"Falta parametro",NULL);
	die();
}
if(empty($_POST['correo'])){
	response(400,"Falta parametro",NULL);
	die();
}
if(empty($_POST['passwordConfirm'])){
	response(400,"Falta parametro",NULL);
	die();
}
if(empty($_POST['telefono'])){
	response(400,"Falta parametro",NULL);
	die();
}

$usuario = registrar_usuario($_POST["nombre"],$_POST["password"],$_POST["correo"],$_POST["fechaNacimineto"],$_POST["passwordConfirm"],$_POST["telefono"]);

if(empty($usuario))
{
	response(200,"user not added",NULL);
}
else
{
	response(200,"user added",$usuario);
}

}
function response($status,$status_message,$data)
{
	header("HTTP/1.1 ".$status);
	
	$response['status']=$status;
	$response['status_message']=$status_message;
	$response['data']=$data;
	
	$json_response = json_encode($response);
	echo $json_response;
}



