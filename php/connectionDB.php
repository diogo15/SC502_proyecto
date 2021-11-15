<?php
    class Database {
    
        function connectionDB () {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "WebPage";

            $connection = new msqli($servername, $username, $password, $dbname);

            if (!$connection) {
                die("Fallo al Conectar: " . msqli_connect_error());
            }
            
            echo "Conexión efectuada!";

        }

    }
?>