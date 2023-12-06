/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

DROP TABLE IF EXISTS `art_items`;
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

DROP TABLE IF EXISTS `art_styles`;
CREATE TABLE `art_styles` (
  `artStyleId` int NOT NULL AUTO_INCREMENT,
  `artStyleType` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`artStyleId`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `art_types`;
CREATE TABLE `art_types` (
  `artTypeId` int NOT NULL AUTO_INCREMENT,
  `artType` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`artTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `migrations`;
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

DROP TABLE IF EXISTS `occupations`;
CREATE TABLE `occupations` (
  `occupationId` int NOT NULL AUTO_INCREMENT,
  `occupationType` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`occupationId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE `order_details` (
  `orderDetailId` int NOT NULL AUTO_INCREMENT,
  `orderId` int NOT NULL,
  `artItemId` varchar(36) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`orderDetailId`),
  KEY `artItemId_orderDetails_FK` (`artItemId`),
  KEY `orderId_orderDetails_FK` (`orderId`),
  CONSTRAINT `artItemId_orderDetails_FK` FOREIGN KEY (`artItemId`) REFERENCES `art_items` (`artItemId`),
  CONSTRAINT `orderId_orderDetails_FK` FOREIGN KEY (`orderId`) REFERENCES `orders` (`orderId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `orders`;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `personal_blocks`;
CREATE TABLE `personal_blocks` (
  `personalBlockId` varchar(36) COLLATE utf8mb4_general_ci NOT NULL,
  `userId` varchar(36) COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`personalBlockId`),
  KEY `personalBlock_user_FK` (`userId`),
  CONSTRAINT `personalBlock_user_FK` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `sale_details`;
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

DROP TABLE IF EXISTS `sales`;
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

DROP TABLE IF EXISTS `shipping_details`;
CREATE TABLE `shipping_details` (
  `shippingId` int NOT NULL AUTO_INCREMENT,
  `details` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`shippingId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `userdetails`;
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

DROP TABLE IF EXISTS `users`;
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



INSERT INTO `art_styles` (`artStyleId`, `artStyleType`) VALUES
(1, 'Renacimiento');
INSERT INTO `art_styles` (`artStyleId`, `artStyleType`) VALUES
(2, 'Barroco');
INSERT INTO `art_styles` (`artStyleId`, `artStyleType`) VALUES
(3, 'Rococó');
INSERT INTO `art_styles` (`artStyleId`, `artStyleType`) VALUES
(4, 'Neoclasicismo'),
(5, 'Romanticismo'),
(6, 'Realismo'),
(7, 'Impresionismo'),
(8, 'Postimpresionismo'),
(9, 'Simbolismo'),
(10, 'Art Nouveau'),
(11, 'Fauvismo'),
(12, 'Cubismo'),
(13, 'Expresionismo'),
(14, 'Dadaísmo'),
(15, 'Surrealismo'),
(16, 'Abstracto'),
(17, 'Arte Pop'),
(18, 'Arte Conceptual'),
(19, 'Minimalismo'),
(20, 'Arte Contemporáneo');

INSERT INTO `art_types` (`artTypeId`, `artType`) VALUES
(1, 'Pintura');
INSERT INTO `art_types` (`artTypeId`, `artType`) VALUES
(2, 'Escultura');
INSERT INTO `art_types` (`artTypeId`, `artType`) VALUES
(3, 'Cerámica');
INSERT INTO `art_types` (`artTypeId`, `artType`) VALUES
(4, 'Fotografía'),
(5, 'Vidriería');

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2023-11-12-153113', 'App\\Database\\Migrations\\ArtTypeMigrate', 'default', 'App', 1701845105, 1);
INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(2, '2023-11-13-181443', 'App\\Database\\Migrations\\OccupationMigrate', 'default', 'App', 1701845105, 1);
INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(3, '2023-11-13-182444', 'App\\Database\\Migrations\\UserMigrate', 'default', 'App', 1701845106, 1);
INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(4, '2023-11-13-191435', 'App\\Database\\Migrations\\PersonalBlocksMigrate', 'default', 'App', 1701845106, 1),
(5, '2023-11-14-023201', 'App\\Database\\Migrations\\UserDetailsMigrate', 'default', 'App', 1701845106, 1),
(6, '2023-11-14-221438', 'App\\Database\\Migrations\\ArtStyleMigrate', 'default', 'App', 1701845106, 1),
(7, '2023-11-14-232007', 'App\\Database\\Migrations\\ArtItemsMigrate', 'default', 'App', 1701845106, 1),
(8, '2023-12-03-152319', 'App\\Database\\Migrations\\ShippingDetailsMigrate', 'default', 'App', 1701845106, 1),
(9, '2023-12-03-152858', 'App\\Database\\Migrations\\OrderMigrate', 'default', 'App', 1701845107, 1),
(10, '2023-12-03-155320', 'App\\Database\\Migrations\\OrderDetailsMigrate', 'default', 'App', 1701845107, 1),
(11, '2023-12-03-155958', 'App\\Database\\Migrations\\SalesMigrate', 'default', 'App', 1701845107, 1),
(12, '2023-12-03-160149', 'App\\Database\\Migrations\\SaleDetailsMigrate', 'default', 'App', 1701845108, 1);

INSERT INTO `occupations` (`occupationId`, `occupationType`) VALUES
(1, 'Pintor');
INSERT INTO `occupations` (`occupationId`, `occupationType`) VALUES
(2, 'Escultor');
INSERT INTO `occupations` (`occupationId`, `occupationType`) VALUES
(3, 'Ilustrador');
INSERT INTO `occupations` (`occupationId`, `occupationType`) VALUES
(4, 'Diseñador Gráfico'),
(5, 'Fotógrafo'),
(6, 'Artista Digital'),
(7, 'Artista Textil');







INSERT INTO `sale_details` (`saleDetailId`, `saleId`, `artItemId`) VALUES
(1, 1, '2a3ed8cf-9b4e-3f71-87e1-ef21f5dd8084');


INSERT INTO `sales` (`saleId`, `userId`, `shippingId`, `date`) VALUES
(1, 'cd69fd53-e580-300e-998c-965e3fab666a', 1, '2023-12-06 06:48:42');









/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;