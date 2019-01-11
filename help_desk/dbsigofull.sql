-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-01-2019 a las 13:55:12
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
-- Base de datos: `prueba`
--

DELIMITER $$
--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `INSERTCAPTURA` (`oficio_rec` VARCHAR(100), `firma_origen_rec` VARCHAR(200), `cargo_rec` LONGTEXT, `peticion_rec` LONGTEXT, `entrada` LONGTEXT, `fecha_r` DATETIME, `fecha_rec` DATETIME, `fecha_recr` DATE, `oficina` INT, `peticionario` INT, `requiriente` INT, `colaboracion` INT, `amparo` INT, `solicitudes` INT, `gestion` INT, `cursos` INT, `juzgados` INT, `rh` INT, `telefonia` INT, `estadistica` INT, `ri` INT, `boletas` INT, `conocimiento` INT, `conase` INT, `toluca` INT, `mexico` INT, `zoriente` INT, `fgeneral` INT, `vicefiscalia` INT, `oficialia` INT, `informacion` INT, `central` INT, `servicio` INT, `otrad` LONGTEXT, `diligencia` INT, `personalmente` INT, `gestionar` INT, `archivo` INT, `otrar` LONGTEXT, `nomenclatura` VARCHAR(100), `fecha` DATE, `termino` DATETIME, `observaciones` LONGTEXT, `atencion` INT, `asunto` LONGTEXT, `fecha_aten` DATE, `nombre_aten` VARCHAR(100), `cargo_aten` VARCHAR(100), `descripcion_aten` LONGTEXT, `archivo_aten` VARCHAR(100), `copia_aten` LONGTEXT) RETURNS INT(11) BEGIN
DECLARE IDENT, IDI, IDE, IDD, IDR, IDO, IDA INT;
	INSERT INTO oficio_entrada(no_oficioEntrada, firma_origen, cargo, peticion, arch_entrada, atencion, fecha_ent, fecha_rec, fecha_real) VALUES (oficio_rec, firma_origen_rec, cargo_rec, peticion_rec, entrada, atencion, fecha_r, fecha_rec, fecha_recr);               
	SELECT LAST_INSERT_ID() INTO IDENT; 
	INSERT INTO informar (esta_oficina, peticionario, institucion_requiriente) VALUES (oficina, peticionario, requiriente);
    	SELECT LAST_INSERT_ID() INTO IDI;
    INSERT INTO etiquetas_asunto (colaboracion, amparos, solicitudes, gestion, cursos_capacitaciones, juzgados, recursos_humanos, telefonia, estadistica, relaciones_interis, boletas_audiencia, copias_conocimiento) VALUES (colaboracion, amparo, solicitudes, gestion, cursos, juzgados, rh, telefonia, estadistica, ri, boletas, conocimiento);            
    	SELECT LAST_INSERT_ID() INTO IDE;
    INSERT INTO destinatario (conase, valle_toluca, valle_mexico, zona_oriente, fiscal_general, vicefiscalia, oficialia_mayor, informacion_estadistica, central_juridico, servicio_carrera, otra) VALUES (conase, toluca, mexico, zoriente, fgeneral, vicefiscalia, oficialia, informacion, central, servicio, otrad);
    	SELECT LAST_INSERT_ID() INTO IDD;
	INSERT INTO ruta_oficio (realiza_diligencias, recibir_personalmente, gestionar_peticion, archivo, otras) VALUES (diligencia, personalmente, gestionar, archivo, otrar);
        SELECT LAST_INSERT_ID() INTO IDR;
    INSERT INTO captura (nomen_ofseg, fecha_ofseg, id_etA_ofseg, termino_ofseg, id_dest_ofseg, obs_ofseg, aten_ofseg, id_ruta_ofseg, id_inf_ofseg, asunto_ofseg, id_oficioEntrada_ofseg) VALUES (nomenclatura, fecha, IDE, termino, IDD, observaciones, atencion, IDR, IDI, asunto, IDENT);
        SELECT LAST_INSERT_ID() INTO IDO; 
	INSERT INTO captura_atendido (fecha_atenCap, nombre_atenCap, cargo_atenCap, descCap, arch_atenCap, copia_aCap, id_ofseg, atencionCap) VALUES (fecha_aten, nombre_aten, cargo_aten, descripcion_aten, archivo_aten, copia_aten, IDO, atencion);
    	SELECT LAST_INSERT_ID() INTO IDA;
