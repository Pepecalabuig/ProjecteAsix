-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-02-2022 a las 06:36:12
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agenda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `nombre_apellidos` varchar(100) DEFAULT NULL,
  `telefono` int(9) NOT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `imagen` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`nombre_apellidos`, `telefono`, `correo`, `imagen`) VALUES
('abigail fuertes ri', 412587954, 'abi@abi.es', 'imgs/xica1.png'),
('david suarez bustinza', 612458794, 'david@david.es', ''),
('coral pedron navarro', 631254897, 'coral@coral.xat', ''),
('vicent tonino morino', 633148723, 'vicent@vicent.es', ''),
('marien calabuig cerda', 644241261, 'marien@marien.com', ''),
('paco martinez soria', 647842123, 'paco@paco.es', ''),
('paula parra moreno', 691235471, 'paula@paula.com', ''),
('alberto gimenez', 694254125, 'al@gmail.com', 'imgs/xic4.png'),
('david calabuig moreno', 697413251, 'david@david.es', 'imgs/xic2.png'),
('carolina munera', 697413524, 'carolo@gmail.com', 'imgs/xica4.png'),
('xavier carral medina', 725145789, 'xavi@xavi.com', ''),
('silvia cerda', 847564123, 'silvia@silvia.com', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `pass` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `pass`) VALUES
(3, 'pepe', '$2y$10'),
(11, 'pepe4', '$2y$10'),
(13, 'pepeno', '$2y$10');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`telefono`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_usuario` (`id_usuario`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
