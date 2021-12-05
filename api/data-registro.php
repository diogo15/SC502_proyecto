<?php
require_once '../php/connectionDB.php';

function registrar_usuario($_POST["nombre"],$_POST["password"],$_POST["correo"],$_POST["fechaNacimineto"],$_POST["passwordConfirm"],$_POST["telefono"]);
{
    $conexion = new ConnectionDB();
    $statement =$conexion->prepare ("INSERT INTO `usuarios` (`idUsuario`, `nombreUser`, `apellido1Usuario`, `apellido2Ususario`, `passwordUsuario`, `mailUsuario`, `direccion`, `idRol`, `idPais`, `idProvincia`) VALUES ('', '', '', '', '', '', '', '', '', '');");
    $statement ->bind_param("issssssiii", &nombre, &apellido1, &apellido2, &password, &mail, &direccion, &rol, &pais, &provincia);
    $product = $conexion->getAllData($statement);

	return $product;
	
}
