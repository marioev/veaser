<!----------------------------- script buscador --------------------------------------->
<!-- <script src="<?php echo base_url('resources/js/funciones_producto.js'); ?>" type="text/javascript"></script> -->
<script src="<?= site_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<!-- <script type="text/javascript">
        $(document).ready(function () {
            (function ($) {
                $('#filtrar').keyup(function () {
                    var rex = new RegExp($(this).val(), 'i');
                    $('.buscar tr').hide();
                    $('.buscar tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();
                })
            }(jQuery));
        });
</script>    -->
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"> -->

<!----------------------------- fin script buscador --------------------------------------->
<style type="text/css">
    /*td img{
        width: 50px;
        height: 50px;
        margin-right: 5px; 
    }*/
    #contieneimg{
        width: 50px;
        height: 50px;
        text-align: center;
    }
    #horizontal{
        display: flex;
        white-space: nowrap;
        border-style: none !important;
    }
    #masgrande{
        font-size: 12px;
    }
    td.details-control {
        background: url('./resources/images/details_open.png') no-repeat center center;
        cursor: pointer;
    }
    tr.shown td.details-control {
        background: url('./resources/images/details_close.png') no-repeat center center;
    }
</style>

<!------------------ ESTILO DE LAS TABLAS ----------------->
<!--<link href="<?php //echo base_url('resources/css/servicio_reportedia.css'); ?>" rel="stylesheet">-->
<!-------------------------------------------------------->
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<!--<input type="hidden" name="lapresentacion" id="lapresentacion" value='<?php /*echo json_encode($all_presentacion); ?>' />
<input type="hidden" name="lamoneda" id="lamoneda" value='<?php echo json_encode($all_moneda); */ ?>' /> -->

<div class="row micontenedorep" style="display: none" id="cabeceraprint">
    <div id="cabizquierda">
        <?php
        echo $empresa[0]['empresa_nombre']."<br>";
        echo $empresa[0]['empresa_direccion']."<br>";
        echo $empresa[0]['empresa_telefono'];
        ?>
        </div>
        <div id="cabcentro">
            <div id="titulo">
                <u>PRODUCTOS</u><br><br>
                <!--<span style="font-size: 9pt">INGRESOS DIARIOS</span><br>-->
                <span class="lahora" id="fhimpresion"></span><br>
                <span style="font-size: 8pt;" id="busquedacategoria"></span>
                <!--<span style="font-size: 8pt;">PRECIOS EXPRESADOS EN MONEDA BOLIVIANA (Bs.)</span>-->
            </div>
        </div>
        <div id="cabderecha">
            <?php

            $mimagen = "thumb_".$empresa[0]['empresa_imagen'];

            echo '<img src="'.site_url('/resources/images/empresas/'.$mimagen).'" />';

            ?>

        </div>
        
</div>
<br>
<div class="row no-print">
        <div class="col-md-8">
            <!--este es INICIO del BREADCRUMB buscador-->
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="<?php echo site_url('admin/dashb')?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
                    <!--<li><a href="<?php echo site_url('cliente')?>">Clientes</a></li>-->
                    <li class="active"><b>Productos: </b></li>
                    <input style="border-width: 0; background-color: #DEDEDE" id="encontrados" type="text"  size="5"  readonly="true">
                </ol>
            </div>
            <!--este es FIN del BREADCRUMB buscador-->
    
            <!--este es INICIO de input buscador-->
            <div class="col-md-12">
                <div class="col-md-7">
                    <div class="input-group">
                        <span class="input-group-addon"> Buscar </span>           
                        <input id="filtrar" type="text" class="form-control" placeholder="Ingrese el nombre, código, código de barras, marca, industria.." onkeypress="buscarproducto(event)" autocomplete="off">
                    </div>
                </div>
                <div class="col-md-3">
                    
                    <div class="box-tools">
                        <select name="categoria_id" class="btn-primary btn-sm" id="categoria_id" onchange="tablaresultadosproducto(2)">
                            <option value="" disabled selected >-- BUSCAR POR CATEGORIAS --</option>
                            <option value="0"> Todas Las Categorias </option>
                            <?php 
                            foreach($all_categoria as $categoria)
                            {
                                echo '<option value="'.$categoria['categoria_id'].'">'.$categoria['categoria_nombre'].'</option>';
                            } 
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    
                    <div class="box-tools">
                        <select name="estado_id" class="btn-primary btn-sm" id="estado_id" onchange="tablaresultadosproducto(2)">
                            <option value="" disabled selected >-- BUSCAR POR ESTADOS --</option>
                            <option value="0">Todos Los Estados</option>
                            <?php 
                            foreach($all_estado as $estado)
                            {
                                echo '<option value="'.$estado['estado_id'].'">'.$estado['estado_descripcion'].'</option>';
                            } 
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            
                
            <!--este es FIN de input buscador-->

            <!-- **** INICIO de BUSCADOR select y productos encontrados *** -->
            <div class="row" id='loader'  style='display:none; text-align: center'>
                <img src="<?php echo base_url("resources/images/loader.gif"); ?>"  >
            </div>
            <!-- **** FIN de BUSCADOR select y productos encontrados *** -->
            
            
        </div>
    <!---------------- BOTONES --------->
        <div class="col-md-4">
            
                <div class="box-tools text-center">
                <a href="<?php echo site_url('producto/add'); ?>" class="btn btn-success btn-foursquarexs" title="Registrar nuevo Producto"><font size="5"><span class="fa fa-user-plus"></span></font><br><small>Registrar</small></a>
                <button data-toggle="modal" data-target="#modalbuscar" class="btn btn-warning btn-foursquarexs" onclick="tablaresultadosproducto(3)" title="Mostrar todos los Productos" ><font size="5"><span class="fa fa-search"></span></font><br><small>Ver Todos</small></button>
                <?php
                /*if($rol[106-1]['rolusuario_asignado'] == 1){ ?>
                <a onclick="imprimir_producto()" class="btn btn-primary btn-foursquarexs"><font size="5" title="Imprimir Producto"><span class="fa fa-print"></span></font><br><small>Imprimir</small></a>
                <?php }*/ ?>
                <!--<a href="" class="btn btn-info btn-foursquarexs"><font size="5"><span class="fa fa-cubes"></span></font><br><small>Productos</small></a>-->            
        </div>
    </div>
    <!---------------- FIN BOTONES --------->
