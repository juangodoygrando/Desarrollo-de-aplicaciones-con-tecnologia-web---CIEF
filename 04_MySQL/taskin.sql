CREATE DATABASE IF NOT EXISTS taskin;
USE taskin;



CREATE TABLE tareas (
  id_tarea INT AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(50),
  descripcion VARCHAR(200),
  fecha_actualizacion DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  id_estado int
);

CREATE TABLE estado (
  id_estado INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(50) NOT NULL,
  color VARCHAR(20) NOT NULL
);

ALTER TABLE tareas
ADD CONSTRAINT fk_estado
FOREIGN KEY (id_estado)
REFERENCES estado(id_estado);

INSERT INTO estado (nombre, color) VALUES
('Urgente', '#e63946'),    -- Rojo
('Pendiente', '#f4a261'),  -- Mandarina
('En Ejecución', '#e9c46a'), -- Amarillo
('Finalizada', '#2a9d8f'); -- Verde

INSERT INTO tareas (titulo, descripcion, id_estado) VALUES
('Reunión con cliente', 'Discutir los requisitos del proyecto y la planificación.', 1),
('Revisar código', 'Revisar el código del módulo de autenticación.', 2), 
('Desarrollar nueva funcionalidad', 'Implementar la nueva función de búsqueda.', 3),  
('Pruebas finales', 'Realizar pruebas para verificar que todo funciona correctamente.', 4), 
('Documentación del proyecto', 'Escribir la documentación del proyecto.', 3), 
('Actualizar sistema operativo', 'Actualizar a la última versión del sistema operativo.', 1); 

CREATE TABLE categorias (
    id_categoria INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL
);
INSERT INTO categorias (nombre) VALUES
('Personal'),
('Estudio'),
('Trabajo');
ALTER TABLE tareas ADD id_categoria INT;

ALTER TABLE tareas
ADD CONSTRAINT fk_tarea_categoria
FOREIGN KEY (id_categoria)
REFERENCES categorias(id_categoria)
ON DELETE SET NULL;

ALTER TABLE categorias CHANGE nombre nombre_categoria VARCHAR(45);

SHOW COLUMNS FROM categorias;


CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(100),
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    telefono int
);

ALTER TABLE tareas ADD id_usuario INT;

ALTER TABLE tareas
ADD CONSTRAINT fk_tarea_usuario
FOREIGN KEY (id_usuario)
REFERENCES usuarios(id)
ON DELETE SET NULL;

INSERT INTO tareas (titulo, descripcion, id_estado, id_categoria, id_usuario) VALUES
('Enviar informe semanal', 'Preparar y enviar el informe del equipo.', 2, 3, 1),
('Estudiar para examen de SQL', 'Repasar subconsultas y joins.', 3, 2, 2),
('Llamar al proveedor', 'Confirmar entrega de materiales.', 1, 3, 3),
('Actualizar perfil profesional', 'Revisar y actualizar CV y LinkedIn.', 4, 1, 2),
('Revisar documentación técnica', 'Leer especificaciones de la nueva API.', 2, 2, 1),
('Preparar presentación', 'Armar las diapositivas para la reunión del lunes.', 3, 3, 2),
('Comprar útiles de oficina', 'Reposición de material para el escritorio.', 1, 1, 3),
('Resolver tickets pendientes', 'Cerrar los reportes asignados de soporte.', 2, 3, 3);




SELECT * FROM usuarios;


SELECT * FROM estado;

SELECT * FROM categorias;

SELECT * FROM tareas;

