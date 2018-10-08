-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-10-2018 a las 23:35:22
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.0.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `controlgestion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dependencias`
--

CREATE TABLE `dependencias` (
  `id_dependencias` int(11) NOT NULL,
  `dependencias` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dependencias`
--

INSERT INTO `dependencias` (`id_dependencias`, `dependencias`) VALUES
(1, 'Fiscalia General de Justicia del Estado de México');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destinatario`
--

CREATE TABLE `destinatario` (
  `id_destinatario` int(11) NOT NULL,
  `conase` int(11) NOT NULL,
  `valle_toluca` int(11) NOT NULL,
  `valle_mexico` int(11) NOT NULL,
  `zona_oriente` int(11) NOT NULL,
  `fiscal_general` int(11) NOT NULL,
  `vicefiscalia` int(11) NOT NULL,
  `oficialia_mayor` int(11) NOT NULL,
  `informacion_estadistica` int(11) NOT NULL,
  `central_juridico` int(11) NOT NULL,
  `servicio_carrera` int(11) NOT NULL,
  `otra` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `destinatario`
--

INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES
(1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiquetas_asunto`
--

CREATE TABLE `etiquetas_asunto` (
  `id_etAsunto` int(11) NOT NULL,
  `colaboracion` int(11) NOT NULL,
  `amparos` int(11) NOT NULL,
  `solicitudes` int(11) NOT NULL,
  `gestion` int(11) NOT NULL,
  `cursos_capacitaciones` int(11) NOT NULL,
  `juzgados` int(11) NOT NULL,
  `recursos_humanos` int(11) NOT NULL,
  `telefonia` int(11) NOT NULL,
  `estadistica` int(11) NOT NULL,
  `relaciones_interis` int(11) NOT NULL,
  `boletas_audiencia` int(11) NOT NULL,
  `copias_conocimiento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `etiquetas_asunto`
--

INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES
(1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informar`
--

CREATE TABLE `informar` (
  `id_informar` int(11) NOT NULL,
  `esta_oficina` int(11) NOT NULL,
  `peticionario` int(11) NOT NULL,
  `institucion_requiriente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `informar`
--

INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES
(1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oficio_entrada`
--

CREATE TABLE `oficio_entrada` (
  `id_oficioEntrada` int(11) NOT NULL,
  `no_oficioEntrada` varchar(100) NOT NULL,
  `firma_origen` varchar(200) NOT NULL,
  `peticion` varchar(250) NOT NULL,
  `arch_entrada` varchar(200) NOT NULL,
  `atencion` int(11) NOT NULL,
  `fecha_ent` date NOT NULL,
  `fecha_real` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `oficio_entrada`
--

INSERT INTO `oficio_entrada` (`id_oficioEntrada`, `no_oficioEntrada`, `firma_origen`, `peticion`, `arch_entrada`, `atencion`, `fecha_ent`, `fecha_real`) VALUES
(7, 'Co-!2', 'Jeronimo', 'historial', 'Chrysanthemum1.jpg', 3, '2018-05-23', '0000-00-00'),
(23, 'C0-134', 'Lic Gabrielasd', 'a', 'Tulips.jpg', 1, '2018-09-12', '2018-09-12'),
(24, 'c0342', 'Lic Gabriel', 'cfh', 'Penguins.jpg', 1, '2018-09-12', '2018-09-12'),
(25, 'C098', 'tuur', 'tyr', 'entrada.jpg', 1, '2018-09-12', '2018-09-12'),
(26, 'C0asd', 'ad', 'asd', 'Chrysanthemum.jpg', 1, '2018-09-12', '2018-09-12'),
(27, 'C0asd', 'ad', 'asd', 'Chrysanthemum1.jpg', 1, '2018-09-12', '2018-09-12'),
(28, 'Co09', 'asd', 'asd', 'Lighthouse.jpg', 1, '2018-09-10', '2018-09-11'),
(29, 'CO-1237', 'Lic Gabrielasd', 'ijioj', 'Acuerdo1.pdf', 1, '2018-09-20', '2018-09-20'),
(30, 'CO-12334', 'Fernanda', 'iuin', 'Acuerdo_general.pdf', 1, '2018-09-19', '2018-09-20'),
(31, '400LJA00/1322/2018', 'Dr. Guillermo E. Gonzalez Medina', 'Curso taller de ley general de Transparencia e Información Pública, se requieren 4 servidores publicos ', 'Acuerdo_de_inicio.pdf', 6, '2018-09-20', '2018-09-04'),
(32, 'C0-01784', 'Lic Gabriel', 'oijpj', 'Determinacion_de_archivo_temporal.pdf', 1, '2018-09-28', '2018-09-28'),
(49, 'C0-84', 'Fernanda', 'asfas', 'COTIZACION_2_OK.pdf', 1, '2018-10-01', '2018-10-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oficio_seguimiento`
--

CREATE TABLE `oficio_seguimiento` (
  `id_oficioseg` int(11) NOT NULL,
  `nomenclatura` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `id_etAsunto` int(11) NOT NULL,
  `termino` int(20) NOT NULL,
  `id_destinatario` int(11) NOT NULL,
  `observaciones` longtext NOT NULL,
  `arch_seguimiento` varchar(100) NOT NULL,
  `arch_final` varchar(100) NOT NULL,
  `atencion` int(11) NOT NULL,
  `id_ruta` int(11) NOT NULL,
  `id_informar` int(11) NOT NULL,
  `asunto` longtext NOT NULL,
  `id_oficioEntrada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `oficio_seguimiento`
--

INSERT INTO `oficio_seguimiento` (`id_oficioseg`, `nomenclatura`, `fecha`, `id_etAsunto`, `termino`, `id_destinatario`, `observaciones`, `arch_seguimiento`, `arch_final`, `atencion`, `id_ruta`, `id_informar`, `asunto`, `id_oficioEntrada`) VALUES
(1, '400LIA00/2509/2018', '2018-09-25', 1, 2, 1, 'Oficio entregado', 'Acuerdo_general.pdf', '', 6, 1, 1, 'En respuesta al oficio recibido', 31);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta_oficio`
--

CREATE TABLE `ruta_oficio` (
  `id_ruta` int(11) NOT NULL,
  `realiza_diligencias` int(11) NOT NULL,
  `recibir_personalmente` int(11) NOT NULL,
  `gestionar_peticion` int(11) NOT NULL,
  `archivo` int(11) NOT NULL,
  `otras` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ruta_oficio`
--

INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES
(1, 0, 0, 0, 0, 'Entrega');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `id_tipoUsuario` int(11) NOT NULL,
  `tipoUsuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`id_tipoUsuario`, `tipoUsuario`) VALUES
(1, 'Administrador'),
(2, 'Coordinador General'),
(3, 'Secretariado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `apellidop` varchar(50) NOT NULL,
  `apellidom` varchar(50) NOT NULL,
  `activo` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_tipoUsuario` int(11) NOT NULL,
  `id_dependencias` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellidop`, `apellidom`, `activo`, `usuario`, `password`, `id_tipoUsuario`, `id_dependencias`) VALUES
(1, 'Administrador', '', '', 1, 'admin', 'admin', 1, 1),
(2, 'lprueba', '', '', 1, '123', '123', 2, 1),
(3, 'Secretaria', '', '', 1, 'prueba', '123', 3, 1),
(4, 'Rodrigo', 'Archundia', '', 0, 'prueba2', '123', 2, 1),
(5, 'Abraham', 'Esteban', 'Acosta', 0, 'pruebaval', '456', 2, 1),
(6, 'Abraham', 'Esteban', 'Acosta', 1, 'AbrEsteban', '123', 2, 1),
(7, '', '', '', 0, '', 'Iifl7LUgaYEwo109BbE04q212A/mF9DFe+p3xoZT7AGQlvbmqX', 1, 1),
(8, '', '', '', 0, '', '1', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `dependencias`
--
ALTER TABLE `dependencias`
  ADD PRIMARY KEY (`id_dependencias`);

--
-- Indices de la tabla `destinatario`
--
ALTER TABLE `destinatario`
  ADD PRIMARY KEY (`id_destinatario`);

--
-- Indices de la tabla `etiquetas_asunto`
--
ALTER TABLE `etiquetas_asunto`
  ADD PRIMARY KEY (`id_etAsunto`);

--
-- Indices de la tabla `informar`
--
ALTER TABLE `informar`
  ADD PRIMARY KEY (`id_informar`);

--
-- Indices de la tabla `oficio_entrada`
--
ALTER TABLE `oficio_entrada`
  ADD PRIMARY KEY (`id_oficioEntrada`),
  ADD KEY `atencion` (`atencion`);

--
-- Indices de la tabla `oficio_seguimiento`
--
ALTER TABLE `oficio_seguimiento`
  ADD PRIMARY KEY (`id_oficioseg`),
  ADD KEY `atencion` (`atencion`),
  ADD KEY `id_etAsunto` (`id_etAsunto`),
  ADD KEY `id_destinatario` (`id_destinatario`),
  ADD KEY `id_ruta` (`id_ruta`),
  ADD KEY `id_informar` (`id_informar`);

--
-- Indices de la tabla `ruta_oficio`
--
ALTER TABLE `ruta_oficio`
  ADD PRIMARY KEY (`id_ruta`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`id_tipoUsuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_tipoUsuario` (`id_tipoUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `dependencias`
--
ALTER TABLE `dependencias`
  MODIFY `id_dependencias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `destinatario`
--
ALTER TABLE `destinatario`
  MODIFY `id_destinatario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `etiquetas_asunto`
--
ALTER TABLE `etiquetas_asunto`
  MODIFY `id_etAsunto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `informar`
--
ALTER TABLE `informar`
  MODIFY `id_informar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `oficio_entrada`
--
ALTER TABLE `oficio_entrada`
  MODIFY `id_oficioEntrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `oficio_seguimiento`
--
ALTER TABLE `oficio_seguimiento`
  MODIFY `id_oficioseg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ruta_oficio`
--
ALTER TABLE `ruta_oficio`
  MODIFY `id_ruta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `id_tipoUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `oficio_entrada`
--
ALTER TABLE `oficio_entrada`
  ADD CONSTRAINT `oficio_entrada_ibfk_1` FOREIGN KEY (`atencion`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `oficio_seguimiento`
--
ALTER TABLE `oficio_seguimiento`
  ADD CONSTRAINT `oficio_seguimiento_ibfk_1` FOREIGN KEY (`atencion`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `oficio_seguimiento_ibfk_2` FOREIGN KEY (`id_etAsunto`) REFERENCES `etiquetas_asunto` (`id_etAsunto`),
  ADD CONSTRAINT `oficio_seguimiento_ibfk_3` FOREIGN KEY (`id_destinatario`) REFERENCES `destinatario` (`id_destinatario`),
  ADD CONSTRAINT `oficio_seguimiento_ibfk_4` FOREIGN KEY (`id_ruta`) REFERENCES `ruta_oficio` (`id_ruta`),
  ADD CONSTRAINT `oficio_seguimiento_ibfk_5` FOREIGN KEY (`id_informar`) REFERENCES `informar` (`id_informar`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_tipoUsuario`) REFERENCES `tipousuario` (`id_tipoUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
