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
    <h3 class="box-title">Auspisiador</h3>
    <div class="box-tools">
        <a href="<?= site_url('auspisiador/add'); ?>" class="btn btn-success btn-sm"> + Añadir</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="input-group"> <span class="input-group-addon">Buscar</span>
            <input id="filtrar" type="text" class="form-control" placeholder="Ingrese nombre categoría">
        </div>
        <div class="box">
            
            <div class="box-body">
                <div class="table-responsive">
                    <table id="table_auspisiadores" class="table table-striped">
                        <thead>
                            <tr class="info">
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Imagen</th>
                                <th>Estado</th>
                                <th>Dirección Web</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="buscar">
                        <?php
                            $i = 0;
                            foreach($auspisiador as $a){
                                $i++;
                        ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $a['auspisiador_name']; ?></td>
                            <td>
                                <?php
                                    $mimagen = "thumb_".$a['auspisiador_image'];
                                    if($a['auspisiador_image']){
                                ?>
                                <a class="btn btn-xs" data-toggle="modal" data-target="#mostrarimagen<?= $a['auspisiador_id']; ?>" style="padding: 0px;">
                                    <?='<img style="width: 60px;" src="'.site_url('/resources/images/auspisiadores/'.$a['auspisiador_image']).'" style="width: 100%" />';?>
                                </a>
                                <?php
                                    }else{
                                    echo '<img style="width: 60px;height: 60px;" src="'.site_url('/resources/images/auspisiador/thumb_default.jpg').'" />'; 
                                    }
                                ?>
                            </td>
                            <td style="background-color: <?= $a['estado_color']; ?>"><?= $a['estado_descripcion']; ?></td>
                            <td>
                                <a href="<?= $a['auspisiador_url'] ?>" target="_blank"><?= $a['auspisiador_url'] ?></a>
                            </td>
                            <td class="text-center">
                                <a href="<?= site_url('auspisiador/edit/'.$a['auspisiador_id']); ?>" class="btn btn-info btn-xs" title="Modificar"><span class="fa fa-pencil"></span></a> 

                                <!------------------------ INICIO modal para MOSTRAR imagen REAL ------------------->
                                <div class="modal fade" id="mostrarimagen<?= $a['auspisiador_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="mostrarimagenlabel<?php echo $a['auspisiador_id']; ?>">
                                    <div class="modal-dialog" role="document">
                                        <br><br>
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                                                <font size="3"><b><?= $a['auspisiador_name']; ?></b></font>
                                            </div>
                                            <div class="modal-body">
                                                <!------------------------------------------------------------------->
                                                <?php echo '<img style="max-height: 100%; max-width: 100%" src="'.site_url('/resources/images/auspisiadores/'.$a['auspisiador_image']).'" />'; ?>
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
</div>
<!------------------------- DATATABLES--------------- -->
<script src="<?= site_url('resources/js/datatables.min.js') ?>"></script>
<script src="<?= site_url('resources/js/jquery.dataTables.min.js')?>"></script>
<script src="<?= site_url('resources/js/dataTables.bootstrap4.min.js')?>"></script>
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script>
    $(document).ready(function() {
        $('#table_auspisiadores').DataTable();
    } );
</script>
<!------------------------- DATATABLES--------------- -->