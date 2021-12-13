<?php
require_once '../php/connectionDB.php';

function get_marcas()
{
    $conexion = new ConnectionDB();
    $statement = "Select * From marcas";

    $marcs = $conexion->getAllData($statement);

	return $marcs;
	
}

function get_marca($name)
{
    $conexion = new ConnectionDB();
    $statement = "Select * From marcas where nombreMarca = '".$name."'";

    $marc = $conexion->getAllData($statement);

	return $marc;

	/*
	foreach($cats as $cat) {
		if($product==$name) { return $price; break; }
	}
	*/	
}
function get_marcaById($id)
{
    $conexion = new ConnectionDB();
    $statement = "Select * From marcas where idMarca =".(int)$id;
	
    $marc = $conexion->getAllData($statement);

	return $marc;

	/*
	foreach($cats as $cat) {
		if($product==$name) { return $price; break; }
	}
	*/	
}
