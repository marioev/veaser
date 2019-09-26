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
<div class="box-header">
    <h3 class="box-title">Categorías</h3>
    <div class="box-tools">
        <a href="<?php echo site_url('categoria/add'); ?>" class="btn btn-success btn-sm"> + Añadir</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="input-group"> <span class="input-group-addon">Buscar</span>
            <input id="filtrar" type="text" class="form-control" placeholder="Ingrese nombre categoría">
        </div>
        <div class="box">
            
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Imagen</th>
                        <th># Vistos</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                    <tbody class="buscar">
                    <?php
                    $i = 0;
                    foreach($categoria as $c){
                        $i++;
                        ?>
                        <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $c['categoria_nombre']; ?></td>
                        <td>
                            <?php
                            $mimagen = "thumb_".$c['categoria_imagen'];
                            if($c['categoria_imagen']){
                            ?>
                            <a class="btn  btn-xs" data-toggle="modal" data-target="#mostrarimagen<?php echo $c['categoria_id']; ?>" style="padding: 0px;">
                                <?php
                                echo '<img src="'.site_url('/resources/images/categorias/'.$mimagen).'" />';
                                ?>
                            </a>
                            <?php
                            }else{
                               echo '<img style src="'.site_url('/resources/images/categorias/thumb_default.jpg').'" />'; 
                            }
                            ?>
                        </td>
                        <td><?php echo $c['categoria_visto']; ?></td>
                        <td style="background-color: <?php echo $c['estado_color']; ?>"><?php echo $c['estado_descripcion']; ?></td>
                        <td>
                            <a href="<?php echo site_url('categoria/edit/'.$c['categoria_id']); ?>" class="btn btn-info btn-xs" title="Modificar"><span class="fa fa-pencil"></span></a> 
                            <!--<a href="<?php //echo site_url('categoria/remove/'.$c['categoria_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>-->
                            <!------------------------ INICIO modal para MOSTRAR imagen REAL ------------------->
                            <div class="modal fade" id="mostrarimagen<?php echo $c['categoria_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="mostrarimagenlabel<?php echo $c['categoria_id']; ?>">
                                <div class="modal-dialog" role="document">
                                    <br><br>
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                                            <font size="3"><b><?php echo $c['categoria_nombre']; ?></b></font>
                                        </div>
                                        <div class="modal-body">
                                            <!------------------------------------------------------------------->
                                            <?php echo '<img style="max-height: 100%; max-width: 100%" src="'.site_url('/resources/images/categorias/'.$c['categoria_imagen']).'" />'; ?>
                                            <!------------------------------------------------------------------->
                                        </div>
                                    </div>
                              </div>
                            </div>
                            <!------------------------ FIN modal para MOSTRAR imagen REAL ------------------->
                        </td>
                    </tr>
                    <?php } ?>
                    <tbody>
                </table>
                                
            </div>
        </div>
    </div>
</div>
