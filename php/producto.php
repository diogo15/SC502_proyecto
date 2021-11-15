<?php 
    include_once 'connectionDB.php';


    class Producto extends connectionDB {
        function GET_PRODUCTO () {
            $query = $this->connect()->query('SELECT * FROM PRODUCTO');

            return $query;
        }
    }
?>