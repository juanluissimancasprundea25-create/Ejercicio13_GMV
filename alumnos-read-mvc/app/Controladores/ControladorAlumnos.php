<?php

require_once __DIR__ . '/../Modelos/RepositorioAlumnos.php';

class ControladorAlumnos
{
    private $repositorio;

    public function __construct()
    {
        $this->repositorio = new RepositorioAlumnos();
    }

    public function listar()
    {
        try {
            $alumnos = $this->repositorio->obtenerTodos();
            $this->renderizar('alumnos/listar', ['alumnos' => $alumnos]);
        } catch (Exception $e) {
            $this->registrarError('listar', $e);
            $this->renderizar('alumnos/listar', [
                'alumnos' => [],
                'error' => 'No hemos podido cargar a los alumnos , sorry : ('
            ]);
        }
    }

    private function renderizar($vista, $datos = [])
    {
        extract($datos);
        $vistaContenido = __DIR__ . '/../Vistas/' . $vista . '.php';
        require __DIR__ . '/../Vistas/layout.php';
    }

    private function registrarError($contexto, $e)
    {
        $rutaLog = __DIR__ . '/../../storage/errores.log';
        $linea = "[" . date('Y-m-d H:i:s') . "] [$contexto] " . $e->getMessage() . "\n";
        file_put_contents($rutaLog, $linea, FILE_APPEND);
    }
}