<?php
require_once '../php/connectionDB.php';

function prepare_detalle () {
    $conexion = new ConnectionDB;
    $statement = "INSERT INTO DetallePedido VALUES ()";

    $detalle = $conexion -> insert();
}

function insert_pedido () {
    $conexion = new ConnectionDB;
    $statement = "";
}

?>