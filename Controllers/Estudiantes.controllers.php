<?php
session_start();
require_once '../Models/Estudiantes.php';
$estudiante = new Estudiantes();

if (isset($_POST['operacion'])) {
    if ($_POST['operacion'] == 'RegistrarEstudiante') {
        $datos = [
            "nombres" => $_POST["nombres"],
            "apellidos" => $_POST["apellidos"],
            "grado" => $_POST["grado"],
            "seccion" => $_POST["seccion"],
            "canCursos" => $_POST["canCursos"],
            "turno" => $_POST["turno"]
        ];
        $resultado = $estudiante->RegistrarEstudiante($datos);
        echo json_encode($resultado);
    }
    if ($_POST['operacion'] == 'EliminarEstudiante') {
        $datos = ["idEstudiante" => $_POST["idEstudiante"]];
        $resultado = $estudiante->EliminarEstudiante($datos);
        echo json_encode($resultado);
    }
    if ($_POST['operacion'] == 'ActualizarEstudiante') {
        $datos = [
            "idEstudiante" => $_POST["idEstudiante"],
            "nombres" => $_POST["nombres"],
            "apellidos" => $_POST["apellidos"],
            "grado" => $_POST["grado"],
            "seccion" => $_POST["seccion"],
            "canCursos" => $_POST["canCursos"],
            "turno" => $_POST["turno"]
        ];
        $resultado = $estudiante->ActualizarEstudiante($datos);
        echo json_encode($resultado);
    }
    if ($_POST['operacion'] == 'GuardarDatos') {
        $_SESSION['idEstudiante'] = $_POST["idEstudiante"];
        $_SESSION['nombres'] = $_POST["nombres"];
        $_SESSION['apellidos'] = $_POST["apellidos"];
        $_SESSION['grado'] = $_POST["grado"];
        $_SESSION['seccion'] = $_POST["seccion"];
        $_SESSION['canCursos'] = $_POST["canCursos"];
        $_SESSION['turno'] = $_POST["turno"];
    }
}

if (isset($_GET['operacion'])) {
    if ($_GET['operacion'] == 'ListarEstudiantes') {
        $resultado = $estudiante->ListarEstudiantes();
        echo json_encode($resultado);
    }
    if ($_GET['operacion'] == 'EnviarDatos') {
        $data=[
            "idEstudiante" => $_SESSION['idEstudiante'],
            "nombres" => $_SESSION['nombres'],
            "apellidos" => $_SESSION['apellidos'],
            "grado" => $_SESSION['grado'],
            "seccion" => $_SESSION['seccion'],
            "canCursos" => $_SESSION['canCursos'],
            "turno" => $_SESSION['turno']
        ];
        echo json_encode($data);
    }
}