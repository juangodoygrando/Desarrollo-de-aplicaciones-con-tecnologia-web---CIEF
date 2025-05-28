CREATE DATABASE IF NOT EXISTS ferreteria;

USE ferreteria;

CREATE TABLE IF NOT EXISTS clientes(
idCliente int PRIMARY KEY auto_increment,
nombreCliente VARCHAR(30) NOT NULL,
apellidoCliente VARCHAR(30) NOT NULL,
telefono VARCHAR(9) NOT NULL,
correo VARCHAR(25)
);
CREATE TABLE IF NOT EXISTS productos(
idProducto int PRIMARY KEY auto_increment,
nombreProducto VARCHAR(30) NOT NULL,
categoria VARCHAR(30) NOT NULL,
precio DECIMAL NOT NULL,
stock int NOT NULL
);

CREATE TABLE IF NOT EXISTS ventas (
idVenta int PRIMARY KEY auto_increment,
idCliente int NOT NULL,
fechaVenta DATE,
totalVenta DECIMAL NOT NULL 
);

CREATE TABLE IF NOT EXISTS detalleVenta(
idDetalle int PRIMARY KEY auto_increment,
idVenta int,
idProducto int,
cantidad int NOT NULL,
subtotal DECIMAL
);

ALTER TABLE ventas
ADD CONSTRAINT fk_cliente FOREIGN KEY (idCliente) REFERENCES clientes(idCliente);

ALTER TABLE detalleVenta
ADD CONSTRAINT fk_venta
FOREIGN KEY (idVenta) REFERENCES ventas(idVenta);

ALTER TABLE detalleVenta
ADD CONSTRAINT fk_producto
FOREIGN KEY (idProducto) REFERENCES productos(idProducto);

alter table clientes
modify correo varchar(60);

INSERT INTO clientes(nombreCliente, apellidoCliente, telefono, correo) 
VALUES
("Pedro", "Ramírez", "555-1234", "pedro.ramirez@example.com"),
("Lucía", "Gómez", "555-5678", "lucia.gomez@example.com"),
("Carlos", "Martínez", "555-9012", "carlos.martinez@example.com"),
("Ana", "Fernández", "555-3456", "ana.fernandez@example.com"),
("Javier", "López", "555-7890", "javier.lopez@example.com"),
("Sofía", "Díaz", "555-2345", "sofia.diaz@example.com"),
("Diego", "Torres", "555-6789", "diego.torres@example.com"),
("Valentina", "Cruz", "555-1122", "valentina.cruz@example.com");

alter table productos
modify nombreProducto varchar(60);

INSERT INTO productos(nombreProducto, categoria, precio, stock)
VALUES
("Martillo de carpintero", "Herramientas", 12.99, 50),
("Taladro eléctrico", "Herramientas eléctricas", 79.50, 20),
("Destornillador plano", "Herramientas", 3.25, 100),
("Llave inglesa", "Herramientas", 9.75, 60),
("Cinta métrica 5m", "Medición", 4.99, 80),
("Sierra manual", "Herramientas", 11.00, 40),
("Clavos 1 pulgada (100u)", "Fijación", 2.75, 200),
("Tornillos 2 pulgadas (50u)", "Fijación", 3.50, 180),
("Pintura blanca 1L", "Pinturas", 6.90, 35),
("Rodillo para pintar", "Pinturas", 5.20, 45),
("Lija grano fino (10u)", "Abrasivos", 4.10, 70),
("Escalera de aluminio 6 peldaños", "Accesorios", 45.00, 15),
("Guantes de trabajo", "Seguridad", 3.90, 100),
("Casco de seguridad", "Seguridad", 14.99, 30),
("Cinta aislante", "Electricidad", 1.50, 150),
("Cable eléctrico 10m", "Electricidad", 9.99, 40),
("Tubo PVC 1/2 pulgada", "Fontanería", 2.00, 120),
("Llave de paso", "Fontanería", 3.80, 50),
("Silicona selladora", "Construcción", 5.00, 60),
("Brocha 2 pulgadas", "Pinturas", 2.75, 90),
("Bombilla LED 9W", "Iluminación", 2.30, 200),
("Porta bombilla E27", "Electricidad", 1.20, 150),
("Juego de llaves Allen", "Herramientas", 6.50, 40),
("Nivel de burbuja 30cm", "Medición", 7.80, 35),
("Caja de herramientas plástica", "Accesorios", 19.99, 25);


ALTER TABLE productos
MODIFY precio DECIMAL(10,2);

INSERT INTO ventas(idCliente)
VALUES
(10);






SELECT * FROM clientes;
SELECT * FROM productos;
SELECT * FROM ventas;
SELECT * FROM detalleVenta;