-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-10-2021 a las 03:26:28
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
  `fecha_subida` date NOT NULL DEFAULT current_timestamp(),
  `fecha_limite` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `consulta`
--

INSERT INTO `consulta` (`id_consulta`, `id_us`, `titulo`, `descripcion`, `recompensa`, `fecha_subida`, `fecha_limite`) VALUES
(1, 1, 'titulo juan', 'descripcion descripcion descripcion descripcion descripcion descripcion descripcion descripcion descripcion descripcion descripcion descripcion descripcion descripcion descripcion descripcion ', 400, '2021-10-01', '2021-10-15'),
(2, 1, 'otro titulo', 'adukvfudyvwapoadukvfudyvwapoadukvfudyvwapoadukvfudyvwapoadukvfudyvwapoadukvfudyvwapoadukvfudyvwapoadukvfudyvwapoadukvfudyvwapoadukvfudyvwapoadukvfud', 23, '2021-10-07', '2021-10-16'),
(14, 5, 'a', 'a', 0, '2021-10-11', '0000-00-00'),
(15, 5, 'a', 'a', 0, '2021-10-11', '2021-10-29'),
(16, 5, 'e', 'e', 33, '2021-10-11', '2021-10-05'),
(17, 5, 'tituloxd', 'tituloxdtituloxd', 23333300, '2021-10-11', '2021-12-02');

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
  `descripcion` varchar(256) DEFAULT NULL,
  `tokens` int(11) NOT NULL DEFAULT 500
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_us`, `username`, `pass`, `mail`, `estrellas`, `empleo`, `descripcion`, `tokens`) VALUES
(1, 'juan', '$2y$10$dnQ.59sOrhHhvTaHyWk2POmwsVzepmKhW6krZtaAnNnOt6J5hYQgO', 'juan', NULL, 0, NULL, 500),
(2, 'rrrrrar', '$2y$10$SKQHaFK1gww/5qAHlMNKUekt4nS2Z7Z/cPXeZElRv1/LgtYSeN/pO', 'rrrrrrrrrra', NULL, 0, NULL, 500),
(3, 'yyyy', '$2y$10$qweOLinLa3/EuMnDcj0G/.MhoTWKarNsVF0ywgqXoPlTIrbiRfwZ.', 'yyyy', NULL, 0, NULL, 500),
(4, 'aaaaaaaaaaa', '$2y$10$ql/GV4YHX/5NGUY8GMbuCu5KzCCN9Nf/QgBDnnxOzU/IiM8AKT8Nu', 'aaaaaaaaaaa', NULL, 0, NULL, 500),
(5, 'dddd', '$2y$10$VnA/soHoWpOjBvOCjk9VPe4wpyN4dGTlPQMxQGfXcc3qNTIMzXy/u', 'ddddddd', NULL, 0, NULL, 500);

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
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_us` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
