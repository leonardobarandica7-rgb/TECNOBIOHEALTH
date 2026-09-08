-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-03-2025 a las 15:36:39
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tecnobiohealt`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `imagen`) VALUES
(3, 'portatil asus', 'portatil asus', 2000000.00, 0x75706c6f6164732f64657363617267612e706e67),
(4, 'cpu dell', 'cpu dell core i7-13th gen', 2700000.00, 0x75706c6f6164732f373034302d312e6a7067),
(5, 'todo en uno lenovo', 'todo en uno lenovo', 1500000.00, 0x75706c6f6164732f6c656e6f766f5f663062633030313275735f32335f6964656163656e7472655f3330305f323361636c5f616c6c5f696e5f6f6e655f313231393736312e6a7067);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(9) NOT NULL,
  `nombre_user` varchar(25) DEFAULT NULL,
  `contrasena_user` varchar(25) DEFAULT NULL,
  `correo_user` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `nombre_user`, `contrasena_user`, `correo_user`) VALUES
(1, 'kevin', 'ke1034', 'kevin@prueba.com'),
(2, 'claduia', 'Cl5272', 'claudia@prueba.com'),
(3, 'juan carlos', 'juan1234', 'juan.prueba@gmail.com'),
(4, 'cesar', 'cesar1234', 'cesar@prueba.com'),
(5, 'hugo', 'HUGO1234', 'HUGO@PRUEBA.COM'),
(6, 'santiago', 'santiago1234', 'santiago@PRUEBA.COM'),
(10, 'patricia', 'patricia1234', 'patricia@prueba.com'),
(13, 'esteban', 'esteban123', 'esteban@prueba.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
