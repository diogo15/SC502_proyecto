<?php 
    require_once 'connectionDB.php';

    class Auth extends ConnectionDB {

        public function login ($email, $password) {
            
            if (empty($email) || empty($password)) {
                // Cuando no se inserte un usuario o password en el form
                return 0;
    
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
            $query = "SELECT  idUsuario, passwordUsuario, nombreUser FROM usuarios WHERE mailUsuario = '".$usuario."' AND passwordUsuario = '".$password."' ";
            $datos = parent::getAllData($query);
                // Verificación de que exista la el parámetro en la base de datos
            if (!isset($datos[0]['idUsuario'])) {
                return 0;
            } else {
                session_start();
                $_SESSION['login']=1;
                $_SESSION['user']=$datos[0]['idUsuario'];
                $_SESSION['name']=$datos[0]['nombreUser'];
                return 1;            
            }
        }

        // Futura función para cuando un usuario se registra
    }

?>