<style>
/*
* Estilo para las tablas PDF
*/
.header, body, footer {
  display: block;
}
.table_cont{
	text-align: center;
	height: 15px;
	font-size: 9px;
}
.label_encabezado{
	text-align: center;
	height: 15px;
	font-size: 10px;
	font-weight: bold;
}
p{
	text-align: right;
	height: 15px;
	font-size: 8px;
	font-weight: bold;
	margin-right: 50px;
}

/*
* fin estilo para tablas de PDF
*
*
*/
</style>
<?php
	header("Content-Type: text/html;charset=ISO-8859-1");
	$year = date('Y');
	$mes = date('m');
	$day = date('d');
	$months = array (1=>'ENERO',2=>'FEBRERO',3=>'MARZO',4=>'ABRIL',5=>'MAYO', 6=>'JUNIO', 7=>'JULIO', 8=>'AGOSTO', 9=>'SEPTIEMBRE', 10=>'OCTUBRE',11=>'NOVIEMBRE',12=>'DICIEMBRE');
	 
?>
<div class="body">
	<label class="label_encabezado">BITÁCORA - SISTEMA DE CONTROL DE OFICIOS</label> 
	<br>
	<p>FISCALÍA GENERAL DE JUSTICIA DEL ESTADO DE MÉXICO.<br>COORDINACIÓN GENERAL DE COMBATE AL SECUESTRO.<br>
		METEPEC, ESTADO DE MEXICO A <?php echo $day." DE ".$months[(int)$mes]." DE ".$year."."; ?></p>
	<br><br><br>
	<table class="table_cont">
			<tr><td>&nbsp;</td></tr>
			<tr><td>&nbsp;</td></tr>
	</table>		
	<table class="table_cont">
			<tr>
				<td><b>NOMBRE</b></td>
				<td colspan='4'><b>ACTIVIDAD</b></td>
				<td><b>FECHA</b></td>
				<td><b>HORA</b></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
	<?php 	
		foreach ($datos as $dato){
		//array convierte número de mes en nombre 
		echo "<tr>	
				<td>".$dato->nombre." ".$dato->apellidop." ".$dato->apellidom."</td>
				<td colspan='4'>".$dato->registro_bit."</td>
				<td>".$dato->fecha_bit."</td>
				<td>".$dato->hora_bit."</td>
			</tr><tr><td>&nbsp;</td></tr>";
		}
	?>		
	</table>		
</div>
