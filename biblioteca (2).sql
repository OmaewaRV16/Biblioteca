-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-10-2024 a las 02:40:17
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
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `id_autor` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `nacionalidad` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`id_autor`, `nombre`, `nacionalidad`) VALUES
(7, 'Baldor', 'Cuba'),
(8, 'Henry Petroski', 'Estadounidense'),
(11, 'P. Aarne Vesilind', 'Finlandés'),
(12, 'Yunus A. Çengel', 'Turco '),
(13, 'Panneerselvam R.', 'Indio'),
(14, 'J. L. Meriam & L. G. Kraige', 'Estadounidense'),
(15, 'John Enderle & Joseph Bronzino', 'Estadounidense'),
(16, 'Douglas Natelson', 'Canadiense'),
(17, 'Wladston Ferreira Filho', 'Brasileño'),
(18, 'Godfrey Boyle', 'Britanico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `id_carreras` int(11) NOT NULL,
  `nombre_carrera` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id_carreras`, `nombre_carrera`) VALUES
(4, 'Ingeniería Mecánica'),
(5, 'Ingeniería Quimica'),
(9, 'Ingeniería en Sistemas'),
(12, 'Ingeniería en Energía'),
(13, 'Ingeniería en Biotecnología'),
(14, 'Ingeniería Industrial'),
(15, 'Ingeniería Civil'),
(16, 'Ingeniería en Robótica y Sistemas Digitales'),
(17, 'Ingeniería en Gestión Empresarial'),
(18, 'Ingeniería Física Industrial'),
(19, 'Licenciatura en Administración en Empresas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id_libro` int(3) NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `autor` int(5) DEFAULT NULL,
  `anio` int(5) DEFAULT NULL,
  `editorial` varchar(100) DEFAULT NULL,
  `carrera` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id_libro`, `titulo`, `autor`, `anio`, `editorial`, `carrera`) VALUES
(10, 'Algebra I', 7, 1997, 'Algebra, jerarquías y más', 4),
(12, 'The Design of Everyday Things', 8, 2013, 'Basic Books', 9),
(13, 'Introduction to Environmental Engineering', 11, 2010, 'Cengage', 18),
(14, 'Thermodynamics: An Engineering Approach', 12, 2018, 'McGraw-Hill', 4),
(15, 'Industrial Engineering and Management', 13, 2015, 'PHI Learning', 14),
(16, 'Engineering Mechanics: Dynamics', 14, 2015, 'Wiley', 4),
(17, 'Introduction to Biomedical Engineering', 15, 2012, 'Academic Press', 13),
(18, 'Nanostructures and Nanotechnology', 16, 2015, 'Cambridge University', 16),
(19, 'Computer Science Distilled', 17, 2017, 'Code Energy', 9),
(20, 'Renewable Energy: Power for a Sustainable Future', 18, 2012, 'Oxford University', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombres`, `apellidos`, `email`, `contrasena`, `fecha_nacimiento`) VALUES
(1, 'José Omar', 'Romero Verde', 'jose16.jorv@gmail.com', '$2y$10$WaUQ6.GAfoxBtM8MjVkNV.kb.52N60dLp6uvr.FjbNStuiCERxFyS', '2001-04-01'),
(2, 'Joaquin', 'Martinez', 'mar@gmail.com', '123', '2024-09-11'),
(3, 'Uriel', 'Antuna', 'joselo12@gmail.com', 'hbiioopn', '2024-09-13'),
(4, 'Felipe', 'Rosado', 'nata_elmasduro@gmail.com', '$2y$10$QKZ8jFiTYHf6sVqOdtIZ9OWSF45FBVzecazCwrM7Pf.aTDN4zLFV2', '2024-09-03'),
(5, 'juan', 'Santos', 'njsjsjsjs4@anajjs.com', '$2y$10$DW6zvIHLUSi.NB60wryyF.iVJrEN6pEKw7bFu/L2jK9rsdKYhPwNe', '2024-09-13'),
(6, 'ariel', 'camacho', 'camacho.lv@gmail.com', '$2y$10$Esn60G1TRpasL65SGmXqWOTAMV2Njb0XnarHS4KCqT26d1R4SO7KK', '2024-09-13'),
(7, 'jorgito', 'tec', 'jorde@gmail.com', '$2y$10$JUUUh7NOZ8wBFfuO4740Z.hqQEn7nFu1OzlMCOlFJ3fVtuU0mAgRW', '2024-09-13');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`id_autor`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id_carreras`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id_libro`),
  ADD KEY `autor` (`autor`) USING BTREE,
  ADD KEY `carrera` (`carrera`) USING BTREE;

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id_carreras` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id_libro` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libro_autores` FOREIGN KEY (`autor`) REFERENCES `autores` (`id_autor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `libro_carreras` FOREIGN KEY (`carrera`) REFERENCES `carreras` (`id_carreras`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
