-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-05-2020 a las 21:55:07
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `cakephp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provinces`
--

CREATE TABLE IF NOT EXISTS `provinces` (
`id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `community` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `community`) VALUES
(1, 'Álava', 'País Vasco'),
(2, 'Albacete', 'Castilla La Mancha'),
(3, 'Alicante', 'Comunidad Valenciana'),
(4, 'Almería', 'Andalucía'),
(5, 'Asturias', 'Principado de Asturias'),
(6, 'Ávila', 'Castilla y León'),
(7, 'Badajoz', 'Extremadura'),
(8, 'Baleares', 'Islas Baleares'),
(9, 'Barcelona', 'Cataluña'),
(10, 'Burgos', 'Castilla y León'),
(11, 'Cáceres', 'Extremadura'),
(12, 'Cádiz', 'Andalucía'),
(13, 'Cantabria', 'Cantabria'),
(14, 'Castellón', 'Comunidad Valenciana'),
(15, 'Ciudad Real', 'Castilla La Mancha'),
(16, 'Córdoba', 'Andalucía'),
(17, 'Cuenca', 'Castilla La Mancha'),
(18, 'Girona', 'Cataluña'),
(19, 'Granada', 'Andalucía'),
(20, 'Guadalajara', 'Castilla La Mancha'),
(21, 'Gipuzkoa', 'País Vasco'),
(22, 'Huelva', 'Andalucía'),
(23, 'Huesca', 'Aragón'),
(24, 'Jaén', 'Andalucía'),
(25, 'A Coruña', 'Galicia'),
(26, 'La Rioja', 'La Rioja'),
(27, 'Las Palmas', 'Canarias'),
(28, 'León', 'Castilla y León'),
(29, 'Lleida', 'Cataluña'),
(30, 'Lugo', 'Galicia'),
(31, 'Madrid', 'Comunidad de Madrid'),
(32, 'Málaga', 'Andalucía'),
(33, 'Murcia', 'Región de Murcia'),
(34, 'Navarra', 'Comunidad Foral de Navarra'),
(35, 'Ourense', 'Galicia'),
(36, 'Palencia', 'Castilla y León'),
(37, 'Pontevedra', 'Galicia'),
(38, 'Salamanca', 'Castilla y León'),
(39, 'Santa Cruz de Tenerife', 'Canarias'),
(40, 'Segovia', 'Castilla y León'),
(41, 'Sevilla', 'Andalucía'),
(42, 'Soria', 'Castilla y León'),
(43, 'Tarragona', 'Cataluña'),
(44, 'Teruel', 'Aragón'),
(45, 'Toledo', 'Castilla La Mancha'),
(46, 'Valencia', 'Comunidad Valenciana'),
(47, 'Valladolid', 'Castilla y León'),
(48, 'Bizkaia', 'País Vasco'),
(49, 'Zamora', 'Castilla y León'),
(50, 'Zaragoza', 'Aragón'),
(51, 'Ceuta', 'Ceuta'),
(52, 'Melilla', 'Melilla');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurants`
--

CREATE TABLE IF NOT EXISTS `restaurants` (
`id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` varchar(10) DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `foto_dir` varchar(255) DEFAULT NULL,
  `web` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `province_id` int(10) DEFAULT NULL,
  `town` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `monday_open` time DEFAULT NULL,
  `monday_close` time DEFAULT NULL,
  `tuesday_open` time DEFAULT NULL,
  `tuesday_close` time DEFAULT NULL,
  `wednesday_open` time DEFAULT NULL,
  `wednesday_close` time DEFAULT NULL,
  `thursday_open` time DEFAULT NULL,
  `thursday_close` time DEFAULT NULL,
  `friday_open` time DEFAULT NULL,
  `friday_close` time DEFAULT NULL,
  `saturday_open` time DEFAULT NULL,
  `saturday_close` time DEFAULT NULL,
  `sunday_open` time DEFAULT NULL,
  `sunday_close` time DEFAULT NULL,
  `latitude` decimal(30,20) DEFAULT NULL,
  `longitude` decimal(30,20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `restaurants`
--

INSERT INTO `restaurants` (`id`, `name`, `address`, `postal_code`, `phone`, `email`, `foto`, `foto_dir`, `web`, `province_id`, `town`, `monday_open`, `monday_close`, `tuesday_open`, `tuesday_close`, `wednesday_open`, `wednesday_close`, `thursday_open`, `thursday_close`, `friday_open`, `friday_close`, `saturday_open`, `saturday_close`, `sunday_open`, `sunday_close`, `latitude`, `longitude`) VALUES
(1, 'La Taberna', 'C/ Vega 2', '09120', '947368974', 'taberna@gmail.com', 'rest1.jpg', '1', 'www.lataberna.com', 10, 'Villadiego', '08:00:00', '23:00:00', '10:00:00', '23:00:00', '10:00:00', '23:00:00', '10:00:00', '23:00:00', '10:00:00', '02:00:00', '08:00:00', '02:00:00', '10:00:00', '22:00:00', '42.51594179550307000000', '-4.00890991268176040000'),
(2, 'La Cueva', 'C/ Mayor 7', '09120', '947360017', 'cueva@gmail.com', 'rest2.jpg', '2', 'www.lacueva.es', 10, 'Villadiego', '12:00:00', '23:30:00', '12:00:00', '23:30:00', '12:00:00', '23:30:00', '12:00:00', '23:30:00', '12:00:00', '23:30:00', '12:00:00', '23:30:00', '12:00:00', '23:30:00', '42.51483504558433400000', '-4.01126925043702400000'),
(3, 'La Mafia', 'C/ Laín Calvo 50', '09003', '947264478', 'mafiaburgos@gmail.com', 'rest3.jpg', '3', 'www.lamafia.es', 10, 'Burgos', '12:00:00', '23:00:00', '12:00:00', '23:00:00', '12:00:00', '23:00:00', '12:00:00', '23:00:00', '12:00:00', '23:00:00', '12:00:00', '23:30:00', '12:00:00', '23:30:00', '42.34316726876174600000', '-3.70097022019416460000'),
(4, 'Hammbur', 'C/ San Lorenzo, 28', '09003', '947279941', 'hammmbur@gmail.com', 'rest4.jpg', '4', 'www.hammmbur.es', 10, 'Burgos', '13:00:00', '23:00:00', '13:00:00', '23:00:00', '13:00:00', '23:00:00', '13:00:00', '23:00:00', '13:00:00', '23:00:00', '13:00:00', '23:00:00', '13:00:00', '23:00:00', '42.34211575014886400000', '-3.70141587560465900000'),
(5, 'Villa Trajano', 'Av. Reyes Católicos, 8', '09004', '947264455', 'villatrajano@gmail.com', 'rest5.jpg', '5', 'www.villatrajano.es', 10, 'Burgos', '12:00:00', '23:30:00', '12:00:00', '23:30:00', '12:00:00', '23:30:00', '12:00:00', '23:30:00', '12:00:00', '23:30:00', '12:00:00', '23:30:00', '12:00:00', '23:30:00', '42.34443327069305000000', '-3.69602492172215900000'),
(6, 'Mesón Los Herreros', 'C/ San Lorenzo, 20', '09003', '947658947', 'losherreros@gmail.com', 'rest7.jpg', '6', 'ww.mesonlosherreros.com', 10, 'Burgos', '10:00:00', '23:00:00', '10:00:00', '23:00:00', '10:00:00', '23:00:00', '10:00:00', '23:00:00', '10:00:00', '23:00:00', '10:00:00', '23:00:00', '10:00:00', '23:00:00', '42.34230448558021000000', '-3.70062595887990930000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurants_specialties`
--

CREATE TABLE IF NOT EXISTS `restaurants_specialties` (
`id` int(11) NOT NULL,
  `restaurant_id` int(11) DEFAULT NULL,
  `specialty_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `restaurants_specialties`
--

INSERT INTO `restaurants_specialties` (`id`, `restaurant_id`, `specialty_id`) VALUES
(3, 2, 5),
(4, 3, 2),
(5, 3, 3),
(8, 4, 6),
(9, 5, 2),
(10, 5, 3),
(19, 1, 1),
(20, 1, 2),
(21, 2, 1),
(31, 6, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
`id` int(10) NOT NULL,
  `review` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `general_rate` float(10,2) DEFAULT NULL,
  `gluten_knowledge` float(10,2) DEFAULT NULL,
  `gluten_adaptation` float(10,2) DEFAULT NULL,
  `restaurant_id` int(10) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reviews`
--

INSERT INTO `reviews` (`id`, `review`, `general_rate`, `gluten_knowledge`, `gluten_adaptation`, `restaurant_id`, `user_id`, `date`) VALUES
(4, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 3.00, 5.00, 3.00, 6, 1, '2020-05-07 00:28:10'),
(5, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 3.00, 3.00, 5, 2, '2020-05-07 00:28:10'),
(6, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 2.00, 3.00, 3.00, 3, 3, '2020-05-07 00:28:10'),
(7, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 2.00, 3.00, 3.00, 2, 1, '2020-05-07 00:28:10'),
(9, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 1.00, 3.00, 3.00, 4, 3, '2020-05-07 00:28:10'),
(10, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 5.00, 4.00, 3, 3, '2020-05-12 21:09:30'),
(11, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 2.00, 3.00, 3.00, 2, 2, '2020-05-07 00:28:10'),
(12, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 2.00, 3.00, 3.00, 2, 2, '2020-05-07 00:28:10'),
(13, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 2.00, 3.00, 3.00, 2, 2, '2020-05-07 00:28:10'),
(15, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 2.00, 3.00, 3.00, 2, 3, '2020-05-07 00:28:10'),
(16, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 2.00, 3.00, 3.00, 2, 2, '2020-05-07 00:28:10'),
(18, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 6, 3, '2020-05-17 13:05:57'),
(19, 'Lorem ipsum', 3.00, 3.00, 3.00, 6, 1, '2020-05-18 12:44:10'),
(20, 'Lorem ipsum', 3.00, 3.00, 3.00, 6, 1, '2020-05-18 12:44:24'),
(21, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 5.00, 4.00, 2, 2, '2020-05-18 19:05:28'),
(22, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 5.00, 4.00, 2, 1, '2020-05-18 19:05:34'),
(24, 'Lorem ipsum', 5.00, 5.00, 5.00, 3, 2, '2020-05-19 19:29:28'),
(57, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 2.00, 3.00, 3.00, 1, 3, '2020-05-07 00:28:10'),
(58, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 2.00, 3.00, 3.00, 1, 3, '2020-05-07 00:28:10'),
(59, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 1, 2, '2020-05-21 21:40:37'),
(60, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 1, 1, '2020-05-21 21:40:51'),
(61, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 1, 1, '2020-05-21 21:40:52'),
(62, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 1, 1, '2020-05-21 21:40:52'),
(63, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 1, 1, '2020-05-21 21:40:52'),
(64, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 1, 1, '2020-05-21 21:40:53'),
(65, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 1, 1, '2020-05-21 21:40:54'),
(66, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 1, 1, '2020-05-21 21:40:54'),
(67, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 1, 1, '2020-05-21 21:40:55'),
(68, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 1, 1, '2020-05-21 21:40:55'),
(69, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 1, 1, '2020-05-21 21:40:55'),
(70, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 1, 1, '2020-05-21 21:40:55'),
(71, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 1, 1, '2020-05-21 21:40:55'),
(72, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 1, 1, '2020-05-21 21:40:55'),
(73, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 1, 1, '2020-05-21 21:40:56'),
(74, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 1, 1, '2020-05-21 21:40:56'),
(75, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 1, 1, '2020-05-21 21:40:56'),
(76, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 1, 1, '2020-05-21 21:40:56'),
(77, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 1, 1, '2020-05-21 21:40:56'),
(78, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 2, 2, '2020-05-21 21:41:19'),
(79, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 2, 2, '2020-05-21 21:41:19'),
(80, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 2, 2, '2020-05-21 21:41:20'),
(81, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 2, 2, '2020-05-21 21:41:20'),
(82, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 2, 2, '2020-05-21 21:41:20'),
(83, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 2, 2, '2020-05-21 21:41:20'),
(84, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 2, 2, '2020-05-21 21:41:20'),
(85, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 2, 2, '2020-05-21 21:41:20'),
(86, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 2, 2, '2020-05-21 21:41:21'),
(87, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 2, 2, '2020-05-21 21:41:21'),
(88, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 2, 2, '2020-05-21 21:41:21'),
(89, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 3, 2, '2020-05-21 21:41:26'),
(90, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 3, 2, '2020-05-21 21:41:26'),
(91, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 3, 2, '2020-05-21 21:41:27'),
(92, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 3, 2, '2020-05-21 21:41:27'),
(93, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 3, 2, '2020-05-21 21:41:27'),
(94, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 3, 2, '2020-05-21 21:41:27'),
(95, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 3, 2, '2020-05-21 21:41:27'),
(96, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 3, 2, '2020-05-21 21:41:28'),
(97, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 3, 2, '2020-05-21 21:41:28'),
(98, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 3, 2, '2020-05-21 21:41:28'),
(99, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 3, 2, '2020-05-21 21:41:29'),
(100, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 3, 2, '2020-05-21 21:41:29'),
(101, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 4, 2, '2020-05-21 21:41:47'),
(102, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 4, 2, '2020-05-21 21:41:47'),
(103, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 4, 2, '2020-05-21 21:41:48'),
(104, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 4, 2, '2020-05-21 21:41:48'),
(105, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 4, 2, '2020-05-21 21:41:48'),
(106, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 4, 2, '2020-05-21 21:41:48'),
(107, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 4, 2, '2020-05-21 21:41:49'),
(108, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 4, 2, '2020-05-21 21:41:49'),
(109, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 4, 2, '2020-05-21 21:41:49'),
(110, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 4, 2, '2020-05-21 21:41:49'),
(111, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 5, 3, '2020-05-21 21:41:57'),
(112, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 5, 3, '2020-05-21 21:41:57'),
(113, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 5, 3, '2020-05-21 21:41:57'),
(114, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 5, 3, '2020-05-21 21:41:57'),
(115, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 5, 3, '2020-05-21 21:41:58'),
(116, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 5, 3, '2020-05-21 21:41:58'),
(117, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 5, 3, '2020-05-21 21:41:58'),
(118, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 5, 3, '2020-05-21 21:41:58'),
(119, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 5, 3, '2020-05-21 21:41:58'),
(120, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 5, 3, '2020-05-21 21:41:59'),
(121, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 5, 3, '2020-05-21 21:41:59'),
(122, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 5, 3, '2020-05-21 21:41:59'),
(123, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 5, 3, '2020-05-21 21:41:59'),
(124, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 5, 3, '2020-05-21 21:41:59'),
(125, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 5, 3, '2020-05-21 21:41:59'),
(126, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 5, 3, '2020-05-21 21:41:59'),
(127, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 5, 3, '2020-05-21 21:42:00'),
(128, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 5, 3, '2020-05-21 21:42:00'),
(129, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 5, 3, '2020-05-21 21:42:02'),
(130, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 5, 3, '2020-05-21 21:42:02'),
(131, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 5, 3, '2020-05-21 21:42:02'),
(132, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 5, 3, '2020-05-21 21:42:02'),
(133, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 6, 3, '2020-05-21 21:42:09'),
(134, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 6, 3, '2020-05-21 21:42:09'),
(135, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 6, 3, '2020-05-21 21:42:09'),
(136, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 6, 3, '2020-05-21 21:42:09'),
(137, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 6, 3, '2020-05-21 21:42:09'),
(138, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 6, 3, '2020-05-21 21:42:09'),
(139, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 6, 3, '2020-05-21 21:42:10'),
(140, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 6, 2, '2020-05-21 21:42:13'),
(141, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 6, 2, '2020-05-21 21:42:13'),
(142, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 6, 2, '2020-05-21 21:42:13'),
(143, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 6, 2, '2020-05-21 21:42:13'),
(144, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 6, 1, '2020-05-21 21:42:16'),
(145, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 6, 1, '2020-05-21 21:42:16'),
(146, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 6, 1, '2020-05-21 21:42:16'),
(147, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 6, 1, '2020-05-21 21:42:16'),
(148, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 4.00, 4.00, 6, 1, '2020-05-21 21:42:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `specialties`
--

CREATE TABLE IF NOT EXISTS `specialties` (
`id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `specialties`
--

INSERT INTO `specialties` (`id`, `name`) VALUES
(1, 'Kebab'),
(2, 'Italiana'),
(3, 'Vegetariana'),
(4, 'Peruana'),
(5, 'Española'),
(6, 'Americana'),
(7, 'Asiática'),
(8, 'China');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `surname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `foto_dir` varchar(255) DEFAULT NULL,
  `creation_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `role`, `email`, `username`, `password`, `foto`, `foto_dir`, `creation_date`) VALUES
(1, 'Ángel', 'Carretón', 'admin', 'angelcarrod@gmail.com', 'angelcarrod', '$2a$10$3eSC3r2LYQUMJRNZpg5U8OaA8BzOi7hGQ14xkP8bhH5iVdvYk0o06', 'user9.jpg', '1', '2020-04-28 21:08:22'),
(2, 'Sergio', 'Rodríguez', 'user', 'sergiorod@gmail.com', 'sergio', '$2a$10$NCkafiUw2lsmnkfqN0T1Gu14tyt5T/kaH1UcN5GS5kh823Uk8byEO', 'user5.jpg', '2', '2020-04-28 21:08:52'),
(3, 'Miguel', 'Amo', 'user', 'mag@mail.com', 'miguel', '$2a$10$VT/wyHzosA6a3LavSgavJ.ZaE4gUnWbHUHDqx60MdXPIhIRKj00te', 'user7.jpg', '3', '2020-05-20 19:51:27'),
(8, 'Andrea', 'Zaldua', 'user', 'zaldu@gmail.com', 'andrea', '$2a$10$rQr7jObMkRm5jGBJQnQZS.S2iu/TqMYSUYZVXHRbPPc8F4wM.SBFO', 'user6.jpg', '8', '2020-05-21 21:43:39'),
(9, 'Manuel', 'García', 'user', 'mgf@gmail.com', 'manuel', '$2a$10$/Ysq5paMJZw0.ty8o8lZCerXYQu.g8cUgL3AE7uBvAs/zoJqegH9O', 'user8.jpg', '9', '2020-05-21 21:44:03'),
(10, 'Carmen', 'Tirado', 'user', 'carmen@gmail.com', 'carmen', '$2a$10$ZMVAYN7CY0j6kN70Z5WaLuJuAXC/leZUejxG6u0a7YAgzsli3inrq', 'user10.jpg', '10', '2020-05-21 21:44:28'),
(11, 'Julen', 'Merino', 'admin', 'julen@gmail.com', 'julen', '$2a$10$AW2sAxQyPCC/yFPAI34equg36rmbbt2dhF7vLpd4zzLXFuPFpSxUi', 'user1.jpg', '11', '2020-05-21 21:45:16');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `provinces`
--
ALTER TABLE `provinces`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `restaurants`
--
ALTER TABLE `restaurants`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`), ADD KEY `FK_restaurants_province_id` (`province_id`);

--
-- Indices de la tabla `restaurants_specialties`
--
ALTER TABLE `restaurants_specialties`
 ADD PRIMARY KEY (`id`), ADD KEY `FK_restaurants_specialties_restaurants` (`restaurant_id`), ADD KEY `FK_restaurants_specialties_specialties` (`specialty_id`) USING BTREE;

--
-- Indices de la tabla `reviews`
--
ALTER TABLE `reviews`
 ADD PRIMARY KEY (`id`), ADD KEY `FK_reviews_restaurant_id` (`restaurant_id`), ADD KEY `FK_reviews_user_id` (`user_id`);

--
-- Indices de la tabla `specialties`
--
ALTER TABLE `specialties`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`), ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `provinces`
--
ALTER TABLE `provinces`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT de la tabla `restaurants`
--
ALTER TABLE `restaurants`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `restaurants_specialties`
--
ALTER TABLE `restaurants_specialties`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT de la tabla `reviews`
--
ALTER TABLE `reviews`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=149;
--
-- AUTO_INCREMENT de la tabla `specialties`
--
ALTER TABLE `specialties`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `restaurants`
--
ALTER TABLE `restaurants`
ADD CONSTRAINT `FK_restaurants_province_id` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`);

--
-- Filtros para la tabla `restaurants_specialties`
--
ALTER TABLE `restaurants_specialties`
ADD CONSTRAINT `FK_restaurants_specialties_restaurants` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`),
ADD CONSTRAINT `FK_restaurants_specialties_specialties` FOREIGN KEY (`specialty_id`) REFERENCES `specialties` (`id`);

--
-- Filtros para la tabla `reviews`
--
ALTER TABLE `reviews`
ADD CONSTRAINT `FK_reviews_restaurant_id` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`),
ADD CONSTRAINT `FK_reviews_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
