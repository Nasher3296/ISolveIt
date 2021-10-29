-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-10-2021 a las 15:02:08
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignado`
--

CREATE TABLE `asignado` (
  `id` int(11) NOT NULL,
  `id_consulta` int(11) NOT NULL,
  `id_us` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asignado`
--

INSERT INTO `asignado` (`id`, `id_consulta`, `id_us`) VALUES
(13, 6, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concurso`
--

CREATE TABLE `concurso` (
  `id_concurso` int(11) NOT NULL,
  `id_consulta` int(11) NOT NULL,
  `id_us` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `concurso`
--

INSERT INTO `concurso` (`id_concurso`, `id_consulta`, `id_us`) VALUES
(95, 1, 6),
(96, 8, 6),
(97, 9, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE `consulta` (
  `id_consulta` int(11) NOT NULL,
  `id_us` int(11) NOT NULL,
  `titulo` varchar(20) NOT NULL,
  `descripcion` varchar(280) NOT NULL,
  `recompensa` float NOT NULL,
  `fecha_subida` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_limite` datetime NOT NULL,
  `archivo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `consulta`
--

INSERT INTO `consulta` (`id_consulta`, `id_us`, `titulo`, `descripcion`, `recompensa`, `fecha_subida`, `fecha_limite`, `archivo`) VALUES
(1, 2, 'Consulta1', 'descripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripcion', 600, '2021-10-12 00:00:00', '2021-10-06 00:00:00', ''),
(2, 1, 'Tituloxd', 'descripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripcion', 600, '2021-10-29 00:00:00', '2021-10-31 00:00:00', ''),
(6, 6, 'dawdawd', 'DESCIPCION', 3424, '2021-10-12 08:24:48', '2021-10-27 00:00:00', ''),
(8, 17, 'lucass', 'lucasslucasslucasslucasslucasslucasslucasslucasslucasslucasslucasslucasslucasslucasslucasslucass', 88, '2021-10-12 08:24:48', '2021-10-27 00:00:00', ''),
(9, 17, 'otro', 'lucasslucasslucasslucasslucasslucasslucasslucasslucasslucasslucasslucasslucasslucasslucasslucass', 88, '2021-10-12 08:24:48', '2021-10-27 00:00:00', ''),
(10, 6, 'ArchivoPrueba2', 'archivooo', 100, '2021-10-29 09:42:52', '2021-10-13 09:42:00', '../archivos/descarga.jfif');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entregado`
--

CREATE TABLE `entregado` (
  `id` int(11) NOT NULL,
  `id_cons` int(11) NOT NULL,
  `id_us` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `archivo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `entregado`
--

INSERT INTO `entregado` (`id`, `id_cons`, `id_us`, `descripcion`, `archivo`) VALUES
(39, 6, 2, 'a', '../archivos/0munera_data_base.sql'),
(40, 8, 6, 'lorem ipsum tulio dauiwldwlorem ipsum tulio dauiwldwlorem ipsum tulio dauiwldwlorem ipsum tulio dauiwldwlorem ipsum tulio dauiwldwlorem ipsum tulio dauiwldwlorem ipsum tulio dauiwldwlorem ipsum tulio dauiwldwlorem ipsum tulio dauiwldw', '../archivos/CuteNinjaBakery.txt'),
(43, 9, 6, 'dadwa', '../archivos/0CuteNinjaBakery (4).txt');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `tag` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tag`
--

INSERT INTO `tag` (`id`, `tag`) VALUES
(1, 'matematica'),
(2, 'literatura'),
(3, 'historia'),
(5, 'lengua'),
(7, 'catequesis'),
(11, 'programacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tag_cons`
--

CREATE TABLE `tag_cons` (
  `id` int(11) NOT NULL,
  `id_cons` int(11) NOT NULL,
  `tag_cons` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tag_cons`
--

INSERT INTO `tag_cons` (`id`, `id_cons`, `tag_cons`) VALUES
(1, 6, 1),
(2, 6, 2),
(3, 2, 1),
(9, 8, 1),
(10, 1, 2),
(11, 9, 1),
(12, 10, 3),
(13, 10, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tag_usuario`
--

CREATE TABLE `tag_usuario` (
  `id` int(11) NOT NULL,
  `id_us` int(11) NOT NULL,
  `tag_us` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tag_usuario`
--

INSERT INTO `tag_usuario` (`id`, `id_us`, `tag_us`) VALUES
(37, 6, 1),
(38, 6, 2),
(39, 6, 10),
(40, 6, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_us` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nombre` varchar(20) NOT NULL DEFAULT 'Nuevo usuario',
  `pass` varchar(200) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `estrellas` int(2) DEFAULT NULL,
  `empleo` tinyint(1) NOT NULL,
  `descripcion` varchar(256) DEFAULT '"Hola. Soy un nuevo usuario de I Solve It. Espero que podamos ayudarnos mutuamente!',
  `tag` varchar(100) NOT NULL DEFAULT 'matematica,historia,literatura',
  `tokens` double NOT NULL,
  `imagen` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_us`, `username`, `nombre`, `pass`, `mail`, `estrellas`, `empleo`, `descripcion`, `tag`, `tokens`, `imagen`) VALUES
(1, 'fesf', '', '$2y$10$GofLEAsZgDuMFhkUL3eeDuXZ/0R/W3MDRo1Em1l/ogHMqTxiBCIoO', 'fsef', NULL, 0, NULL, '', 0, 0),
(2, 'juan', '', '$2y$10$Rt/IF.whnxzlIJJGDA2PwOngOr1xcTKjpCHUV5n8pitqXEUYsqmkC', 'juan', NULL, 0, NULL, '', 0, 0),
(3, 'a', '', '$2y$10$6I24vgfGmHlS/skTouT3wufqiKhhZWHZ2CSIEIFZFoeFou7QQdk4W', 'a', NULL, 0, NULL, '', 0, 0),
(4, 'v', '', '$2y$10$RN9ctk2WA/3sSjRr2/k11Okger3nQj.N.nmiQ5ZW8meRsjr0CxVBa', 'v', NULL, 0, NULL, '', 0, 0),
(5, 'fe', '', '$2y$10$1Xsneoh3d44cKbTNdW05p.hFnnPfXvQ8nH8dBdq5HobS4GBmeabuu', 'fe', NULL, 0, NULL, '', 0, 0),
(6, 'juanperez', 'elJaime3296', '$2y$10$lqlvr4bfxwvE9xhpl1XMKuDoiQqcCDRnuV79yeQgxjCX/k9bcwmvy', 'juanperez', NULL, 0, 'Soy Juan, el gran Jaime1. Me gusta hacer tps de juan y soy juan', 'matematica,ETIQUETA1', 352, 0),
(8, 'pepepepe', '', '$2y$10$Sc31n7d2XcYRW8jfySmwIe6VO.k6awGKUUpwXoBzY6E5EPv71N05.', 'pepepepe', NULL, 0, NULL, '', 0, 0),
(9, 'pepepepepepepepe', '', '$2y$10$1H8nq2eU50PxrBvysAWguOTnMVy9yziQbsGcX0ZBD7ZRHtoTkloue', 'pepepepepepepepe', NULL, 0, NULL, '', 0, 0),
(10, '1234', '', '$2y$10$uh1W5PZOsDOeljyd8.F13.EyEMWOJUn.y1NmjKBr13QTg4WAi4pgi', '1234', NULL, 0, NULL, '', 0, 0),
(11, '12345', '', '$2y$10$JfzIMSlwJKR8UnpE.bb.QOwgwpQclYfr8h5mJmKBCuhWh3CIZG2A2', '12345', NULL, 0, NULL, '', 0, 0),
(12, '123456', '', '$2y$10$fSc/fE6vNdmLqkF.PkMVf.RPiYNqZc2ZL1bWRLu75bvDH1uX2gb5O', '123456', NULL, 0, NULL, '', 0, 0),
(13, 'po', '', '$2y$10$c/mB9RTFS6fhr4G6EjJuBO/9ppE4qAVPDolaCEHQQchy2WAkykyg6', 'po', NULL, 0, NULL, '', 0, 0),
(14, 'pe', '', '$2y$10$fyCBYUOIRXCplAgroTA4QOoxVhPtG.HWu0Nkkq4xf26kWEIvSYPNi', 'pe', NULL, 0, NULL, '', 0, 0),
(15, 'dadaw', '', '$2y$10$GjBxpVaBNShQLxWGBS0IvOGzhOx/Ksxk93Nhe/XY/zIelhvSATFtK', 'dadaw', NULL, 0, NULL, '', 0, 0),
(16, 'fesfs', '', '$2y$10$0QNdGSTIp0nNkcAqenGi7e5.D9QXdncQtaGnokivFjGdMx4jsC5u2', 'faefesf', NULL, 0, NULL, '', 0, 0),
(17, 'lucas', '', '$2y$10$83oFp/b7Q2PAg2OQEcBbD.wd0L.2ADN3qeboknWkUxYqATY3.SFZO', 'lucas', NULL, 0, NULL, '', 0, 0),
(18, 'juancho', '', '$2y$10$cCP4f9y/a63JDmDtJCq5D.xkHvVosBwuo7C5io/Ygw./X2QOx4VTi', 'juancho', NULL, 0, NULL, '', 0, 0),
(19, '654', '', '$2y$10$ETdzVrPrOXaA8HeEPoMt9.iIyzvhATIR5o8.tCp.Kq6yCke8Ls.76', '654', NULL, 0, NULL, '', 0, 0),
(20, '987', '', '$2y$10$wLK6hZruKtnR22QVok4H6.yJpnUTKmJ2XvbuWdSwGhYkgyfQzMeO.', '987', NULL, 0, NULL, '', 0, 0),
(21, '9876', '', '$2y$10$A4yDK/cCtaCgOlwT/gH4XOKcCwyurbVlVJynjrfg7Tfh34eMqZQnu', '9876', NULL, 0, NULL, '', 0, 0),
(22, '132', '', '$2y$10$rIrlBbNKR4nxddPcfpUNR.DMJhzKWoiumHDA96KNKvTpQoc9B0/T2', '132', NULL, 0, NULL, '', 0, 0),
(23, '96', 'Nuevo usuario', '$2y$10$QjDBnWjFO2ixlKyJwbGVDuwZnijAOg/dBfzdegmDRQjO5cbllP72.', '96', NULL, 0, NULL, '', 0, 0),
(24, 'yup', 'Nuevo usuario', '$2y$10$2aumV3EfUYtUULFrBbsnyO8hoFq0JdKwY6IWYWhpVOKXaQ5zO8dZa', 'yup', NULL, 0, NULL, '', 0, 0),
(25, 'rivero', 'Nuevo usuario', '$2y$10$K8Y6HUE80vlGB7vYXgngreq6YjpWdTImQHRriXSv69cYy7g2NFyhO', 'rivero', NULL, 0, '\"Hola. Soy un nuevo usuario de I Solve It. Espero que podamos ayudarnos mutuamente!', 'matematica,historia,literatura', 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignado`
--
ALTER TABLE `asignado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `concurso`
--
ALTER TABLE `concurso`
  ADD PRIMARY KEY (`id_concurso`);

--
-- Indices de la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`id_consulta`),
  ADD KEY `usuario` (`id_us`);

--
-- Indices de la tabla `entregado`
--
ALTER TABLE `entregado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tag_cons`
--
ALTER TABLE `tag_cons`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tag_usuario`
--
ALTER TABLE `tag_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_us`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignado`
--
ALTER TABLE `asignado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `concurso`
--
ALTER TABLE `concurso`
  MODIFY `id_concurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT de la tabla `consulta`
--
ALTER TABLE `consulta`
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `entregado`
--
ALTER TABLE `entregado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tag_cons`
--
ALTER TABLE `tag_cons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tag_usuario`
--
ALTER TABLE `tag_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_us` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `usuario` FOREIGN KEY (`id_us`) REFERENCES `usuario` (`id_us`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
