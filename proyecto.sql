-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2021 a las 11:09:11
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
(21, 15, 28),
(25, 17, 32);

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
(100, 11, 27),
(102, 12, 28),
(109, 16, 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE `consulta` (
  `id_consulta` int(11) NOT NULL,
  `id_us` int(11) NOT NULL,
  `titulo` varchar(40) NOT NULL,
  `descripcion` varchar(280) NOT NULL,
  `recompensa` float NOT NULL,
  `fecha_subida` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_limite` datetime NOT NULL,
  `archivo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `consulta`
--

INSERT INTO `consulta` (`id_consulta`, `id_us`, `titulo`, `descripcion`, `recompensa`, `fecha_subida`, `fecha_limite`, `archivo`) VALUES
(11, 26, 'La filosofia de socrates', 'Tengo que realizar un informe sobre los principales postulados del filosofo', 300, '2021-10-31 19:42:49', '2021-11-10 20:00:00', '../archivos/La filosofia de Socrates.pdf'),
(12, 26, 'Polinomios de segundo grado', 'Necesito ayuda con este trabajo para el colegio. No entiendo el tema', 100, '2021-10-31 19:48:06', '2021-11-05 19:45:00', '../archivos/Trabajo sobre polinomios.pdf'),
(13, 27, 'economia en tiempos de Jesus', 'Elaborar un informe sobre las diferencias sociales rondando el año 0 d.c.', 400, '2021-10-31 19:53:02', '2021-11-06 19:51:00', '../archivos/Economia en tiempos de Jesus.pdf'),
(15, 27, 'Problema de DNS', 'Al intentar entrar en cuevana me aparece este error (adjunto imagen) en pantalla. Ayuda! quiero ver doctor milagro', 50, '2021-10-31 19:59:57', '2021-11-04 19:59:00', '../archivos/Fix-Server-DNS-address-could-not-be-found-error-in-Chrome.png'),
(16, 28, 'coreccion de hortografia', 'alluda nesesito que alguien haga una rebision a este trabajo', 225, '2021-10-31 20:08:21', '2021-11-25 20:06:00', '../archivos/El principito.pdf'),
(17, 30, 'Ayuda con programacion', 'Necesito una mano con este trabajo pracito. No pude prestar mucha atencion a la clase', 250, '2021-11-02 22:15:59', '2021-11-18 00:00:00', '../archivos/Act Nro 7- Ej. Final de Vectores y Funciones.docx');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entregado`
--

CREATE TABLE `entregado` (
  `id` int(11) NOT NULL,
  `id_cons` int(11) NOT NULL,
  `id_us` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `archivo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `entregado`
--

INSERT INTO `entregado` (`id`, `id_cons`, `id_us`, `descripcion`, `archivo`) VALUES
(44, 13, 26, 'Ahi está subido, mucha suerte!', '../archivos/La economia en tiempos de Jesus.pdf'),
(45, 17, 32, 'Aca está la resolucion. Espero que te sirva!', '../archivos/Resolucion.docx');

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
(11, 'programacion'),
(13, ' lengua'),
(14, 'Filosofia'),
(15, 'socrates'),
(16, 'polinomios'),
(17, 'gauss'),
(18, 'jesus'),
(19, 'economia'),
(20, 'google'),
(21, 'dns'),
(22, 'chrome'),
(23, 'funciones');

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
(14, 11, 14),
(15, 11, 15),
(16, 12, 1),
(17, 12, 16),
(18, 12, 17),
(19, 13, 7),
(20, 13, 18),
(21, 13, 19),
(22, 14, 3),
(23, 15, 20),
(24, 15, 21),
(25, 15, 22),
(26, 16, 2),
(27, 17, 11),
(28, 17, 23);

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
(45, 27, 1),
(46, 27, 14),
(48, 28, 1),
(49, 28, 7),
(50, 28, 21),
(51, 26, 2),
(52, 26, 13),
(53, 26, 21),
(54, 29, 1),
(55, 30, 1),
(57, 31, 1),
(58, 31, 11),
(60, 32, 1),
(61, 32, 11);

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
  `tokens` double NOT NULL DEFAULT 500,
  `imagen` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_us`, `username`, `nombre`, `pass`, `mail`, `estrellas`, `empleo`, `descripcion`, `tag`, `tokens`, `imagen`) VALUES
(26, 'juanperez', 'El Jaime 3296', '$2y$10$zSw3EkB/LM/fDLDTy1YWUeNFd9.iETnCTENLbPQIyPFRHpu.AGAyS', 'juanperez', NULL, 0, '\"Hola. Soy un nuevo usuario de I Solve It. Espero que podamos ayudarnos mutuamente!', 'matematica,historia,literatura', 500, 0),
(27, 'GonzaPuga', 'Gonzaa', '$2y$10$Qj/1UgyQxeRTmH5QjP28/u.CHaSB74qtTR/EvbW3Hc0QCSgnJYL46', 'GonzaPuga@hotmail.com', NULL, 0, '\"Hola. Soy un nuevo usuario de I Solve It. Espero que podamos ayudarnos mutuamente!', 'matematica,historia,literatura', 46, 0),
(28, 'Amonger', 'Nuevo usuario', '$2y$10$rkqkSkfbnVkkdjcMXYZdA.ukMs.lGhUDGOlULBDC/BbNB0vxNBDEi', 'amongus@impostor.com', NULL, 0, '\"Hola. Soy un nuevo usuario de I Solve It. Espero que podamos ayudarnos mutuamente!', 'matematica,historia,literatura', 275, 0),
(29, 'Consultor', 'El Consultor', '$2y$10$t9NFHWCVmoHlB5728.0eJ.KiOn8OIHNt0lBR9v3FKRixMGkQsMqka', 'Consultor@gmail.com', NULL, 0, '\"Hola. Soy un nuevo usuario de I Solve It. Espero que podamos ayudarnos mutuamente!', 'matematica,historia,literatura', 500, 0),
(30, 'RodriPregunta', 'Rodrigo Pascual', '$2y$10$gy38HpI4ykUrOL7Npsr9/.w8qQ8XmGw9Z51q..yyF/e5u2GYGfvqe', 'RodriPregunta@gmail.com', NULL, 0, '\"Hola. Soy un nuevo usuario de I Solve It. Espero que podamos ayudarnos mutuamente!', 'matematica,historia,literatura', 250, 0),
(31, 'PepeResponde', 'Pepe Escobar', '$2y$10$lMuGtuPJoA5WyNQIkP2pbOPqHz739LBLmvefDNqV3j8uJd29FcjMO', 'PepeResponde@gmail.com', NULL, 0, '\"Hola. Soy un nuevo usuario de I Solve It. Espero que podamos ayudarnos mutuamente!', 'matematica,historia,literatura', 500, 0),
(32, 'MarcoTulio', 'Marquiño Tulinho', '$2y$10$FnX7l0SYGLCDLhsbZtDTweReXeEbfT210VgQfF5XHDJhz0WHz9pd.', 'MarcoTulio@gmail.com', NULL, 0, '\"Hola. Soy un nuevo usuario de I Solve It. Espero que podamos ayudarnos mutuamente!', 'matematica,historia,literatura', 750, 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `concurso`
--
ALTER TABLE `concurso`
  MODIFY `id_concurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT de la tabla `consulta`
--
ALTER TABLE `consulta`
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `entregado`
--
ALTER TABLE `entregado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `tag_cons`
--
ALTER TABLE `tag_cons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `tag_usuario`
--
ALTER TABLE `tag_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_us` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
