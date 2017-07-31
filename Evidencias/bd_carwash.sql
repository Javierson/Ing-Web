-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-07-2017 a las 07:22:47
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_carwash`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE `cuenta` (
  `id` int(11) NOT NULL,
  `paquete_id` int(11) NOT NULL,
  `costo` decimal(10,2) NOT NULL,
  `cliente_id` int(11) NOT NULL DEFAULT '0',
  `sucursal_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`id`, `paquete_id`, `costo`, `cliente_id`, `sucursal_id`, `created_at`, `updated_at`) VALUES
(1, 4, '64.00', 3, 1, '2017-07-28 14:58:24', '2017-07-28 14:58:24'),
(2, 1, '70.00', 4, 2, '2017-07-28 14:59:00', '2017-07-28 14:59:00'),
(3, 4, '56.00', 3, 2, '2017-07-28 22:20:33', '2017-07-28 22:20:33'),
(4, 2, '96.00', 4, 2, '2017-07-28 22:41:33', '2017-07-28 22:41:33'),
(5, 2, '96.00', 4, 2, '2017-07-29 02:53:31', '2017-07-29 02:53:31'),
(6, 1, '90.00', 4, 1, '2017-07-29 02:54:35', '2017-07-29 02:54:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `mision` varchar(400) DEFAULT NULL,
  `vision` varchar(400) DEFAULT NULL,
  `correo` varchar(40) NOT NULL,
  `telefono` char(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `nombre`, `mision`, `vision`, `correo`, `telefono`, `created_at`, `updated_at`) VALUES
(1, 'CarWash', 'Ser la empresa especialista en el mercado de auto lavado y estetica automotriz movil, en busca de la excelencia en el rubro y ser reconocidos por la calidad y diferenciacion de nuestros servicios, unicos en el mercado de lavado moviles', 'Ser la empresa numero uno, caracterizada por ser exitosa e innovadora. Especialista en servicio de autolavado movil, con la garantia de ofrecer estetica automotriz de primera calidad garantizando al cliente su satisfaccion y confianza. Asi mismo, el desarrollo de un crecimiento sostenido en beneficio a la apertura de nuevas plazas a nivel nacional.', 'CarWash@hotmail.com', '0123456789', '2017-07-28 13:58:45', '2017-07-28 13:58:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion`
--

CREATE TABLE `evaluacion` (
  `id` int(11) NOT NULL,
  `calificacion` tinyint(4) DEFAULT NULL,
  `comentario` varchar(100) DEFAULT NULL,
  `cuenta_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `evaluacion`
--

INSERT INTO `evaluacion` (`id`, `calificacion`, `comentario`, `cuenta_id`, `created_at`, `updated_at`) VALUES
(1, 4, NULL, 2, '2017-07-28 22:16:17', '2017-07-28 22:16:17'),
(2, 3, 'Lorem', 2, '2017-07-28 22:16:39', '2017-07-28 22:16:39'),
(3, 4, 'Servicio aceptable', 1, '2017-07-28 22:17:40', '2017-07-28 22:17:40'),
(4, 2, 'Se pudo mejorar mas en otros aspectos', 1, '2017-07-28 22:18:15', '2017-07-28 22:18:15'),
(5, 3, 'Hola', 2, '2017-07-29 02:45:10', '2017-07-29 02:45:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquete`
--

CREATE TABLE `paquete` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `costo` decimal(10,2) NOT NULL,
  `vehiculo_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `paquete`
--

INSERT INTO `paquete` (`id`, `nombre`, `costo`, `vehiculo_id`, `created_at`, `updated_at`) VALUES
(1, 'Lavado basico', '100.00', 1, '2017-07-28 14:07:10', '2017-07-28 14:07:10'),
(2, 'Lavado express', '120.00', 2, '2017-07-28 14:08:37', '2017-07-28 14:08:37'),
(3, 'Limpieza exterior', '50.00', 6, '2017-07-28 14:10:19', '2017-07-28 14:10:19'),
(4, 'Lavado plus', '80.00', 7, '2017-07-28 14:11:34', '2017-07-28 14:11:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promocion`
--

CREATE TABLE `promocion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `fecha_de_inicio` date DEFAULT NULL,
  `fecha_de_expiracion` date DEFAULT NULL,
  `descuento` tinyint(4) NOT NULL,
  `privacidad` tinyint(1) NOT NULL DEFAULT '0',
  `sucursal_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `promocion`
--

INSERT INTO `promocion` (`id`, `nombre`, `descripcion`, `fecha_de_inicio`, `fecha_de_expiracion`, `descuento`, `privacidad`, `sucursal_id`, `created_at`, `updated_at`) VALUES
(1, 'Martes de damas', 'Por tiempo indefinico', NULL, NULL, 20, 0, 1, '2017-07-28 14:21:22', '2017-07-28 14:21:22'),
(2, 'Miercoles de caballeros', 'Por tiempo indefinico', NULL, NULL, 20, 0, 1, '2017-07-28 14:22:23', '2017-07-28 14:22:23'),
(3, 'Martes de carros negros', 'Promocion exclusiva a cualquier vehiculo negro hasta el fin del año', '2017-01-01', '2017-12-31', 10, 0, 1, '2017-07-28 14:24:35', '2017-07-28 14:24:35'),
(4, 'Paquete festejes', 'En tu cumpleaños recibe 50% de descuento', NULL, NULL, 50, 0, 2, '2017-07-28 14:26:20', '2017-07-28 14:26:20'),
(5, 'Oferta especial', 'En tu proximo lavado obten un 30% de descuento, orferta por tiempo limitado', '2017-04-01', '2017-06-01', 30, 1, 2, '2017-07-28 14:37:44', '2017-07-28 14:37:44'),
(6, 'Por tiempo limitado', 'Aprovecha fin de semana', '2017-07-29', '2017-07-30', 40, 0, 2, '2017-07-29 02:49:35', '2017-07-29 02:49:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `calle` varchar(40) NOT NULL,
  `cp` char(5) NOT NULL,
  `colonia` varchar(40) NOT NULL,
  `municipio` varchar(20) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`id`, `numero`, `calle`, `cp`, `colonia`, `municipio`, `estado`, `empresa_id`, `created_at`, `updated_at`) VALUES
(1, 117, 'Obregon', '01234', 'Primavera', 'Culiacan', 'Sinaloa', 1, '2017-07-28 14:16:38', '2017-07-28 14:16:38'),
(2, 360, 'Emiliano Zapata', '40000', 'Las Torres', 'Mazatlan', 'Sinaloa', 1, '2017-07-28 14:17:59', '2017-07-28 14:17:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_paterno` varchar(40) NOT NULL,
  `apellido_materno` varchar(40) NOT NULL,
  `fecha_de_nacimiento` date NOT NULL,
  `codigo_postal` char(5) DEFAULT NULL,
  `email` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `puntos` int(11) NOT NULL DEFAULT '0',
  `rol` tinyint(1) DEFAULT NULL,
  `empresa_id` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `apellido_paterno`, `apellido_materno`, `fecha_de_nacimiento`, `codigo_postal`, `email`, `password`, `remember_token`, `puntos`, `rol`, `empresa_id`, `created_at`, `updated_at`) VALUES
(1, 'Visitante', 'Indefinido', 'Indefinido', '2017-01-01', NULL, 'Indefinido', '', NULL, 0, NULL, 1, '2017-07-27 16:25:10', '0000-00-00 00:00:00'),
(2, 'Francisco Javier', 'Guerrero', 'Heredia', '1992-12-02', NULL, 'javierson@hotmail.com', '$2y$10$xkezIVnpm21eg7pIJoNnh.omVxW766B0m1XI4XTYHXC2D6zOpQPT.', 'zWtoos9XqIUa6uTgict6vgiiaBf4e2NQ7HTOt7UEgK7inT71BIXKvPY3CyCH', 0, 1, 1, '2017-07-31 05:20:42', '2017-07-28 22:18:43'),
(3, 'Carlos', 'Lopez', 'Sepulveda', '1994-04-04', '01234', 'Carlos@hotmail.com', '$2y$10$MTv8K17XfZSvSKbkMxLHLeniHu7yD2of3Wx1yQXWLHWzGUO5KDQFy', 'qiXbH6mvXdagKt5OcrbguLN84iI5mxKUCspKSS9jHuJSAGRBTq55jWWHGkkh', 5, NULL, 1, '2017-07-28 15:20:33', '2017-07-28 22:20:33'),
(4, 'Maria', 'Flores', 'Ochoa', '1980-04-02', '01234', 'Maria@hotmail.com', '$2y$10$MYZachssSibA3gwG8hdPyO9PSxgSEPcFb7vBiOYlm5MNJuVxcRdfW', 'WOk4Ca2oMzxJmkzAKH4GhmrViHHOjx6kxZm58to8hccpHnVlbPmpOeqsuuSD', 218, NULL, 1, '2017-07-28 19:54:35', '2017-07-29 02:54:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `id` int(11) NOT NULL,
  `tipo` varchar(40) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`id`, `tipo`, `created_at`, `updated_at`) VALUES
(1, 'Carro chico', '2017-07-28 14:01:21', '2017-07-28 14:01:21'),
(2, 'Doble cabina', '2017-07-28 14:01:36', '2017-07-28 14:01:36'),
(3, 'Doble rodado', '2017-07-28 14:01:59', '2017-07-28 14:01:59'),
(4, 'Combies', '2017-07-28 14:02:15', '2017-07-28 14:02:15'),
(5, 'Combies personales grandes', '2017-07-28 14:03:09', '2017-07-28 14:03:09'),
(6, 'Moto sencilla', '2017-07-28 14:04:02', '2017-07-28 14:04:02'),
(7, 'Cuatri moto', '2017-07-28 14:04:23', '2017-07-28 14:04:23'),
(8, 'Remolque', '2017-07-28 14:05:00', '2017-07-28 14:05:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `paquete`
--
ALTER TABLE `paquete`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `promocion`
--
ALTER TABLE `promocion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `paquete`
--
ALTER TABLE `paquete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `promocion`
--
ALTER TABLE `promocion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
