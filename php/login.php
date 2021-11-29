<?php
    require_once 'auth-class.php';
    header("Content-Type:application/json");

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        
        if ( isset($_REQUEST['email']) || isset($_REQUEST['password']) ) {
            $loginObject = new Auth;
            
            $submittedData = $loginObject -> login($_POST['email'], $_POST['password']);

            echo '{login : "'.$submittedData.'"}';

        } else {
            echo '{login : "0"}';
        }
    } else {
        echo '{login : "0"}';
    }


?>