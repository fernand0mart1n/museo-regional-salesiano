-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-11-2016 a las 01:48:17
-- Versión del servidor: 5.7.16-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `salesiano`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificaciones`
--

CREATE TABLE `clasificaciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `fondo_id` int(10) UNSIGNED NOT NULL,
  `usuario_carga` int(10) UNSIGNED NOT NULL,
  `fecha_carga` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clasificaciones`
--

INSERT INTO `clasificaciones` (`id`, `descripcion`, `fondo_id`, `usuario_carga`, `fecha_carga`) VALUES
(3, 'efaasfsaasasf', 4, 1, '2016-11-18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donaciones`
--

CREATE TABLE `donaciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `donante` int(10) UNSIGNED NOT NULL,
  `pieza` int(10) UNSIGNED NOT NULL,
  `fecha_donacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donantes`
--

CREATE TABLE `donantes` (
  `id` int(10) UNSIGNED NOT NULL,
  `persona` int(10) UNSIGNED NOT NULL,
  `fecha_carga_donante` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fondos`
--

CREATE TABLE `fondos` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `usuario_carga` int(10) UNSIGNED NOT NULL,
  `fecha_carga` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fondos`
--

INSERT INTO `fondos` (`id`, `descripcion`, `usuario_carga`, `fecha_carga`) VALUES
(3, 'asdasd', 1, '2016-11-05'),
(4, '2do fondo', 1, '2014-11-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE `fotos` (
  `id` int(10) UNSIGNED NOT NULL,
  `pieza` int(10) UNSIGNED NOT NULL,
  `foto` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('fmvaldebenito@udc.edu.ar', '76e7c6afe8e26e643391d3bc7f9c37d1388600fce72e6a69c78b49465c55ab08', '2016-11-09 22:39:35'),
('flopi@yopmail.com', '4c786ee2822bf4aedd32badc0769da94b04709e425336ef2986c98f1e0199b06', '2016-11-18 06:48:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `cuil_cuit` varchar(13) DEFAULT NULL,
  `domicilio` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `fecha_carga` date DEFAULT NULL,
  `sexo` enum('Masculino','Femenino') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `nombre`, `apellido`, `cuil_cuit`, `domicilio`, `telefono`, `fecha_carga`, `sexo`) VALUES
(2, 'Montoto', 'Flores', '29-36343242-2', 'Siempreviva 123', '28044213123', '2014-10-30', 'Masculino'),
(3, 'Pepe', 'Argento', '2312323131', 'B° 2 de abril Edificio 7 escalera 1 depto. A', '1412441241124', '2016-12-31', 'Femenino'),
(4, 'pepote', 'argento', '2312323131', 'B° 2 de abril Edificio 7 escalera 1 depto. A', '28044213123', '2016-11-18', 'Masculino'),
(5, 'asd', 'asd', '2312323131', 'B° 2 de abril Edificio 7 escalera 1 depto. A', '28044213123', '2016-11-18', 'Masculino'),
(6, 'asdddd', 'ddddddddd', '2312323131', 'B° 2 de abril Edificio 7 escalera 1 depto. A', '28044213123', '2016-11-18', 'Masculino'),
(7, 'asdddd', 'ddddddddd', '2312323131', 'B° 2 de abril Edificio 7 escalera 1 depto. A', '28044213123', '2016-11-18', 'Masculino'),
(8, 'asdddd', 'ddddddddd', '2312323131', 'B° 2 de abril Edificio 7 escalera 1 depto. A', '28044213123', '2016-11-18', 'Masculino'),
(9, 'Montotods', 'ddsdsa', '2312323131', 'Siempreviva 123', '28044213123', '2016-11-18', 'Masculino'),
(10, 'sas', 'sas', '2312323131', 'B° 2 de abril Edificio 7 escalera 1 depto. A', '31231231212', '2016-11-18', 'Masculino'),
(11, 'asdasd', 'asdasda', '29-36343242-2', 'Siempreviva 123', '1412441241124', '2016-11-07', 'Masculino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `piezas`
--

CREATE TABLE `piezas` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `clasificacion` int(10) UNSIGNED NOT NULL,
  `procedencia` varchar(100) DEFAULT NULL,
  `autor` varchar(100) DEFAULT NULL,
  `fecha_ejecucion` date DEFAULT NULL,
  `tema` varchar(100) DEFAULT NULL,
  `observacion` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `piezas`
--

INSERT INTO `piezas` (`id`, `descripcion`, `clasificacion`, `procedencia`, `autor`, `fecha_ejecucion`, `tema`, `observacion`) VALUES
(1, 'Prueba', 3, 'Prueba', 'PRUBA', '2016-11-14', 'PRUEBA', 'PRUE BA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revisiones`
--

