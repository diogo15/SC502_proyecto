<?php
require_once '../php/connectionDB.php';

function get_product($pid)
{
    $conexion = new ConnectionDB();
    $statement = "SELECT * FROM productos p INNER JOIN marcas m ON p.idMarca = m.idMarca INNER JOIN categorias c ON c.idCategoria = p.idCategoria WHERE p.idProducto='".$pid."'";

    $product = $conexion->getAllData($statement);

	return $product;
	
}

function get_all_products()
{
    $conexion = new ConnectionDB();
    $statement = "Select * From Productos";

    $cats = $conexion->getAllData($statement);

	return $cats;
	
}

// Agregar algun botón que selecciones únicamente los productos por categoría o marca

function get_productosByCategory($idCategory) {

    $conexion = new ConnectionDB();
    $statement = "SELECT * FROM productos where idCategoria = ".(int)$idCategory;

    $products = $conexion -> getAllData($statement);

    return $products;
}
