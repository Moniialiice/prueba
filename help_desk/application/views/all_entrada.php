<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1> Consulta Oficio Recepción</h1>
            </div>
        </div>
    </div>
		<div class="col-sm-8">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li><a href=""></a></li>
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
                    <strong class="card-title">Oficio Recepción</strong>
                </div>
                <div class="card-body">
                    <div class="form-inline">
                        <form class="search-form" action="resultEntrada" method="post" id="entrada">
                            <div class="col col-md-5"><label class="search-form label" >Búsqueda por número de oficio</label></div>
                            <input class="form-control mr-sm-3" type="text" placeholder="" id="text-input" name='busqueda'>
                            <button class="search-form" type="submit" id=""><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div  class="card-body card-block" id="results"></div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No. Oficio</th>
                                <th scope="col">Fecha Recepción</th>
                                <th scope="col">Fecha Real</th>
                                <th scope="col">Firma Origen</th>
                                <th scope="col">Petición</th>
                                <th scope="col">Atención</th>
                                <th scope="col">Descargar</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                              foreach ($datos as $dato) {
                                echo "<tr>
                                <th scope='row'>".$dato->no_oficioEntrada."</th>".
                                "<td>".$dato->fecha_ent."</td>".
                                "<td>".$dato->fecha_real."</td>",
                                "<td>".$dato->firma_origen."</td>".
                                "<td>".$dato->peticion."</td>".
                                "<td>".$dato->nombre." ".$dato->apellidop." ".$dato->apellidom."</td>".
                                "<td align='center'><a href='descargar/".$dato->arch_entrada."' class='fa fa-download fa-1x'></td>".
                                "<td align='center'><a href='nuevoSeguimiento/".$dato->id_oficioEntrada."' class='fa fa-file fa-1x'> </a></td>".
                                "</tr>";
                              }
                             ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      </div>
  </div>
</div>
                    
