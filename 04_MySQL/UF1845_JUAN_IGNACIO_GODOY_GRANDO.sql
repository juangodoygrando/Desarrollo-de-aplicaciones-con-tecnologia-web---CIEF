-- EVALUACION PRACTICA

-- ALUMNO : (JUAN IGNACIO GODOY GRANDO)
-- FECHA : 23-04-2024

/*
Los ejercicios se organizan en dos bloques, segun su dificultad.
Hay por tanto dos niveles de puntuacion: 0.50 y 1.00 puntos.
La resolucion de cada ejercicio se valora siguiendo este criterio:

* Ejercicio perfectamente resuelto o con algun error no relevante: 100%.
* Ejercicio bien planteado pero no resuelto, con algun error importante 
o varios errores leves, pero que no afecten a la comprension global del tema: 50%.
* Ejercicio no resuelto o con errores graves, que muestren falta de comprension
del tema : 0%.

Por tanto:

* un ejercicio bien resuelto del bloque 1 valdra : 0.50 x 100% = 0.50 puntos
* un ejercicio con algun error importante del bloque 2 valdra : 1.00 x 50% = 0.50 puntos

NOTA IMPORTANTE #1: No debes 'hardcodear' los ids, es decir, introducirlos a mano después de mirar las tablas. 
Si los necesitas, han de ser el resultado de alguna consulta.

NOTA IMPORTANTE #2 : Debe entregarse solo este fichero sin la base de datos y sin comprimir,
de este modo :  UF_1845_AP_TuNombre_TuAPellido.sql

*/

/*
EJERCICIO #1 : 0.50 puntos
Crea una tabla llamada 'genero'.
Debe tener una columna llamada 'id' de tipo entero, que sea la clave primaria y autoincremental.
Debe tener otra columna llamada 'genero' de tipo varchar(10) que no puede ser nula.
*/

create table if not exists genero( 
id int primary key auto_increment ,
genero varchar(10) not null
);


/*
EJERCICIO #2 : 0.50 puntos
Introduce en la tabla genero los siguientes datos:
1. 'mujer'
2. 'hombre'
3. 'otro'
4. 'no especificado'
*/

insert into genero(genero) value("mujer"),("hombre"),("otro"),("no especificado");


/*
EJERCICIO #3 : 0.50 puntos
Crea una constraint entre la tabla 'personajes' y la tabla 'genero'.
La constraint se llamará 'fk_genero' y será de tipo foranea.
La columna de la tabla 'personajes' que se relaciona con la tabla 'genero' es 'genero'.
La columna de la tabla 'genero' que se relaciona con la tabla 'personajes' es 'id'.
En caso de borrado en cascada de la tabla 'genero', se no borrarán los personajes que tengan ese género. 
La relación es de uno a muchos, es decir, un género puede tener varios personajes, pero un personaje solo puede tener un género.
*/

ALTER TABLE people
ADD CONSTRAINT fk_genero
FOREIGN KEY (genero) REFERENCES genero(id)
on delete no action;

/*
EJERCICIO #4 : 0.50 puntos
Muestra solo las actrices.
Ha de aparecer apellido, nombre, fecha_nacimiento
Ordenadas por apellido y nombre, descendente 
*/

select apellido, nombre,fecha_nacimiento
from people p
where p.genero=1
order by apellido desc;

/*
EJERCICIO #5 : 0.50 puntos
Muestra solo los personajes nacidos en el siglo XIX (piensa entre qué años).
Debe aparecer : nombre y apellido juntos como 'personajes nacidos en el siglo XIX'
ordenados por profesión y nombre ascendente.
*/

select concat(nombre," ",apellido) as "Personajes Nacidos en el siglo XIX"
from people 
where fecha_nacimiento between 1801 and 1900
order by profesion asc, nombre asc;

/*
EJERCICIO #6 : 0.50 puntos
Muestro solo la información del personaje dedicado a la música con la 
fecha de nacimiento más reciente. Todos los datos, excepto el id.
*/

select p.nombre,p.apellido,pro.profesion,ge.genero,p.oscars,p.fecha_nacimiento
from people p 
join profesion pro on p.profesion=pro.id_profesion
join genero ge on p.genero=ge.id
where p.profesion=(select id_profesion from profesion where profesion="musica") and p.fecha_nacimiento=(select fecha_nacimiento
from people
where profesion=(select id_profesion from profesion where profesion="musica")
order by fecha_nacimiento desc
limit 1)
order by fecha_nacimiento desc;


/*
EJERCICIO #7 : 0.50 puntos
Personas dedicadas a la interpretación (de cualquier género) que únicamente han ganado un Óscar.
Ha de aparecer el nombre y el apellido combinados como 'actores que solo han ganado un oscar' y el género
Ordenados por apellido en forma ascendente.
*/

select concat(nombre," ",apellido) as "actores que solo han ganado un oscar",ge.genero
from people p
join genero ge on p.genero=ge.id
where p.profesion=(select id_profesion from profesion where profesion="actuacion") and p.oscars=1
order by apellido asc;

/*
EJERCICIO #8 : 0.50 puntos
Muestra cuántos personajes no han ganado nunca un Óscar. 
Debe aparecer solo la cantidad de personajes.
*/

