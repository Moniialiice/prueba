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
        <th scope="col">No. Oficio</th>
        <th scope="col">Fecha</th>
        <th scope="col">Se remite</th>
        <th scope="col">Solicitud</th>
        <th scope="col">Plazo</th>
        <th scope="col">Término</th>
        <th scope="col">Atención</th>
        <th scope="col">Imprimir</th>                             
        </tr>
    </thead>
        <tbody>
            <?php
                if($this->form_validation->run()==true)
                {
                              foreach ($datos as $dato) {  
                                $io = $dato->id_ofseg;
                                $ido = base64_encode($io);  
                                $plazo = $dato->termino_ofseg;
                                $date = $dato->fecha_ofseg;
                                //corta termino para obtener fecha y hora
                                $res = explode(" ",$plazo);  
                                $f = $res[0]; //fecha de termino
                                $h = $res[1]; //hora termino 
                                //corta fecha para cambiar formato
                                $termino = explode("-",$f);
                                $pyear = $termino[0]; 
                                $pmont = $termino[1];
                                $pday = $termino[2];        
                                //creamos objeto fecha: termino, actual                        
                                $date1 = new DateTime("$plazo");
                                $date2 = new DateTime("now");
                                //calcula la diferencias entre fechas 
                                $intervalo = date_diff($date1, $date2);
                                //de la diferencia obtenemos dias, horas, minutos
                                $dias = $intervalo->d; //dias restantes
                                $horas = $intervalo->h; //horas restantes
                                $minutos = $intervalo->i; //minutos restantes
                                //corta los datos de d,m,a
                                $ext = explode("-",$date);
                                //código para cuanta atras
                                echo "<tr>                                
                                    <th scope='row'>".$dato->nomen_ofseg."</th>".
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
                                        echo "Fiscal General ";
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
                                    "<td>".$dato->asunto_ofseg."</td>".
                                    "<td>".$pday."/".$pmont."/".$pyear." ".$h."</td>";
                                if($date1 > $date2){ //sí la fecha termino es mayor a fecha actual    
                                    echo "<td>Quedan ".$dias." días ".$horas." horas ".$minutos." minutos</td>"; //muestra los dias, horas y minutos restantes 
                                }else{
                                    echo "<td>Finalizado</td>"; //si la fecha termino es menor
                                }
                                //termino                                
                                echo"</td><td>".$dato->nombre." ".$dato->apellidop." ".$dato->apellidom."</td>".
                                    "<td align ='center'><a href='imprimirCapSeguimiento/".$ido."' target='_blank' class='fa fa-print fa-1x'></a></td>".
                                "</tr>";
                              }
                }              
            ?>
            </tbody>
    </table>
                
