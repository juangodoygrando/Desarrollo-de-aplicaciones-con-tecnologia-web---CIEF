-- crear un bd que llamaremos rentingCars
create database if not exists rentingCars; 
use rentingCars;

-- borrar la base de datos 

#drop database if exists rentingCars;

-- crear un bd que llamaremos rentingCars con valores mascompatibels con MariaDB

create database if not exists rentingCars
default character set utf8mb3
collate utf8_general_ci; 

use rentingCars;


-- crear tabla "alquileres" que tenga: 
#id_alquiler 
#id_cliente
#id_vehiculo
#fecha_recogida
#fecha_entrega
#facturacion decimal(10,2)) not null default 0


create table if not exists alquileres( 
id_alquiler int primary key auto_increment not null,
id_cliente int not null,
id_vehiculo int not null,
fecha_recogida timestamp default current_timestamp ,
fecha_entrega timestamp,
facturacion decimal(10,2) not null default 0
);

create table if not exists clientes( 
id_cliente int primary key auto_increment not null,
nombre_clienter varchar(50) not null,
apellido_cliente varchar(50) not null,
carnet_conducir varchar(12) unique not null,
telefono varchar(12) not null ,
email varchar(100) not null
);


create table if not exists vehiculos( 
id_vehiculo int primary key auto_increment not null,
nombre_modelo varchar(50) not null,
unidades_totales int not null,
unidades_disponibles int not null,
personas smallint not null ,
puertas smallint not null,
cambio enum("manual","automatico","-"),
matricula varchar(7) unique not null,
precioDia decimal(5,2)
);

-- crear un constraint(restriccion) entre la tabla clientes y alquileres 


ALTER TABLE alquileres
ADD CONSTRAINT fk_alquileres_clientes
FOREIGN KEY (id_cliente) REFERENCES clientes(id_cliente)
on delete no action on update no action;

ALTER TABLE alquileres
ADD CONSTRAINT fk_alquileres_vehiculos
FOREIGN KEY (id_vehiculo) REFERENCES vehiculos(id_vehiculo)
on delete no action on update no action;

-- Añadir columna "tipo" a la tabla 'vehiculos'
# "moto","coche","bicicleta","patinete"

alter table vehiculos
add column tipo enum("moto","coche","bicicleta","patinete") ;

-- Añadir vihiculos a la tabla 

INSERT INTO vehiculos (nombre_modelo, unidades_totales, unidades_disponibles, personas, puertas, cambio, matricula, precioDia, tipo) VALUES
('Fiat Panda', 5, 5, 4, 3, 'manual', '1111AAA', 49.58, 'coche');

INSERT INTO vehiculos (nombre_modelo, unidades_totales, unidades_disponibles, personas, puertas, cambio, matricula, precioDia, tipo) VALUES
('Nissan Primastar', 2, 2, 9, 3, 'automatico', '1111BBB', 150.65, 'furgoneta');

INSERT INTO vehiculos (nombre_modelo, unidades_totales, unidades_disponibles, personas, puertas, cambio, matricula, precioDia, tipo) VALUES
('Nissan Micra', 3, 3, 4, 3, 'manual', '1111CCC', 49.5, 'coche'),
('Piaggio Vespa', 5, 5, 2, 0, 'manual', '1111DDD', 55.4, 'moto'),
('Piaggio Beverly', 1, 1, 2, 0, 'manual', '1111EEE', 60, 'moto');

-- vamos a añadir "furgoneta" en la columna tipo 

alter table vehiculos
modify column tipo enum("moto","coche","bicicleta","patinete","furgoneta") not null;

-- necesitamos saber cuantos vehiculos tenemos en total
-- lo mostraremos como total vehiculos

select sum(unidades_totales) as "total vehiculos"
from vehiculos;

-- Necesitamos saber cual o cuales son los vehiculos mas economicos y lo mostraremos como vehiculos economicos

select nombre_modelo as "vehiculos economicos" ,precioDia
from vehiculos
where precioDia =(select min(precioDia) from vehiculos);


