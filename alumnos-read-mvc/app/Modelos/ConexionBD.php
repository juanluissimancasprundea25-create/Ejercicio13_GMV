<?php

class ConexionBD
{
    private static $conexion = null;

    public static function obtenerConexion()
    {
        if (self::$conexion === null) {
            try {
                $host = 'localhost';
                $baseDatos = 'centro1';
                $usuario = 'root';
                $password = 'root123';
                
                $dsn = "mysql:host=$host;dbname=$baseDatos;charset=utf8mb4";
                self::$conexion = new PDO($dsn, $usuario, $password);
                self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                throw new Exception("No se ha podido conectar a la base de datos: " . $e->getMessage());
            }
        }
        return self::$conexion;
    }
}