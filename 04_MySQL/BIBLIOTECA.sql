#hay qeu crear una BD llamada biblioteca 

CREATE DATABASE IF NOT EXISTS biblioteca;

#hay que crear un tabla llamda "libros"
#debe contener:
# -- id INT NOT NULL AUTO_INCREMENT PRIMARY KEY
# -- titulo VARCHAR(100) NOT NULL 
# -- autorNombre VARCHAR(50) NOT NULL
# -- autorApellido VARCHAR(100) NULL
# -- yearEdition YEAR
# -- editorial VARCHAR(50) NOT NULL
# -- ejemplares
# -- FECHAiNCORPORACION DEFAULT CURRENT_TIMESTAMP

USE biblioteca;

CREATE TABLE IF NOT EXISTS libros(
id int NOT NULL auto_increment PRIMARY KEY,
titulo varchar(100) NOT NULL,
autorNombre VARCHAR(50) NOT NULL,
autorApellido VARCHAR(100) NULL,
yearEdition YEAR,
editorial VARCHAR(50) NOT NULL,
ejemplares smallint unsigned,
fechaIncorporacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);

describe libros;

INSERT INTO libros(titulo,autorNombre,autorApellido,yearEdition,editorial,ejemplares) 
VALUES("Cien años de soledad","Gabriel","Garcia Marquez","1990","Tusquet","3");

select*from libros;

INSERT INTO libros(titulo,autorNombre,autorApellido,yearEdition,editorial,ejemplares) 
VALUES("El coronel no tiene quien le escriba","Gabriel","Garcia Marquez","1995","Tusquet","2");

select*from libros;

INSERT INTO libros(titulo,autorNombre,autorApellido,yearEdition,editorial,ejemplares) 
VALUES("Phyton","Guido","Van Rossum","2004","Anaya Multimedia",4);

select*from libros;

INSERT INTO libros(titulo,autorNombre,yearEdition,editorial,ejemplares) 
VALUES("La odisea","homero","2024","Catedra","2");
#Seleccionar los libros cuyo nombre de autor empieza por "G"
SELECT *
FROM libros
WHERE autorNombre LIKE "G%" ;

#Seleccionar cuantos libros diferentes tenemos
SELECT COUNT(ID) AS "Nº de libros"
FROM libros;


#cuantos ejemplares tenemos ahora en la biblioteca

SELECT SUM(EJEMPLARES) AS "Nº de ejemplares"
FROM libros;

#cuantos autores tenemos en nuestra biblioteca con REPETIRLOS

SELECT autorNombre,autorApellido
from libros;

#cuantos autores tenemos en nuestra biblioteca SIN REPETIRLOS

SELECT distinct autorApellido,autorNombre
from libros;

#concatenacion simple

SELECT   concat(autorNombre," ",autorApellido) as aurores
from libros;

#concatenacion con ws, lo primero que se pone el lo que separara los valores que queremos que se concatenen

SELECT   concat_ws(" ",autorNombre,autorApellido) as aurores
from libros;

#promedio de ejemplares que tenemos en la biblioteca

SELECT   avg(ejemplares) as "promedio de ejemplares"
from libros;

#de que titulo tenemos mas ejemplares ?(SOLUCION MALA)

SELECT  titulo, EJEMPLARES
from libros
ORDER BY EJEMPLARES DESC
LIMIT 1;

#de que titulo tenemos MENOS ejemplares ? (SOLUCION MALA)

SELECT  titulo, EJEMPLARES
from libros
ORDER BY EJEMPLARES ASC
LIMIT 1;

#de que titulo tenemos MENOS ejemplares ? (SOLUCION CORRECTA)

SELECT min(EJEMPLARES) titulos
from libros;

#de que titulo tenemos mas ejemplares ?

SELECT  max(ejemplares)
from libros;


#

select titulo,ejemplares
from libros
where ejemplares =(Select min(ejemplares) from libros);

#añade columna para el genero de cada libro

ALTER TABLE libros
ADD genero varchar(30) NOT NULL ;

UPDATE libros
SET genero = "Ficción";

select*from libros;

UPDATE libros
SET genero = "programacion" WHERE id="4";

