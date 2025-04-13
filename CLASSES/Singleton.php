<?php
//SINGLETON: Una unica instancia de la clase puede existir.
//get_db_name para poder probar el singleton

namespace databases;

class dbConnection { //eventualmente referenciara a la clase de conexion a la base de datos que guardara el historial de pelis de marvel

    private static $connection; //nuestra propiedad para poder chequear si ya existe
    private static $filePath = '/path/to/connection.ser'; // archivo para persistencia
    private $mysqli; // propiedad para la conexión MySQLi

    private function __construct( //privada por la propiedad de singleton, para que no pueda ser instanciada
        private $dbName,
        private $username,
        private $password,
        private $host = 'localhost' //TODO: Verificar como indicarle el host. Por ahora, ya que es un mock. 
    ) {
        // Crear la conexión MySQLi
        $this->mysqli = new \mysqli($this->host, $this->username, $this->password, $this->dbName);

        // Verificar la conexión
        if ($this->mysqli->connect_error) {
            die("Connection failed: " . $this->mysqli->connect_error);
        }

        // Guardar la instancia en un archivo para persistencia
        file_put_contents(self::$filePath, serialize($this));
    }

    public static function openConnection($dbName, $username, $password){ //instancia si existe, crea e instancia si no existe.
        if (!isset(self::$connection)) { //si no existe la clase aun creada
            if (file_exists(self::$filePath)) {
                // Recuperar la instancia desde el archivo
                self::$connection = unserialize(file_get_contents(self::$filePath));
            } else {
                self::$connection = new dbConnection($dbName, $username, $password); //la creo por primera vez
            }
        }
        // Si ya existe, simplemente devuelve la instancia existente
        return self::$connection;
    }

    // Método para obtener la conexión MySQLi
    //IMPORTANTE: devolver mixed ya que puede ser mysqli o false (pero no asegura la integridad de datos devueltos)
    public function getMysqli(): mixed {
        return $this->mysqli;
    }

    //getters
    public function get_db_name(): string {
        return $this->dbName;
    }

    public function get_username(): string {
        return $this->username;
    }

    public function get_password(): string {
        return $this->password;
    }
    public function get_host(): string {
        return $this->host;
    }
    //setters? no tiene sentido ya que el singleton no puede cambiar
}
    $newConnection = dbConnection::openConnection('persona', 'Matteo', 'matteo123'); //observar que new no funciona aca ya que el constructor es privado
    echo $newConnection->get_db_name();
    echo '<br>';
    $siguienteConexion = dbConnection::openConnection('lugares', 'Matteo', 'matteo123');
    echo $siguienteConexion->get_db_name(); //no se instancio de nuevo, ya que la propiedad es estatica y ya existe

    // Ejemplo de uso de la conexión MySQLi
    $mysqli = $newConnection->getMysqli();
    $result = $mysqli->query("SELECT * FROM users");
    while ($row = $result->fetch_assoc()) {
        echo $row['username'] . '<br>';
    }
?>