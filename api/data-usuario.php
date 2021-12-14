<?php
require_once '../php/connectionDB.php';


function get_usuario($userID)
{
    $conexion = new ConnectionDB();
    $statement = "Select mailUsuario,nombreUser From usuarios where idUsuario = '".(int)$userID."'";

    $user = $conexion->getAllData($statement);

	return $user;

}

function get_pedidosPasados($userID)
{
    $conexion = new ConnectionDB();
    $statement = "CALL spGetUsuarioPedido ('".(int)$userID."')";

    $historial = $conexion->getAllData($statement);

    $pedidosbyID = [];

    foreach ($historial as $pedido) {
        $pedidosbyID[$pedido['idPedido']][] = $pedido;
    }

	return $pedidosbyID;
}

