function $(id) { return document.querySelector(id) }
(function () {
    fetch(`../Controllers/Estudiantes.controllers.php?operacion=EnviarDatos`)
        .then($respuesta => $respuesta.json())
        .then(datos => {
            const idEstudianteInput = $('#idEstudiante');
            const nombresInput = $('#nombres');
            const apellidosInput = $('#apellidos');
            const gradoInput = $('#grado');
            const seccionInput = $('#seccion');
            const canCursosInput = $('#canCursos');
            const turnoSelect = $('#turno');

            idEstudianteInput.setAttribute('value', datos.idEstudiante);
            nombresInput.setAttribute('value', datos.nombres);
            apellidosInput.setAttribute('value', datos.apellidos);
            gradoInput.setAttribute('value', datos.grado);
            seccionInput.setAttribute('value', datos.seccion);
            canCursosInput.setAttribute('value', datos.canCursos);
            turnoSelect.value = datos.turno;
        })
        .catch(e => {
            console.error(e);
        });
})();

function ActualizarEstudiante() {
    const parametros = new FormData();
    parametros.append("operacion", "ActualizarEstudiante");
    parametros.append("idEstudiante", $("#idEstudiante").value)
    parametros.append("nombres", $("#nombres").value)
    parametros.append("apellidos", $("#apellidos").value)
    parametros.append("grado", $("#grado").value)
    parametros.append("seccion", $("#seccion").value)
    parametros.append("canCursos", $("#canCursos").value)
    parametros.append("turno", $("#turno").value)

    fetch("../Controllers/Estudiantes.controllers.php", {
        method: "POST",
        body: parametros
    })
        .then(respuesta => respuesta.json())
        .then(dato => {
            Swal.fire('¡Actualizacion exitosa!', '', 'success');
            window.location.href = "../Views/Principal.html"
        })
        .catch(e => {
            console.error(e);
        });
};
$("#enviar").addEventListener("click", ActualizarEstudiante);