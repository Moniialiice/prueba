<div class="breadcrumbs">
    <div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1> Oficio Atendido</h1>
			</div>
		</div>
	</div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><!--a href="nuevaEntrada">Nuevo Oficio Recepción</a--></li>
                    </ol>
                </div>
            </div>
		</div>
</div>
<div class="content mt-3">
  <div class="animated fadeIn">
      <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Oficio Atendido</strong>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No. Oficio</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Firma Origen</th>
                                <th scope="col">Petición</th>
                                <th scope="col">Atención</th>
                                <th scope="col">Descargar</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            //var_dump($row);  
                            foreach ($datos as $dato) {
                                //obtenemos fecha 
                                $date = $dato->fecha_atendido;
                                //corta los datos de d,m,a
                                $ext = explode("-",$date);
                                //obtenemos el tipo de oficio
                                $nomenclatura = $dato->nomenclatura;
                                echo "<tr>
                                <th scope='row'>".$dato->nomenclatura."</th>".
                                "<td>".$ext[2]."/".$ext[1]."/".$ext[0]."</td>".
                                "<td>".$dato->nombre_aten." ".$dato->cargo_aten."</td>".
                                "<td>".$dato->descripcion."</td>".
                                "<td>".$dato->nombre." ".$dato->apellidop." ".$dato->apellidom."</td>".
                                "<td align='center'><a href='descargarAtendido/".$dato->arch_atendido."' class='fa fa-download fa-1x'></a></td>".               
                                "<td align='center'><a href='imprimirAtendido/".$dato->id_oficioAtendido."' target='_blank' class='fa fa-plus fa-1x'></a></td>"; //".$dato->id_oficioAtendido."
                            }        
                        ?>
                        </tbody>
                    </table>
                    <?php
                        /* Se imprimen los números de página */          
                        echo $this->pagination->create_links();
                    ?>
                </div>
            </div>
        </div>
      </div>
  </div>
</div>
