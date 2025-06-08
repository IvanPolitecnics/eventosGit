-- MySQL dump 10.13  Distrib 8.0.41, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: gestion_eventos2
-- ------------------------------------------------------
-- Server version	8.0.39

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
-- Table structure for table `eventos`
--

DROP TABLE IF EXISTS `eventos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `eventos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `ubicacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_evento_id` int NOT NULL,
  `creador_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `tipo_evento_id` (`tipo_evento_id`),
  KEY `creador_id` (`creador_id`),
  CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`tipo_evento_id`) REFERENCES `tipos_eventos` (`id`),
  CONSTRAINT `eventos_ibfk_2` FOREIGN KEY (`creador_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventos`
--

LOCK TABLES `eventos` WRITE;
/*!40000 ALTER TABLE `eventos` DISABLE KEYS */;
INSERT INTO `eventos` VALUES (1,'Congreso de Tecnología 2025','Evento que reúne expertos en IA, desarrollo web y ciberseguridad.','2025-06-10','2025-06-12','Madrid - IFEMA',1,1,'2025-05-06 15:51:04','2025-05-06 15:51:04'),(2,'Convención Nacional de Startups','Conoce los nuevos proyectos de emprendimiento a nivel nacional.','2025-07-01','2025-07-02','Barcelona - Fira Gran Via',2,2,'2025-05-06 15:51:04','2025-05-06 15:51:04'),(3,'ExpoComercial 2025','Espacio para networking entre empresas del sector retail y distribuidores.','2025-08-20','2025-08-22','Valencia - Palacio de Congresos',3,3,'2025-05-06 15:51:04','2025-05-06 15:51:04'),(4,'Concierto de Primavera','Un gran evento para disfrutar música en vivo.','2025-05-10','2025-05-10','Parque Central',1,1,'2025-05-07 15:43:04','2025-05-07 15:43:04'),(5,'Prueba','Prueba','2025-08-03','2025-08-05','Prueba',6,1,'2025-05-09 13:30:31','2025-05-09 13:30:31'),(6,'Prueba','Prueba','2025-08-03','2025-08-05','Prueba',6,1,'2025-05-09 13:32:47','2025-05-09 13:32:47'),(7,'Prueba Tarea','321321','1212-12-12','1212-12-12','1212',3,1,'2025-05-09 13:33:06','2025-05-09 13:33:06');
/*!40000 ALTER TABLE `eventos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-06-06 16:19:35
