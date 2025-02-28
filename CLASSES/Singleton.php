<?php
//SINGLETON: Una unica instancia de la clase puede existir.
//get_db_name para poder probar el singleton

namespace databases;

class dbConnection { //eventualmente referenciara a la clase de conexion a la base de datos que guardara el historial de pelis de marvel

    private static $connection; //nuestra propiedad para poder chequear si ya existe

    private function __construct( //privada porm la propiedad de singleton, para que no pueda ser instanciada
        private $dbName,
        private $username,
        private $password,
        private $host = 'localhost'
    ) {

    }


    public static function openConnection($dbName, $username, $password){ //instancia si existe, crea e instancia si no existe.
        if (!isset(self::$connection)) { //si no existe la clase aun creada
            self::$connection = new  dbConnection($dbName, $username, $password); //la creo por primera vez
        }

        return self::$connection;
    }
    //getters
    public function get_db_name() {
        return $this->dbName;
    }

    public function get_username() {
        return $this->username;
    }

    public function get_password() {
        return $this->password;
    }
    public function get_host() {
        return $this->host;
    }
    //setters? no tiene sentido ya que el singleton no puede cambiar
}
    $newConnection = dbConnection::openConnection('persona', 'Matteo', 'matteo123'); //observar que new no funciona aca ya que el constructor es privado
    echo $newConnection->get_db_name();
    echo '<br>';
    $siguienteConexion = dbConnection::openConnection('lugares', 'Matteo', 'matteo123');
    echo $siguienteConexion->get_db_name(); //no se instancio de nuevo, ya que la propiedad es estatica y ya existe
?>