<?php 

class Captura_model extends CI_model
{
    public function __construct()
    {
        $this->load->database();
    }

    //consulta los usuarios que sean diferentes de administrador y coordinador
    public function getUsuarios(){
        $query = $this->db->query("SELECT id_usuario, nombre, apellidop, apellidom FROM usuario WHERE id_usuario != '1' AND id_usuario != '2'");
        $this->db->close();
        return $query->result();
    } 
    //manda datos a la función para insertar
    public function insertaCaptura($oficio_rec, $fecha1, $fecha2, $fecha3, $firma_origen_rec, $cargo_rec, $peticion_rec, $entrada, 
    $oficina, $peticionario, $requiriente, 
    $colaboracion, $amparo, $solicitudes, $gestion, $cursos, $juzgados, $rh, $estadistica, $telefonia, $ri, $boletas, $conocimiento, 
    $conase, $toluca, $mexico, $zoriente, $fgeneral, $vicefiscalia, $oficialia, $informacion, $central, $servicio, $otrad, 
    $diligencia, $personalmente, $gestionar, $archivo, $otrar, 
    $nomenclatura, $fecha4, $asunto_seg, $observaciones, $fecha5, $atencion, 
    $fecha6, $nombre_aten, $cargo_aten, $archivo_aten, $descripcion_aten, $copia_aten)
    {
        $query = $this->db->query("SELECT INSERTCAPTURA ('$oficio_rec', '$firma_origen_rec', '$cargo_rec', '$peticion_rec', '$entrada', '$fecha1', '$fecha2', '$fecha3',
        '$oficina', '$peticionario', '$requiriente',
        '$colaboracion', '$amparo', '$solicitudes', '$gestion', '$cursos', '$juzgados', '$rh', '$estadistica', '$telefonia', '$ri', '$boletas', '$conocimiento', 
        '$conase', '$toluca', '$mexico', '$zoriente', '$fgeneral', '$vicefiscalia', '$oficialia', '$informacion', '$central', '$servicio', '$otrad',
        '$diligencia', '$personalmente', '$gestionar', '$archivo', '$otrar', 
        '$nomenclatura', '$fecha4', '$fecha5', '$asunto_seg', '$atencion', '$observaciones', 
        '$fecha6', '$nombre_aten', '$cargo_aten', '$descripcion_aten', '$archivo_aten', '$copia_aten')");
         if($query){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    //consulta datos de oficio seguimiento de la tabla captura 
    public function consultaOSCaptura($search, $date1, $date2){
        $query = $this->db->query("SELECT c.id_ofseg, c.nomen_ofseg, c.asunto_ofseg, c.fecha_ofseg, c.aten_ofseg, c.termino_ofseg, c.obs_ofseg, d.conase, d.valle_toluca, d.valle_mexico, d.zona_oriente, d.fiscal_general, d.vicefiscalia, d.oficialia_mayor, d.informacion_estadistica, d.central_juridico, d.servicio_carrera, d.otra, u.nombre, u.apellidop, u.apellidom FROM captura AS c, destinatario AS d, usuario AS u WHERE c.fecha_ofseg BETWEEN '$date1' AND '$date2' AND c.nomen_ofseg LIKE '%$search%' AND c.id_dest_ofseg = d.id_destinatario AND c.aten_ofseg = u.id_usuario ORDER BY c.fecha_ofseg ");
        return $query->result();
        $this->db->close();
    }
    //consulta para la impresión de oficio seguimiento pdf
    public function reportOficioCap($id)
    {
        $query = $this->db->query("SELECT c.id_ofseg, c.nomen_ofseg, c.fecha_ofseg, c.termino_ofseg, c.obs_ofseg, c.asunto_ofseg, a.colaboracion, a.amparos, a.solicitudes, a.gestion, a.cursos_capacitaciones, a.juzgados, a.recursos_humanos, a.telefonia, a.estadistica, a.relaciones_interis, a.boletas_audiencia, a.copias_conocimiento, d.conase, d.valle_toluca, d.valle_mexico, d.zona_oriente, d.fiscal_general, d.vicefiscalia, d.oficialia_mayor, d.informacion_estadistica, d.central_juridico, d.servicio_carrera, d.otra, i.esta_oficina, i.peticionario, i.institucion_requiriente, r.realiza_diligencias, r.recibir_personalmente, r.gestionar_peticion, r.archivo, r.otras, u.nombre, u.apellidop, u.apellidom FROM captura as c, etiquetas_asunto AS a, destinatario as d, informar as i, ruta_oficio as r, usuario as u WHERE c.id_etA_ofseg = a.id_etAsunto AND c.id_dest_ofseg = d.id_destinatario AND c.id_inf_ofseg = i.id_informar AND c.id_ruta_ofseg = r.id_ruta AND c.aten_ofseg = u.id_usuario AND c.id_ofseg = $id ");
        $this->db->close();
        return $query->result();
    }
    //consulta oficio para bitacora de oficio seguimiento por id 
    public function nomenSegBit($id){
        $query = $this->db->query("SELECT nomen_ofseg FROM captura WHERE id_ofseg = '$id' ");
        $this->db->close();
        return $query->result();
    }
    //consulta de tabla captura atención
    public function consultaAtenCap($search, $date1, $date2){
        $query = $this->db->query("SELECT a.id_ofAtenCap, a.fecha_atenCap, a.nombre_atenCap, a.cargo_atenCap, a.descCap, a.arch_atenCap, a.copia_aCap, c.nomen_ofseg, u.nombre, u.apellidop, u.apellidom, u.activo FROM captura_atendido as a, captura as c, usuario as u WHERE c.nomen_ofseg LIKE '%$search%' AND a.fecha_atenCap BETWEEN '$date1' AND '$date2' AND a.atencionCap = u.id_usuario ORDER BY c.nomen_ofseg");
        $this->db->close();
        return $query->result();
    }
    //consulta de atendido para obtener datos para el oficio en pdf
    public function reportAtendidoCap($id){
        $query = $this->db->query("SELECT a.fecha_atenCap, a.nombre_atenCap, a.cargo_atenCap, a.descCap, a.copia_aCap, a.atencionCap, a.id_ofseg, c.nomen_ofseg FROM captura_atendido as a, captura as c WHERE c.id_ofseg = a.id_ofseg AND a.id_ofAtenCap = $id");
        $this->db->close();
        return $query->result();
    }
    //consulta oficio para bitacora de oficio seguimiento por id 
    public function nomenAtenBit($id){
        $query = $this->db->query("SELECT nomen_ofseg FROM captura as c, captura_atendido as a WHERE a.id_ofAtenCap=c.id_ofseg AND id_ofAtenCap = '$id' ");
        $this->db->close();
        return $query->result();
    }
    //consulta oficio seguimiento en la tabla captura 
    public function reportOficioID(){
        $query = $this->db->query("SELECT c.id_ofseg, c.nomen_ofseg, c.asunto_ofseg, c.fecha_ofseg, c.aten_ofseg, c.termino_ofseg, c.obs_ofseg, d.conase, d.valle_toluca, d.valle_mexico, d.zona_oriente, d.fiscal_general, d.vicefiscalia, d.oficialia_mayor, d.informacion_estadistica, d.central_juridico, d.servicio_carrera, d.otra, u.nombre, u.apellidop, u.apellidom FROM captura AS c, destinatario AS d, usuario AS u WHERE c.id_dest_ofseg = d.id_destinatario AND c.aten_ofseg = u.id_usuario ORDER BY c.nomen_ofseg ASC");
        $this->db->close();
        return $query->result();
    }
    //consulta oficio atendido por medio del id de usuario
    public function reportAtendidoID(){
        $query = $this->db->query("SELECT a.id_ofAtenCap, a.fecha_atenCap, a.nombre_atenCap, a.cargo_atenCap, a.descCap, a.arch_atenCap, a.copia_aCap, c.nomen_ofseg, u.nombre, u.apellidop, u.apellidom, u.activo FROM captura_atendido as a, captura as c, usuario as u WHERE a.atencionCap = u.id_usuario ORDER BY c.nomen_ofseg");
        $this->db->close();
        return $query->result();
    }
}    

?>