RETURN IDO;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `INSERTOFICIO` (`oficina` INT, `peticionario` INT, `requiriente` INT, `colaboracion` INT, `amparo` INT, `solicitudes` INT, `gestion` INT, `cursos` INT, `juzgados` INT, `rh` INT, `telefonia` INT, `estadistica` INT, `ri` INT, `boletas` INT, `conocimiento` INT, `conase` INT, `toluca` INT, `mexico` INT, `zoriente` INT, `fgeneral` INT, `vicefiscalia` INT, `oficialia` INT, `informacion` INT, `central` INT, `servicio` INT, `otrad` LONGTEXT, `diligencia` INT, `personalmente` INT, `gestionar` INT, `archivo` INT, `otrar` LONGTEXT, `nomenclatura` VARCHAR(100), `fecha` DATE, `termino` DATETIME, `observaciones` LONGTEXT, `atencion` INT, `asunto` LONGTEXT, `id_entrada` INT) RETURNS INT(11) BEGIN
DECLARE IDI, IDE, IDD, IDR, IDO INT;
	INSERT INTO informar (esta_oficina, peticionario, institucion_requiriente) VALUES (oficina, peticionario, requiriente);
    	SELECT LAST_INSERT_ID() INTO IDI;
    INSERT INTO etiquetas_asunto (colaboracion, amparos, solicitudes, gestion, cursos_capacitaciones, juzgados, recursos_humanos, telefonia, estadistica, relaciones_interis, boletas_audiencia, copias_conocimiento) VALUES (colaboracion, amparo, solicitudes, gestion, cursos, juzgados, rh, telefonia, estadistica, ri, boletas, conocimiento);            
    	SELECT LAST_INSERT_ID() INTO IDE;
    INSERT INTO destinatario (conase, valle_toluca, valle_mexico, zona_oriente, fiscal_general, vicefiscalia, oficialia_mayor, informacion_estadistica, central_juridico, servicio_carrera, otra) VALUES (conase, toluca, mexico, zoriente, fgeneral, vicefiscalia, oficialia, informacion, central, servicio, otrad);
    	SELECT LAST_INSERT_ID() INTO IDD;
	INSERT INTO ruta_oficio (realiza_diligencias, recibir_personalmente, gestionar_peticion, archivo, otras) VALUES (diligencia, personalmente, gestionar, archivo, otrar);
        SELECT LAST_INSERT_ID() INTO IDR;
    INSERT INTO oficio_seguimiento (nomenclatura, fecha, id_etAsunto, termino, id_destinatario, observaciones, atencion, id_ruta, id_informar, asunto, id_oficioEntrada) VALUES (nomenclatura, fecha, IDE, termino, IDD, observaciones, atencion, IDR, IDI, asunto, id_entrada);
        SELECT LAST_INSERT_ID() INTO IDO;    

RETURN 1;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `captura`
--

