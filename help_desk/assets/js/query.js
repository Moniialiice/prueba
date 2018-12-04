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
//manda datos para generar excel
function excelEntrada() {
    var nomenclatura = $('#busqueda').val();
    var date1 = $("#date1").val();
    var date2 = $("#date2").val();
    if (date1 == "" || date2 == "") {
        $.sweetModal({
            content: 'Favor de Llenar todos los campos',
            icon: $.sweetModal.ICON_WARNING
        });
    } else {
        var form = document.getElementById("entrada");
        form.action = "OficioEntrada/reportExcelEn";
        form.setAttribute("target", "_blank");
        form.submit();
    }
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
//manda datos para generar excel
function excelOficio() {
    var nomenclatura = $('#busqueda').val();
    var date1 = $("#date1").val();
    var date2 = $("#date2").val();
    if (date1 == "" || date2 == "") {
        $.sweetModal({
            content: 'Favor de Llenar todos los campos',
            icon: $.sweetModal.ICON_WARNING
        });
    }else{
        var form = document.getElementById("oficio");
        form.action = "Oficio/reportExcelOS";
        form.setAttribute("target", "_blank");
        form.submit();
    }
}

//búsqueda de oficio seguimiento atendido
function BusquedaAt(){
    var data = $('#atendido').serialize();
    $.ajax({
        url: 'Atendido/consultaAtendido',
        type: 'post',
        data: data,
        success:function(data){
            $('#ratendido').html(data);
        }
    });
}
//manda datos para generar excel
function excelAtendido() {
    var nomenclatura = $('#busqueda').val();
    var date1 = $("#date1").val();
    var date2 = $("#date2").val();
    if (date1 == "" || date2 == "") {
        $.sweetModal({
            content: 'Favor de Llenar todos los campos',
            icon: $.sweetModal.ICON_WARNING
        });
    } else {
        var form = document.getElementById("atendido");
        form.action = "Atendido/reportExcelA";
        form.setAttribute("target", "_blank");
        form.submit();
    }
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
    $('#not').onclick(function (e) {
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

function conteo() {
    //mes dia y año
    var end = new Date('2018-12-03T17:50:00Z');

    var _second = 1000;
    var _minute = _second * 60;
    var _hour = _minute * 60;
    var _day = _hour * 24;
    var timer;

        var now = new Date();
        var distance = end - now;
        if (distance < 0) {

            clearInterval(timer);
            document.getElementById('countdown').innerHTML = 'Término Finalizado';

            return;
        }
        var days = Math.floor(distance / _day);
        var hours = Math.floor((distance % _day) / _hour);
        var minutes = Math.floor((distance % _hour) / _minute);
        var seconds = Math.floor((distance % _minute) / _second);
        
        document.getElementById('countdown').innerHTML = distance;
        document.getElementById('countdown').innerHTML = days + ' dias, ';
        document.getElementById('countdown').innerHTML += hours + ' horas, ';
        document.getElementById('countdown').innerHTML += minutes + ' minutos y ';
        document.getElementById('countdown').innerHTML += seconds + ' segundos';
        
    }
    timer = setInterval(conteo, 1000);