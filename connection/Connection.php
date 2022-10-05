<?php
    //Creamos una clase que hereda de la clase Mysqli
    class Connection extends Mysqli{
        //Constructor
        function __construct() {
            parent::__construct('localhost' , 'root', '', 'db_name'); //Edite los campos dependiendo de su servidor y db

            $this->set_charset('utf8'); //Que tipo de datos obtenemos de la db
            $this->connect_error != NULL ? 'Conexión exitosa a la Base de Datos.' : die('Error al conectarse a la Base de Datos.') ; //Control de conexion a la base de datos
        }
    }
?>