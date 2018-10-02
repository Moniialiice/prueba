<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1> Consulta Oficio Seguimiento</h1>
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
                    <strong class="card-title">Oficio Seguimiento</strong>
                </div>
                <div class="card-body">
                    <div class="form-inline">
                        <form class="search-form" action="resultOficio" method="post" id="oficio">
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
                                <th scope="col">Fecha</th>
                                <th scope="col">A quien se remite</th>
                                <th scope="col">Solicitud</th>
                                <th scope="col">Termino</th>
                                <th scope="col">Atención</th>                             
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                            <tbody>
                            <?php
                              foreach ($datos as $dato) {
                                //a quién se remite
                                echo "<tr>                                
                                    <th scope='row'>".$dato->nomenclatura."</th>".
                                    "<td>".$dato->fecha."</td>".
                                    "<td>";
                                    if ($dato->conase == 1){
                                        echo "CONASE ";
                                    }else{
                                        echo "";
                                    }if($dato->valle_toluca == 1){
                                        echo "Valle de Toluca ";
                                    }else{
                                        echo "";
                                    }if ($dato->valle_mexico == 1){
                                        echo "Valle de México ";
                                    }else{
                                        echo "";
                                    }if($dato->zona_oriente == 1){
                                        echo "Fiscalia Zona Oriente ";
                                    }else{
                                        echo "";                                       
                                    }if($dato->fiscal_general == 1){
                                        echo "Fiscal General";
                                    }else{
                                        echo "";
                                    }if($dato->vicefiscalia == 1){
                                        echo "Viceficalia ";
                                    }else{
                                        echo "";
                                  }if($dato->oficialia_mayor == 1){
                                        echo "Oficialia Mayor ";
                                  }else{
                                        echo"";
                                  }if($dato->informacion_estadistica == 1){
                                        echo "Departamento de Información y Estadistica ";
                                  }else{
                                        echo"";
                                  }if($dato->central_juridico == 1){
                                        echo "Central Jurídico ";
                                  }else{
                                        echo"";
                                  }if($dato->servicio_carrera == 1){
                                        echo"Servicio Carrera ";
                                  }else{
                                        echo "";
                                  }if($dato->otra != " "){
                                        echo "$dato->otra";
                                  }else{
                                        echo "";
                                  }

                                echo "</td>".
                                    "<td>".$dato->asunto."</td>";
                                if($dato->termino == 0){
                                    echo "<td> 00:00 hrs </td>";
                                }if($dato->termino == 1){
                                    echo "<td> 24:00 hrs </td>";
                                }if($dato->termino == 2){
                                    echo "<td> 48:00 hrs </td>";
                                }    
                                echo"<td>".$dato->nombre." ".$dato->apellidop." ".$dato->apellidom."</td>".
                                    "<td align='center'><a href='muestraOficio/".$dato->id_oficioseg."' class='fa fa-file fa-1x'></a></td>".
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
