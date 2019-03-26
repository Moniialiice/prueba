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
                   
                </ol>
			</div>
		</div>
	</div>
</div>
<table class="table animated fadeIn">
    <thead>
        <tr>
            <th scope="col">No. Oficio Seguimiento</th>
            <th scope="col">Fecha Atendido</th>
            <th scope="col">Dirigido a</th>
            <th scope="col">Descripción</th>
            <th scope="col">Atención</th>
            <th scope="col">Descargar</th>
            <th scope="col">Imprimir</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if($this->form_validation->run()==true)
        {   
            //var_dump($row);  
            foreach ($datos as $dato) {
                $ia = $dato->id_ofAtenCap;
                $ida = base64_encode($ia);
                //obtenemos fecha 
                $date = $dato->fecha_atenCap;
                //corta los datos de d,m,a
                $ext = explode("-",$date);
                //obtenemos los datos
                echo "<tr>
                <th scope='row'>".$dato->nomen_ofseg."</th>".
                "<td>".$ext[2]."/".$ext[1]."/".$ext[0]."</td>".
                "<td>".$dato->nombre_atenCap." ".$dato->cargo_atenCap."</td>".
                "<td>".$dato->descCap."</td>".
                "<td>".$dato->nombre." ".$dato->apellidop." ".$dato->apellidom."</td>".
                "<td align='center'><a href='descargarAtendido/".$dato->arch_atenCap."' class='fa fa-download fa-1x'></a></td>".               
                "<td align='center'><a href='imprimirCapAtendido/".$ida."' target='_blank' class='fa fa-print fa-1x'></a></td>"; //".$dato->id_oficioAtendido."
            }
        }        
        ?>
    </tbody>
</table>
                         
