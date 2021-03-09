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
</script>   -->
<div class="box-header">
    <h3 class="box-title">Categorías</h3>
    <div class="box-tools">
        <a href="<?php echo site_url('categoria/add'); ?>" class="btn btn-success btn-sm"> + Añadir</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <!-- <div class="input-group"> <span class="input-group-addon">Buscar</span>
            <input id="filtrar" type="text" class="form-control" placeholder="Ingrese nombre categoría">
        </div> -->
        <div class="box">
            
            <div class="box-body">
                <table id="table_categoria" class="table table-striped">
                    <thead>
                        <tr class="info">
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Imagen</th>
                            <th># Vistos</th>
                            <th>Estado</th>
                            <th class="text-center">Icono</th>
                            <th></th>
                        </tr>
                    </thead>
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
                        <td class="text-center m-auto">
                            <i class="<?= $c['icono_etiqueta'] ?>" aria-hidden="true"></i>
                            <!-- <?= $c['icono_id'] ?> -->
                        </td>
                        <td class="text-center">
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
<!------------------------- DATATABLES--------------- -->
<script src="<?= site_url('resources/js/datatables.min.js') ?>"></script>
<script src="<?= site_url('resources/js/jquery.dataTables.min.js')?>"></script>
<script src="<?= site_url('resources/js/dataTables.bootstrap4.min.js')?>"></script>
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script>
    $(document).ready(function() {
        $('#table_categoria').DataTable({
            "language" :{
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        });
    } );
</script>
<!------------------------- DATATABLES--------------- -->

