# innclod

CREATE DATABASE registro_documentos;

USE registro_documentos;

CREATE TABLE PRO_PROCESO (
    PRO_ID INT AUTO_INCREMENT,
    PRO_NOMBRE VARCHAR(255) NOT NULL,
    PRO_PREFIJO VARCHAR(10) NOT NULL,
    PRIMARY KEY (PRO_ID)
);

CREATE TABLE TIP_TIPO_DOC (
    TIP_ID INT AUTO_INCREMENT,
    TIP_NOMBRE VARCHAR(255) NOT NULL,
    TIP_PREFIJO VARCHAR(10) NOT NULL,
    PRIMARY KEY (TIP_ID)
);

CREATE TABLE DOC_DOCUMENTO (
    DOC_ID INT AUTO_INCREMENT,
    DOC_NOMBRE VARCHAR(255) NOT NULL,
    DOC_CODIGO INT(50) NOT NULL,
    DOC_CONTENIDO TEXT,
    DOC_ID_TIPO INT NOT NULL,
    DOC_ID_PROCESO INT NOT NULL,
    PRIMARY KEY (DOC_ID),
    FOREIGN KEY (DOC_ID_TIPO) REFERENCES TIP_TIPO_DOC (TIP_ID),
    FOREIGN KEY (DOC_ID_PROCESO) REFERENCES PRO_PROCESO (PRO_ID)
);

-- Insertar datos aleatorios en PRO_PROCESO
INSERT INTO PRO_PROCESO (PRO_NOMBRE, PRO_PREFIJO)
VALUES 
('Proceso 1', 'PRC1'),
('Proceso 2', 'PRC2'),
('Proceso 3', 'PRC3'),
('Proceso 4', 'PRC4'),
('Proceso 5', 'PRC5');

-- Insertar datos aleatorios en TIP_TIPO_DOC
INSERT INTO TIP_TIPO_DOC (TIP_NOMBRE, TIP_PREFIJO)
VALUES 
('Cedula', 'CC'),
('Tarjeta de identidad', 'TI'),
('Pasaporte', 'PAS');


--ejecuta al final

-- Insertar datos aleatorios en DOC_DOCUMENTO
INSERT INTO DOC_DOCUMENTO (DOC_NOMBRE, DOC_CODIGO, DOC_CONTENIDO, DOC_ID_TIPO, DOC_ID_PROCESO)
VALUES 
('Documento 1', FLOOR(RAND() * 100000), 'Contenido del documento 1', 1, 2),
('Documento 2', FLOOR(RAND() * 100000), 'Contenido del documento 2', 2, 3),
('Documento 3', FLOOR(RAND() * 100000), 'Contenido del documento 3', 3, 4),
('Documento 4', FLOOR(RAND() * 100000), 'Contenido del documento 4', 4, 5),
('Documento 5', FLOOR(RAND() * 100000), 'Contenido del documento 5', 5, 1);


usuario y contraseña es admin