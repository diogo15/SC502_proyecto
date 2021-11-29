<?php 
    require_once 'connectionDB.php';

    class Auth extends ConnectionDB {

        public function login ($email, $password) {
            
            if (empty($email) || empty($password)) {
                // Cuando no se inserte un usuario o password en el form
                echo 'Datos faltantes';
    
            } else {
                // Cuando sí se insertó al menos un campo
                // parent:: para utilizar funciones protegidas de las clases de las que se hereda
                $pass = parent::encript($password);
                $datos = $this -> getDataUser($email, $pass);

                return $datos;
            }
        }
        
        // Función para cuando un usuario se logea
        private function getDataUser ($usuario, $password) {
            $query = "SELECT  idUsuario, passwordUsuario FROM usuarios WHERE mailUsuario = '".$usuario."' AND passwordUsuario = '".$password."' ";
            $datos = parent::getAllData($query);
                // Verificación de que exista la el parámetro en la base de datos
            if (!isset($datos[0]['idUsuario'])) {
                return 0;
            } else {
                return 1;
            }
        }

        // Futura función para cuando un usuario se registra
    }

?>