CREATE DATABASE Colegio;
USE Colegio;

CREATE TABLE estudiantes(
    id_estudiante       INT AUTO_INCREMENT PRIMARY KEY,
    nombres             VARCHAR(80) NOT NULL,
    apellidos           VARCHAR(80) NOT NULL,
    grado               CHAR(2) NOT NULL,
    seccion             CHAR(1) NOT NULL,
    can_cursos          TINYINT NOT NULL,
    turno               CHAR(1),
    create_at           DATETIME NOT NULL DEFAULT NOW(),
    inactive_at         DATETIME NULL,
    update_at           DATETIME NULL,
    CONSTRAINT ck_turno CHECK (turno IN ('M','T','N'))
)ENGINE=INNODB;

INSERT INTO estudiantes (nombres, apellidos, grado, seccion, can_cursos, turno) VALUES
('Juan', 'Perez', '10', 'A', 5, 'M'),
('María', 'Gómez', '11', 'B', 4, 'T'),
('Pedro', 'López', '9', 'C', 6, 'N'),
('Ana', 'Martínez', '12', 'A', 3, 'M'),
('Luis', 'Rodríguez', '8', 'D', 7, 'T'),
('Laura', 'Hernández', '10', 'B', 5, 'N'),
('Carlos', 'García', '11', 'A', 4, 'M'),
('Sofía', 'Díaz', '9', 'C', 6, 'T'),
('David', 'Sánchez', '7', 'D', 8, 'N'),
('Elena', 'Torres', '12', 'B', 2, 'M'),
('Diego', 'Ramírez', '11', 'A', 4, 'T'),
('Marta', 'Pérez', '10', 'C', 5, 'N'),
('Alejandro', 'Gómez', '9', 'D', 6, 'M'),
('Carmen', 'López', '8', 'A', 7, 'T'),
('Javier', 'Martínez', '12', 'B', 3, 'N'),
('Paula', 'Hernández', '11', 'C', 4, 'M'),
('Daniel', 'García', '10', 'D', 5, 'T'),
('Raquel', 'Díaz', '9', 'A', 6, 'N'),
('Mario', 'Sánchez', '7', 'B', 8, 'M'),
('Lucía', 'Torres', '12', 'C', 2, 'T'),
('Roberto', 'Ramírez', '11', 'D', 4, 'N'),
('Isabel', 'Pérez', '10', 'A', 5, 'M'),
('Sergio', 'Gómez', '9', 'B', 6, 'T'),
('Natalia', 'López', '8', 'C', 7, 'N');
