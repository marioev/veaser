<?php

class Nivel_model  extends CI_Model 
{
    function __construct(){
        parent::__construct();
    }
    /**
     * Obtener todos los niveles
     */
    function get_all_niveles(){
        return $this->db->query(
            "SELECT 
                n.*, e.estado_descripcion
            FROM
                nivel n, estado e
            WHERE
                n.estado_id = e.estado_id
            ORDER BY
                n.nivel_puntaje_max DESC"
            )->result_array();
    }
    /**
     * Añadir un nuevo nivel
     */
    function add_nivel($params){
        $this->db->insert('nivel',$params);
        return $this->db->insert_id();
    }
    /**
     * obtener nivel por id
     */
    function get_nivel($nivel_id){
        return $this->db->get_where('nivel',array('nivel_id'=>$nivel_id))->row_array();
    }
    /**
     * Actualizar nivel
     */
    function update_nivel($nivel_id, $params){
        $this->db->where('nivel_id',$nivel_id);
        return $this->db->update('nivel',$params);
    }
    /**
     * obtener todos los putnajes max
     */
    function get_puntajes_max($nivel_id){
        $aux = "";
        if($nivel_id != 0){
            $aux="AND n.nivel_id < $nivel_id";
        }
        return $this->db->query(
            "SELECT 
                MAX(n.nivel_puntaje_max) AS max
            FROM
                nivel n
            WHERE
                n.estado_id = 1 $aux"
        )->row_array();
    }

}