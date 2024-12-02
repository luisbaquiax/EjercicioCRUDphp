DROP SCHEMA IF EXISTS cunoc;
CREATE SCHEMA cunoc;
USE cunoc;

CREATE TABLE encargado(
    id INT AUTO_INCREMENT       NOT NULL PRIMARY KEY,
    dpi         VARCHAR(45)     NOT NULL,
    nombre1     VARCHAR(45)     NOT NULL,
    nombre2     VARCHAR(45)     NOT NULL,
    apellido1   VARCHAR(45)     NOT NULL,
    apellido2   VARCHAR(45)     NOT NULL,
    correo      VARCHAR(100)    NOT NULL,
    telefono    VARCHAR(8)      NOT NULL,
    password    TEXT            NOT NULL,
    estado      BOOLEAN         NOT NULL
);

CREATE TABLE estudiante(
    id INT AUTO_INCREMENT       NOT NULL PRIMARY KEY,
    carne       VARCHAR(45)     NOT NULL,
    dpi         VARCHAR(45)     NOT NULL,
    nombre1     VARCHAR(45)     NOT NULL,
    nombre2     VARCHAR(45)     NOT NULL,
    apellido1   VARCHAR(45)     NOT NULL,
    apellido2   VARCHAR(45)     NOT NULL,
    correo      VARCHAR(100)    NOT NULL,
    telefono    VARCHAR(8)      NOT NULL,
    password    TEXT            NOT NULL,
    estado      BOOLEAN         NOT NULL
);

CREATE TABLE asesor(
    id INT AUTO_INCREMENT       NOT NULL PRIMARY KEY,
    dpi         VARCHAR(45)     NOT NULL,
    nombre1     VARCHAR(45)     NOT NULL,
    nombre2     VARCHAR(45)     NOT NULL,
    apellido1   VARCHAR(45)     NOT NULL,
    apellido2   VARCHAR(45)     NOT NULL,
    correo      VARCHAR(100)    NOT NULL,
    telefono    VARCHAR(8)      NOT NULL,
    password    TEXT            NOT NULL,
    estado      BOOLEAN         NOT NULL
);

CREATE TABLE carrera(
    id INT AUTO_INCREMENT       NOT NULL PRIMARY KEY,
    nombre      VARCHAR(45)     NOT NULL,
    estado      BOOLEAN         NOT NULL
);

CREATE TABLE carrera_estudiante(
    id INT AUTO_INCREMENT           NOT NULL PRIMARY KEY,
    id_estudiante           INT     NOT NULL,
    id_carrera              INT     NOT NULL,
    FOREIGN KEY(id_estudiante) REFERENCES estudiante(id),
    FOREIGN KEY(id_carrera) REFERENCES carrera(id)
);

CREATE TABLE tesis(
    id INT AUTO_INCREMENT           NOT NULL PRIMARY KEY,
    titulo          VARCHAR(45)     NOT NULL,
    id_estudiante   INT             NOT NULL,
    estado          BOOLEAN         NOT NULL,
    FOREIGN KEY(id_estudiante) REFERENCES estudiante(id)
);

CREATE TABLE tesis_asesor(
    id INT AUTO_INCREMENT   NOT NULL PRIMARY KEY,
    id_tesis    INT         NOT NULL,
    id_asesor   INT         NOT NULL,
    FOREIGN KEY(id_tesis) REFERENCES tesis(id),
    FOREIGN KEY(id_asesor) REFERENCES asesor(id)
);

CREATE TABLE avance(
    id INT AUTO_INCREMENT           NOT NULL PRIMARY KEY,
    fecha           DATE            NOT NULL,
    descripcion     VARCHAR(200)    NOT NULL,
    id_tesis        INT             NOT NULL,
    estado          BOOLEAN         NOT NULL,
    FOREIGN KEY(id_tesis) REFERENCES tesis(id)
);

CREATE TABLE incidencia(
    id INT AUTO_INCREMENT           NOT NULL PRIMARY KEY,
    fecha           DATE            NOT NULL,
    descripcion     VARCHAR(200)    NOT NULL,
    id_tesis        INT             NOT NULL,
    estado          BOOLEAN         NOT NULL,
    FOREIGN KEY(id_tesis) REFERENCES tesis(id)
);

