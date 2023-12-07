-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 06-12-2023 a las 21:02:44
-- Versión del servidor: 10.10.2-MariaDB
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `artzone`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `art_items`
--

DROP TABLE IF EXISTS `art_items`;
CREATE TABLE IF NOT EXISTS `art_items` (
  `artItemId` varchar(36) NOT NULL,
  `userId` varchar(36) NOT NULL,
  `artStyleId` int(11) NOT NULL,
  `artTypeId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `materials` varchar(255) NOT NULL,
  `shortDescription` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `width` decimal(5,2) NOT NULL,
  `height` decimal(5,2) NOT NULL,
  `localOrigin` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `image` varchar(36) NOT NULL,
  `isSold` tinyint(4) NOT NULL DEFAULT 0,
  `deletedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`artItemId`),
  KEY `artItems_artType_FK` (`artTypeId`),
  KEY `artItems_artStyle_FK` (`artStyleId`),
  KEY `artItems_user_FK` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `art_styles`
--

DROP TABLE IF EXISTS `art_styles`;
CREATE TABLE IF NOT EXISTS `art_styles` (
  `artStyleId` int(11) NOT NULL AUTO_INCREMENT,
  `artStyleType` varchar(30) NOT NULL,
  PRIMARY KEY (`artStyleId`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `art_styles`
--

INSERT INTO `art_styles` (`artStyleId`, `artStyleType`) VALUES
(1, 'Renacimiento'),
(2, 'Barroco'),
(3, 'Rococó'),
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `art_types`
--

DROP TABLE IF EXISTS `art_types`;
CREATE TABLE IF NOT EXISTS `art_types` (
  `artTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `artType` varchar(30) NOT NULL,
  PRIMARY KEY (`artTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `art_types`
--

INSERT INTO `art_types` (`artTypeId`, `artType`) VALUES
(1, 'Pintura'),
(2, 'Escultura'),
(3, 'Cerámica'),
(4, 'Fotografía'),
(5, 'Vidriería');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `occupations`
--

DROP TABLE IF EXISTS `occupations`;
CREATE TABLE IF NOT EXISTS `occupations` (
  `occupationId` int(11) NOT NULL AUTO_INCREMENT,
  `occupationType` varchar(30) NOT NULL,
  PRIMARY KEY (`occupationId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `occupations`
--

INSERT INTO `occupations` (`occupationId`, `occupationType`) VALUES
(1, 'Pintor'),
(2, 'Escultor'),
(3, 'Ilustrador'),
(4, 'Diseñador Gráfico'),
(5, 'Fotógrafo'),
(6, 'Artista Digital'),
(7, 'Artista Textil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `orderId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` varchar(36) NOT NULL,
  `shippingId` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `total` decimal(10,2) NOT NULL,
  PRIMARY KEY (`orderId`),
  KEY `userId_order_FK` (`userId`),
  KEY `shippingId_order_FK` (`shippingId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `orderDetailId` int(11) NOT NULL AUTO_INCREMENT,
  `orderId` int(11) NOT NULL,
  `artItemId` varchar(36) NOT NULL,
  PRIMARY KEY (`orderDetailId`),
  KEY `artItemId_orderDetails_FK` (`artItemId`),
  KEY `orderId_orderDetails_FK` (`orderId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_blocks`
--

DROP TABLE IF EXISTS `personal_blocks`;
CREATE TABLE IF NOT EXISTS `personal_blocks` (
  `personalBlockId` varchar(36) NOT NULL,
  `userId` varchar(36) NOT NULL,
  `title` varchar(32) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`personalBlockId`),
  KEY `personalBlock_user_FK` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `saleId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` varchar(36) NOT NULL,
  `shippingId` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`saleId`),
  KEY `userId_sale_FK` (`userId`),
  KEY `shippingId_sale_FK` (`shippingId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sale_details`
--

DROP TABLE IF EXISTS `sale_details`;
CREATE TABLE IF NOT EXISTS `sale_details` (
  `saleDetailId` int(11) NOT NULL AUTO_INCREMENT,
  `saleId` int(11) NOT NULL,
  `artItemId` varchar(36) NOT NULL,
  PRIMARY KEY (`saleDetailId`),
  KEY `artItemId_saleDetails_FK` (`artItemId`),
  KEY `orderId_saleDetails_FK` (`saleId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shipping_details`
--

DROP TABLE IF EXISTS `shipping_details`;
CREATE TABLE IF NOT EXISTS `shipping_details` (
  `shippingId` int(11) NOT NULL AUTO_INCREMENT,
  `details` text NOT NULL,
  PRIMARY KEY (`shippingId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `userdetails`
--

DROP TABLE IF EXISTS `userdetails`;
CREATE TABLE IF NOT EXISTS `userdetails` (
  `userDetailId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` varchar(36) NOT NULL,
  `imageProfile` varchar(36) NOT NULL,
  `imageBackground` varchar(36) NOT NULL,
  `occupationId` int(11) NOT NULL,
  `description` text NOT NULL,
  `cardNumber` varchar(60) NOT NULL,
  PRIMARY KEY (`userDetailId`),
  KEY `userDetails_user_FK` (`userId`),
  KEY `user_occupation_FK` (`occupationId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userId` varchar(36) NOT NULL,
  `name` varchar(60) NOT NULL,
  `lastName` varchar(60) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(60) NOT NULL,
  `confirmed` tinyint(4) NOT NULL DEFAULT 0,
  `token` varchar(32) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `art_items`
--
ALTER TABLE `art_items`
  ADD CONSTRAINT `artItems_artStyle_FK` FOREIGN KEY (`artStyleId`) REFERENCES `art_styles` (`artStyleId`),
  ADD CONSTRAINT `artItems_artType_FK` FOREIGN KEY (`artTypeId`) REFERENCES `art_types` (`artTypeId`),
  ADD CONSTRAINT `artItems_user_FK` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `shippingId_order_FK` FOREIGN KEY (`shippingId`) REFERENCES `shipping_details` (`shippingId`),
  ADD CONSTRAINT `userId_order_FK` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);

--
-- Filtros para la tabla `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `artItemId_orderDetails_FK` FOREIGN KEY (`artItemId`) REFERENCES `art_items` (`artItemId`),
  ADD CONSTRAINT `orderId_orderDetails_FK` FOREIGN KEY (`orderId`) REFERENCES `orders` (`orderId`);

--
-- Filtros para la tabla `personal_blocks`
--
ALTER TABLE `personal_blocks`
  ADD CONSTRAINT `personalBlock_user_FK` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `shippingId_sale_FK` FOREIGN KEY (`shippingId`) REFERENCES `shipping_details` (`shippingId`),
  ADD CONSTRAINT `userId_sale_FK` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);

--
-- Filtros para la tabla `sale_details`
--
ALTER TABLE `sale_details`
  ADD CONSTRAINT `artItemId_saleDetails_FK` FOREIGN KEY (`artItemId`) REFERENCES `art_items` (`artItemId`),
  ADD CONSTRAINT `orderId_saleDetails_FK` FOREIGN KEY (`saleId`) REFERENCES `sales` (`saleId`);

--
-- Filtros para la tabla `userdetails`
--
ALTER TABLE `userdetails`
  ADD CONSTRAINT `userDetails_user_FK` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_occupation_FK` FOREIGN KEY (`occupationId`) REFERENCES `occupations` (`occupationId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