</div>
    

<div class="row">
    <div class="col-md-12">
        
        <div class="box">
            <!-- <?php var_dump($file) ?> -->
            <div class="box-body table-responsive">
               <table class="table display table-striped" id="table_producto">
               <!--<table role="table">-->
                    <thead>
                        <tr class="info">
                            <th>#</th>
                            <th>producto_id</th>
                            <th>estado_id</th>
                            <th>categoria_id</th>
                            <th>Foto del producto</th>
                            <th>Nombre</th>
                            <th>Código</th>
                            <th>Codigo barra</th>
                            <th>producto_unidad</th>
                            <th>Categoria</th>
                            <th>Marca</th>
                            <th>Moneda</th>
                            <th>producto_industria</th>
                            <th>producto_costo</th>
                            <th>producto_precio</th>
                            <th>Precio Minimo</th>
                            <th>Comision</th>
                            <th>producto_caracteristicas</th>
                            <!-- <th>producto_fechahora</th> -->
                            <th>producto_latitud</th>
                            <th>producto_longitud</th>
                            <th>producto_condicion</th>
                            <!-- <th>producto_check</th> -->
                            <th>Precio Cliente</th>
                            <th>Precio Oferta</th>
                            <th>Visitas</th>
                            <th>Estado</th>
                        </tr>
                    </thead>                 
                    <tfoot>
                        <tr class="info">
                            <th>#</th>
                            <th>producto_id</th>
                            <th>estado_id</th>
                            <th>categoria_id</th>
                            <th>Foto del producto</th>
                            <th>Nombre</th>
                            <th>Código</th>
                            <th>Codigo barra</th>
                            <th>producto_unidad</th>
                            <th>Categoria</th>
                            <th>Marca</th>
                            <th>Moneda</th>
                            <th>producto_industria</th>
                            <th>producto_costo</th>
                            <th>producto_precio</th>
                            <th>Precio Minimo</th>
                            <th>Comision</th>
                            <th>producto_caracteristicas</th>
                            <!-- <th>producto_fechahora</th> -->
                            <th>producto_latitud</th>
                            <th>producto_longitud</th>
                            <th>producto_condicion</th>
                            <!-- <th>producto_check</th> -->
                            <th>Precio Cliente</th>
                            <th>Precio Oferta</th>
                            <th>Visitas</th>
                            <th>Estado</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- <div class="pull-right">
                <?php echo $this->pagination->create_links(); ?>                    
            </div>                 -->
        </div>
    </div>
</div>

<!------------------------ INICIO modal para MOSTRAR imagen REAL ------------------->
    <?php foreach($productos as $producto){ ?>
        <div class='modal fade' id='mostrarimagen<?= $producto['producto_id'] ?>' tabindex='-1' role='dialog' aria-labelledby='mostrarimagenlabel<?= $producto['producto_id'] ?>'>
            <div class='modal-dialog' role='document'>
                <br><br>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>x</span></button>
                        <font size='3'><b><?= $producto['producto_nombre'] ?></b></font>
                    </div>
                    <div class='modal-body'>
                    <!------------------------------------------------------------------->
                    <img style='max-height: 100%; max-width: 100%' src='./resources/images/productos/<?= $producto['producto_foto'] ?>' />
                    <!------------------------------------------------------------------->
                    </div>

                </div>
            </div>
        </div>
    <?php } ?>

