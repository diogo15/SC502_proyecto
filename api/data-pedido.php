<?php
require_once '../php/connectionDB.php';

function insert_pedido ($local, $repartido, $estado, $fecha, $paga) {
    $conexion = new ConnectionDB;
    
    $query = "INSERT INTO Pedidos (idLocal, idRepartidor, estadoPedido, fecha, paga) VALUES (?, ?, ?, ?, ?);";
    
	return $conexion->queryPrepared($query, [$local, $repartido, $estado, $fecha, $paga]);

}

?>