CREATE TABLE `revisiones` (
  `id` int(10) UNSIGNED NOT NULL,
  `usuario_revision` int(10) UNSIGNED DEFAULT NULL,
  `pieza` int(10) UNSIGNED NOT NULL,
  `fecha_revision` date DEFAULT NULL,
  `estado_conservacion` varchar(100) DEFAULT NULL,
  `ubicacion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `persona` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `persona`, `created_at`, `updated_at`) VALUES
(1, 'valdesoft', 'fmvaldebenito@udc.edu.ar', '$2y$10$E0XFxlHRiWTzC5uhfo7AsOtopVplaEJv6VrJlLVhKiqFBDWwWlwpO', '2jGSHD4NeMlMPPOJZbMaJK5EeGmblodiNRyZ4Klek8mRzmN8eQpWKhJ00X8I', 2, '2016-11-04 20:24:39', '2016-11-18 07:07:07'),
(2, 'flopi', 'flopi@yopmail.com', '$2y$10$5L3Vay4mZPu1EjxAuqp0UOiY3iWpfTvrimCjRADwWM3sQ0vjpkucK', 'VNKWYngn0QTCUfIYBII8WAhULEG6BsrqGPG1h9iZ5VmEy4PTZU7ebuFN4pXq', 2, '2016-11-18 06:27:45', '2016-11-18 06:31:49'),
(3, 'valdesoft', 'flo2pi@yopmail.com', '$2y$10$.gWEmZ6MRVbOlxjw26nOoe7/VS0Ums6hs49hh0FcgII.tEDbuIVpK', 'BU199nzDtdgvljdL5Stqyf6YTpefpQ04HqaBaRW63sJmCNBa4g6HBhkWvL03', 2, '2016-11-18 06:36:24', '2016-11-18 06:37:00'),
(4, 'ASAFF', 'SAFSFAFAS@ASDASCA.SA', '$2y$10$6zjbM.J6ZQUg1ild7zr4lec2NzLqBZmAmHtn6mt0Kd1MAzCwuSPru', 'CQe9dvk0nWQcDAuXwJoyfmJwsteLUc4oZEfnrNPgONjgjICt4aBQ7DXLImAU', 2, '2016-11-18 06:37:30', '2016-11-18 06:37:48'),
(5, 'pepito', 'pepito@udc.edu.ar', '$2y$10$OI3kEIU3pF2zagUJoNBMMegt.zgpbZCU0M.Th04ibRIXsUlKMICwO', 'mam8lUj5gMLu6BbJEb3LWHtyIOybBCUFSLWYzo7oSDh25IajUfD6b6jvrLvj', 3, '2016-11-18 07:08:36', '2016-11-18 07:18:22'),
(6, 'pepote', 'pepote@udc.edu.ar', '$2y$10$I3ylq1kgSQWUjFfafrdaL.DuB7.gtG2M3wGueGbM4lRt3G/DOuGTm', 'nEwMsr7pZwsU7pvVLtW29vFe2T4koOtNhXYrFLWidi9DKtjs0Nh5WurnXieM', 4, '2016-11-18 08:06:33', '2016-11-18 08:09:32'),
(7, 'asd', 'asd@asd.asd', '$2y$10$L4g2kntuM4nUtMYbdCU3QuM.r1imCnyU6Pf5uMbYs8YSJVZJLdEwm', 'zQg9xCjjcA3v8UiH5fiNMTqpKBjZWuWbWNRx1jM2Zp84ZPl4In3kWxF0tYCI', 5, '2016-11-18 08:10:08', '2016-11-18 08:12:20'),
(8, 'ffffff', 'flwwwopi@yopmail.com', '$2y$10$44sfGmBj6g/hL2odnMK8Gu6KDJnANXvQ0jsphGdYYyNiYE1bj4HhW', 'XOo7DxJfG4o1jpl0WUm0384yKHp0fInjbVUW56ZAja5sq0ttf0SHr5rGNCTQ', 9, '2016-11-18 08:27:23', '2016-11-18 08:29:13'),
(9, 'valdesofts', 'asd@asd.asdss', '$2y$10$W2SzaWt0ePEkVCkf9KLVCO2Matrx3KvZ9FfCYvn3/YrxeVO6.ieja', 'fdAOIosCuUb9lfvuPvodxU6lVHO6WJEt8MfgSVv2FlMazRssJqoQkFxGXqS6', 10, '2016-11-18 08:29:55', '2016-11-18 08:30:16'),
(10, 'valdesoftsssss', 'flo2sspi@yopmail.com', '$2y$10$0a2fq5yoGyjJKPaH9bSIT.88wzxS19P8yLBPbc8FKuX5PJXqD/afi', 'Ep1n8SpiHz6G2dF5NVpRDTBB4SiwxGTvYvevvQo75hoLrkdphpGgKlw5AJew', 11, '2016-11-18 08:44:45', '2016-11-18 08:44:54');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clasificaciones`
--
ALTER TABLE `clasificaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_clasificaciones_users1_idx` (`usuario_carga`),
  ADD KEY `fk_clasificaciones_fondo1_idx` (`fondo_id`);

--
-- Indices de la tabla `donaciones`
--
ALTER TABLE `donaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_donaciones_donantes1_idx` (`donante`),
  ADD KEY `fk_donaciones_piezas1_idx` (`pieza`);

--
-- Indices de la tabla `donantes`
--
ALTER TABLE `donantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_donantes_personas1_idx` (`persona`);

--
-- Indices de la tabla `fondos`
--
ALTER TABLE `fondos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_fondo_users1_idx` (`usuario_carga`);

--
-- Indices de la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_fotos_piezas1_idx` (`pieza`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indices de la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `piezas`
--
ALTER TABLE `piezas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_piezas_clasificaciones1_idx` (`clasificacion`);

--
-- Indices de la tabla `revisiones`
--
ALTER TABLE `revisiones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_revisiones_users1_idx` (`usuario_revision`),
  ADD KEY `fk_revisiones_piezas1_idx` (`pieza`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indices de la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `fk_users_personas_idx` (`persona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clasificaciones`
--
ALTER TABLE `clasificaciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `donaciones`
--
ALTER TABLE `donaciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `donantes`
--
ALTER TABLE `donantes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `fondos`
--
ALTER TABLE `fondos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `piezas`
--
ALTER TABLE `piezas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `revisiones`
--
ALTER TABLE `revisiones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
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
  ADD CONSTRAINT `fk_piezas_clasificaciones1` FOREIGN KEY (`clasificacion`) REFERENCES `clasificaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
