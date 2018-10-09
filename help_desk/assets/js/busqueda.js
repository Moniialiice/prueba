//búsqueda de Usuario
function BusquedaUs(){
    var data = $('#usuario').serialize();
    $.ajax({
        url: 'Usuario/consultaUsuario',
        type: 'post',
        data: data,
        success:function(data){
            $('#results').html(data);
        }
    });
}
//búsqueda de Oficio Entrada
function BusquedaEn(){
    var data = $('#entrada').serialize();
    $.ajax({
        url: 'OficioEntrada/consultaEntrada',
        type: 'post',
        data: data,
        success:function(data){
            $('#results').html(data);
        }
    });
}