/**funcion para insertar en la tabla informar*/
DELIMITER //
CREATE FUNCTION insertInformar (oficina INT, peticionario INT, requiriente INT)
RETURNS INT
BEGIN 
    DECLARE ID INT;
    INSERT INTO informar (esta_oficina, peticionario, institucion_requiriente) VALUES (oficina, peticionario, requiriente);
    SELECT LAST_INSERT_ID() INTO ID;
    RETURN ID;
END;
//
/**FUNCION PARA INSERTAR EN LA TABLA etiquetas_asunto*/
DELIMITER //
CREATE FUNCTION insertEtiquetas (colaboracion INT, amparo INT, solicitudes INT, gestion INT, cursos INT, juzgados INT, rh INT, telefonia INT, estadistica INT, ri INT, boletas INT, conocimiento INT)
RETURNS INT
    BEGIN 
        DECLARE ID INT;
        INSERT INTO etiquetas_asunto (colaboracion, amparos, solicitudes, gestion, cursos_capacitaciones, juzgados, recursos_humanos, telefonia, estadistica, relaciones_interis, boletas_audiencia, copias_conocimiento) VALUES (colaboracion, amparo, solicitudes, gestion, cursos, juzgados, rh, telefonia, estadistica, ri, boletas, conocimiento);            
        SELECT LAST_INSERT_ID() INTO ID;
        RETURN ID;
    END;
    //
/**FUNCION PARA INSERTAR EN TABLA destinatario */
DELIMITER //
CREATE FUNCTION insertDestinatario (conase INT, toluca INT, mexico INT, zoriente INT, fgeneral INT, vicefiscalia INT, oficialia INT, informacion INT, central INT, servicio INT, otrad LONGTEXT)
RETURNS INT
    BEGIN 
        DECLARE ID INT;
        INSERT INTO destinatario (conase, valle_toluca, valle_mexico, zona_oriente, fiscal_general, vicefiscalia, oficialia_mayor, informacion_estadistica, central_juridico, servicio_carrera, otra) VALUES (conase, toluca, mexico, zoriente, fgeneral, vicefiscalia, oficialia, informacion, central, servicio, otrad);
        SELECT LAST_INSERT_ID() INTO ID;
        RETURN ID;
    END;
        //
/**funcion para insertar en la tabla ruta_oficio */
DELIMITER //
CREATE FUNCTION insertRutaOficio (diligencia INT, personalmente INT, gestionar INT, archivo INT, otrar INT)
    RETURNS INT
    BEGIN 
        DECLARE ID INT;
        INSERT INTO ruta_oficio (realiza_diligencias, recibir_personalmente, gestionar_peticion, archivo, otras) VALUES (diligencia, personalmente, gestionar, archivo, otrar);
        SELECT LAST_INSERT_ID() INTO ID;
        RETURN ID;
    END;
        //     
/**funcion para insertar en la tabla oficio seguimiento */
DELIMITER //
CREATE FUNCTION insertOficioS (nomeclatura varchar(50), fecha DATE, id_etAsunto INT, termino INT, id_destinatario INT, observaciones LONGTEXT, atencion INT, id_ruta INT, id_informar INT, asunto INT, id_entrada INT)
    RETURNS INT
    BEGIN
    	DECLARE ID INT;
        INSERT INTO oficio_seguimiento (nomenclatura, fecha, id_etAsunto, termino, id_destinatario, observaciones, arch_seguimiento, arch_final, atencion, id_ruta, id_informar, asunto, id_oficioEntrada) VALUES (nomenclatura, fecha, id_etAsunto, termino, id_destinatario, observaciones, '', '', atencion, id_ruta, id_informar, asunto, id_entrada);
        SELECT LAST_INSERT_ID() INTO ID;
        RETURN ID;
    END
    // 

DELIMITER //
CREATE FUNCTION INSERTOFICIO (oficina INT, peticionario INT, requiriente INT, colaboracion  INT, amparo INT, solicitudes INT, gestion INT, cursos INT, juzgados INT, rh INT, telefonia INT, estadistica INT, ri INT, boletas INT, conocimiento INT, conase INT, toluca INT, mexico INT, zoriente INT, fgeneral INT, vicefiscalia INT, oficialia INT, informacion INT, central INT, servicio INT, otrad LONGTEXT, diligencia INT, personalmente INT, gestionar INT, archivo INT, otrar LONGTEXT, nomenclatura VARCHAR(100), fecha DATE, termino INT, observaciones LONGTEXT, atencion INT, asunto LONGTEXT, id_entrada INT) 
RETURNS INT
BEGIN
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

RETURN IDO;
END

//

DELIMITER //
CREATE FUNCTION INSERTCAPTURA (oficio_rec VARCHAR(100), firma_origen_rec VARCHAR(200), cargo_rec LONGTEXT, peticion_rec LONGTEXT, entrada LONGTEXT, fecha_r DATETIME, fecha_rec DATETIME, fecha_recr DATE, oficina INT, peticionario INT, requiriente INT, colaboracion INT, amparo INT, solicitudes INT, gestion INT, cursos INT, juzgados INT, rh INT, telefonia INT, estadistica INT, ri INT, boletas INT, conocimiento INT,
conase INT, toluca INT, mexico INT, zoriente INT, fgeneral INT, vicefiscalia INT, oficialia INT, informacion INT, central INT, servicio INT, otrad LONGTEXT, diligencia INT, personalmente INT, gestionar INT, archivo INT, otrar LONGTEXT, nomenclatura VARCHAR(100), fecha DATE, termino DATETIME, observaciones LONGTEXT, atencion INT, asunto LONGTEXT, fecha_aten DATE, nombre_aten VARCHAR(100), cargo_aten VARCHAR(100), descripcion_aten LONGTEXT, archivo_aten VARCHAR(100), copia_aten LONGTEXT)
RETURNS INT
BEGIN
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
	INSERT INTO oficio_atendido (fecha_atendido, nombre_aten, cargo_aten, descripcion, arch_atendido, copia_a, id_oficioseg, atencion) VALUES (fecha_aten, nombre_aten, cargo_aten, descripcion_aten, archivo_aten, copia_aten, IDO, atencion);
    	SELECT LAST_INSERT_ID() INTO IDA;
RETURN IDO;
END
//

SELECT INSERTCAPTURA 
('ENPRUEBA31122018', 'LIC MARCELO GUZAMN GARCIA', 'MINISTERIO PUBLICO', 'REALIZAR PRUEBA EN BASE A LA CAPTURA DE LOS TRES OFICIOS CREADOS', '', '2018-12-31 10:28:00', '2018-12-31 10:28:00', '2018-12-31',
0, 1, 0,
1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 
1, 1, 1, 1, 0, 0, 0, 0, 0, 0, '',
1, 1, 0, 0, '', 
'400LIA000/0022/2018', '2018-12-31', '2018-12-31 17:30:00', 'PRUEBA DE LA INSERCIÓN DE LOS TRES OFICIOS, RECEPCIÓN, SEGUIMIENTO Y ATENDIDO', 1, 
'CREACIÓN DE OFICIO RECEPCIÓN, SEGUIMIENTO Y ATENDIDO', '2018-12-31', 'ADMINISTRADOR', 'CARGO ADMINISTRADOR', 'VERIFICACIÓN DE LA CREACIÓN DE OFICIO RECEPCIÓN, SEGUIMIENTO Y ATENDIDO', '', 'C.c. CORDINADOR')