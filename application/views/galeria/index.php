<script src="<?php echo base_url('resources/js/dropzone.js'); ?>" type="text/javascript"></script>
<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('resources/css/dropzone.css'); ?>" rel="stylesheet">
<!--<link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">-->
<!-------------------------------------------------------->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Galeria del Producto: <b><?php echo $producto['producto_nombre']; ?></b></h3>
            	<div class="box-tools">
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalgaleria">+ Añadir</button>
                    
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
                        <th>#</th>
                        <th colspan="2">Imagen</th>
                        <th></th>
                    </tr>
                    <?php $i=0;
                    foreach($galeria as $e){ 
                        $i=$i+1; ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $e['galeria_nombre']; ?></td>
                        
                        <td> <a class="btn btn-xs" id="contieneimg" data-toggle="modal" data-target="#mostrarimagen<?php echo $i; ?>" style="padding: 0px;">
                                        <?php
                                        echo '<img src="'.site_url('/resources/images/galeria/'."thumb_".$e['galeria_imagen']).'" />';
                                        ?>
                                    </a>
                           <!------------------------ INICIO modal para MOSTRAR imagen REAL ------------------->
                                    <div class="modal fade" id="mostrarimagen<?= $i; ?>" tabindex="-1" role="dialog" aria-labelledby="mostrarimagenlabel<?php echo $i; ?>">
                                        <div class="modal-dialog" role="document">
                                            <br><br>
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                                                    <font size="3"><b><?= $e['galeria_nombre']; ?></b></font>
                                                </div>
                                                <div class="modal-body">
                                                    <!------------------------------------------------------------------>
                                                    <?php echo '<img style="max-height: 100%; max-width: 100%" src="'.site_url('/resources/images/galeria/'.$e['galeria_imagen']).'" />';?>
                                                    <!------------------------------------------------------------------>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- check -->
                                    <!-- <fieldset class="form-group">
                                        <div class="row"> -->
                                        <!-- <legend class="col-form-label col-sm-2 pt-0">Radios</legend> -->
                                        <!-- <div class="col-sm-10">
                                            <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                            <label class="form-check-label" for="gridRadios1">
                                                First radio
                                            </label>
                                            </div>
                                        </div>
                                        </div>
                                    </fieldset> -->
                            <!------------------------ FIN modal para MOSTRAR imagen REAL -------------------></td>
						<td>
                            <a href="<?php echo site_url('galeria/remove/'.$e['galeria_id'].'/'.$producto['producto_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a> 
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalgaleria" tabindex="-1" role="dialog" aria-labelledby="modalgaleriaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <a class="btn close" onclick="refrescar()" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </a>
        <h5 class="modal-title text-center text-bold">Añadir Imagen a Galeria</h5>
        </div>
        <div class="modal-body">
            <?php echo form_open_multipart('galeria/add/'.$producto['producto_id'],'class="dropzone" id="my-awesome-dropzone"'); ?>
                
        
        </div>
        <div class="modal-footer">
            <!--<button type="submit" class="btn btn-success">Guardar</button>-->
            <a onclick="refrescar()" class="btn btn-success" data-dismiss="modal"><span class="fa fa-check"></span> Guardar</a>
            <?php echo form_close(); ?>
        </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    function refrescar(){
        location.reload();
    }
    
$(document).ready(function(){
    $("#modalgaleria").on('hidden.bs.modal', function () {
        location.reload();
    });
});
    /*$("#modalgaleria").on('hidden.bs.modal', function () {
        location.reload();
    })*/
</script>