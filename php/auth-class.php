<?php 
    require_once 'connectionDB.php';

    class Auth extends ConnectionDB {

        public function login ($email, $password) {
            
            if (empty($email) || empty($password)) {
                // Cuando no se inserte un usuario o password en el form
                echo 'Datos faltantes';
    
            } else {
                // Cuando sí se insertó al menos un campo
                $usuario = $email;
                $pass = $password;
                // parent:: para utilizar funciones protegidas de las clases de las que se hereda
                $pass = parent::encript($pass);
                $datos = $this -> getDataUser($usuario);

                return $datos;
            }
        }
        
        // Función para cuando un usuario se logea
        private function getDataUser ($usuario) {
            $query = "SELECT  idUsuario, passwordUsuario FROM usuarios WHERE mailUsuario = '$usuario'";
            $datos = getAllData($query);
                // Verificación de que exista la el parámetro en la base de datos
            if (!isset($datos[0]['idUsuario'])) {
                return true;
            } else {
                return false;
            }
        }

        // Futura función para cuando un usuario se registra
    }

?>