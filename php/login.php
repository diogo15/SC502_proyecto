<?php
    require_once 'auth-class.php';

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        
        if ( isset($_REQUEST['email']) || isset($_REQUEST['password']) ) {
            $loginObject = new Auth;
            
            $submittedData = $loginObject -> login($_POST['email'], $_POST['password']);

        } else {
            echo 'Campos faltantes por rellenar';
        }
    } else {
        echo 'Método nó correspondiente!';
    }


?>