<?php
    require_once 'auth-class.php';

    session_start();
    
    $authObject = new auth;

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        
        $submittedData = file_get_contents("php://input");

        $dataArray = $authObject -> login($submittedData);
        print_r (json_encode($dataArray));

    } else {
        echo 'Método nó correspondiente!';
    }


?>