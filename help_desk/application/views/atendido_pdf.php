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

.fecha_lib{
	width: 70%;
	border: 0.0px solid white
}

.datos{
	width: 70%;
}

.titulo_tr {
	background-color:#CDDCAE;
	text-align: center;
	font-weight: bold;
	font-size: 9px;
	border: 0.5px solid black
}
.heading { #encabezado
	text-align: center;
	font-weight: bold;
	border: 0.5px solid black
}
.table_cont{
	text-align: justify;
	height: 15px;
	font-size: 10px;
}
.table_footer{
	text-align: center;
	height: 15px;
	font-size: 9px;
	font-weight: bold;
}
.div_conten{
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
	font-size: 9px;
	font-weight: bold;
}
p{
	text-align: right;
	height: 15px;
	font-size: 9px;
	font-weight: bold;
	margin-right: 50px;
}
.hid_tr{
	text-align: center;
	font-weight: bold;
	font-size: 9px;
}
.td_height{
	text-align: center;
	height: 100px;
	border: 0.5px solid black;
}

/*estilo con lineas*/
h4{
	text-align:center;
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
<table>
	<tr>
		<td colspan="2"></td>
		<td colspan="6"><img src="assets/img/escudo.png" width="50" height="40"></td>
		<td colspan="20"></td>
		<td colspan="6"><img src="assets/img/logo_fgj.png" width="40" height="40"></td>
	</tr>
</table><br><br><br>

<label class="label_encabezado">"AÑO DEL BICENTENARIO DEL NATALICIO DE IGNACIO RAMÍREZ CALZADA, EL NIGROMANTE"</label>
<br><br><br>
<p class="p_font">FISCALÍA GENERAL DE JUSTICIA DEL ESTADO DE MÉXICO.<br>COORDINACIÓN GENERAL DE COMBATE AL SECUESTRO.<br>
METEPEC, ESTADO DE MEXICO A <?php echo $day." DE ".$months[(int)$mont]." DE ".$year."."; ?><br>OFICIO<?php echo $dato[0]->nomenclatura.".";?></p><br><br><br>
<label class="label_presente"><?php echo $dato[0]->nombre_aten."<br>".$dato[0]->cargo_aten."<br>PRESENTE.";?></label>
<br><br><br>
<table class="table_cont">
	<tr><td><?php echo nl2br($dato[0]->descripcion);?></td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td></tr>
</table>	
<br><br><br><br><br>
<table class="table_footer" >
	<tr>
		<td></td>
		<td colspan="6">ATENTAMENTE<br><br><br></td>
		<td  colspan="2"></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="6"></td>
		<td colspan="2"></td>
	</tr>
	<tr>
		<td></td>
		<?php
		$nom = $dato[0]->nomenclatura;
		$cut = explode("/",$nom);
		if($cut[0] = "400LIA000"){
			echo "<td colspan = '6'>ANTONIO MARTIN TORRES BALLESTEROS<br>SECRETARIO PARTICULAR DEL COORDINADOR<br>GENERAL DE COMBATE AL SECUESTRO</td>";
		}elseif($cut[0] = "400LI0010"){
			echo "<td colspan = '6'>ANTONIO MARTIN TORRES BALLESTEROS<br>COORDINADOR GENERAL DE COMBATE AL SECUESTRO</td>";	
		}
		?>
		<td colspan='3'></td>
	</tr>
</table>
<table class="table_cont">
	<tr><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td></td></tr>
</table>