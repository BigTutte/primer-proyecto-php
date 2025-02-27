<?php
//SINGLETON: Una unica instancia de la clase puede existir.
//get_db_name para poder probar el singleton


class miConexion {

    private static $connection; //nuestra propiedad para poder chequear si ya existe

    private function __construct( //privada porm la propiedad de singleton, para que no pueda ser instanciada
        private $dbName,
        private $username,
        private $password,
        private $host = 'localhost';
    ) {

    }


    public static function openConnection($dbName, $username, $password){ //instancia si existe, crea e instancia si no existe.
        if (!isset(self::$connection)) {
            self::$connextion = new  miConexion($dbName, username, $password);
        }

        return self::$connection;
    }
    
<?