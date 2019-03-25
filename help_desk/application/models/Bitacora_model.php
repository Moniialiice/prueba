<?php 

class Bitacora_model extends CI_model
{
    public function __construct()
    {
        $this->load->database();
    }
    //inserción de los registros para la bitacora id usuario, registro y fecha y hora
    public function insertBitacora($id,$registro,$fechaB,$horaB){
        $query = $this->db->query("INSERT INTO bitacora_sigo (idusuario_bit, registro_bit, fecha_bit, hora_bit) VALUES ('$id','$registro','$fechaB','$horaB')");
        $this->db->close();
        if($query){
            return true;
        }else{
            return false;
        }
    }
    //consulta de los registros por usuario y fechas
    public function searchfechaBitacora($search, $fecha1, $fecha2)
    {
        $query = $this->db->query("SELECT b.id_bitacora, b.idusuario_bit, b.registro_bit, b.fecha_bit, b.hora_bit, u.id_usuario, u.nombre, u.apellidop, u.apellidom from bitacora_sigo as b, usuario as u WHERE u.nombre LIKE '%$search%' AND b.fecha_bit BETWEEN '$fecha1' AND '$fecha2' AND u.id_usuario = b.idusuario_bit ORDER by b.id_bitacora DESC");
        return $query->result();
        $this->db->close();
    }
}    