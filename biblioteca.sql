--PASO 1. CREACION DE LA BASE DE DATOS

--CREACION DE TABLA => ENTIDADES /CREATE TABLE/
-- Nombre del atributo, tipo de datos, clave primaria o secundaria.
-- nombre, (INT, FLOAT, TEXT, VARCHAR, DATE), PRIMARY KEY
CREATE TABLE Libro (
    Isbn INT PRIMARY KEY,
    NombreLibro TEXT,
    AutorLibro TEXT,
    Editorial TEXT,
    Edicion TEXT,
    FechaPublicacion DATE,
    Genero TEXT,
    NumeroPaginas INT
);

--COMANDOS PARA UTILIZAR LA TABLA COMO MODIFICABLE (ALTER TABLE)

ALTER TABLE Libro
ADD Descripcion TEXT;

--Insertar registros a la tabla (INSERT INTO) - VALUES (INSETAR LOS DATOS AL REGISTRO)
INSERT INTO Libro(
    Isbn,
    NombreLibro,
    AutorLibro,
    Editorial,
    Edicion,
    FechaPublicacion,
    Genero,
    NumeroPaginas,
    Descripcion
)VALUES(
    978316561,
    'Libro1',
    'Autor1',
    'CATEC',
    'Primera',
    '2002-09-08',
    'Eduacion',
    500,
    'Descprcion del Libro'
);


--Modelo relacional, Para combinar los datos de dos entidades utilizAMOS join

--Crear nueva entidad (AUTOR)
CREATE TABLE Autor(
    CodigoAutor INT PRIMARY KEY,
    Nombre TEXT,
    Genero TEXT,
    Correo TEXT,
    Celular INT(8)
)

INSERT INTO Autor(
    CodigoAutor,
    Nombre,
    Genero,
    Correo,
    Celular
)VALUES(
    4512,
    'Juan Perez',
    'Educacion',
    'ac64@gmail.com',
    78596229
)

-- sELECCIONAR LAS ENTIDADES A RELACIONAR
--SELECT Libro.AutorLibro,Autor.Nombre
--FROM Libro
--INNER JOIN Nombretabla ON
