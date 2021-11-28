<?php 
    require_once 'connectionDB.php';

    class auth extends ConnectionDB {

        public function login ($JSON) {
            $datos = json_decode ($JSON, true);
            
            if (!isset($datos['usuario']) || !isset($datos['password'])) {
                // Cuando no se inserte un usuario o password en el form
                echo 'Datos faltantes';
    
            } else {
                // Cuando sí se insertó al menos un campo
                $usuario = $datos['usuario'];
                $password = $datos['password'];
                // parent:: para utilizar funciones protegidas de las clases de las que se hereda
                $password = parent::encript($password);
                $datos = $this -> getDataUser($usuario);
            }
        }
        
        // Función para cuando un usuario se logea
        private function getDataUser ($usuario) {
            $query = "SELECT  idUsuario, passwordUsuario FROM usuarios WHERE nombreUser = '$usuario'";
            $datos = getAllData($query);
                // Verificación de que exista la el parámetro en la base de datos
            if (!isset($datos[0]['idUsuario'])) {
                return $datos;
            } else {
                return 0;
            }
        }

        // Futura función para cuando un usuario se registra
    }

?>