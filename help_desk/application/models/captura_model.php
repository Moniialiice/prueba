<?php 

class Captura_model extends CI_model
{
    public function __construct()
    {
        $this->load->database();
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
        $query = $this->db->query("SELECT c.id_ofseg, c.nomen_ofseg, c.fecha_ofseg, c.aten_ofseg, c.termino_ofseg, c.obs_ofseg, d.conase, d.valle_toluca, d.valle_mexico, d.zona_oriente, d.fiscal_general, d.vicefiscalia, d.oficialia_mayor, d.informacion_estadistica, d.central_juridico, d.servicio_carrera, d.otra, u.nombre, u.apellidop, u.apellidom FROM captura AS c, destinatario AS d, usuario AS u WHERE c.fecha_ofseg BETWEEN '$date1' AND '$date2' AND c.nomen_ofseg LIKE '%$search%' AND c.id_dest_ofseg = d.id_destinatario AND c.aten_ofseg = u.id_usuario ORDER BY c.fecha_ofseg ");
        return $query->result();
    }

}    

?>