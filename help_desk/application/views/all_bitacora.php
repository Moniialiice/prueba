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
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
                    <span> 
                        <img src="assets/img/excel.png" width="30" height="30"target='_blank' OnClick="pdfBitacora();">
                    </span> 
                </ol>
			</div>
		</div>
	</div>
</div>
<table class="table animated fadeIn">
    <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Actividad</th>
            <th scope="col">Fecha</th>
            <th scope="col">Hora</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if($this->form_validation->run()==true)
        {   
            //var_dump($row);  
            foreach ($datos as $dato) {
                //obtenemos fecha 
                $date = $dato->fecha_bit;
                //corta los datos de d,m,a
                $ext = explode("-",$date);
                //obtenemos el tipo de oficio
                echo "<tr>
                <td>".$dato->nombre." ".$dato->apellidop." ".$dato->apellidom."</td>".
                "<td>".$dato->registro_bit."</td>".
                "<td>".$ext[2]."/".$ext[1]."/".$ext[0]."</td>".
                "<td>".$dato->hora_bit."</td>"; //".$dato->id_oficioAtendido."
            }
        }        
        ?>
    </tbody>
</table>
                         
