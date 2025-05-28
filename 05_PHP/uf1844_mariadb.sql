CREATE DATABASE  IF NOT EXISTS `uf1844` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `uf1844`;
-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: localhost    Database: uf1844
-- ------------------------------------------------------
-- Server version	8.4.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `departamentos`
--

DROP TABLE IF EXISTS `departamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `departamentos` (
  `id_departamento` int NOT NULL AUTO_INCREMENT,
  `nombre_departamento` varchar(20) DEFAULT NULL,
  `color_departamento` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_departamento`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Actividades realizadas por cada miembro del equipo';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamentos`
--

LOCK TABLES `departamentos` WRITE;
/*!40000 ALTER TABLE `departamentos` DISABLE KEYS */;
INSERT INTO `departamentos` VALUES (1,'direccion','darksalmon'),(2,'contabilidad','steelblue'),(3,'ventas','#f9e79f'),(4,'programacion','#a9dfbf');
/*!40000 ALTER TABLE `departamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personas`
--

DROP TABLE IF EXISTS `personas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personas` (
  `id_persona` int NOT NULL AUTO_INCREMENT,
  `nombre_persona` varchar(20) NOT NULL,
  `apellido_persona` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_departamento` int NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_persona`),
  KEY `fk_personas_departamentos_idx` (`id_departamento`),
  CONSTRAINT `fk_personas_departamentos` FOREIGN KEY (`id_departamento`) REFERENCES `departamentos` (`id_departamento`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Miembros del equipo';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personas`
--

LOCK TABLES `personas` WRITE;
/*!40000 ALTER TABLE `personas` DISABLE KEYS */;
INSERT INTO `personas` VALUES (1,'Bill','Jobs','$2y$10$yL.4ulUG9XsACoeR02PXFu6TqUisQKrlECIGvL2RwN8QIFD0wiiWG',1,'bill.jobs@uf1841.org'),(2,'Violetta','Valery','$2y$10$mX/vOyr4Bl/CQHCVrBapk.FQBZbxz4Ne2E8IraKfNXZ.e.tY4K4Bu',1,'violetta.valery@uf1844.org'),(3,'Barbara','King','$2y$10$E/U8XsgALeMh5FO1TEwZ.e7LDz3bLJmKS6.58mWfI4mmnISsDPsoe',4,'barbara.king@uf1844.org'),(4,'Steve','Windows','$2y$10$/rLP1yjeJaZlkoMlZr.pQO4cxAYvflr7mPw6GzC8UCNRwT3CIGqpm',3,'steve.windows@uf1844.org'),(5,'John','Bezzos','$2y$10$CJgxLAT43XEjuftVgNM/Fes5nzFx3Tpy93bQQJEFStsvdbxztg3ue',3,'john.bezzos@uf1844.org'),(6,'Maria','Blanchard','$2y$10$0R4L393AQULIYegtM84fZu1azi0sPtvYClh3stX7hJVDWCcWhLD7O',2,'maria.blanchard@uf1844.org'),(7,'Michael','Corleone','$2y$10$7rd95n1BOYCvc.OVAPqAJu.dtsUk1HlRHa9WYu4s0vCGBvy4Tr/0a',2,'michael.corleone@uf1844.org'),(8,'Lamine','Raphinho','$2y$10$pJCpEwVm1nkSozeH./lVtuXcYXRHI7VRoA2q8NrmTakqKavMg7JxS',4,'lamine.raphinho@uf1844.org'),(9,'Alexia','Bonmati','$2y$10$xhWScLMwXL5sltxCkodbUOs8e4Il3IWrpG0qD2k9fRG7Y8Abqgrp.',3,'alexia.bonmari@uf1844.org'),(10,'Anna','Morgan','$2y$10$jWda8qspsq3eUVxCiFZC6ubj9IIjF3/VidLIYRLE7i8/uO2FeizGi',4,'anna.morgan@uf1844.org');
/*!40000 ALTER TABLE `personas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-05-20 21:25:06
select * from departamentos;
select * from personas;