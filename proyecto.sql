-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-10-2021 a las 20:31:20
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
(1, 6, 6),
(2, 2, 6);

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
  `fecha_limite` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `consulta`
--

INSERT INTO `consulta` (`id_consulta`, `id_us`, `titulo`, `descripcion`, `recompensa`, `fecha_subida`, `fecha_limite`) VALUES
(1, 2, 'Tituloxd', 'descripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripcion', 600, '2021-10-12 00:00:00', '2021-10-06 00:00:00'),
(2, 1, '222222222', 'descripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripcion', 600, '2021-10-29 00:00:00', '2021-10-31 00:00:00'),
(4, 6, '', '', 0, '2021-10-12 00:00:00', '0000-00-00 00:00:00'),
(6, 6, 'dawdawd', 'DESCIPCION', 3424, '2021-10-12 08:24:48', '2021-10-27 00:00:00'),
(7, 1, '3333333333', 'descripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripcion', 600, '2021-10-29 00:00:00', '2021-10-31 00:00:00');

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
(3, 'historia');

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
(1, 1, 1),
(2, 2, 2),
(3, 2, 3),
(4, 1, 3),
(5, 1, 2);

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
(1, 6, 1),
(2, 6, 3),
(3, 44, 1);

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
  `tokens` double NOT NULL DEFAULT 500,
  `imagen` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_us`, `username`, `nombre`, `pass`, `mail`, `estrellas`, `empleo`, `descripcion`, `tokens`, `imagen`) VALUES
(1, 'fesf', 'fesf', '$2y$10$GofLEAsZgDuMFhkUL3eeDuXZ/0R/W3MDRo1Em1l/ogHMqTxiBCIoO', 'fsef', NULL, 0, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 200, 0),
(2, 'juan', '', '$2y$10$Rt/IF.whnxzlIJJGDA2PwOngOr1xcTKjpCHUV5n8pitqXEUYsqmkC', 'juan', NULL, 0, NULL, 0, 0),
(3, 'a', '', '$2y$10$6I24vgfGmHlS/skTouT3wufqiKhhZWHZ2CSIEIFZFoeFou7QQdk4W', 'a', NULL, 0, NULL, 0, 0),
(4, 'v', '', '$2y$10$RN9ctk2WA/3sSjRr2/k11Okger3nQj.N.nmiQ5ZW8meRsjr0CxVBa', 'v', NULL, 0, NULL, 0, 0),
(5, 'fe', '', '$2y$10$1Xsneoh3d44cKbTNdW05p.hFnnPfXvQ8nH8dBdq5HobS4GBmeabuu', 'fe', NULL, 0, NULL, 0, 0),
(6, 'juanperez', 'ElJaime3296', '$2y$10$lqlvr4bfxwvE9xhpl1XMKuDoiQqcCDRnuV79yeQgxjCX/k9bcwmvy', 'juanperez', NULL, 0, 'Soy Juan, el gran Jaime1. Me gusta hacer tps de juan y soy juan', 500, 0),
(23, '96', 'Nuevo usuario', '$2y$10$QjDBnWjFO2ixlKyJwbGVDuwZnijAOg/dBfzdegmDRQjO5cbllP72.', '96', NULL, 0, NULL, 0, 0),
(24, 'yup', 'Nuevo usuario', '$2y$10$2aumV3EfUYtUULFrBbsnyO8hoFq0JdKwY6IWYWhpVOKXaQ5zO8dZa', 'yup', NULL, 0, NULL, 0, 0),
(25, 'rivero', 'Nuevo usuario', '$2y$10$K8Y6HUE80vlGB7vYXgngreq6YjpWdTImQHRriXSv69cYy7g2NFyhO', 'rivero', NULL, 0, '\"Hola. Soy un nuevo usuario de I Solve It. Espero que podamos ayudarnos mutuamente!', 0, 0),
(26, 'bocacampeon', 'Nuevo usuario', '$2y$10$XbDVdrTGwhKq.7Wx5K7mqOfbfanzbwDFcPLUeDHSvikt71rFw4U/e', 'bocacampeon', NULL, 0, '\"Hola. Soy un nuevo usuario de I Solve It. Espero que podamos ayudarnos mutuamente!', 0, 0),
(28, 'test', 'Nuevo usuario', 'a', 'a', 2, 0, '\"Hola. Soy un nuevo usuario de I Solve It. Espero que podamos ayudarnos mutuamente!', 23, 0),
(29, 'teste', 'Nuevo usuario', 'a', 'a', 2, 0, '\"Hola. Soy un nuevo usuario de I Solve It. Espero que podamos ayudarnos mutuamente!', 23, 0),
(30, 'bokita', 'Nuevo usuario', '$2y$10$Cb5/2QN5XvJABP52hVs1b.gst8CGyE3A6EJfRoDxQHvnr0SZrooO6', 'bokita', NULL, 0, '\"Hola. Soy un nuevo usuario de I Solve It. Espero que podamos ayudarnos mutuamente!', 500, 0),
(31, 'duhawuolpd', 'Nuevo usuario', '$2y$10$PtFp4WhW6IU2DXRChqrf0e/P6CxJ9Xa/YDBrWcEAzGz/TWRuzomXC', 'duhawuolpd', NULL, 0, '\"Hola. Soy un nuevo usuario de I Solve It. Espero que podamos ayudarnos mutuamente!', 500, 0),
(32, 'duhawuolpda', 'Nuevo usuario', '$2y$10$2Ix3dSa0tF5b99gcKXJ.webqZ7vwcx10UNijKbVgDuNNTjVpev.v6', 'duhawuolpda', NULL, 0, '\"Hola. Soy un nuevo usuario de I Solve It. Espero que podamos ayudarnos mutuamente!', 500, 0),
(33, 'duhawuolpdaa', 'Nuevo usuario', '$2y$10$uoCfl0w1Nj7CBKy3fGLFD.A4ZQq2tVxLVSG1C8QZ/NtKp25hw1l1G', 'duhawuolpdaa', NULL, 0, '\"Hola. Soy un nuevo usuario de I Solve It. Espero que podamos ayudarnos mutuamente!', 500, 0),
(34, 'duhawuolpdaaa', 'Nuevo usuario', '$2y$10$L2P/Jj7dJl0FpIgxP795puGFbhMLFFsxW0JDRhmiIYIp5YVJbOjBe', 'duhawuolpdaaa', NULL, 0, '\"Hola. Soy un nuevo usuario de I Solve It. Espero que podamos ayudarnos mutuamente!', 500, 0),
(35, 'ac', 'Nuevo usuario', '$2y$10$zXkmG3Du5pi2LhqRqZ5LmO6Os4Xa0BGFDWncJGpRlN60F1N2ExLzq', 'ac', NULL, 0, '\"Hola. Soy un nuevo usuario de I Solve It. Espero que podamos ayudarnos mutuamente!', 500, 0),
(36, 'acd', 'Nuevo usuario', '$2y$10$kPFtQfNUWwSGqbi/DEqcFuBJiqgxIXKvKA9NmwKiljbzsZNHWaU9S', 'acd', NULL, 0, '\"Hola. Soy un nuevo usuario de I Solve It. Espero que podamos ayudarnos mutuamente!', 500, 0),
(37, 'acds', 'Nuevo usuario', '$2y$10$fUHnQl3NQipQMCrl3S6AW.tWnb1kUpZMxAdA4TqqDkEkbFsdi7CqK', 'acds', NULL, 0, '\"Hola. Soy un nuevo usuario de I Solve It. Espero que podamos ayudarnos mutuamente!', 500, 0),
(38, 'acdsa', 'Nuevo usuario', '$2y$10$2IHl7F94FXmtEsIbLcRwYed9DohL34V/ZldhM3kxKUXNQ87yCHhdW', 'acdsa', NULL, 0, '\"Hola. Soy un nuevo usuario de I Solve It. Espero que podamos ayudarnos mutuamente!', 500, 0),
(39, 'acdsaa', 'Nuevo usuario', '$2y$10$L06bBtWTepol3MmcQqWNFeKfoBXw0dSMp8H.luzO/yRtwM9a/IxH6', 'acdsaa', NULL, 0, '\"Hola. Soy un nuevo usuario de I Solve It. Espero que podamos ayudarnos mutuamente!', 500, 0),
(40, 'acdsaaa', 'Nuevo usuario', '$2y$10$YQcwf8sd/1sS0HzkWkA2zulqa42Z3Baw5VhsQmfNd5oMCtCogS99W', 'acdsaaa', NULL, 0, '\"Hola. Soy un nuevo usuario de I Solve It. Espero que podamos ayudarnos mutuamente!', 500, 0),
(41, 'aq', 'Nuevo usuario', '$2y$10$asNfCmQmy3NguKey2Wt/Yee0xyYjLSsodciqWJgQ4hhPNbGgGXcPm', 'aq', NULL, 0, '\"Hola. Soy un nuevo usuario de I Solve It. Espero que podamos ayudarnos mutuamente!', 500, 0),
(42, 'aqa', 'Nuevo usuario', '$2y$10$5vHv66CzTGxTt1hHhlmm7usWlej9IlftQcvliX2nuaeBvBkGUHFZO', 'aqa', NULL, 0, '\"Hola. Soy un nuevo usuario de I Solve It. Espero que podamos ayudarnos mutuamente!', 500, 0),
(43, 'aqaa', 'Nuevo usuario', '$2y$10$QTvEZuXMV2mtmMouC6XEQ.PZJVr/zsz9uGH0m4hRNfiYtLF8Zj.7i', 'aqaa', NULL, 0, '\"Hola. Soy un nuevo usuario de I Solve It. Espero que podamos ayudarnos mutuamente!', 500, 0),
(44, 'aqaaa', 'Nuevo usuario', '$2y$10$mZqu1oRjKYW63epbiP675.SHiwFjyNS8bs9nsauSvLgkgMZAFs2Mq', 'aqaaa', NULL, 0, '\"Hola. Soy un nuevo usuario de I Solve It. Espero que podamos ayudarnos mutuamente!', 500, 0);

--
-- Índices para tablas volcadas
--

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_us` (`id_us`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_us`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `concurso`
--
ALTER TABLE `concurso`
  MODIFY `id_concurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `consulta`
--
ALTER TABLE `consulta`
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tag_cons`
--
ALTER TABLE `tag_cons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tag_usuario`
--
ALTER TABLE `tag_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_us` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `usuario` FOREIGN KEY (`id_us`) REFERENCES `usuario` (`id_us`);

--
-- Filtros para la tabla `tag_usuario`
--
ALTER TABLE `tag_usuario`
  ADD CONSTRAINT `tag_usuario_ibfk_1` FOREIGN KEY (`id_us`) REFERENCES `usuario` (`id_us`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
