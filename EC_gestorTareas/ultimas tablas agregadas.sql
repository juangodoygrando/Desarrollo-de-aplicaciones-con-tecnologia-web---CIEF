use taskin;

create table temporal(
id_temporal int not null primary key auto_increment,
usuario varchar(50) not null,
email varchar(100),
telefono varchar(15),
password varchar(255),
token_registro varchar(128),
token_caducidad datetime
);

CREATE TABLE tokens_recuperacion (
    id_recuperacion INT AUTO_INCREMENT PRIMARY KEY,
    email_recuperacion VARCHAR(255) NOT NULL,
    token_recuperacion VARCHAR(128) NOT NULL,
    caducidad_recuperacion DATETIME NOT NULL
);



select * from usuarios;
select * from tareas;
select * from temporal;
select * from tokens_recuperacion;