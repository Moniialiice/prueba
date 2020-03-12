-- MySQL dump 10.16  Distrib 10.1.40-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: sigodb
-- ------------------------------------------------------
-- Server version	10.1.40-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bitacora_sigo`
--

DROP TABLE IF EXISTS `bitacora_sigo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bitacora_sigo` (
  `id_bitacora` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario_bit` int(11) NOT NULL,
  `registro_bit` longtext NOT NULL,
  `fecha_bit` date NOT NULL,
  `hora_bit` time NOT NULL,
  PRIMARY KEY (`id_bitacora`),
  KEY `idusuario_bit` (`idusuario_bit`),
  CONSTRAINT `bitacora_sigo_ibfk_1` FOREIGN KEY (`idusuario_bit`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=898 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bitacora_sigo`
--

LOCK TABLES `bitacora_sigo` WRITE;
/*!40000 ALTER TABLE `bitacora_sigo` DISABLE KEYS */;
INSERT INTO `bitacora_sigo` VALUES (201,1,'Descarga bitácora en PDF abraham con fechas 15/02/2019-15/02/2019.','2019-02-15','17:54:19'),(202,1,'Búsqueda en bitacora abraham con fechas 15/02/2019-15/02/2019.','2019-02-15','17:55:47'),(203,1,'Descarga bitácora en PDF abraham con fechas 15/02/2019-15/02/2019.','2019-02-15','17:55:55'),(204,1,'Descarga bitácora en PDF abraham con fechas 15/02/2019-15/02/2019.','2019-02-15','17:58:38'),(205,1,'Descarga bitácora en PDF abraham con fechas 15/02/2019-15/02/2019.','2019-02-15','18:03:39'),(206,1,'Descarga bitácora en PDF abraham con fechas 15/02/2019-15/02/2019.','2019-02-15','18:05:24'),(207,1,'Inicio Sesión','2019-02-18','09:50:29'),(208,1,'Búsqueda en bitacora  con fechas 18/02/2019-18/02/2019.','2019-02-18','09:50:46'),(209,1,'Descarga bitácora en PDF  con fechas 18/02/2019-18/02/2019.','2019-02-18','09:50:55'),(210,1,'Descarga bitácora en PDF  con fechas 18/02/2019-18/02/2019.','2019-02-18','10:18:46'),(211,1,'Descarga bitácora en PDF  con fechas 18/02/2019-18/02/2019.','2019-02-18','10:23:01'),(212,1,'Búsqueda en bitacora  con fechas 18/02/2019-18/02/2019.','2019-02-18','10:26:14'),(213,1,'Descarga bitácora en PDF  con fechas 18/02/2019-18/02/2019.','2019-02-18','10:26:24'),(214,1,'Descarga bitácora en PDF  con fechas 18/02/2019-18/02/2019.','2019-02-18','10:34:15'),(215,1,'Descarga bitácora en PDF  con fechas 18/02/2019-18/02/2019.','2019-02-18','10:48:03'),(216,1,'Descarga bitácora en PDF  con fechas 18/02/2019-18/02/2019.','2019-02-18','10:58:43'),(217,1,'Descarga bitácora en PDF  con fechas 18/02/2019-18/02/2019.','2019-02-18','11:03:45'),(218,1,'Descarga bitácora en PDF  con fechas 18/02/2019-18/02/2019.','2019-02-18','11:07:57'),(219,1,'Descarga bitácora en PDF  con fechas 18/02/2019-18/02/2019.','2019-02-18','11:14:16'),(220,1,'Descarga bitácora en PDF  con fechas 18/02/2019-18/02/2019.','2019-02-18','11:15:48'),(221,1,'Descarga bitácora en PDF  con fechas 18/02/2019-18/02/2019.','2019-02-18','11:16:31'),(222,1,'Descarga bitácora en PDF  con fechas 18/02/2019-18/02/2019.','2019-02-18','11:18:26'),(223,1,'Descarga bitácora en PDF  con fechas 18/02/2019-18/02/2019.','2019-02-18','11:19:09'),(224,1,'Descarga bitácora en PDF  con fechas 18/02/2019-18/02/2019.','2019-02-18','11:20:46'),(225,1,'Descarga bitácora en PDF  con fechas 18/02/2019-18/02/2019.','2019-02-18','11:21:57'),(226,1,'Búsqueda en bitacora  con fechas 18/02/2019-18/02/2019.','2019-02-18','11:29:16'),(258,1,'Descarga bitácora en PDF  con fechas -.','2019-02-18','13:46:16'),(259,1,'Descarga bitácora en PDF  con fechas -.','2019-02-18','13:47:51'),(260,1,'Descarga bitácora en PDF  con fechas -.','2019-02-18','13:49:44'),(261,1,'Descarga bitácora en PDF  con fechas -.','2019-02-18','13:50:42'),(262,1,'Descarga bitácora en PDF  con fechas -.','2019-02-18','13:51:08'),(263,1,'Descarga bitácora en PDF abraham con fechas 15/02/2019-15/02/2019.','2019-02-18','13:51:18'),(264,1,'Descarga bitácora en PDF  con fechas -.','2019-02-18','13:51:33'),(265,1,'Descarga bitácora en PDF  con fechas -.','2019-02-18','13:51:52'),(266,1,'Descarga bitácora en PDF abraham con fechas 15/02/2019-15/02/2019.','2019-02-18','13:52:03'),(267,1,'Descarga bitácora en PDF abraham con fechas 15/02/2019-15/02/2019.','2019-02-18','13:52:20'),(268,1,'Descarga bitácora en PDF  con fechas -.','2019-02-18','13:52:49'),(269,1,'Descarga bitácora en PDF abraham con fechas 15/02/2019-15/02/2019.','2019-02-18','13:52:58'),(270,1,'Descarga bitácora en PDF abraham con fechas 15/02/2019-15/02/2019.','2019-02-18','14:10:22'),(271,1,'Búsqueda en bitacora  con fechas 15/02/2019-15/02/2019.','2019-02-18','14:10:54'),(272,1,'Descarga bitácora en PDF  con fechas 15/02/2019-15/02/2019.','2019-02-18','14:11:02'),(273,1,'Descarga bitácora en PDF  con fechas 15/02/2019-15/02/2019.','2019-02-18','14:11:45'),(274,1,'Descarga bitácora en PDF  con fechas -.','2019-02-18','14:13:22'),(275,1,'Descarga bitácora en PDF  con fechas 15/02/2019-15/02/2019.','2019-02-18','14:13:34'),(276,1,'Descarga bitácora en PDF  con fechas 15/02/2019-15/02/2019.','2019-02-18','14:20:05'),(277,1,'Descarga bitácora en PDF  con fechas 15/02/2019-15/02/2019.','2019-02-18','14:20:36'),(278,1,'Descarga bitácora en PDF  con fechas 15/02/2019-15/02/2019.','2019-02-18','14:22:57'),(279,1,'Descarga bitácora en PDF  con fechas 15/02/2019-15/02/2019.','2019-02-18','14:23:23'),(280,1,'Descarga bitácora en PDF  con fechas 15/02/2019-15/02/2019.','2019-02-18','14:25:36'),(281,1,'Descarga bitácora en PDF  con fechas 15/02/2019-15/02/2019.','2019-02-18','14:25:57'),(282,1,'Descarga bitácora en PDF  con fechas 15/02/2019-15/02/2019.','2019-02-18','14:26:10'),(283,1,'Descarga bitácora en PDF  con fechas 15/02/2019-15/02/2019.','2019-02-18','14:26:35'),(284,1,'Descarga bitácora en PDF  con fechas 15/02/2019-15/02/2019.','2019-02-18','14:26:50'),(285,1,'Descarga bitácora en PDF  con fechas 15/02/2019-15/02/2019.','2019-02-18','14:27:13'),(286,1,'Descarga bitácora en PDF  con fechas 15/02/2019-15/02/2019.','2019-02-18','14:27:35'),(287,1,'Descarga bitácora en PDF  con fechas 15/02/2019-15/02/2019.','2019-02-18','14:28:23'),(288,1,'Descarga bitácora en PDF  con fechas 15/02/2019-15/02/2019.','2019-02-18','14:29:53'),(289,1,'Descarga bitácora en PDF  con fechas 15/02/2019-15/02/2019.','2019-02-18','14:33:11'),(290,1,'Descarga bitácora en PDF  con fechas 15/02/2019-15/02/2019.','2019-02-18','14:36:35'),(291,1,'Descarga bitácora en PDF  con fechas 15/02/2019-15/02/2019.','2019-02-18','14:38:05'),(292,1,'Descarga bitácora en PDF  con fechas 15/02/2019-15/02/2019.','2019-02-18','14:40:40'),(293,1,'Descarga bitácora en PDF  con fechas 15/02/2019-15/02/2019.','2019-02-18','14:41:01'),(294,1,'Descarga bitácora en PDF  con fechas 15/02/2019-15/02/2019.','2019-02-18','14:52:54'),(296,1,'Inicio Sesión','2019-02-18','16:02:16'),(297,1,'Búsqueda en bitacora abraham con fechas 15/02/2019-15/02/2019.','2019-02-18','16:02:35'),(298,1,'Búsqueda en bitacora abraham con fechas 15/02/2019-15/02/2019.','2019-02-18','16:02:35'),(299,1,'Descarga bitácora en PDF abraham con fechas 15/02/2019-15/02/2019.','2019-02-18','16:02:37'),(300,1,'Búsqueda en bitacora  con fechas 15/02/2019-15/02/2019.','2019-02-18','16:02:44'),(301,1,'Descarga bitácora en PDF  con fechas 15/02/2019-15/02/2019.','2019-02-18','16:02:46'),(302,1,'Descarga bitácora en PDF  con fechas 15/02/2019-15/02/2019.','2019-02-18','16:11:33'),(303,1,'Descarga bitácora en PDF  con fechas -.','2019-02-18','16:11:47'),(304,1,'Descarga bitácora en PDF  con fechas 15/02/2019-15/02/2019.','2019-02-18','16:11:52'),(305,1,'Descarga bitácora en PDF  con fechas -.','2019-02-18','16:12:07'),(306,1,'Descarga bitácora en PDF  con fechas 15/02/2019-15/02/2019.','2019-02-18','16:12:11'),(307,1,'Descarga bitácora en PDF  con fechas 15/02/2019-15/02/2019.','2019-02-18','16:13:22'),(308,1,'Descarga bitácora en PDF  con fechas 15/02/2019-15/02/2019.','2019-02-18','16:13:33'),(317,4,'Inicio Sesión','2019-02-18','16:30:52'),(318,4,'Búsqueda Oficio Recepción  con fechas 01/11/2018-28/02/2019.','2019-02-18','16:39:41'),(319,4,'Descarga reporte en Excel de la búsqueda  oficio recepción con fechas 01/11/2018-28/02/2019.','2019-02-18','16:39:44'),(320,4,'Descarga reporte en Excel de la búsqueda  oficio recepción con fechas 01/11/2018-28/02/2019.','2019-02-18','16:39:48'),(321,4,'Búsqueda Oficio Recepción  con fechas 01/11/2018-28/02/2019.','2019-02-18','16:44:12'),(322,4,'Búsqueda Oficio Recepción  con fechas 31/10/2018-18/02/2019.','2019-02-18','16:45:21'),(323,4,'Descarga reporte en Excel de la búsqueda  oficio recepción con fechas 31/10/2018-18/02/2019.','2019-02-18','16:45:24'),(324,1,'Inicio Sesión','2019-02-18','16:48:31'),(325,1,'Búsqueda usuario rodrigo.','2019-02-18','16:49:24'),(326,1,'Búsqueda usuario rarchundia.','2019-02-18','16:49:39'),(327,4,'Inicio Sesión','2019-02-18','17:00:23'),(328,4,'Búsqueda Oficio Atendido  con fechas 01/11/2018-28/02/2019.','2019-02-18','17:00:41'),(329,4,'Búsqueda Oficio Atendido  con fechas 01/11/2018-28/02/2019.','2019-02-18','17:00:41'),(330,4,'Búsqueda Oficio Atendido  con fechas 01/10/2018-28/02/2019.','2019-02-18','17:01:00'),(331,4,'Búsqueda Oficio Seguimiento  con fechas 03/09/2018-13/02/2019.','2019-02-18','17:01:18'),(332,4,'Consulta oficio atendido del oficio: 400LIA000/0003/2019.','2019-02-18','17:01:20'),(333,4,'Búsqueda en bitacora RODRIGO con fechas 18/02/2019-18/02/2019.','2019-02-18','17:03:34'),(334,4,'Descarga bitácora en PDF RODRIGO con fechas 18/02/2019-18/02/2019.','2019-02-18','17:03:38'),(335,4,'Búsqueda Oficio Atendido  con fechas 04/02/2019-19/02/2019.','2019-02-18','17:04:04'),(336,4,'Búsqueda Oficio Seguimiento  con fechas 04/02/2019-18/02/2019.','2019-02-18','17:05:18'),(337,4,'Consulta oficio atendido del oficio: 400LIA000/0003/2019.','2019-02-18','17:05:21'),(338,4,'Búsqueda Oficio Recepción  con fechas 01/12/2018-18/02/2019.','2019-02-18','17:05:32'),(339,4,'Consulta oficio seguimiento 400LIA000/0001/2019.','2019-02-18','17:05:34'),(340,4,'Consulta oficio seguimiento 400LIA000/0001/2019.','2019-02-18','17:06:41'),(341,4,'Consulta oficio seguimiento 400LIA000/0001/2019.','2019-02-18','17:08:48'),(342,4,'Consulta oficio seguimiento 400LIA000/0001/2019.','2019-02-18','17:09:51'),(343,4,'Descarga de Trámite en Turno del oficio seguimiento 400LIA000/0001/2019 en PDF.','2019-02-18','17:09:59'),(344,4,'Búsqueda Oficio Atendido  con fechas 01/02/2019-18/02/2019.','2019-02-18','17:14:42'),(345,4,'Búsqueda Oficio Seguimiento  con fechas 01/02/2019-18/02/2019.','2019-02-18','17:14:51'),(346,4,'Consulta oficio atendido del oficio: 400LIA000/0003/2019.','2019-02-18','17:14:52'),(347,4,'Descarga Oficio Atendido en PDF de: 400LIA000/0003/2019.','2019-02-18','17:15:01'),(348,4,'Consulta Oficio Seguimiento Captura con fechas 01/11/2018-13/02/2019.','2019-02-18','17:20:15'),(349,4,'Búsqueda en bitacora abraham con fechas 15/02/2019-15/02/2019.','2019-02-18','17:54:07'),(350,4,'Búsqueda en bitacora abraham con fechas 15/02/2019-15/02/2019.','2019-02-18','17:54:15'),(351,4,'Búsqueda en bitacora admin con fechas 15/02/2019-15/02/2019.','2019-02-18','17:54:22'),(352,4,'Descarga bitácora en PDF admin con fechas 15/02/2019-15/02/2019.','2019-02-18','17:54:23'),(353,4,'Descarga bitácora en PDF admin con fechas 15/02/2019-15/02/2019.','2019-02-18','17:54:58'),(354,4,'Descarga bitácora en PDF admin con fechas 15/02/2019-15/02/2019.','2019-02-18','17:55:24'),(355,4,'Descarga bitácora en PDF admin con fechas 15/02/2019-15/02/2019.','2019-02-18','17:55:45'),(356,4,'Descarga bitácora en PDF admin con fechas 15/02/2019-15/02/2019.','2019-02-18','17:56:06'),(357,4,'Descarga bitácora en PDF admin con fechas 15/02/2019-15/02/2019.','2019-02-18','17:56:17'),(358,4,'Descarga bitácora en PDF admin con fechas 15/02/2019-15/02/2019.','2019-02-18','17:56:42'),(359,4,'Descarga bitácora en PDF admin con fechas 15/02/2019-15/02/2019.','2019-02-18','17:57:41'),(360,4,'Descarga bitácora en PDF admin con fechas 15/02/2019-15/02/2019.','2019-02-18','17:58:15'),(361,4,'Descarga bitácora en PDF admin con fechas 15/02/2019-15/02/2019.','2019-02-18','17:58:27'),(362,4,'Descarga bitácora en PDF admin con fechas 15/02/2019-15/02/2019.','2019-02-18','17:59:08'),(363,4,'Descarga bitácora en PDF admin con fechas 15/02/2019-15/02/2019.','2019-02-18','18:00:29'),(364,4,'Descarga bitácora en PDF admin con fechas 15/02/2019-15/02/2019.','2019-02-18','18:00:39'),(365,4,'Inicio Sesión','2019-02-19','10:31:48'),(366,1,'Inicio Sesión','2019-02-19','13:49:01'),(367,1,'Búsqueda Oficio Recepción  con fechas 15/02/2019-15/02/2019.','2019-02-19','13:49:11'),(368,1,'Búsqueda Oficio Recepción  con fechas 01/09/2018-15/02/2019.','2019-02-19','13:49:22'),(369,4,'Inicio Sesión','2019-02-19','13:49:48'),(370,4,'Búsqueda Oficio Seguimiento  con fechas 01/08/2018-19/02/2019.','2019-02-19','13:50:07'),(371,4,'Búsqueda en bitacora abraham con fechas 18/02/2019-18/02/2019.','2019-02-19','14:15:41'),(372,4,'Búsqueda en bitacora abraham con fechas 19/02/2019-18/02/2019.','2019-02-19','14:15:46'),(373,4,'Búsqueda en bitacora abraham con fechas 15/02/2019-18/02/2019.','2019-02-19','14:15:52'),(374,4,'Búsqueda en bitacora RODRIGO con fechas 15/02/2019-18/02/2019.','2019-02-19','14:16:00'),(375,4,'Búsqueda en bitacora RODRIGO con fechas 15/02/2019-15/02/2019.','2019-02-19','14:16:04'),(376,4,'Búsqueda en bitacora RODRIGO con fechas 18/02/2019-18/02/2019.','2019-02-19','14:16:16'),(377,4,'Inicio Sesión','2019-02-19','15:51:40'),(378,4,'Búsqueda en bitacora RODRIGO con fechas 15/02/2019-15/02/2019.','2019-02-19','15:52:33'),(379,4,'Búsqueda en bitacora RODRIGO con fechas 18/02/2019-18/02/2019.','2019-02-19','15:52:46'),(380,4,'Descarga bitácora en PDF RODRIGO con fechas 18/02/2019-18/02/2019.','2019-02-19','15:59:35'),(381,4,'Descarga bitácora en PDF RODRIGO con fechas 18/02/2019-18/02/2019.','2019-02-19','16:01:08'),(382,4,'Descarga bitácora en PDF RODRIGO con fechas 18/02/2019-18/02/2019.','2019-02-19','16:01:23'),(383,4,'Descarga bitácora en PDF RODRIGO con fechas 18/02/2019-18/02/2019.','2019-02-19','16:02:27'),(384,4,'Descarga bitácora en PDF RODRIGO con fechas 18/02/2019-18/02/2019.','2019-02-19','16:03:26'),(385,4,'Descarga bitácora en PDF RODRIGO con fechas 18/02/2019-18/02/2019.','2019-02-19','16:11:19'),(386,4,'Descarga bitácora en PDF RODRIGO con fechas 18/02/2019-18/02/2019.','2019-02-19','16:15:23'),(387,4,'Descarga bitácora en PDF RODRIGO con fechas 18/02/2019-18/02/2019.','2019-02-19','16:30:00'),(388,4,'Descarga bitácora en PDF RODRIGO con fechas 18/02/2019-18/02/2019.','2019-02-19','16:30:58'),(389,4,'Descarga bitácora en PDF RODRIGO con fechas 18/02/2019-18/02/2019.','2019-02-19','16:36:14'),(390,4,'Inicio Sesión','2019-02-19','17:50:39'),(391,4,'Búsqueda Oficio Atendido 400LIA000/0004/2019 con fechas 28/09/2018-28/09/2018.','2019-02-19','17:51:26'),(392,4,'Descarga Oficio Atendido en PDF de: 400LIA000/0004/2019.','2019-02-19','17:51:35'),(393,4,'Inicio Sesión','2019-02-20','09:36:31'),(394,4,'Búsqueda Oficio Atendido  con fechas 01/08/2018-01/02/2019.','2019-02-20','09:36:43'),(395,4,'Descarga Oficio Atendido en PDF de: 400LIA000/0004/2019.','2019-02-20','09:36:46'),(396,4,'Búsqueda Oficio Seguimiento  con fechas 01/09/2018-28/02/2019.','2019-02-20','09:40:40'),(397,4,'Descarga de Trámite en Turno del oficio seguimiento 400LIA000/0001/2019 en PDF.','2019-02-20','09:40:52'),(398,4,'Descarga de Trámite en Turno del oficio seguimiento 400LIA000/0003/2019 en PDF.','2019-02-20','09:41:25'),(399,4,'Descarga de Trámite en Turno del oficio seguimiento 400LIA000/0001/2019 en PDF.','2019-02-20','09:47:58'),(400,4,'Descarga de Trámite en Turno del oficio seguimiento 400LIA000/0001/2019 en PDF.','2019-02-20','09:50:39'),(401,4,'Descarga de Trámite en Turno del oficio seguimiento 400LIA000/0003/2019 en PDF.','2019-02-20','10:07:21'),(402,4,'Búsqueda Oficio Seguimiento  con fechas 01/08/2018-30/09/2018.','2019-02-20','10:08:05'),(403,4,'Descarga de Trámite en Turno del oficio seguimiento 400LI0010/0042/2019 en PDF.','2019-02-20','10:08:09'),(404,4,'Descarga de Trámite en Turno del oficio seguimiento 400LIA000/0004/2019 en PDF.','2019-02-20','10:09:32'),(405,4,'Búsqueda Oficio Seguimiento  con fechas 01/11/2018-19/02/2019.','2019-02-20','10:13:58'),(406,4,'Descarga de Trámite en Turno del oficio seguimiento 400LIA000/0003/2019 en PDF.','2019-02-20','10:14:01'),(407,4,'Búsqueda Oficio Atendido  con fechas 01/09/2018-20/02/2019.','2019-02-20','10:14:14'),(408,4,'Descarga de archivo atendido 400LIA00000042019280920181.pdf.','2019-02-20','10:14:16'),(409,4,'Descarga de archivo atendido 400LIA0000003201906022019.pdf.','2019-02-20','10:14:38'),(410,4,'Descarga Oficio Atendido en PDF de: 400LIA000/0004/2019.','2019-02-20','10:14:52'),(411,4,'Inicio Sesión','2019-02-20','13:26:40'),(412,4,'Consultó su perfil.','2019-02-20','13:29:02'),(413,1,'Inicio Sesión','2019-02-20','14:38:05'),(414,1,'Búsqueda Oficio Recepción  con fechas 01/09/2018-28/02/2019.','2019-02-20','14:38:23'),(415,1,'Inicio Sesión','2019-02-20','16:05:59'),(416,1,'Búsqueda Oficio Seguimiento 400LIA000/0004/2019 con fechas 26/09/2018-28/09/2018.','2019-02-20','16:14:27'),(417,1,'Consulta oficio atendido del oficio: 400LIA000/0004/2019.','2019-02-20','16:14:33'),(418,1,'Inicio Sesión','2019-02-20','17:28:09'),(419,1,'Búsqueda Oficio Recepción  con fechas 01/09/2018-28/02/2019.','2019-02-20','17:28:18'),(420,1,'Búsqueda Oficio Recepción MJ con fechas 01/09/2018-28/02/2019.','2019-02-20','17:28:44'),(421,1,'Búsqueda Oficio Recepción  con fechas 01/09/2018-28/02/2019.','2019-02-20','17:28:48'),(422,1,'Búsqueda Oficio Recepción  con fechas 01/08/2018-28/02/2019.','2019-02-20','17:28:56'),(423,1,'Consulta oficio seguimiento 400LI0010/0041/2019.','2019-02-20','17:29:03'),(424,1,'Búsqueda Oficio Recepción  con fechas 01/08/2018-01/02/2019.','2019-02-20','17:30:47'),(425,1,'Consulta oficio seguimiento 400LI0010/0041/2019.','2019-02-20','17:31:43'),(426,1,'Búsqueda Oficio Recepción 400LIA000/0004/2019 con fechas 01/08/2018-01/02/2019.','2019-02-20','17:32:14'),(427,1,'Búsqueda Oficio Recepción 400LIA000/0004/2019 con fechas 01/08/2018-01/02/2019.','2019-02-20','17:32:28'),(428,1,'Búsqueda Oficio Recepción M con fechas 01/08/2018-01/02/2019.','2019-02-20','17:32:52'),(429,1,'Consulta oficio seguimiento 400LI0010/0041/2019.','2019-02-20','17:32:57'),(430,1,'Búsqueda Oficio Recepción  con fechas 01/08/2018-01/02/2019.','2019-02-20','17:33:13'),(431,1,'Consulta oficio seguimiento 400LIA000/0004/2019.','2019-02-20','17:33:21'),(432,1,'Descarga de Trámite en Turno del oficio seguimiento 400LIA000/0004/2019 en PDF.','2019-02-20','17:42:35'),(433,4,'Inicio Sesión','2019-02-20','17:45:54'),(434,4,'Búsqueda Oficio Recepción 400 con fechas 01/08/2018-01/02/2019.','2019-02-20','17:46:14'),(435,4,'Consulta oficio seguimiento 400LIA000/0004/2019.','2019-02-20','17:46:20'),(436,4,'Descarga de Trámite en Turno del oficio seguimiento 400LIA000/0004/2019 en PDF.','2019-02-20','17:49:06'),(437,1,'Inicio Sesión','2019-02-22','17:19:12'),(438,1,'Inicio Sesión','2019-02-27','10:52:09'),(439,1,'Consultó su perfil.','2019-02-27','10:52:13'),(440,1,'Inicio Sesión','2019-02-27','11:17:32'),(441,1,'Consultó su perfil.','2019-02-27','11:17:35'),(442,1,'Inicio Sesión','2019-02-27','16:38:26'),(443,1,'Inicio Sesión','2019-03-13','12:10:09'),(444,1,'Inicio Sesión','2019-03-15','14:37:47'),(445,1,'Búsqueda Oficio Seguimiento  con fechas 01/11/2018-01/03/2019.','2019-03-15','14:38:02'),(446,1,'Descarga de Trámite en Turno del oficio seguimiento 400LIA000/0003/2019 en PDF.','2019-03-15','14:38:06'),(447,1,'Descarga de Trámite en Turno del oficio seguimiento 400LIA000/0003/2019 en PDF.','2019-03-15','14:38:39'),(448,1,'Descarga de Trámite en Turno del oficio seguimiento 400LIA000/0003/2019 en PDF.','2019-03-15','14:39:12'),(449,1,'Inicio Sesión','2019-03-19','16:45:11'),(450,1,'Búsqueda Oficio Recepción  con fechas 01/03/2018-19/03/2019.','2019-03-19','16:46:32'),(451,1,'Descarga de archivo recepción CIRCULAR_INTERNA_15.pdf.','2019-03-19','16:46:37'),(452,1,'Descarga de archivo recepción CIRCULAR_INTERNA_15.pdf.','2019-03-19','16:46:37'),(453,1,'Búsqueda Oficio Recepción  con fechas 01/03/2018-19/03/2019.','2019-03-19','16:46:54'),(454,1,'Consulta oficio seguimiento 400LI0010/0041/2019.','2019-03-19','16:46:58'),(455,1,'Descarga de Trámite en Turno del oficio seguimiento 400LI0010/0041/2019 en PDF.','2019-03-19','16:55:03'),(456,1,'Consulta oficio seguimiento 400LI0010/0041/2019.','2019-03-19','16:55:04'),(457,1,'Consulta oficio seguimiento 400LI0010/0041/2019.','2019-03-19','16:55:04'),(458,1,'Consulta oficio seguimiento 400LI0010/0041/2019.','2019-03-19','16:55:04'),(459,1,'Inicio Sesión','2019-03-19','16:55:13'),(460,1,'Búsqueda en bitacora  con fechas 01/03/2019-20/03/2019.','2019-03-19','16:55:31'),(461,1,'Descarga de Trámite en Turno del oficio seguimiento 400LI0010/0041/2019 en PDF.','2019-03-19','17:03:04'),(462,1,'Descarga bitácora en PDF  con fechas 01/03/2019-20/03/2019.','2019-03-19','17:03:46'),(463,1,'Descarga bitácora en PDF  con fechas 01/03/2019-20/03/2019.','2019-03-19','17:11:46'),(464,1,'Inicio Sesión','2019-03-19','18:05:32'),(465,1,'Búsqueda en bitacora  con fechas 02/09/2018-19/03/2019.','2019-03-19','18:06:09'),(466,1,'Descarga bitácora en PDF  con fechas 02/09/2018-19/03/2019.','2019-03-19','19:06:16'),(467,1,'Inicio Sesión','2019-03-19','19:15:12'),(468,1,'Búsqueda Oficio Seguimiento  con fechas 01/09/2018-19/03/2019.','2019-03-19','19:15:42'),(469,1,'Inicio Sesión','2019-03-20','20:06:51'),(470,4,'Inicio Sesión','2019-03-20','23:22:25'),(471,4,'Búsqueda Oficio Atendido  con fechas 20/09/2018-20/03/2019.','2019-03-20','23:23:03'),(472,4,'Descarga Oficio Atendido en PDF de: 400LIA000/0003/2019.','2019-03-20','23:31:17'),(473,4,'Descarga reporte en Excel de la búsqueda  oficio atendido con fechas 20/09/2018-20/03/2019.','2019-03-20','23:31:17'),(474,4,'Descarga Oficio Atendido en PDF de: 400LIA000/0003/2019.','2019-03-20','23:39:26'),(475,1,'Inicio Sesión','2019-03-21','15:32:14'),(476,1,'Búsqueda Oficio Seguimiento  con fechas 01/09/2018-21/03/2019.','2019-03-21','15:33:19'),(477,1,'Búsqueda Oficio Atendido  con fechas 01/09/2018-21/03/2019.','2019-03-21','15:34:44'),(478,1,'Descarga Oficio Atendido en PDF de: 400LIA000/0004/2019.','2019-03-21','15:34:59'),(479,1,'Descarga Oficio Atendido en PDF de: 400LI0010/0042/2019.','2019-03-21','15:38:38'),(480,1,'Búsqueda en bitacora  con fechas 01/03/2019-21/03/2019.','2019-03-21','15:40:10'),(481,1,'Descarga bitácora en PDF  con fechas 01/03/2019-21/03/2019.','2019-03-21','15:40:16'),(482,1,'Inicio Sesión','2019-03-21','16:01:21'),(483,1,'Búsqueda Oficio Atendido  con fechas 01/09/2018-21/03/2019.','2019-03-21','16:01:46'),(484,1,'Descarga Oficio Atendido en PDF de: 400LIA000/0003/2019.','2019-03-21','16:05:50'),(485,1,'Inicio Sesión','2019-03-21','16:07:42'),(486,1,'Búsqueda Oficio Atendido  con fechas 01/09/2018-21/03/2019.','2019-03-21','16:08:00'),(487,1,'Descarga Oficio Atendido en PDF de: 400LIA000/0003/2019.','2019-03-21','16:09:50'),(488,1,'Descarga Oficio Atendido en PDF de: 400LIA000/0003/2019.','2019-03-21','16:12:03'),(489,1,'Inicio Sesión','2019-03-21','16:14:54'),(490,1,'Búsqueda Oficio Atendido  con fechas 01/09/2018-21/03/2019.','2019-03-21','16:15:11'),(491,1,'Descarga Oficio Atendido en PDF de: 400LIA000/0003/2019.','2019-03-21','16:16:03'),(492,1,'Descarga de archivo atendido 400LIA0000003201906022019.pdf.','2019-03-21','16:16:03'),(493,1,'Descarga Oficio Atendido en PDF de: 400LIA000/0003/2019.','2019-03-21','16:19:14'),(494,1,'Búsqueda Oficio Atendido  con fechas 01/09/2018-21/03/2019.','2019-03-21','16:19:14'),(495,1,'Descarga Oficio Atendido en PDF de: 400LIA000/0003/2019.','2019-03-21','16:23:15'),(496,1,'Descarga Oficio Atendido en PDF de: 400LIA000/0003/2019.','2019-03-21','16:23:15'),(497,1,'Inicio Sesión','2019-03-21','16:23:15'),(498,1,'Inicio Sesión','2019-03-21','16:23:47'),(499,1,'Búsqueda Oficio Atendido  con fechas 01/09/2018-21/03/2019.','2019-03-21','16:24:09'),(500,1,'Descarga Oficio Atendido en PDF de: 400LIA000/0004/2019.','2019-03-21','16:28:12'),(501,1,'Descarga Oficio Atendido en PDF de: 400LIA000/0004/2019.','2019-03-21','16:32:12'),(502,1,'Inicio Sesión','2019-03-21','18:38:37'),(503,1,'Búsqueda Oficio Atendido  con fechas 01/09/2018-21/03/2019.','2019-03-21','18:39:01'),(504,1,'Búsqueda Oficio Atendido  con fechas 01/09/2018-21/03/2019.','2019-03-21','18:40:00'),(506,1,'Descarga Oficio Atendido en PDF de: 400LIA000/0003/2019.','2019-03-21','18:44:11'),(507,1,'Descarga Oficio Atendido en PDF de: 400LIA000/0003/2019.','2019-03-21','18:48:11'),(508,1,'Descarga Oficio Atendido en PDF de: 400LIA000/0003/2019.','2019-03-21','18:48:11'),(509,1,'Inicio Sesión','2019-03-21','19:02:25'),(510,1,'Búsqueda en bitacora  con fechas 01/03/2019-21/03/2019.','2019-03-21','19:02:36'),(511,1,'Búsqueda en bitacora  con fechas 01/03/2019-21/03/2019.','2019-03-21','19:02:37'),(512,1,'Búsqueda en bitacora  con fechas 01/03/2019-21/03/2019.','2019-03-21','19:02:38'),(515,1,'Descarga bitácora en PDF  con fechas 01/03/2019-21/03/2019.','2019-03-21','19:22:44'),(516,1,'Descarga bitácora en PDF  con fechas 01/03/2019-21/03/2019.','2019-03-21','19:42:46'),(517,1,'Inicio Sesión','2019-03-21','23:59:10'),(518,1,'Búsqueda Oficio Atendido  con fechas 01/09/2018-21/03/2019.','2019-03-21','23:59:35'),(519,1,'Descarga Oficio Atendido en PDF de: 400LIA000/0003/2019.','2019-03-22','00:03:38'),(520,1,'Descarga reporte en Excel de la búsqueda  oficio atendido con fechas 01/09/2018-21/03/2019.','2019-03-22','00:03:38'),(521,1,'Descarga de archivo atendido 400LIA0000003201906022019.pdf.','2019-03-22','00:03:38'),(522,1,'Descarga reporte en Excel de la búsqueda  oficio atendido con fechas 01/09/2018-21/03/2019.','2019-03-22','00:03:38'),(523,1,'Descarga reporte en Excel de la búsqueda  oficio atendido con fechas 01/09/2018-21/03/2019.','2019-03-22','00:03:39'),(524,1,'Descarga de archivo atendido 400LIA0000003201906022019.pdf.','2019-03-22','00:03:39'),(525,1,'Descarga de archivo atendido 400LIA0000003201906022019.pdf.','2019-03-22','00:03:39'),(526,1,'Inicio Sesión','2019-03-22','13:03:36'),(527,1,'Búsqueda Oficio Atendido  con fechas 01/09/2018-17/03/2019.','2019-03-22','13:04:38'),(528,1,'Descarga reporte en Excel de la búsqueda  oficio atendido con fechas 01/09/2018-17/03/2019.','2019-03-22','13:04:40'),(529,1,'Descarga de archivo atendido 400LIA0000003201906022019.pdf.','2019-03-22','13:04:47'),(530,1,'Descarga de archivo atendido 400LIA0000003201906022019.pdf.','2019-03-22','13:05:04'),(531,1,'Búsqueda Oficio Seguimiento  con fechas 01/09/2018-21/03/2019.','2019-03-22','13:05:49'),(532,1,'Inicio Sesión','2019-03-22','16:05:16'),(533,1,'Búsqueda usuario archundia.','2019-03-22','16:05:32'),(534,1,'Búsqueda usuario archundia.','2019-03-22','16:05:32'),(535,1,'Se ha modificado usuario rarchundia@fiscaliaedomex.gob.mx.','2019-03-22','16:11:21'),(536,1,'Inicio Sesión','2019-03-22','16:17:48'),(537,1,'Búsqueda usuario archundia.','2019-03-22','16:18:05'),(538,1,'Se ha modificado usuario rarchundia@fiscaliaedomex.gob.mx.','2019-03-22','16:18:26'),(539,4,'Inicio Sesión','2019-03-22','16:18:46'),(540,4,'Búsqueda Oficio Atendido  con fechas 01/09/2018-22/03/2019.','2019-03-22','16:20:01'),(541,4,'Descarga Oficio Atendido en PDF de: 400LIA000/0003/2019.','2019-03-22','16:24:04'),(542,4,'Descarga Oficio Atendido en PDF de: 400LIA000/0003/2019.','2019-03-22','16:28:05'),(543,4,'Descarga Oficio Atendido en PDF de: 400LIA000/0003/2019.','2019-03-22','16:28:05'),(548,4,'Descarga Oficio Atendido en PDF de: 400LIA000/0003/2019.','2019-03-22','16:32:05'),(551,1,'Inicio Sesión','2019-03-22','16:36:51'),(552,1,'Búsqueda usuario archundia.','2019-03-22','16:38:39'),(553,1,'Se ha modificado usuario rarchundia@fiscaliaedomex.gob.mx.','2019-03-22','16:38:49'),(554,1,'Se ha modificado usuario rarchundia@fiscaliaedomex.gob.mx.','2019-03-22','16:39:17'),(555,1,'Búsqueda usuario archundia.','2019-03-22','16:40:06'),(556,1,'Búsqueda usuario archundia.','2019-03-22','16:40:07'),(557,1,'Se ha modificado usuario rarchundia@fiscaliaedomex.gob.mx.','2019-03-22','16:40:16'),(558,1,'Inicio Sesión','2019-03-22','17:20:44'),(559,1,'Búsqueda usuario rarchundia.','2019-03-22','17:21:44'),(560,1,'Se ha modificado usuario rarchundia@fiscaliaedomex.gob.mx.','2019-03-22','17:49:54'),(561,1,'Se ha modificado usuario rarchundia@fiscaliaedomex.gob.mx.','2019-03-22','17:50:03'),(562,1,'Se ha modificado usuario rarchundia@fiscaliaedomex.gob.mx.','2019-03-22','17:50:07'),(563,4,'Inicio Sesión','2019-03-22','17:50:40'),(564,1,'Inicio Sesión','2019-03-25','17:28:58'),(565,1,'Búsqueda en bitacora  con fechas 23/03/2019-26/03/2019.','2019-03-25','17:30:16'),(566,1,'Búsqueda en bitacora  con fechas 23/03/2019-26/03/2019.','2019-03-25','17:30:17'),(567,1,'Búsqueda en bitacora  con fechas 23/03/2019-26/03/2019.','2019-03-25','17:30:17'),(568,1,'Búsqueda en bitacora  con fechas 23/03/2019-26/03/2019.','2019-03-25','17:30:17'),(569,1,'Búsqueda en bitacora  con fechas 23/03/2019-26/03/2019.','2019-03-25','17:30:19'),(570,1,'Descarga bitácora en PDF  con fechas 23/03/2019-26/03/2019.','2019-03-25','17:30:26'),(571,1,'Búsqueda Oficio Seguimiento  con fechas 01/09/2018-25/03/2019.','2019-03-25','17:30:50'),(572,1,'Descarga Trámite en Turno del oficio seguimiento 400LIA000/0001/2019 en PDF.','2019-03-25','17:32:45'),(573,1,'Búsqueda Oficio Atendido  con fechas 01/09/2018-25/03/2019.','2019-03-25','17:35:06'),(574,1,'Descarga Oficio Atendido en PDF de: 400LIA000/0003/2019.','2019-03-25','17:35:13'),(577,1,'Inicio Sesión','2019-03-26','23:43:33'),(578,1,'Inicio Sesión','2019-03-26','23:44:49'),(579,1,'Búsqueda Oficio Seguimiento  con fechas 01/08/2018-26/03/2019.','2019-03-26','23:45:06'),(580,1,'Descarga Trámite en Turno del oficio seguimiento 400LIA000/0003/2019 en PDF.','2019-03-26','23:45:09'),(581,1,'Descarga reporte en Excel de la búsqueda  con fechas 01/08/2018-26/03/2019.','2019-03-26','23:45:30'),(582,1,'Consulta oficio atendido del oficio: 400LIA000/0003/2019.','2019-03-26','23:45:57'),(583,1,'Descarga Oficio Atendido en PDF de: 400LIA000/0003/2019.','2019-03-26','23:46:05'),(584,1,'Búsqueda Oficio Atendido  con fechas 01/08/2018-26/03/2019.','2019-03-26','23:47:25'),(585,1,'Descarga Oficio Atendido en PDF de: 400LIA000/0004/2019.','2019-03-26','23:47:31'),(586,1,'Descarga reporte en Excel de la búsqueda  oficio atendido con fechas 01/08/2018-26/03/2019.','2019-03-26','23:47:48'),(587,1,'Búsqueda Oficio Recepción  con fechas 01/08/2018-26/03/2019.','2019-03-26','23:48:19'),(588,1,'Consulta oficio seguimiento 400LIA000/0001/2019.','2019-03-26','23:48:22'),(589,1,'Descarga Trámite en Turno del oficio seguimiento 400LIA000/0001/2019 en PDF.','2019-03-26','23:48:27'),(590,1,'Consulta Oficio Seguimiento Captura con fechas 01/08/2018-26/03/2019.','2019-03-26','23:48:57'),(591,1,'Búsqueda Oficio Atendido Capturacon fechas 01/08/2018-26/03/2019.','2019-03-26','23:49:08'),(592,1,'Búsqueda en bitacora  con fechas 26/03/2019-26/03/2019.','2019-03-26','23:49:21'),(593,1,'Descarga bitácora en PDF  con fechas 26/03/2019-26/03/2019.','2019-03-26','23:49:29'),(594,3,'Inicio Sesión','2019-03-26','23:51:18'),(595,3,'Reporte Oficio Recepción Secretariado.','2019-03-26','23:51:26'),(596,3,'Inicio Sesión','2019-03-26','23:51:49'),(597,3,'Reporte Oficio Recepción Secretariado.','2019-03-26','23:51:53'),(598,3,'Consultó su perfil.','2019-03-26','23:51:56'),(599,2,'Inicio Sesión','2019-03-26','23:52:48'),(600,2,'Búsqueda Oficio Seguimiento  con fechas 01/08/2018-26/03/2019.','2019-03-26','23:53:05'),(601,2,'Búsqueda Oficio Seguimiento  con fechas 01/08/2018-26/03/2019.','2019-03-26','23:57:27'),(602,4,'Inicio Sesión','2019-03-26','23:57:57'),(603,4,'Búsqueda Oficio Recepción  con fechas 01/08/2018-26/03/2019.','2019-03-26','23:58:14'),(604,4,'Consulta oficio seguimiento 400LIA000/0001/2019.','2019-03-26','23:58:22'),(605,2,'Inicio Sesión','2019-03-27','00:00:18'),(606,2,'Búsqueda Oficio Seguimiento  con fechas 26/03/2019-26/03/2019.','2019-03-27','00:00:29'),(607,2,'Búsqueda Oficio Seguimiento  con fechas 01/08/2018-26/03/2019.','2019-03-27','00:00:38'),(608,2,'Descarga reporte en Excel de la búsqueda  con fechas 01/08/2018-26/03/2019.','2019-03-27','00:00:44'),(609,1,'Inicio Sesión','2019-04-04','17:39:58'),(610,1,'Se ha creado el oficio recepción 2877419/2018.','2019-04-04','17:41:27'),(611,1,'Búsqueda Oficio Recepción 2877419/2018 con fechas 01/04/2019-04/04/2019.','2019-04-04','17:41:44'),(612,2,'Inicio Sesión','2019-06-26','17:49:49'),(613,2,'Búsqueda Oficio Seguimiento  con fechas 01/09/2018-01/06/2019.','2019-06-26','17:50:33'),(614,2,'Descarga Trámite en Turno del oficio seguimiento 400LIA000/0003/2019 en PDF.','2019-06-26','17:50:39'),(615,2,'Consulta oficio atendido del oficio: 400LIA000/0003/2019.','2019-06-26','18:00:34'),(616,2,'Búsqueda Oficio Seguimiento  con fechas 01/09/2018-26/06/2019.','2019-06-26','18:01:20'),(617,2,'Descarga Trámite en Turno del oficio seguimiento 400LIA000/0003/2019 en PDF.','2019-06-26','18:01:24'),(618,2,'Búsqueda Oficio Recepción  con fechas 01/09/2018-26/06/2019.','2019-06-26','18:02:10'),(619,2,'Descarga reporte en Excel de la búsqueda  oficio recepción con fechas 01/09/2018-26/06/2019.','2019-06-26','18:02:16'),(620,6,'Inicio Sesión','2019-06-28','14:25:29'),(621,6,'Consultó su perfil.','2019-06-28','14:25:39'),(622,6,'Búsqueda Oficio Recepción  con fechas 01/09/2019-28/06/2019.','2019-06-28','14:26:18'),(623,6,'Búsqueda Oficio Recepción  con fechas 01/08/2019-28/06/2019.','2019-06-28','14:26:27'),(624,6,'Búsqueda Oficio Recepción  con fechas 01/08/2018-28/06/2019.','2019-06-28','14:26:38'),(625,6,'Descarga reporte en Excel de la búsqueda  oficio recepción con fechas 01/08/2018-28/06/2019.','2019-06-28','14:37:54'),(626,6,'Búsqueda Oficio Recepción CIRCULAR INTERNA con fechas 01/08/2018-28/06/2019.','2019-06-28','14:38:25'),(627,6,'Descarga reporte en Excel de la búsqueda CIRCULAR INTERNA oficio recepción con fechas 01/08/2018-28/06/2019.','2019-06-28','14:38:31'),(628,6,'Consulta oficio seguimiento 400LIA000/0001/2019.','2019-06-28','14:39:00'),(629,6,'Búsqueda Oficio Seguimiento 400LIA000 con fechas 01/09/2018-28/06/2019.','2019-06-28','14:39:44'),(630,6,'Descarga reporte en Excel de la búsqueda 400LIA000 con fechas 01/09/2018-28/06/2019.','2019-06-28','14:39:50'),(631,6,'Descarga Trámite en Turno del oficio seguimiento 400LIA000/0001/2019 en PDF.','2019-06-28','14:40:07'),(632,6,'Consulta oficio atendido del oficio: 400LIA000/0003/2019.','2019-06-28','14:40:45'),(633,6,'Descarga Oficio Atendido en PDF de: 400LIA000/0003/2019.','2019-06-28','14:41:05'),(634,6,'Búsqueda Oficio Seguimiento 400 con fechas 01/09/2018-28/06/2019.','2019-06-28','14:43:40'),(635,6,'Consulta oficio atendido del oficio: 400LI0010/0042/2019.','2019-06-28','14:43:45'),(636,6,'Consulta oficio atendido del oficio: 400LI0010/0042/2019.','2019-06-28','14:45:51'),(637,6,'Búsqueda Oficio Recepción  con fechas 01/09/2018-28/06/2019.','2019-06-28','14:46:23'),(638,6,'Descarga de archivo recepción CIRCULAR_INTERNA_15.pdf.','2019-06-28','14:46:39'),(639,6,'Búsqueda Oficio Recepción  con fechas 01/09/2018-28/06/2019.','2019-06-28','14:48:28'),(640,6,'Búsqueda Oficio Recepción  con fechas 01/09/2018-28/06/2019.','2019-06-28','14:48:52'),(641,6,'Consulta oficio seguimiento 400LIA000/0001/2019.','2019-06-28','14:48:54'),(642,6,'Descarga Trámite en Turno del oficio seguimiento 400LIA000/0001/2019 en PDF.','2019-06-28','14:49:00'),(643,6,'Búsqueda Oficio Seguimiento 400 con fechas 01/09/2018-28/06/2019.','2019-06-28','14:54:27'),(644,6,'Consulta oficio atendido del oficio: 400LIA000/0003/2019.','2019-06-28','14:54:38'),(645,6,'Descarga de archivo atendido 400LIA0000003201906022019.pdf.','2019-06-28','14:54:46'),(646,6,'Descarga Oficio Atendido en PDF de: 400LIA000/0003/2019.','2019-06-28','14:55:02'),(647,6,'Búsqueda Oficio Atendido  con fechas 01/09/2019-28/06/2019.','2019-06-28','14:57:44'),(648,6,'Búsqueda Oficio Atendido  con fechas 01/09/2018-28/06/2019.','2019-06-28','14:57:49'),(649,6,'Descarga Oficio Atendido en PDF de: 400LI0010/0042/2019.','2019-06-28','15:11:20'),(650,6,'Descarga de archivo atendido 400LIA0000003201906022019.pdf.','2019-06-28','15:12:18'),(651,6,'Descarga de archivo atendido 400LIA0000003201906022019.pdf.','2019-06-28','15:12:41'),(652,6,'Descarga de archivo atendido 400LIA00000042019280920181.pdf.','2019-06-28','15:13:17'),(653,6,'Descarga de archivo atendido 400LIA00000042019280920181.pdf.','2019-06-28','15:13:42'),(654,6,'Búsqueda Oficio Atendido  con fechas 01/09/2018-28/06/2019.','2019-06-28','15:14:16'),(655,6,'Búsqueda Oficio Atendido  con fechas 01/09/2018-28/06/2019.','2019-06-28','15:14:16'),(656,6,'Búsqueda Oficio Atendido  con fechas 01/09/2018-28/06/2019.','2019-06-28','15:19:18'),(657,6,'Descarga de archivo atendido 400LI001000422019_26092018.pdf.','2019-06-28','15:19:43'),(658,6,'Búsqueda Oficio Atendido  con fechas 01/09/2018-28/06/2019.','2019-06-28','15:24:52'),(659,6,'Descarga de archivo atendido 400LI001000422019_26092018.pdf.','2019-06-28','15:24:57'),(660,6,'Descarga de archivo atendido 400LIA00000042019280920181.pdf.','2019-06-28','15:25:01'),(661,6,'Descarga de archivo atendido 400LIA0000003201906022019.pdf.','2019-06-28','15:25:04'),(662,6,'Descarga de archivo atendido 400LI001000422019_26092018.pdf.','2019-06-28','15:25:07'),(663,6,'Descarga de archivo atendido 400LI001000422019_26092018.pdf.','2019-06-28','15:25:29'),(664,6,'Búsqueda Oficio Seguimiento  con fechas 01/09/2018-28/06/2019.','2019-06-28','15:26:17'),(665,6,'Consulta oficio atendido del oficio: 400LIA000/0003/2019.','2019-06-28','15:26:24'),(666,6,'Búsqueda Oficio Seguimiento  con fechas 01/09/2018-28/06/2019.','2019-06-28','15:26:59'),(667,6,'Consulta oficio atendido del oficio: 400LIA000/0003/2019.','2019-06-28','15:30:38'),(668,6,'Búsqueda Oficio Seguimiento  con fechas 01/09/2018-28/06/2019.','2019-06-28','15:32:04'),(669,6,'Oficio atendido creado, del oficio 400LIA000/0001/2019 creado.','2019-06-28','15:33:15'),(670,6,'Consulta oficio atendido del oficio: 400LIA000/0001/2019.','2019-06-28','15:33:15'),(671,6,'Descarga de archivo atendido 400LIA00000012019_03012019.pdf.','2019-06-28','15:33:20'),(672,6,'Descarga de archivo atendido 400LIA00000012019_03012019.pdf.','2019-06-28','15:35:49'),(673,6,'Búsqueda en bitacora  con fechas 27/06/2019-28/06/2019.','2019-06-28','15:36:14'),(674,7,'Inicio Sesión','2019-06-28','15:44:20'),(675,4,'Inicio Sesión','2019-06-29','15:44:36'),(676,3,'Inicio Sesión','2019-07-01','15:06:11'),(677,3,'Reporte Oficio Recepción Secretariado.','2019-07-01','15:06:40'),(678,6,'Inicio Sesión','2019-07-01','15:10:52'),(679,6,'Consultó su perfil.','2019-07-01','15:10:57'),(680,6,'Cambió su contraseña.','2019-07-01','15:11:07'),(681,6,'Consultó su perfil.','2019-07-01','15:11:07'),(682,6,'Inicio Sesión','2019-07-01','15:11:30'),(683,6,'Búsqueda Oficio Seguimiento  con fechas 01/09/2018-01/07/2019.','2019-07-01','15:11:49'),(684,6,'Consulta oficio atendido del oficio: 400LIA000/0003/2019.','2019-07-01','15:11:52'),(685,6,'Búsqueda Oficio Seguimiento  con fechas 01/09/2018-31/07/2019.','2019-07-01','15:12:11'),(686,6,'Descarga Trámite en Turno del oficio seguimiento 400LIA000/0003/2019 en PDF.','2019-07-01','15:12:15'),(687,6,'Búsqueda Oficio Atendido  con fechas 01/09/2019-31/07/2019.','2019-07-01','15:16:52'),(688,6,'Búsqueda Oficio Atendido  con fechas 01/09/2018-31/07/2019.','2019-07-01','15:17:04'),(689,6,'Descarga de archivo atendido 400LIA0000003201906022019.pdf.','2019-07-01','15:17:18'),(690,6,'Descarga Oficio Atendido en PDF de: 400LIA000/0003/2019.','2019-07-01','15:19:46'),(691,6,'Inicio Sesión','2019-07-01','16:25:30'),(692,6,'Búsqueda Oficio Seguimiento  con fechas 01/09/2018-31/07/2019.','2019-07-01','16:25:59'),(693,6,'Inicio Sesión','2019-07-01','17:18:24'),(694,6,'Se ha creado el oficio recepción 78548.','2019-07-01','17:20:47'),(695,6,'Búsqueda Oficio Recepción  con fechas 01/07/2019-01/07/2019.','2019-07-01','17:21:04'),(696,6,'Descarga reporte en Excel de la búsqueda  oficio recepción con fechas 01/07/2019-01/07/2019.','2019-07-01','17:21:30'),(697,6,'Oficio seguimiento 400LIA000/0005/2019 creado.','2019-07-01','17:23:41'),(698,6,'Consulta oficio seguimiento 400LIA000/0005/2019.','2019-07-01','17:23:41'),(699,6,'Descarga Trámite en Turno del oficio seguimiento 400LIA000/0005/2019 en PDF.','2019-07-01','17:23:56'),(700,6,'Búsqueda Oficio Seguimiento  con fechas 01/07/2019-01/07/2019.','2019-07-01','17:25:30'),(701,6,'Oficio atendido creado, del oficio 400LIA000/0005/2019 creado.','2019-07-01','17:31:36'),(702,6,'Consulta oficio atendido del oficio: 400LIA000/0005/2019.','2019-07-01','17:31:36'),(703,6,'Descarga Oficio Atendido en PDF de: 400LIA000/0005/2019.','2019-07-01','17:31:48'),(704,6,'Búsqueda Oficio Seguimiento  con fechas 01/07/2019-01/07/2019.','2019-07-01','17:33:57'),(705,6,'Búsqueda en bitacora  con fechas 01/07/2019-01/07/2019.','2019-07-01','17:35:45'),(706,6,'Búsqueda en bitacora  con fechas 01/07/2019-01/07/2019.','2019-07-01','17:35:45'),(707,6,'Inicio Sesión','2019-07-01','18:29:48'),(708,6,'Se ha creado el oficio recepción 28714/2019.','2019-07-01','18:30:44'),(709,6,'Búsqueda Oficio Recepción  con fechas 01/07/2019-01/07/2019.','2019-07-01','18:32:07'),(710,6,'Descarga de archivo recepción 287142019.pdf.','2019-07-01','18:32:20'),(711,6,'Oficio seguimiento 400LI0010/0043/2019 creado.','2019-07-01','18:36:25'),(712,6,'Consulta oficio seguimiento 400LI0010/0043/2019.','2019-07-01','18:36:25'),(713,6,'Descarga Trámite en Turno del oficio seguimiento 400LI0010/0043/2019 en PDF.','2019-07-01','18:36:38'),(714,6,'Descarga Trámite en Turno del oficio seguimiento 400LI0010/0043/2019 en PDF.','2019-07-01','18:37:13'),(715,6,'Búsqueda Oficio Seguimiento  con fechas 01/07/2019-02/07/2019.','2019-07-01','18:42:54'),(716,6,'Búsqueda Oficio Seguimiento  con fechas 01/07/2019-02/07/2019.','2019-07-01','18:42:56'),(717,6,'Consulta oficio atendido del oficio: 400LIA000/0005/2019.','2019-07-01','18:49:31'),(718,6,'Consulta oficio atendido del oficio: 400LIA000/0005/2019.','2019-07-01','18:49:45'),(719,6,'Búsqueda Oficio Recepción  con fechas 01/07/2019-01/07/2019.','2019-07-01','18:51:11'),(720,6,'Búsqueda Oficio Recepción  con fechas 01/07/2019-01/07/2019.','2019-07-01','18:53:57'),(721,6,'Descarga de archivo recepción 287142019.pdf.','2019-07-01','18:54:12'),(722,6,'Búsqueda Oficio Atendido  con fechas 01/07/2019-01/07/2019.','2019-07-01','18:54:27'),(723,6,'Búsqueda Oficio Atendido  con fechas 01/09/2018-02/07/2019.','2019-07-01','19:00:14'),(724,6,'Búsqueda Oficio Seguimiento  con fechas 01/07/2019-01/07/2019.','2019-07-01','19:05:42'),(725,6,'Consulta oficio atendido del oficio: 400LIA000/0005/2019.','2019-07-01','19:05:44'),(726,6,'Búsqueda Oficio Seguimiento  con fechas 01/07/2019-01/07/2019.','2019-07-01','19:06:01'),(727,6,'Oficio atendido creado, del oficio 400LI0010/0043/2019 creado.','2019-07-01','19:06:56'),(728,6,'Consulta oficio atendido del oficio: 400LI0010/0043/2019.','2019-07-01','19:06:56'),(729,6,'Descarga de archivo atendido 400LI001000432019_01072019.pdf.','2019-07-01','19:07:01'),(730,6,'Descarga Oficio Atendido en PDF de: 400LI0010/0043/2019.','2019-07-01','19:07:08'),(731,6,'Búsqueda Oficio Recepción  con fechas 01/07/2019-01/07/2019.','2019-07-01','19:10:42'),(732,6,'Consulta oficio seguimiento 400LI0010/0043/2019.','2019-07-01','19:10:50'),(733,6,'Búsqueda Oficio Atendido  con fechas 01/07/2019-01/07/2019.','2019-07-01','19:11:16'),(734,6,'Descarga Oficio Atendido en PDF de: 400LIA000/0005/2019.','2019-07-01','19:11:21'),(735,6,'Búsqueda Oficio Atendido  con fechas 01/07/2019-01/07/2019.','2019-07-01','19:17:06'),(736,6,'Búsqueda Oficio Atendido  con fechas 01/07/2019-01/07/2019.','2019-07-01','19:17:13'),(737,6,'Búsqueda Oficio Atendido  con fechas 01/07/2019-01/07/2019.','2019-07-01','19:17:14'),(738,6,'Búsqueda Oficio Atendido  con fechas 01/07/2018-01/07/2019.','2019-07-01','19:17:20'),(739,6,'Búsqueda Oficio Atendido  con fechas 01/07/2019-01/07/2019.','2019-07-01','19:25:30'),(740,6,'Descarga Oficio Atendido en PDF de: 400LIA000/0005/2019.','2019-07-01','19:25:41'),(741,6,'Búsqueda Oficio Atendido  con fechas 01/07/2019-01/07/2019.','2019-07-01','19:27:44'),(742,6,'Búsqueda Oficio Atendido  con fechas 01/07/2018-01/07/2019.','2019-07-01','19:27:51'),(743,6,'Descarga Oficio Atendido en PDF de: 400LI0010/0042/2019.','2019-07-01','19:29:02'),(744,6,'Se ha creado el oficio recepción 28774/2019.','2019-07-01','19:38:49'),(745,6,'Búsqueda Oficio Seguimiento  con fechas 01/07/2019-01/07/2019.','2019-07-01','19:39:52'),(746,6,'Búsqueda Oficio Seguimiento  con fechas 01/07/2019-01/07/2019.','2019-07-01','19:39:53'),(747,6,'Búsqueda Oficio Recepción  con fechas 01/07/2019-01/07/2019.','2019-07-01','19:40:03'),(748,6,'Inicio Sesión','2019-07-02','20:50:32'),(749,6,'Se ha creado el oficio recepción 4000LKA002/234/2O9.','2019-07-02','20:55:18'),(750,6,'Búsqueda Oficio Recepción  con fechas 02/07/2019-02/07/2019.','2019-07-02','20:58:23'),(751,6,'Búsqueda Oficio Recepción  con fechas 01/06/2019-02/07/2019.','2019-07-02','21:00:06'),(752,6,'Búsqueda Oficio Recepción  con fechas 19/06/2019-19/06/2019.','2019-07-02','21:27:13'),(753,6,'Búsqueda Oficio Seguimiento  con fechas 01/07/2019-02/07/2019.','2019-07-02','21:28:53'),(754,6,'Búsqueda Oficio Atendido  con fechas 01/07/2019-02/07/2019.','2019-07-02','21:30:31'),(755,6,'Búsqueda Oficio Seguimiento  con fechas 01/06/2019-02/07/2019.','2019-07-02','21:34:17'),(756,6,'Inicio Sesión','2019-07-18','19:29:48'),(757,6,'Búsqueda Oficio Recepción  con fechas 01/07/2019-18/07/2019.','2019-07-18','19:30:36'),(758,6,'Descarga de archivo recepción 287742019.pdf.','2019-07-18','19:30:42'),(759,6,'Descarga de archivo recepción 287742019.pdf.','2019-07-18','19:31:10'),(760,6,'Descarga de archivo recepción 287742019.pdf.','2019-07-18','19:33:42'),(761,6,'Descarga de archivo recepción 287742019.pdf.','2019-07-18','19:34:15'),(762,6,'Descarga de archivo recepción 287742019.pdf.','2019-07-18','19:35:12'),(763,6,'Inicio Sesión','2019-07-18','19:37:17'),(764,6,'Búsqueda Oficio Recepción  con fechas 01/07/2019-18/07/2019.','2019-07-18','19:37:44'),(765,6,'Búsqueda Oficio Recepción  con fechas 01/07/2019-18/07/2019.','2019-07-18','19:37:59'),(766,6,'Descarga de archivo recepción 287742019.pdf.','2019-07-18','19:38:03'),(767,6,'Descarga de archivo recepción 287742019.pdf.','2019-07-18','19:38:03'),(768,6,'Búsqueda Oficio Recepción  con fechas 01/07/2019-18/07/2019.','2019-07-18','19:40:08'),(769,6,'Búsqueda Oficio Recepción  con fechas 01/06/2019-18/07/2019.','2019-07-18','19:40:17'),(770,6,'Búsqueda Oficio Recepción  con fechas 01/06/2019-18/07/2019.','2019-07-18','19:40:19'),(771,6,'Búsqueda Oficio Recepción  con fechas 01/06/2019-18/07/2019.','2019-07-18','19:40:23'),(772,6,'Búsqueda Oficio Recepción  con fechas 01/06/2019-18/07/2019.','2019-07-18','19:40:27'),(773,6,'Búsqueda Oficio Recepción  con fechas 01/06/2019-18/07/2019.','2019-07-18','19:40:28'),(774,6,'Búsqueda Oficio Recepción  con fechas 01/06/2019-18/07/2019.','2019-07-18','19:44:00'),(775,6,'Descarga reporte en Excel de la búsqueda  oficio recepción con fechas 01/06/2019-18/07/2019.','2019-07-18','19:44:04'),(776,6,'Búsqueda Oficio Seguimiento  con fechas 01/07/2019-18/07/2019.','2019-07-18','19:45:43'),(777,6,'Búsqueda Oficio Seguimiento  con fechas 01/07/2019-18/07/2019.','2019-07-18','19:46:03'),(778,6,'Búsqueda Oficio Seguimiento  con fechas 01/07/2019-18/07/2019.','2019-07-18','19:46:23'),(779,6,'Búsqueda Oficio Seguimiento  con fechas 01/07/2019-18/07/2019.','2019-07-18','19:47:51'),(780,6,'Búsqueda Oficio Seguimiento  con fechas 01/07/2019-18/07/2019.','2019-07-18','19:49:18'),(781,6,'Búsqueda Oficio Seguimiento  con fechas 01/07/2019-18/07/2019.','2019-07-18','19:49:18'),(782,6,'Búsqueda Oficio Seguimiento  con fechas 01/07/2019-18/07/2019.','2019-07-18','19:49:24'),(783,6,'Búsqueda Oficio Seguimiento  con fechas 01/07/2019-18/07/2019.','2019-07-18','19:50:04'),(784,6,'Búsqueda Oficio Seguimiento  con fechas 01/07/2019-18/07/2019.','2019-07-18','19:50:04'),(785,6,'Búsqueda Oficio Seguimiento  con fechas 01/07/2019-18/07/2019.','2019-07-18','19:50:05'),(786,6,'Búsqueda Oficio Seguimiento  con fechas 01/07/2019-18/07/2019.','2019-07-18','19:51:21'),(787,6,'Búsqueda Oficio Seguimiento  con fechas 01/07/2019-18/07/2019.','2019-07-18','19:52:00'),(788,6,'Búsqueda Oficio Seguimiento  con fechas 01/07/2019-18/07/2019.','2019-07-18','19:52:00'),(789,6,'Búsqueda Oficio Seguimiento  con fechas 01/07/2019-18/07/2019.','2019-07-18','19:52:43'),(790,6,'Búsqueda Oficio Seguimiento  con fechas 01/07/2019-18/07/2019.','2019-07-18','19:55:19'),(791,6,'Búsqueda Oficio Seguimiento  con fechas 01/07/2019-18/07/2019.','2019-07-18','19:55:30'),(792,6,'Búsqueda Oficio Seguimiento  con fechas 01/07/2019-18/07/2019.','2019-07-18','19:55:35'),(793,6,'Descarga reporte en Excel de la búsqueda  con fechas 01/07/2019-18/07/2019.','2019-07-18','19:55:39'),(794,6,'Descarga reporte en Excel de la búsqueda  con fechas 01/07/2019-18/07/2019.','2019-07-18','19:55:40'),(795,6,'Búsqueda Oficio Seguimiento  con fechas 01/07/2019-18/07/2019.','2019-07-18','19:55:52'),(796,6,'Descarga reporte en Excel de la búsqueda  con fechas 01/07/2019-18/07/2019.','2019-07-18','19:55:55'),(797,6,'Búsqueda Oficio Recepción  con fechas 15/07/2019-18/07/2019.','2019-07-18','19:59:16'),(798,6,'Oficio seguimiento 400LI0010/0044/2019 creado.','2019-07-18','19:59:59'),(799,6,'Consulta oficio seguimiento 400LI0010/0044/2019.','2019-07-18','19:59:59'),(800,6,'Oficio seguimiento 400LI0010/0045/2019 creado.','2019-07-18','19:59:59'),(801,6,'Consulta oficio seguimiento 400LI0010/0045/2019.','2019-07-18','19:59:59'),(802,6,'Búsqueda Oficio Seguimiento 0045 con fechas 15/07/2019-18/07/2019.','2019-07-18','20:00:48'),(803,6,'Descarga reporte en Excel de la búsqueda 0045 con fechas 15/07/2019-18/07/2019.','2019-07-18','20:00:55'),(804,6,'Inicio Sesión','2019-07-18','21:14:08'),(805,6,'Búsqueda Oficio Seguimiento  con fechas 01/07/2019-18/07/2019.','2019-07-18','21:14:21'),(806,6,'Inicio Sesión','2019-07-18','21:58:33'),(807,6,'Búsqueda Oficio Seguimiento  con fechas 01/07/2019-18/07/2019.','2019-07-18','21:58:49'),(808,6,'Oficio seguimiento 400LIA000/0006/2019 creado.','2019-07-18','22:21:47'),(809,6,'Consulta oficio atendido del oficio: 400LIA000/0006/2019.','2019-07-18','22:21:47'),(810,6,'Descarga Oficio Atendido en PDF de: 400LIA000/0006/2019.','2019-07-18','22:22:17'),(811,6,'Búsqueda Oficio Atendido 0006 con fechas 01/07/2019-18/07/2019.','2019-07-18','22:32:57'),(812,6,'Consulta oficio atendido del oficio: 400LIA000/0006/2019.','2019-07-18','22:33:00'),(813,6,'Inicio Sesión','2019-07-19','17:59:15'),(814,6,'Búsqueda Oficio Seguimiento  con fechas 01/07/2019-19/07/2019.','2019-07-19','18:00:29'),(815,6,'Búsqueda Oficio Seguimiento  con fechas 01/07/2019-19/07/2019.','2019-07-19','18:00:35'),(816,6,'Búsqueda Oficio Seguimiento  con fechas 01/07/2019-19/07/2019.','2019-07-19','18:00:37'),(817,6,'Búsqueda Oficio Seguimiento  con fechas 01/07/2019-19/07/2019.','2019-07-19','18:00:42'),(818,6,'Búsqueda Oficio Seguimiento  con fechas 01/07/2019-19/07/2019.','2019-07-19','18:01:23'),(819,6,'Búsqueda Oficio Seguimiento  con fechas 01/07/2019-19/07/2019.','2019-07-19','18:01:34'),(820,6,'Búsqueda Oficio Seguimiento  con fechas 01/07/2019-19/07/2019.','2019-07-19','18:01:42'),(821,6,'Oficio seguimiento 400LI0010/0046/2019 creado.','2019-07-19','18:03:48'),(822,6,'Consulta oficio atendido del oficio: 400LI0010/0046/2019.','2019-07-19','18:03:49'),(823,6,'Descarga Oficio Atendido en PDF de: 400LI0010/0046/2019.','2019-07-19','18:07:50'),(824,6,'Búsqueda Oficio Seguimiento  con fechas 01/07/2019-19/07/2019.','2019-07-19','18:09:15'),(825,6,'Consulta oficio atendido del oficio: 400LI0010/0046/2019.','2019-07-19','18:09:18'),(826,6,'Consulta oficio atendido del oficio: 400LI0010/0046/2019.','2019-07-19','18:09:18'),(827,6,'Consulta oficio atendido del oficio: 400LI0010/0046/2019.','2019-07-19','18:09:19'),(828,6,'Búsqueda Oficio Seguimiento  con fechas 01/07/2019-19/07/2019.','2019-07-19','18:09:32'),(829,6,'Descarga reporte en Excel de la búsqueda  con fechas 01/07/2019-19/07/2019.','2019-07-19','18:09:35'),(830,6,'Búsqueda Oficio Seguimiento  con fechas 01/07/2019-19/07/2019.','2019-07-19','18:12:27'),(831,6,'Búsqueda Oficio Seguimiento  con fechas 01/07/2019-19/07/2019.','2019-07-19','18:12:29'),(832,6,'Descarga reporte en Excel de la búsqueda  con fechas 01/07/2019-19/07/2019.','2019-07-19','18:12:30'),(833,6,'Búsqueda Oficio Seguimiento  con fechas 01/07/2019-19/07/2019.','2019-07-19','18:13:20'),(834,6,'Búsqueda Oficio Seguimiento  con fechas 01/07/2019-19/07/2019.','2019-07-19','18:47:47'),(835,6,'Búsqueda Oficio Seguimiento  con fechas 01/07/2019-19/07/2019.','2019-07-19','18:47:49'),(836,6,'Búsqueda Oficio Seguimiento  con fechas 01/07/2019-19/07/2019.','2019-07-19','18:47:49'),(837,6,'Búsqueda Oficio Seguimiento  con fechas 01/07/2019-19/07/2019.','2019-07-19','18:47:53'),(838,6,'Búsqueda Oficio Recepción  con fechas 19/07/2019-19/07/2019.','2019-07-19','18:50:37'),(839,6,'Búsqueda Oficio Recepción  con fechas 18/07/2019-18/07/2019.','2019-07-19','18:50:48'),(840,6,'Búsqueda Oficio Recepción  con fechas 19/07/2019-19/07/2019.','2019-07-19','18:52:53'),(841,6,'Búsqueda Oficio Recepción  con fechas 19/07/2019-19/07/2019.','2019-07-19','18:52:57'),(842,6,'Búsqueda Oficio Recepción  con fechas 19/07/2019-19/07/2019.','2019-07-19','18:54:58'),(843,6,'Búsqueda Oficio Recepción  con fechas 19/07/2019-19/07/2019.','2019-07-19','19:04:27'),(844,6,'Búsqueda Oficio Seguimiento  con fechas 01/07/2019-19/07/2019.','2019-07-19','19:13:10'),(845,6,'Búsqueda Oficio Recepción  con fechas 19/07/2019-19/07/2019.','2019-07-19','19:13:37'),(846,6,'Búsqueda Oficio Recepción  con fechas 19/07/2019-19/07/2019.','2019-07-19','19:13:37'),(847,6,'Búsqueda Oficio Recepción  con fechas 19/07/2019-19/07/2019.','2019-07-19','19:14:07'),(848,6,'Búsqueda Oficio Recepción  con fechas 19/07/2019-19/07/2019.','2019-07-19','19:14:07'),(849,6,'Oficio seguimiento 400LIA000/0007/2019 creado.','2019-07-19','19:15:22'),(850,6,'Consulta oficio seguimiento 400LIA000/0007/2019.','2019-07-19','19:15:22'),(851,6,'Búsqueda Oficio Seguimiento  con fechas 19/07/2019-19/07/2019.','2019-07-19','19:17:28'),(852,6,'Oficio seguimiento 400LIA000/0008/2019 creado.','2019-07-19','19:18:49'),(853,6,'Consulta oficio atendido del oficio: 400LIA000/0008/2019.','2019-07-19','19:18:49'),(854,6,'Búsqueda Oficio Recepción  con fechas 19/07/2019-19/07/2019.','2019-07-19','19:21:48'),(855,6,'Búsqueda Oficio Recepción  con fechas 19/07/2019-19/07/2019.','2019-07-19','19:21:49'),(856,6,'Oficio seguimiento 400LI0010/0047/2019 creado.','2019-07-19','19:23:20'),(857,6,'Consulta oficio seguimiento 400LI0010/0047/2019.','2019-07-19','19:23:20'),(858,6,'Búsqueda Oficio Seguimiento 0047 con fechas 19/07/2019-19/07/2019.','2019-07-19','19:25:01'),(859,6,'Búsqueda Oficio Seguimiento 0047 con fechas 19/07/2019-19/07/2019.','2019-07-19','19:25:07'),(860,6,'Búsqueda Oficio Seguimiento 0047 con fechas 19/07/2019-19/07/2019.','2019-07-19','19:25:09'),(861,6,'Búsqueda Oficio Seguimiento  con fechas 19/07/2019-19/07/2019.','2019-07-19','19:25:16'),(862,6,'Consulta oficio atendido del oficio: 400LIA000/0008/2019.','2019-07-19','19:25:21'),(863,6,'Búsqueda Oficio Seguimiento  con fechas 19/07/2019-19/07/2019.','2019-07-19','19:27:30'),(864,6,'Oficio seguimiento 400LI0010/0048/2019 creado.','2019-07-19','19:30:12'),(865,6,'Consulta oficio atendido del oficio: 400LI0010/0048/2019.','2019-07-19','19:30:12'),(866,6,'Se ha modificado oficio400LI0010/0048/2019.','2019-07-19','19:33:22'),(867,6,'Consulta oficio atendido del oficio: 400LI0010/0048/2019.','2019-07-19','19:33:22'),(868,6,'Búsqueda Oficio Atendido  con fechas 19/07/2019-19/07/2019.','2019-07-19','19:38:40'),(869,6,'Consulta oficio atendido del oficio: 400LI0010/0048/2019.','2019-07-19','19:50:31'),(870,6,'Búsqueda Oficio Atendido  con fechas 01/07/2019-19/07/2019.','2019-07-19','19:52:08'),(871,6,'Inicio Sesión','2019-10-08','18:08:47'),(872,6,'Inicio Sesión','2019-10-08','18:09:03'),(873,6,'Inicio Sesión','2019-10-08','18:10:21'),(874,6,'Búsqueda Oficio Recepción  con fechas 01/09/2018-08/10/2019.','2019-10-08','18:10:45'),(875,6,'Búsqueda Oficio Recepción  con fechas 08/10/2019-08/10/2019.','2019-10-08','18:11:35'),(876,6,'Descarga de archivo recepción 0006ASD.pdf.','2019-10-08','18:11:50'),(878,6,'Inicio Sesión','2019-10-08','20:05:46'),(879,6,'Búsqueda Oficio Recepción  con fechas 08/10/2019-08/10/2019.','2019-10-08','20:34:25'),(880,6,'Descarga de archivo recepción 12345.pdf.','2019-10-08','20:34:27'),(881,6,'Inicio Sesión','2019-10-08','22:33:38'),(882,6,'Inicio Sesión','2019-10-09','15:13:48'),(883,6,'Búsqueda Oficio Recepción  con fechas 09/10/2019-09/10/2019.','2019-10-09','15:14:29'),(884,6,'Descarga de archivo recepción 845422019.pdf.','2019-10-09','15:14:40'),(885,6,'Inicio Sesión','2019-10-10','15:17:19'),(886,6,'Inicio Sesión','2019-10-10','15:17:46'),(887,6,'Búsqueda Oficio Recepción  con fechas 01/06/2019-26/10/2019.','2019-10-10','15:18:21'),(888,6,'Descarga de archivo recepción 845422019.pdf.','2019-10-10','15:18:24'),(889,6,'Búsqueda Oficio Seguimiento 18 con fechas 10/10/2019-10/10/2019.','2019-10-10','15:24:41'),(890,6,'Búsqueda Oficio Seguimiento 18 con fechas 01/10/2019-10/10/2019.','2019-10-10','15:24:49'),(891,6,'Búsqueda Oficio Seguimiento 18 con fechas 01/10/2019-10/10/2019.','2019-10-10','15:24:49'),(892,6,'Búsqueda Oficio Recepción  con fechas 01/10/2019-12/10/2019.','2019-10-10','15:25:09'),(893,6,'Descarga de archivo recepción 4454545.pdf.','2019-10-10','15:25:12'),(894,6,'Descarga reporte en Excel de la búsqueda  oficio recepción con fechas 01/10/2019-12/10/2019.','2019-10-10','15:25:30'),(895,6,'Inicio Sesión','2019-10-10','19:39:47'),(896,6,'Inicio Sesión','2019-11-19','20:29:12'),(897,6,'Inicio Sesión','2020-01-24','17:38:24');
/*!40000 ALTER TABLE `bitacora_sigo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `captura`
--

DROP TABLE IF EXISTS `captura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `captura` (
  `id_ofseg` int(11) NOT NULL AUTO_INCREMENT,
  `nomen_ofseg` varchar(50) NOT NULL,
  `fecha_ofseg` date NOT NULL,
  `id_etA_ofseg` int(11) NOT NULL,
  `termino_ofseg` datetime NOT NULL,
  `id_dest_ofseg` int(11) NOT NULL,
  `obs_ofseg` longtext NOT NULL,
  `aten_ofseg` int(11) NOT NULL,
  `id_ruta_ofseg` int(11) NOT NULL,
  `id_inf_ofseg` int(11) NOT NULL,
  `asunto_ofseg` longtext NOT NULL,
  `id_oficioEntrada_ofseg` int(11) NOT NULL,
  PRIMARY KEY (`id_ofseg`),
  KEY `captura` (`aten_ofseg`),
  KEY `captura_2` (`id_etA_ofseg`),
  KEY `captura_3` (`id_dest_ofseg`),
  KEY `captura_4` (`id_ruta_ofseg`),
  KEY `captura_5` (`id_inf_ofseg`),
  KEY `captura_6` (`id_oficioEntrada_ofseg`),
  CONSTRAINT `captura` FOREIGN KEY (`aten_ofseg`) REFERENCES `usuario` (`id_usuario`),
  CONSTRAINT `captura_2` FOREIGN KEY (`id_etA_ofseg`) REFERENCES `etiquetas_asunto` (`id_etAsunto`),
  CONSTRAINT `captura_3` FOREIGN KEY (`id_dest_ofseg`) REFERENCES `destinatario` (`id_destinatario`),
  CONSTRAINT `captura_4` FOREIGN KEY (`id_ruta_ofseg`) REFERENCES `ruta_oficio` (`id_ruta`),
  CONSTRAINT `captura_5` FOREIGN KEY (`id_inf_ofseg`) REFERENCES `informar` (`id_informar`),
  CONSTRAINT `captura_6` FOREIGN KEY (`id_oficioEntrada_ofseg`) REFERENCES `oficio_entrada` (`id_oficioEntrada`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;



DROP TABLE IF EXISTS `captura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `captura` (
  `id_ofseg` int(11) NOT NULL AUTO_INCREMENT,
  `nomen_ofseg` varchar(50) NOT NULL,
  `fecha_ofseg` date NOT NULL,
  `id_etA_ofseg` int(11) NOT NULL,
  `termino_ofseg` datetime NOT NULL,
  `id_dest_ofseg` int(11) NOT NULL,
  `obs_ofseg` longtext NOT NULL,
  `aten_ofseg` int(11) NOT NULL,
  `id_ruta_ofseg` int(11) NOT NULL,
  `id_inf_ofseg` int(11) NOT NULL,
  `asunto_ofseg` longtext NOT NULL,
  `id_oficioEntrada_ofseg` int(11) NOT NULL,
  PRIMARY KEY (`id_ofseg`),
  KEY `captura` (`aten_ofseg`),
  KEY `captura_2` (`id_etA_ofseg`),
  KEY `captura_3` (`id_dest_ofseg`),
  KEY `captura_4` (`id_ruta_ofseg`),
  KEY `captura_5` (`id_inf_ofseg`),
  KEY `captura_6` (`id_oficioEntrada_ofseg`),
  FOREIGN KEY (`aten_ofseg`) REFERENCES `usuario` (`id_usuario`),
  FOREIGN KEY (`id_etA_ofseg`) REFERENCES `etiquetas_asunto` (`id_etAsunto`),
  FOREIGN KEY (`id_dest_ofseg`) REFERENCES `destinatario` (`id_destinatario`),
  FOREIGN KEY (`id_ruta_ofseg`) REFERENCES `ruta_oficio` (`id_ruta`),
  FOREIGN KEY (`id_inf_ofseg`) REFERENCES `informar` (`id_informar`),
  FOREIGN KEY (`id_oficioEntrada_ofseg`) REFERENCES `captura_entrada` (`id_cEntrada`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Dumping data for table `captura`
--

LOCK TABLES `captura` WRITE;
/*!40000 ALTER TABLE `captura` DISABLE KEYS */;
/*!40000 ALTER TABLE `captura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `captura_atendido`
--

DROP TABLE IF EXISTS `captura_atendido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `captura_atendido` (
  `id_ofAtenCap` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_atenCap` date NOT NULL,
  `nombre_atenCap` varchar(100) NOT NULL,
  `cargo_atenCap` longtext NOT NULL,
  `descCap` longtext NOT NULL,
  `arch_atenCap` varchar(100) NOT NULL,
  `copia_aCap` varchar(200) NOT NULL,
  `id_ofseg` int(11) NOT NULL,
  `atencionCap` int(11) NOT NULL,
  PRIMARY KEY (`id_ofAtenCap`),
  KEY `cap_aten1` (`id_ofseg`),
  KEY `cap_aten2` (`atencionCap`),
  CONSTRAINT `cap_aten1` FOREIGN KEY (`id_ofseg`) REFERENCES `captura` (`id_ofseg`),
  CONSTRAINT `cap_aten2` FOREIGN KEY (`atencionCap`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `captura_atendido`
--

LOCK TABLES `captura_atendido` WRITE;
/*!40000 ALTER TABLE `captura_atendido` DISABLE KEYS */;
/*!40000 ALTER TABLE `captura_atendido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dependencias`
--

DROP TABLE IF EXISTS `dependencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dependencias` (
  `id_dependencias` int(11) NOT NULL AUTO_INCREMENT,
  `dependencias` varchar(150) NOT NULL,
  PRIMARY KEY (`id_dependencias`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dependencias`
--

LOCK TABLES `dependencias` WRITE;
/*!40000 ALTER TABLE `dependencias` DISABLE KEYS */;
INSERT INTO `dependencias` VALUES (1,'FISCALIA GENERAL DE JUSTICIA DEL ESTADO DE MÉXICO');
/*!40000 ALTER TABLE `dependencias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `destinatario`
--

DROP TABLE IF EXISTS `destinatario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `destinatario` (
  `id_destinatario` int(11) NOT NULL AUTO_INCREMENT,
  `conase` int(11) NOT NULL,
  `valle_toluca` int(11) NOT NULL,
  `valle_mexico` int(11) NOT NULL,
  `zona_oriente` int(11) NOT NULL,
  `fiscal_general` int(11) NOT NULL,
  `vicefiscalia` int(11) NOT NULL,
  `oficialia_mayor` int(11) NOT NULL,
  `informacion_estadistica` int(11) NOT NULL,
  `central_juridico` int(11) NOT NULL,
  `servicio_carrera` int(11) NOT NULL,
  `otra` varchar(250) NOT NULL,
  PRIMARY KEY (`id_destinatario`)
) ENGINE=InnoDB AUTO_INCREMENT=135 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `destinatario`
--

LOCK TABLES `destinatario` WRITE;
/*!40000 ALTER TABLE `destinatario` DISABLE KEYS */;
INSERT INTO `destinatario` VALUES (84,0,0,0,1,0,0,0,0,0,0,''),(85,0,0,0,1,0,0,0,0,0,0,''),(86,0,0,1,1,0,0,0,0,0,0,''),(87,0,1,0,0,0,0,0,0,0,0,''),(88,0,0,1,0,0,0,0,0,0,0,''),(89,0,0,1,1,0,0,0,0,0,0,''),(90,0,0,0,0,1,0,0,0,0,0,''),(91,0,0,1,0,0,0,0,0,0,0,''),(92,0,0,0,0,0,0,1,0,0,0,''),(93,1,0,0,0,0,0,0,0,0,0,''),(94,0,0,0,1,0,0,0,0,0,0,''),(95,0,1,1,0,0,0,0,0,0,0,''),(96,0,0,0,0,0,0,0,1,0,0,''),(97,0,0,0,1,0,0,0,0,0,0,''),(98,0,1,0,0,0,0,0,0,0,0,''),(99,0,0,0,0,0,1,0,0,0,0,''),(100,0,0,0,0,0,0,0,0,0,1,''),(101,0,0,0,1,0,0,0,0,0,0,''),(102,0,0,1,0,0,0,0,0,0,0,''),(103,0,0,1,0,0,0,0,0,0,0,''),(104,0,0,1,0,0,0,0,0,0,0,''),(105,0,0,1,0,0,0,0,0,0,0,''),(106,0,0,0,0,0,0,0,0,0,1,''),(107,0,0,0,0,0,0,0,0,0,1,''),(108,0,0,0,0,0,1,0,0,0,0,''),(109,0,1,0,1,0,0,0,0,0,0,''),(110,0,0,0,1,0,0,0,0,0,0,''),(111,0,0,1,0,0,0,0,0,0,0,''),(112,0,0,0,1,0,0,0,0,0,0,''),(113,0,0,0,1,0,0,0,0,0,0,''),(114,0,0,0,1,0,0,0,0,0,0,''),(115,0,0,0,0,0,0,0,1,0,0,''),(116,0,0,0,0,0,0,1,0,0,0,''),(117,1,0,0,0,0,0,0,0,0,0,''),(118,0,0,0,0,0,0,0,1,0,0,''),(119,0,0,1,0,0,0,0,0,0,0,''),(120,0,1,0,0,0,0,0,0,0,0,''),(121,0,1,0,0,0,0,0,0,0,0,''),(122,0,0,0,0,0,0,1,0,0,0,''),(123,0,0,1,0,0,0,0,0,0,0,''),(124,0,0,1,0,0,0,0,0,0,0,''),(125,0,0,0,0,0,1,0,0,0,0,''),(126,0,0,1,0,0,0,0,0,0,0,''),(127,0,1,1,1,0,0,0,0,0,0,''),(128,0,1,1,1,0,0,0,0,0,0,''),(129,1,1,1,0,0,0,0,0,0,0,''),(130,1,0,0,0,0,0,0,0,0,0,''),(131,0,1,1,0,0,0,0,0,0,0,''),(132,0,1,1,0,0,0,0,0,0,0,''),(133,0,1,1,1,0,0,0,0,0,0,''),(134,0,1,1,1,0,0,0,0,0,0,'');
/*!40000 ALTER TABLE `destinatario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `etiquetas_asunto`
--

DROP TABLE IF EXISTS `etiquetas_asunto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `etiquetas_asunto` (
  `id_etAsunto` int(11) NOT NULL AUTO_INCREMENT,
  `colaboracion` int(11) NOT NULL,
  `amparos` int(11) NOT NULL,
  `solicitudes` int(11) NOT NULL,
  `gestion` int(11) NOT NULL,
  `cursos_capacitaciones` int(11) NOT NULL,
  `juzgados` int(11) NOT NULL,
  `recursos_humanos` int(11) NOT NULL,
  `telefonia` int(11) NOT NULL,
  `estadistica` int(11) NOT NULL,
  `relaciones_interis` int(11) NOT NULL,
  `boletas_audiencia` int(11) NOT NULL,
  `copias_conocimiento` int(11) NOT NULL,
  PRIMARY KEY (`id_etAsunto`)
) ENGINE=InnoDB AUTO_INCREMENT=135 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etiquetas_asunto`
--

LOCK TABLES `etiquetas_asunto` WRITE;
/*!40000 ALTER TABLE `etiquetas_asunto` DISABLE KEYS */;
INSERT INTO `etiquetas_asunto` VALUES (84,1,0,0,0,0,0,0,0,0,0,0,0),(85,1,0,0,0,0,0,0,0,0,0,0,0),(86,1,0,0,0,0,0,0,0,0,0,0,0),(87,1,0,0,0,0,0,0,0,0,0,0,0),(88,0,1,0,0,0,0,0,0,0,0,0,0),(89,0,0,1,0,0,0,0,0,0,0,0,0),(90,0,0,1,1,0,0,0,0,0,0,0,0),(91,1,0,0,0,0,0,0,0,0,0,0,0),(92,0,0,0,0,0,0,0,1,0,0,0,0),(93,0,0,0,0,1,0,0,0,0,0,0,0),(94,0,0,0,0,0,1,0,0,0,0,0,0),(95,0,0,0,1,0,0,0,0,0,0,0,0),(96,0,0,0,0,0,1,0,0,0,0,0,0),(97,0,0,0,0,1,0,0,0,0,0,0,0),(98,0,0,0,0,0,0,1,0,0,0,0,0),(99,0,0,1,0,0,0,0,0,0,0,0,0),(100,0,0,0,0,1,0,0,0,0,0,0,0),(101,0,0,0,0,1,0,0,0,0,0,0,0),(102,0,0,0,0,1,0,0,0,0,0,0,0),(103,0,0,0,0,1,0,0,0,0,0,0,0),(104,0,0,0,0,1,0,0,0,0,0,0,0),(105,0,0,0,0,1,0,0,0,0,0,0,0),(106,0,0,0,0,0,1,0,0,0,0,0,0),(107,0,0,0,0,0,1,0,0,0,0,0,0),(108,0,0,0,0,1,0,0,0,0,0,0,0),(109,0,0,0,0,0,0,0,0,0,1,0,0),(110,1,0,0,0,0,0,0,0,0,0,0,0),(111,0,1,0,0,0,0,0,0,0,0,0,0),(112,1,0,0,0,0,0,0,0,0,0,0,0),(113,0,0,1,0,0,0,0,0,0,0,0,0),(114,1,0,0,0,0,0,0,0,0,0,0,0),(115,0,0,1,0,0,0,0,0,0,0,0,0),(116,0,0,0,1,0,0,0,0,0,0,0,1),(117,0,0,0,1,0,0,0,0,0,0,0,0),(118,0,1,0,0,0,0,0,0,0,0,0,0),(119,0,0,1,0,0,0,0,0,0,0,0,0),(120,0,1,0,0,0,0,0,0,0,0,0,0),(121,0,0,0,0,1,0,0,0,0,0,0,0),(122,0,0,0,0,0,1,0,0,0,0,0,0),(123,0,1,0,0,0,0,0,0,0,0,0,0),(124,1,0,0,0,0,0,0,0,0,0,0,0),(125,0,0,0,0,0,1,0,0,0,0,0,0),(126,0,0,1,0,0,0,0,0,0,0,0,0),(127,1,0,0,0,0,0,0,0,0,0,0,0),(128,1,0,0,0,0,0,0,0,0,0,0,0),(129,1,0,0,0,0,0,0,0,0,0,0,0),(130,1,1,0,0,0,0,0,0,0,0,0,0),(131,0,0,0,0,1,0,0,0,0,0,0,0),(132,0,0,0,0,1,0,0,0,0,0,0,0),(133,1,0,0,0,0,0,0,0,0,0,0,0),(134,1,0,0,0,0,0,0,0,0,0,0,0);
/*!40000 ALTER TABLE `etiquetas_asunto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `informar`
--

DROP TABLE IF EXISTS `informar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `informar` (
  `id_informar` int(11) NOT NULL AUTO_INCREMENT,
  `esta_oficina` int(11) NOT NULL,
  `peticionario` int(11) NOT NULL,
  `institucion_requiriente` int(11) NOT NULL,
  PRIMARY KEY (`id_informar`)
) ENGINE=InnoDB AUTO_INCREMENT=170 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `informar`
--

LOCK TABLES `informar` WRITE;
/*!40000 ALTER TABLE `informar` DISABLE KEYS */;
INSERT INTO `informar` VALUES (119,1,0,0),(120,1,0,0),(121,1,0,0),(122,0,1,0),(123,0,1,0),(124,1,0,0),(125,1,0,0),(126,1,1,0),(127,0,1,0),(128,1,0,0),(129,0,1,0),(130,1,1,0),(131,1,0,0),(132,0,1,0),(133,0,1,0),(134,0,1,0),(135,1,0,0),(136,0,1,0),(137,0,1,0),(138,0,1,0),(139,0,1,0),(140,0,1,0),(141,0,1,0),(142,0,1,0),(143,0,1,0),(144,0,1,0),(145,1,0,0),(146,1,1,0),(147,1,0,0),(148,1,0,0),(149,1,0,0),(150,0,1,0),(151,1,0,0),(152,0,1,0),(153,0,1,0),(154,0,1,0),(155,0,1,0),(156,0,1,0),(157,0,1,0),(158,0,1,0),(159,0,1,0),(160,1,0,0),(161,1,0,0),(162,1,0,0),(163,1,0,0),(164,1,0,0),(165,0,0,0),(166,0,1,0),(167,0,1,0),(168,0,1,0),(169,0,1,0);
/*!40000 ALTER TABLE `informar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oficio_atendido`
--

DROP TABLE IF EXISTS `oficio_atendido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oficio_atendido` (
  `id_oficioAtendido` int(11) NOT NULL AUTO_INCREMENT,
  `nomenclatura_aten` varchar(50) NOT NULL,
  `fecha_atendido` date NOT NULL,
  `nombre_aten` varchar(100) NOT NULL,
  `cargo_aten` longtext NOT NULL,
  `descripcion` longtext NOT NULL,
  `arch_atendido` varchar(100) NOT NULL,
  `copia_a` varchar(200) NOT NULL,
  `atencion` int(11) NOT NULL,
  PRIMARY KEY (`id_oficioAtendido`),
  UNIQUE KEY `oficio_atendido_nomenclatura_aten_IDX` (`nomenclatura_aten`) USING BTREE,
  KEY `oficio_atendido` (`atencion`),
  CONSTRAINT `oficio_atendido` FOREIGN KEY (`atencion`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oficio_atendido`
--

LOCK TABLES `oficio_atendido` WRITE;
/*!40000 ALTER TABLE `oficio_atendido` DISABLE KEYS */;
INSERT INTO `oficio_atendido` VALUES (10,'400LIA000/0006/2019','2019-07-18','MTRO. RAFAEL ESQUIVEL BLANCO','DIRECTOR','En petición ','400LIA000/0006/2019_2019_07_18','',6),(11,'400LI0010/0046/2019','2019-07-19','LIC. DILCYA SAMANTHA GARCIA ESPINOZA DE LOS MONTEROS.','DIRECTOR DEL ÁREA','En base al Oficio 400LI0010/0043/2019','400LI001000462019_2019_07_19.pdf','',6),(12,'400LIA000/0008/2019','2019-07-19','ANTONIO MARTIN TORRES BALLESTEROS.','DIRECTOR','Respecto al oficio 400LIA000/0007/2019','400LIA00000082019_2019_07_19.pdf','',6),(13,'400LI0010/0048/2019','2019-07-19','MTRO. RAFAEL ESQUIVEL BLANCO','SECRETARIO PARTICULAR','De acuerdo al asunto del número de oficio 400LI0010/0047/2019','400LI001000482019_2019_07_19.pdf','',6);
/*!40000 ALTER TABLE `oficio_atendido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oficio_entrada`
--

DROP TABLE IF EXISTS `oficio_entrada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oficio_entrada` (
  `id_oficioEntrada` int(11) NOT NULL AUTO_INCREMENT,
  `control` int(11) NOT NULL,
  `no_oficioEntrada` varchar(100) NOT NULL,
  `firma_origen` varchar(200) NOT NULL,
  `cargo` longtext NOT NULL,
  `peticion` varchar(250) NOT NULL,
  `arch_entrada` varchar(200) NOT NULL,
  `atencion` int(11) NOT NULL,
  `fecha_ent` datetime NOT NULL,
  `fecha_rec` datetime NOT NULL,
  `fecha_real` date NOT NULL,
  PRIMARY KEY (`id_oficioEntrada`),
  KEY `atencion` (`atencion`),
  CONSTRAINT `oficio_entrada_ibfk_1` FOREIGN KEY (`atencion`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oficio_entrada`
--

LOCK TABLES `oficio_entrada` WRITE;
/*!40000 ALTER TABLE `oficio_entrada` DISABLE KEYS */;
INSERT INTO `oficio_entrada` VALUES (82,1,'MJ03454/2018','MTRA. ADRIANA CABRERA SANTANA.','SECRETARIA TECNICA DEL C. FISCAL GENERAL.','JUEZ LIC. IGNACIO GUZMAN COLIN REMITE OFICIO 10050, C. A. 1843/2014, SOLICITANDO INFORME EL NUMERO DE CARPETA DE INVESTIGACION CON QUE SE RADICO EL ESTADO QUE GUARDA Y NOMBRE DEL FISCAL ENCARGADO DE LA INVESTIGACION Y DOMICILIO DONDE SE LOCALICE.\r\n','MJ0345420181.pdf',1,'2018-09-21 17:53:00','2018-09-24 13:43:00','2018-08-31'),(83,2,'CIRCULAR INTERNA 15','MTRA. ADRIANA CABRERA SANTANA','SECRETARIO PARTICULAR ','POR EL MEDIO DE ESTE OFICIO LE PIDO CORDIALMENTE LA BÚSQUEDA DE ANTONIO MANJARREZ ','CIRCULAR_INTERNA_15.pdf',1,'2018-09-25 09:27:00','2018-09-26 11:39:00','2018-09-26'),(84,3,'400LK2100-1395/2018','LIC. JULIO GUILLERMO ORTIZ BERNAL.','SECRETARIO PARTICULAR ','EN COLABORACIÓN DE LA BÚSQUEDA DE LA PERSONA VICENTE CONTRERAS','400LK2100-13952018.pdf',1,'2018-09-25 12:34:00','2018-09-25 00:00:00','2019-01-16'),(85,4,'10772/2018','DR. GUILLERMO E. GONZALEZ MEDINA.','SECRETARIO PARTICULAR','BÚSQUEDA DE PERSONA EN EL SAN MATEO OXTA','107722018.pdf',1,'2018-09-27 09:30:00','2018-09-27 13:41:00','2018-09-25'),(86,5,'CIRCULAR INTERNA 657','LIC. JULIO GUILLERMO ORTIZ BERNAL.','SECRETARIO PARTICULAR','PRUEBA PARA LA INSERCIÓN DEL  OFICIO SEGUIMIENTO','CIRCULAR_INTERNA_657.pdf',1,'2019-01-15 05:36:00','2019-01-16 12:42:00','2019-01-09'),(87,6,'400L11A00/2579/2018','MTRO. RAFAEL ESQUIVEL BLANCO. ','DIRECTOR GENERAL DE ENLACE INTERINSTITUCIONAL.\r\n','COLABORACION DE BUSQUEDA DE DIVERSAS PERSONAS EN LOS OFICIOS 45807 CAUSA PENAL 10/2012; Y UEIDFF-V-465/2018 C. I. FED/SEIDF/UNAI-MEX/0000814/2017\r\n','400L11A0025792018.pdf',1,'2018-09-24 13:55:00','2018-09-14 14:54:00','2018-09-14'),(88,7,'2877419/2018','MTRO. RAFAEL ESQUIVEL BLANCO.','SECRETARIO PARTICULAR','DE ACUERDO AL OFICIO SE SOLICITA','28774192018.pdf',1,'2019-04-04 10:25:00','2019-04-04 11:40:00','2019-04-02'),(89,8,'78548','ING JUAN ROBERTO RAMIREZ SOTO','DIRECTOR DE TECNOLOGIAS','EN QUE SE INDICA','78548',6,'2019-07-01 12:19:00','2019-07-01 12:19:00','2019-07-01'),(90,9,'28714/2019','FERNANDA GOMEZ','SECRETARIO PARTICULAR','EL QUE SE INDICA','287142019.pdf',6,'2019-07-01 13:30:00','2019-07-01 13:30:00','2019-07-01'),(91,10,'28774/2019','FERNANDA GOMEZ','SECRETARIA PARTICULAR ','A PETICIÓN ','287742019.pdf',6,'2019-07-01 14:38:00','2019-07-01 14:38:00','2019-07-01'),(92,11,'4000LKA002/234/2O9','GERMÁN JEAN LEÓN','SECRETARIO DEL JUZGADO DEL DÉCIMO','EJECUTORIA DE HUGO LEONARDO ','4000LKA002/234/2O9',6,'2019-07-02 15:51:00','2019-07-02 15:51:00','2019-06-19'),(93,12,'1249/2019','MTRA. ADRIANA CABRERA SANTANA','SECRETARIO PARTICULAR','EN PETICIÓN','12492019.pdf',6,'2019-07-17 14:58:00','2019-07-18 14:58:00','2019-07-17'),(94,13,'16232/2019','MTRA. ADRIANA CABRERA SANTANA','DIRECTOR ','DIRIGIDO AL COORDINADOR GENERAL ','162322019.pdf',6,'2019-07-19 09:51:00','2019-07-19 13:51:00','2019-07-18'),(96,14,'12632/2019','MTRA. ADRIANA CABRERA SANTANA','SECRETARIO PARTICULAR','DIRIGIDO AL SECRETARIO PARTICULAR','126322019.pdf',6,'2019-07-19 10:02:00','2019-07-19 14:02:00','2019-07-19'),(97,15,'0006ASD','LIC. JULIO GUILLERMO ORTIZ BERNAL.','SECASD','ASDA','0006ASD.pdf',6,'2019-10-08 13:11:00','2019-10-08 13:11:00','2019-10-08'),(98,16,'12345','SSSSSSSSSSSSSSS','eeeeeeeeee','EEEEEEEEEEEEEEEEEEEEEE','12345.pdf',6,'2019-10-08 00:00:00','2019-10-08 00:00:00','2019-10-08'),(99,17,'84542/2019','FERNANDA GOMEZ','DASD','ASDASD','845422019.pdf',6,'2019-10-09 10:14:00','2019-10-09 10:14:00','2019-10-09'),(100,18,'4454545','Ssssssssss','ssssssssssssssss','SSSSSSSSSSS','4454545.pdf',6,'2019-10-10 08:23:00','2019-10-10 08:23:00','2019-10-10');
/*!40000 ALTER TABLE `oficio_entrada` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oficio_seguimiento`
--

DROP TABLE IF EXISTS `oficio_seguimiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oficio_seguimiento` (
  `id_oficioseg` int(11) NOT NULL AUTO_INCREMENT,
  `nomenclatura` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `id_etAsunto` int(11) NOT NULL,
  `termino` datetime NOT NULL,
  `id_destinatario` int(11) NOT NULL,
  `observaciones` longtext NOT NULL,
  `atencion` int(11) NOT NULL,
  `id_ruta` int(11) NOT NULL,
  `id_informar` int(11) NOT NULL,
  `asunto` longtext NOT NULL,
  `id_oficioEntrada` int(11) NOT NULL,
  PRIMARY KEY (`id_oficioseg`),
  UNIQUE KEY `oficio_seguimiento_nomenclatura_IDX` (`nomenclatura`) USING BTREE,
  KEY `oficio_seguimiento_ibfk_1` (`atencion`),
  KEY `oficio_seguimiento_ibfk_2` (`id_etAsunto`),
  KEY `oficio_seguimiento_ibfk_3` (`id_destinatario`),
  KEY `oficio_seguimiento_ibfk_4` (`id_ruta`),
  KEY `oficio_seguimiento_ibfk_5` (`id_informar`),
  KEY `oficio_seguimiento_ibfk_7` (`id_oficioEntrada`),
  CONSTRAINT `oficio_seguimiento_ibfk_1` FOREIGN KEY (`atencion`) REFERENCES `usuario` (`id_usuario`),
  CONSTRAINT `oficio_seguimiento_ibfk_2` FOREIGN KEY (`id_etAsunto`) REFERENCES `etiquetas_asunto` (`id_etAsunto`),
  CONSTRAINT `oficio_seguimiento_ibfk_3` FOREIGN KEY (`id_destinatario`) REFERENCES `destinatario` (`id_destinatario`),
  CONSTRAINT `oficio_seguimiento_ibfk_4` FOREIGN KEY (`id_ruta`) REFERENCES `ruta_oficio` (`id_ruta`),
  CONSTRAINT `oficio_seguimiento_ibfk_5` FOREIGN KEY (`id_informar`) REFERENCES `informar` (`id_informar`),
  CONSTRAINT `oficio_seguimiento_ibfk_7` FOREIGN KEY (`id_oficioEntrada`) REFERENCES `oficio_entrada` (`id_oficioEntrada`)
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oficio_seguimiento`
--

LOCK TABLES `oficio_seguimiento` WRITE;
/*!40000 ALTER TABLE `oficio_seguimiento` DISABLE KEYS */;
INSERT INTO `oficio_seguimiento` VALUES (105,'400LIA000/0001/2019','2019-02-04',121,'2019-02-05 16:42:00',121,'SE INFORMA Y SE INVITA A PARTICIPAR EN EL CURSO DE CAPACITACION \r\n',1,123,156,'SE INFORMA Y SE INVITA A PARTICIPAR EN EL CURSO DE CAPACITACION CON LA TEMATICA REGLAS MINIMAS DE LAS NACIONES UNIDAS SOBRE LAS MEDIDAS NO PRIVATIVAS DE LA LIBERTAD \"REGLAS DE TOKIO\" Y REGLAS MINIMAS DE LAS NACIONES UNIDAS PARA EL TRATAMEINTO DE LOS RECLUSOS \"REGLAS NELSON MANDELA\"\r\n',86),(106,'400LI0010/0041/2019','2019-02-04',122,'2019-02-06 17:47:00',122,'SE INFORMA Y SE INVITA A PARTICIPAR EN EL CURSO DE CAPACITACION CON LA TEMATICA REGLAS MINIMAS DE LAS NACIONES UNIDAS SOBRE LAS MEDIDAS NO PRIVATIVAS DE LA LIBERTAD \"REGLAS DE TOKIO\" Y REGLAS MINIMAS DE LAS NACIONES UNIDAS PARA EL TRATAMEINTO DE LOS RECLUSOS \"REGLAS NELSON MANDELA\"\r\n',1,124,157,'SE INFORMA Y SE INVITA A PARTICIPAR EN EL CURSO DE CAPACITACION CON LA TEMATICA REGLAS MINIMAS DE LAS NACIONES UNIDAS SOBRE LAS MEDIDAS NO PRIVATIVAS DE LA LIBERTAD \"REGLAS DE TOKIO\" Y REGLAS MINIMAS DE LAS NACIONES UNIDAS PARA EL TRATAMEINTO DE LOS RECLUSOS \"REGLAS NELSON MANDELA\"\r\n',82),(108,'400LIA000/0003/2019','2019-02-05',124,'2019-02-06 14:43:00',124,'REGLAS MINIMAS DE LAS NACIONES UNIDAS PARA EL TRATAMEINTO DE LOS RECLUSOS\r\n',1,126,159,'SE INFORMA Y SE INVITA A PARTICIPAR EN EL CURSO DE CAPACITACION CON LA TEMATICA REGLAS MINIMAS DE LAS NACIONES UNIDAS SOBRE LAS MEDIDAS NO PRIVATIVAS DE LA LIBERTAD \"REGLAS DE TOKIO\" Y REGLAS MINIMAS DE LAS NACIONES UNIDAS PARA EL TRATAMEINTO DE LOS RECLUSOS \"REGLAS NELSON MANDELA\"\r\n',85),(110,'400LIA000/0004/2019','2018-09-26',126,'2018-09-28 14:43:00',126,'SE ESPERA RESPUESTA EN 24 HORAS',4,128,161,'EL OFICIO MJO03454/2018 FUE EMITIDO DIRECTAMENTE A LA FISCALÍA DE SECUESTROS DE ZONA ORIENTE POR LO QUE SE DA CONTESTACIÓN DIRECTA AL JUEZ DE CONTROL DE TIEMPO Y FORMA.',84),(112,'400LI0010/0042/2019','2018-09-26',128,'2018-09-27 13:40:00',128,'OFICIOS 45807 CAUSA PENAL 10/2012; Y UEIDFF-V-465/2018 C. I. FED/SEIDF/UNAI-MEX/0000814/2017\r\n',1,130,163,'EN RESPUESTA A LA COLABORACION DE BUSQUEDA DE DIVERSAS PERSONAS EN LOS OFICIOS 45807 CAUSA PENAL 10/2012; Y UEIDFF-V-465/2018 C. I. FED/SEIDF/UNAI-MEX/0000814/2017\r\n',87),(113,'400LIA000/0005/2019','2019-07-01',129,'2019-07-01 12:23:00',129,'SE ESPERA RESPUESTA ',6,131,164,'DA RESPUESTA',89),(114,'400LI0010/0043/2019','2019-07-01',130,'2019-07-02 07:17:00',130,'ESPERA RESPUESTA',6,132,165,'EN RESPUESTA AL OFICIO ',90),(115,'400LI0010/0044/2019','2019-07-18',131,'2019-07-19 14:59:00',131,'ADAD',6,133,166,'DA RESPUESTA Y SE REMITE ',93),(117,'400LIA000/0007/2019','2019-07-19',133,'2019-07-23 14:15:00',133,'SE ESPERA RESPUESTA',6,135,168,'EN PETICIÓN DE LA COLABORACIÓN ',94),(118,'400LI0010/0047/2019','2019-07-19',134,'2019-07-22 14:22:00',134,'EN ESPERA DE RESPUESTA',6,136,169,'COLABORACIÓN ',96);
/*!40000 ALTER TABLE `oficio_seguimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `re_seg_aten`
--

DROP TABLE IF EXISTS `re_seg_aten`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `re_seg_aten` (
  `id_rel` int(11) NOT NULL AUTO_INCREMENT,
  `id_seg` int(11) NOT NULL,
  `id_aten` int(11) NOT NULL,
  PRIMARY KEY (`id_rel`),
  KEY `id_seg` (`id_seg`),
  KEY `id_aten` (`id_aten`),
  CONSTRAINT `re_seg_aten_ibfk_1` FOREIGN KEY (`id_seg`) REFERENCES `oficio_seguimiento` (`id_oficioseg`),
  CONSTRAINT `re_seg_aten_ibfk_2` FOREIGN KEY (`id_aten`) REFERENCES `oficio_atendido` (`id_oficioAtendido`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;


/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `re_captura` (
  `id_rec` int(11) NOT NULL AUTO_INCREMENT,
  `id_sec` int(11) NOT NULL,
  `id_atc` int(11) NOT NULL,
  PRIMARY KEY (`id_rel`),
  KEY `id_sec` (`id_sec`),
  KEY `id_atc` (`id_atc`),
  FOREIGN KEY (`id_sec`) REFERENCES `captura` (`id_ofseg`),
  FOREIGN KEY (`id_atc`) REFERENCES `captura_entrada` (`id_cEntrada`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Dumping data for table `re_seg_aten`
--

LOCK TABLES `re_seg_aten` WRITE;
/*!40000 ALTER TABLE `re_seg_aten` DISABLE KEYS */;
INSERT INTO `re_seg_aten` VALUES (1,114,11),(2,117,12),(3,118,13);
/*!40000 ALTER TABLE `re_seg_aten` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ruta_oficio`
--

DROP TABLE IF EXISTS `ruta_oficio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ruta_oficio` (
  `id_ruta` int(11) NOT NULL AUTO_INCREMENT,
  `realiza_diligencias` int(11) NOT NULL,
  `recibir_personalmente` int(11) NOT NULL,
  `gestionar_peticion` int(11) NOT NULL,
  `archivo` int(11) NOT NULL,
  `otras` varchar(250) NOT NULL,
  PRIMARY KEY (`id_ruta`)
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ruta_oficio`
--

LOCK TABLES `ruta_oficio` WRITE;
/*!40000 ALTER TABLE `ruta_oficio` DISABLE KEYS */;
INSERT INTO `ruta_oficio` VALUES (86,0,1,0,0,''),(87,1,0,0,0,''),(88,0,0,1,0,''),(89,0,1,0,0,''),(90,0,1,0,0,''),(91,1,0,0,0,''),(92,0,1,1,0,''),(93,0,0,1,0,''),(94,0,0,1,0,''),(95,1,0,0,0,''),(96,0,0,1,0,''),(97,0,1,0,0,''),(98,0,1,0,0,''),(99,1,0,0,0,''),(100,1,0,0,0,''),(101,1,0,0,0,''),(102,0,0,1,0,''),(103,0,1,0,0,''),(104,0,0,1,0,''),(105,0,0,1,0,''),(106,0,0,1,0,''),(107,0,0,1,0,''),(108,0,1,0,0,''),(109,0,1,0,0,''),(110,0,0,1,0,''),(111,0,1,0,0,''),(112,1,0,0,0,''),(113,1,0,0,0,''),(114,1,0,0,0,''),(115,1,0,0,0,''),(116,0,1,0,0,''),(117,0,0,1,0,''),(118,0,0,1,0,''),(119,0,0,1,0,''),(120,0,0,1,0,''),(121,0,1,0,0,''),(122,0,0,1,0,''),(123,0,1,0,0,''),(124,0,0,1,0,''),(125,1,0,0,0,''),(126,0,1,0,0,''),(127,0,1,0,0,''),(128,0,1,0,0,''),(129,0,1,0,0,''),(130,1,0,0,0,''),(131,0,1,0,0,''),(132,0,0,0,0,''),(133,0,0,1,0,''),(134,0,0,1,0,''),(135,0,0,1,0,''),(136,1,0,0,0,'');
/*!40000 ALTER TABLE `ruta_oficio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipousuario`
--

DROP TABLE IF EXISTS `tipousuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipousuario` (
  `id_tipoUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `tipoUsuario` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tipoUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipousuario`
--

LOCK TABLES `tipousuario` WRITE;
/*!40000 ALTER TABLE `tipousuario` DISABLE KEYS */;
INSERT INTO `tipousuario` VALUES (1,'ADMINISTRADOR'),(2,'COORDINADOR GENERAL'),(3,'SECRETARIADO'),(4,'CAPTURA'),(5,'SEGUIMIENTO');
/*!40000 ALTER TABLE `tipousuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellidop` varchar(50) NOT NULL,
  `apellidom` varchar(50) NOT NULL,
  `activo` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_tipoUsuario` int(11) NOT NULL,
  `id_dependencias` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_tipoUsuario` (`id_tipoUsuario`),
  KEY `id_dependencias` (`id_dependencias`),
  CONSTRAINT `usuario` FOREIGN KEY (`id_dependencias`) REFERENCES `dependencias` (`id_dependencias`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_tipoUsuario`) REFERENCES `tipousuario` (`id_tipoUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'ADMINISTRADOR','ADMIN','ADMIN',1,'mmendezg@fiscaliaedomex.gob.mx','c3VwZXJ1c3Vhcmlv',1,1),(2,'lprueba','coordinador','pruebacoord',1,'lprueba@gmail.com','Y29vcmRpbmFkb3I=',2,1),(3,'Secretaria','psecretariado','psecretariado',1,'secretariado@gmail.com','c2VjcmV0YXJpYWRv',3,1),(4,'RODRIGO','ARCHUNDIA','BARRIENTOS',1,'rarchundia@fiscaliaedomex.gob.mx','cmFyY2h1bmRpYQ==',2,1),(6,'ABRAHAM','ESTEBAN','ACOSTA',1,'aestebana@fiscaliaedomex.gob.mx','YWVzdGViYW5h',2,1),(7,'PCaptura','P','Captura',1,'captura@fiscaliaedomex.gob.mx','Y2FwdHVyYTE=',4,1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'sigodb'
--
/*!50003 DROP FUNCTION IF EXISTS `insertAtenSeg` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'IGNORE_SPACE,STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`%` FUNCTION `insertAtenSeg`(nomenclatura VARCHAR(50), fecha1 DATE, nombre VARCHAR(100), cargo LONGTEXT, descripcion LONGTEXT, archivo VARCHAR(100), copia VARCHAR(200), atencion INT, ids INT) RETURNS int(11)
BEGIN
DECLARE ida int;
	INSERT INTO oficio_atendido (nomenclatura_aten, fecha_atendido, nombre_aten, cargo_aten, descripcion, arch_atendido, copia_a, atencion) VALUES (nomenclatura, fecha1, nombre, cargo, descripcion, archivo, copia, atencion);
    SELECT LAST_INSERT_ID() INTO ida;
    INSERT INTO re_seg_aten (id_seg, id_aten) VALUES (ids, ida);
RETURN ida;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `INSERTCAPTURA` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `INSERTCAPTURA`(`oficio_rec` VARCHAR(100), `firma_origen_rec` VARCHAR(200), `cargo_rec` LONGTEXT, `peticion_rec` LONGTEXT, `entrada` LONGTEXT, `fecha_r` DATETIME, `fecha_rec` DATETIME, `fecha_recr` DATE, `oficina` INT, `peticionario` INT, `requiriente` INT, `colaboracion` INT, `amparo` INT, `solicitudes` INT, `gestion` INT, `cursos` INT, `juzgados` INT, `rh` INT, `telefonia` INT, `estadistica` INT, `ri` INT, `boletas` INT, `conocimiento` INT, `conase` INT, `toluca` INT, `mexico` INT, `zoriente` INT, `fgeneral` INT, `vicefiscalia` INT, `oficialia` INT, `informacion` INT, `central` INT, `servicio` INT, `otrad` LONGTEXT, `diligencia` INT, `personalmente` INT, `gestionar` INT, `archivo` INT, `otrar` LONGTEXT, `nomenclatura` VARCHAR(100), `fecha` DATE, `termino` DATETIME, `observaciones` LONGTEXT, `atencion` INT, `asunto` LONGTEXT, `fecha_aten` DATE, `nombre_aten` VARCHAR(100), `cargo_aten` VARCHAR(100), `descripcion_aten` LONGTEXT, `archivo_aten` VARCHAR(100), `copia_aten` LONGTEXT) RETURNS int(11)
BEGIN
DECLARE IDENT, IDI, IDE, IDD, IDR, IDO, IDA INT;
	INSERT INTO oficio_entrada(no_oficioEntrada, firma_origen, cargo, peticion, arch_entrada, atencion, fecha_ent, fecha_rec, fecha_real) VALUES (oficio_rec, firma_origen_rec, cargo_rec, peticion_rec, entrada, atencion, fecha_r, fecha_rec, fecha_recr);               
	SELECT LAST_INSERT_ID() INTO IDENT; 
	INSERT INTO informar (esta_oficina, peticionario, institucion_requiriente) VALUES (oficina, peticionario, requiriente);
    	SELECT LAST_INSERT_ID() INTO IDI;
    INSERT INTO etiquetas_asunto (colaboracion, amparos, solicitudes, gestion, cursos_capacitaciones, juzgados, recursos_humanos, telefonia, estadistica, relaciones_interis, boletas_audiencia, copias_conocimiento) VALUES (colaboracion, amparo, solicitudes, gestion, cursos, juzgados, rh, telefonia, estadistica, ri, boletas, conocimiento);            
    	SELECT LAST_INSERT_ID() INTO IDE;
    INSERT INTO destinatario (conase, valle_toluca, valle_mexico, zona_oriente, fiscal_general, vicefiscalia, oficialia_mayor, informacion_estadistica, central_juridico, servicio_carrera, otra) VALUES (conase, toluca, mexico, zoriente, fgeneral, vicefiscalia, oficialia, informacion, central, servicio, otrad);
    	SELECT LAST_INSERT_ID() INTO IDD;
	INSERT INTO ruta_oficio (realiza_diligencias, recibir_personalmente, gestionar_peticion, archivo, otras) VALUES (diligencia, personalmente, gestionar, archivo, otrar);
        SELECT LAST_INSERT_ID() INTO IDR;
    INSERT INTO captura (nomen_ofseg, fecha_ofseg, id_etA_ofseg, termino_ofseg, id_dest_ofseg, obs_ofseg, aten_ofseg, id_ruta_ofseg, id_inf_ofseg, asunto_ofseg, id_oficioEntrada_ofseg) VALUES (nomenclatura, fecha, IDE, termino, IDD, observaciones, atencion, IDR, IDI, asunto, IDENT);
        SELECT LAST_INSERT_ID() INTO IDO; 
	INSERT INTO captura_atendido (fecha_atenCap, nombre_atenCap, cargo_atenCap, descCap, arch_atenCap, copia_aCap, id_ofseg, atencionCap) VALUES (fecha_aten, nombre_aten, cargo_aten, descripcion_aten, archivo_aten, copia_aten, IDO, atencion);
    	SELECT LAST_INSERT_ID() INTO IDA;
RETURN IDO;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `INSERTOFICIO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `INSERTOFICIO`(`oficina` INT, `peticionario` INT, `requiriente` INT, `colaboracion` INT, `amparo` INT, `solicitudes` INT, `gestion` INT, `cursos` INT, `juzgados` INT, `rh` INT, `telefonia` INT, `estadistica` INT, `ri` INT, `boletas` INT, `conocimiento` INT, `conase` INT, `toluca` INT, `mexico` INT, `zoriente` INT, `fgeneral` INT, `vicefiscalia` INT, `oficialia` INT, `informacion` INT, `central` INT, `servicio` INT, `otrad` LONGTEXT, `diligencia` INT, `personalmente` INT, `gestionar` INT, `archivo` INT, `otrar` LONGTEXT, `nomenclatura` VARCHAR(100), `fecha` DATE, `termino` DATETIME, `observaciones` LONGTEXT, `atencion` INT, `asunto` LONGTEXT, `id_entrada` INT) RETURNS int(11)
BEGIN
DECLARE IDI, IDE, IDD, IDR, IDO INT;
	INSERT INTO informar (esta_oficina, peticionario, institucion_requiriente) VALUES (oficina, peticionario, requiriente);
    	SELECT LAST_INSERT_ID() INTO IDI;
    INSERT INTO etiquetas_asunto (colaboracion, amparos, solicitudes, gestion, cursos_capacitaciones, juzgados, recursos_humanos, telefonia, estadistica, relaciones_interis, boletas_audiencia, copias_conocimiento) VALUES (colaboracion, amparo, solicitudes, gestion, cursos, juzgados, rh, telefonia, estadistica, ri, boletas, conocimiento);            
    	SELECT LAST_INSERT_ID() INTO IDE;
    INSERT INTO destinatario (conase, valle_toluca, valle_mexico, zona_oriente, fiscal_general, vicefiscalia, oficialia_mayor, informacion_estadistica, central_juridico, servicio_carrera, otra) VALUES (conase, toluca, mexico, zoriente, fgeneral, vicefiscalia, oficialia, informacion, central, servicio, otrad);
    	SELECT LAST_INSERT_ID() INTO IDD;
	INSERT INTO ruta_oficio (realiza_diligencias, recibir_personalmente, gestionar_peticion, archivo, otras) VALUES (diligencia, personalmente, gestionar, archivo, otrar);
        SELECT LAST_INSERT_ID() INTO IDR;
    INSERT INTO oficio_seguimiento (nomenclatura, fecha, id_etAsunto, termino, id_destinatario, observaciones, atencion, id_ruta, id_informar, asunto, id_oficioEntrada) VALUES (nomenclatura, fecha, IDE, termino, IDD, observaciones, atencion, IDR, IDI, asunto, id_entrada);
        SELECT LAST_INSERT_ID() INTO IDO;    

RETURN 1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-05 10:01:16
