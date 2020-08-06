-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-08-2020 a las 21:57:49
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(20) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'nike'),
(3, 'asdasdsdf'),
(4, 'asdasdasdasxasdasdasdasdasdasdasdas'),
(5, 'zcxzxcz'),
(6, 'dasdasdasd'),
(7, 'culo'),
(8, 'google'),
(10, 'Gorras'),
(13, 'reboot2 ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `cedula` varchar(100) NOT NULL,
  `direccion` text NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellido`, `cedula`, `direccion`, `telefono`, `correo`, `fecha_registro`) VALUES
(1, 'josesdasdasdasda', 'rodriguezssdasdas', '19600767', 'calle 5 entre carreras 7 y 8 ', '0414-3454333', 'unamedos@gmail.com', '2020-08-03 21:16:57'),
(2, 'oswuell', 'colmenarez', '20920602', 'ciudadela', '04148701620', 'laflak@gmail.com', '2020-08-03 21:18:32'),
(3, 'moises', 'rodriguez', '26920602', 'calle 5 entre carreras 7 y 8 ', '0414-4151608', 'panchi@gmail.com', '2020-08-03 22:33:50'),
(4, 'divianaasdasdasdasdass121212', 'febresasdasdasdasdasdsdasd', '20908489', 'trinidad', '04128701580', 'divifebres@gmail.com', '0000-00-00 00:00:00'),
(5, 'maria', 'medina', '8421826', 'maria@gmail.com', '04128701580', 'mariamalalo@gmail.com', '2020-08-03 22:35:03'),
(6, 'pepa', 'paula', '15812210', 'vereda 200', '04125704580', 'pepa@gmail.com', '2020-08-03 22:35:32'),
(7, 'mia ', 'khalifa', '58990016', 'khalifa calabozo', '02468718194', 'khalifa@gmail.com', '2020-08-06 03:08:10'),
(8, 'locoa', 'locass', '1411651651465', 'san fernandosdasdasdasda', '4184156416541', 'unamsdasd@gmail.com', '2020-08-06 03:08:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(20) NOT NULL,
  `fk_categoria` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio_unitario` varchar(100) NOT NULL,
  `cantidad` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `fk_categoria`, `nombre`, `precio_unitario`, `cantidad`) VALUES
(1, 1, 'Nike total 90 2020', '1000', '20'),
(4, 6, 'BBB', '60', '4'),
(9, 13, 'predator', '100', '12'),
(12, 7, 'nalgas', '1000', '30'),
(13, 7, 'toto', '80', '32'),
(14, 7, 'pipi', '56', '10');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categoria` (`fk_categoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `rela_produc_categ` FOREIGN KEY (`fk_categoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
