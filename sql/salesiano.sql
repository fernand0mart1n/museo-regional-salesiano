-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-11-2016 a las 12:03:25
-- Versión del servidor: 5.5.53
-- Versión de PHP: 5.6.23-1+deprecated+dontuse+deb.sury.org~precise+1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `salesiano`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificaciones`
--

CREATE TABLE IF NOT EXISTS `clasificaciones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(200) DEFAULT NULL,
  `fondo_id` int(10) unsigned NOT NULL,
  `usuario_carga` int(10) unsigned NOT NULL,
  `fecha_carga` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_clasificaciones_users1_idx` (`usuario_carga`),
  KEY `fk_clasificaciones_fondo1_idx` (`fondo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `clasificaciones`
--

INSERT INTO `clasificaciones` (`id`, `descripcion`, `fondo_id`, `usuario_carga`, `fecha_carga`) VALUES
(1, 'Clasificación de prueba', 1, 1, '2016-11-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donaciones`
--

CREATE TABLE IF NOT EXISTS `donaciones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `donante` int(10) unsigned NOT NULL,
  `pieza` int(10) unsigned NOT NULL,
  `fecha_donacion` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_donaciones_donantes1_idx` (`donante`),
  KEY `fk_donaciones_piezas1_idx` (`pieza`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donantes`
--

CREATE TABLE IF NOT EXISTS `donantes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `persona` int(10) unsigned NOT NULL,
  `fecha_carga_donante` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_donantes_personas1_idx` (`persona`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fondos`
--

CREATE TABLE IF NOT EXISTS `fondos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(200) DEFAULT NULL,
  `usuario_carga` int(10) unsigned NOT NULL,
  `fecha_carga` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_fondo_users1_idx` (`usuario_carga`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `fondos`
--

INSERT INTO `fondos` (`id`, `descripcion`, `usuario_carga`, `fecha_carga`) VALUES
(1, 'Fondo de prueba', 1, '2016-11-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE IF NOT EXISTS `fotos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pieza` int(10) unsigned NOT NULL,
  `foto` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_fotos_piezas1_idx` (`pieza`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2016_11_22_044341_entrust_setup_tables', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('museoregionalsalesiano@gmail.com', '7580894d135f2d0dfbfbbdabdc87ac870e1063175ec033a12af8eb7676000d28', '2016-11-22 17:05:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission_role`
--

CREATE TABLE IF NOT EXISTS `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE IF NOT EXISTS `personas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `cuil_cuit` varchar(13) DEFAULT NULL,
  `domicilio` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `fecha_carga` date DEFAULT NULL,
  `sexo` enum('Masculino','Femenino') DEFAULT 'Masculino',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `nombre`, `apellido`, `cuil_cuit`, `domicilio`, `telefono`, `fecha_carga`, `sexo`) VALUES
(1, 'Museo Regional', 'Salesiano', '00-00000000-0', 'Don Bosco 248', '280 448-2623', '2016-11-22', 'Masculino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `piezas`
--

CREATE TABLE IF NOT EXISTS `piezas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(200) DEFAULT NULL,
  `clasificacion` int(10) unsigned NOT NULL,
  `procedencia` varchar(100) DEFAULT NULL,
  `autor` varchar(100) DEFAULT NULL,
  `fecha_ejecucion` date DEFAULT NULL,
  `tema` varchar(100) DEFAULT NULL,
  `observacion` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_piezas_clasificaciones1_idx` (`clasificacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revisiones`
--

CREATE TABLE IF NOT EXISTS `revisiones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario_revision` int(10) unsigned DEFAULT NULL,
  `pieza` int(10) unsigned NOT NULL,
  `fecha_revision` date DEFAULT NULL,
  `estado_conservacion` varchar(100) DEFAULT NULL,
  `ubicacion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_revisiones_users1_idx` (`usuario_revision`),
  KEY `fk_revisiones_piezas1_idx` (`pieza`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrador', 'Tiene acceso total', '2016-11-22 11:47:46', '2016-11-22 11:47:46'),
(2, 'operador', 'Operador', 'Registra y actualiza datos', '2016-11-22 11:48:43', '2016-11-22 11:48:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_user`
--

CREATE TABLE IF NOT EXISTS `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `persona` int(10) unsigned DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `fk_users_personas_idx` (`persona`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `persona`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'museoregionalsalesiano@gmail.com', '$2y$10$8CAghMGZQIZaBO6/Ps/14O5UPWRT1vcsxv7EsvIKmVmUq2BIp/vje', 'wMsBubJuRAT96LQ4TuSaPqz16t94Sv6qgeYCzrSG2wLWUmquPLWy0HEPWEcq', 1, 1, '2016-11-22 15:34:31', '2016-11-22 17:56:27');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clasificaciones`
--
ALTER TABLE `clasificaciones`
  ADD CONSTRAINT `fk_clasificaciones_fondo1` FOREIGN KEY (`fondo_id`) REFERENCES `fondos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_clasificaciones_users1` FOREIGN KEY (`usuario_carga`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `donaciones`
--
ALTER TABLE `donaciones`
  ADD CONSTRAINT `fk_donaciones_donantes1` FOREIGN KEY (`donante`) REFERENCES `donantes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_donaciones_piezas1` FOREIGN KEY (`pieza`) REFERENCES `piezas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `donantes`
--
ALTER TABLE `donantes`
  ADD CONSTRAINT `fk_donantes_personas1` FOREIGN KEY (`persona`) REFERENCES `personas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `fondos`
--
ALTER TABLE `fondos`
  ADD CONSTRAINT `fk_fondo_users1` FOREIGN KEY (`usuario_carga`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD CONSTRAINT `fk_fotos_piezas1` FOREIGN KEY (`pieza`) REFERENCES `piezas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `piezas`
--
ALTER TABLE `piezas`
  ADD CONSTRAINT `piezas_ibfk_1` FOREIGN KEY (`clasificacion`) REFERENCES `clasificaciones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `revisiones`
--
ALTER TABLE `revisiones`
  ADD CONSTRAINT `fk_revisiones_piezas1` FOREIGN KEY (`pieza`) REFERENCES `piezas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_revisiones_users1` FOREIGN KEY (`usuario_revision`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_personas` FOREIGN KEY (`persona`) REFERENCES `personas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
