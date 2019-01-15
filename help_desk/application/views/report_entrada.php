<div class="breadcrumbs">
    <div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1> Oficios de Entrada</h1>
			</div>
		</div>
	</div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="nuevaEntrada">Nuevo Oficio Recepción</a></li>
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
                    <strong class="card-title">Oficios Entrada</strong>
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
                                foreach ($datos as $dato) {
                                    //cambiamos formato de fecha
                                    $date = $dato->fecha_ent;
                                    $espacio = explode(" ", $date);
                                    $fec = explode("-", $espacio[0]);
                                    $fecha1 = $fec[2]."/".$fec[1]."/".$fec[0]." ".$espacio[1];
                                    echo "<tr>
                                            <th scope='row'>".$dato->no_oficioEntrada."</th>".
                                            "<td>".$fecha1."</td>".
                                            "<td>".$dato->firma_origen." ".$dato->cargo."</td>".
                                            "<td>".$dato->peticion."</td>".
                                            "<td>".$dato->nombre." ".$dato->apellidop." ".$dato->apellidom."</td>".
                                            "<td align='center'><a href='descargar/".$dato->arch_entrada."' class='fa fa-download fa-1x'></a></td>".
                                            "</tr>";
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
