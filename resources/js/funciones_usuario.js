function generar_codigo(){
    var estetime = new Date();
    var anio = estetime.getFullYear();
    var dia = parseInt(estetime.getDate());
    var mes = parseInt(estetime.getMonth())+1;
    var letras = "abcdefghijklmnopqrstuvwxyz";
    var letras = letras.toUpperCase(); 
    var a = Math.floor(Math.random() * (24 - 1)) + 1;
    var b = Math.floor(Math.random() * (24 - 1)) + 1;
    var c = Math.floor(Math.random() * (24 - 1)) + 1;
    a = letras.substr(a,1);
    b = letras.substr(b,1);
    c = letras.substr(c,1);
    anio = anio - 2000;
    if(mes>0 && mes<10){
        mes = "0"+mes;
    }
    if(dia>0 && dia<10){
        dia = "0"+dia;
    }
    
    /*$('#producto_codigobarra').val(anio+mes+dia+hora+min+seg);*/
    $('#usuario_codigo').val(a+anio+b+mes+c+dia);
}

// function verificar_codigo(){

// }
