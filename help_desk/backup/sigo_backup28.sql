#
# TABLE STRUCTURE FOR: captura
#

DROP TABLE IF EXISTS `captura`;

CREATE TABLE `captura` (
  `id_ofseg` int(11) NOT NULL AUTO_INCREMENT,
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
  `id_oficioEntrada_ofseg` int(11) NOT NULL,
  PRIMARY KEY (`id_ofseg`),
  KEY `captura` (`aten_ofseg`),
  KEY `captura_2` (`id_etA_ofseg`),
  KEY `captura_3` (`id_dest_ofseg`),
  KEY `captura_4` (`id_ruta_ofseg`),
  KEY `captura_5` (`id_inf_ofseg`),
  KEY `captura_6` (`id_oficioEntrada_ofseg`),
  CONSTRAINT `captura` FOREIGN KEY (`aten_ofseg`) REFERENCES `usuario` (`id_usuario`),
  CONSTRAINT `captura_2` FOREIGN KEY (`id_etA_ofseg`) REFERENCES `etiquetas_asunto` (`id_etAsunto`),
  CONSTRAINT `captura_3` FOREIGN KEY (`id_dest_ofseg`) REFERENCES `destinatario` (`id_destinatario`),
  CONSTRAINT `captura_4` FOREIGN KEY (`id_ruta_ofseg`) REFERENCES `ruta_oficio` (`id_ruta`),
  CONSTRAINT `captura_5` FOREIGN KEY (`id_inf_ofseg`) REFERENCES `informar` (`id_informar`),
  CONSTRAINT `captura_6` FOREIGN KEY (`id_oficioEntrada_ofseg`) REFERENCES `oficio_entrada` (`id_oficioEntrada`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO `captura` (`id_ofseg`, `nomen_ofseg`, `fecha_ofseg`, `id_etA_ofseg`, `termino_ofseg`, `id_dest_ofseg`, `obs_ofseg`, `aten_ofseg`, `id_ruta_ofseg`, `id_inf_ofseg`, `asunto_ofseg`, `id_oficioEntrada_ofseg`) VALUES (12, '400LI0010/0341/2018', '2018-12-19', 83, '2018-12-19 15:19:00', 83, 'CESEMONIA CONMEMORATIVA DEL 80 ANIVERSARIO DEL SUTEYM, QUE DANDO COMO ASUELTO EL DIA 26 DE OCTUBRE DEL 2018 PARA LOS SERVIDORES PUBLICO SINDICALIZADOS\r\n', 1, 85, 118, 'CEREMONIA CONMEMORATIVA DEL 80 ANIVERSARIO DEL SUTEYM, QUE DANDO COMO ASUELTO EL DIA 26 DE OCTUBRE DEL 2018 PARA LOS SERVIDORES PUBLICO SINDICALIZADOS\r\n', 79);


#
# TABLE STRUCTURE FOR: captura_atendido
#

DROP TABLE IF EXISTS `captura_atendido`;

CREATE TABLE `captura_atendido` (
  `id_ofAtenCap` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_atenCap` date NOT NULL,
  `nombre_atenCap` varchar(100) NOT NULL,
  `cargo_atenCap` longtext NOT NULL,
  `descCap` longtext NOT NULL,
  `arch_atenCap` varchar(100) NOT NULL,
  `copia_aCap` varchar(200) NOT NULL,
  `id_ofseg` int(11) NOT NULL,
  `atencionCap` int(11) NOT NULL,
  PRIMARY KEY (`id_ofAtenCap`),
  KEY `cap_aten1` (`id_ofseg`),
  KEY `cap_aten2` (`atencionCap`),
  CONSTRAINT `cap_aten1` FOREIGN KEY (`id_ofseg`) REFERENCES `captura` (`id_ofseg`),
  CONSTRAINT `cap_aten2` FOREIGN KEY (`atencionCap`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `captura_atendido` (`id_ofAtenCap`, `fecha_atenCap`, `nombre_atenCap`, `cargo_atenCap`, `descCap`, `arch_atenCap`, `copia_aCap`, `id_ofseg`, `atencionCap`) VALUES (1, '2018-12-19', 'LIC. EMMA MACEDO VENCES', 'DIRECTOR', 'CESEMONIA CONMEMORATIVA DEL 80 ANIVERSARIO DEL SUTEYM, QUE DANDO COMO ASUELTO EL DIA 26 DE OCTUBRE DEL 2018 PARA LOS SERVIDORES PUBLICO SINDICALIZADOS\r\n', '400LI00100341201819122018.pdf', '', 12, 1);


#
# TABLE STRUCTURE FOR: dependencias
#

DROP TABLE IF EXISTS `dependencias`;

CREATE TABLE `dependencias` (
  `id_dependencias` int(11) NOT NULL AUTO_INCREMENT,
  `dependencias` varchar(150) NOT NULL,
  PRIMARY KEY (`id_dependencias`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `dependencias` (`id_dependencias`, `dependencias`) VALUES (1, 'FISCALIA GENERAL DE JUSTICIA DEL ESTADO DE MÉXICO');


#
# TABLE STRUCTURE FOR: destinatario
#

DROP TABLE IF EXISTS `destinatario`;

CREATE TABLE `destinatario` (
  `id_destinatario` int(11) NOT NULL AUTO_INCREMENT,
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
  `otra` varchar(250) NOT NULL,
  PRIMARY KEY (`id_destinatario`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;

INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (56, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (57, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (66, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (67, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'IRIS JANELLE SANCHEZ BRICEÑO \r\n');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (68, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (69, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (75, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (83, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (84, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, '');
INSERT INTO `destinatario` (`id_destinatario`, `conase`, `valle_toluca`, `valle_mexico`, `zona_oriente`, `fiscal_general`, `vicefiscalia`, `oficialia_mayor`, `informacion_estadistica`, `central_juridico`, `servicio_carrera`, `otra`) VALUES (85, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, '');


#
# TABLE STRUCTURE FOR: etiquetas_asunto
#

DROP TABLE IF EXISTS `etiquetas_asunto`;

CREATE TABLE `etiquetas_asunto` (
  `id_etAsunto` int(11) NOT NULL AUTO_INCREMENT,
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
  `copias_conocimiento` int(11) NOT NULL,
  PRIMARY KEY (`id_etAsunto`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;

INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (56, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (57, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (66, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (67, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (68, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (69, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (75, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (83, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (84, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0);
INSERT INTO `etiquetas_asunto` (`id_etAsunto`, `colaboracion`, `amparos`, `solicitudes`, `gestion`, `cursos_capacitaciones`, `juzgados`, `recursos_humanos`, `telefonia`, `estadistica`, `relaciones_interis`, `boletas_audiencia`, `copias_conocimiento`) VALUES (85, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0);


#
# TABLE STRUCTURE FOR: informar
#

DROP TABLE IF EXISTS `informar`;

CREATE TABLE `informar` (
  `id_informar` int(11) NOT NULL AUTO_INCREMENT,
  `esta_oficina` int(11) NOT NULL,
  `peticionario` int(11) NOT NULL,
  `institucion_requiriente` int(11) NOT NULL,
  PRIMARY KEY (`id_informar`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=latin1;

INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (91, 0, 1, 0);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (92, 0, 1, 0);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (101, 0, 1, 0);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (102, 0, 1, 0);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (103, 0, 0, 1);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (104, 0, 1, 0);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (110, 1, 0, 0);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (118, 0, 0, 1);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (119, 0, 1, 0);
INSERT INTO `informar` (`id_informar`, `esta_oficina`, `peticionario`, `institucion_requiriente`) VALUES (120, 0, 1, 0);


#
# TABLE STRUCTURE FOR: oficio_atendido
#

DROP TABLE IF EXISTS `oficio_atendido`;

CREATE TABLE `oficio_atendido` (
  `id_oficioAtendido` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_atendido` date NOT NULL,
  `nombre_aten` varchar(100) NOT NULL,
  `cargo_aten` longtext NOT NULL,
  `descripcion` longtext NOT NULL,
  `arch_atendido` varchar(100) NOT NULL,
  `copia_a` varchar(200) NOT NULL,
  `id_oficioseg` int(11) NOT NULL,
  `atencion` int(11) NOT NULL,
  PRIMARY KEY (`id_oficioAtendido`),
  KEY `id_oficioseg` (`id_oficioseg`),
  KEY `oficio_atendido` (`atencion`),
  CONSTRAINT `oficio_atendido` FOREIGN KEY (`atencion`) REFERENCES `usuario` (`id_usuario`),
  CONSTRAINT `oficio_atendido_2` FOREIGN KEY (`id_oficioseg`) REFERENCES `oficio_seguimiento` (`id_oficioseg`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO `oficio_atendido` (`id_oficioAtendido`, `fecha_atendido`, `nombre_aten`, `cargo_aten`, `descripcion`, `arch_atendido`, `copia_a`, `id_oficioseg`, `atencion`) VALUES (1, '2018-11-09', 'ANTONIO MARTIN TORRES BALLESTEROS.', 'SECRETARIO PARTICULAR', 'Por instruncciones del DR. H. C. Rodrigo Arcundia Barrientos, Coordinador General de Combate al secuestri y en atencion al oficio SEGOB/CNS/OADPRS/CGCF/46778/2018, Causa Penal: 244/2018, en el cual solicita informar si se tiene registro de la persona de nombre Rosalinda González Valencia.\r\n\r\nMe permito hacer de su conocimiento, que se giraron instrucciones a las tres Fiscalías Especializadas de Secuestro (Valle de Toluca, Valle de México y Zona Oriente) que integran a esta Coordinación General oara que realizarab una búsqueda municiosa en archivos y resgistros, NO encontrando registro alguno de la persona antes mencionada, lo que informo para los efectos legales a que haya lugar.\r\n\r\nRefrendo mi respeto y disposición para atender asuntos relacionados con nuestra institución, aprovechando el medio para enviarle un cordial saludo. ', 'Inspeccion_General.pdf', 'COORDINADOR ', 69, 1);
INSERT INTO `oficio_atendido` (`id_oficioAtendido`, `fecha_atendido`, `nombre_aten`, `cargo_aten`, `descripcion`, `arch_atendido`, `copia_a`, `id_oficioseg`, `atencion`) VALUES (6, '2018-11-09', 'ANTONIO MARTIN TORRES BALLESTEROS.', 'SECRETARIO TÉCNICO', 'PRUEBA', 'Solicitud_de_asesor_juridico.pdf', 'PRUEBA', 58, 1);
INSERT INTO `oficio_atendido` (`id_oficioAtendido`, `fecha_atendido`, `nombre_aten`, `cargo_aten`, `descripcion`, `arch_atendido`, `copia_a`, `id_oficioseg`, `atencion`) VALUES (8, '2018-09-01', 'moni', 'COORDINADOR', 'PRUEBA', 'Formato_general2.pdf', 'COORDINADOR', 59, 1);
INSERT INTO `oficio_atendido` (`id_oficioAtendido`, `fecha_atendido`, `nombre_aten`, `cargo_aten`, `descripcion`, `arch_atendido`, `copia_a`, `id_oficioseg`, `atencion`) VALUES (9, '2019-01-09', 'ANTONIO MARTIN TORRES BALLESTEROS.', 'CORDINADOR GENERAL', 'POR MEDIO DE ESTE OFICIO LE HAGO LLEGAS RESPUESTA DE LA PETICIÓN RESPECTO AL OFICIO CENTR443123 DONDE LE ANEXO EL LISTADO DE LAS PERSONAS PARA EL\r\nSEGUIMIENTO, VIGILANCIAS, DETENCIONES Y MANEJO DE ENTREGA DE RESCATE ', '400LIA0000001201909012019.pdf', '', 72, 1);
INSERT INTO `oficio_atendido` (`id_oficioAtendido`, `fecha_atendido`, `nombre_aten`, `cargo_aten`, `descripcion`, `arch_atendido`, `copia_a`, `id_oficioseg`, `atencion`) VALUES (10, '2018-10-08', 'LIC. DILCYA SAMANTHA GARCIA ESPINOZA DE LOS MONTEROS. ', 'FISCAL CENTRAL PARA LA ATENCON DE DELITOS VINCULADOS A LA VIOLENCIA DE GENERO. \r\n', 'EL OFICIO SE ENVIO VIA CORREO PARA QUE REMITIERAN LISTADO DE SERVIDORES QUE ASITIRAN A LA CONFERENCIA\r\n', '400LI00100003201908102018.pdf', '', 74, 8);


#
# TABLE STRUCTURE FOR: oficio_entrada
#

DROP TABLE IF EXISTS `oficio_entrada`;

CREATE TABLE `oficio_entrada` (
  `id_oficioEntrada` int(11) NOT NULL AUTO_INCREMENT,
  `no_oficioEntrada` varchar(100) NOT NULL,
  `firma_origen` varchar(200) NOT NULL,
  `cargo` longtext NOT NULL,
  `peticion` varchar(250) NOT NULL,
  `arch_entrada` varchar(200) NOT NULL,
  `atencion` int(11) NOT NULL,
  `fecha_ent` datetime NOT NULL,
  `fecha_rec` datetime NOT NULL,
  `fecha_real` date NOT NULL,
  PRIMARY KEY (`id_oficioEntrada`),
  KEY `atencion` (`atencion`),
  CONSTRAINT `oficio_entrada_ibfk_1` FOREIGN KEY (`atencion`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;

INSERT INTO `oficio_entrada` (`id_oficioEntrada`, `no_oficioEntrada`, `firma_origen`, `cargo`, `peticion`, `arch_entrada`, `atencion`, `fecha_ent`, `fecha_rec`, `fecha_real`) VALUES (59, 'DEMEX/TOL/11897/2018', 'LIC. ISMAEL GONZALEZ CONTRERAS.', 'SUBDELEGADO DE PROCEDIMIENTOS PENALES \"B\"', 'COLABORACIÓN DE BÚSQUEDA DE ANTECEDENTES PENALES DE EDUARDO GIL PALOMINO', '9739602006651.pdf', 1, '2018-09-21 10:45:00', '2018-09-22 10:48:00', '2018-09-22');
INSERT INTO `oficio_entrada` (`id_oficioEntrada`, `no_oficioEntrada`, `firma_origen`, `cargo`, `peticion`, `arch_entrada`, `atencion`, `fecha_ent`, `fecha_rec`, `fecha_real`) VALUES (60, 'MJ03454/2018', 'MTRA. ADRIANA CABRERA SANTANA', 'SECRETARIA TÉCNICA DEL C. FISCAL GENERAL', 'JUEZ LIC. IGNACIO GUZMAN COLIN REMITE OFICIO 10050, C. A. 1843/2014, SOLICITANDO INFORME EL NUMERO DE CARPETA DE INVESTIGACION CON QUE SE RADICO EL ESTADO QUE GUARDA Y NOMBRE DEL FISCAL ENCARGADO DE LA INVESTIGACION Y DOMICILIO DONDE SE LOCALICE.\r\n', 'Entrevista.pdf', 1, '2018-09-21 17:53:00', '2018-09-24 13:45:00', '2018-09-24');
INSERT INTO `oficio_entrada` (`id_oficioEntrada`, `no_oficioEntrada`, `firma_origen`, `cargo`, `peticion`, `arch_entrada`, `atencion`, `fecha_ent`, `fecha_rec`, `fecha_real`) VALUES (61, '10771/2018', 'MTRA. ADRIANA CABRERA SANTANA. ', 'SECRETARIA TECNICA DEL C. FISCAL GENERAL.', 'SE REMITE FOLIO 30449 AL QUE SE ANEXA PETICION DE LA C. SOLEDAD PAULINA HERRERA BUENDIA SOLICITANDO APOYO CON LA DETENCION DE PRESUNTO DELINCUENTE.\r\n', 'Inspeccion_General.pdf', 1, '2018-09-21 17:53:00', '2018-09-24 13:45:00', '2018-09-13');
INSERT INTO `oficio_entrada` (`id_oficioEntrada`, `no_oficioEntrada`, `firma_origen`, `cargo`, `peticion`, `arch_entrada`, `atencion`, `fecha_ent`, `fecha_rec`, `fecha_real`) VALUES (62, '11084/2018', 'MTRA. ADRIANA CABRERA SANTANA', 'SECRETARIA TECNICA DEL C. FISCAL GENERAL.\r\n', 'TELEFONIA. \r\n', 'Oficio_de_ayuda_a_atencion_a_la_victima.pdf', 6, '2018-09-21 16:16:00', '2018-09-24 13:55:00', '2018-09-21');
INSERT INTO `oficio_entrada` (`id_oficioEntrada`, `no_oficioEntrada`, `firma_origen`, `cargo`, `peticion`, `arch_entrada`, `atencion`, `fecha_ent`, `fecha_rec`, `fecha_real`) VALUES (63, '400LJ4A00/1560/2018', 'DR. GUILLERMO E. GONZALEZ MEDINA.', 'DIRECTOR GENERAL DEL SERVICIO DE CARRERA.', 'CURSO DE DISCRIMINACION Y DERECHOS HUMANOS Y DERECHOS HUMANOS DE LAS PERSONAS PRIVADAS DE SU LIBERTAD QUE VIVEN EN RECLUSION EN EL 7 PISO\r\n', 'Penguins.jpg\r\n', 1, '2018-10-24 16:05:00', '2018-10-24 16:05:00', '2018-10-24');
INSERT INTO `oficio_entrada` (`id_oficioEntrada`, `no_oficioEntrada`, `firma_origen`, `cargo`, `peticion`, `arch_entrada`, `atencion`, `fecha_ent`, `fecha_rec`, `fecha_real`) VALUES (64, '28719/2018', 'LA SECRETARIA DEL JUZGADO CUARTO ', 'DE DISTRITO EN MATERIA DE AMPARO Y JUICIOS FEDERALES DEL ESTADO DE MEXICO', 'SE ADMITE A TRAMITE LA DEMANDA DE AMPARO, PROMOVIDA POR CARLOS ARTURO PRIETO CRUZ Y SE ORDENA DAR LA INVESTIGACION EN CONTRA ACTOS DEL FISCAL REGIONAL DE TOLUCA. \r\n', 'Registro_General.pdf', 1, '2018-10-24 13:44:00', '2018-10-24 14:00:00', '2018-10-24');
INSERT INTO `oficio_entrada` (`id_oficioEntrada`, `no_oficioEntrada`, `firma_origen`, `cargo`, `peticion`, `arch_entrada`, `atencion`, `fecha_ent`, `fecha_rec`, `fecha_real`) VALUES (79, '400L03000/0327-L/2018', 'MTRO. RAFAEL ESQUIVEL BLANCO.', 'DIRECTOR', 'CEREMONIA CONMEMORATIVA DEL 80 ANIVERSARIO DEL SUTEYM, QUE DANDO COMO ASUELTO EL DIA 26 DE OCTUBRE DEL 2018 PARA LOS SERVIDORES PUBLICO SINDICALIZADOS\r\n', '400L030000327-L2018.pdf', 1, '2018-12-15 13:59:00', '2018-12-15 14:59:00', '2018-12-18');
INSERT INTO `oficio_entrada` (`id_oficioEntrada`, `no_oficioEntrada`, `firma_origen`, `cargo`, `peticion`, `arch_entrada`, `atencion`, `fecha_ent`, `fecha_rec`, `fecha_real`) VALUES (80, 'MJ03474/2019', 'FERNANDA GOMEZ', 'LIC.', 'POR MEDIO DE ESTE OFICIO SE REMITE UNA BÚSQUEDA DE UNA PERSONA CON EL NOMBRE ...', 'MJ034742019.pdf', 3, '2019-01-14 05:10:00', '2019-01-14 07:18:00', '2019-01-12');
INSERT INTO `oficio_entrada` (`id_oficioEntrada`, `no_oficioEntrada`, `firma_origen`, `cargo`, `peticion`, `arch_entrada`, `atencion`, `fecha_ent`, `fecha_rec`, `fecha_real`) VALUES (81, 'CIRCULAR INTERNA 85', 'FERNANDA GOMEZ', 'MTRA. EN DERECHO', 'CONFORME A LA CIRCULAR 85 DONDE SE DESCRIBE LAS SIGUIENTES INDICACIONES PARA EL PRÓXIMO EVENTO ', 'CIRCULAR_INTERNA_85.pdf', 3, '2019-01-11 10:20:00', '2019-01-11 15:27:00', '2019-01-08');
INSERT INTO `oficio_entrada` (`id_oficioEntrada`, `no_oficioEntrada`, `firma_origen`, `cargo`, `peticion`, `arch_entrada`, `atencion`, `fecha_ent`, `fecha_rec`, `fecha_real`) VALUES (82, '400LHA000/1171/2018', 'LIC. DILCYA SAMANTHA GARCIA ESPINOZA DE LOS MONTEROS.', 'FISCAL CENTRAL PARA LA ATENCON DE DELITOS VINCULADOS A LA VIOLENCIA DE GENERO. \r\n', 'EL OFICIO SE ENVIO VIA CORREO PARA QUE REMITIERAN LISTADO DE SERVIDORES QUE ASITIRAN A LA CONFERENCIA\r\n', '400LHA00011712018.pdf', 8, '2018-10-15 10:28:00', '2018-10-15 18:39:00', '2018-09-01');


#
# TABLE STRUCTURE FOR: oficio_seguimiento
#

DROP TABLE IF EXISTS `oficio_seguimiento`;

CREATE TABLE `oficio_seguimiento` (
  `id_oficioseg` int(11) NOT NULL AUTO_INCREMENT,
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
  `id_oficioEntrada` int(11) NOT NULL,
  PRIMARY KEY (`id_oficioseg`),
  KEY `oficio_seguimiento_ibfk_1` (`atencion`),
  KEY `oficio_seguimiento_ibfk_2` (`id_etAsunto`),
  KEY `oficio_seguimiento_ibfk_3` (`id_destinatario`),
  KEY `oficio_seguimiento_ibfk_4` (`id_ruta`),
  KEY `oficio_seguimiento_ibfk_5` (`id_informar`),
  KEY `oficio_seguimiento_ibfk_7` (`id_oficioEntrada`),
  CONSTRAINT `oficio_seguimiento_ibfk_1` FOREIGN KEY (`atencion`) REFERENCES `usuario` (`id_usuario`),
  CONSTRAINT `oficio_seguimiento_ibfk_2` FOREIGN KEY (`id_etAsunto`) REFERENCES `etiquetas_asunto` (`id_etAsunto`),
  CONSTRAINT `oficio_seguimiento_ibfk_3` FOREIGN KEY (`id_destinatario`) REFERENCES `destinatario` (`id_destinatario`),
  CONSTRAINT `oficio_seguimiento_ibfk_4` FOREIGN KEY (`id_ruta`) REFERENCES `ruta_oficio` (`id_ruta`),
  CONSTRAINT `oficio_seguimiento_ibfk_5` FOREIGN KEY (`id_informar`) REFERENCES `informar` (`id_informar`),
  CONSTRAINT `oficio_seguimiento_ibfk_7` FOREIGN KEY (`id_oficioEntrada`) REFERENCES `oficio_entrada` (`id_oficioEntrada`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

INSERT INTO `oficio_seguimiento` (`id_oficioseg`, `nomenclatura`, `fecha`, `id_etAsunto`, `termino`, `id_destinatario`, `observaciones`, `atencion`, `id_ruta`, `id_informar`, `asunto`, `id_oficioEntrada`) VALUES (58, '400LI0010/0001/2017', '2018-11-06', 56, '2018-11-09 17:35:00', 56, 'PRUEBA', 1, 58, 91, 'PRUEBA', 59);
INSERT INTO `oficio_seguimiento` (`id_oficioseg`, `nomenclatura`, `fecha`, `id_etAsunto`, `termino`, `id_destinatario`, `observaciones`, `atencion`, `id_ruta`, `id_informar`, `asunto`, `id_oficioEntrada`) VALUES (59, '400LI0010/0001/2018', '2018-09-01', 57, '2018-09-01 12:50:00', 57, 'PRUEBA', 1, 59, 92, 'PRUEBA', 60);
INSERT INTO `oficio_seguimiento` (`id_oficioseg`, `nomenclatura`, `fecha`, `id_etAsunto`, `termino`, `id_destinatario`, `observaciones`, `atencion`, `id_ruta`, `id_informar`, `asunto`, `id_oficioEntrada`) VALUES (68, '400LI0010/0002/2018', '2018-12-07', 66, '2018-12-07 16:09:00', 66, 'PRUEBA\r\n', 1, 68, 101, 'PRUEBA', 61);
INSERT INTO `oficio_seguimiento` (`id_oficioseg`, `nomenclatura`, `fecha`, `id_etAsunto`, `termino`, `id_destinatario`, `observaciones`, `atencion`, `id_ruta`, `id_informar`, `asunto`, `id_oficioEntrada`) VALUES (69, '400LIA000/0001/2018', '2018-12-08', 67, '2018-11-09 13:26:00', 67, 'TELFONIA', 6, 69, 102, 'TELEFONIA', 62);
INSERT INTO `oficio_seguimiento` (`id_oficioseg`, `nomenclatura`, `fecha`, `id_etAsunto`, `termino`, `id_destinatario`, `observaciones`, `atencion`, `id_ruta`, `id_informar`, `asunto`, `id_oficioEntrada`) VALUES (70, '400LIA000/0002/2018', '2018-12-05', 68, '2019-12-27 17:16:00', 68, 'PRUEBA', 1, 70, 103, 'PRUEBA', 63);
INSERT INTO `oficio_seguimiento` (`id_oficioseg`, `nomenclatura`, `fecha`, `id_etAsunto`, `termino`, `id_destinatario`, `observaciones`, `atencion`, `id_ruta`, `id_informar`, `asunto`, `id_oficioEntrada`) VALUES (71, '400LIA000/0022/2018', '2018-12-31', 69, '0000-00-00 00:00:00', 69, 'PRUEBA DE LA INSERCIÓN DE LOS TRES OFICIOS, RECEPCIÓN, SEGUIMIENTO Y ATENDIDO', 1, 71, 104, 'CREACIÓN DE OFICIO RECEPCIÓN, SEGUIMIENTO Y ATENDIDO', 64);
INSERT INTO `oficio_seguimiento` (`id_oficioseg`, `nomenclatura`, `fecha`, `id_etAsunto`, `termino`, `id_destinatario`, `observaciones`, `atencion`, `id_ruta`, `id_informar`, `asunto`, `id_oficioEntrada`) VALUES (72, '400LIA000/0001/2019', '2018-10-12', 75, '2018-10-11 16:00:00', 75, 'CURSO QUE IMPARTIRA LA EMBAJADA FRANCESA TENIENDO COMO FECHA PROBABLE DEL 12 AL 16 DE NOVIEMBRE DEL 2018, MANDAR EL LISTADO DE LAS PERSONAS A MASTARDAR EL DIA 17 DE OCTUBRE DEL 2018, \"SEGUIMIENTO, VIGILANCIAS, DETENCIONES Y MANEJO DE NETREGA DE RESCATE\"\r\n', 1, 77, 110, 'CURSO QUE IMPARTIRA LA EMBAJADA FRANCESA TENIENDO COMO FECHA PROBABLE DEL 12 AL 16 DE NOVIEMBRE DEL 2018, MANDAR EL LISTADO DE LAS PERSONAS A MASTARDAR EL DIA 17 DE OCTUBRE DEL 2018, \"SEGUIMIENTO, VIGILANCIAS, DETENCIONES Y MANEJO DE NETREGA DE RESCATE\"\r\n', 79);
INSERT INTO `oficio_seguimiento` (`id_oficioseg`, `nomenclatura`, `fecha`, `id_etAsunto`, `termino`, `id_destinatario`, `observaciones`, `atencion`, `id_ruta`, `id_informar`, `asunto`, `id_oficioEntrada`) VALUES (73, '400LI0010/0002/2019', '2018-11-23', 84, '2018-12-29 16:42:00', 84, 'PRUEBS', 1, 86, 119, 'PRUEBA DE NOMENCLATURA SECRETARIO PARTICULAR DE LA', 81);
INSERT INTO `oficio_seguimiento` (`id_oficioseg`, `nomenclatura`, `fecha`, `id_etAsunto`, `termino`, `id_destinatario`, `observaciones`, `atencion`, `id_ruta`, `id_informar`, `asunto`, `id_oficioEntrada`) VALUES (74, '400LI0010/0003/2019', '2018-10-05', 85, '2018-10-06 10:38:00', 85, 'FISCAL CENTRAL PARA LA ATENCON DE DELITOS VINCULADOS A LA VIOLENCIA DE GENERO. \r\n', 8, 87, 120, 'INVITACION A CONFERENCIA \"PREVENCION Y ERRADICACION DEL TRABAJO INFANTIL Y SU PERORES FORMAS DE EXPLOTACION\" \r\n', 82);


#
# TABLE STRUCTURE FOR: ruta_oficio
#

DROP TABLE IF EXISTS `ruta_oficio`;

CREATE TABLE `ruta_oficio` (
  `id_ruta` int(11) NOT NULL AUTO_INCREMENT,
  `realiza_diligencias` int(11) NOT NULL,
  `recibir_personalmente` int(11) NOT NULL,
  `gestionar_peticion` int(11) NOT NULL,
  `archivo` int(11) NOT NULL,
  `otras` varchar(250) NOT NULL,
  PRIMARY KEY (`id_ruta`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=latin1;

INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (58, 0, 1, 0, 0, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (59, 0, 1, 0, 0, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (68, 0, 1, 0, 0, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (69, 0, 1, 0, 0, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (70, 0, 0, 0, 1, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (71, 1, 1, 0, 0, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (77, 0, 0, 0, 1, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (85, 0, 0, 0, 1, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (86, 0, 0, 1, 0, '');
INSERT INTO `ruta_oficio` (`id_ruta`, `realiza_diligencias`, `recibir_personalmente`, `gestionar_peticion`, `archivo`, `otras`) VALUES (87, 0, 0, 1, 0, '');


#
# TABLE STRUCTURE FOR: tipousuario
#

DROP TABLE IF EXISTS `tipousuario`;

CREATE TABLE `tipousuario` (
  `id_tipoUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `tipoUsuario` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tipoUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO `tipousuario` (`id_tipoUsuario`, `tipoUsuario`) VALUES (1, 'ADMINISTRADOR');
INSERT INTO `tipousuario` (`id_tipoUsuario`, `tipoUsuario`) VALUES (2, 'COORDINADOR GENERAL');
INSERT INTO `tipousuario` (`id_tipoUsuario`, `tipoUsuario`) VALUES (3, 'SECRETARIADO');
INSERT INTO `tipousuario` (`id_tipoUsuario`, `tipoUsuario`) VALUES (4, 'CAPTURA');
INSERT INTO `tipousuario` (`id_tipoUsuario`, `tipoUsuario`) VALUES (5, 'COORDINADOR TIPO 2');


#
# TABLE STRUCTURE FOR: usuario
#

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellidop` varchar(50) NOT NULL,
  `apellidom` varchar(50) NOT NULL,
  `activo` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_tipoUsuario` int(11) NOT NULL,
  `id_dependencias` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_tipoUsuario` (`id_tipoUsuario`),
  KEY `id_dependencias` (`id_dependencias`),
  CONSTRAINT `usuario` FOREIGN KEY (`id_dependencias`) REFERENCES `dependencias` (`id_dependencias`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_tipoUsuario`) REFERENCES `tipousuario` (`id_tipoUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellidop`, `apellidom`, `activo`, `correo`, `password`, `id_tipoUsuario`, `id_dependencias`) VALUES (1, 'ADMINISTRADOR', 'ADMIN', 'ADMIN', 1, 'mmendezg@fiscaliaedomex.gob.mx', 'c3VwZXJ1c3Vhcmlv', 1, 1);
INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellidop`, `apellidom`, `activo`, `correo`, `password`, `id_tipoUsuario`, `id_dependencias`) VALUES (2, 'lprueba', 'coordinador', 'pruebacoord', 1, 'lprueba@gmail.com', 'Y29vcmRpbmFkb3I=', 2, 1);
INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellidop`, `apellidom`, `activo`, `correo`, `password`, `id_tipoUsuario`, `id_dependencias`) VALUES (3, 'Secretaria', 'psecretariado', 'psecretariado', 1, 'secretariado@gmail.com', 'c2VjcmV0YXJpYWRv', 3, 1);
INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellidop`, `apellidom`, `activo`, `correo`, `password`, `id_tipoUsuario`, `id_dependencias`) VALUES (4, 'RODRIGO', 'ARCHUNDIA', 'BARRIENTOS', 1, 'rarchundia@fiscaliaedomex.gob.mx', 'cmFyY2h1bmRpYQ==', 2, 1);
INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellidop`, `apellidom`, `activo`, `correo`, `password`, `id_tipoUsuario`, `id_dependencias`) VALUES (6, 'ABRAHAM', 'ESTEBAN', 'ACOSTA', 1, 'aestebana@fiscaliaedomex.gob.mx', 'YWVzdGViYW5h', 5, 1);
INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellidop`, `apellidom`, `activo`, `correo`, `password`, `id_tipoUsuario`, `id_dependencias`) VALUES (7, 'PCaptura', 'P', 'Captura', 1, 'captura@fiscaliaedomex.gob.mx', 'Y2FwdHVyYTE=', 4, 1);
INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellidop`, `apellidom`, `activo`, `correo`, `password`, `id_tipoUsuario`, `id_dependencias`) VALUES (8, 'Coordinadortipo2', 'tipo2', 'tipo2', 1, 'coordinadorTipo2@gmail.com', 'bWNvbnN1bHRh', 5, 1);


