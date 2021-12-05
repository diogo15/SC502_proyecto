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
    $query = "INSERT INTO usuarios (nombreUser, apellido1Usuario, apellido2Usuario, passwordUsuario, mailUsuario) VALUES (?,?,?,?,?);";
    
	$conexion->queryPrepared($query,[$nombre, $apellido1, $apellido2, $password, $correo]);

    return false;
	
}
