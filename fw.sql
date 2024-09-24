-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: fw
-- ------------------------------------------------------
-- Server version	8.0.34

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
-- Table structure for table `tb_carrito`
--

DROP TABLE IF EXISTS `tb_carrito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_carrito` (
  `id_ca` int NOT NULL AUTO_INCREMENT,
  `nombre_producto` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cantidad_pro` int NOT NULL,
  `precio_pro` float NOT NULL,
  `fecha_agre` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `documento_usuario` int NOT NULL,
  `id_producto` int NOT NULL,
  PRIMARY KEY (`id_ca`),
  KEY `documento_usuario` (`documento_usuario`),
  KEY `id_producto` (`id_producto`),
  CONSTRAINT `tb_carrito_ibfk_1` FOREIGN KEY (`documento_usuario`) REFERENCES `tb_usuarios` (`documento`) ON DELETE CASCADE,
  CONSTRAINT `tb_carrito_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `tb_productos` (`id_producto`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_carrito`
--

LOCK TABLES `tb_carrito` WRITE;
/*!40000 ALTER TABLE `tb_carrito` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_carrito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_categoria`
--

DROP TABLE IF EXISTS `tb_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_categoria` (
  `id_categoria` int NOT NULL,
  `categoria` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_categoria`
--

LOCK TABLES `tb_categoria` WRITE;
/*!40000 ALTER TABLE `tb_categoria` DISABLE KEYS */;
INSERT INTO `tb_categoria` VALUES (1,'ropa de gato'),(7,'ropa para gato');
/*!40000 ALTER TABLE `tb_categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_conteo_pro_actu`
--

DROP TABLE IF EXISTS `tb_conteo_pro_actu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_conteo_pro_actu` (
  `id_conteo` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) DEFAULT NULL,
  `conteo` int NOT NULL,
  `fec_reg` datetime NOT NULL,
  PRIMARY KEY (`id_conteo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_conteo_pro_actu`
--

LOCK TABLES `tb_conteo_pro_actu` WRITE;
/*!40000 ALTER TABLE `tb_conteo_pro_actu` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_conteo_pro_actu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_conteo_pro_eli`
--

DROP TABLE IF EXISTS `tb_conteo_pro_eli`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_conteo_pro_eli` (
  `id_conteo` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) DEFAULT NULL,
  `conteo` int NOT NULL,
  `fec_eli` datetime NOT NULL,
  PRIMARY KEY (`id_conteo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_conteo_pro_eli`
--

LOCK TABLES `tb_conteo_pro_eli` WRITE;
/*!40000 ALTER TABLE `tb_conteo_pro_eli` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_conteo_pro_eli` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_conteo_pro_reg`
--

DROP TABLE IF EXISTS `tb_conteo_pro_reg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_conteo_pro_reg` (
  `id_conteo` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) DEFAULT NULL,
  `conteo` int NOT NULL,
  `fec_reg` datetime NOT NULL,
  PRIMARY KEY (`id_conteo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_conteo_pro_reg`
--

LOCK TABLES `tb_conteo_pro_reg` WRITE;
/*!40000 ALTER TABLE `tb_conteo_pro_reg` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_conteo_pro_reg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_conteo_user_actu`
--

DROP TABLE IF EXISTS `tb_conteo_user_actu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_conteo_user_actu` (
  `id_conteo` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) DEFAULT NULL,
  `conteo` int NOT NULL,
  `fec_reg` datetime NOT NULL,
  PRIMARY KEY (`id_conteo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_conteo_user_actu`
--

LOCK TABLES `tb_conteo_user_actu` WRITE;
/*!40000 ALTER TABLE `tb_conteo_user_actu` DISABLE KEYS */;
INSERT INTO `tb_conteo_user_actu` VALUES (1,'Se ha actualizado el usuario: claudia jobaira con el ID: 911',1,'2024-09-23 14:21:28'),(2,'Se ha actualizado el usuario: clau con el ID: 912',1,'2024-09-23 15:28:23'),(3,'Se ha actualizado el usuario: clau con el ID: 912',1,'2024-09-23 15:29:59'),(4,'Se ha actualizado el usuario: clau con el ID: 912',1,'2024-09-23 15:30:25'),(5,'Se ha actualizado el usuario: clau con el ID: 912',1,'2024-09-23 15:35:20'),(6,'Se ha actualizado el usuario: clau con el ID: 912',1,'2024-09-23 15:35:53'),(7,'Se ha actualizado el usuario: claudia jobaira con el ID: 911',1,'2024-09-23 17:53:09');
/*!40000 ALTER TABLE `tb_conteo_user_actu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_conteo_user_eli`
--

DROP TABLE IF EXISTS `tb_conteo_user_eli`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_conteo_user_eli` (
  `id_conteo` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) DEFAULT NULL,
  `conteo` int NOT NULL,
  `fec_eli` datetime NOT NULL,
  PRIMARY KEY (`id_conteo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_conteo_user_eli`
--

LOCK TABLES `tb_conteo_user_eli` WRITE;
/*!40000 ALTER TABLE `tb_conteo_user_eli` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_conteo_user_eli` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_conteo_user_reg`
--

DROP TABLE IF EXISTS `tb_conteo_user_reg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_conteo_user_reg` (
  `id_conteo` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) DEFAULT NULL,
  `conteo` int NOT NULL,
  `fec_reg` datetime NOT NULL,
  PRIMARY KEY (`id_conteo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_conteo_user_reg`
--

LOCK TABLES `tb_conteo_user_reg` WRITE;
/*!40000 ALTER TABLE `tb_conteo_user_reg` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_conteo_user_reg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_detalle_factura`
--

DROP TABLE IF EXISTS `tb_detalle_factura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_detalle_factura` (
  `id_detalle` int NOT NULL AUTO_INCREMENT,
  `id_factura` int NOT NULL,
  `id_producto` int NOT NULL,
  `cantidad` int NOT NULL,
  `precio_unitario` float NOT NULL,
  `subtotal` float NOT NULL,
  PRIMARY KEY (`id_detalle`),
  KEY `id_factura` (`id_factura`),
  KEY `id_producto` (`id_producto`),
  CONSTRAINT `tb_detalle_factura_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `tb_productos` (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_detalle_factura`
--

LOCK TABLES `tb_detalle_factura` WRITE;
/*!40000 ALTER TABLE `tb_detalle_factura` DISABLE KEYS */;
INSERT INTO `tb_detalle_factura` VALUES (8,18,43,5,444,2220),(9,19,43,5,444,2220),(10,20,43,5,444,2220),(11,21,43,5,444,2220),(12,22,43,5,444,2220),(13,1,43,2,444,888),(14,1,18,2,5,10);
/*!40000 ALTER TABLE `tb_detalle_factura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_facturas`
--

DROP TABLE IF EXISTS `tb_facturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_facturas` (
  `id_factura` int NOT NULL AUTO_INCREMENT,
  `documento_usuario` int NOT NULL,
  `metodo_pago` varchar(50) NOT NULL,
  `fecha_factura` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `direccion` varchar(255) DEFAULT NULL,
  `numero_tarjeta` varchar(16) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `total` float NOT NULL,
  PRIMARY KEY (`id_factura`),
  KEY `documento_usuario` (`documento_usuario`),
  CONSTRAINT `tb_facturas_ibfk_1` FOREIGN KEY (`documento_usuario`) REFERENCES `tb_usuarios` (`documento`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_facturas`
--

LOCK TABLES `tb_facturas` WRITE;
/*!40000 ALTER TABLE `tb_facturas` DISABLE KEYS */;
INSERT INTO `tb_facturas` VALUES (1,911,'efectivo','2024-09-24 01:07:22','barrio villa andrea','7777478','3132254763',898);
/*!40000 ALTER TABLE `tb_facturas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_favoritos`
--

DROP TABLE IF EXISTS `tb_favoritos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_favoritos` (
  `id_favo` int NOT NULL AUTO_INCREMENT,
  `nombre_produc` varchar(50) NOT NULL,
  `cantidad_fav` int NOT NULL,
  `fecga_agreg` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_favo`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_favoritos`
--

LOCK TABLES `tb_favoritos` WRITE;
/*!40000 ALTER TABLE `tb_favoritos` DISABLE KEYS */;
INSERT INTO `tb_favoritos` VALUES (15,'enjvc',1,'2024-09-23 05:06:16'),(16,'pan',1,'2024-09-23 23:29:19');
/*!40000 ALTER TABLE `tb_favoritos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_fecha_especial`
--

DROP TABLE IF EXISTS `tb_fecha_especial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_fecha_especial` (
  `id` int NOT NULL AUTO_INCREMENT,
  `evento` varchar(255) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `color_evento` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_fecha_especial`
--

LOCK TABLES `tb_fecha_especial` WRITE;
/*!40000 ALTER TABLE `tb_fecha_especial` DISABLE KEYS */;
INSERT INTO `tb_fecha_especial` VALUES (11,'iglesia','2024-03-02','2039-03-23','#33fffc'),(12,'dia de playa','2023-04-03','2024-04-03','#eebe59'),(14,'invierno','2025-03-02','2027-04-03','#2414ff'),(16,'primavera','2024-03-04','2024-04-19','#13e7a7');
/*!40000 ALTER TABLE `tb_fecha_especial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_likes`
--

DROP TABLE IF EXISTS `tb_likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_likes` (
  `id_like` int NOT NULL AUTO_INCREMENT,
  `producto_id` int NOT NULL,
  `usuario_id` int NOT NULL,
  `valor` varchar(20) NOT NULL,
  PRIMARY KEY (`id_like`),
  KEY `producto_id` (`producto_id`),
  KEY `usuario_id` (`usuario_id`),
  CONSTRAINT `tb_likes_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `tb_productos` (`id_producto`) ON DELETE CASCADE,
  CONSTRAINT `tb_likes_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `tb_usuarios` (`documento`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_likes`
--

LOCK TABLES `tb_likes` WRITE;
/*!40000 ALTER TABLE `tb_likes` DISABLE KEYS */;
INSERT INTO `tb_likes` VALUES (35,98,911,'like'),(37,43,911,'like'),(38,18,911,'like');
/*!40000 ALTER TABLE `tb_likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_lista_deseos`
--

DROP TABLE IF EXISTS `tb_lista_deseos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_lista_deseos` (
  `id_deseo` int NOT NULL AUTO_INCREMENT,
  `documento_usuario` int NOT NULL,
  `nombre_deseo` varchar(255) NOT NULL,
  `foto_referencia` text,
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_deseo`),
  KEY `documento_usuario` (`documento_usuario`),
  CONSTRAINT `tb_lista_deseos_ibfk_1` FOREIGN KEY (`documento_usuario`) REFERENCES `tb_usuarios` (`documento`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_lista_deseos`
--

LOCK TABLES `tb_lista_deseos` WRITE;
/*!40000 ALTER TABLE `tb_lista_deseos` DISABLE KEYS */;
INSERT INTO `tb_lista_deseos` VALUES (18,911,'telas','image.jfif,melanie.jpg,paisaje-pareja-anime-atardecer-contraluz_3840x2160_xtrafondos.com.jpg,who-is-melanie-martinez.jpg,wynn-las-vegas-casinos-1415x540.jpg','2024-09-13 17:43:50');
/*!40000 ALTER TABLE `tb_lista_deseos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_productos`
--

DROP TABLE IF EXISTS `tb_productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_productos` (
  `id_producto` int NOT NULL,
  `nombre_producto` varchar(150) NOT NULL,
  `precio` float NOT NULL,
  `cantidad` int NOT NULL,
  `detalles` varchar(150) NOT NULL,
  `color` varchar(50) DEFAULT NULL,
  `tallas` varchar(50) DEFAULT NULL,
  `ruta_img` varchar(250) DEFAULT NULL,
  `id_categoria` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_producto`),
  KEY `fk_categoria` (`id_categoria`),
  CONSTRAINT `fk_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `tb_categoria` (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_productos`
--

LOCK TABLES `tb_productos` WRITE;
/*!40000 ALTER TABLE `tb_productos` DISABLE KEYS */;
INSERT INTO `tb_productos` VALUES (18,'mufasa',5,1,'muy lindo y jugeton','#f4aa2a','xs','../img/3BASICAS-V2-LIGHT.webp',7),(43,'enjvc',444,5,'jdekr','djken','t','../img/61278f9951725.jpg',1),(98,'pan',2000,6,'rico','#b89f00','xl','../img/61278f9951725.jpg',7);
/*!40000 ALTER TABLE `tb_productos` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `contando_pro_reg` AFTER INSERT ON `tb_productos` FOR EACH ROW begin 
insert into tb_conteo_pro_reg()
values(null,concat('Se ha creado el producto: ', new.nombre_producto,' con el ID: ',new.id_producto),1, now() );
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `contando_pro_actu` AFTER UPDATE ON `tb_productos` FOR EACH ROW begin 
insert into tb_conteo_pro_actu()
values(null,concat('Se ha actualizado el producto: ', new.nombre_producto,' con el ID: ',new.id_producto),1, now() );
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `contando_pro_eli` AFTER DELETE ON `tb_productos` FOR EACH ROW begin 
insert into tb_conteo_pro_eli()
values(null,concat('Se ha eliminado el producto: ', old.nombre_producto,' con el ID: ',old.id_producto),1, now() );
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `tb_usuarios`
--

DROP TABLE IF EXISTS `tb_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_usuarios` (
  `documento` int NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `contraseña` varchar(255) DEFAULT NULL,
  `fecha` varchar(30) NOT NULL,
  `foto` varchar(2000) DEFAULT NULL,
  `rol` int NOT NULL,
  PRIMARY KEY (`documento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_usuarios`
--

LOCK TABLES `tb_usuarios` WRITE;
/*!40000 ALTER TABLE `tb_usuarios` DISABLE KEYS */;
INSERT INTO `tb_usuarios` VALUES (911,'claudia jobaira','cardonaaa','cardonaclaudia0910@gmail.com','$2y$12$Bz6YGYXjk9wwtmh3m.w83.S0zzGfzJ/XSDRfaNkTUP3XKo77E9rSe','2006-05-09',NULL,2),(912,'clau','lopez','cardonaclaudia0910@gmail.com','$2y$12$86HxO5j.qun13WclAZBs4ORZqfCbuDBuePI9UhIaHj4NoKlNjZPmm','2006-05-09',NULL,1),(1235,'maria','pp','mariaa@gmail.com','$2y$12$oxqn5Smdp3Gc3YCyujb9Pue0BPnvGVstfZ6SXL5jAf0MqSbcaOJEe','2024-09-03',NULL,2),(12345,'maria','pp','maria@gmail.com','$2y$12$Krdc25vybYpCrpDc/Xi9wu5dUHf4DBDZ0CKBJrzAO5ByQjkF8xoVy','2024-08-27',NULL,2),(1120561596,'mayra','simon','mayrahs760@gmail.com','$2y$12$EBey/Qkg/HjtpAVtyw9aP.Iw1VmbsWwJToge.HGOzGORqP4F4OVrO','2024-09-06',NULL,2);
/*!40000 ALTER TABLE `tb_usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `contando_user_reg` AFTER INSERT ON `tb_usuarios` FOR EACH ROW begin 
insert into tb_conteo_user_reg()
values(null,concat('Se ha registrado el usuario: ', new.nombre,' con el ID: ',new.documento),1, now() );
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `contando_user_actu` AFTER UPDATE ON `tb_usuarios` FOR EACH ROW begin 
insert into tb_conteo_user_actu()
values(null,concat('Se ha actualizado el usuario: ', new.nombre,' con el ID: ',new.documento),1, now() );
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `contando_user_eli` AFTER DELETE ON `tb_usuarios` FOR EACH ROW begin 
insert into tb_conteo_user_eli()
values(null,concat('El ususario: ', old.nombre,' con el ID: ',old.documento,' ha eliminado su cuenta.'),1, now() );
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Temporary view structure for view `vista_productos_likes`
--

DROP TABLE IF EXISTS `vista_productos_likes`;
/*!50001 DROP VIEW IF EXISTS `vista_productos_likes`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_productos_likes` AS SELECT 
 1 AS `id_producto`,
 1 AS `nombre_producto`,
 1 AS `precio`,
 1 AS `cantidad`,
 1 AS `detalles`,
 1 AS `color`,
 1 AS `tallas`,
 1 AS `ruta_img`,
 1 AS `total_likes`*/;
SET character_set_client = @saved_cs_client;

--
-- Dumping events for database 'fw'
--

--
-- Dumping routines for database 'fw'
--
/*!50003 DROP FUNCTION IF EXISTS `contar_usuarios` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `contar_usuarios`() RETURNS int
    READS SQL DATA
    DETERMINISTIC
BEGIN
    DECLARE total_usuarios INT;

    SELECT COUNT(*) INTO total_usuarios FROM tb_usuarios;

    RETURN total_usuarios;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `contar_productos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `contar_productos`()
BEGIN
    DECLARE total_productos INT;

    SELECT COUNT(*) INTO total_productos FROM tb_productos;

    SELECT total_productos AS total_registrados;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `vista_productos_likes`
--

/*!50001 DROP VIEW IF EXISTS `vista_productos_likes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_productos_likes` AS select `p`.`id_producto` AS `id_producto`,`p`.`nombre_producto` AS `nombre_producto`,`p`.`precio` AS `precio`,`p`.`cantidad` AS `cantidad`,`p`.`detalles` AS `detalles`,`p`.`color` AS `color`,`p`.`tallas` AS `tallas`,`p`.`ruta_img` AS `ruta_img`,count(`l`.`id_like`) AS `total_likes` from (`tb_productos` `p` left join `tb_likes` `l` on((`p`.`id_producto` = `l`.`producto_id`))) group by `p`.`id_producto` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-09-23 20:32:08
