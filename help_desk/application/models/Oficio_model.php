<?php
/**
 * Created by PhpStorm.
 * User: MesaAyuda
 * Date: 21/08/2018
 * Time: 06:02 PM
 */
class Oficio_model extends CI_Model{
    public function __construct()
    {
        $this->load->database();
    }
    //muestra id y número de oficio del oficio recepción para agregarlos al nuevo oficio
    public function datosEntrada($id)
    {
        $query = $this->db->query("SELECT id_oficioEntrada, no_oficioEntrada FROM oficio_entrada WHERE id_oficioEntrada = '$id'");
        return $query->result();
        $this->db->close();
    }    
    //consulta si el id_oficioseg existe 
    public function entradaSeguimiento($id)
    {
        $query = $this->db->query("SELECT id_oficioseg FROM oficio_seguimiento WHERE id_oficioEntrada = '$id'");
        $this->db->close();
        return $query->result();
    }
    //consulta si el id_oficioseg existe en la tabla captura
    public function capturaSeguimiento($id)
    {
        $query = $this->db->query("SELECT id_ofseg FROM captura WHERE id_oficioEntrada_ofseg = '$id'");
        $this->db->close();
        return $query->result();
    }
    //se obtiene ultima nomenclatura de oficio seguimiento
    public function getNom($nom){
        $query = $this->db->query("SELECT id_oficioseg, nomenclatura FROM oficio_seguimiento WHERE nomenclatura LIKE '%$nom%' ORDER by id_oficioseg DESC LIMIT 1");
        $this->db->close();
        return $query->result();
    }
    //se obtiene ultima nomenclatura de oficio seguimiento
    public function getNomAtendido($nom){
        $query = $this->db->query("SELECT id_oficioAtendido, nomenclatura_aten FROM oficio_atendido WHERE nomenclatura_aten LIKE '%$nom%' ORDER BY id_oficioAtendido DESC LIMIT 1");
        $this->db->close();
        return $query->result();
    }
    //se obtiene ultima nomenclatura de oficio seguimiento
    public function getNomBit($id){
        $query = $this->db->query("SELECT nomenclatura FROM oficio_seguimiento WHERE id_oficioseg = '$id'");
        $this->db->close();
        return $query->result();
    }
    //llama oficio para insertar oficio seguimiento
    public function insert_Oficio($oficina, $peticionario, $requiriente, $colaboracion, $amparo, $solicitudes, $gestion, $cursos, $juzgados, $rh, $telefonia, $estadistica, $ri, $boletas, $conocimiento, $conase, $toluca, $mexico, $zoriente, $fgeneral, $vicefiscalia, $oficialia, $informacion, $central, $servicio, $otrad, $diligencia, $personalmente, $gestionar, $archivo, $otrar, $nomenclatura, $fecha, $termino, $observaciones, $atencion, $asunto, $ide)
    {
        $query = $this->db->query("SELECT INSERTOFICIO ('$oficina','$peticionario','$requiriente','$colaboracion', '$amparo', '$solicitudes', '$gestion', '$cursos', '$juzgados', '$rh', '$telefonia', '$estadistica', '$ri','$boletas','$conocimiento', '$conase', '$toluca', '$mexico', '$zoriente', '$fgeneral', '$vicefiscalia', '$oficialia', '$informacion', '$central', '$servicio', '$otrad', '$diligencia', '$personalmente', '$gestionar', '$archivo', '$otrar', '$nomenclatura','$fecha', '$termino', '$observaciones', '$atencion', '$asunto', '$ide')");
        if($query){
            return TRUE;
        }else{
            return FALSE;
        }
        $this->db->close();
    }
    //obtener el id de oficio seguimiento por medio de nomenclatura
    public function getIDO($nomenclatura)
    {
        $query = $this->db->query("SELECT id_oficioseg FROM oficio_seguimiento WHERE nomenclatura = '$nomenclatura'");
        $this->db->close();
        return $query->result();
    }
    //consulta con la fecha y nomenclatura de oficio
    public function searchDate($search,$asunto,$date1,$date2){
        $query = $this->db->query("SELECT e.fecha_rec, o.id_oficioseg, o.nomenclatura, o.fecha, o.asunto, o.termino, o.atencion, o.observaciones, d.conase, d.valle_toluca, d.valle_mexico, d.zona_oriente, d.fiscal_general, d.vicefiscalia, d.oficialia_mayor, d.informacion_estadistica, d.central_juridico, d.servicio_carrera, d.otra, u.nombre, u.apellidop, u.apellidom FROM oficio_seguimiento AS o, destinatario AS d, usuario AS u, oficio_entrada as e WHERE fecha BETWEEN '$date1' AND '$date2' AND nomenclatura LIKE '%$search%' AND o.asunto LIKE '%$asunto%' AND e.id_oficioEntrada = o.id_oficioEntrada AND o.id_destinatario = d.id_destinatario AND o.atencion = u.id_usuario ORDER BY o.fecha DESC");
        $this->db->close();
        return $query->result();
    }    
    //consulta con la fecha y nomenclatura de oficio solo los turnos que no fueron atendidos
    public function searchDateTur($search,$asunto,$date1,$date2){
        $query = $this->db->query("SELECT e.fecha_rec, o.id_oficioseg, o.nomenclatura, o.fecha, o.asunto, o.termino, o.atencion, o.observaciones, d.conase, d.valle_toluca, d.valle_mexico, d.zona_oriente, d.fiscal_general, d.vicefiscalia, d.oficialia_mayor, d.informacion_estadistica, d.central_juridico, d.servicio_carrera, d.otra, u.nombre, u.apellidop, u.apellidom FROM oficio_seguimiento AS o, destinatario AS d, usuario AS u, oficio_entrada as e WHERE fecha BETWEEN '$date1' AND '$date2' AND nomenclatura LIKE '%$search%' AND o.asunto LIKE '%$asunto%' AND e.id_oficioEntrada = o.id_oficioEntrada AND o.id_destinatario = d.id_destinatario AND o.atencion = u.id_usuario AND NOT EXISTS (SELECT id_seg FROM re_seg_aten WHERE id_seg = o.id_oficioseg) ORDER BY o.fecha DESC");
        $this->db->close();
        return $query->result();
    }
    //consulta oficios atendidos
    public function searchDateAten($search,$asunto,$date1,$date2){
        $query = $this->db->query("SELECT e.fecha_rec, o.id_oficioseg,o.nomenclatura, o.fecha, o.asunto, o.termino, o.atencion, o.observaciones, d.conase, d.valle_toluca, d.valle_mexico, d.zona_oriente, d.fiscal_general, d.vicefiscalia, d.oficialia_mayor, d.informacion_estadistica, d.central_juridico, d.servicio_carrera, d.otra, u.nombre, u.apellidop, u.apellidom, r.id_seg FROM oficio_seguimiento AS o, destinatario AS d, usuario AS u, oficio_entrada as e, re_seg_aten as r WHERE fecha BETWEEN '$date1' AND '$date2' AND nomenclatura LIKE '%$search%' AND o.asunto LIKE '%$asunto%'AND e.id_oficioEntrada = o.id_oficioEntrada AND o.id_destinatario = d.id_destinatario AND o.atencion = u.id_usuario AND o.id_oficioseg = r.id_seg ORDER BY o.fecha DESC");
        $this->db->close();
        return $query->result();
    }
    //consulta con la fecha y nomenclatura de oficio que ha creado el usuario 
    public function searchDI($search, $date1, $date2, $id){
        $query = $this->db->query("SELECT e.fecha_rec, o.id_oficioseg, o.nomenclatura, o.fecha, o.asunto, o.termino, o.atencion, o.observaciones, d.conase, d.valle_toluca, d.valle_mexico, d.zona_oriente, d.fiscal_general, d.vicefiscalia, d.oficialia_mayor, d.informacion_estadistica, d.central_juridico, d.servicio_carrera, d.otra, u.nombre, u.apellidop, u.apellidom FROM oficio_seguimiento AS o, destinatario AS d, usuario AS u, oficio_entrada as e WHERE fecha BETWEEN '$date1' AND '$date2' AND nomenclatura LIKE '%$search%' AND e.id_oficioEntrada = o.id_oficioEntrada AND o.id_destinatario = d.id_destinatario AND o.atencion = u.id_usuario AND u.id_usuario = '$id' ORDER BY o.fecha DESC");
        $this->db->close();
        return $query->result();
    }
    //consulta de Oficio mediante id, muestra todos los datos de oficio (usuario, entrada,) 
    public function report($id)
    {
        $query = $this->db->query("SELECT o.id_oficioseg, o.nomenclatura, o.fecha, o.termino, o.observaciones, o.asunto, a.colaboracion, a.amparos, a.solicitudes, a.gestion, a.cursos_capacitaciones, a.juzgados, a.recursos_humanos, a.telefonia, a.estadistica, a.relaciones_interis, a.boletas_audiencia, a.copias_conocimiento, d.conase, d.valle_toluca, d.valle_mexico, d.zona_oriente, d.fiscal_general, d.vicefiscalia, d.oficialia_mayor, d.informacion_estadistica, d.central_juridico, d.servicio_carrera, d.otra, i.esta_oficina, i.peticionario, i.institucion_requiriente, r.realiza_diligencias, r.recibir_personalmente, r.gestionar_peticion, r.archivo, r.otras, en.id_oficioEntrada, en.no_oficioEntrada, u.nombre, u.apellidop, u.apellidom FROM oficio_seguimiento AS o, destinatario AS d, etiquetas_asunto AS a, informar AS i, ruta_oficio AS r, oficio_entrada AS en, usuario AS u WHERE d.id_destinatario = o.id_destinatario AND a.id_etAsunto = o.id_etAsunto AND i.id_informar = o.id_informar AND r.id_ruta = o.id_ruta AND i.id_informar = o.id_informar AND o.id_oficioEntrada = en.id_oficioEntrada AND u.id_usuario = o.atencion AND id_oficioseg = '$id' ");
        $this->db->close();
        return $query->result();
    }
    //consulta de Oficio mediante id, muestra todos los datos de oficio en captura (usuario, entrada,) 
    public function reportCaptura($id)
    {
        $query = $this->db->query("SELECT c.id_ofseg, c.nomen_ofseg, c.fecha_ofseg, c.termino_ofseg, c.asunto_ofseg, c.obs_ofseg, a.colaboracion, a.amparos, a.solicitudes, a.gestion, a.cursos_capacitaciones, a.juzgados, a.recursos_humanos, a.telefonia, a.estadistica, a.relaciones_interis, a.boletas_audiencia, a.copias_conocimiento, d.conase, d.valle_toluca, d.valle_mexico, d.zona_oriente, d.fiscal_general, d.vicefiscalia, d.oficialia_mayor, d.informacion_estadistica, d.central_juridico, d.servicio_carrera, d.otra, i.esta_oficina, i.peticionario, i.institucion_requiriente, r.realiza_diligencias, r.recibir_personalmente, r.gestionar_peticion, r.archivo, r.otras, en.id_oficioEntrada, en.no_oficioEntrada, u.nombre, u.apellidop, u.apellidom FROM captura AS c, destinatario AS d, etiquetas_asunto AS a, informar AS i, ruta_oficio AS r, oficio_entrada AS en, usuario AS u WHERE a.id_etAsunto = c.id_etA_ofseg AND d.id_destinatario = c.id_dest_ofseg AND i.id_informar = c.id_inf_ofseg AND r.id_ruta  = c.id_ruta_ofseg AND en.id_oficioEntrada = c.id_oficioEntrada_ofseg AND u.id_usuario = c.aten_ofseg AND c.id_ofseg = '$id'");
        $this->db->close();
        return $query->result();
    }
    //consulta de oficio y destinatario mediante el id para generar reporte en pdf 
    public function reportOficio($id)
    {
        $query = $this->db->query("SELECT o.id_oficioseg, o.nomenclatura, o.fecha, o.termino, o.observaciones, o.asunto, a.colaboracion, a.amparos, a.solicitudes, a.gestion, a.cursos_capacitaciones, a.juzgados, a.recursos_humanos, a.telefonia, a.estadistica, a.relaciones_interis, a.boletas_audiencia, a.copias_conocimiento, d.conase, d.valle_toluca, d.valle_mexico, d.zona_oriente, d.fiscal_general, d.vicefiscalia, d.oficialia_mayor, d.informacion_estadistica, d.central_juridico, d.servicio_carrera, d.otra, i.esta_oficina, i.peticionario, i.institucion_requiriente, r.realiza_diligencias, r.recibir_personalmente, r.gestionar_peticion, r.archivo, r.otras, u.nombre, u.apellidop, u.apellidom FROM oficio_seguimiento AS o, destinatario AS d, etiquetas_asunto AS a, informar AS i, ruta_oficio AS r, usuario AS u WHERE d.id_destinatario = o.id_destinatario AND a.id_etAsunto = o.id_etAsunto AND i.id_informar = o.id_informar AND r.id_ruta = o.id_ruta AND i.id_informar = o.id_informar AND u.id_usuario = o.atencion AND id_oficioseg = '$id' ");
        $this->db->close();
        return $query->result();
    }

}
