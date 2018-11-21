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
                    <span class="input-group-addon">
                        <span class="fa " target='_blank' OnClick="ReportAt();">example</span>
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
            <th scope="col">Imprimir</th>
        </tr>
    </thead>
    <tbody>
        <?php            
            foreach ($datos as $dato) {
                //obtenemos fecha 
                $date = $dato->fecha_atendido;
                //corta los datos de d,m,a
                $ext = explode("-",$date);
                //obtenemos el tipo de oficio
                $nomenclatura = $dato->nomenclatura;
                $cut = explode("/",$nomenclatura);
                echo "<tr>
                <th scope='row'>".$dato->nomenclatura."</th>".
                "<td>".$ext[2]."/".$ext[1]."/".$ext[0]."</td>".
                "<td>".$dato->nombre_aten." ".$dato->cargo_aten."</td>".
                "<td>".$dato->descripcion."</td>".
                "<td>".$dato->nombre." ".$dato->apellidop." ".$dato->apellidom."</td>".
                "<td align='center'><a href='descargarAtendido/".$dato->arch_atendido."' class='fa fa-download fa-1x'></td>".               
                "<td align='center'><a href='imprimirAtendido/".$dato->id_oficioAtendido."' target='_blank' class='fa fa-file fa-1x'></td>"; //".$dato->id_oficioAtendido."
            }
        ?>
    </tbody>
</table>
                         
