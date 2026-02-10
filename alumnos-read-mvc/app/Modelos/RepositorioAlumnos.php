<?php

require_once __DIR__ . '/ConexionBD.php';
require_once __DIR__ . '/Alumno.php';

class RepositorioAlumnos
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = ConexionBD::obtenerConexion();
    }

    public function obtenerTodos()
    {
        try {
            $sql = "SELECT id, nombre, email, edad, fecha_creacion FROM alumnos ORDER BY fecha_creacion DESC";
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute();
            
            $alumnos = [];
            while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $alumno = new Alumno(
                    $fila['id'],
                    $fila['nombre'],
                    $fila['email'],
                    $fila['edad'],
                    $fila['fecha_creacion']
                );
                $alumnos[] = $alumno;
            }
            
            return $alumnos;
        } catch (PDOException $e) {
            throw new Exception("No hemos podido encontrar ningun alumno: " . $e->getMessage());
        }
    }
}