-- En un dia podriamos tener todos los vehiulos alquilados 
-- cuanto ingresariamos ?


select sum(unidades_totales*precioDia)
from vehiculos;

-- introducir clientes 

INSERT INTO clientes (nombre_clienter, apellido_cliente, carnet_conducir, telefono, email) VALUES
('Steve', 'Ballmer', 'X1234567890', '654321987', 'steve@ballmer.com'),
('Clint', 'Eastwood', 'Y9876543210', '698745632', 'clint@eastwood.com'),
('Luciano', 'Pavarotti', 'Z5678901234', '612345678', ''),
('Lionel', 'Messi', 'W4567890123', '600123456', ''),
('Lionel', 'Ritchie', 'V3456789012', '622334455', 'lionel@Ritchie.com');


-- añadir este mail al usuario 
 
 update clientes
 set email="lionel@antonella.ar"
 where nombre_cliente="lionel" and apellido_cliente="Messi";
 
 
 -- queremos saber de qeu cliente o clientes no tenemos el email
 
select nombre_cliente,apellido_cliente
from clientes
where email = '';
 
-- cuantos clientes se llaman lionel

select count(nombre_cliente) as "Clientes llamados lionel "
from clientes
where nombre_cliente="Lionel";

-- cuantos clientes tenemos de cada nombre que tengamso en la tabla

select nombre_cliente,count(nombre_cliente) as "cantidad de clientes con el mismo nombre"
from clientes
group by nombre_cliente;

-- Para realizar un alquiler:

# nombre_cliente
# apellido_cliente
# carnet conducir
# telefono
# email
# modelo
# fecha alquiler

#Si el cliente no figura en la bd hay que añadirlo, si esta aprovechamos sus datos
#Esto se debe hacer con un procedimiento almacenado llamado "alquiler_vehiculo"


delimiter //
create procedure alquiler_vehiculo(
     pa_nombre_cliente varchar(50) , 
     pa_apellido_cliente varchar(50) ,
     pa_carnet_conducir varchar(12),
	 pa_telefono varchar(9),
     pa_email varchar(50),
     pa_modelo varchar(50),
     pa_fecha_recogida timestamp     
)
begin

    declare alq_id_cliente int;
    declare alq_id_vehiculo int;
    declare alq_disponibilidad int;
    
    select id_vehiculo into alq_id_vehiculo
    from vehiculos
    where nombre_modelo=pa_modelo;
    
    select unidades_disponibles into alq_disponibilidad
	from vehiculos
	where id_vehiculo=alq_id_vehiculo;
    
    if alq_disponibilidad<=0 then
		signal sqlstate '45000'
        set message_text = "No hay disponibilidad para este vehiculo";
    else
    
    select id_cliente into alq_id_cliente
    from clientes
    where carnet_conducir=pa_carnet_conducir;

    if alq_id_cliente is null then
        insert into clientes (nombre_cliente,apellido_cliente,carnet_conducir,telefono,email) 
		values(pa_nombre_cliente,pa_apellido_cliente,pa_carnet_conducir,pa_telefono,pa_email);
        select id_cliente into alq_id_cliente    from clientes    where carnet_conducir=pa_carnet_conducir;
	 end if;
    
    
     if alq_id_vehiculo is not null then
     insert into alquileres (id_cliente,id_vehiculo,fecha_recogida)
     values (alq_id_cliente,alq_id_vehiculo,pa_fecha_recogida);
     update vehiculos set unidades_disponibles=unidades_disponibles - 1 where id_vehiculo=alq_id_vehiculo;
		end if;
        select concat("El alquiler de tu '", pa_modelo, "' se ingresó correctamente") as mensaje;
        
    end if;
end //
delimiter ;

call alquiler_vehiculo("Clark","Kent","6666","666666666","super@man.com","Nissan Micra","2024-12-25");
call alquiler_vehiculo("Clint","Eastwood","Y9876543210","698745632","clint@eastwood.com","Fiat Panda","2025-04-20");

 
 
 
 
 
SELECT *
from alquileres;
SELECT *
from clientes;
SELECT *
from vehiculos;
