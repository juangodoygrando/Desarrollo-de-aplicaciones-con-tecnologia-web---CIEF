-- Base de datos: colores (ya debe estar creada desde el panel)

-- Tabla: colores
DROP TABLE IF EXISTS `colores`;
CREATE TABLE `colores` (
  `id_color` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `color` varchar(55) NOT NULL,
  `id_usuario` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_color`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

INSERT INTO `colores` VALUES 
(1,'Son Goku','green',1),
(2,'Bulma','blue',1),
(4,'Follet Tortuga','green',1),
(5,'Pepa Pig','pink',1),
(9,'Michael','red',1),
(11,'Tarzan','yellow',1),
(12,'Superman','red',2),
(14,'Follet Tortuga','green',2),
(15,'Michael Corleone','black',2),
(17,'batman','red',2),
(18,'juan','yellow',2),
(19,'carlos','green',2),
(20,'Hola','red',3),
(21,'pedro','green',3),
(22,'Batman','red',2),
(23,'asassaas','red',2),
(24,'juan','yellow',2);

-- Tabla: temporal
DROP TABLE IF EXISTS `temporal`;
CREATE TABLE `temporal` (
  `id_temporal` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `email` varchar(100),
  `telefono` varchar(15),
  `password` varchar(255),
  `token_registro` varchar(128),
  `token_caducidad` datetime,
  PRIMARY KEY (`id_temporal`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

-- Tabla: usuarios
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `email` varchar(100),
  `telefono` varchar(15),
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

INSERT INTO `usuarios` VALUES 
(1,'Pepa Pig','pepa.pig@test.com','93123456789','$2y$10$owiuw08h1IdCQIu29Nqmb.vQs6g0Cd2XDM1Bsf7g6jo2jUiU3MUZ2'),
(2,'Batman','batman@gotham.org','6666666666666','$2y$10$cuuihi3Mr8wjweOYVGsllOWaOTSfptLtLRasF/xES3DJ8vssGgrGy'),
(11,'Ayelen','juani.godoy27@icloud.com','111111111','$2y$10$jbSy1yKh4snkLUschtOL.edwXpXSdphZA7KX1xLhkrYPmpA1oB7y6');
