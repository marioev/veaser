<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Añadir Auspisiador</h3>
            </div>
            <?= form_open_multipart('auspisiador/add'); ?>
              <?php
                if(isset($_form) && $_form)
                    $this->load->view($_form);
              ?>
            <?= form_close(); ?>
      	</div>
    </div>
</div>