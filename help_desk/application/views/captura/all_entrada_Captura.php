<?php
    if($this->session->flashdata('Error')){
        echo "<div><label for='text-input' class='form-control-label fa fa-exclamation'> Datos no recibidos</label></div>";
    }
    echo validation_errors();
?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1> </h1>
            </div>
        </div>
    </div>
</div>
<table class="table animated fadeIn">
    <thead>
        <tr>           
            <th scope="col">No. Control</th>
            <th scope="col">No. Oficio</th>
            <th scope="col">Día y Hora Recepción Oficialía</th>
            <th scope="col">Fecha y Hora Recepción Coordinación</th>
            <th scope="col">Fecha Origen</th>
            <th scope="col">Firma Origen</th>
            <th scope="col">Petición</th>
            <th scope="col">Atención</th>
            <th scope="col">Descargar</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php //excel.png
        if($this->form_validation->run()==true){         
            foreach ($datos as $dato) {
                $oe = $dato->id_cEntrada;
                $ide = base64_encode($oe);
                $date = $dato->cfecha_ent;
                $espacio = explode(" ", $date);
                $fec = explode("-", $espacio[0]);
                $fecha1 = $fec[2]."/".$fec[1]."/".$fec[0]." ".$espacio[1];
                //cambia formato de fecha recepción
                $date2 = $dato->cfecha_rec;
                $espacio2 = explode(" ", $date2);
                $fec2 = explode("-", $espacio2[0]);
                $fecha2 = $fec2[2]."/".$fec2[1]."/".$fec2[0]." ".$espacio2[1];
                //cambia formato de fecha real
                $date3 = $dato->cfecha_real;
                $ext = explode('-',$date3);
                $fecha3 = $ext[2]."/".$ext[1]."/".$ext[0]; 
                echo "<tr>                
                <th scope='row'>".$dato->ccontrol."</th>".
                "<th scope='row'>".$dato->no_cEntrada."</th>".
                "<td>".$fecha1."</td>".
                "<td>".$fecha2."</td>".
                "<td>".$fecha3."</td>".
                "<td>".$dato->cfirma_origen." ".$dato->ccargo."</td>".
                "<td>".$dato->cpeticion."</td>".
                "<td>".$dato->nombre." ".$dato->apellidop." ".$dato->apellidom."</td>".
                "<td align='center'><a href='descargar/".$dato->carch_entrada."' class='fa fa-download fa-1x'></td>".
                "<td align='center'><a href='nuevoSeguimiento/".$ide."' class='fa fa-plus fa-1x'></td>".
                "</tr>";
            }
        }
        ?>
    </tbody>
</table>
                         
