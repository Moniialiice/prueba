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
                        <img src="assets/img/excel.png" width="30" height="30"target='_blank' OnClick="excelAtendido();">
                    </span> 
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
            <th scope="col">Actualizar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if($this->form_validation->run()==true)
        {   
            //var_dump($row);  
            foreach ($datos as $dato) {
                $ia = $dato->id_oficioAtendido;
                $ida = base64_encode($ia); 
                //obtenemos fecha 
                $date = $dato->fecha_atendido;
                //corta los datos de d,m,a
                $ext = explode("-",$date);
                //obtenemos el tipo de oficio
                $nomenclatura = $dato->nomenclatura_aten;
                $cut = explode("/",$nomenclatura);
                echo "<tr>
                <th scope='row'>".$dato->nomenclatura_aten."</th>".
                "<td>".$ext[2]."/".$ext[1]."/".$ext[0]."</td>".
                "<td>".$dato->nombre_aten." ".$dato->cargo_aten."</td>".
                "<td>".$dato->descripcion."</td>".
                "<td>".$dato->nombre." ".$dato->apellidop." ".$dato->apellidom."</td>";
                if(empty($dato->arch_atendido)){
                echo "<td align='center'><a href=''></a>Sin Archivo</td>";               
                }else{
                echo "<td align='center'><a href='descargarAtendido/".$dato->arch_atendido."' class='fa fa-download fa-1x'></a></td>";           
                }
                echo "<td align='center'><a href='actualizarAtendido/".$ida."' class='fa fa-edit fa-1x'></a></td>"; //".$dato->id_oficioAtendido."
            }
        }        
        ?>
    </tbody>
</table>
                         
