<?php

function get_all_products()
{
	require_once '../php/connectionDB.php';

    $conexion = new ConnectionDB();
    $statement = "Select * From Productos";

    $cats = $conexion->getAllData($statement);

	return $cats;
	
}

// Agregar algun botón que selecciones únicamente los productos por categoría o marca


function get_products_by_cat () {
    require_once '../php/connectionDB.php';

    $conexion = new ConnectionDB();
    $statement = "SELECT * FROM Productos where nombreCategoria = ?";

    $cats = $conexion -> getAllData($statement);

    return $cats;
}
