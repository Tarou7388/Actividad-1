<?php
require_once 'Conexion.php';

class Estudiantes extends Conexion
{

    private $pdo;

    public function __CONSTRUCT()
    {
        $this->pdo = parent::getConexion();
    }

    // Ingresar al sistema
    public function ListarEstudiantes()
    {
        try {
            $consulta = $this->pdo->prepare("CALL spu_listar_estudiantes");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    // Registrar a un usuario nuevo
    public function RegistrarEstudiante($data = [])
    {
        try {
            $consulta = $this->pdo->prepare("CALL spu_agregar_estudiante(?,?,?,?,?,?)");
            $consulta->execute(
                array(
                    $data['nombres'],
                    $data['apellidos'],
                    $data['grado'],
                    $data['seccion'],
                    $data['canCursos'],
                    $data['turno']
                )
            );
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }
    public function EliminarEstudiante($data = [])
    {
        try {
            $consulta = $this->pdo->prepare("CALL spu_eliminar_estudiante(?)");
            $consulta->execute(
                array(
                    $data['idEstudiante']
                )
            );
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }
    public function ActualizarEstudiante($data = [])
    {
        try {
            $consulta = $this->pdo->prepare("CALL spu_actualizar_estudiante(?,?,?,?,?,?,?)");
            $consulta->execute(
                array(
                    $data['idEstudiante'],
                    $data['nombres'],
                    $data['apellidos'],
                    $data['grado'],
                    $data['seccion'],
                    $data['canCursos'],
                    $data['turno']
                )
            );
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }
}