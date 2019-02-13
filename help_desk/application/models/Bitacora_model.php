<?php 

class Bitacora_model extends CI_model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function insertBitacora($id,$registro,$fechaB){
        $query = $this->db->query("INSERT INTO bitacora_sigo (idusuario_bit, registro_bit, fecha_hora_bit) VALUES ('$id','$registro','$fechaB')");
        if($query){
            return true;
        }else{
            return false;
        }
    }
}    