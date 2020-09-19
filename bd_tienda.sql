-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-09-2020 a las 02:07:32
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
(3, 'asdasdsdfasasd'),
(4, 'cocacola'),
(5, 'zcxzxcz'),
(6, 'dasdasdasd'),
(7, 'culo'),
(8, 'google'),
(10, 'Gorras'),
(13, 'reboot2 '),
(14, 'hola'),
(15, 'chimo chakaro');

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
(3, 'moises', 'rodriguez', '26920602', 'calle 5 entre carreras 7 y 8 ', '0414-4151608', 'panchi@gmail.com', '2020-08-03 22:33:50'),
(4, 'divianaasdasdasdasdass121212', 'febresasdasdasdasdasdsdasd', '20908489', 'trinidad', '04128701580', 'divifebres@gmail.com', '0000-00-00 00:00:00'),
(5, 'maria', 'medina', '8421826', 'maria@gmail.com', '04128701580', 'mariamalalo@gmail.com', '2020-08-03 22:35:03'),
(7, 'mia ', 'khalifa', '58990016', 'khalifa calabozo', '02468718194', 'khalifa@gmail.com', '2020-08-06 03:08:10'),
(8, 'locoa', 'locass', '1411651651465', 'san fernandosdasdasdasda', '4184156416541', 'unamsdasd@gmail.com', '2020-08-06 03:08:18'),
(9, 'Maria', 'Paiva', '27602546', 'lazo marti', '04245313627', 'unamedos@hotmail.com', '2020-09-12 00:09:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `venta_id` int(11) NOT NULL,
  `precio` varchar(11) NOT NULL,
  `cantidad` varchar(11) NOT NULL,
  `total` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`id`, `producto_id`, `venta_id`, `precio`, `cantidad`, `total`) VALUES
(1, 9, 1, '100', '2', '2'),
(2, 20, 1, '10', '1', '4'),
(3, 1, 2, '1000', '1', '2'),
(4, 19, 2, '200', '5', '3'),
(5, 20, 3, '10', '1', '4'),
(6, 21, 3, '20000', '2', '6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(20) NOT NULL,
  `fk_categoria` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio_unitario` varchar(100) NOT NULL,
  `cantidad` varchar(100) NOT NULL,
  `precio_venta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `fk_categoria`, `nombre`, `precio_unitario`, `cantidad`, `precio_venta`) VALUES
(1, 1, 'Nike total 90 2020', '1000', '17', ''),
(4, 6, 'BBB', '60', '4', ''),
(9, 13, 'predator', '100', '18', '110'),
(13, 7, 'toto', '80', '32', ''),
(14, 7, 'pipi', '556', '10', ''),
(15, 4, 'hitatarasadasdsdasdasdasd', '1001', '242', ''),
(16, 8, 'smart', '100', '35', ''),
(18, 7, 'nalgas', '200', '89', ''),
(19, 7, 'nalgas', '200', '5', ''),
(20, 4, 'cola', '10', '4', ''),
(21, 3, 'nalgaswqe', '20000', '96', '220'),
(29, 4, 'naranja', '200', '100', '16000'),
(30, 4, 'naranja', '100', '10', '15151'),
(31, 15, 'chakaro pequeño', '160000', '12', '220000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_comprobante`
--

CREATE TABLE `tipo_comprobante` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `cantidad` int(20) NOT NULL,
  `iva` varchar(20) NOT NULL,
  `serie` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_comprobante`
--

INSERT INTO `tipo_comprobante` (`id`, `nombre`, `cantidad`, `iva`, `serie`) VALUES
(1, 'Factura', 3, '16', '1'),
(2, 'Nota de entrega', 0, '0', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `subtotal` varchar(20) NOT NULL,
  `iva` varchar(20) NOT NULL,
  `total` varchar(20) NOT NULL,
  `tipo_comprobante_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `num_control` varchar(20) NOT NULL,
  `serie` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `fecha`, `subtotal`, `iva`, `total`, `tipo_comprobante_id`, `cliente_id`, `num_control`, `serie`) VALUES
(1, '2020-09-13 03:09:42', '210', '33.6', '243.6', 1, 3, '000001', '1'),
(2, '2020-09-13 03:09:20', '2000', '320', '2320', 1, 5, '000002', '1'),
(3, '2020-09-13 03:09:51', '40010', '6401.6', '46411.6', 1, 7, '000003', '1');

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
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_id` (`producto_id`),
  ADD KEY `venta_id` (`venta_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categoria` (`fk_categoria`);

--
-- Indices de la tabla `tipo_comprobante`
--
ALTER TABLE `tipo_comprobante`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`),
  ADD KEY `tipo_comprobante_id` (`tipo_comprobante_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `tipo_comprobante`
--
ALTER TABLE `tipo_comprobante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`venta_id`) REFERENCES `ventas` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `rela_produc_categ` FOREIGN KEY (`fk_categoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`tipo_comprobante_id`) REFERENCES `tipo_comprobante` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
