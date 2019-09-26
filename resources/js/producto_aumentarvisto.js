function aumentarvistoproducto(producto_id){
    var controlador = "";
    var base_url  = document.getElementById('base_url').value;
    controlador = base_url+'producto/aumentar_producto';
    $.ajax({url: controlador,
           type:"POST",
           data:{producto_id:producto_id},
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
