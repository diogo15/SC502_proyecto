<?php
    class ConnectionDB {
        
        private $server;
        private $user;
        private $password;
        private $database;
        private $port;

        function __construct () {
            $dataList = $this -> connection();

            foreach ($dataList as $key => $value) {
                $this->server = $value ['server'];
                $this->user = $value ['user'];
                $this->password = $value ['password'];
                $this->database = $value ['database'];
                $this->port = $value ['port'];
            }

            $this->connection = new mysqli(
                $this->server,
                $this->user,
                $this->password,
                $this->database,
                $this->port
            );

            if ($this->connection->connect_errno) {
                echo "Fallo de Conexión a la base de datos";
                die();
            }

        }


            // Esta función obtendrá el JSON de config para realizar la conexión al DB de XAMPP
        private function connection() {
            $pathFile = dirname(__FILE__);  //Obtiene la ruta dentro del proyecto
            $jsonConfig = file_get_contents($pathFile . '/' . "config-local");  // Abrir, guardar y devolver un archivo

            return json_decode($jsonConfig, true);  // Convierte el archivo config en un array JSON propiamente
        }
            //  Los registros que entren a esta función los estandarizará a UTF-8**
            //  Como MySQL trabaja bajo esa nomenclatura creo que no hace falta añadir esta función, pero igualmente la consideré.
        private function formatUTF8 ($array) {

            array_walk_recursive($array, function(&$item, $key){
                if (!mb_detect_encoding($item, 'UTF-8', true)) {
                    
                    $item = utf8_encode($item);
                
                }
            });
            return $array;
        }

        public function getAllData($statement){
            $results = $this -> connection -> query($statement);
            $resultArray = array();

            foreach ($results as $key) {
                $resultArray[] = $key;
            }
            return $this -> formatUTF8($resultArray);
        }

        public function queryPrepared($query, $args)
        {
            $stmt = $this-> connection ->prepare($query);

            if ($stmt === false) {
                return [ 'status' => 'Preparacion Malaaa, cuenten BIEN los: ????' ];
            }

            $types = array_reduce($args, function($reduced, $type) {
                
                if (is_float($type))
                    $reduced .= 'd';
                elseif (is_integer($type))
                    $reduced .= 'i';
                elseif (is_string($type))    
                    $reduced .= 's';
                else
                    $reduced .= 'b';
                
                return $reduced;
            });

            $stmt->bind_param($types, ...$args);

            if ($stmt === false) {
                return [ 'status' => 'Binding de parametros malo :(' ];
            }

            $result = $stmt->execute() ? $stmt->get_result() : [ 'status' => $stmt->error ];

            $stmt->close();

            return $result;
        }

        //  INSERT ON TABLE (Afecta todas las filas de la tabla)

        public function insert($statement){
            $results = $this -> connection -> query($statement);
            
            return $this -> connection -> affected_rows;
        }

        //  INSERT ON TABLE BY ID (Afectaría una sola fila) = UPDATE?

        public function getById($statement){
            $results = $this -> connection -> query($statement);
            
            $rows = $this -> connection -> affected_rows;

            if ($rows >= 1) {

                return $this -> connection -> insert_id;

            } else {

                return 0;

            }
        }

        // Este método se usa para encriptar la contraseña que brinda el usuario
        // Esto para validar el logjn
        // MD5 es un formato de encriptación, útil para contraseñas
        protected function encript ($string) {
            return md5 ($string);
        }
        
    }
?>