<!------------------------ FIN modal para MOSTRAR imagen REAL ------------------->

<!-- <?php
if($a == 1)
echo '<script type="text/javascript">
    alert("El Producto no puede ser ELIMINADO, \n porque tienen transacciones realizadas");
</script>';
?> -->
<!-- <script src="<?= site_url('resources/js/datatables.min.js') ?>"></script> -->
<script src="<?= site_url('resources/js/jquery.dataTables.min.js')?>"></script>
<script src="<?= site_url('resources/js/dataTables.bootstrap4.min.js')?>"></script>
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script>
    function format ( d ) {
        return (
            '<table class="table" cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
                '<tr class="info">'+
                    '<th>Foto:</th>'+
                    '<td>'+
                        '<a class="btn  btn-xs" data-toggle="modal" data-target="#mostrarimagen'+d.producto_id+'" style="padding: 0px;">'+
                            '<img class="img-circle img-responsible" src="./resources/images/productos/'+d.producto_foto+'" width="60px" height="60px">'+
                        '</a>'+
                    '</td>'+
                    '<th>Unidad:<br>Cod. de Barras:</th>'+
                    '<td>'+d.producto_unidad+'<br>'+d.producto_codigobarra+'</td>'+
                    '<th>Industria:</th>'+
                    '<td>'+d.producto_industria+'</td>'+
                    '<th>Condición:</th>'+
                    '<td>'+d.producto_condicion+'</td>'+
                    '<th>Ubicación:</th>'+
                    '<td>'+
                        '<a href="https://www.google.com/maps/dir/'+d.producto_latitud+','+d.producto_longitud+'" target="_blank" title="Ubicación del Producto">'+
                            '<img src="./resources/images/blue.png" width="30" height="30">'+
                        '</a>'+
                    '</td>'+
                    '<th>Acción:</th>'+
                    '<td>'+
                        '<a href="./producto/edit/'+d.producto_id+'" class="btn btn-info btn-xs" title="Editar"><i class="fa fa-pencil" style="width: 12px; heigth: 12px;"></i></a>'+
                        '<a href="./galeria/index/'+d.producto_id+'" class="btn btn-success btn-xs" title="galeria de Imagenes" ><i class="fa fa-image" style="width: 12px; heigth: 12px;"></i></a>'+
                        '<a href="./web/verdetalle/'+d.producto_id+'" class="btn btn-warning btn-xs" target="_blank" title="Ver Producto"><span class="fa fa-eye"></span></a>'+
                    '</td>'+
                '</tr>'+
                '<tr>'+
                    '<th>Caracteristicas</th>'+
                    '<td colspan="9">'+d.producto_caracteristicas+'</td>'+
                '</tr>'+
            '</table>');
    }
    
    $(document).ready(function() {
        var table = $('#table_producto').DataTable( {
            "ajax": "producto.txt",
            "columns": [
                {
                    "className":      'details-control',
                    "orderable":      false,
                    "data":           null,
                    "defaultContent": ''
                },
                { "data": "producto_id", "visible": false },
                { "data": "estado_id", "visible": false },
                { "data": "categoria_id", "visible": false },
                { "data": "producto_foto", "visible": false},
                // { "data": "moneda_id" },
                { "data": "producto_nombre" },
                { "data": "producto_codigo" },
                { "data": "producto_codigobarra", "visible":false },
                { "data": "producto_unidad", "visible": false },
                { "data": "categoria_nombre" },
                { "data": "producto_marca" },
                { "data": "moneda_descripcion", "render": (data)=>{ return '<p style="font-size: 12pt;"><b>'+data+'</b></p>' }},
                { "data": "producto_industria", "visible": false },
                { "data": "producto_costo", "visible": false },
                { "data": "producto_precio", "visible": false },
                { "data": "producto_preciominimo", "render": (data)=>{ return '<p style="font-size: 12pt;"><b>'+data+'</b></p>' } },
                { "data": "producto_comision", "render": (data)=>{ return '<p style="font-size: 12pt;"><b>'+data+'</b></p>' } },
                { "data": "producto_caracteristicas", "visible": false },
                { "data": "producto_latitud", "visible": false },
                { "data": "producto_longitud", "visible": false },
                { "data": "producto_condicion", "visible":false },
                { "data": "producto_preciocliente", "render": (data)=>{ return '<p style="font-size: 12pt;"><b>'+data+'</b></p>' } },
                { "data": "producto_preciooferta", "render": (data)=>{ return '<p style="font-size: 12pt;"><b>'+data+'</b></p>' } },
                { "data": "producto_visto"},
                { "data": "estado_descripcion" }
            ],
            "order": [[1, 'asc']]
        } );
        
        // Add event listener for opening and closing details
        $('#table_producto tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row( tr );
    
            if ( row.child.isShown() ) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            }
            else {
                // Open this row
                row.child( format(row.data()) ).show();
                tr.addClass('shown');
            }
        } );
    } );
</script>