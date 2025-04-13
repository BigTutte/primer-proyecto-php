<?php
namespace databases;

ini_set('display_errors', 1);
//SINGLETON: Una unica instancia de la clase puede existir.
//get_db_name para poder probar el singleton

ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class dbUsers { //database de usuarios

    private static $instance; //nuestra propiedad para poder chequear si ya existe
    private static $filePath = __DIR__ . '/../STORAGE/users.ser'; // archivo para persistencia, ruta relativa al directorio actual
    //COMO ME ESTA DANDO PROBLEMAS, por ahora vamos a usar SQLite
    //Ruta al archivo SQLite (porque MySQL me ta dando problemas)
    private static $dbFilePath = __DIR__ . '/../STORAGE/users.sqlite'; 
    private $dbName;
    private $username;
    private $password;
    private $sqlite = null; // Usamos SQLite en lugar de MySQLi
    private function __construct( //privada por la propiedad de singleton, para que no pueda ser instanciada
        $dbName,
        $username = null,
        $password = null
        ) {
        $this->dbName = $dbName;
        $this->username = $username;
        $this->password = $password;
        try {

            // Asegurar que el directorio existe
            $dir = dirname(self::$dbFilePath);

            //si no existe el directorio, lo creamos
            if (!is_dir($dir)) {
                mkdir($dir, 0755, true);
            }
            
            // Crear la conexión SQLite
            $this->sqlite = new \SQLite3(self::$dbFilePath);
            
            // Crear tabla si no existe
            $this->createTables();
            
            // Guardar metadata en un archivo, funcion mas abajo
            $this->saveMetadata();

        } catch (\Exception $e) {
            error_log("Error en la conexión a la base de datos: " . $e->getMessage());
            throw $e; // Re-lanzar la excepción para que el código que llama pueda manejarla
        }
    }

    // Método para obtener la instancia de la clase (Singleton)
    public static function openConnection($dbName, $username = null, $password = null) {
        if (self::$instance === null) { //si es la primera vez que se instancia, se crea
            try {
                //si ya existe el archivo de persistencia
                if (file_exists(self::$filePath)) { 
                    // Cargar metadata
                    $metadata = unserialize(file_get_contents(self::$filePath));
                    // Crear nueva instancia con los valores guardados
                    self::$instance = new self($metadata['dbName'], $metadata['username'], $metadata['password']);
                } else { //si no existe
                    // Crear nueva instancia
                    self::$instance = new self($dbName, $username, $password);
                }
            } catch (\Exception $e) {
                error_log("Error al abrir conexión: " . $e->getMessage());
                throw $e;
            }
        }
        return self::$instance;
    }

    // Guardar solo metadata, no la conexión
    private function saveMetadata() {
        $metadata = [
            'dbName' => $this->dbName,
            'username' => $this->username,
            'password' => $this->password
        ];
        
        // Asegurar que el directorio existe
        $dir = dirname(self::$filePath);
        if (!is_dir($dir)) {
            /*
            Creamos el directorio:
            El mismo necesita de 
                - la direccion (dir),
                - los permisos (0755) que en este caso indican que el propietario pueda leer, escribir y ejecutar
                  pero los demas solo leer y ejecutar, no escribir,
                - y true para que cree todos los directorios necesarios en la ruta
            */
            mkdir($dir, 0755, true);
        }
        
        //serializamos la metadata y la guardamos en el archivo
        file_put_contents(self::$filePath, serialize($metadata));
    }
    
    /*
    Crear la tabla de usuarios, si no existe
    En SQLite, la creación de tablas es más sencilla, tanto sintaxis como funcionalidad
    En este caso, no es necesario verificar si la tabla ya existe, ya que SQLite lo maneja automáticamente
    */
    private function createTables() {
        $this->sqlite->exec("
            CREATE TABLE IF NOT EXISTS users (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                username TEXT NOT NULL UNIQUE,
                password TEXT NOT NULL
            )
        ");
    }

    // Método para obtener la conexión SQLite
    public function getSQLite(): mixed {
        return $this->sqlite;
    }
    //IMPORTANTE: devolver mixed ya que puede ser mysqli o false (pero no asegura la integridad de datos devueltos)

    //getters
    public function get_username(): string {
        return $this->username ?? '';
    }

    public function get_password(): string { //dudoso, pero por mientras
        return $this->password ?? '';
    }
    public function get_host(): string {
        return 'sqlite'; // Para mantener compatibilidad con el código existente
    }
    //no tiene sentido agregar setters ya que el singleton no puede cambiar

    // Buscar usuario adaptado para SQLite
    public function dbFindUser($username, $password): bool {
        try {
            /*
            Preparar la consulta
            Usamos parámetros para evitar inyecciones SQL, un metodo adicional de seguridad que en un proyecto chico 
            no es taaaan necesario, pero pa practicar
            En SQLite, la sintaxis es un poco diferente a MySQLi, pero el concepto es el mismo
             
            */
            //En este caso, usamos SQLite3::prepare() para preparar la consulta
            $stmt = $this->sqlite->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
            if (!$stmt) {
                throw new \Exception("Error en la preparación de la consulta: " . $this->sqlite->lastErrorMsg());
            }
            //y luego SQLite3Stmt::bindValue() para enlazar los parámetros
            $stmt->bindValue(':username', $username, SQLITE3_TEXT);
            $stmt->bindValue(':password', $password, SQLITE3_TEXT);
            //Ejecutamos la consulta, lo cual devuelve un objeto SQLite3Result
            $result = $stmt->execute();
            
            // devolvemos el resultado de la consulta, en SQLite, el método fetchArray() devuelve false si no hay resultados
            return $result->fetchArray() !== false;
        } catch (\Exception $e) {
            error_log("Error al buscar usuario: " . $e->getMessage());
            return false;
        }
    }

    /*
    Método para registrar un nuevo usuario
    Este método verifica si el usuario ya existe y, si no, lo inserta en la base de datos
    */
    public function registerUser($username, $password): bool {
        try {
            // Verificar si el usuario ya existe
            // Preparamos la consulta
            $checkStmt = $this->sqlite->prepare("SELECT * FROM users WHERE username = :username");
            // Enlazamos el parámetro
            $checkStmt->bindValue(':username', $username, SQLITE3_TEXT);
            // Ejecutamos la consulta
            $checkResult = $checkStmt->execute();
            
            // Verificamos si el usuario ya existe, igual que arriba con fetchArray()
            if ($checkResult->fetchArray() !== false) {
                return false; // El usuario ya existe
            }
            
            // Insertar el nuevo usuario
            // Preparamos la consulta de inserción
            $stmt = $this->sqlite->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
            // bindeamos los parámetros
            $stmt->bindValue(':username', $username, SQLITE3_TEXT);
            $stmt->bindValue(':password', $password, SQLITE3_TEXT);
            //exec
            return $stmt->execute() !== false;
        } catch (\Exception $e) {
            error_log("Error al registrar usuario: " . $e->getMessage());
            return false;
        }
    }
}
?>