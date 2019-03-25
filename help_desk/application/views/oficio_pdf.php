<style>
@page {
    margin: 0cm 0cm;
    }
/** Define now the real margins of every page in the PDF **/
body {
    margin-top: 2cm;
    margin-left: 2cm;
    margin-right: 2cm;
    margin-bottom: 1cm;
	}
header {
    position: fixed;
    top: 0cm;
    left: 2cm;
    right: 2cm;
    height: 3cm;
    }
footer {
	position: fixed; 
    bottom: 0.5cm; 
    left: 1cm; 
    right: 1cm;
    height: 2cm;
}
h1 {
	text-align: center;
	font-size: 10px;
	font-family:Arial, Helvetica, sans-serif;
}
.p_right{
	text-align: right;
	font-size: 9px;
	font-weight: bold;
	font-family:Arial, Helvetica, sans-serif;
}
.p_bold{
	font-weight: bold;
	font-size: 8px;
	font-family:Arial, Helvetica, sans-serif;
}
.p_justify{
	text-align: justify;
	font-size: 8px;
	font-weight: bold;
	font-family:Arial, Helvetica, sans-serif;
}
.p_left{
	text-align: left;
	font-size: 8px;
	font-weight: bold;
	font-family:Arial, Helvetica, sans-serif;
}
.p_center{
	text-align: center;
	font-size: 8px;
	font-weight: bold;
	font-family:Arial, Helvetica, sans-serif;
}
table{
	width: 100%; 
	border-collapse: collapse;
	border: 1px solid black;
}
td{
	border-collapse: collapse;
	border: 1px solid black;	
}
</style>
<?php
	header("Content-Type: text/html;charset=ISO-8859-1");
	//recibe fecha  
	$date = $dato[0]->fecha;
	//corta los datos de d,m,a
	$ext = explode("-",$date);
	$year = $ext[0];
	$mont = $ext[1];
	$day = $ext[2];
	//array convierte número de mes en nombre 
	$months = array (1=>'ENERO',2=>'FEBRERO',3=>'MARZO',4=>'ABRIL',5=>'MAYO', 6=>'JUNIO', 7=>'JULIO', 8=>'AGOSTO', 9=>'SEPTIEMBRE', 10=>'OCTUBRE',11=>'NOVIEMBRE',12=>'DICIEMBRE'); 
	$termino = $dato[0]->termino;
	$space = explode(" ",$termino);
	$fec = explode("-",$space[0]);
	$fechat = $fec[2]."/".$fec[1]."/".$fec[0]." ".$space[1];
