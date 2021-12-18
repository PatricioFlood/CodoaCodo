<?php
// PDO PHP Data Object
class Conexion{
    private static string $user = "root";
    private static string $pass = "";
    private static string $host = "localhost";
    private static string $dbname = "ventas";
    private static $conexion = null;

    private static function instance(){
        try {
            self::$conexion = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname, self::$user, self::$pass);
            self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo("Hubo un error en la conexión: " . $e->getMessage());
        }
    }

    /**
     * Get the value of conexion
     */
    public static function getConexion(): PDO
    {
        if(self::$conexion === null){
            self::instance();
        }
        return self::$conexion;
    }
}