<?php
require_once '../php/connectionDB.php';

function registrar_usuario=($_POST["nombre"],$_POST["password"],$_POST["correo"],$_POST["fechaNacimineto"],$_POST["passwordConfirm"],$_POST["telefono"]);
{
    $conexion = new ConnectionDB();
    $statement = "INSERT INTO `usuarios` (`idUsuario`, `nombreUser`, `apellido1Usuario`, `apellido2Ususario`, `passwordUsuario`, `mailUsuario`, `direccion`, `idRol`, `idPais`, `idProvincia`) VALUES ('1', 'luis', 'luis', 'luis', 'luis', 'luis', 'luis', '1', '1', '5');";

    $product = $conexion->getAllData($statement);

	return $product;
	
}
