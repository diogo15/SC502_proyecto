<?php
require_once '../php/connectionDB.php';

function registrar_usuario($nombre,$password,$correo,$fechaNacimineto,$passwordConfirm,$telefono){
    $conexion = new ConnectionDB();
    $rol = 1;
    $pais = 1;
    $provincia = 1;
    $apellido1 = "";
    $apellido2 = "";
    $direccion = "San Jose, Costa Rica";
    $statement =$conexion->prepare ("INSERT INTO `usuarios` (`nombreUser`, `apellido1Usuario`, `apellido2Ususario`, `passwordUsuario`, `mailUsuario`, `direccion`, `idRol`, `idPais`, `idProvincia`) VALUES ('?', '?', '?', '?', '?', '?', '?', '?', '?');");
    $statement ->bind_param("ssssssiii", $nombre, $apellido1, $apellido2, $password, $correo, $direccion, $rol, $pais, $provincia);
    $product = $conexion->getAllData($statement);

	return $product;
	
}
