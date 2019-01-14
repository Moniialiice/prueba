<?php
/**
 * Created by PhpStorm.
 * User: MesaAyuda
 * Date: 30/08/2018
 * Time: 02:52 PM
 */

class Entrada_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    //funcion para dar de alta el oficio de entrada
    public function createOficio($no_oficio,$firma_origen,$cargo,$peticion,$arch_entrada,$id_usuario,$fecha,$fecha2,$fecha_r)
    {
        $query = $this->db->query("INSERT INTO oficio_entrada(no_oficioEntrada, firma_origen, cargo, peticion, arch_entrada, atencion, fecha_ent, fecha_rec, fecha_real) VALUES ('$no_oficio','$firma_origen','$cargo','$peticion','$arch_entrada','$id_usuario','$fecha','$fecha2','$fecha_r')");
        if ($query) {
            return true;
        }else{
            return false;
        }
    }
    //busqueda con fecha y no. de nomenclatura
    public function searchFecha($search,$date1,$date2)
    {
        $query = $this->db->query("SELECT e.id_oficioEntrada, e.no_oficioEntrada, e.firma_origen, e.cargo, e.peticion, e.arch_entrada, e.fecha_ent, e.fecha_rec, e.fecha_real, u.nombre, u.apellidop, u.apellidom FROM oficio_entrada as e, usuario as u WHERE e.no_oficioEntrada LIKE '%$search%' AND e.fecha_real BETWEEN '$date1' AND '$date2' AND e.atencion = u.id_usuario ORDER BY e.fecha_rec DESC");
        return $query->result();
    }
    //reporte de los oficios de entrada que el usuario ha creado
    public function reportEntrada()
    {
        $query = $this->db->query("SELECT id_oficioEntrada, no_oficioEntrada, firma_origen, peticion, arch_entrada, fecha_ent, fecha_rec, fecha_real, u.nombre FROM oficio_entrada as e, usuario as u WHERE e.atencion = u.id_usuario");
        return $query->result();
    }
    //consulta de los oficios de entrada con el id de quien atendio el oficio
    public function reportEntradaId($id)
    {
        $query = $this->db->query("SELECT e.id_oficioEntrada, e.no_oficioEntrada, e.firma_origen, e.peticion, e.arch_entrada, e.fecha_ent, e.fecha_rec, e.fecha_real, e.atencion, u.nombre FROM oficio_entrada as e, usuario as u WHERE e.atencion = u.id_usuario and e.atencion='$id' ORDER BY id_oficioEntrada ASC");
        return $query->result();
    }
    //obtenemos el total de filas para hacer la paginación
	function filas($id) {
        $query = $this->db->query("SELECT e.id_oficioEntrada, e.no_oficioEntrada, e.firma_origen, e.peticion, e.arch_entrada, e.fecha_ent, e.fecha_rec, e.fecha_real, e.atencion, u.nombre FROM oficio_entrada as e, usuario as u WHERE e.atencion = u.id_usuario and e.atencion='$id' ORDER BY id_oficioEntrada ASC");
        return $query->num_rows();
    }      
    //obtenemos todas las provincias a paginar con la función
    //total_posts_paginados pasando la cantidad por página y el segmento
    //como parámetros de la misma
	function total_paginados($id, $por_pagina, $segmento){
        $this->db->where('atencion', $id);
        $consulta = $this->db->get('oficio_entrada', $por_pagina, $segmento);
        if ($consulta->num_rows() > 0) {
            foreach ($consulta->result() as $fila) {
            $data[] = $fila;
            }
            return $data;
        }
    }

}