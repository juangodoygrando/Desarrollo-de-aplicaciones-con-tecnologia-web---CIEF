create database if not exists bdtiendabellasartes;

use bdtiendabellasartes;

-- ejercicio 1.1

create table if not exists productos (
    idproducto int not null auto_increment primary key,
    codigo varchar(3) not null,
    nombre_producto varchar(50) not null,
    fecha_ingreso timestamp default current_timestamp,
    precio decimal(5,2),
    unidades_disponibles int not null
);

alter table productos
add idproveedor int not null;

insert into productos (codigo, nombre_producto, precio, unidades_disponibles) 
values
('001', 'caja_pinceles_da_vinci', 142.50, 20),
('002', 'set_rotuladore_tm_18pz', 54.90, 14),
('003', 'set_rotuladore_tm_18pz', 35.00, 35),
('004', 'lienzo_cotton_50_70', 15.00, 123),
('005', 'tela_oleo_80_60', 20.90, 45),
('006', 'pasteles_blandos_sennelier', 355.00, 100),
('007', 'pinturas_al_óleo_van_gogh', 72.00, 10),
('008', 'papel_de_dibujo_fabriano', 15.00, 50);

-- ejercicio 1.3

update productos 
set nombre_producto = 'caja_de_rotuladores_copic_ciao_36_a',
    precio = 174.25,
    unidades_disponibles = 30
where idproducto = 1;

-- ejercicio 1.4

delete from productos where nombre_producto = 'lienzo_cotton_50_70';

-- ejercicio 2.1

create table if not exists proveedores (
    idproveedor int not null auto_increment primary key,
    nameproveedor varchar(60) not null
);

insert into proveedores (nameproveedor) 
values 
('artetop'),
('coloresmundiales'),
('lienzos.s.a.'),
('papelarte'),
('oleoproveedores');

update productos set idproveedor = 1 where idproducto in (1, 2);
update productos set idproveedor = 2 where idproducto in (3, 6);
update productos set idproveedor = 3 where idproducto in (4, 5);
update productos set idproveedor = 4 where idproducto = 8;
update productos set idproveedor = 5 where idproducto = 7;

create table if not exists clientes (
    idcliente int not null auto_increment primary key,
    namecliente varchar(60) not null,
    fechaalta timestamp default current_timestamp
);

insert into clientes (namecliente) 
values ('pedro'), ('amalia'), ('angel'), ('juan'), ('ayelen'), ('carmen'), ('juan luis');

-- ejercicio 3.1

create table if not exists facturas (
    idfactura int not null auto_increment primary key,
    idcliente int not null,
    idproducto int not null,
    fechacompra timestamp default current_timestamp,
    unidadescompradas int,
    totalcompra decimal(10,2)
);

alter table facturas
add constraint fk_facturas_clientes foreign key (idcliente)
references clientes(idcliente);

alter table facturas
add constraint fk_facturas_productos foreign key (idproducto)
references productos(idproducto);

-- ejercicio 3.2

delimiter //

create procedure registrar_venta(
    in p_idcliente int,
    in p_idproducto int,
    in p_unidades int
)
begin
    declare v_stock int default null;
    declare v_precio decimal(10,2);
    declare v_total decimal(10,2);

    select unidades_disponibles, precio
    into v_stock, v_precio
    from productos
    where idproducto = p_idproducto;

    if v_stock is null then
        signal sqlstate '45000' set message_text = 'el producto no existe';
    end if;

    if v_stock < p_unidades then
        signal sqlstate '45000' set message_text = 'no hay suficientes unidades en stock';
    end if;

    set v_total = v_precio * p_unidades;

    insert into facturas (idcliente, idproducto, unidadescompradas, totalcompra)
    values (p_idcliente, p_idproducto, p_unidades, v_total);

    update productos
    set unidades_disponibles = unidades_disponibles - p_unidades
    where idproducto = p_idproducto;
end //

delimiter ;

delimiter //

create procedure insertar_producto(
     p_codigo varchar(3),
     p_nombre varchar(50),
     p_precio decimal(10,2),
     p_unidades int,
     p_idproveedor int
)
begin
    insert into productos (codigo, nombre_producto, precio, unidades_disponibles, idproveedor)
    values (p_codigo, p_nombre, p_precio, p_unidades, p_idproveedor);
end //

delimiter ;

call registrar_venta(1, 2, 2);
call registrar_venta(3, 5, 4);
call insertar_producto('009', 'marcadores_posca_12pz', 49.99, 25, 1);

select * from productos;
select * from proveedores;
select * from clientes;
select * from facturas;
