-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-04-2020 a las 17:28:12
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `eventosph`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `idEventos` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `direccion` varchar(240) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `descripcion` varchar(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idP` int(11) NOT NULL,
  `frase` varchar(240) NOT NULL,
  `nombreP` varchar(240) NOT NULL,
  `imagenP` varchar(500) NOT NULL,
  `descripcionP` varchar(240) NOT NULL,
  `tipoP` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idP`, `frase`, `nombreP`, `imagenP`, `descripcionP`, `tipoP`) VALUES
(1, 'La mejor de la region', 'Carnitas', 'assets\\img\\prouctos\\ 222.jpg', 'El quilo de carnitas a solo 40 pesos', 0),
(2, 'kdaÃ±Ã±', 'okdoa', 'assets\\img\\prouctos\\ 1nwo0voe2zb11.jpg', 'lkdka', 1),
(3, 'adl,sl', 'lÃ±dsl', 'assets\\img\\prouctos\\ 4c51b3ebf202d3b00f548961fd31080b37710c5c.jpg', 'l', 0),
(4, 'Hola 2', 'hola', 'assets\\img\\prouctos\\ 1adda06d72ef201271d9f47f75abf19b.jpg', 'hola', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuarios` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `celular` bigint(13) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `contrasena` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuarios`, `nombres`, `apellidos`, `celular`, `correo`, `contrasena`) VALUES
(1, 'Antonio Pepe', 'Espinosa', 3344362352, 'hola@hotmail.com', 'Motoral12345'),
(2, 'maria', 'salazar', 3435555, 'hola2@hotmail.com', 'Motoral12345'),
(3, 'Salvador', 'MillÃ¡n Aguilar', 4531404063, 'salvadormillan17@gmail.com', 'Salvador123'),
(4, 'Salvador', 'MillÃ¡n Aguilar', 4531408979, 'salvadormillan17@hotmail.com', 'Salvador1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`idEventos`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idP`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `idEventos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
