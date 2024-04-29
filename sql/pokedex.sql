-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-09-2023 a las 21:30:22
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pokedex`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pokemones`
--

CREATE TABLE `pokemones` (
                             `id` int(11) NOT NULL,
                             `numero_identificador` int(11) NOT NULL,
                             `nombre` varchar(255) NOT NULL,
                             `imagen` varchar(255) NOT NULL,
                             `tipo_1` varchar(255) NOT NULL,
                             `tipo_2` varchar(255) NOT NULL,
                             `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pokemones`
--

INSERT INTO `pokemones` (`id`, `numero_identificador`, `nombre`, `imagen`, `tipo_1`, `tipo_2`, `descripcion`) VALUES
                                                                                                                  (1, 1, 'bulbasur', '', 'planta', 'veneno', 'Es un Pokémon de tipo planta/veneno introducido en la primera generación. Es uno de los Pokémon iniciales que pueden elegir los entrenadores que empiezan su aventura en la región de Kanto, junto a Charmander y Squirtle, en las ediciones Pokémon Rojo, Pokémon Verde y Pokémon Azul y Pokémon Rojo Fuego y Pokémon Verde Hoja. Se destaca por ser el primer Pokémon de la Pokédex Nacional.'),
                                                                                                                  (2, 2, 'Ivysaur', '', 'Planta', 'Veneno', 'Ivysaur es un Pokémon de tipo planta/veneno introducido en la primera generación. Es la evolución de Bulbasaur, uno de los Pokémon iniciales de Kanto.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
                           `Id` int(10) NOT NULL,
                           `nombre` varchar(50) NOT NULL,
                           `contrasena` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id`, `nombre`, `contrasena`) VALUES
                                                         (1, 'test', '1'),
                                                         (2, 'tomycernik', 'river123'),
                                                         (3, 'juanito', 'clave123'),
                                                         (4, 'ana28', 'password32'),
                                                         (5, 'carlos_89', 'contraseñaSecreta10'),
                                                         (6, 'maria', 'abc456'),
                                                         (7, 'pedrito12', 'miClaveSegura22'),
                                                         (8, 'laura', 'laura123'),
                                                         (9, 'pepe24', '12345pepe'),
                                                         (10, 'ana_maria', 'am7890'),
                                                         (11, 'juan_carlos', 'jc_5678'),
                                                         (12, 'andrea', 'an123'),
                                                         (13, 'felipe', 'felipePass'),
                                                         (14, 'lucas', 'lucas_987'),
                                                         (15, 'carla', 'carlita23!'),
                                                         (16, 'juanita', 'juani2000'),
                                                         (17, 'diego', 'diegoPass123'),
                                                         (18, 'sofia', 'sofia1234'),
                                                         (19, 'pablo', 'pablo_456'),
                                                         (20, 'ana_123', 'ana12345'),
                                                         (21, 'mariana', 'mari_789'),
                                                         (22, 'test2', '2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pokemones`
--
ALTER TABLE `pokemones`
    ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
    ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pokemones`
--
ALTER TABLE `pokemones`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
    MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;