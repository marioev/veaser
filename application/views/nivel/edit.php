<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Editar Nivel</h3>
            </div>
            <?= form_open_multipart('nivel/edit/'.$categoria['categoria_id']); ?>
                <?php 
                    if(isset($_form) && $_form){
                        $this->load->view($_form);
                    }
                ?>		
			<?= form_close(); ?>
		</div>
    </div>
</div>