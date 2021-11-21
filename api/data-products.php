<?php

function get_all_products()
{
	require_once '../php/connectionDB.php';

    $conexion = new ConnectionDB();
    $statement = "Select * From Productos";

    $cats = $conexion->getAllData($statement);

	return $cats;
	
}


