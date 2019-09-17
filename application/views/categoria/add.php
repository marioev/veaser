<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Categoria Add</h3>
            </div>
            <?php echo form_open('categoria/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="estado_id" class="control-label">Estado Id</label>
						<div class="form-group">
							<input type="text" name="estado_id" value="<?php echo $this->input->post('estado_id'); ?>" class="form-control" id="estado_id" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="categoria_nombre" class="control-label">Categoria Nombre</label>
						<div class="form-group">
							<input type="text" name="categoria_nombre" value="<?php echo $this->input->post('categoria_nombre'); ?>" class="form-control" id="categoria_nombre" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="categoria_imagen" class="control-label">Categoria Imagen</label>
						<div class="form-group">
							<input type="text" name="categoria_imagen" value="<?php echo $this->input->post('categoria_imagen'); ?>" class="form-control" id="categoria_imagen" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="vistas" class="control-label">Vistas</label>
						<div class="form-group">
							<input type="text" name="vistas" value="<?php echo $this->input->post('vistas'); ?>" class="form-control" id="vistas" />
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Save
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>