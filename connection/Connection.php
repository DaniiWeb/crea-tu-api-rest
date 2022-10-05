<?php
    //Creamos una clase que hereda de la clase Mysqli
    class Connection extends Mysqli{
        //variables
        private $host = "localhost";
        private $user = "root";
        private $password = "";
        private $db = "api_rest";

        //Constructor
        function __construct() {
            parent::__construct($this->host, $this->user, $this->password, $this->db); 

            $this->set_charset('utf8'); //Que tipo de datos obtenemos de la db
            $this->connect_error != NULL ?  die('Error al conectarse a la Base de Datos.') : 'Conexión exitosa a la Base de Datos.' ; //Control de conexion a la base de datos
        }
    }
?>