INSERT INTO libros(titulo, autorNombre, autorApellido, yearEdition, editorial, ejemplares, genero) 
VALUES 
("Python para todos", "Charles", "Severance", 2016, "O'Reilly Media", 5, "Programación"),
("Introducción a la programación en C", "Brian", "Kernighan", 1988, "Prentice Hall", 4, "Programación"),
("Cien sonetos de amor", "Pablo", "Neruda", 1959, "Editorial Losada", 3, "Poesía"),
("Leaves of Grass", "Walt", "Whitman", 1901, "Brooklyn Ferry Press", 2, "Poesía"),  -- Cambié a 1901
("Historia de la Revolución Francesa", "Jean", "Jaurès", 1901, "Garnier", 3, "Historia"),
("La historia de la Segunda Guerra Mundial", "Winston", "Churchill", 1948, "Cassell & Co", 6, "Historia"),
("El nacimiento de la modernidad", "Norman", "Davies", 1996, "Oxford University Press", 4, "Historia"),
("La historia del arte", "E.H.", "Gombrich", 1950, "Phaidon Press", 2, "Arte"),
("El arte de la pintura", "Ernst H.", "Gombrich", 2002, "Editorial Diana", 4, "Arte"),
("El Prado", "José Luis", "Díez", 2010, "Museo del Prado", 3, "Arte");


# Libros de los generos arte e historia Y PROGRAMACION

SELECT *
from libros
WHERE genero="Historia" or genero="Arte" or genero="programacion";


SELECT *
from libros
WHERE genero IN ("Historia","Arte","programacion");

# Libros de los generos no son arte e historia y porogramacion

SELECT *
from libros
WHERE genero  NOT IN ("Historia","Arte","programacion");

#LIBROS CUYA CANTIDAD DE EJEMPLARES ES ETRE 2 Y 4 

SELECT *
from libros
WHERE ejemplares between 2 AND 4;

UPDATE libros SET id="5" WHERE id=55;
UPDATE libros SET id="6" WHERE id=56;
UPDATE libros SET id="7" WHERE id=57;
UPDATE libros SET id="8" WHERE id=58;
UPDATE libros SET id="9" WHERE id=59;
UPDATE libros SET id="10" WHERE id=60;
UPDATE libros SET id="11" WHERE id=61;
UPDATE libros SET id="12" WHERE id=62;

UPDATE libros SET id="13" WHERE id=63;
UPDATE libros SET id="14" WHERE id=64;

#NECESITAMSOP UN TABLA NUEVA PARA LAS EDITORIALES:

# nombreEditorial
# ciudadEditorial
#id

#cuando este llenar la tabla con las editoriales que aparecen en la tabla de libros
#añadir una columna en la tabla libros (idEditorial)con los ids correspondientes a cada editorial
#eliminar la columna editorial

use biblioteca;
CREATE TABLE IF NOT EXISTS editoriales(
id int NOT NULL auto_increment PRIMARY KEY,
nombreEditorial VARCHAR(50) NOT NULL,
ciudadEditorial VARCHAR(100) NULL);

INSERT INTO editoriales(nombreEditorial) 
SELECT DISTINCT editorial
FROM libros;

SELECT *
from editoriales;


UPDATE editoriales SET ciudadEditorial="Barcelona" WHERE id=1;
UPDATE editoriales SET ciudadEditorial="Madrid" WHERE id=2;
UPDATE editoriales SET ciudadEditorial="Madrid" WHERE id=3;
UPDATE editoriales SET ciudadEditorial="Sebastopol" WHERE id=4;
UPDATE editoriales SET ciudadEditorial="Nueva Jersey" WHERE id=5;
UPDATE editoriales SET ciudadEditorial="Buenos Aires" WHERE id=6;
UPDATE editoriales SET ciudadEditorial="Desconocido" WHERE id=7;
UPDATE editoriales SET ciudadEditorial="París" WHERE id=8;
UPDATE editoriales SET ciudadEditorial="Londres" WHERE id=9;
UPDATE editoriales SET ciudadEditorial="Oxford" WHERE id=10;
UPDATE editoriales SET ciudadEditorial="Viena" WHERE id=11;
UPDATE editoriales SET ciudadEditorial="Ciudad de México" WHERE id=12;
UPDATE editoriales SET ciudadEditorial="Madrid" WHERE id=13;

ALTER TABLE libros
ADD idEditorial int NOT NULL ;