select count(id_people) as "personajes no han ganado nunca un Óscar"
from people
where oscars=0;


/*
EJERCICIO #9 : 0.50 puntos
Borra de la lista el personaje:  "Arthur Rubinstein"
*/
delete from people where concat(nombre," ",apellido) = "Arthur Rubinstein";

/*
EJERCICIO #10 : 0.50 puntos
La fecha de nacimiento de "John Williams" está mal, ya que debe ser 1932. Cámbiala.
*/

update people
set fecha_nacimiento=1932
where concat(nombre," ",apellido) = "John Williams";

/*
EJERCICIO #11 : 0.50 puntos
Muestra que director que no ha ganado ningún Óscar es el que tiene la fecha de nacimiento más antigua.
Debe aparecer el nombre completo del director y su profesión
*/

select p.nombre,p.apellido,pro.profesion
from people p 
join profesion pro on p.profesion=pro.id_profesion
where p.profesion=(select id_profesion from profesion where profesion="direccion")
and oscars=0
and fecha_nacimiento=(select fecha_nacimiento
from people
where profesion=(select id_profesion from profesion where profesion="direccion")and oscars = 0
order by fecha_nacimiento asc
limit 1);

/*
EJERCICIO #12 : 0.50 puntos
Muestra sólo las personas dedicadas a la interpretación de género masculino nacidas entre 1920 y 1940
Ha de aparecer : nombre, apellido, profesión y la fecha de nacimiento como 'nacimiento'
Ordenado por la fecha de nacimiento en forma descendente.
*/

select p.nombre,p.apellido,pro.profesion,p.fecha_nacimiento as "Nacimiento"
from people p 
join profesion pro on p.profesion=pro.id_profesion
join genero ge on p.genero=ge.id
where p.profesion=(select id_profesion from profesion where profesion="actuacion")
and p.genero=(select id from genero where genero="hombre")
and p.fecha_nacimiento between 1920 and 1940
order by p.fecha_nacimiento desc ;

/*
EJERCICIO #13 : 1.00 puntos
Muestra los personajes que han ganado más Óscars, pero sólo los que están en primera posición.
Debe aparecer nombre, apellido y profesión
Ordenados por apellido descendente
*/

select p.nombre,p.apellido,pro.profesion
from people p 
join profesion pro on p.profesion=pro.id_profesion
where oscars=(select oscars
from people
order by oscars desc
limit 1)
order by p.apellido desc;


/*
EJERCICIO #14 : 1.00 puntos
¿Cuántos personajes hay de cada género?
La respuesta debe ser : 'Hay X mujeres, Y hombres y Z otros' como 'Genero de los personajes'
*/

select  concat(
"Hay ",
(select count(p.genero) from people p join genero ge on p.genero=ge.id where ge.genero="mujer")," Mujeres, ",
(select count(p.genero) from people p join genero ge on p.genero=ge.id where ge.genero="hombre")," Hombres y ",
(select count(p.genero) from people p join genero ge on p.genero=ge.id where ge.genero="otro")," otros"
) as "Genero de los personajes";

/*
EJERCICIO #15 : 1.00 puntos
Crea un procedimiento almacenado para añadir personajes a la base de datos.
Se llamará st_poblar_bd 
Los parámetros serán : nombre, apellido, profesion, genero, oscars y fecha de nacimiento

Pruébalo con estos ejemplos:
st_poblar_bd('Groucho', 'Marx', 'interpretacion', 'hombre', 1, 1980);
st_poblar_bd('Howard', 'Shore', 'musica', 'hombre', 1, 1946);

*/

delimiter //
create procedure st_poblar_bd(
     pa_nombre varchar(50) , 
     pa_apellido varchar(50) ,
     pa_profesion varchar(12),
	 pa_genero varchar(9),
     pa_oscars int,
     pa_fecha_nacimiento int
       
)
begin

	declare ing_idProfesion int;
	declare ing_idGenero int;

	select id_profesion into ing_idProfesion
    from profesion
    where profesion=pa_profesion;
	

	if ing_idProfesion is null then
		insert into profesion(profesion) value(pa_profesion);
        
        select id_profesion into ing_idProfesion
		from profesion
		where profesion=pa_profesion;
	end if;
	
	select id into ing_idGenero
    from genero
    where genero=pa_genero;

	if ing_idGenero is null then 
		insert into genero(genero) value(pa_genero);
        
		select id into ing_idGenero
		from genero
		where genero=pa_genero;
    end if;

	insert into people(nombre,apellido,profesion,genero,oscars,fecha_nacimiento)
					values(pa_nombre,pa_apellido,ing_idProfesion,ing_idGenero,pa_oscars,pa_fecha_nacimiento);
   
end //
delimiter ;

call st_poblar_bd('Groucho', 'Marx', 'actuacion', 'hombre', 1, 1980);
call st_poblar_bd('Howard', 'Shore', 'musica', 'hombre', 1, 1946);



/*
REALIZAR CORRECTAMENTE LA ENTREGA DE LOS EJERCICIOS
SEGÚN LAS INSTRUCCIONES INDICADAS : 0.50 puntos
*/








