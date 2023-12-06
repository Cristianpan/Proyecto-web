-- MySQL dump 10.13  Distrib 8.0.18, for Win64 (x86_64)
--
-- Host: localhost    Database: artzone
-- ------------------------------------------------------
-- Server version	8.0.28

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Temporary view structure for view `all_art_styles`
--

DROP TABLE IF EXISTS `all_art_styles`;
/*!50001 DROP VIEW IF EXISTS `all_art_styles`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `all_art_styles` AS SELECT 
 1 AS `artStyleId`,
 1 AS `artStyleType`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `all_art_types`
--

DROP TABLE IF EXISTS `all_art_types`;
/*!50001 DROP VIEW IF EXISTS `all_art_types`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `all_art_types` AS SELECT 
 1 AS `artTypeId`,
 1 AS `artType`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `art_items`
--

DROP TABLE IF EXISTS `art_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `art_items` (
  `artItemId` varchar(36) COLLATE utf8mb4_general_ci NOT NULL,
  `userId` varchar(36) COLLATE utf8mb4_general_ci NOT NULL,
  `artStyleId` int NOT NULL,
  `artTypeId` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `materials` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `shortDescription` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `width` decimal(5,2) NOT NULL,
  `height` decimal(5,2) NOT NULL,
  `localOrigin` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `image` varchar(36) COLLATE utf8mb4_general_ci NOT NULL,
  `isSold` tinyint NOT NULL DEFAULT '0',
  `deletedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`artItemId`),
  KEY `artItems_artType_FK` (`artTypeId`),
  KEY `artItems_artStyle_FK` (`artStyleId`),
  KEY `artItems_user_FK` (`userId`),
  CONSTRAINT `artItems_artStyle_FK` FOREIGN KEY (`artStyleId`) REFERENCES `art_styles` (`artStyleId`),
  CONSTRAINT `artItems_artType_FK` FOREIGN KEY (`artTypeId`) REFERENCES `art_types` (`artTypeId`),
  CONSTRAINT `artItems_user_FK` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `art_items`
--

LOCK TABLES `art_items` WRITE;
/*!40000 ALTER TABLE `art_items` DISABLE KEYS */;
INSERT INTO `art_items` VALUES ('08ceb26c-f9e1-37fb-8c17-e2382338bb94','be2596da-a012-306a-98de-e3b549e1bd1a',12,4,'Mi primera obra','Pintura, acrilico','Mi primera obra para vender','afsaf',100.00,100.00,'Mérida',200.00,'4b2c57301c5e19b90ded1f8db67a0505',0,'2023-12-06 13:44:14'),('44865dfd-6ee3-30e6-b165-2959a2f2a546','be2596da-a012-306a-98de-e3b549e1bd1a',2,2,'Mi primera obra','Acrílico','Hola','Hola',100.00,100.00,'Mérida',100.00,'6faf9b27dc610da80edb3ed750ef1887',0,NULL),('c1b5e462-7605-3909-bc5a-d31db0bde637','be2596da-a012-306a-98de-e3b549e1bd1a',17,2,'Mi primera obra','Acrílico y acuarelas','Hola','Hola',100.00,200.00,'Mérida',200.00,'050e6efc931ae1ad46ab20ca31b6f39c',1,'2023-12-06 14:11:09'),('ca19bab4-ff77-32c6-982d-e4aa84842390','be2596da-a012-306a-98de-e3b549e1bd1a',17,2,'Cristian David Pan Zaldivar','Acrílico y acuarelas','Hola','Hola',100.00,100.00,'Mérida',100.00,'6f71be741d4733e95cf9a872afa194fe',0,NULL);
/*!40000 ALTER TABLE `art_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `art_styles`
--

DROP TABLE IF EXISTS `art_styles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `art_styles` (
  `artStyleId` int NOT NULL AUTO_INCREMENT,
  `artStyleType` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`artStyleId`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `art_styles`
--

LOCK TABLES `art_styles` WRITE;
/*!40000 ALTER TABLE `art_styles` DISABLE KEYS */;
INSERT INTO `art_styles` VALUES (1,'Renacimiento'),(2,'Barroco'),(3,'Rococó'),(4,'Neoclasicismo'),(5,'Romanticismo'),(6,'Realismo'),(7,'Impresionismo'),(8,'Postimpresionismo'),(9,'Simbolismo'),(10,'Art Nouveau'),(11,'Fauvismo'),(12,'Cubismo'),(13,'Expresionismo'),(14,'Dadaísmo'),(15,'Surrealismo'),(16,'Abstracto'),(17,'Arte Pop'),(18,'Arte Conceptual'),(19,'Minimalismo'),(20,'Arte Contemporáneo');
/*!40000 ALTER TABLE `art_styles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `art_types`
--

DROP TABLE IF EXISTS `art_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `art_types` (
  `artTypeId` int NOT NULL AUTO_INCREMENT,
  `artType` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`artTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `art_types`
--

LOCK TABLES `art_types` WRITE;
/*!40000 ALTER TABLE `art_types` DISABLE KEYS */;
INSERT INTO `art_types` VALUES (1,'Pintura'),(2,'Escultura'),(3,'Cerámica'),(4,'Fotografía'),(5,'Vidriería');
/*!40000 ALTER TABLE `art_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `namespace` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2023-11-12-153113','App\\Database\\Migrations\\ArtTypeMigrate','default','App',1701866690,1),(2,'2023-11-13-181443','App\\Database\\Migrations\\OccupationMigrate','default','App',1701866690,1),(3,'2023-11-13-182444','App\\Database\\Migrations\\UserMigrate','default','App',1701866690,1),(4,'2023-11-13-191435','App\\Database\\Migrations\\PersonalBlocksMigrate','default','App',1701866691,1),(5,'2023-11-14-023201','App\\Database\\Migrations\\UserDetailsMigrate','default','App',1701866691,1),(6,'2023-11-14-221438','App\\Database\\Migrations\\ArtStyleMigrate','default','App',1701866691,1),(7,'2023-11-14-232007','App\\Database\\Migrations\\ArtItemsMigrate','default','App',1701866691,1),(8,'2023-12-03-152319','App\\Database\\Migrations\\ShippingDetailsMigrate','default','App',1701866691,1),(9,'2023-12-03-152858','App\\Database\\Migrations\\OrderMigrate','default','App',1701866691,1),(10,'2023-12-03-155320','App\\Database\\Migrations\\OrderDetailsMigrate','default','App',1701866691,1),(11,'2023-12-03-155958','App\\Database\\Migrations\\SalesMigrate','default','App',1701866691,1),(12,'2023-12-03-160149','App\\Database\\Migrations\\SaleDetailsMigrate','default','App',1701866691,1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `occupations`
--

DROP TABLE IF EXISTS `occupations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `occupations` (
  `occupationId` int NOT NULL AUTO_INCREMENT,
  `occupationType` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`occupationId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `occupations`
--

LOCK TABLES `occupations` WRITE;
/*!40000 ALTER TABLE `occupations` DISABLE KEYS */;
INSERT INTO `occupations` VALUES (1,'Pintor'),(2,'Escultor'),(3,'Ilustrador'),(4,'Diseñador Gráfico'),(5,'Fotógrafo'),(6,'Artista Digital'),(7,'Artista Textil');
/*!40000 ALTER TABLE `occupations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_details` (
  `orderDetailId` int NOT NULL AUTO_INCREMENT,
  `orderId` int NOT NULL,
  `artItemId` varchar(36) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`orderDetailId`),
  KEY `artItemId_orderDetails_FK` (`artItemId`),
  KEY `orderId_orderDetails_FK` (`orderId`),
  CONSTRAINT `artItemId_orderDetails_FK` FOREIGN KEY (`artItemId`) REFERENCES `art_items` (`artItemId`),
  CONSTRAINT `orderId_orderDetails_FK` FOREIGN KEY (`orderId`) REFERENCES `orders` (`orderId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_details`
--

LOCK TABLES `order_details` WRITE;
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
INSERT INTO `order_details` VALUES (1,1,'c1b5e462-7605-3909-bc5a-d31db0bde637');
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `orderId` int NOT NULL AUTO_INCREMENT,
  `userId` varchar(36) COLLATE utf8mb4_general_ci NOT NULL,
  `shippingId` int NOT NULL,
  `date` datetime NOT NULL,
  `total` decimal(10,2) NOT NULL,
  PRIMARY KEY (`orderId`),
  KEY `userId_order_FK` (`userId`),
  KEY `shippingId_order_FK` (`shippingId`),
  CONSTRAINT `shippingId_order_FK` FOREIGN KEY (`shippingId`) REFERENCES `shipping_details` (`shippingId`),
  CONSTRAINT `userId_order_FK` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,'ecf97861-0187-3221-8e9f-593f7f01a53d',1,'2023-12-06 13:58:47',220.00);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_blocks`
--

DROP TABLE IF EXISTS `personal_blocks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_blocks` (
  `personalBlockId` varchar(36) COLLATE utf8mb4_general_ci NOT NULL,
  `userId` varchar(36) COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`personalBlockId`),
  KEY `personalBlock_user_FK` (`userId`),
  CONSTRAINT `personalBlock_user_FK` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_blocks`
--

LOCK TABLES `personal_blocks` WRITE;
/*!40000 ALTER TABLE `personal_blocks` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_blocks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sale_details`
--

DROP TABLE IF EXISTS `sale_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sale_details` (
  `saleDetailId` int NOT NULL AUTO_INCREMENT,
  `saleId` int NOT NULL,
  `artItemId` varchar(36) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`saleDetailId`),
  KEY `artItemId_saleDetails_FK` (`artItemId`),
  KEY `orderId_saleDetails_FK` (`saleId`),
  CONSTRAINT `artItemId_saleDetails_FK` FOREIGN KEY (`artItemId`) REFERENCES `art_items` (`artItemId`),
  CONSTRAINT `orderId_saleDetails_FK` FOREIGN KEY (`saleId`) REFERENCES `sales` (`saleId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sale_details`
--

LOCK TABLES `sale_details` WRITE;
/*!40000 ALTER TABLE `sale_details` DISABLE KEYS */;
INSERT INTO `sale_details` VALUES (1,1,'c1b5e462-7605-3909-bc5a-d31db0bde637');
/*!40000 ALTER TABLE `sale_details` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `update_status_art_item` AFTER INSERT ON `sale_details` FOR EACH ROW BEGIN
	UPDATE art_items
    SET art_items.isSold = 1
    WHERE art_items.artItemId = NEW.artItemId;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sales` (
  `saleId` int NOT NULL AUTO_INCREMENT,
  `userId` varchar(36) COLLATE utf8mb4_general_ci NOT NULL,
  `shippingId` int NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`saleId`),
  KEY `userId_sale_FK` (`userId`),
  KEY `shippingId_sale_FK` (`shippingId`),
  CONSTRAINT `shippingId_sale_FK` FOREIGN KEY (`shippingId`) REFERENCES `shipping_details` (`shippingId`),
  CONSTRAINT `userId_sale_FK` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` VALUES (1,'be2596da-a012-306a-98de-e3b549e1bd1a',1,'2023-12-06 13:58:47');
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shipping_details`
--

DROP TABLE IF EXISTS `shipping_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shipping_details` (
  `shippingId` int NOT NULL AUTO_INCREMENT,
  `details` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`shippingId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipping_details`
--

LOCK TABLES `shipping_details` WRITE;
/*!40000 ALTER TABLE `shipping_details` DISABLE KEYS */;
INSERT INTO `shipping_details` VALUES (1,'{\"name\":\"Cristian \",\"lastName\":\"Pan\",\"email\":\"panzaldivarcristian@gmail.com\",\"telephone\":\"9993981242\",\"card\":\"1234567891234567\",\"key\":\"100\",\"state\":\"Yucat\\u00e1n\",\"street\":\"13\",\"cross\":\"21 y 23\",\"numHouse\":\"95\",\"colony\":\"Yucat\\u00e1n\",\"postalCode\":\"97050\"}');
/*!40000 ALTER TABLE `shipping_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userdetails`
--

DROP TABLE IF EXISTS `userdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `userdetails` (
  `userDetailId` int NOT NULL AUTO_INCREMENT,
  `userId` varchar(36) COLLATE utf8mb4_general_ci NOT NULL,
  `imageProfile` varchar(36) COLLATE utf8mb4_general_ci NOT NULL,
  `imageBackground` varchar(36) COLLATE utf8mb4_general_ci NOT NULL,
  `occupationId` int NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `cardNumber` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`userDetailId`),
  KEY `userDetails_user_FK` (`userId`),
  KEY `user_occupation_FK` (`occupationId`),
  CONSTRAINT `user_occupation_FK` FOREIGN KEY (`occupationId`) REFERENCES `occupations` (`occupationId`),
  CONSTRAINT `userDetails_user_FK` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userdetails`
--

LOCK TABLES `userdetails` WRITE;
/*!40000 ALTER TABLE `userdetails` DISABLE KEYS */;
/*!40000 ALTER TABLE `userdetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `userId` varchar(36) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `lastName` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `confirmed` tinyint NOT NULL DEFAULT '0',
  `token` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('be2596da-a012-306a-98de-e3b549e1bd1a','Cristian','','email@email.com','$2y$10$a8s/hxlgjuRDm74Jf8biw.2dWMfyvszkibut9l46IUEEkxYVw9tNy',0,'5f4b21b5-2086-3133-925e-cc774f69'),('ecf97861-0187-3221-8e9f-593f7f01a53d','Cristian','','panzaldivarcristian@gmail.com','$2y$10$wFyh8GB3g.uF/06zk19/Geaj9cCm8FRp88MjaarCjb.KeuZpZHsxO',0,'e3b5b4ce-736f-3498-9fe6-f2829653');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'artzone'
--

--
-- Final view structure for view `all_art_styles`
--

/*!50001 DROP VIEW IF EXISTS `all_art_styles`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `all_art_styles` AS select `art_styles`.`artStyleId` AS `artStyleId`,`art_styles`.`artStyleType` AS `artStyleType` from `art_styles` order by `art_styles`.`artStyleType` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `all_art_types`
--

/*!50001 DROP VIEW IF EXISTS `all_art_types`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `all_art_types` AS select `art_types`.`artTypeId` AS `artTypeId`,`art_types`.`artType` AS `artType` from `art_types` order by `art_types`.`artType` */;
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

-- Dump completed on 2023-12-06  8:44:16
