function $(id) { return document.querySelector(id) }

function RegistrarEstudiante() {
        const parametros = new FormData();
        parametros.append("operacion", "RegistrarEstudiante");
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
            .then(dato =>{
                Swal.fire('¡Registro exitoso!', '', 'success');
            })
            .catch(e => {
                console.error(e);
            });
    }
$("#enviar").addEventListener("click", RegistrarEstudiante);