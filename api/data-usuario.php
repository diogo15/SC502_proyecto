<?php
require_once '../php/connectionDB.php';


function get_usuario($userID)
{
    $conexion = new ConnectionDB();
    $statement = "Select mailUsuario,nombreUser From usuarios where idUsuario = '".$userID."'";

    $user = $conexion->getAllData($statement);

	return $user;

}

function get_pedidosPasados($userID)
{
    $conexion = new ConnectionDB();
    $statement = "CALL spGetUsuarioPedido ('".$userID."')";

    $historial = $conexion->getAllData($statement);

	return $historial;
}

