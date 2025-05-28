-- Paso 1 : Crear el usuario
create user usuari@'localhost' identified by "1234";

select user,host from mysql.user;

GRANT select on biblioteca.* to usuari@'localhost';

show databases;

show grants for usuari@'localhost';

 -- agregar permisos al usuario
grant delete on biblioteca.* to usuari@'localhost';
grant insert on biblioteca.* to usuari@'localhost';
grant update on biblioteca.* to usuari@'localhost';

-- quitar permisos
revoke delete, insert on biblioteca.* from usuari@'localhost';
revoke SELECT ON `niblioteca`.* from `usuari`@`localhost`;
-- borrar usuarios

drop user usuari@'localhost';

-- cambiar contraseña usuario 

alter user usuari@'localhost' identified by "abcd"