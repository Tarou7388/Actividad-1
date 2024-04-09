CREATE PROCEDURE spu_agregar_estudiante(
    IN p_nombres VARCHAR(80),
    IN p_apellidos VARCHAR(80),
    IN p_grado CHAR(2),
    IN p_seccion CHAR(1),
    IN p_can_cursos TINYINT,
    IN p_turno CHAR(1)
)
BEGIN
    INSERT INTO estudiantes (nombres, apellidos, grado, seccion, can_cursos, turno)
    VALUES (p_nombres, p_apellidos, p_grado, p_seccion, p_can_cursos, p_turno);
END;

CREATE PROCEDURE spu_listar_estudiantes()
BEGIN
    SELECT * FROM estudiantes 
    WHERE inactive_at IS NULL;
END;

CREATE PROCEDURE spu_buscar_estudiante(
    IN p_id_estudiante INT
)
BEGIN
    SELECT * FROM estudiantes 
    WHERE id_estudiante = p_id_estudiante;
END;

CREATE PROCEDURE spu_eliminar_estudiante(
    IN p_id_estudiante INT
)
BEGIN
    UPDATE estudiantes 
    SET inactive_at = NOW()
    WHERE id_estudiante = p_id_estudiante;
END;

CREATE PROCEDURE spu_actualizar_estudiante(
    IN p_id_estudiante INT,
    IN p_nombres VARCHAR(80),
    IN p_apellidos VARCHAR(80),
    IN p_grado CHAR(2),
    IN p_seccion CHAR(1),
    IN p_can_cursos TINYINT,
    IN p_turno CHAR(1)
)
BEGIN
    UPDATE estudiantes 
    SET nombres = p_nombres,
        apellidos = p_apellidos,
        grado = p_grado,
        seccion = p_seccion,
        can_cursos = p_can_cursos,
        turno = p_turno,
        update_at = NOW()
    WHERE id_estudiante = p_id_estudiante;
END;