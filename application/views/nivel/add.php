<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
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
<script type="text/javascript">
    function permitido(){
        var nivel_puntaje_min = document.getElementById('nivel_puntaje_min').value;
        var base_url  = document.getElementById('base_url').value;
        var controlador = "nivel/puntaje_anterior_add/";
        $.ajax({
            url: base_url + controlador,
            data: {
                nivel_puntaje_min:nivel_puntaje_min
            },
            success:  function (respuesta){
                var respuesta = JSON.parse(respuesta);
                if(nivel_puntaje_min < respuesta['max']){
                    alert("La casilla puntaje inicial, debe de ser mayor a "+respuesta['max']);
                }
            },errors: function(){
                alert ('error');
            }
        });
    }
</script>