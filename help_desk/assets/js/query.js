//mayusculas
function Upper(e){
    e.value = e.value.toUpperCase();
}

//búsqueda de Usuario
function BusquedaUs(){
    var data = $('#usuario').serialize();
    $.ajax({
        url: 'Usuario/ejemplo',
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
            $('#rentrada').html(data);
        }
    });
}
//búsqueda de Oficio seguimiento
function BusquedaOf(){
    var data = $('#oficio').serialize();
    $.ajax({
        url: 'Oficio/consultaOficio',
        type: 'post',
        data: data,
        success:function(data){
            $('#roficio').html(data);
        }
    });
}

//imprime nomenclatura 
function nomenclatura(){
    var data = $('#nom').serialize();
    $.ajax({
        url: 'Oficio/consecutivo',
        type: 'post',
        data: data,
        success:function(data){
            $('#consecutivo').html(data);
        }
    });
}

$(function (e) {
    $('#not').submit(function (e) {
        e.preventDefault()
        $('#nott').load('buscanoticia.php?' + $('#not').serialize())
    })
})


function Paginacion(){
    var data = $('#usuario').serialize();
    $.ajax({
        url: 'Usuario/ejemplo',
        type: 'post',
        data: data,
        success:function(data){
            $('#results').html(data);
        }
    });
}

