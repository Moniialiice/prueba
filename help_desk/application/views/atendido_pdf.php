<style>
/*
* Estilo para las tablas PDF
*/
.reporte {
	/*border-collapse:collapse;*/
	width:100%;
}
.reporte th, td{
	font-size:8px;
	font-family:Arial, Helvetica, sans-serif;
}
.heading { #encabezado
	text-align: center;
	font-weight: bold;
	border: 0.5px solid black
}
.header, body, footer {
  display: block;
}
.table_cont{
	text-align: justify;
	height: 15px;
	font-size: 12px;
}
.table_footer{
	text-align: center;
	height: 15px;
	font-size: 5px;
	font-weight: bold;
}
.label_encabezado{
	text-align: center;
	height: 15px;
	font-size: 8px;
	font-weight: bold;
}
.label_presente{
	text-align: left;
	height: 15px;
	font-size: 8px;
	font-weight: bold;
}
p{
	text-align: right;
	height: 15px;
	font-size: 8px;
	font-weight: bold;
	margin-right: 50px;
}
.label_copia{
	text-align: left;
	height: 15px;
	font-size: 6px;
	font-weight: bold;
}

/*
* fin estilo para tablas de PDF
*
*
*/
</style>
<?php
	header("Content-Type: text/html;charset=ISO-8859-1");
	$date = $dato[0]->fecha_atendido;
	//corta los datos de d,m,a
	$ext = explode("-",$date);
	$year = $ext[0];
	$mont = $ext[1];
	$day = $ext[2];
	//array convierte número de mes en nombre 
	$months = array (1=>'ENERO',2=>'FEBRERO',3=>'MARZO',4=>'ABRIL',5=>'MAYO', 6=>'JUNIO', 7=>'JULIO', 8=>'AGOSTO', 9=>'SEPTIEMBRE', 10=>'OCTUBRE',11=>'NOVIEMBRE',12=>'DICIEMBRE'); 
?>
<div class="header">
<table>
	<tr>
		<td colspan="2"></td>
		<td colspan="6"><img src="assets/img/escudo.png" width="50" height="40"></td>
		<td colspan="20"></td>
		<td colspan="6"><img src="assets/img/logo_fgj.png" width="40" height="40"></td>
	</tr>
</table>
</div>
<div class="body">
	<label class="label_encabezado">
	<?php 
		switch($year){ 
			case '2016':
				echo "\"2016. AÑO DEL CENTENARIO DE LAS CONSTITUCIONES MEXICANA Y MEXIQUENSE DE 1017\".";
			break;
			case '2017':
				echo "\"2017. AÑO DEL CENTENARIO DE LA INSTALACIÓN DEL CONGRESO CONSTITUYENTE\".";
			break;
			case '2018':
				echo "\"2018. AÑO DEL BICENTENARIO DEL NATALICIO DE IGNACIO RAMÍREZ CALZADA, EL NIGROMANTE\".";
			break;
			case '2019':
				echo "\" 2019. AÑO DEL CENTÉSIMO ANIVERSARIO LUCTUOSO DE EMILIANO ZAPATA SALAZAR, EL CAUDILLO DEL SUR\".";
			break;
		}	
	?>
	</label>
<br><br><br>
<table>
	<tr><td colspan="2"></td><td colspan="6"><p>FISCALÍA GENERAL DE JUSTICIA DEL ESTADO DE MÉXICO.<br>COORDINACIÓN GENERAL DE COMBATE AL SECUESTRO.<br>
	METEPEC, ESTADO DE MEXICO A <?php echo $day." DE ".$months[(int)$mont]." DE ".$year."."; ?><br>OFICIO <?php echo $dato[0]->nomenclatura.".";?></p>
	</td><td></td></tr>
</table>
<br><br><br><br>
<table>
	<tr><td></td><td colspan="7"><label class="label_presente"><?php echo $dato[0]->nombre_aten."<br>".$dato[0]->cargo_aten."<br>PRESENTE.";?></label></td><td></td></tr>
</table>	
<br><br><br>
<table class="table_cont">
	<tr><td></td><td colspan="7"><?php echo nl2br($dato[0]->descripcion);?></td><td></td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td></tr>
</table>
<br><br><br><br>
<label class="label_encabezado">ATENTAMENTE</label><br><br><br><br><br>
<label class="label_encabezado">
	<?php 
		$nom = $dato[0]->nomenclatura; 
		$cut = explode("/",$nom); 
		if($cut[0]=="400LIA000"){
		echo"DR. H. C. RODRIGO ARCHUNDIA BARRIENTOS <br>COORDINADOR GENERAL DE COMBATE AL SECUESTRO";
		}elseif($cut[0]=="400LI0010"){
			echo "ANTONIO MARTIN TORRES BALLESTEROS <br>SECRETARIO PARTICULAR DEL COORDINADOR <br>GENERAL DE COMBATE AL SECUESTRO";
		} ?>
</label><br><br><br>
<table>
	<tr><td></td><td colspan="7"><label class="label_copia"><?php echo nl2br($dato[0]->copia_a);?></label>	
</td><td></td></tr>
</table>
</div><br>
<div class="footer">
<table class='table_footer'>
	<tr><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td><img src="assets/img/pie_pagina.png" width="700" height="65"></td></tr>
</table>
</div>