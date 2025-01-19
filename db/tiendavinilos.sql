-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-01-2025 a las 20:02:19
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tiendavinilos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artistas`
--

CREATE TABLE `artistas` (
  `id` int(11) NOT NULL,
  `artista` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `artistas`
--

INSERT INTO `artistas` (`id`, `artista`) VALUES
(1, 'Yoko Kanno & The Seatbelts'),
(2, 'Shiro Sagisu'),
(3, 'Joe Hisaishi'),
(4, 'Hiroyuki Sawano'),
(5, 'RADWIMPS'),
(6, 'Akira Senju'),
(7, 'Yoshihisa Hirano'),
(8, 'Hideki Taniuchi'),
(9, 'Toshio Masuda'),
(10, 'Yuki Kajiura'),
(11, 'Kohei Tanaka'),
(12, 'Go Shiina'),
(13, 'Yutaka Yamada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discogeneros`
--

CREATE TABLE `discogeneros` (
  `id_disco` int(11) NOT NULL,
  `id_genero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `discogeneros`
--

INSERT INTO `discogeneros` (`id_disco`, `id_genero`) VALUES
(16, 1),
(17, 8),
(18, 3),
(18, 5),
(19, 3),
(19, 9),
(20, 3),
(20, 4),
(21, 7),
(21, 9),
(22, 3),
(23, 3),
(23, 11),
(24, 8),
(25, 5),
(26, 3),
(26, 4),
(27, 3),
(27, 6),
(28, 10),
(29, 3),
(29, 5),
(30, 6),
(30, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discos`
--

CREATE TABLE `discos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `precio` double NOT NULL,
  `artista` int(11) NOT NULL,
  `portada` varchar(500) NOT NULL,
  `fecha` varchar(200) NOT NULL,
  `publicacion` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `discos`
--

INSERT INTO `discos` (`id`, `nombre`, `descripcion`, `precio`, `artista`, `portada`, `fecha`, `publicacion`) VALUES
(16, 'Cowboy Bebop: Original Soundtrack', 'Una icónica mezcla de jazz y blues que captura el espíritu del espacio y la aventura.', 19.99, 1, '../vinilos/portadas/cowboy-bebop.jpg ', '1998-05-21', 1),
(17, 'Neon Genesis Evangelion: Original Soundtrack', 'Melodías dramáticas y tensas que reflejan la profundidad psicológica de la serie.', 21.99, 2, '../vinilos/portadas/neon-evangelion.jpg', '1995-12-04', 1),
(18, 'Princess Mononoke: Soundtrack', 'Música majestuosa y melancólica que celebra la lucha entre la naturaleza y los humanos.', 18.99, 3, '../vinilos/portadas/princesa-mononoke.jpg', '1997-07-02', 1),
(19, 'Spirited Away: Soundtrack', 'Piezas mágicas que acompañan el viaje de Chihiro en un mundo espiritual.', 20.99, 3, '', '2001-07-20', 1),
(20, 'Attack on Titan: Original Soundtrack', 'Música épica e intensa que eleva las batallas contra los titanes.', 22.99, 4, '../vinilos/portadas/ataque-de-titanes.jpg', '2013-04-01', 1),
(21, 'Your Name (Kimi no Na wa): Soundtrack', 'Canciones suaves y emocionales que reflejan el tono de la película.', 19.99, 5, '../vinilos/portadas/your-name.jpg', '2016-08-26', 1),
(22, 'My Neighbor Totoro: Soundtrack', 'Música alegre y nostálgica que celebra la infancia y la magia.', 17.99, 3, '../vinilos/portadas/mi-vecino-totoro.jpg', '1988-04-16', 1),
(23, 'Fullmetal Alchemist: Brotherhood Original Soundtrack', 'Temas emocionales y épicos que acompañan las aventuras de los hermanos Elric.', 23.99, 6, '../vinilos/portadas/fullmeta-alchemist.jpg', '2009-04-05', 1),
(24, 'Death Note: Original Soundtrack', 'Música oscura y misteriosa que complementa la narrativa psicológica del anime.', 21.99, 7, '../vinilos/portadas/death-note.jpg', '2006-10-04', 1),
(25, 'Naruto: Original Soundtrack', 'Canciones dinámicas que combinan lo moderno y lo tradicional japonés.', 18.99, 9, '../vinilos/portadas/naruto.jpg', '2002-10-03', 1),
(26, 'Bleach: Original Soundtrack', 'Melodías llenas de acción y emoción para un anime lleno de batallas épicas.', 20.99, 2, '../vinilos/portadas/blech.jpg', '2004-10-05', 1),
(27, 'Sword Art Online: Original Soundtrack', 'Música inmersiva que transporta al mundo virtual del anime.', 22.99, 10, '../vinilos/portadas/sao.jpg', '2012-07-08', 1),
(28, 'One Piece: Original Soundtrack', 'Melodías aventureras que reflejan las travesías de los piratas.', 19.99, 11, '../vinilos/portadas/one-piece.jpg', '1999-10-20', 1),
(29, 'Demon Slayer: Kimetsu no Yaiba Soundtrack', 'Una mezcla épica de música tradicional japonesa y orquestal.', 24.99, 10, '../vinilos/portadas/kimetsu-no-yaiba.jpg', '2019-04-06', 1),
(30, 'Tokyo Ghoul: Original Soundtrack', 'Música atmosférica que captura la oscuridad y el conflicto interno del protagonista.', 21.99, 13, '../vinilos/portadas/Tokyo-Ghoul.jpg', '2014-07-03', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `id` int(11) NOT NULL,
  `genero` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`id`, `genero`) VALUES
(1, 'Jazz'),
(2, 'Blues'),
(3, 'Música clásica'),
(4, 'Coros épicos'),
(5, 'Orquestal'),
(6, 'Música tradicional japonesa'),
(7, 'Música orquestal'),
(8, 'Ambiente'),
(9, 'Rock sinfónico'),
(10, 'Pop japonés'),
(11, 'Infantil'),
(12, 'Drama'),
(13, 'Coros góticos'),
(14, 'Instrumental'),
(15, 'Aventura'),
(16, 'Música tradicional'),
(17, 'Música ambiental'),
(18, 'Electrónica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'Admin'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `correo` varchar(300) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `pass` varchar(500) NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `correo`, `nombre`, `pass`, `rol`) VALUES
(6, '', 'Admin', 'admin', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `artistas`
--
ALTER TABLE `artistas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `discogeneros`
--
ALTER TABLE `discogeneros`
  ADD PRIMARY KEY (`id_disco`,`id_genero`),
  ADD KEY `fk_generos` (`id_genero`);

--
-- Indices de la tabla `discos`
--
ALTER TABLE `discos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_artistas` (`artista`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `artistas`
--
ALTER TABLE `artistas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `discos`
--
ALTER TABLE `discos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `discogeneros`
--
ALTER TABLE `discogeneros`
  ADD CONSTRAINT `fk_discos` FOREIGN KEY (`id_disco`) REFERENCES `discos` (`id`),
  ADD CONSTRAINT `fk_generos` FOREIGN KEY (`id_genero`) REFERENCES `generos` (`id`);

--
-- Filtros para la tabla `discos`
--
ALTER TABLE `discos`
  ADD CONSTRAINT `fk_artistas` FOREIGN KEY (`artista`) REFERENCES `artistas` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
