<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
                <!--<h3 class="box-title">Mensaje:</h3><br>-->
                <br>
                <label>
                    <?php echo "De: ".$mensaje['mensaje_nombre']." &#60".$mensaje['mensaje_email']."&#62"."<br>" ?>
                    <?php echo "Teléfono: ".$mensaje['mensaje_telefono']; ?>
                </label>
                <br>
                <label style="text-align: justify">
                    Mensaje:<br>
                    <?php echo $mensaje['mensaje_texto']; ?>
                </label>
            </div>
            <?php echo form_open('mensaje/responder/'.$mensaje['mensaje_id']); ?>
                <div class="box-body">
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <label for="mensaje_respuesta" class="control-label"><span class="text-danger">*</span>Responder Mensaje:</label>
                            <div class="form-group">
                                <textarea class="form-control" name="mensaje_respuesta" id="mensaje_respuesta" rows="6" placeholder="Tu mensaje va aquí..." required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-success" title="enviar mensaje">
                    <i class="fa fa-mail-forward"></i> Enviar
                </button>
                <a href="<?php echo site_url('mensaje'); ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Cancelar</a>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>