?>
<body>
	<header>
		<img src="assets/img/header.png" width="100%" height="70%">
	</header>
	<h1>TRAMITE DE TURNO</h1>
	<p class="p_right">METEPEC, ESTADO DE MEXICO A <?php echo $day." DE ".$months[(int)$mont]." DE ".$year; ?></p>
	<table>
		<tr>
			<td><p class="p_center">NO. OFICIO</p></td>
			<td colspan="4"><p class="p_center">ASUNTO</p></td>
		</tr>
		<tr>	
			<td><p class="p_center"><?php echo $dato[0]->nomenclatura;?></p></td>
			<td colspan="4"><p class="p_justify"><?php echo $dato[0]->asunto;?></p></td>
		</tr>
	</table>
	<p class="p_bold">ETIQUETAS DE ASUNTOS:</p>
	<table>
		<tr>
			<td colspan="4"><p class="p_left">COLABORACIÓN</p></td>
			<td>
			<p class="p_center"><?php if($dato[0]->colaboracion == 1){echo " X ";} ?></p>
			</td>
			<td colspan="4"><p class="p_left">RECURSOS HUMANOS</p></td>
			<td>
			<p class="p_center"><?php if($dato[0]->recursos_humanos == 1){echo " X ";}else{ echo " ";}?></p>
			</td>
		</tr>
		<tr>
			<td colspan="4"><p class="p_left">BOLETAS DE AUDIENCIA</p></td>
			<td>
			<p class="p_center"><?php if($dato[0]->boletas_audiencia == 1){echo " X ";}?></p>
			</td>
			<td colspan="4"><p class="p_left">TELEFONÍA</p></td>
			<td>
			<p class="p_center"><?php if($dato[0]->telefonia ==1 ){ echo " X ";} ?></p>
			</td>
		</tr>
		<tr>
			<td colspan="4"><p class="p_left">SOLICITUDES</p></td>
			<td>
			<p class="p_center"><?php if($dato[0]->solicitudes == 1 ){ echo " X "; }?></p>
			</td>
			<td colspan="4"><p class="p_left">ESTADÍSTICA</p></td>
			<td>
			<p class="p_center"><?php if($dato[0]->estadistica == 1){echo " X ";}?></p>
			</td>
		</tr>
		<tr>
			<td colspan="4"><p class="p_left">GESTIÓN</p></td>
			<td>
			<p class="p_center"><?php if($dato[0]->gestion == 1){echo " X ";}?></p>
			</td>
			<td colspan="4"><p class="p_left">RELACIONES INTERINSTITUCIONALES</p></td>
			<td>
			<p class="p_center"><?php if($dato[0]->relaciones_interis == 1){echo " X ";}?></p>
			</td>
		</tr>
		<tr>
			<td colspan="4"><p class="p_left">CURSOS Y CAPACITACIONES</p></td>
			<td>
			<p class="p_center"><?php if($dato[0]->cursos_capacitaciones == 1){echo " X ";}?></p>
			</td>
			<td colspan="4"><p class="p_left">BOLETAS DE AUDIENCIA</p></td>
			<td>
			<p class="p_center"><?php if($dato[0]->boletas_audiencia == 1){echo " X ";}?></p>
			</td>
		</tr>
		<tr>
			<td colspan="4"><p class="p_left">JUZGADOS</p></td>
			<td>
			<p class="p_center"><?php if($dato[0]->juzgados == 1){echo " X ";}?></p>
			</td>
			<td colspan="4"><p class="p_left">COPIAS DE CONOCIMIENTO</p></td>
			<td>
			<p class="p_center"><?php if($dato[0]->copias_conocimiento == 1){echo " X ";}?></p>
			</td>
		</tr>
	</table>
	<p class="p_bold">EL COORDINADOR GENERAL DE COMBATE AL SECUESTRO DE LA FISCALÍA GENERAL DE JUSTICIA DEL ESTADO DE MÉXICO INSTRUYE SE TURNE A: </p>		
	<table>
		<tr>
			<td colspan="4"><p class="p_left">CONASE</p></td>
			<td>
			<p class="p_center"><?php if($dato[0]->conase == 1){ echo " X ";}?></p>
			</td>
			<td colspan="4"><p class="p_left">FISCAL GENERAL</p></td>
			<td>
			<p class="p_center"><?php if($dato[0]->fiscal_general == 1){ echo " X ";}?></p>
			</td>
		</tr>
		<tr>
			<td colspan="5"><p class="p_left">FISCALÍA ESPECIALIZADA DE SECUESTRO DE</p></td>
			<td colspan="4"><p class="p_left">VICEFISCALIA</p></td>
			<td>
			<p class="p_center"><?php if($dato[0]->vicefiscalia){echo " X ";}?></p>
			</td>
		</tr>
		<tr>
			<td colspan="4"><p class="p_left">VALLE DE TOLUCA</p></td>
			<td>
			<p class="p_center"><?php if($dato[0]->valle_toluca == 1){echo "X";}?></p>
			</td>
			<td colspan="4"><p class="p_left">OFICIALÍA MAYOR</p></p></td>
			<td>
			<p class="p_center"><?php if($dato[0]->oficialia_mayor == 1){echo "X";}?></p>
			</td>
		</tr>
		<tr>
			<td colspan="4"><p class="p_left">VALLE DE MÉXICO</p></td>
			<td>
			<p class="p_center"><?php if($dato[0]->valle_mexico == 1){echo " X ";}?></p>
			</td>
			<td colspan="4"><p class="p_left">DEPARTAMENTO DE INFORMACIÓN Y ESTADÍSTICA</p></td>
			<td>
			<p class="p_center"><?php if($dato[0]->informacion_estadistica == 1){echo " X ";}?></p>
			</td>
		</tr>
		<tr>
			<td colspan="4"><p class="p_left">ZONA ORIENTE</p></td>
			<td>
			<p class="p_center"><?php if($dato[0]->zona_oriente == 1){echo " X "; }?></p>
			</td>
			<td colspan="4" ><p class="p_left">CENTRAL JURÍDICO</p></td>
			<td>
			<p class="p_center"><?php if($dato[0]->central_juridico == 1){echo " X ";}?></p>
			</td>
		</tr>
		<tr>
			<td colspan="5"><p class="p_left">OTRAS:</p><?php if($dato[0]->otra != ""){ echo $dato[0]->otra; }?></td>
			<td colspan="4"><p class="p_left">SERVICIO DE CARRERA </p></td>
			<td>
			<p class="p_center"><?php if($dato[0]->servicio_carrera == 1){ echo " X ";}?></p>
			</td>
		</tr>
	</table><br>
	<table>
		<tr>
			<td colspan="5"><p class="p_left">REALIZAR DILIGENCIAS EN VÍA DE COLABORACIÓN</p></td>
			<td>
				<p class="p_center"><?php if($dato[0]->realiza_diligencias == 1){ echo " X ";}?></p>
			</td>
			<td colspan="4"><p class="p_left">INFORMAR A: </p></td>
			<td><p class="p_left"> TERMINO</p></td>
		</tr>
		<tr>
			<td colspan="5"><p class="p_left">RECIBIR PERSONALMENTE EN AUDIENCIA E INFORMAR </p></td>
			<td>
				<p class="p_center"><?php if($dato[0]->recibir_personalmente==1){echo " X ";}?></p>	
			</td>
			<td colspan="3"><p class="p_left">ESTA OFICINA </p></td>
			<td><p class="p_center"><?php if($dato[0]->esta_oficina == 1){ echo " X ";}?></p></td>
			<td><p class="p_center"><?php if($dato[0]->esta_oficina == 1){ echo $fechat; }?></p></td>
		</tr>
		<tr>
			<td colspan="5"><p class="p_left"> GESTIONAR PETICIÓN Y REMITIR CONSTANCIAS QUE ACREDITEN LA ATENCIÓN BRINDADA</p> </td>
			<td><p class="p_center"><?php if($dato[0]->gestionar_peticion == 1){echo " X ";}?></p></td>
			<td colspan="3"><p class="p_left"> PETICIONARIO </p></td>
			<td><p class="p_center"><?php if($dato[0]->peticionario == 1){echo " X ";}?></p></td>
			<td><p class="p_center"><?php if($dato[0]->peticionario == 1){ echo $fechat; }?></p></td>
		</tr>
		<tr>
			<td colspan="5"><p class="p_left"> ARCHIVO </p></td>
			<td><p class="p_center"><?php if($dato[0]->archivo == 1){ echo " X ";}?></p></td>
			<td colspan="3"><p class="p_left"> INSTITUCIÓN REQUIRENTE </p></td>
			<td><p class="p_center"><?php if($dato[0]->institucion_requiriente == 1){ echo " X "; }?></p></td>
			<td><p class="p_center"><?php if($dato[0]->institucion_requiriente == 1){ echo $fechat; }?></p></td> 
		</tr>
		<tr>
			<td colspan="11"><p class="p_justify">OTRAS: <?php if($dato[0]->otras != ""){ echo $dato[0]->otras;}?></p></td>
		</tr>
	</table><br>
	<table>
		<tr>
			<td colspan="5" ><p class="p_center"> ELABORO:</p></td>
			<td colspan="6"><p class="p_center"> Vo. Bo.</p></td>
		</tr>
		<tr>
			<td colspan="5"><br><br><p class="p_center"><?php echo $dato[0]->nombre." ".$dato[0]->apellidop." ".$dato[0]->apellidom;?></p> </td>
			<td colspan = "6"><br><br><p class="p_center"> DR. H. C. RODRIGO ARCHUNDIA BARREINTOS<br>COORDINADOR GENERAL DE COMBATE AL SECUESTRO</p>
			</td>
		</tr>
	</table><br>
	<table>
		<tr><td colspan="16"><p class="p_justify"> OBSERVACIONES: <?php echo $dato[0]->observaciones;?></p></td></tr>
	</table>
</body>