CREATE TABLE `captura` (
  `id_ofseg` int(11) NOT NULL,
  `nomen_ofseg` varchar(50) NOT NULL,
  `fecha_ofseg` date NOT NULL,
  `id_etA_ofseg` int(11) NOT NULL,
  `termino_ofseg` datetime NOT NULL,
  `id_dest_ofseg` int(11) NOT NULL,
  `obs_ofseg` longtext NOT NULL,
  `aten_ofseg` int(11) NOT NULL,
  `id_ruta_ofseg` int(11) NOT NULL,
  `id_inf_ofseg` int(11) NOT NULL,
  `asunto_ofseg` longtext NOT NULL,
  `id_oficioEntrada_ofseg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `captura`
--

INSERT INTO `captura` (`id_ofseg`, `nomen_ofseg`, `fecha_ofseg`, `id_etA_ofseg`, `termino_ofseg`, `id_dest_ofseg`, `obs_ofseg`, `aten_ofseg`, `id_ruta_ofseg`, `id_inf_ofseg`, `asunto_ofseg`, `id_oficioEntrada_ofseg`) VALUES
(12, '400LI0010/0341/2018', '2018-12-19', 83, '2018-12-19 15:19:00', 83, 'CESEMONIA CONMEMORATIVA DEL 80 ANIVERSARIO DEL SUTEYM, QUE DANDO COMO ASUELTO EL DIA 26 DE OCTUBRE DEL 2018 PARA LOS SERVIDORES PUBLICO SINDICALIZADOS\r\n', 1, 85, 118, 'CEREMONIA CONMEMORATIVA DEL 80 ANIVERSARIO DEL SUTEYM, QUE DANDO COMO ASUELTO EL DIA 26 DE OCTUBRE DEL 2018 PARA LOS SERVIDORES PUBLICO SINDICALIZADOS\r\n', 79);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `captura_atendido`
--

CREATE TABLE `captura_atendido` (
  `id_ofAtenCap` int(11) NOT NULL,
  `fecha_atenCap` date NOT NULL,
  `nombre_atenCap` varchar(100) NOT NULL,
  `cargo_atenCap` longtext NOT NULL,
  `descCap` longtext NOT NULL,
  `arch_atenCap` varchar(100) NOT NULL,
  `copia_aCap` varchar(200) NOT NULL,
  `id_ofseg` int(11) NOT NULL,
  `atencionCap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `captura_atendido`
--

INSERT INTO `captura_atendido` (`id_ofAtenCap`, `fecha_atenCap`, `nombre_atenCap`, `cargo_atenCap`, `descCap`, `arch_atenCap`, `copia_aCap`, `id_ofseg`, `atencionCap`) VALUES
(1, '2018-12-19', 'LIC. EMMA MACEDO VENCES', 'DIRECTOR', 'CESEMONIA CONMEMORATIVA DEL 80 ANIVERSARIO DEL SUTEYM, QUE DANDO COMO ASUELTO EL DIA 26 DE OCTUBRE DEL 2018 PARA LOS SERVIDORES PUBLICO SINDICALIZADOS\r\n', '400LI00100341201819122018.pdf', '', 12, 1);

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
(1, 'FISCALIA GENERAL DE JUSTICIA DEL ESTADO DE MÉXICO');

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
(56, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(57, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, ''),
(66, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, ''),
(67, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'IRIS JANELLE SANCHEZ BRICEÑO \r\n'),
(68, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, ''),
(69, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, ''),
(75, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, ''),
(83, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, '');

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
(56, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(57, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(66, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(67, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(68, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(69, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(75, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(83, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

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
(91, 0, 1, 0),
(92, 0, 1, 0),
(101, 0, 1, 0),
(102, 0, 1, 0),
(103, 0, 0, 1),
(104, 0, 1, 0),
(110, 1, 0, 0),
(118, 0, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oficio_atendido`
--

CREATE TABLE `oficio_atendido` (
  `id_oficioAtendido` int(11) NOT NULL,
  `fecha_atendido` date NOT NULL,
  `nombre_aten` varchar(100) NOT NULL,
  `cargo_aten` longtext NOT NULL,
  `descripcion` longtext NOT NULL,
  `arch_atendido` varchar(100) NOT NULL,
  `copia_a` varchar(200) NOT NULL,
  `id_oficioseg` int(11) NOT NULL,
  `atencion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `oficio_atendido`
--

INSERT INTO `oficio_atendido` (`id_oficioAtendido`, `fecha_atendido`, `nombre_aten`, `cargo_aten`, `descripcion`, `arch_atendido`, `copia_a`, `id_oficioseg`, `atencion`) VALUES
(1, '2018-11-09', 'ANTONIO MARTIN TORRES BALLESTEROS.', 'SECRETARIO PARTICULAR', 'Por instruncciones del DR. H. C. Rodrigo Arcundia Barrientos, Coordinador General de Combate al secuestri y en atencion al oficio SEGOB/CNS/OADPRS/CGCF/46778/2018, Causa Penal: 244/2018, en el cual solicita informar si se tiene registro de la persona de nombre Rosalinda González Valencia.\r\n\r\nMe permito hacer de su conocimiento, que se giraron instrucciones a las tres Fiscalías Especializadas de Secuestro (Valle de Toluca, Valle de México y Zona Oriente) que integran a esta Coordinación General oara que realizarab una búsqueda municiosa en archivos y resgistros, NO encontrando registro alguno de la persona antes mencionada, lo que informo para los efectos legales a que haya lugar.\r\n\r\nRefrendo mi respeto y disposición para atender asuntos relacionados con nuestra institución, aprovechando el medio para enviarle un cordial saludo. ', 'Inspeccion_General.pdf', 'COORDINADOR ', 69, 1),
(6, '2018-11-09', 'ANTONIO MARTIN TORRES BALLESTEROS.', 'SECRETARIO TÉCNICO', 'PRUEBA', 'Solicitud_de_asesor_juridico.pdf', 'PRUEBA', 58, 1),
(8, '2018-09-01', 'moni', 'COORDINADOR', 'PRUEBA', 'Formato_general2.pdf', 'COORDINADOR', 59, 1),
(9, '2019-01-09', 'ANTONIO MARTIN TORRES BALLESTEROS.', 'CORDINADOR GENERAL', 'POR MEDIO DE ESTE OFICIO LE HAGO LLEGAS RESPUESTA DE LA PETICIÓN RESPECTO AL OFICIO CENTR443123 DONDE LE ANEXO EL LISTADO DE LAS PERSONAS PARA EL\r\nSEGUIMIENTO, VIGILANCIAS, DETENCIONES Y MANEJO DE ENTREGA DE RESCATE ', '400LIA0000001201909012019.pdf', '', 72, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oficio_entrada`
--

CREATE TABLE `oficio_entrada` (
  `id_oficioEntrada` int(11) NOT NULL,
  `no_oficioEntrada` varchar(100) NOT NULL,
  `firma_origen` varchar(200) NOT NULL,
  `cargo` longtext NOT NULL,
  `peticion` varchar(250) NOT NULL,
  `arch_entrada` varchar(200) NOT NULL,
  `atencion` int(11) NOT NULL,
  `fecha_ent` datetime NOT NULL,
  `fecha_rec` datetime NOT NULL,
  `fecha_real` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `oficio_entrada`
--

INSERT INTO `oficio_entrada` (`id_oficioEntrada`, `no_oficioEntrada`, `firma_origen`, `cargo`, `peticion`, `arch_entrada`, `atencion`, `fecha_ent`, `fecha_rec`, `fecha_real`) VALUES
(59, 'DEMEX/TOL/11897/2018', 'LIC. ISMAEL GONZALEZ CONTRERAS.', 'SUBDELEGADO DE PROCEDIMIENTOS PENALES \"B\"', 'COLABORACIÓN DE BÚSQUEDA DE ANTECEDENTES PENALES DE EDUARDO GIL PALOMINO', '9739602006651.pdf', 1, '2018-09-21 10:45:00', '2018-09-22 10:48:00', '2018-09-22'),
(60, 'MJ03454/2018', 'MTRA. ADRIANA CABRERA SANTANA', 'SECRETARIA TÉCNICA DEL C. FISCAL GENERAL', 'JUEZ LIC. IGNACIO GUZMAN COLIN REMITE OFICIO 10050, C. A. 1843/2014, SOLICITANDO INFORME EL NUMERO DE CARPETA DE INVESTIGACION CON QUE SE RADICO EL ESTADO QUE GUARDA Y NOMBRE DEL FISCAL ENCARGADO DE LA INVESTIGACION Y DOMICILIO DONDE SE LOCALICE.\r\n', 'Entrevista.pdf', 1, '2018-09-21 17:53:00', '2018-09-24 13:45:00', '2018-09-24'),
(61, '10771/2018', 'MTRA. ADRIANA CABRERA SANTANA. ', 'SECRETARIA TECNICA DEL C. FISCAL GENERAL.', 'SE REMITE FOLIO 30449 AL QUE SE ANEXA PETICION DE LA C. SOLEDAD PAULINA HERRERA BUENDIA SOLICITANDO APOYO CON LA DETENCION DE PRESUNTO DELINCUENTE.\r\n', 'Inspeccion_General.pdf', 1, '2018-09-21 17:53:00', '2018-09-24 13:45:00', '2018-09-13'),
(62, '11084/2018', 'MTRA. ADRIANA CABRERA SANTANA', 'SECRETARIA TECNICA DEL C. FISCAL GENERAL.\r\n', 'TELEFONIA. \r\n', 'Oficio_de_ayuda_a_atencion_a_la_victima.pdf', 6, '2018-09-21 16:16:00', '2018-09-24 13:55:00', '2018-09-21'),
(63, '400LJ4A00/1560/2018', 'DR. GUILLERMO E. GONZALEZ MEDINA.', 'DIRECTOR GENERAL DEL SERVICIO DE CARRERA.', 'CURSO DE DISCRIMINACION Y DERECHOS HUMANOS Y DERECHOS HUMANOS DE LAS PERSONAS PRIVADAS DE SU LIBERTAD QUE VIVEN EN RECLUSION EN EL 7 PISO\r\n', 'Penguins.jpg\r\n', 1, '2018-10-24 16:05:00', '2018-10-24 16:05:00', '2018-10-24'),
(64, '28719/2018', 'LA SECRETARIA DEL JUZGADO CUARTO ', 'DE DISTRITO EN MATERIA DE AMPARO Y JUICIOS FEDERALES DEL ESTADO DE MEXICO', 'SE ADMITE A TRAMITE LA DEMANDA DE AMPARO, PROMOVIDA POR CARLOS ARTURO PRIETO CRUZ Y SE ORDENA DAR LA INVESTIGACION EN CONTRA ACTOS DEL FISCAL REGIONAL DE TOLUCA. \r\n', 'Registro_General.pdf', 1, '2018-10-24 13:44:00', '2018-10-24 14:00:00', '2018-10-24'),
(79, '400L03000/0327-L/2018', 'MTRO. RAFAEL ESQUIVEL BLANCO.', 'DIRECTOR', 'CEREMONIA CONMEMORATIVA DEL 80 ANIVERSARIO DEL SUTEYM, QUE DANDO COMO ASUELTO EL DIA 26 DE OCTUBRE DEL 2018 PARA LOS SERVIDORES PUBLICO SINDICALIZADOS\r\n', '400L030000327-L2018.pdf', 1, '2018-12-15 13:59:00', '2018-12-15 14:59:00', '2018-12-18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oficio_seguimiento`
--

CREATE TABLE `oficio_seguimiento` (
  `id_oficioseg` int(11) NOT NULL,
  `nomenclatura` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `id_etAsunto` int(11) NOT NULL,
  `termino` datetime NOT NULL,
  `id_destinatario` int(11) NOT NULL,
  `observaciones` longtext NOT NULL,
  `atencion` int(11) NOT NULL,
  `id_ruta` int(11) NOT NULL,
  `id_informar` int(11) NOT NULL,
  `asunto` longtext NOT NULL,
  `id_oficioEntrada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `oficio_seguimiento`
--

INSERT INTO `oficio_seguimiento` (`id_oficioseg`, `nomenclatura`, `fecha`, `id_etAsunto`, `termino`, `id_destinatario`, `observaciones`, `atencion`, `id_ruta`, `id_informar`, `asunto`, `id_oficioEntrada`) VALUES
(58, '400LI0010/0001/2017', '2018-11-06', 56, '2018-11-09 17:35:00', 56, 'PRUEBA', 1, 58, 91, 'PRUEBA', 59),
(59, '400LI0010/0001/2018', '2018-09-01', 57, '2018-09-01 12:50:00', 57, 'PRUEBA', 1, 59, 92, 'PRUEBA', 60),
(68, '400LI0010/0002/2018', '2018-12-07', 66, '2018-12-07 16:09:00', 66, 'PRUEBA\r\n', 1, 68, 101, 'PRUEBA', 61),
(69, '400LIA000/0001/2018', '2018-12-08', 67, '2018-11-09 13:26:00', 67, 'TELFONIA', 6, 69, 102, 'TELEFONIA', 62),
(70, '400LIA000/0002/2018', '2018-12-05', 68, '2019-12-27 17:16:00', 68, 'PRUEBA', 1, 70, 103, 'PRUEBA', 63),
(71, '400LIA000/0022/2018', '2018-12-31', 69, '0000-00-00 00:00:00', 69, 'PRUEBA DE LA INSERCIÓN DE LOS TRES OFICIOS, RECEPCIÓN, SEGUIMIENTO Y ATENDIDO', 1, 71, 104, 'CREACIÓN DE OFICIO RECEPCIÓN, SEGUIMIENTO Y ATENDIDO', 64),
(72, '400LIA000/0001/2019', '2018-10-12', 75, '2018-10-11 16:00:00', 75, 'CURSO QUE IMPARTIRA LA EMBAJADA FRANCESA TENIENDO COMO FECHA PROBABLE DEL 12 AL 16 DE NOVIEMBRE DEL 2018, MANDAR EL LISTADO DE LAS PERSONAS A MASTARDAR EL DIA 17 DE OCTUBRE DEL 2018, \"SEGUIMIENTO, VIGILANCIAS, DETENCIONES Y MANEJO DE NETREGA DE RESCATE\"\r\n', 1, 77, 110, 'CURSO QUE IMPARTIRA LA EMBAJADA FRANCESA TENIENDO COMO FECHA PROBABLE DEL 12 AL 16 DE NOVIEMBRE DEL 2018, MANDAR EL LISTADO DE LAS PERSONAS A MASTARDAR EL DIA 17 DE OCTUBRE DEL 2018, \"SEGUIMIENTO, VIGILANCIAS, DETENCIONES Y MANEJO DE NETREGA DE RESCATE\"\r\n', 79);

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
(58, 0, 1, 0, 0, ''),
(59, 0, 1, 0, 0, ''),
(68, 0, 1, 0, 0, ''),
(69, 0, 1, 0, 0, ''),
(70, 0, 0, 0, 1, ''),
(71, 1, 1, 0, 0, ''),
(77, 0, 0, 0, 1, ''),
(85, 0, 0, 0, 1, '');

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
(1, 'ADMINISTRADOR'),
(2, 'COORDINADOR GENERAL'),
(3, 'SECRETARIADO'),
(4, 'CAPTURA'),
(5, 'CONSULTA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidop` varchar(50) NOT NULL,
  `apellidom` varchar(50) NOT NULL,
  `activo` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_tipoUsuario` int(11) NOT NULL,
  `id_dependencias` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellidop`, `apellidom`, `activo`, `correo`, `password`, `id_tipoUsuario`, `id_dependencias`) VALUES
(1, 'ADMINISTRADOR', 'ADMIN', 'ADMIN', 1, 'mmendezg@fiscaliaedomex.gob.mx', 'c3VwZXJ1c3Vhcmlv', 1, 1),
(2, 'lprueba', 'coordinador', 'pruebacoord', 1, 'lprueba@gmail.com', 'Y29vcmRpbmFkb3I=', 2, 1),
(3, 'Secretaria', 'psecretariado', 'psecretariado', 1, 'secretariado@gmail.com', 'c2VjcmV0YXJpYWRv', 3, 1),
(4, 'RODRIGO', 'ARCHUNDIA', 'BARRIENTOS', 1, 'rarchundia@fiscaliaedomex.gob.mx', 'cmFyY2h1bmRpYQ==', 2, 1),
(6, 'ABRAHAM', 'ESTEBAN', 'ACOSTA', 1, 'aestebana@fiscaliaedomex.gob.mx', 'YWVzdGViYW5h', 2, 1),
(7, 'PCaptura', 'P', 'Captura', 1, 'captura@fiscaliaedomex.gob.mx', 'Y2FwdHVyYTE=', 4, 1),
(8, 'MCONSULTA', 'MCONSULTA', 'MCONSULTA', 1, 'mconsulta@gmail.com', 'bWNvbnN1bHRh', 5, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `captura`
--
ALTER TABLE `captura`
  ADD PRIMARY KEY (`id_ofseg`),
  ADD KEY `captura` (`aten_ofseg`),
  ADD KEY `captura_2` (`id_etA_ofseg`),
  ADD KEY `captura_3` (`id_dest_ofseg`),
  ADD KEY `captura_4` (`id_ruta_ofseg`),
  ADD KEY `captura_5` (`id_inf_ofseg`),
  ADD KEY `captura_6` (`id_oficioEntrada_ofseg`);

--
-- Indices de la tabla `captura_atendido`
--
ALTER TABLE `captura_atendido`
  ADD PRIMARY KEY (`id_ofAtenCap`),
  ADD KEY `cap_aten1` (`id_ofseg`),
  ADD KEY `cap_aten2` (`atencionCap`);

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
-- Indices de la tabla `oficio_atendido`
--
ALTER TABLE `oficio_atendido`
  ADD PRIMARY KEY (`id_oficioAtendido`),
  ADD KEY `id_oficioseg` (`id_oficioseg`),
  ADD KEY `oficio_atendido` (`atencion`);

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
  ADD KEY `oficio_seguimiento_ibfk_1` (`atencion`),
  ADD KEY `oficio_seguimiento_ibfk_2` (`id_etAsunto`),
  ADD KEY `oficio_seguimiento_ibfk_3` (`id_destinatario`),
  ADD KEY `oficio_seguimiento_ibfk_4` (`id_ruta`),
  ADD KEY `oficio_seguimiento_ibfk_5` (`id_informar`),
  ADD KEY `oficio_seguimiento_ibfk_7` (`id_oficioEntrada`);

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
  ADD KEY `id_tipoUsuario` (`id_tipoUsuario`),
  ADD KEY `id_dependencias` (`id_dependencias`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `captura`
--
ALTER TABLE `captura`
  MODIFY `id_ofseg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `dependencias`
--
ALTER TABLE `dependencias`
  MODIFY `id_dependencias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `destinatario`
--
ALTER TABLE `destinatario`
  MODIFY `id_destinatario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT de la tabla `etiquetas_asunto`
--
ALTER TABLE `etiquetas_asunto`
  MODIFY `id_etAsunto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT de la tabla `informar`
--
ALTER TABLE `informar`
  MODIFY `id_informar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT de la tabla `oficio_atendido`
--
ALTER TABLE `oficio_atendido`
  MODIFY `id_oficioAtendido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `oficio_entrada`
--
ALTER TABLE `oficio_entrada`
  MODIFY `id_oficioEntrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de la tabla `ruta_oficio`
--
ALTER TABLE `ruta_oficio`
  MODIFY `id_ruta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `id_tipoUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `captura`
--
ALTER TABLE `captura`
  ADD CONSTRAINT `captura` FOREIGN KEY (`aten_ofseg`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `captura_2` FOREIGN KEY (`id_etA_ofseg`) REFERENCES `etiquetas_asunto` (`id_etAsunto`),
  ADD CONSTRAINT `captura_3` FOREIGN KEY (`id_dest_ofseg`) REFERENCES `destinatario` (`id_destinatario`),
  ADD CONSTRAINT `captura_4` FOREIGN KEY (`id_ruta_ofseg`) REFERENCES `ruta_oficio` (`id_ruta`),
  ADD CONSTRAINT `captura_5` FOREIGN KEY (`id_inf_ofseg`) REFERENCES `informar` (`id_informar`),
  ADD CONSTRAINT `captura_6` FOREIGN KEY (`id_oficioEntrada_ofseg`) REFERENCES `oficio_entrada` (`id_oficioEntrada`);

--
-- Filtros para la tabla `captura_atendido`
--
ALTER TABLE `captura_atendido`
  ADD CONSTRAINT `cap_aten1` FOREIGN KEY (`id_ofseg`) REFERENCES `captura` (`id_ofseg`),
  ADD CONSTRAINT `cap_aten2` FOREIGN KEY (`atencionCap`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `oficio_atendido`
--
ALTER TABLE `oficio_atendido`
  ADD CONSTRAINT `oficio_atendido` FOREIGN KEY (`atencion`) REFERENCES `usuario` (`id_usuario`);

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
  ADD CONSTRAINT `oficio_seguimiento_ibfk_5` FOREIGN KEY (`id_informar`) REFERENCES `informar` (`id_informar`),
  ADD CONSTRAINT `oficio_seguimiento_ibfk_7` FOREIGN KEY (`id_oficioEntrada`) REFERENCES `oficio_entrada` (`id_oficioEntrada`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario` FOREIGN KEY (`id_dependencias`) REFERENCES `dependencias` (`id_dependencias`),
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_tipoUsuario`) REFERENCES `tipousuario` (`id_tipoUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
