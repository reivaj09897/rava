-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-03-2020 a las 05:24:51
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_t23m05`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mc_ajustes`
--

CREATE TABLE `mc_ajustes` (
  `musica` int(1) NOT NULL,
  `sonido` int(1) NOT NULL,
  `id_alumno` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mc_consigna`
--

CREATE TABLE `mc_consigna` (
  `id_preg` int(4) NOT NULL,
  `id_examen` int(4) NOT NULL,
  `consigna` varchar(100) NOT NULL,
  `rtaok` varchar(30) NOT NULL,
  `rta2` varchar(30) NOT NULL,
  `rta3` varchar(30) NOT NULL,
  `rta4` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mc_examen`
--

CREATE TABLE `mc_examen` (
  `id_examen` int(4) NOT NULL,
  `id_materia` int(4) NOT NULL,
  `id_profesor` int(4) NOT NULL,
  `nom_examen` varchar(30) NOT NULL,
  `curso` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mc_materia`
--

CREATE TABLE `mc_materia` (
  `id_materia` int(4) NOT NULL,
  `nom_materia` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mc_puntuacion`
--

CREATE TABLE `mc_puntuacion` (
  `id_alumno` int(4) NOT NULL,
  `id_examen` int(4) NOT NULL,
  `puntaje` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mc_registro_respuesta`
--

CREATE TABLE `mc_registro_respuesta` (
  `id_alumno` int(4) NOT NULL,
  `id_preg` int(4) NOT NULL,
  `rta_elegida` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `u_alumno`
--

CREATE TABLE `u_alumno` (
  `id_alumno` int(4) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `contraseña` varchar(30) NOT NULL,
  `num_favorito` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `u_alumno`
--

INSERT INTO `u_alumno` (`id_alumno`, `usuario`, `contraseña`, `num_favorito`) VALUES
(3, 'matias', '1234', 1234);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `u_profesor`
--

CREATE TABLE `u_profesor` (
  `id_profesor` int(4) NOT NULL,
  `nom_usuario` varchar(30) NOT NULL,
  `contraseña` varchar(30) NOT NULL,
  `num_favorito` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `u_profesor`
--

INSERT INTO `u_profesor` (`id_profesor`, `nom_usuario`, `contraseña`, `num_favorito`) VALUES
(1, 'profesor', '1234', 1234);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mc_ajustes`
--
ALTER TABLE `mc_ajustes`
  ADD KEY `mc_ajustes-idalumno` (`id_alumno`);

--
-- Indices de la tabla `mc_consigna`
--
ALTER TABLE `mc_consigna`
  ADD PRIMARY KEY (`id_preg`),
  ADD KEY `mc_consigna-idexamen` (`id_examen`);

--
-- Indices de la tabla `mc_examen`
--
ALTER TABLE `mc_examen`
  ADD PRIMARY KEY (`id_examen`),
  ADD KEY `mc_examen-idprofesor` (`id_profesor`),
  ADD KEY `mc_examen-idmateria` (`id_materia`);

--
-- Indices de la tabla `mc_materia`
--
ALTER TABLE `mc_materia`
  ADD PRIMARY KEY (`id_materia`),
  ADD UNIQUE KEY `nom_materia` (`nom_materia`);

--
-- Indices de la tabla `mc_puntuacion`
--
ALTER TABLE `mc_puntuacion`
  ADD KEY `mc_puntuacion-idalumno` (`id_alumno`),
  ADD KEY `mc_puntuacion-idexamen` (`id_examen`);

--
-- Indices de la tabla `mc_registro_respuesta`
--
ALTER TABLE `mc_registro_respuesta`
  ADD KEY `mc_registrorespuesta-idalumno` (`id_alumno`),
  ADD KEY `mc_registrorespuesta-idpreg` (`id_preg`);

--
-- Indices de la tabla `u_alumno`
--
ALTER TABLE `u_alumno`
  ADD PRIMARY KEY (`id_alumno`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `usuario_2` (`usuario`);

--
-- Indices de la tabla `u_profesor`
--
ALTER TABLE `u_profesor`
  ADD PRIMARY KEY (`id_profesor`),
  ADD UNIQUE KEY `nom_usuario` (`nom_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mc_consigna`
--
ALTER TABLE `mc_consigna`
  MODIFY `id_preg` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `mc_examen`
--
ALTER TABLE `mc_examen`
  MODIFY `id_examen` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `mc_materia`
--
ALTER TABLE `mc_materia`
  MODIFY `id_materia` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `u_alumno`
--
ALTER TABLE `u_alumno`
  MODIFY `id_alumno` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `u_profesor`
--
ALTER TABLE `u_profesor`
  MODIFY `id_profesor` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `mc_ajustes`
--
ALTER TABLE `mc_ajustes`
  ADD CONSTRAINT `mc_ajustes-idalumno` FOREIGN KEY (`id_alumno`) REFERENCES `u_alumno` (`id_alumno`);

--
-- Filtros para la tabla `mc_consigna`
--
ALTER TABLE `mc_consigna`
  ADD CONSTRAINT `mc_consigna-idexamen` FOREIGN KEY (`id_examen`) REFERENCES `mc_examen` (`id_examen`);

--
-- Filtros para la tabla `mc_examen`
--
ALTER TABLE `mc_examen`
  ADD CONSTRAINT `mc_examen-idmateria` FOREIGN KEY (`id_materia`) REFERENCES `mc_materia` (`id_materia`),
  ADD CONSTRAINT `mc_examen-idprofesor` FOREIGN KEY (`id_profesor`) REFERENCES `u_profesor` (`id_profesor`);

--
-- Filtros para la tabla `mc_puntuacion`
--
ALTER TABLE `mc_puntuacion`
  ADD CONSTRAINT `mc_puntuacion-idalumno` FOREIGN KEY (`id_alumno`) REFERENCES `u_alumno` (`id_alumno`),
  ADD CONSTRAINT `mc_puntuacion-idexamen` FOREIGN KEY (`id_examen`) REFERENCES `mc_examen` (`id_examen`);

--
-- Filtros para la tabla `mc_registro_respuesta`
--
ALTER TABLE `mc_registro_respuesta`
  ADD CONSTRAINT `mc_registrorespuesta-idalumno` FOREIGN KEY (`id_alumno`) REFERENCES `u_alumno` (`id_alumno`),
  ADD CONSTRAINT `mc_registrorespuesta-idpreg` FOREIGN KEY (`id_preg`) REFERENCES `mc_consigna` (`id_preg`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