#UPDATE libros SET i WHERE (libros.editorial = editoriales.nombreEditoria);

UPDATE libros SET idEditorial=1 WHERE editorial="Tusquet";
UPDATE libros SET idEditorial=2 WHERE editorial="Catedra";
UPDATE libros SET idEditorial=3 WHERE editorial="Anaya Multimedia";
UPDATE libros SET idEditorial=4 WHERE editorial="O'Reilly Media";
UPDATE libros SET idEditorial=5 WHERE editorial="Prentice Hall";
UPDATE libros SET idEditorial=6 WHERE editorial="Editorial Losada";
UPDATE libros SET idEditorial=7 WHERE editorial="Brooklyn Ferry Press";
UPDATE libros SET idEditorial=8 WHERE editorial="Garnier";
UPDATE libros SET idEditorial=9 WHERE editorial="Cassell & Co";
UPDATE libros SET idEditorial=10 WHERE editorial="Oxford University Press";
UPDATE libros SET idEditorial=11 WHERE editorial="Phaidon Press";
UPDATE libros SET idEditorial=12 WHERE editorial="Editorial Diana";
UPDATE libros SET idEditorial=13 WHERE editorial="Museo del Prado";

#FORMAS DE TENER INFORMACION CRUZADA ENTRE VARIAS TABLAS


SELECT libros.titulo,editorial.nombreEditorial
FROM libros as l, editorial as ed 
WHERE l.editorial =nombreEditorial;

SELECT l.titulo, e.nombreEditorial
FROM libros l
INNER JOIN editoriales e
ON l.idEditorial=e.idEditorial;


SELECT *
FROM LIBROS;

ALTER TABLE libros
DROP editorial ;


ALTER TABLE editoriales
RENAME COLUMN id to idEditorial ;

UPDATE libros l, editoriales e
SET l.idEditorial=e.idEditorial
WHERE l.editorial =nombreEditorial; 

SELECT libros.titulo,editorial.nombreEditorial
FROM libros as l, editorial as ed 
WHERE l.editorial =nombreEditorial;

CREATE TABLE IF NOT EXISTS poblaciones(
idPoblaciones int NOT NULL auto_increment PRIMARY KEY,
poblacion VARCHAR(50) NOT NULL
);

INSERT INTO poblaciones(poblacion) 
SELECT DISTINCT ciudadEditorial
FROM editoriales;

ALTER TABLE libros
ADD idPoblaciones int NOT NULL;

UPDATE poblaciones p, editoriales e
SET e.ciudadEditorial=p.idPoblaciones
WHERE e.ciudadEditorial =p.poblacion;

UPDATE libros l, editoriales e
SET l.idPoblaciones=e.ciudadEditorial
WHERE l.idEditorial =e.idEditorial;

SELECT l.titulo, e.nombreEditorial, p.poblacion 
FROM libros l
JOIN editoriales e on l.idEditorial=e.idEditorial
JOIN poblaciones p on e.idPoblaciones=p.idPoblaciones;

ALTER TABLE editoriales
RENAME COLUMN ciudadEditorial to idPoblaciones ;

#vamos a incorporar los usuarios 
#nombra
#apellido
#fecha de nacimiento
#nº carnet de biblioteca
#fecha de inscripccion

# cambiar id de la tabla libros a idLibro

#vamos a crear otra tabla: prestamos 
#idPrestamo
#idUsuario
#idLibro
#fechaPrestamo


ALTER TABLE libros
RENAME COLUMN id to idLibro ;

