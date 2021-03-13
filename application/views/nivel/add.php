<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Añadir Nivel</h3>
            </div>
            <?php echo form_open_multipart('nivel/add'); ?>
                <?php
                if(isset($_form) && $_form)
                    $this->load->view($_form);
                ?>  
            <?php echo form_close(); ?>
        </div>
    </div>
</div>