-- MySQL dump 10.16  Distrib 10.1.29-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: HelpDesk
-- ------------------------------------------------------
-- Server version	10.1.29-MariaDB-6+b1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2018_07_25_153006_create_solicitudes_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitudes`
--

DROP TABLE IF EXISTS `solicitudes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `solicitudes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paterno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `materno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  `correo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asunto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitudes`
--

LOCK TABLES `solicitudes` WRITE;
/*!40000 ALTER TABLE `solicitudes` DISABLE KEYS */;
INSERT INTO `solicitudes` VALUES (1,'ABIERTO','ROGELIO','I','D',123456,'pedro@gmail.com','algo','Prueba de Help Desk',NULL,NULL),(2,'Bien','Pedro','perez','perez',123456789,'aa@g.com','s','dddd','2018-07-26 00:40:44','2018-07-26 00:40:44'),(3,'ssssss','sssssss','sssss','sssss',789456123,'elichina_love15@hotmail.com','s','ssss','2018-07-26 00:41:05','2018-07-26 00:41:05'),(4,'Abierto','R','w','w',0,'aa@ddddd.com','dd','dddd','2018-07-26 03:00:54','2018-07-26 03:00:54'),(5,'Abierto','Pedro','perez','perez',123456789,'aa@g.com','s','tttt','2018-07-26 03:07:43','2018-07-26 03:07:43'),(6,'Abierto','Pedro','sssss','sssss',123456789,'aa@g.com','dd','ddd','2018-07-26 03:10:41','2018-07-26 03:10:41'),(7,'dd','d','d','ddd',5555,'aa@g.com','s','hh','2018-07-26 03:22:37','2018-07-26 03:22:37'),(8,'ss','sss','ss','ss',777777,'ss','s','s','2018-07-26 21:21:27','2018-07-26 21:21:27'),(9,'ABIERTO','PEDRO','PEDRO','PEDRO',123456789,'elichina_love15@hotmail.com','ssss','ddddddddd',NULL,NULL),(10,'ABIERTO','PEDRO','PEDRO','PEDRO',2,'123456789','aa@g.com','ssss',NULL,NULL),(11,'ABIERTO','Agustin','Agustin','Agustin',0,'123456789','aa@ddddd.com','ssss',NULL,NULL),(12,'ABIERTO','JESSICA','JESSICA','JESSICA',777777,'pedro@g.com','S','SSSSSSSSSSSS',NULL,NULL),(13,'ABIERTO','AAA','AAA','AAA',12312313,'eyb030416@gmail.com','DD','DDDD',NULL,NULL),(14,'ABIERTO','AAA','AAA','AAA',12312313,'eyb030416@gmail.com','DD','DDDD',NULL,NULL),(15,'ABIERTO','','','',0,'','','',NULL,NULL),(37,'ABIERTO','','','',0,'','','',NULL,NULL),(38,'ABIERTO','','','',0,'','','',NULL,NULL),(39,'ABIERTO','','','',0,'','','',NULL,NULL),(40,'ABIERTO','','','',0,'','','',NULL,NULL),(41,'ABIERTO','','','',0,'','','',NULL,NULL),(42,'ABIERTO','','','',0,'','','',NULL,NULL),(43,'ABIERTO','','','',0,'','','',NULL,NULL),(44,'ABIERTO','','','',0,'','','',NULL,NULL),(45,'ABIERTO','','','',0,'','','',NULL,NULL),(46,'ABIERTO','','','',0,'','','',NULL,NULL),(47,'ABIERTO','','','',0,'','','',NULL,NULL),(48,'ABIERTO','','','',0,'','','',NULL,NULL),(49,'ABIERTO','','','',0,'','','',NULL,NULL),(50,'ABIERTO','','','',0,'','','',NULL,NULL),(51,'ABIERTO','','','',0,'','','',NULL,NULL),(52,'ABIERTO','','','',0,'','','',NULL,NULL),(53,'ABIERTO','','','',0,'','','',NULL,NULL),(54,'ABIERTO','','','',0,'','','',NULL,NULL),(55,'ABIERTO','','','',0,'','','',NULL,NULL),(56,'ABIERTO','','','',0,'','','',NULL,NULL),(57,'ABIERTO','','','',0,'','','',NULL,NULL),(58,'ABIERTO','','','',0,'','','',NULL,NULL),(59,'ABIERTO','','','',0,'','','',NULL,NULL),(60,'ABIERTO','','','',0,'','','',NULL,NULL),(61,'ABIERTO','','','',0,'','','',NULL,NULL),(62,'ABIERTO','','','',0,'','','',NULL,NULL),(63,'ABIERTO','','','',0,'','','',NULL,NULL),(64,'ABIERTO','','','',0,'','','',NULL,NULL),(65,'ABIERTO','','','',0,'','','',NULL,NULL),(66,'ABIERTO','','','',0,'','','',NULL,NULL),(67,'ABIERTO','','','',0,'','','',NULL,NULL),(68,'ABIERTO','','','',0,'','','',NULL,NULL);
/*!40000 ALTER TABLE `solicitudes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'HelpDesk'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-07-31 11:59:12
