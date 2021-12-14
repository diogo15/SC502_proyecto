<?php
require_once '../php/connectionDB.php';

function insert_pedido ($local, $repartido, $userID, $estado, $fecha, $paga) {

    $conexion = new ConnectionDB;
    
    $query = "INSERT INTO Pedidos (idLocal, idRepartidor, idUsuario, estadoPedido, fecha, paga) VALUES (?, ?, ?, ?, ?, ?);";
    
	return $conexion->queryPrepared($query, [$local, $repartido, $userID, $estado, $fecha, $paga]);

}

function insert_detalle ($idPedido, $idProducto, $cantidad) {

    $conexion = new ConnectionDB;
    
    $statement = "Select * From productos where idProducto = '".(int)$idProducto."'";

    $producto = $conexion->getAllData($statement)[0];

    $totalLinea = (int)$producto["precioVenta"] * (int)$cantidad;

    updateTotal($idPedido,$totalLinea);
    
    $query = "INSERT INTO detallepedidos (idPedido, idProducto, cantidad, totalLinea) VALUES (?, ?, ?, ?);";
    
	return $conexion->queryPrepared($query, [$idPedido, $idProducto, $cantidad, $totalLinea]);

}

function updateTotal($idPedido,$total){

    $conexion = new ConnectionDB;

    $statement = "SELECT * FROM pedidos WHERE idPedido  = '".(int)$idPedido."'";

    $pedido = $conexion->getAllData($statement)[0];

    $nuevoTotal = (int)$pedido["paga"] + $total;

    $query = "UPDATE pedidos SET paga = ? WHERE pedidos.idPedido = ?;";

    return $conexion->queryPrepared($query, [$nuevoTotal, $idPedido]);

}

?>