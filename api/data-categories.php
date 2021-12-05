<?php
require_once '../php/connectionDB.php';

function get_categories()
{
    $conexion = new ConnectionDB();
    $statement = "Select * From Categorias";

    $cats = $conexion->getAllData($statement);

	return $cats;
	
}

function get_category($name)
{
    $conexion = new ConnectionDB();
    $statement = "Select * From Categorias where nombreCategoria = '".pg_escape_string($name)."'";

    $cat = $conexion->getAllData($statement);

	return $cat;

	/*
	foreach($cats as $cat) {
		if($product==$name) { return $price; break; }
	}
	*/	
}

