<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Categoria_model extends CI_Model
{
    // var $table ="";
    
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get categoria by categoria_id
     */
    function get_categoria($categoria_id)
    {
        return $this->db->get_where('categoria',array('categoria_id'=>$categoria_id))->row_array();
    }
    /*
    * 
    */
    // function get_categoria_icon($categoria_id)
    // {
    //     return $this->db->query(
    //         "SELECT c.`icono_id`
    //         from categoria as c, icono as i
    //         where i.`icono_id` = c.`icono_id`
    //         and c.`categoria_id` = ".$categoria_id."
    //         ")->row_array();
    // }
        
    /*
     * Get all categoria
     */
    function get_all_categoria()
    {
        $categorias = $this->db->query(
            "SELECT c.*, e.estado_descripcion, e.`estado_color`,i.`icono_etiqueta`
            from categoria as c
            left join estado as e on c.`estado_id` = e.`estado_id`
            left join icono as i on i.icono_id = c.`icono_id`"
            )->result_array();
        return $categorias;
    }
    /*
     * Get all categorias activas
     */
    function get_all_categoriactiva()
    {
        $categoria_activa = $this->db->query(
            "SELECT c.*, e.estado_descripcion, e.estado_color, i.icono_etiqueta
            FROM categoria as c
            LEFT JOIN estado as e on c.estado_id = e.estado_id
            LEFT JOIN icono as i on c.icono_id = i.icono_id
            WHERE c.estado_id = 1
            ")->result_array();
        return $categoria_activa;
        // $this->db->select('c.*, e.estado_descripcion, e.estado_color, i.icono_etiqueta');
        // $this->db->from('categoria as c');
        // $this->db->join('estado as e', 'c.estado_id = e.estado_id');
        // $this->db->join('icono as i', '');
        // $this->db->where('c.estado_id', 1);
        // $this->db->order_by('c.categoria_nombre', 'asc');
        // $query = $this->db->get();
        // return $query->result_array();
    }
    /*
     * function to add new categoria
     */
    function add_categoria($params)
    {
        $this->db->insert('categoria',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update categoria
     */
    function update_categoria($categoria_id,$params)
    {
        $this->db->where('categoria_id',$categoria_id);
        return $this->db->update('categoria',$params);
    }
    
    /*
     * function to delete categoria
     */
    function delete_categoria($categoria_id)
    {
        return $this->db->delete('categoria',array('categoria_id'=>$categoria_id));
    }
    /*
     * busqueda de productos y categorias
     */
    function buscar_productocategoria($buscar_producto, $categoria_id)
    {
        $producto = "";
        if($buscar_producto != ""){
            $producto = "and(p.producto_nombre like '%".$buscar_producto."%') ";
        }
        $categoria = "";
        if($categoria_id > 0){
            $categoria = "and p.categoria_id = ".$categoria_id." ";
        }
                
        $sql = "SELECT
                p.*, c.categoria_nombre, m.moneda_descripcion
            FROM
                producto p
            LEFT JOIN categoria c on p.categoria_id = c.categoria_id
            LEFT JOIN moneda m on p.moneda_id = m.moneda_id
            WHERE
                p.estado_id = 1
                ".$producto."
                ".$categoria."
            GROUP BY
                p.producto_id
              ORDER By p.producto_nombre ASC";
        $producto = $this->db->query($sql)->result_array();
        return $producto;
    }
}
