document.addEventListener("DOMContentLoaded", () => {

    (function () {
        fetch("../Controllers/Estudiantes.controllers.php?operacion=ListarEstudiantes")
            .then(respuesta => respuesta.json())
            .then(datos => {
                const tbody = document.querySelector("#Estudiantes");
                datos.forEach(element => {
                    const tr = document.createElement('tr');

                    const thId = document.createElement("td");
                    thId.textContent = element.id_estudiante;
                    tr.appendChild(thId);

                    const thNombres = document.createElement("td");
                    thNombres.textContent = element.nombres;
                    tr.appendChild(thNombres);

                    const thApellidos = document.createElement("td");
                    thApellidos.textContent = element.apellidos;
                    tr.appendChild(thApellidos);

                    const thGrado = document.createElement("td");
                    thGrado.textContent = element.grado;
                    tr.appendChild(thGrado);

                    const thSeccion = document.createElement("td");
                    thSeccion.textContent = element.seccion;
                    tr.appendChild(thSeccion);

                    const thCanCursos = document.createElement("td");
                    thCanCursos.textContent = element.can_cursos;
                    tr.appendChild(thCanCursos);

                    const thTurno = document.createElement("td");
                    thTurno.textContent = element.turno;
                    tr.appendChild(thTurno);

                    const botonEliminar = document.createElement("button");
                    botonEliminar.textContent = "Eliminar";
                    botonEliminar.id = "eliminar";
                    botonEliminar.addEventListener("click", () => {
                        Swal.fire({
                            title: "Are you sure?",
                            text: "You won't be able to revert this!",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Yes, delete it!"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                const parametros = new FormData();
                                parametros.append("operacion", "EliminarEstudiante");
                                parametros.append("idEstudiante", element.id_estudiante)
                                fetch(`../Controllers/Estudiantes.controllers.php`, {
                                    method: "POST",
                                    body: parametros
                                })
                                    .then(
                                        Swal.fire({
                                            title: "Deleted!",
                                            text: "Your file has been deleted.",
                                            icon: "success"
                                        }),
                                        window.location.reload()
                                    )
                                    .catch(e => {
                                        console.error(e);
                                    });

                            }
                        });

                    });
                    const thBoton = document.createElement("td");
                    thBoton.appendChild(botonEliminar);
                    tr.appendChild(thBoton);

                    tbody.appendChild(tr);

                });
                $(document).ready(function () {
                    $('#estudiantes-table').DataTable({
                        "language": {
                            "url": "https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json"
                        },
                        "lengthMenu": [10, 25, 50, 100],
                        "pageLength": 10
                    });
                });
            })
            .catch(e => {
                console.error(e)
            });
    })();
})
