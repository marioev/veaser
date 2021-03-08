/**
 * 
 *  Busca por el codigo del vendedor a un usuario
 */
function buscar_vendedor(b){
    var controlador = "";
    var base_url  = document.getElementById('base_url').value;
    controlador = base_url+'usuario/get_all_vendedores';
    var codigo;
    codigo = document.getElementById('codigo_vendedor').value;
    console.log(b);
    mostrar_div_vendedor();
    $.ajax({url: controlador,
        type: "POST",
        data:{
            codigo:codigo,
            b:b
        },
        success: function(respuesta){
            var registros = JSON.parse(respuesta);
            var tamanio = registros.length;
            var aleatorio = Math.floor(Math.random() * tamanio);
            // console.log(tamanio);
            console.log(registros[aleatorio]['usuario_codigo']);
            document.getElementById("nombre").innerHTML = registros[aleatorio]['usuario_nombre'];
            document.getElementById("codigo").innerHTML = registros[aleatorio]['usuario_codigo'];
            document.getElementById("correo").innerHTML = registros[aleatorio]['usuario_email'];
            document.getElementById("numero").innerHTML = registros[aleatorio]['usuario_telefono'];
            document.getElementById("contaco_whatsapp").href = "https://api.whatsapp.com/send?phone="+registros[aleatorio]['usuario_telefono'];
            // document.getElementById("codigo_vendedor").reset();
        },
        error: function(respuesta){
            alert('Vendedor no encontrado');
        }
    });
}

function mostrar_div_vendedor(){
    div = document.getElementById('div_vendedor');
    div.style.display = '';
}
function cerrar() {
    div = document.getElementById('div_vendedor');
    div.style.display = 'none';
}
