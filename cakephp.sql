-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-04-2020 a las 18:41:14
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
  `url_cover` varchar(255) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `restaurants`
--

INSERT INTO `restaurants` (`id`, `name`, `address`, `postal_code`, `phone`, `email`, `url_cover`, `web`, `province_id`, `town`, `monday_open`, `monday_close`, `tuesday_open`, `tuesday_close`, `wednesday_open`, `wednesday_close`, `thursday_open`, `thursday_close`, `friday_open`, `friday_close`, `saturday_open`, `saturday_close`, `sunday_open`, `sunday_close`, `latitude`, `longitude`) VALUES
(1, 'La taberna dve Los Serrano', 'C/ La paloma Torcaz', '23433', '943235689', 'taberna@mail.com', NULL, 'www.taberna.com', 10, 'Burgos', '12:00:00', '23:00:00', '12:00:00', '12:24:00', '12:00:00', '12:24:00', '12:24:00', '12:24:00', '12:24:00', '12:24:00', '12:24:00', '12:24:00', '12:24:00', '12:24:00', '40.00000000000000000000', '-4.00000000000000000000'),
(2, 'Diverxoxdd', 'C/Desengaño 21', '23433', '947585623', 'diverxo@mail.com', NULL, 'www.diverxo.com', 32, 'Madrid', '01:12:00', '01:12:00', '01:12:00', '01:12:00', '01:12:00', '01:12:00', '01:12:00', '01:12:00', '01:12:00', '01:12:00', '01:12:00', '01:12:00', '01:12:00', '13:24:00', '45.00000000000000000000', '-6.00000000000000000000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurants_specialties`
--

CREATE TABLE IF NOT EXISTS `restaurants_specialties` (
`id` int(11) NOT NULL,
  `restaurant_id` int(11) DEFAULT NULL,
  `specialty_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `restaurants_specialties`
--

INSERT INTO `restaurants_specialties` (`id`, `restaurant_id`, `specialty_id`) VALUES
(10, 1, 1),
(11, 1, 2),
(12, 1, 4);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reviews`
--

INSERT INTO `reviews` (`id`, `review`, `general_rate`, `gluten_knowledge`, `gluten_adaptation`, `restaurant_id`, `user_id`, `date`) VALUES
(1, 'sdfsdfgsd', 4.00, 3.00, 2.00, 1, 6, '2020-04-19 21:50:19'),
(2, 'sdfsdfgsd', 4.00, 3.00, 2.00, 1, 6, '2020-04-19 21:50:19');

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
(4, 'Sin gluten'),
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
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `creation_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `username`, `password`, `creation_date`) VALUES
(1, 'Ángel', 'Carretón', 'angelcarrod@gmail.com', 'angelcarrod', '12345', '2020-04-14 21:14:59'),
(5, 'Jòge', 'López', 'jorge@gmail.com', 'jorge', '1234', '2020-04-14 21:15:56'),
(6, 'Iñigo', 'Rodríguez', 'sergio@gmail.com', 'sergio', '1234', '2020-04-14 21:15:56'),
(7, 'Andrea', 'Zaldúa', 'zaldugarci@gmail.com', 'andreazaldu', '1234', '2020-04-14 21:15:56'),
(8, 'Miguel', 'Amo', 'miguelanimal@gmail.com', 'migui', '1234', '2020-04-14 21:15:56'),
(9, 'Manuel', 'Garcia', 'manu@gmail.com', 'manue', '1234', '2020-04-14 21:15:56'),
(10, 'Jose', 'Veles', NULL, NULL, '2233', '2020-04-19 17:59:26'),
(11, 'Jose', 'Veles', NULL, NULL, '2233', '2020-04-19 17:59:26'),
(12, 'Jose', 'Veles', NULL, NULL, '2233', '2020-04-19 17:59:26'),
(13, 'Jose', 'Veles', NULL, NULL, '2233', '2020-04-19 17:59:26'),
(14, 'Jose', 'Veles', NULL, NULL, '2233', '2020-04-19 17:59:26'),
(15, 'Jose', 'Veles', NULL, NULL, '2233', '2020-04-19 17:59:26'),
(16, 'Jose', 'Veles', NULL, NULL, '2233', '2020-04-19 17:59:26'),
(17, 'Jose', 'Veles', NULL, NULL, '2233', '2020-04-19 17:59:26'),
(18, 'Jose', 'Veles', NULL, NULL, '2233', '2020-04-19 17:59:26'),
(19, 'Jose', 'Veles', NULL, NULL, '2233', '2020-04-19 17:59:26'),
(20, 'José', 'Veleñ', NULL, NULL, '2233', '2020-04-19 17:59:26'),
(21, 'Jose', 'Veles', NULL, NULL, '2233', '2020-04-19 17:59:26');

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `restaurants_specialties`
--
ALTER TABLE `restaurants_specialties`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `reviews`
--
ALTER TABLE `reviews`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `specialties`
--
ALTER TABLE `specialties`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
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
