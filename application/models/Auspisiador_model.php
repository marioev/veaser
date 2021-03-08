<?php

class Auspisiador_model extends CI_model{
    function __construct(){
        parent::__construct();
    }

    function get_auspisiador($auspisiador_id){
        return $this->db->get_where('auspisiador',array('auspisiador_id'=>$auspisiador_id))->row_array();
    }

    function get_all_auspisiadores(){
        return $this->db->query('
            SELECT a.*, e.estado_color, e.estado_descripcion 
            FROM auspisiador as a, estado as e
            WHERE e.`estado_id` = a.`estado_id`;
        ')->result_array();
    }
    
    function addAuspisiador($params){
        $this->db->insert('auspisiador',$params);
        return $this->db->insert_id();
    }
    
    function update_auspisiador($auspisiador_id,$params){
        $this->db->where('auspisiador_id',$auspisiador_id);
        return $this->db->update('auspisiador',$params);
    }
}