INSERT INTO encargado (dpi, nombre1, nombre2, apellido1, apellido2, correo, telefono, password, estado)
VALUES
('1234567890101', 'Carlos', 'Eduardo', 'González', 'López', 'carlos.gonzalez@example.com', '12345678', '$2y$10$cqWFftW5TCjmnqd9GkrTm.ImoDYKfjrboKaw8iDDVsbQ5aaR2eEWy', 1),
('2345678901212', 'Ana', 'María', 'Pérez', 'Martínez', 'ana.perez@example.com', '87654321', '$2y$10$cqWFftW5TCjmnqd9GkrTm.ImoDYKfjrboKaw8iDDVsbQ5aaR2eEWy', 1),
('3456789012323', 'Luis', 'Alberto', 'Ramírez', 'Morales', 'luis.ramirez@example.com', '11223344', '$2y$10$cqWFftW5TCjmnqd9GkrTm.ImoDYKfjrboKaw8iDDVsbQ5aaR2eEWy', 1),
('4567890123434', 'Marta', 'Isabel', 'Castillo', 'Fernández', 'marta.castillo@example.com', '99887766', '$2y$10$cqWFftW5TCjmnqd9GkrTm.ImoDYKfjrboKaw8iDDVsbQ5aaR2eEWy', 0),
('5678901234545', 'Diego', 'Fernando', 'López', 'Cruz', 'diego.lopez@example.com', '44332211', '$2y$10$cqWFftW5TCjmnqd9GkrTm.ImoDYKfjrboKaw8iDDVsbQ5aaR2eEWy', 1);


INSERT INTO estudiante (carne, dpi, nombre1, nombre2, apellido1, apellido2, correo, telefono, password, estado)
VALUES
('20211001', '1122334455667', 'Juan', 'Carlos', 'Mendoza', 'Hernández', 'juan.mendoza@example.com', '56789012', '$2y$10$cqWFftW5TCjmnqd9GkrTm.ImoDYKfjrboKaw8iDDVsbQ5aaR2eEWy', 1),
('20211002', '2233445566778', 'Lucía', 'Alejandra', 'Ortiz', 'Jiménez', 'lucia.ortiz@example.com', '67890123', '$2y$10$cqWFftW5TCjmnqd9GkrTm.ImoDYKfjrboKaw8iDDVsbQ5aaR2eEWy', 1),
('20211003', '3344556677889', 'Pedro', 'Emilio', 'Soto', 'Guzmán', 'pedro.soto@example.com', '78901234', '$2y$10$cqWFftW5TCjmnqd9GkrTm.ImoDYKfjrboKaw8iDDVsbQ5aaR2eEWy', 0),
('20211004', '4455667788990', 'Sofía', 'Andrea', 'Ruiz', 'Pérez', 'sofia.ruiz@example.com', '89012345', '$2y$10$cqWFftW5TCjmnqd9GkrTm.ImoDYKfjrboKaw8iDDVsbQ5aaR2eEWy', 1),
('20211005', '5566778899001', 'José', 'Manuel', 'López', 'Rodríguez', 'jose.lopez@example.com', '90123456', '$2y$10$cqWFftW5TCjmnqd9GkrTm.ImoDYKfjrboKaw8iDDVsbQ5aaR2eEWy', 1);

INSERT INTO asesor (dpi, nombre1, nombre2, apellido1, apellido2, correo, telefono, password, estado)
VALUES
('1122334455667', 'María', 'José', 'Domínguez', 'Santos', 'maria.dominguez@example.com', '12348765', '$2y$10$cqWFftW5TCjmnqd9GkrTm.ImoDYKfjrboKaw8iDDVsbQ5aaR2eEWy', 1),
('2233445566778', 'Carlos', 'Antonio', 'Velásquez', 'Rivas', 'carlos.velasquez@example.com', '87651234', '$2y$10$cqWFftW5TCjmnqd9GkrTm.ImoDYKfjrboKaw8iDDVsbQ5aaR2eEWy', 1),
('3344556677889', 'Andrea', 'Paola', 'Reyes', 'Montero', 'andrea.reyes@example.com', '13572468', '$2y$10$cqWFftW5TCjmnqd9GkrTm.ImoDYKfjrboKaw8iDDVsbQ5aaR2eEWy', 0),
('4455667788990', 'Luis', 'Miguel', 'Flores', 'García', 'luis.flores@example.com', '24681357', '$2y$10$cqWFftW5TCjmnqd9GkrTm.ImoDYKfjrboKaw8iDDVsbQ5aaR2eEWy', 1),
('5566778899001', 'Ana', 'Patricia', 'Ramírez', 'Ortiz', 'ana.ramirez@example.com', '97531264', '$2y$10$cqWFftW5TCjmnqd9GkrTm.ImoDYKfjrboKaw8iDDVsbQ5aaR2eEWy', 1);

INSERT INTO carrera (nombre, estado)
VALUES
('Ingeniería en Sistemas', 1),
('Ingeniería Civil', 1),
('Arquitectura', 1),
('Medicina', 1),
('Derecho', 0);

INSERT INTO carrera_estudiante (id_estudiante, id_carrera)
VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

