<!----------------------------- script buscador --------------------------------------->
<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/mensaje.js'); ?>" type="text/javascript"></script>
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
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<!----------------------------- fin script buscador --------------------------------------->
<!------------------ ESTILO DE LAS TABLAS ----------------->
<!--<link href="<?php //echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">-->
<!-------------------------------------------------------->
<div class="box-header">
                <h3 class="box-title">Mensajes</h3>
            	<!--<div class="box-tools">
                    <a href="<?php //echo site_url('mensaje/enviar'); ?>" class="btn btn-success btn-sm">+ Enviar</a> 
                </div>-->
</div>
<div class="row">
    <div class="col-md-12">
        <!--------------------- parametro de buscador --------------------->
                  <div class="input-group"> <span class="input-group-addon">Buscar</span>
                    <input id="filtrar" type="text" class="form-control" placeholder="Ingrese nombre, correo...">
                  </div>
        <div class="row" id='loader'  style='display:none; text-align: center'>
            <img src="<?php echo base_url("resources/images/loader.gif"); ?>"  >
        </div>
            <!--------------------- fin parametro de buscador --------------------->
        <div class="box">
            
            <div class="box-body table-responsive">
                <table class="table table-striped table-condensed" id="mitabla">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Mensaje</th>
                        <th>Respuesta</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                    <tbody class="buscar" id="tablaresultados">
                    <?php
                    /*$i = 0;
                          foreach($mensaje as $m){;
                                 ?>
                        <tr style="background-color: <?php echo $m['estado_color']; ?>">
                        <td><?php echo $i +1 ?></td>
                        <td><?php echo $m['mensaje_nombre']; ?></td>
                        <td><?php echo $m['mensaje_email']; ?></td>
                        <td><?php echo $m['mensaje_telefono']; ?></td>
                        <td><?php
                                $rest = substr($m['mensaje_texto'], 0, 25);
                                $suspensivos= "";
                                if(strlen($m['mensaje_texto'])>25){
                                    $suspensivos="...";
                                }
                                echo $rest.$suspensivos; ?></td>
                        <td><?php echo $m['estado_descripcion']; ?></td>
                        <td>
                            <?php
                            if($m['estado_id'] == 3){
                                $esteicon = "envelope";
                                $cambiarestado= 'onclick="cambiarestado('.$m['mensaje_id'].')"';
                            }else{
                                $esteicon = "envelope-o";
                                $cambiarestado = "";
                            }
                            ?>
                            <a <?php echo $cambiarestado; ?> data-toggle="modal" data-target="#myModal<?php echo $i; ?>"  title="Leer Mensaje" class="btn btn-info btn-xs"><span class="fa fa-<?php echo $esteicon; ?>"></span></a>
                            <!------------------------ INICIO modal para ver Correo ------------------->
                            <div class="modal fade" id="myModal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $i; ?>">
                                <div class="modal-dialog" role="document">
                                    <br><br>
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                                            <b>De: </b><?php echo $m['mensaje_nombre']." &#60".$m['mensaje_email']."&#62"; ?>
                                        </div>
                                        <div class="modal-body">
                                        <!------------------------------------------------------------------->
                                                <b>Teléfono: </b> <?php echo $m['mensaje_telefono']; ?>
                                                <br>
                                                <b> Mensaje: </b><?php echo $m['mensaje_texto']; ?>
                                            </h3>
                                            <!------------------------------------------------------------------->
                                        </div>
                                        <div class="modal-footer aligncenter">
                                            <a href="<?php echo site_url('mensaje/sapp/'.$m['mensaje_id']); ?>" class="btn btn-success" title="whatsapp"><span class="fa fa-whatsapp"></span></a>
                                            <a href="<?php echo site_url('mensaje/responder/'.$m['mensaje_id']); ?>" class="btn btn-success" title="responder" ><span class="fa fa-mail-forward"></span></a>
                                            <a href="#" class="btn btn-danger" data-dismiss="modal" title="salir"><span class="fa fa-times"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!------------------------ FIN modal para ver Correo ------------------->
                        </td>
                    </tr>
                    <?php
                    $i++;
                    }*/ ?>
                    </tbody>
                </table>
                                
            </div>
            <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
            </div>
        </div>
    </div>
</div>
