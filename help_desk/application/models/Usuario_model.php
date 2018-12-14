<?php
/**
 * Created by PhpStorm.
 * User: MesaAyuda
 * Date: 22/08/2018
 * Time: 04:06 PM
 */
class Usuario_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    public function getDatos($user,$pass)
    {
        $p = base64_encode($pass); //se encripta contraseña por medio de base64
        $this->db->select('id_usuario, nombre, id_tipoUsuario, activo');
        $this->db->from('usuario');
        $this->db->where('password', $p);
        $this->db->where('correo',$user);
        $this->db->where('activo', 1);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }
    //consulta todos los datos de usuario, tipo de usuario y dependencia por id del usuario
    public function muestraUsuario($id)
    {
        $query = $this->db->query("SELECT u.id_usuario, u.apellidop, u.apellidom, u.nombre, u.activo, u.correo, u.password, t.id_tipoUsuario, t.tipoUsuario, d.id_dependencias, d.dependencias 
                                    FROM usuario AS u, tipousuario as t, dependencias as d 
                                    WHERE u.id_tipoUsuario = t.id_tipoUsuario AND u.id_usuario = '$id'");
        return $query->result();
    }
    //consulta el tipo de usuario para el nuevo registro de usuario
    public function tipoUsuario()
    {
        $query = $this->db->query("SELECT * FROM tipousuario ORDER BY tipoUsuario ASC");
        return $query->result();
    }
    //muestra todas las dependencias para el nuevo registro de usuario
    public function getDependencia ()
    {
        $query = $this->db->query("SELECT * FROM dependencias ORDER BY dependencias ASC");
        return $query->result();
    }
    //inserta los datos del usuario
    public function createUsuario($name,$app,$apm,$email,$pass,$activo,$tipoUser,$dependencia)
    {
        $p = base64_encode($pass); //encripta contraseña en base64
        $query = $this->db->query("INSERT INTO usuario (nombre, apellidop, apellidom, activo, correo, password, id_tipoUsuario, id_dependencias) VALUES ('$name','$app','$apm','$activo','$email','$p','$tipoUser','$dependencia')");
        if($query){
            return true;
        }else{
            return false;
        }
    }
    //busqueda de usuario por nombre o usuario
    public function search_usuario($search)
    {
        $query = $this->db->query("SELECT u.id_usuario, u.correo, u.nombre, u.apellidop, u.apellidom, u.activo, u.id_tipoUsuario, t.tipoUsuario FROM usuario AS u, tipousuario as t WHERE u.nombre LIKE '%$search%' AND u.id_tipoUsuario=t.id_tipoUsuario ORDER BY id_usuario ASC");
        return $query->result();
    }
    //muestra tipo de usuario que es diferente al que tiene el usuario para modificar
    public function tipoUsuarioId($id)
    {
        $query = $this->db->query("SELECT t.id_tipoUsuario, t.tipoUsuario FROM usuario AS u, tipousuario as t WHERE u.id_usuario = '$id' AND t.id_tipoUsuario NOT LIKE u.id_tipoUsuario");
        return $query->result();
    }
    //muestra dependencias que son diferentes a la que tiene el usuario
    public function dependenciasId($id)
    {
        $query = $this->db->query("SELECT d.id_dependencias, d.dependencias FROM dependencias AS d, usuario AS u WHERE u.id_usuario = '$id' AND d.id_dependencias NOT LIKE u.id_dependencias");
        return $query->result();
    }
    //modifica los datos del usuario
    public function updateUsuario($id,$name,$app,$apm,$activo,$email,$password,$tipoUser,$dependencia)
    {
        $p = base64_encode($password); //encripta contraseña en base64
        $query = $this->db->query("UPDATE usuario SET nombre = '$name', apellidop = '$app', apellidom = '$apm', activo = '$activo', correo = '$email', password = '$p', id_tipoUsuario = '$tipoUser', id_dependencias = '$dependencia' WHERE id_usuario = '$id'");
        if($query){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    //modifica sólo contraseña del usuario (perfil)
    public function updatePassword($pass,$id)
    {
        $p = base64_encode($pass); //encripta contraseña en base64
        $query = $this->db->query("UPDATE usuario as u SET u.password = '$p' WHERE u.id_usuario = '$id'");
        if($query){
            return TRUE;
        }else{
            return FALSE;
        }
    }    
    //Función para eliminar usuario, no se usa ya que los oficios tienen registrado el usuario  que lo creó
    public function deleteUsuario($id_usuario)
    {
        $query = $this->db->query("DELETE from usuario WHERE id_usuario = '$id_usuario'");
        return $query->result();
    }    
    //obtenemos el total de filas para hacer la paginación
	function filas($search) {
        $this->db->like('correo', $search);
        $consulta = $this->db->get('usuario');
        return $consulta->num_rows();
    }      
    //obtenemos todas las provincias a paginar con la función
    //total_posts_paginados pasando la cantidad por página y el segmento
    //como parámetros de la misma
	function total_paginados($search, $por_pagina, $segmento) {
        $this->db->like('correo', $search);
        $consulta = $this->db->get('usuario', $por_pagina, $segmento);
        if ($consulta->num_rows() > 0) {
            foreach ($consulta->result() as $fila) {
            $data[] = $fila;
        }
            return $data;
        }
    }

}