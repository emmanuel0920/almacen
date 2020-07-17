-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-07-2020 a las 22:41:56
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `almacen`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id` int(11) NOT NULL,
  `id_producto` int(15) NOT NULL,
  `cantidad` int(15) NOT NULL,
  `fecha` datetime NOT NULL,
  `tipo_movimiento` tinyint(4) NOT NULL COMMENT '0 entrada; 1 salida'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `area` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id`, `nombre`, `area`, `status`) VALUES
(1, 'Briseno Cruz Martha Cecilia', '', 1),
(2, 'Castillo Sanchez Maria Maribel', '', 1),
(3, 'Cruz Cruz Matilde', '', 1),
(4, 'De La Cruz Montanez Maricela', '', 1),
(5, 'Delgado Resendiz Leticia', '', 1),
(6, 'Flores Flores Anita', '', 1),
(7, 'Flores Flores Ma Del Socorro', '', 1),
(8, 'Gaytán Ramírez Carmen', '', 1),
(9, 'Gonzalez Diaz Leticia', '', 1),
(10, 'Jaime De Luna Cristina', '', 1),
(11, 'Lira Rodriguez Maria Estela', '', 1),
(12, 'Lomeli Sanchez Ma Del Rosario', '', 1),
(13, 'Mendez Trejo Ernestina', '', 1),
(14, 'Palapa Ramirez Alicia', '', 1),
(15, 'Placido Delgado Maria Del Rosario', '', 1),
(16, 'Ramos Delgado Laura', '', 1),
(17, 'Reyes Cruz Abigail', '', 1),
(18, 'Rodriguez Sanchez Blanca Maria', '', 1),
(19, 'Rodriguez Suarez Maria Refugio', '', 1),
(20, 'Rosales Sánchez Bertha', '', 1),
(21, 'Rosalez Acosta San Juana', '', 1),
(22, 'Sanchez Munoz Maria Eustolia', '', 1),
(23, 'Santiago Garcia Librada', '', 1),
(24, 'Soto Puga Maria Concepcion', '', 1),
(25, 'Suarez Maldonado Sanjuana Gpe', '', 1),
(26, 'Tapia Rojas Erika Vanessa', '', 1),
(27, 'Torres Padilla Manuela Del Rocio', '', 1),
(28, 'Torres Torres Maria Guadalupe', '', 1),
(29, 'X Martinez Maria De La Asuncion', '', 1),
(30, 'X Torres Ma Del Refugio', '', 1),
(31, 'jose maneul', 'todo el mundo', 1),
(32, 'jose manuel', 'todo el mundo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `unidad` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `unidad`, `status`) VALUES
(1, 'Cloro', 'Cloro', 'LTS', 1),
(2, 'Jabon', 'Jabon', 'KG', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `usuario` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `id_tipo_usuario` int(11) NOT NULL,
  `status` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `usuario`, `password`, `id_tipo_usuario`, `status`) VALUES
(1, 'SUPER ADMIN', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
