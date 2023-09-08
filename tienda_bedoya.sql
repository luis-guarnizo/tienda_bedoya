-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-09-2023 a las 21:12:49
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_bedoya`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bedoya_compra_temporal`
--

CREATE TABLE `bedoya_compra_temporal` (
  `Id_compra` int(11) NOT NULL,
  `Usuario` varchar(100) NOT NULL,
  `Id_producto` int(11) NOT NULL,
  `Descripcion` varchar(256) DEFAULT NULL,
  `Cantidad` int(11) NOT NULL,
  `Precio` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bedoya_preguntas_frecuentes`
--

CREATE TABLE `bedoya_preguntas_frecuentes` (
  `Id_pregunta` int(11) NOT NULL,
  `Pregunta` varchar(256) DEFAULT NULL,
  `Respuesta` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bedoya_productos_calzado`
--

CREATE TABLE `bedoya_productos_calzado` (
  `Id_producto` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Imagen` varchar(50) DEFAULT NULL,
  `Descripcion` varchar(256) DEFAULT NULL,
  `Cantidad` int(11) NOT NULL,
  `Precio` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bedoya_productos_calzado`
--

INSERT INTO `bedoya_productos_calzado` (`Id_producto`, `Nombre`, `Imagen`, `Descripcion`, `Cantidad`, `Precio`) VALUES
(2, 'Zapatos Serios', '1694181024.jpg', 'zapatos para ocasiones especiales', 5, '200000.00'),
(3, 'Zapatos azules', '1694181057.jpg', 'zapatos azules informal', 8, '150000.00'),
(4, 'Zapatos rojos', '1694181088.jpg', 'Zapatos rojos para enamorar', 78, '300000.00'),
(5, 'Zapatos de baile', '1694181129.jpg', 'zapatos para bailar salsa', 20, '150000.00'),
(6, 'Zapatos de Entreno', '1694181163.jpg', 'zapatos para entrenar', 12, '500000.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bedoya_productos_deportiva`
--

CREATE TABLE `bedoya_productos_deportiva` (
  `Id_producto` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Imagen` varchar(50) DEFAULT NULL,
  `Descripcion` varchar(256) DEFAULT NULL,
  `Cantidad` int(11) NOT NULL,
  `Precio` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bedoya_productos_deportiva`
--

INSERT INTO `bedoya_productos_deportiva` (`Id_producto`, `Nombre`, `Imagen`, `Descripcion`, `Cantidad`, `Precio`) VALUES
(1, 'Sudadera', '1694182644.jpg', 'sudadera para correr', 10, '100000.00'),
(2, 'Camiseta', '1694182655.jpg', 'camiseta para entreno', 50, '50000.00'),
(3, 'Medias', '1694182663.jpg', 'Medias', 300, '10000.00'),
(4, 'Pantaloneta Larga', '1694182673.jpg', 'Pantaloneta larga para entreno', 28, '150000.00'),
(5, 'Gafas de sol', '1694182683.jpg', 'gafas de sol para correr', 10, '60000.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bedoya_productos_hombre`
--

CREATE TABLE `bedoya_productos_hombre` (
  `Id_producto` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Imagen` varchar(50) DEFAULT NULL,
  `Descripcion` varchar(256) DEFAULT NULL,
  `Cantidad` int(11) NOT NULL,
  `Precio` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bedoya_productos_hombre`
--

INSERT INTO `bedoya_productos_hombre` (`Id_producto`, `Nombre`, `Imagen`, `Descripcion`, `Cantidad`, `Precio`) VALUES
(1, 'pantalon', '1694180476.jpg', 'pantalon de hombre', 3, '100000.00'),
(2, 'billereta', '1694180506.jpg', 'billeteras para hombre', 10, '80000.00'),
(3, 'camisetas', '1694180538.jpg', 'camisetas para hombre', 21, '50000.00'),
(4, 'Pantaloneta', '1694180576.jpg', 'Pantalonetas para hombre', 20, '30000.00'),
(5, 'Chaqueta', '1694180610.jpg', 'Chaqueta para hombre', 18, '200000.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bedoya_productos_infantil`
--

CREATE TABLE `bedoya_productos_infantil` (
  `Id_producto` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Imagen` varchar(50) DEFAULT NULL,
  `Descripcion` varchar(256) DEFAULT NULL,
  `Cantidad` int(11) NOT NULL,
  `Precio` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bedoya_productos_infantil`
--

INSERT INTO `bedoya_productos_infantil` (`Id_producto`, `Nombre`, `Imagen`, `Descripcion`, `Cantidad`, `Precio`) VALUES
(1, 'Policía', '1694179660.jpg', 'disfraz de policía niño', 5, '200000.00'),
(2, 'Astronauta', '1694179673.jpg', 'disfraz de astronauta', 7, '200000.00'),
(3, 'Soldado', '1694179683.jpg', 'Disfraz de soldado', 8, '150000.00'),
(4, 'Saco', '1694179693.jpg', 'Saco para el frio', 10, '80000.00'),
(5, 'Mago', '1694179704.jpg', 'Disfraz de mago', 5, '120000.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bedoya_productos_mujer`
--

CREATE TABLE `bedoya_productos_mujer` (
  `Id_producto` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Imagen` varchar(50) DEFAULT NULL,
  `Descripcion` varchar(256) DEFAULT NULL,
  `Cantidad` int(11) NOT NULL,
  `Precio` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bedoya_productos_mujer`
--

INSERT INTO `bedoya_productos_mujer` (`Id_producto`, `Nombre`, `Imagen`, `Descripcion`, `Cantidad`, `Precio`) VALUES
(4, 'Blusa', '1694129607.jpg', 'blusa', 5, '30000.00'),
(5, 'pantalon', '1694152293.jpg', 'pantalon cafe', 5, '40000.00'),
(6, 'Blusa', '1694154317.jpg', 'blusa', 5, '40000.00'),
(7, 'pantalon', '1694157501.jpg', 'pantalon cafe', 5, '40000.00'),
(8, 'pantalon', '1694157512.jpg', 'pantalon cafe', 5, '40000.00'),
(9, 'pantalon', '1694157537.jpg', 'pantalon cafe', 5, '40000.00'),
(10, 'Blusa', '1694157707.jpg', 'blusa', 5, '30000.00'),
(11, '[value-2]', '1694157739.jpg', '[value-4]', 0, '0.00'),
(12, '[value-2]', '1694157941.jpg', '[value-4]', 0, '0.00'),
(13, '[value-2]', '1694158125.jpg', '[value-4]', 0, '0.00'),
(14, '[value-2]', '1694158286.jpg', '[value-4]', 0, '0.00'),
(15, 'Blusa', '1694158306.jpg', 'blusa', 5, '30000.00'),
(16, 'camisa', '1694159750.jpg', 'camisa', 7, '12000.00'),
(17, 'camisa', '1694159768.jpg', 'camisa', 7, '12000.00'),
(18, '[value-2]', '1694159957.jpg', '[value-4]', 0, '0.00'),
(19, 'Blusa', '1694159978.jpg', 'blusa', 5, '30000.00'),
(20, 'pantalon', '1694160424.jpg', 'pantalon cafe', 5, '40000.00'),
(21, 'nuevo', '1694160516.jpg', '[value-4]', 0, '0.00'),
(22, 'Blusa', '1694160612.jpg', 'blusa', 5, '30000.00'),
(23, 'nuevo', '1694161180.jpg', '[value-4]', 4, '0.00'),
(24, 'nuevo', '1694161256.jpg', '[value-4]', 0, '0.00'),
(25, 'Blusa', '1694161406.jpg', 'blusa', 5, '30000.00'),
(26, 'Blusa', '1694161684.jpg', 'blusa', 5, '30000.00'),
(27, 'wwww', '1694162481.jpg', 'www', 22, '333.00'),
(28, 'uu', '1694162726.jpg', 'uuuu', 8, '8.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bedoya_usuarios`
--

CREATE TABLE `bedoya_usuarios` (
  `Id_usuario` int(11) NOT NULL,
  `Usuario` varchar(100) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Direccion` varchar(70) DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `Tipo_usuario` varchar(100) NOT NULL,
  `Password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bedoya_usuarios`
--

INSERT INTO `bedoya_usuarios` (`Id_usuario`, `Usuario`, `Nombre`, `Direccion`, `Telefono`, `Tipo_usuario`, `Password`) VALUES
(4, 'bedoya', 'bedoya', '3232323', '2222', 'Admin', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855'),
(6, 'Juan', 'Juan', 'calle 39', '123312312', 'Admin', '1234'),
(7, 'luis.bedoya', 'luis', 'calle 24', '312332', 'Admin', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4'),
(8, 'carlos', 'carlos', '122', '121311', 'Cliente', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4'),
(9, 'juan.bedoya', 'juan', 'Calle 39', '312792882', 'Admin', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bedoya_compra_temporal`
--
ALTER TABLE `bedoya_compra_temporal`
  ADD PRIMARY KEY (`Id_compra`),
  ADD KEY `fk_compra_producto_idx` (`Id_producto`);

--
-- Indices de la tabla `bedoya_preguntas_frecuentes`
--
ALTER TABLE `bedoya_preguntas_frecuentes`
  ADD PRIMARY KEY (`Id_pregunta`);

--
-- Indices de la tabla `bedoya_productos_calzado`
--
ALTER TABLE `bedoya_productos_calzado`
  ADD PRIMARY KEY (`Id_producto`);

--
-- Indices de la tabla `bedoya_productos_deportiva`
--
ALTER TABLE `bedoya_productos_deportiva`
  ADD PRIMARY KEY (`Id_producto`);

--
-- Indices de la tabla `bedoya_productos_hombre`
--
ALTER TABLE `bedoya_productos_hombre`
  ADD PRIMARY KEY (`Id_producto`);

--
-- Indices de la tabla `bedoya_productos_infantil`
--
ALTER TABLE `bedoya_productos_infantil`
  ADD PRIMARY KEY (`Id_producto`);

--
-- Indices de la tabla `bedoya_productos_mujer`
--
ALTER TABLE `bedoya_productos_mujer`
  ADD PRIMARY KEY (`Id_producto`);

--
-- Indices de la tabla `bedoya_usuarios`
--
ALTER TABLE `bedoya_usuarios`
  ADD PRIMARY KEY (`Id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bedoya_compra_temporal`
--
ALTER TABLE `bedoya_compra_temporal`
  MODIFY `Id_compra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bedoya_preguntas_frecuentes`
--
ALTER TABLE `bedoya_preguntas_frecuentes`
  MODIFY `Id_pregunta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bedoya_productos_calzado`
--
ALTER TABLE `bedoya_productos_calzado`
  MODIFY `Id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `bedoya_productos_deportiva`
--
ALTER TABLE `bedoya_productos_deportiva`
  MODIFY `Id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `bedoya_productos_hombre`
--
ALTER TABLE `bedoya_productos_hombre`
  MODIFY `Id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `bedoya_productos_infantil`
--
ALTER TABLE `bedoya_productos_infantil`
  MODIFY `Id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `bedoya_productos_mujer`
--
ALTER TABLE `bedoya_productos_mujer`
  MODIFY `Id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `bedoya_usuarios`
--
ALTER TABLE `bedoya_usuarios`
  MODIFY `Id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
