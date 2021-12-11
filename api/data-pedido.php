<?php
require_once '../php/connectionDB.php';

function insert_pedido ($local, $repartido, $estado, $fecha, $paga) {
    $conexion = new ConnectionDB;
    
    $query = "INSERT INTO Pedidos (idLocal, idRepartidor, estadoPedido, fecha, paga) VALUES (?, ?, ?, ?, ?);";
    
	return $conexion->queryPrepared($query, [$local, $repartido, $estado, $fecha, $paga]);

}

function insert_detalle ($idPedido, $idProducto, $cantidad) {
    $conexion = new ConnectionDB;
    
    $statement = "Select * From productos where idProducto = '".(int)$idProducto."'";

    $producto = $conexion->getAllData($statement)[0];

    $totalLinea = (int)$producto["precioVenta"] * (int)$cantidad;
    
    $query = "INSERT INTO detallepedidos (idPedido, idProducto, cantidad, totalLinea) VALUES (?, ?, ?, ?);";
    
	return $conexion->queryPrepared($query, [$idPedido, $idProducto, $cantidad, $totalLinea]);

}

?>