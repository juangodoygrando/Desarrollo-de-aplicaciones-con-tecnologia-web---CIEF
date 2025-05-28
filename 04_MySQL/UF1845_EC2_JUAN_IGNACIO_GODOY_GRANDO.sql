-- Utiliza la base de datos sakila, disponible en MySQL Workbench,
-- para resolver estos ejercicios 
USE sakila;

-- 1) Actores que tienen el primer nombre "Gary"

select first_name,last_name
from actor
where first_name="Gary";

-- 2) Actores que tiene de primer apellido "Streep"

select first_name,last_name
from actor
where last_name="Streep";

-- 3) Actores que contengan una "o" en su nombre
select first_name
from actor
where first_name like "%o%";


-- 4) Actores que contengan una "a" en su nombre y una "e" en su apellido
select first_name,last_name
from actor
where first_name like "%a%" and last_name like "%e%";

-- 5) Actores que contengan dos "o" en su nombre (en cualquier posicion) y una "a" en su apellido
select first_name,last_name
from actor
where first_name like "%o%o%" and last_name like "%a%";


-- 6) Actores cuya tercera letra del nombre sea "b"

select first_name
from actor
where first_name like "__b%";

-- 7) Ciudades que empiezan por "a"

select city
from city
where city like "a%";



-- 8) Ciudades que acaban por "s"
select city
from city
where city like "%s";

-- 9) Ciudades del country "France"
select city
from city
where country_id=(select country_id from country where country="France");


-- 10) Ciudades con nombres compuestos (como New York)
select city
from city
where city like "% %";


-- 11) películas con una duración entre 80 y 100 m.

select title,length
from film 
where length >= 80 and length<=100;

-- 12) películas con un rental_rate entre 1 y 3
select title,rental_rate
from film 
where rental_rate between 1 and 3;


-- 13) películas con un título de más de 11 letras.

select title
from film 
where title like "___________";


-- 14) películas con un rating de PG o G.
select title, rating
from film
where rating = "PG" or rating = "G";

 
-- 15) ¿Cuantas ciudades tiene el country ‘France’? 


select count(city) as "Ciudades que tienen el country France"
from city
where country_id=(select country_id from country where country="France");



-- 16) Películas que no tengan un rating de NC-17

select title, rating
from film
where rating != "NC-17";



-- 17) Películas con un rating PG y duración de más de 120.

select title, rating, length
from film
where rating = "PG" or length >= 120;


-- 18) ¿Cuantos actores hay?
select count(actor_id)
from actor;


-- 19) Película con mayor duración.
select title, length
from film
order by length desc
limit 1;

SELECT title, length
FROM film
where length=(select  length
from film
order by length desc
limit 1);


-- 20) ¿Cuantos clientes viven en Indonesia?

select count(cu.customer_id) as "Clientes que viven en Indonesia:"
from customer cu
join address ad on  ad.address_id=cu.address_id
join city ci on ci.city_id=ad.city_id
join country co on co.country_id=ci.country_id
where co.country="Indonesia";

USE sakila;


-- 21) Obtén los 10 actores que han participado en más películas
-- (de mas a menos participaciones)

select concat(a.first_name," ",a.last_name) as "Actor",count(f_a.actor_id) as "Peliculas realizadas"
from film_actor f_a
join actor a on f_a.actor_id=a.actor_id
group by f_a.actor_id
order by count(f_a.actor_id) desc
limit 10;



-- 22) Obtén los clientes de países que empiezan por S

select concat(c.first_name," ",c.last_name) as "Clientes", country as "paises que comienzan por 'S' "
from customer c
join address a on c.address_id=a.address_id
join city ci on a.city_id=ci.city_id
join country co on ci.country_id=co.country_id
where co.country like "S%";


-- 23) Obtén el top-10 de países con más clientes

select co.country as "Top 10 de países con más clientes"
from customer c
join address a on c.address_id=a.address_id
join city ci on a.city_id=ci.city_id
join country co on ci.country_id=co.country_id
group by co.country_id
order by count(*) desc
limit 10;

select * from customer;
select * from address;
select * from city;
select * from country;
-- 24) Muestra las 10 primeras películas alfabéticamente y el número de copias que se disponen de cada una de ellas


select f.title, count(i.film_id)
from film f
join inventory i on i.film_id=f.film_id
group by i.film_id
order by f.title asc 
limit 10;


-- 25 ¿ Cuántas películas ha alquilado Deborah Walker?

select count(r.rental_id) as "Peliculas alquiladas por Deborah Walker"
from rental r
join customer c on r.customer_id=c.customer_id
where r.customer_id=(select customer_id
from customer c
where concat(c.first_name," ",c.last_name)="Deborah Walker");

-- 26) Crea un procedimiento almacenado llamado 'rentals_by_client'
-- el cual, a partir del nombre y apellido del cliente,
-- muestre : nombre del cliente, apellido del cliente, título de la película, fecha de alquiler
-- ordenado por fecha de alquiler descendente
-- Pruébalo con el cliente 'Deborah Walker'

-- drop procedure rentals_by_client

delimiter $$
create procedure rentals_by_client(
    rbc_first_name varchar(50),
    rbc_last_name varchar(50) 
)
begin
	declare var_customer_id int;
    
    select customer_id into var_customer_id
    from customer c
    where c.first_name=rbc_first_name and c.last_name=rbc_last_name;

	if var_customer_id is null then 
		
        select "El cliente no exite en la base de datos";
	else
		select cu.first_name, cu.last_name, f.title, re.rental_date
        from customer cu
        join rental re on cu.customer_id=re.customer_id
        join inventory i on re.inventory_id=i.inventory_id
        join film f on i.film_id=f.film_id
        where cu.customer_id=var_customer_id
		order by rental_date DESC;
        end if;

end $$
delimiter ;

call rentals_by_client('Deborah', 'Walker');



-- 27) Crea un procedimiento almacenado llamado 'client_rental' que, realizando el alquiler de
-- una pelicula por parte de un cliente, nos retorne cuantos alquileres ha hecho.
-- la fecha del alquiler es la actual
-- Pruébalo así : call client_rental('Deborah', 'Walker', "ALADDIN CALENDAR" )

delimiter $$
create procedure client_rental(
     cr_first_name varchar(50),
	 cr_last_name varchar(50),
     cr_title varchar(150)
)
begin
	declare var_customer_id int;
    declare var_film_id int;
    
    select customer_id into var_customer_id
    from customer c
    where c.first_name=cr_first_name and c.last_name=cr_last_name;
    
    select f.title into var_film_id
    from film f
    join inventory i on f.film_id=i.film_id
    join rental r on i.inventory_id=r.inventory_id
    where f.title=cr_title and return_date is not null;
    
    
    

end $$
delimiter ;

select * from film;
select * from inventory;
select * from rental;
select * from customer;