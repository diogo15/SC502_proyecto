<?php
    require_once 'auth-class.php';

    $authObject = new auth;

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $submittedData = file_get_contents("php://input");

        print_r ($submittedData);

        //$dataArray = $authObject -> login($submittedData);
        //print_r (json_encode($dataArray));

    } else {
        echo 'Método nó correspondiente!';
    }


?>