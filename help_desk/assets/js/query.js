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

//búsqueda de oficio seguimiento captura
function BusquedaCap(){
    var data = $('#captura').serialize();
    $.ajax({
        url: 'Captura/consultaCapturaOS',
        type: 'post',
        data: data,
        success:function(data){
            $('#rcaptura').html(data);
        }
    });
}

//búsqueda de oficio seguimiento atendido
function BusquedaAts(){
    var data = $('#atendidos').serialize();
    $.ajax({
        url: 'Captura/consultaCapturaAten',
        type: 'post',
        data: data,
        success:function(data){
            $('#ratendidos').html(data);
        }
    });
}
//búsqueda de entrada captura
function BusquedaEnCa(){
    var data = $('#capentrada').serialize();
    $.ajax({
        url: 'Captura/consultaEntradaAten',
        type: 'post',
        data: data,
        success:function(data){
            $('#entradac').html(data);
        }
    });
}
//busqueda de todos usuarios
function excelUsuario(){
    var nomenclatura = $('#busqueda').val();
    var form = document.getElementById("usuario");
    form.action = "Usuario/reportExcelUs";
    form.setAttribute("target", "_blank");   
    form.submit();
}

//búsqueda de oficio atendido captura
function BusquedaBitacora(){
    var data = $('#bit').serialize();
    $.ajax({
        url: 'Bitacora/consultaBit', 
        type: 'post',
        data: data,
        success:function(data){
            $('#rbit').html(data);
        }
    });
}
//pdf bitacora
function pdfBitacora() {
    var nomenclatura = $('#busqueda').val();
    var date1 = $("#date1").val();
    var date2 = $("#date2").val();
    if (date1 == "" || date2 == "") {
        $.sweetModal({
            content: 'Favor de Llenar todos los campos',
            icon: $.sweetModal.ICON_WARNING
        });
    } else {
        var form = document.getElementById("bit");
        form.action = "Bitacora/imprimirBitacora";
        form.setAttribute("target", "_blank");
        form.submit();
    }
}



//
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

//búsqueda de captura atendido
//búsqueda de oficio seguimiento atendido
function consultaCapturaAten(){
    var data = $('#atendido').serialize();
    $.ajax({
        url: 'Captura/consultaAtendido',
        type: 'post',
        data: data,
        success:function(data){
            $('#ratendido').html(data);
        }
    });
}

