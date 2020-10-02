function aumentarvisto(categoria_id){
    var controlador = "";
    var base_url  = document.getElementById('base_url').value;
    controlador = base_url+'categoria/aumentar_categoria';
    $.ajax({url: controlador,
           type:"POST",
           data:{categoria_id:categoria_id},
           success:function(respuesta){
               
               var registros =  JSON.parse(respuesta);
                
               if (registros != null){
                    html = "";
            }
        },
        error:function(respuesta){
           html = "";
        }
        
    });   

}
