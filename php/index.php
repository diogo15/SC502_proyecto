<?php 
    
    //testing
    require_once 'connectionDB.php';

    $conexion = new ConnectionDB();
    $statement = "Select * From Categorias";

    print_r($conexion->getAllData($statement));

?>