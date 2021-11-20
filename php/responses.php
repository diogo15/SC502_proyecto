<?php

    class Responses {
        
        private $response = [
            'status' => 'ok',
            'result' => array()
        ];

        public function error405(){
            $this -> response['status'] = "error";

            $this -> response['results'] = array(
                "error_id" => "405",
                "error_msg" => "Método inválido"
            );
            return $response;
        }

        public function error406($alert = "Datos incorrectos"){
            $this -> response['status'] = "error";

            $this -> response['results'] = array(
                "error_id" => "406",
                "error_msg" => $alert
            );
            return $response;
        }

        public function error407(){
            $this -> response['status'] = "error";

            $this -> response['results'] = array(
                "error_id" => "407",
                "error_msg" => "Datos incompletos"
            );
            return $response;
        }
    }

?>