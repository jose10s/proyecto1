-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-05-2022 a las 19:09:52
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tiendafisio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `codped` int(11) NOT NULL,
  `codusuario` int(11) NOT NULL,
  `codpro` int(11) NOT NULL,
  `fecped` datetime NOT NULL,
  `estado` int(11) NOT NULL,
  `dirusuarioped` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `telusuarioped` varchar(12) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`codped`, `codusuario`, `codpro`, `fecped`, `estado`, `dirusuarioped`, `telusuarioped`) VALUES
(54, 1, 1, '2022-05-21 13:53:02', 1, 'a', 'a'),
(55, 1, 3, '2022-05-22 18:34:16', 1, 'a', 'a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `codpro` int(11) NOT NULL,
  `nompro` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `despro` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `prepro` decimal(6,2) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `rutinapro` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`codpro`, `nompro`, `despro`, `prepro`, `estado`, `rutinapro`) VALUES
(1, 'Kinesiotape', 'Pack de vendaje neuromuscular que incluye 4 rollos de 5cm x 5m en diferentes colores.', '9.99', 1, 'kinesiotape.jpg'),
(2, 'Esterilla', 'Esterilla MAT PILATES azul', '19.99', 1, 'esterilla.jpg'),
(3, 'Bosu', 'Semi esfera o media pelota para entrenar el equilibrio.', '59.99', 1, 'bosu.jpg'),
(4, 'Cold/Hot pack', 'Bolsa reutilizable con gel no tóxico que proporciona frío para disminuir la inflamación y el dolor o calor para relajar la musculatura.', '14.99', 1, 'pack.jpg'),
(5, 'Mancuernas 2 kg', 'Mancuernas Vinilo 2 x 2kg Rojas.', '12.99', 1, 'mancuerna2.jpg'),
(6, 'Mancuernas 1 kg', 'Mancuernas Vinilo 2 x 1kg Verdes.', '9.99', 1, 'mancuerna1.jpg'),
(7, 'Kettlebell 4 kg', 'Pesa Rusa de 4kg de plástico para uso en interiores y exteriores.', '12.99', 1, 'kettlebell4.jpg'),
(8, 'Kettlebell 8 kg', 'Pesa Rusa de 8kg de plástico para uso en interiores y exteriores.', '19.99', 1, 'kettlebell8.jpg'),
(9, 'Banda de resistencia', 'Bandas de Ejercicios diseñadas para fortalecer los músculos y aumentar la flexibilidad.', '9.99', 1, 'band.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `codusuario` int(11) NOT NULL,
  `nomusuario` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apeusuario` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `emausuario` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `passusuario` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`codusuario`, `nomusuario`, `apeusuario`, `emausuario`, `passusuario`, `estado`) VALUES
(1, 'Jose', 'Diez', 'jadiezsanz@hotmail.com', '111222', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`codped`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`codpro`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `codped` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `codpro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `codusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
