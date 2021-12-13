<?php
    require_once 'auth-class.php';
    header("Content-Type:application/json");

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        
        if ( isset($_REQUEST['email']) || isset($_REQUEST['password']) ) {
            $loginObject = new Auth;
            $login = array( "login" => "0" );
            
            $submittedData = $loginObject -> login($_POST['email'], $_POST['password']);

            if($submittedData == 1){
                $login = array( "login" => $submittedData );
                response(200,"User Logged in",$login);
            }else{
                response(200,"Wrong password or user",$login);
            }

        } else {
            response(400,"Field Empty",$login);
        }
    } else {
        response(400,"Wrong Method",$login);
    }

    function response($status,$status_message,$data)
    {
        header("HTTP/1.1 ".$status);
        
        $response['status']=$status;
        $response['status_message']=$status_message;
        $response['data']=$data;
        
        $json_response = json_encode($response);
        echo $json_response;
    }
?>