CREATE TABLE IF NOT EXISTS usuarios(
idUsuario int NOT NULL auto_increment PRIMARY KEY,
nombreUsuario VARCHAR(50) NOT NULL,
apellidoUsuario VARCHAR(50) NOT NULL,
fechaNacimiento DATE,
numeroCarnet int UNIQUE NOT NULL,
fechaInscripcion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE prestamos
RENAME COLUMN idUsuarios to idUsuario ;


# SELECT FLOOR(RAND()*(999999999-10000000+1))+10000000 AS carnet

CREATE TABLE IF NOT EXISTS prestamos(
idPrestamo int NOT NULL auto_increment PRIMARY KEY,
idUsuarios int NOT NULL,
idLibro int NOT NULL,
fechaPrestamo TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO usuarios(nombreUsuario, apellidoUsuario, fechaNacimiento, numeroCarnet)
VALUES
("Pedro", "Lopez", "1985-12-25", FLOOR(RAND()*(999999999-10000000+1))+10000000),
("María", "Gómez", "1992-03-14", FLOOR(RAND()*(999999999-10000000+1))+10000000),
("Luis", "Martínez", "1988-07-22", FLOOR(RAND()*(999999999-10000000+1))+10000000),
("Ana", "Fernández", "1995-09-30", FLOOR(RAND()*(999999999-10000000+1))+10000000),
("Carlos", "Ramírez", "1980-11-05", FLOOR(RAND()*(999999999-10000000+1))+10000000),
("Laura", "Sánchez", "1991-01-17", FLOOR(RAND()*(999999999-10000000+1))+10000000),
("José", "Pérez", "1983-05-09", FLOOR(RAND()*(999999999-10000000+1))+10000000),
("Elena", "Díaz", "1994-08-23", FLOOR(RAND()*(999999999-10000000+1))+10000000),
("Fernando", "López", "1990-12-02", FLOOR(RAND()*(999999999-10000000+1))+10000000),
("Isabel", "Torres", "1987-04-11", FLOOR(RAND()*(999999999-10000000+1))+10000000);

INSERT INTO prestamos(idUsuarios,idLibro)
VALUES(1,1),(1,2),(1,3),(2,1),(2,2),(3,1);
INSERT INTO prestamos(idUsuarios,idLibro)
VALUES(4,1);

SELECT u.nombreUsuario,u.apellidoUsuario,l.titulo,p.fechaPrestamo
FROM usuarios u
NATURAL JOIN prestamos p
NATURAL JOIN libros l;

SELECT u.nombreUsuario,u.apellidoUsuario,p.fechaPrestamo
FROM usuarios u
left JOIN prestamos p ON u.idUsuario=p.idUsuario
where fechaPrestamo is null;

SELECT u.nombreUsuario,u.apellidoUsuario, count(idLibro) as "Libros prestados"
FROM usuarios u
NATURAL JOIN prestamos p
NATURAL JOIN libros l
GROUP BY idUsuario;

# NECESITAMOS SABER...
# Qué usuarios han tomado prestados libros de editoriales de Barcelona
# Cuántos libros hay de editoriales que no son Barcelona
# Cuántos libros tenemos que empiecen por "p"
# Cuál es el libro más prestado
# Qué usuarios han leído el libro más prestado

SELECT u.nombreUsuario, u.apellidoUsuario, po.poblacion
FROM usuarios u
JOIN prestamos p ON p.idUsuario=u.idUsuario
JOIN libros l ON l.idLibro=p.idLibro
JOIN editoriales e ON l.idEditorial=e.idEditorial
JOIN poblaciones po ON po.idPoblaciones=e.idPoblaciones
WHERE po.poblacion = 'Barcelona';

# Cuántos libros hay de editoriales que no son Barcelona

SELECT COUNT(titulo) AS "Nº libros que no son de barcelona"
FROM libros l
JOIN editoriales e ON l.idEditorial=e.idEditorial
JOIN poblaciones po ON po.idPoblaciones=e.idPoblaciones
WHERE po.poblacion != "Barcelona";

# Cuántos libros tenemos que empiecen por "p"

SELECT COUNT(titulo) AS "Nº libros comienzan por 'p'"
FROM libros l
WHERE l.titulo like "p%";

# Cuál es el libro más prestado

SELECT l.titulo, COUNT(p.idLibro) AS "Prestamos realizados"
FROM prestamos p
JOIN libros l ON p.idLibro = l.idLibro
GROUP BY p.idLibro
LIMIT 1;

# Qué usuarios han leído el libro más prestado

SELECT u.nombreUsuario,u.apellidoUsuario,l.titulo AS "libro mas prestado"
FROM prestamos p
JOIN usuarios u ON u.idUsuario=p.idUsuarios
JOIN libros l ON l.idLibro=p.idLibro
WHERE p.idLibro=(SELECT p.idLibro
FROM prestamos p
JOIN libros l ON p.idLibro = l.idLibro
GROUP BY p.idLibro
LIMIT 1);



SELECT *
from prestamos;
SELECT *
from usuarios;
SELECT *
from poblaciones;
SELECT *
from editoriales;
SELECT *
from libros;