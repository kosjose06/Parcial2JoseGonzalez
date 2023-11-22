-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2023 a las 22:55:15
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `futbolamericano_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `equipo_id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `ano_fundacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`equipo_id`, `nombre`, `estado`, `ano_fundacion`) VALUES
(1, 'Dolphins', 'Miami', 1965),
(2, 'Falcons', 'Atlanta ', 1965),
(3, ' Ravens', 'Baltimore', 1996),
(4, 'Bills', 'Buffalo', 1960),
(5, 'Panters', 'Carolina', 1993),
(6, 'Patriots', 'New England', 1959),
(7, 'Chiefs ', 'Kansas City', 1959),
(8, ' Steelers', 'Pittsburgh', 1933),
(9, 'Packers', 'Green Bay', 1919),
(10, ' 49ers', 'San Francisco', 1946);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

CREATE TABLE `jugadores` (
  `jugador_id` int(11) NOT NULL,
  `equipo_id` int(11) DEFAULT NULL,
  `nombre` varchar(50) NOT NULL,
  `numero` int(11) DEFAULT NULL,
  `posicion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `jugadores` (`jugador_id`, `equipo_id`, `nombre`, `numero`, `posicion`) VALUES
(4, 1, 'Tua Tagovailoa', 1, 'Mariscal de Campo'),
(5, 1, 'Tyreek Hill', 10, 'Receptor abierto'),
(6, 1, 'De’Von Achane ', 28, 'Corredor'),
(7, 1, 'Braxton Berrios ', 0, 'Receptor abierto'),
(8, 1, 'Raheem Mostert', 35, 'Corredor'),
(9, 1, 'Tyler Kroft', 48, 'ala Cerrada'),
(10, 1, 'Zeke Vandeburgh', 57, 'ala Cerrada'),
(11, 1, 'Connor Williams', 58, 'Guardia'),
(12, 1, 'Cristian wilkins', 94, 'Tackle defensivo'),
(13, 1, 'Brandon Pili', 96, 'Tackle defensivo'),
(14, 1, 'Erik Ezukanma', 18, 'Receptor abierto'),
(15, 2, 'Desmond Ridder', 9, 'Mariscal de Campo'),
(16, 2, 'Bijan Robinson ', 7, 'Corredor'),
(18, 2, 'Taylor Heinicke ', 4, 'Mariscal de campo'),
(19, 2, 'Drake London ', 5, 'Receptor abierto'),
(20, 2, 'David Byrd', 14, 'Receptor Abierto'),
(21, 2, 'Van Jefferson Jr.', 15, 'Receptor Abierto'),
(22, 2, 'Scott Miller ', 16, 'Receptor Abierto'),
(23, 2, 'Penny Hart ', 19, 'Receptor Abierto'),
(24, 2, 'Keith Smith ', 40, 'Corredor'),
(25, 2, 'Justin Shaffer', 54, 'Tackle ofensivo'),
(26, 2, 'Matt Hennessy ', 61, 'Centro'),
(27, 3, 'Tyler Huntley', 2, 'Mariscal de Campo'),
(28, 3, 'Odell Beckham Jr.', 3, 'Receptor Abiero'),
(29, 3, 'Flores Zay', 4, 'Receptor Abierto'),
(30, 3, 'Lamar Jackson ', 8, 'Mariscal de Campo'),
(31, 3, 'David Duvernay ', 13, 'Receptor Abierto '),
(32, 3, 'Nelson Agholor', 15, 'Receptor Abierto'),
(33, 3, 'Tylan Wallace', 16, 'Receptor Abierto'),
(34, 3, 'JK Dobinns', 27, 'Corredor'),
(35, 3, 'Keaton Mitchell ', 34, 'Corredor '),
(36, 3, 'Gus Edwards', 35, 'Corredor'),
(37, 4, 'Josh Allen  ', 17, 'Mariscal de Campo '),
(38, 4, 'James Cook ', 4, 'Corredor'),
(39, 4, 'Matt Barkley ', 5, 'Mariscal de Campo '),
(40, 4, 'Damián Harris', 22, 'Corredor'),
(41, 4, 'Ty Johnson', 26, 'Corredor'),
(42, 4, 'Deonte Harty', 11, 'Receptor Abierto'),
(44, 4, 'Reggie Gilliam', 41, 'Ala cerrada'),
(46, 4, 'mitch morse', 60, 'Guardia'),
(47, 4, 'Connor McGovern', 66, 'Guardia'),
(48, 1, 'Tommy Doyle', 72, 'Tackle Ofensivo'),
(49, 4, 'Dalton Kincaid', 86, 'Ala cerrada'),
(50, 4, 'Zach Davidson', 84, 'Ala cerrada'),
(51, 5, 'Bryce Young', 9, 'Mariscal de Campo'),
(52, 5, 'Miles Sanders', 6, 'Corredor'),
(53, 5, 'Ihmir Smith-Marsette', 11, 'Receptor Abierto'),
(54, 5, 'Andy Dalton', 14, 'Mariscal de Campo'),
(55, 5, 'DJ Chark Jr.', 17, 'Receptor Abierto'),
(56, 5, 'Adam Thielen', 19, 'Receptor Abierto'),
(57, 5, 'Chuba Hubbard', 30, 'Corredor'),
(58, 5, 'Camerun Peoples', 32, 'Corredor'),
(59, 5, 'Austin Corbett', 63, 'Guardia'),
(60, 5, 'Giovanni Ricci', 45, 'Ala cerrada'),
(61, 5, 'Bradley Bozeman', 56, 'Centro'),
(62, 5, 'Brady Christensen', 70, 'Tackle Ofensivo'),
(63, 5, 'Taylor Moton', 72, 'Tackle Ofensivo'),
(64, 6, 'De Vante Parker', 1, 'Receptor Abierto'),
(65, 6, 'Mac Jones', 10, 'Mariscal del Campo '),
(66, 6, 'Jalen Hurd ', 13, 'Receptor Abierto'),
(67, 6, 'Ezequiel Elliott', 15, 'Corredor'),
(68, 6, 'Malik Cunningham ', 16, 'Mariscal del '),
(69, 6, 'Mateo Slater', 18, 'Receptor abierto'),
(70, 6, 'Jake Andrews', 53, 'Centro'),
(71, 6, 'Kayshon Boutte', 58, 'Receptor Abierto'),
(72, 6, 'Mike Onwenu', 71, 'Guardia'),
(73, 6, 'Riley Reif', 74, 'Tackle Ofensivo'),
(74, 7, 'Jerick McKinnon', 1, 'Corredor'),
(75, 7, 'Justin Ross', 8, 'Receptor Abierto'),
(76, 7, 'Blaine Gabbert', 9, 'Mariscal de Campo'),
(77, 7, 'Isiah Pacheco', 10, 'Corredor'),
(78, 7, 'James Richie', 17, 'Receptor Abierto'),
(79, 7, 'Patricio Mahomes', 15, 'Mariscal de Campo'),
(80, 7, 'Skyy Moore', 24, 'Receptor Abierto'),
(81, 7, 'James Winchester', 41, 'Ala cerrada'),
(82, 7, 'Joe Thuney ', 62, 'Guardia'),
(83, 7, 'Nick Allegretti', 73, 'Guardia'),
(84, 8, 'Mason Rudolph ', 2, 'Mariscal de Campo'),
(85, 8, 'Kenny Pickett', 8, 'Mariscal de Campo'),
(86, 8, 'Allen Robinson II ', 11, 'Receptor Abierto'),
(87, 8, 'George Pickens ', 14, 'Receptor Abierto'),
(88, 8, 'Miles Boykin', 13, 'Receptor Abierto'),
(89, 8, 'Diontae Jhonson', 18, 'Receptor abierto'),
(90, 8, 'Najee Harris ', 22, 'Corredor'),
(91, 8, 'Jaylen Warren ', 30, 'Corredor'),
(92, 8, 'Dylan Cook', 60, 'Tackle Ofensivo'),
(93, 8, 'Dan Moore Jr.', 66, 'Tackle Ofensivo'),
(94, 9, 'Sean Clifford', 8, 'Mariscal de Campo'),
(95, 9, 'Cristian Watson', 9, 'Receptor Abierto'),
(96, 9, 'Jayden Reed', 11, 'Receptor Abierto'),
(97, 9, 'Malik Health', 18, 'Receptor Abierto'),
(98, 9, 'Danny Etling ', 19, 'Mariscal de Campo'),
(99, 9, 'AJ Dillon', 28, 'Corredor'),
(100, 9, 'Aarón Jones ', 33, 'Corredor'),
(101, 9, 'Tyler Goodson', 39, 'Corredor '),
(102, 9, 'Jose Myers', 71, 'Centro'),
(103, 9, 'Sean Rhyan', 75, 'Guardia'),
(104, 10, 'Isaias Winstead ', 2, 'Receptor Abierto'),
(105, 10, 'Brandon Allen ', 4, 'Mariscal de Campo'),
(106, 10, 'Brayden Willis', 9, 'Ala cerrada'),
(107, 10, 'Ronnie Bell ', 10, 'Receptor Abierto'),
(108, 10, 'Brock Purdy', 13, 'Mariscal de Campo'),
(109, 10, 'Juan Jennings ', 15, 'Receptor Abierto'),
(110, 10, 'Samuel deebo', 19, 'Receptor Abierto'),
(111, 10, 'Jordan Mason', 24, 'Corredor'),
(112, 10, 'Eli Mitchell ', 25, 'Corredor'),
(113, 10, 'Jason Poe', 51, 'Tackle Ofensivo'),
(114, 10, 'Jon Feliciano ', 55, 'Guardia'),
(115, 10, 'Jake brendel ', 64, 'Centro'),
(116, 10, 'Jaylon Moore', 76, 'Tackle Ofensivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidos`
--

CREATE TABLE `partidos` (
  `partido_id` int(11) NOT NULL,
  `equipo_id` int(11) DEFAULT NULL,
  `partidos_jugados` int(11) DEFAULT NULL,
  `victorias` int(11) DEFAULT NULL,
  `derrotas` int(11) DEFAULT NULL,
  `empates` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `partidos`
--

INSERT INTO `partidos` (`partido_id`, `equipo_id`, `partidos_jugados`, `victorias`, `derrotas`, `empates`) VALUES
(1, 1, 10, 10, 0, 0),
(2, 2, 10, 6, 4, 0),
(3, 3, 10, 7, 3, 0),
(4, 4, 10, 5, 5, 0),
(5, 5, 10, 1, 8, 0),
(6, 6, 10, 2, 8, 0),
(7, 7, 10, 7, 2, 0),
(8, 8, 10, 6, 4, 0),
(9, 9, 10, 4, 6, 0),
(10, 10, 10, 7, 3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(11) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `contrasena` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `nombre_usuario`, `contrasena`) VALUES
(1, 'enrique', '$2y$10$vnyX.xmVo0LaEPDd2GubO.vxUBBCnuZVm1/4qZ/GnrRG/3qOJOhvy'),
(6, 'jose', '$2y$10$tqUULx308KhmeRWMl9o8aeqVfc7jZJ5KZ1vZrX80RVAsn7U0F7WTy');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`equipo_id`);

--
-- Indices de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`jugador_id`),
  ADD KEY `equipo_id` (`equipo_id`);

--
-- Indices de la tabla `partidos`
--
ALTER TABLE `partidos`
  ADD PRIMARY KEY (`partido_id`),
  ADD KEY `equipo_id` (`equipo_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `equipo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `jugador_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT de la tabla `partidos`
--
ALTER TABLE `partidos`
  MODIFY `partido_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD CONSTRAINT `jugadores_ibfk_1` FOREIGN KEY (`equipo_id`) REFERENCES `equipos` (`equipo_id`);

--
-- Filtros para la tabla `partidos`
--
ALTER TABLE `partidos`
  ADD CONSTRAINT `partidos_ibfk_1` FOREIGN KEY (`equipo_id`) REFERENCES `equipos` (`equipo_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
