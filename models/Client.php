<?php
    require_once ('connection/Connection.php');

    class Client {
        public static function getAll(){ //Obtener todos los datos de la db
            $db = new Connection();
            $query = 'SELECT * FROM table_name'; //Creamos la consulta
            $result = $db->query($query); //Realizamos la peticion a la db

            $data = array(); //Guardaremos los datos que regrese la db para luego retornarla

            if ($result->num_rows) { //Nos regresa la cantidad de lineas que hay en la tabla (0=false | 1=true)
                while ($row = $result->fetch_assoc()) { //Separaremos cada fila en $row
                    $data [] = array( //Llenamos el array con los datos obtenidos de la db
                        'id' => $row['id'],
                        'name' => $row['name'],
                    );
                }
            }
            return $data;
        }

        public static function getData($idUrl, $nameUrl){ //GET id u otro campo
            $db = new Connection();
            if($idUrl){ //Si me trae la id
                $query = 'SELECT * FROM table_name WHERE id = '.$idUrl.''; //Creamos la consulta para obtener el dato con esa misma id
            }else{
                $query = 'SELECT * FROM table_name WHERE name = '.$nameUrl.''; //Creamos la consulta para obtener el dato con ese mismo name
            }
            $result = $db->query($query); //Realizamos la peticion a la db

            $data = array(); //Guardaremos los datos que regrese la db para luego retornarla

            if ($result->num_rows) { //Nos regresa la cantidad de lineas que hay en la tabla (0=false | 1=true)
                while ($row = $result->fetch_assoc()) { //Separaremos cada fila en $row
                    $data [] = array( //Llenamos el array con los datos obtenidos
                        'id' => $row['id'],
                        'name' => $row['name'],
                    );
                }
            }
            
            return $data;
        }

        public static function insertData($name, $lastname){ //POST
            $db = new Connection();
            $query = 'INSERT INTO table_name (name, lastname) 
                        VALUES(\''.$name.'\', \''.$lastname.'\')'; //Creamos la consulta de insercion
            $db->query($query); //Realizamos la peticion a la db

            if ($db->affected_rows) { //Controla que se haya hecho una insercion a la db
                return true;
            }
            return false;
        }

        public static function updateData($idUrl, $name, $lastname){ //UPDATE
            $db = new Connection();
            $query = 'UPDATE table_name SET name=\''.$name.'\', lastname=\''.$lastname.'\' WHERE id='.$idUrl.';'; //Creamos la consulta de modificacion
            $db->query($query); //Realizamos la peticion a la db

            if ($db->affected_rows) { //Controla que se haya hecho una insercion a la db
                return true;
            }
            return false;
        }

        public static function deleteData($idUrl){ //DELETE
            $db = new Connection();
            $query = 'DELETE FROM table_name WHERE id='.$idUrl.''; //Creamos la consulta de eliminacion con el id que vamos a eliminar
            $db->query($query); //Realizamos la peticion a la db

            if ($db->affected_rows) { //Controla que se haya hecho una insercion a la db
                return true;
            }

            return false;
        }
    }

    //NOTA: creamos funciones estaticas para que en el index no tener que instancia la clase (Client) para poder acceder a estos metodos
?>