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
                        <span class="fa " target='_blank' OnClick="ReportOS();">example</span>
                    </span>  
                </ol>
			</div>
		</div>
	</div>
</div>                    
<table class="table animated fadeIn">
    <thead>
        <tr>
        <th scope="col">No. Oficio</th>
        <th scope="col">Fecha</th>
        <th scope="col">Se remite</th>
        <th scope="col">Solicitud</th>
        <th scope="col">Plazo</th>
        <th scope="col">Término</th>
        <th scope="col">Atención</th>
        <th scope="col">Imprimir</th>                             
        <th scope="col">Opciones</th>
        </tr>
    </thead>
        <tbody>
                            <?php
                              foreach ($datos as $dato) {
                                //cambia formato de fecha  
                                $date = $dato->fecha;
                                //corta los datos de d,m,a
                                $ext = explode("-",$date);
                                //código para cuanta atras
                                $varray = $dato->termino;
                                $partes = explode(' ',$varray);
                                $dmy = explode('-', $partes[0]);
                                $_SESSION['ans'] = $dmy[0];
                                $mes = (int)$dmy[1];
                                var_dump($mes);
                                $_SESSION['mes'] = $mes-1;
                                $_SESSION['dia'] = $dmy[2];
                                $h = explode(':', $partes[1]);
                                var_dump($h);
                                $_SESSION['hora'] = $h[0];
                                $_SESSION['minuto'] = $h[1];
                                $_SESSION['segundo'] = '00';
                                echo "<tr>                                
                                    <th scope='row'>".$dato->nomenclatura."</th>".
                                    "<td>".$ext[2]."/".$ext[1]."/".$ext[0]."</td>".
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
                                    "<td>".$dato->asunto."</td>".
                                    "<td>".$dato->termino."</td>"."<td><div OnLoad='Couldown();' ></div>";      
                                echo"</td><td>".$dato->nombre." ".$dato->apellidop." ".$dato->apellidom."</td>".
                                    "<td align ='center'><a href='imprimirOficio/".$dato->id_oficioseg."' target='_blank' class='fa fa-file fa-1x'></a></td>".
                                    "<td align='center'><a href='nuevoAtendido/".$dato->id_oficioseg."' class='fa fa-file fa-1x'></a></td>".
                                "</tr>";
                              }
                             ?>
                        </tbody>
                    </table>
                
