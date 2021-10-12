-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-10-2021 a las 13:30:57
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

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
  `fecha_limite` date NOT NULL,
  `tag` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `consulta`
--

INSERT INTO `consulta` (`id_consulta`, `id_us`, `titulo`, `descripcion`, `recompensa`, `fecha_subida`, `fecha_limite`, `tag`) VALUES
(1, 2, 'Tituloxd', 'descripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripcion', 600, '2021-10-12 00:00:00', '2021-10-06', ''),
(2, 1, 'Tituloxd', 'descripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripciondescripcion', 600, '2021-10-29 00:00:00', '2021-10-31', ''),
(4, 6, '', '', 0, '2021-10-12 00:00:00', '0000-00-00', ''),
(6, 6, 'dawdawd', 'wadawdawdawdawd', 3424, '2021-10-12 08:24:48', '2021-10-27', 'dasfghgfdaddwefrgthk');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_us` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `estrellas` int(2) DEFAULT NULL,
  `empleo` tinyint(1) NOT NULL,
  `descripcion` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_us`, `username`, `pass`, `mail`, `estrellas`, `empleo`, `descripcion`) VALUES
(1, 'fesf', '$2y$10$GofLEAsZgDuMFhkUL3eeDuXZ/0R/W3MDRo1Em1l/ogHMqTxiBCIoO', 'fsef', NULL, 0, NULL),
(2, 'juan', '$2y$10$Rt/IF.whnxzlIJJGDA2PwOngOr1xcTKjpCHUV5n8pitqXEUYsqmkC', 'juan', NULL, 0, NULL),
(3, 'a', '$2y$10$6I24vgfGmHlS/skTouT3wufqiKhhZWHZ2CSIEIFZFoeFou7QQdk4W', 'a', NULL, 0, NULL),
(4, 'v', '$2y$10$RN9ctk2WA/3sSjRr2/k11Okger3nQj.N.nmiQ5ZW8meRsjr0CxVBa', 'v', NULL, 0, NULL),
(5, 'fe', '$2y$10$1Xsneoh3d44cKbTNdW05p.hFnnPfXvQ8nH8dBdq5HobS4GBmeabuu', 'fe', NULL, 0, NULL),
(6, 'juanperez', '$2y$10$lqlvr4bfxwvE9xhpl1XMKuDoiQqcCDRnuV79yeQgxjCX/k9bcwmvy', 'juanperez', NULL, 0, NULL);

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
  MODIFY `id_concurso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `consulta`
--
ALTER TABLE `consulta`
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_us` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
