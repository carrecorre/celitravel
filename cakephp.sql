-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-05-2020 a las 20:43:48
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `restaurants`
--

INSERT INTO `restaurants` (`id`, `name`, `address`, `postal_code`, `phone`, `email`, `foto`, `foto_dir`, `web`, `province_id`, `town`, `monday_open`, `monday_close`, `tuesday_open`, `tuesday_close`, `wednesday_open`, `wednesday_close`, `thursday_open`, `thursday_close`, `friday_open`, `friday_close`, `saturday_open`, `saturday_close`, `sunday_open`, `sunday_close`, `latitude`, `longitude`) VALUES
(1, 'La taberna', 'C/ Vega 2', '09120', '947368974', 'taberna@gmail.com', 'rest1.jpg', '1', 'www.lataberna.com', 10, 'Villadiego', '08:00:00', '23:00:00', '10:00:00', '23:00:00', '10:00:00', '23:00:00', '10:00:00', '23:00:00', '10:00:00', '02:00:00', '08:00:00', '02:00:00', '10:00:00', '22:00:00', '42.51594179550307000000', '-4.00890991268176040000'),
(2, 'La Cueva', 'C/ Mayor 7', '09120', '947360017', 'cueva@gmail.com', 'rest2.jpg', '2', 'www.lacueva.es', 10, 'Villadiego', '12:00:00', '23:30:00', '12:00:00', '23:30:00', '12:00:00', '23:30:00', '12:00:00', '23:30:00', '12:00:00', '23:30:00', '12:00:00', '23:30:00', '12:00:00', '23:30:00', '42.51483504558433400000', '-4.01126925043702400000'),
(3, 'La Mafia', 'C/ Laín Calvo 50', '09003', '947264478', 'mafiaburgos@gmail.com', 'rest3.jpg', '3', 'www.lamafia.es', 10, 'Burgos', '12:00:00', '23:00:00', '12:00:00', '23:00:00', '12:00:00', '23:00:00', '12:00:00', '23:00:00', '12:00:00', '23:00:00', '12:00:00', '23:30:00', '12:00:00', '23:30:00', '42.34316726876174600000', '-3.70097022019416460000'),
(4, 'Hammbur', 'C/ San Lorenzo, 28', '09003', '947279941', 'hammmbur@gmail.com', 'rest4.jpg', '4', 'www.hammmbur.es', 10, 'Burgos', '13:00:00', '23:00:00', '13:00:00', '23:00:00', '13:00:00', '23:00:00', '13:00:00', '23:00:00', '13:00:00', '23:00:00', '13:00:00', '23:00:00', '13:00:00', '23:00:00', '42.34211575014886400000', '-3.70141587560465900000'),
(5, 'Villa Trajano', 'Av. Reyes Católicos, 8', '09004', '947264455', 'villatrajano@gmail.com', 'rest5.jpg', '5', 'www.villatrajano.es', 10, 'Burgos', '12:00:00', '23:30:00', '12:00:00', '23:30:00', '12:00:00', '23:30:00', '12:00:00', '23:30:00', '12:00:00', '23:30:00', '12:00:00', '23:30:00', '12:00:00', '23:30:00', '42.34443327069305000000', '-3.69602492172215900000'),
(6, 'Mesón Los Herreros', 'C/ San Lorenzo, 20', '09003', '947658947', 'losherreros@gmail.com', 'rest7.jpg', '6', 'ww.mesonlosherreros.com', 10, 'Burgos', '10:00:00', '23:00:00', '10:00:00', '23:00:00', '10:00:00', '23:00:00', '10:00:00', '23:00:00', '10:00:00', '23:00:00', '10:00:00', '23:00:00', '10:00:00', '23:00:00', '42.34227910938769000000', '-3.70142137626071000000'),
(7, 'Celicioso Retiro', 'C/ O''Donnell, 4', '28009', '918625489', 'celicioso@gmail.com', 'rest9.jpg', '7', 'www.celicioso.com', 31, 'Madrid', '09:00:00', '22:00:00', '09:00:00', '22:00:00', '09:00:00', '22:00:00', '09:00:00', '22:00:00', '09:00:00', '22:00:00', '09:00:00', '22:00:00', '09:00:00', '22:00:00', '40.42158960004404000000', '-3.67955699368863340000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurants_specialties`
--

CREATE TABLE IF NOT EXISTS `restaurants_specialties` (
`id` int(11) NOT NULL,
  `restaurant_id` int(11) DEFAULT NULL,
  `specialty_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `restaurants_specialties`
--

INSERT INTO `restaurants_specialties` (`id`, `restaurant_id`, `specialty_id`) VALUES
(3, 2, 5),
(4, 3, 2),
(5, 3, 3),
(6, 3, 4),
(7, 4, 4),
(8, 4, 6),
(9, 5, 2),
(10, 5, 3),
(11, 5, 4),
(12, 6, 5),
(13, 7, 3),
(14, 7, 4),
(19, 1, 1),
(20, 1, 2),
(21, 2, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reviews`
--

INSERT INTO `reviews` (`id`, `review`, `general_rate`, `gluten_knowledge`, `gluten_adaptation`, `restaurant_id`, `user_id`, `date`) VALUES
(1, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 1.00, 4.00, 3.00, 1, 1, '2020-05-07 00:28:10'),
(2, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 1.00, 3.00, 3.00, 1, 1, '2020-05-07 00:28:10'),
(3, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 1.00, 3.00, 3.00, 7, 1, '2020-05-07 00:28:10'),
(4, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 3.00, 5.00, 3.00, 6, 1, '2020-05-07 00:28:10'),
(5, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 4.00, 3.00, 3.00, 5, 1, '2020-05-07 00:28:10'),
(6, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 2.00, 3.00, 3.00, 3, 1, '2020-05-07 00:28:10'),
(7, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 2.00, 3.00, 3.00, 2, 1, '2020-05-07 00:28:10'),
(8, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 3.00, 3.00, 3.00, 1, 1, '2020-05-07 00:28:10'),
(9, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab cupiditate eaque esse nulla! Illum aliquam quasi quaerat modi ad, suscipit eveniet explicabo magnam inventore laudantium consequuntur necessitatibus consequatur, atque tenetur.', 1.00, 3.00, 3.00, 4, 1, '2020-05-07 00:28:10');

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
  `role` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `foto_dir` varchar(255) DEFAULT NULL,
  `creation_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `role`, `email`, `username`, `password`, `foto`, `foto_dir`, `creation_date`) VALUES
(1, 'Ángel', 'Carretón', 'admin', 'angelcarrod@gmail.com', 'angelcarrod', '$2a$10$3eSC3r2LYQUMJRNZpg5U8OaA8BzOi7hGQ14xkP8bhH5iVdvYk0o06', 'user4.jpg', '1', '2020-04-28 21:08:22'),
(2, 'Sergio', 'Rodríguez', 'user', 'sergiorod@gmail.com', 'sergio', '$2a$10$NCkafiUw2lsmnkfqN0T1Gu14tyt5T/kaH1UcN5GS5kh823Uk8byEO', 'user1.jpg', '2', '2020-04-28 21:08:52'),
(3, 'Andrea', 'Zaldua', 'user', 'zaldu@gmail.com', 'zaldu', '111', 'user6.jpg', '3', '2020-04-28 21:09:25'),
(4, 'Manuel', 'García', 'user', 'mgf@gmail.com', 'manugf', '222', 'user2.jpg', '4', '2020-04-28 21:09:54'),
(5, 'Miguel', 'Amo', 'user', 'mag@mail.com', 'migui', 'migui123', 'user3.JPG', '5', '2020-04-28 21:10:31'),
(6, 'Federico', 'J Losantos', 'user', 'fjl@gmial.com', 'fjl', '$2a$10$aoITN48yJyqeJgfXzX36zuKzhhyy/qTVK5d.JZOaZJVS61uEM4jDC', 'user5.jpg', '6', '2020-05-03 23:46:25');

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `restaurants_specialties`
--
ALTER TABLE `restaurants_specialties`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `reviews`
--
ALTER TABLE `reviews`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `specialties`
--
ALTER TABLE `specialties`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
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
