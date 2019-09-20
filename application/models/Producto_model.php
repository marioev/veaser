<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Producto_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get producto by producto_id
     */
    function get_producto($producto_id)
    {
        $producto = $this->db->query("
            SELECT
                *

            FROM
                `producto`

            WHERE
                `producto_id` = ?
        ",array($producto_id))->result_array();

        return $producto;
    }
    
    /*
     * Get all producto count
     */
    function get_all_producto_count()
    {
        $producto = $this->db->query("
            SELECT
                count(*) as count

            FROM
                producto p, estado e, categoria_producto c, presentacion pr, moneda m

            WHERE
                p.estado_id = e.estado_id
                and p.categoria_id = c.categoria_id
                and p.presentacion_id = pr.presentacion_id
                and p.moneda_id = m.moneda_id

            ORDER BY p.producto_nombre

        ")->row_array();

        return $producto['count'];
    }
        
    /*
     * Get all producto
     */
    function get_all_producto()
    {
        $producto = $this->db->query("
            SELECT
                *, p.producto_id as miprod_id

            FROM
                producto p, estado e, categoria_producto c, presentacion pr, moneda m

            WHERE
                p.estado_id = e.estado_id
                and p.categoria_id = c.categoria_id
                and p.presentacion_id = pr.presentacion_id
                and p.moneda_id = m.moneda_id

            ORDER BY p.producto_nombre ASC LIMIT 50

        ")->result_array();

        return $producto;
    }
    
    function get_all_productos($params = array())
    {
        $limit_condition = "";
        if(isset($params) && !empty($params))
            $limit_condition = " LIMIT " . $params['offset'] . "," . $params['limit'];
        
        $producto = $this->db->query("
            SELECT
                *

            FROM
                `producto`

            WHERE
                1 = 1

            ORDER BY producto_nombre limit 10

            " . $limit_condition . "
        ")->result_array();

        return $producto;
    }
        
    /*
     * function to add new producto
     */
    function add_producto($params)
    {
        $this->db->insert('producto',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update producto
     */
    function update_producto($producto_id,$params)
    {
        $this->db->where('producto_id',$producto_id);
        return $this->db->update('producto',$params);
    }
    
    
    /*
     * function unidad de producto
     */
    function get_all_unidad()
    {
        $sql = "select * from unidad";
        $unidades = $this->db->query($sql)->result_array();        
        return $unidades;
    }
    
    /*
     * function to delete producto
     */
    function delete_producto($producto_id)
    {
        return $this->db->delete('producto',array('producto_id'=>$producto_id));
    }
    
    /*
     * Funcion que verifica si un producto fue usado en otros modulos
     */
    function producto_es_usado($producto_id){
        $producto = $this->db->query("
            SELECT sum(
            (SELECT if(count(dc.producto_id) > 0, count(dc.producto_id), 0) AS FIELD_1
             FROM detalle_compra dc
             WHERE dc.producto_id = p.producto_id and dc.producto_id = '$producto_id') +
            (SELECT if(count(ci.producto_id) > 0, count(ci.producto_id), 0) AS FIELD_1
             FROM categoria_insumo ci
             WHERE ci.producto_id = p.producto_id and p.producto_id = '$producto_id') +
            (SELECT if(count(dv.producto_id) > 0, count(dv.producto_id), 0) AS FIELD_1
             FROM detalle_venta dv
             WHERE dv.producto_id = p.producto_id AND p.producto_id = '$producto_id')+
            (SELECT if(count(dp.producto_id) > 0, count(dp.producto_id), 0) AS FIELD_1
             FROM detalle_pedido dp
             WHERE dp.producto_id = p.producto_id AND p.producto_id = '$producto_id')) as res
             FROM
                producto p
              WHERE p.producto_id = '$producto_id'
        ",array($producto_id))->row_array();

        return $producto['res'];
    }
    
    function get_busqueda_producto_parametro($parametro, $categoriaestado)
    {
        $sql = "SELECT
             p.*, p.producto_id as miprod_id, e.estado_color, e.estado_descripcion,
             cp.categoria_nombre, m.moneda_descripcion
              FROM
              producto p
              LEFT JOIN estado e on p.estado_id = e.estado_id
              LEFT JOIN categoria cp on p.categoria_id = cp.categoria_id
              LEFT JOIN moneda m on p.moneda_id = m.moneda_id
              WHERE
                   p.estado_id = e.estado_id
                   and(p.producto_nombre like '%".$parametro."%' or p.producto_codigobarra like '%".$parametro."%'
                   or producto_codigo like '%".$parametro."%' or producto_marca like '%".$parametro."%'
                   or producto_industria like '%".$parametro."%' or producto_caracteristicas like '%".$parametro."%')
                   ".$categoriaestado."
              GROUP By p.producto_id
              ORDER By p.producto_nombre";

        $producto = $this->db->query($sql)->result_array();
        return $producto;

    }
    /*
     * Get producto by producto_id en ROW
     */
    function get_esteproducto($producto_id)
    {
        $producto = $this->db->query("
            SELECT
                *

            FROM
                `producto`

            WHERE
                `producto_id` = ?
        ",array($producto_id))->row_array();

        return $producto;
    }
    
 function cambiar_ultimocosto($producto_id,$ultimocosto,$producto_precio)
    {

        
        $sql = "update producto set producto.producto_precio=".$producto_precio.", producto.producto_ultimocosto=".$ultimocosto." where producto_id=".$producto_id."";

        $this->db->query($sql);
    }

     function get_busqueda_producto_limite()
    {
        $sql = "SELECT
             p.*, p.producto_id as miprod_id, e.estado_color, e.estado_descripcion,
             cp.categoria_nombre, m.moneda_descripcion
              FROM
              producto p
              LEFT JOIN estado e on p.estado_id = e.estado_id
              LEFT JOIN categoria cp on p.categoria_id = cp.categoria_id
              LEFT JOIN moneda m on p.moneda_id = m.moneda_id
              WHERE 
                   p.estado_id = e.estado_id
                  
              ORDER By p.producto_nombre LIMIT 50";

        $producto = $this->db->query($sql)->result_array();
        return $producto;

    }
    /* *****Buscar todos los productos****** */
    function get_busqueda_productos_all()
    {
        $sql = "SELECT
             p.*, p.producto_id as miprod_id, e.estado_color, e.estado_descripcion,
             cp.categoria_nombre, m.moneda_descripcion
              FROM
              producto p
              LEFT JOIN estado e on p.estado_id = e.estado_id
              LEFT JOIN categoria cp on p.categoria_id = cp.categoria_id
              LEFT JOIN moneda m on p.moneda_id = m.moneda_id
              WHERE 
                   p.estado_id = e.estado_id
              ORDER By p.producto_nombre";
        $producto = $this->db->query($sql)->result_array();
        return $producto;

    }
    /* *****Buscar productos con una determinada categoria****** */
    function get_busqueda_productos_porcategoria($parametro)
    {
        $sql = "SELECT
             p.*, p.producto_id as miprod_id, e.estado_color, e.estado_descripcion

              FROM
              producto p, estado e, categoria_producto cp
              
              WHERE 
                   p.estado_id = e.estado_id
                   and p.categoria_id = cp.categoria_id
                   ".$parametro."
                  
              ORDER By p.producto_nombre";

        $producto = $this->db->query($sql)->result_array();
        return $producto;

    }
    /*
     * Verifica si ya hay un prpducto registrado con un nombre
     */
    function es_producto_registrado($producto_nombre)
    {
        $sql = "SELECT
                      count(p.producto_id) as resultado
                  FROM
                      producto p
                 WHERE
                      p.producto_nombre = '".$producto_nombre."'";

        $producto = $this->db->query($sql)->row_array();
        return $producto['resultado'];
    }
    /* prodcutos con existencia minima */
    function get_busqueda_producto_existmin($parametro, $categoriaestado)
    {
        $sql = "SELECT
             p.*, p.producto_id as miprod_id, e.estado_color, e.estado_descripcion,
             cp.categoria_nombre, m.moneda_descripcion, dp.destino_nombre

              FROM
              inventario p
              LEFT JOIN estado e on p.estado_id = e.estado_id
              LEFT JOIN categoria_producto cp on p.categoria_id = cp.categoria_id
              LEFT JOIN moneda m on p.moneda_id = m.moneda_id
              LEFT JOIN destino_producto dp on p.destino_id = dp.destino_id
              WHERE 
                   p.estado_id = e.estado_id
                   and p.existencia <= p.producto_cantidadminima
                   and(p.producto_nombre like '%".$parametro."%' or p.producto_codigobarra like '%".$parametro."%'
                   or producto_codigo like '%".$parametro."%' or producto_marca like '%".$parametro."%'
                   or producto_industria like '%".$parametro."%' or producto_caracteristicas like '%".$parametro."%')
                   ".$categoriaestado."
              GROUP By p.producto_id
              ORDER By p.producto_nombre";

        $producto = $this->db->query($sql)->result_array();
        return $producto;

    }
    /* obtener imagen, nombre y precio de productos activos */
    function get_productos_imagen()
    {
        $sql = "
            SELECT
                  p.producto_nombre, p.producto_foto, p.producto_precio
            FROM
                inventario p
                order by p.producto_id asc";
        $producto = $this->db->query($sql)->result_array();
        return $producto;
    }
    /* *busqueda de productos activos en el sistema..* */
    function get_busqueda_productos($parametro)
    {
        $sql = "SELECT
             p.*, p.producto_id as miprod_id, e.estado_color, e.estado_descripcion
              FROM
              producto p
              LEFT JOIN estado e on p.estado_id = e.estado_id
              WHERE 
                   p.estado_id = 1
                   and(p.producto_nombre like '%".$parametro."%' or p.producto_codigobarra like '%".$parametro."%'
                   or p.producto_codigo like '%".$parametro."%' or p.producto_marca like '%".$parametro."%'
                   or p.producto_industria like '%".$parametro."%' or p.producto_caracteristicas like '%".$parametro."%')
              GROUP By p.producto_id
              ORDER By p.producto_nombre";

        $producto = $this->db->query($sql)->result_array();
        return $producto;

    }

    function get_busqueda_categoria($categoria_id)
    {
        $sql = "SELECT
             p.*, p.producto_id as miprod_id, e.estado_color, e.estado_descripcion, cp.categoria_nombre
              FROM
              producto p
              LEFT JOIN estado e on p.estado_id = e.estado_id
              LEFT JOIN categoria_producto cp on cp.categoria_id = p.categoria_id
              WHERE 
                   p.estado_id = 1
                   and p.categoria_id=".$categoria_id."
              GROUP By p.producto_id
              ORDER By p.producto_nombre";

        $producto = $this->db->query($sql)->result_array();
        return $producto;

    }
    
    function get_all_productosubcategorias($producto_id)
    {
        $sql = "SELECT
                sc.subcatserv_descripcion
            FROM
                subcategoria_servicio sc
            LEFT JOIN categoria_insumo ci on ci.subcatserv_id = sc.subcatserv_id
            WHERE
                ci.producto_id = $producto_id";

        $producto = $this->db->query($sql)->result_array();
        return $producto;

    }
    /* Get busqueda all productos de parametros */
    function buscar_allproducto($parametro){
        $producto = $this->db->query("
            SELECT
                p.producto_id, p.producto_nombre
            FROM
                inventario p, estado e
            WHERE
                p.estado_id = e.estado_id
                and p.estado_id = 1
                and (p.producto_nombre like '%".$parametro."%'
                    or p.producto_codigo like '%".$parametro."%'
                    or p.producto_codigobarra like '%".$parametro."%')
            ORDER BY p.producto_nombre
        ")->result_array();

        return $producto;
    }
    
    /*
     * Get this Insumo
     */
    function get_this_insumo($producto_id){
        $producto = $this->db->query("
            SELECT
                p.producto_id, p.producto_nombre, p.existencia, producto_precio
            FROM
                inventario p
            WHERE
                p.producto_id = $producto_id
                
        ")->row_array();

        return $producto;
    }
}
