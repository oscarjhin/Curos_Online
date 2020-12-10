-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 10-12-2020 a las 19:55:08
-- Versión del servidor: 5.7.17-log
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_cursos_online`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `id` int(11) NOT NULL,
  `sigla` varchar(20) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `paralelo` varchar(10) NOT NULL,
  `nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id`, `sigla`, `nombre`, `paralelo`, `nivel`) VALUES
(1, 'PROG101', 'PROGRAMACION I', 'A', 1),
(2, 'MAT101', 'CALCULO I', 'A', 1),
(3, 'ALG101', 'ALGEBRA I', 'A', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insc_curso`
--

CREATE TABLE `insc_curso` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `id_rol_u` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `insc_curso`
--

INSERT INTO `insc_curso` (`id`, `fecha`, `id_usuario`, `id_curso`, `id_rol_u`) VALUES
(1, '2020-12-09', 2, 2, 2),
(3, '2020-12-10', 2, 2, 2),
(4, '2020-12-10', 3, 2, 2),
(5, '2020-12-10', 8, 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE `respuesta` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `archivo_estudiante` varchar(200) DEFAULT NULL,
  `observacion` text,
  `calificacion` int(11) DEFAULT NULL,
  `id_tarea` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `respuesta`
--

INSERT INTO `respuesta` (`id`, `fecha`, `archivo_estudiante`, `observacion`, `calificacion`, `id_tarea`, `id_usuario`) VALUES
(1, '2020-12-12', 'estudiante/laboratorio 1 con proteus.pdf', 'ok', 0, 3, 8),
(2, '2020-12-12', 'estudiante/laboratorio 1 con proteus.pdf', 'ok', 0, 3, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_usuario`
--

CREATE TABLE `rol_usuario` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol_usuario`
--

INSERT INTO `rol_usuario` (`id`, `descripcion`) VALUES
(1, 'admin'),
(2, 'estudiante'),
(3, 'profesor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea`
--

CREATE TABLE `tarea` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `archivo_docente` varchar(200) DEFAULT NULL,
  `id_curso` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tarea`
--

INSERT INTO `tarea` (`id`, `fecha`, `titulo`, `archivo_docente`, `id_curso`, `id_usuario`) VALUES
(1, '2020-12-09', 'practica 1', 'profesor/rojo.jpg', 1, 2),
(3, '2020-12-10', 'practica 2', 'profesor/laboratorio 1 con proteus.pdf', 1, 2),
(4, '2020-12-10', 'practica 1', 'profesor/', 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `ap_paterno` varchar(100) DEFAULT NULL,
  `ap_materno` varchar(100) DEFAULT NULL,
  `nombre` varchar(200) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `id_rol_u` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `password`, `ap_paterno`, `ap_materno`, `nombre`, `correo`, `id_rol_u`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 'super', 'super', 'administrador', 'admin@gmail.com', 1),
(2, 'juan', '202cb962ac59075b964b07152d234b70', 'Perez', 'Quispe', 'Juan', 'juan@gmail.com', 3),
(3, 'pepe', '202cb962ac59075b964b07152d234b70', 'Mamani', 'Quispe', 'pepe', 'pepe@gmail.com', 2),
(8, 'lucas', '202cb962ac59075b964b07152d234b70', 'Flores', 'canaviri', 'Lucas', 'lucas@gmail.com', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `insc_curso`
--
ALTER TABLE `insc_curso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_curso` (`id_curso`),
  ADD KEY `id_rol_u` (`id_rol_u`);

--
-- Indices de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tarea` (`id_tarea`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `rol_usuario`
--
ALTER TABLE `rol_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_curso` (`id_curso`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rol_u` (`id_rol_u`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `insc_curso`
--
ALTER TABLE `insc_curso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `rol_usuario`
--
ALTER TABLE `rol_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tarea`
--
ALTER TABLE `tarea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `insc_curso`
--
ALTER TABLE `insc_curso`
  ADD CONSTRAINT `insc_curso_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `insc_curso_ibfk_2` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id`),
  ADD CONSTRAINT `insc_curso_ibfk_3` FOREIGN KEY (`id_rol_u`) REFERENCES `rol_usuario` (`id`);

--
-- Filtros para la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD CONSTRAINT `respuesta_ibfk_1` FOREIGN KEY (`id_tarea`) REFERENCES `tarea` (`id`),
  ADD CONSTRAINT `respuesta_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD CONSTRAINT `tarea_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id`),
  ADD CONSTRAINT `tarea_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol_u`) REFERENCES `rol_usuario` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
