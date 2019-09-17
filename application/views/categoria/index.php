<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Categorías</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('categoria/add'); ?>" class="btn btn-success btn-sm"> + Añadir</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Imagen</th>
                        <th># Vistas</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                    <?php
                    $i = 0;
                    foreach($categoria as $c){
                        $i++;
                        ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td>
                            <?php
                            $mimagen = "thumb_".$c['categoria_imagen'];
                            if($c['categoria_imagen']){
                            ?>
                            <a class="btn  btn-xs" data-toggle="modal" data-target="#mostrarimagen<?php echo $c['categoria_imagen']; ?>" style="padding: 0px;">
                                <?php
                                echo '<img src="'.site_url('/resources/images/categoria/'.$mimagen).'" />';
                                ?>
                            </a>
                            <?php
                            }else{
                               echo '<img style src="'.site_url('/resources/images/categoria/thumb_default.jpg').'" />'; 
                            }
                            ?>
                            
                            
                            
                            <?php echo $c['categoria_nombre']; ?></td>
                        <td><?php echo $c['categoria_imagen']; ?></td>
                        <td><?php echo $c['categoria_vistas']; ?></td>
                        <td><?php echo $c['estado_id']; ?></td>
                        <td>
                            <a href="<?php echo site_url('categoria/edit/'.$c['categoria_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('categoria/remove/'.$c['categoria_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                            <!------------------------ INICIO modal para MOSTRAR imagen REAL ------------------->
                            <div class="modal fade" id="mostrarimagen<?php echo $p['producto_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="mostrarimagenlabel<?php echo $p['producto_id']; ?>">
                                <div class="modal-dialog" role="document">
                                    <br><br>
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                                            <font size="3"><b><?php echo $p['producto_nombre']; ?></b></font>
                                        </div>
                                        <div class="modal-body">
                                            <!------------------------------------------------------------------->
                                            <?php echo '<img style="max-height: 100%; max-width: 100%" src="'.site_url('/resources/images/productos/'.$p['producto_foto']).'" />'; ?>
                                            <!------------------------------------------------------------------->
                                        </div>
                                    </div>
                              </div>
                            </div>
                            <!------------------------ FIN modal para MOSTRAR imagen REAL ------------------->
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
