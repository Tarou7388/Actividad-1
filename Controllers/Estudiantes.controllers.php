<?php
session_start();
require_once '../Models/Estudiantes.php';
$estudiantes = new Estudiantes();

if (isset ($_POST['operacion'])) {
    if ($_POST['operacion'] == 'RegistrarEstudiante') {
        $datos = [
            "nombres" => $_POST["nombres"],
            "apellidos" => $_POST["apellidos"],
            "grado" => $_POST["grado"],
            "seccion" => $_POST["seccion"],
            "canCursos" => $_POST["canCursos"],
            "turno" => $_POST["turno"]
        ];
        $resultado = $estudiantes->RegistrarEstudiante($datos);
        echo json_encode($resultado);
    }
    if ($_POST['operacion'] == 'EliminarEstudiante') {
        $datos = ["idEstudiante" => $_POST["idEstudiante"]];
        $resultado = $estudiantes->EliminarEstudiante($datos);
        echo json_encode($resultado);
    }
}

if (isset ($_GET['operacion'])) {
    if ($_GET['operacion'] == 'ListarEstudiantes') {
        $resultado = $estudiantes->ListarEstudiantes();
        echo json_encode($resultado);
    }
}