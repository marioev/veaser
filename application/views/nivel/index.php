<!----------------------------- script buscador --------------------------------------->
<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script type="text/javascript">
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
</script>   
<!----------------------------- fin script buscador --------------------------------------->
<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?= base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<div class="row no-print">
        <div class="col-md-8">
            <!--este es FIN de input buscador-->

            <!-- **** INICIO de BUSCADOR select y productos encontrados *** -->
            <div class="row" id='loader'  style='display:none; text-align: center'>
                <img src="<?= base_url("resources/images/loader.gif"); ?>"  >
            </div>
            <!-- **** FIN de BUSCADOR select y productos encontrados *** -->
            
            
        </div>
    <!---------------- BOTONES --------->
        <div class="col-md-4">
            
                <div class="box-tools text-center">
                <a href="<?= site_url('nivel/add'); ?>" class="btn btn-success btn-foursquarexs" title="Registrar nuevo Producto"><font size="5"><span class="fa fa-user-plus"></span></font><br><small>Registrar</small></a>
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
        <!--------------------- parametro de buscador --------------------->
        <div class="input-group"> 
            <span class="input-group-addon">Buscar</span>
            <input id="filtrar" type="text" class="form-control" placeholder="Ingrese nombre del nivel">
        </div>
            <!--------------------- fin parametro de buscador --------------------->
        <div class="box">
            <div class="box-body table-responsive">
                <table class="table table-striped table-condensed" id="mitabla">
                    <tr>
						<th>#</th>
						<th>Nombre</th>
						<th>Puntaje Hasta</th>
						<th>Puntaje Desde</th>
						<th>Estado</th>
						<th></th>
                    </tr>
                    <tbody class="buscar">
                        <?php $cont = 1;
                            foreach($niveles as $n){;?>
                            <tr>
                                <td><?= $cont ?></td>
                                <td><?= $n['nivel_nombre']; ?></td>
                                <td><?= $n['nivel_puntaje_max']; ?></td>
                                <td><?= $n['nivel_puntaje_min']; ?></td>
                                <td><?= $n['estado_descripcion']; ?></td>
                                <td>
                                    <a href="<?= site_url('nivel/edit/'.$n['nivel_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a>
                                </td>
                            </tr>
                        <?php $cont += 1; } ?>
                    </tbody> 
                </table>            
            </div>
            <div class="pull-right">
                <?= $this->pagination->create_links(); ?>                    
            </div>
        </div>
    </div>
</div>
