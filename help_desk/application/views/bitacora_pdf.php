<style>
/*
* Estilo para las tablas PDF
*/
.header, body, footer {
  display: block;
}
.table_cont{
	text-align: justify;
	height: 15px;
	font-size: 12px;
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
.table_dont{
	text-align: left;
	height: 15px;
	font-size: 8px;
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
<?php 
	$year = date('Y');
	$mes = date('m');
	$day = date('d');
	$months = array (1=>'ENERO',2=>'FEBRERO',3=>'MARZO',4=>'ABRIL',5=>'MAYO', 6=>'JUNIO', 7=>'JULIO', 8=>'AGOSTO', 9=>'SEPTIEMBRE', 10=>'OCTUBRE',11=>'NOVIEMBRE',12=>'DICIEMBRE');
	echo	"<table>
					<tr><td>&nbsp;</td></tr>
					<tr><th align='center'> Bitácora Sistema de Control de Oficios </th></tr>
					<tr><th align='center'> Coordinación De Combate Contra el Secuestro</th></tr>
					<tr><td>&nbsp;</td></tr>
					<tr><td align='right' class='table_dont'>METEPEC, ESTADO DE MEXICO A ".$day." de ".$months[(int)$mes]." del ".$year."</td></tr>
					<tr><td>&nbsp;</td></tr>
					<tr><td>&nbsp;</td></tr>
					</table>
				<br><br><br><br>
				<table>
				<tr>
					<td class='table_cont'>NOMBRE</td>
					<td class='table_cont' colspan='4' >ACTIVIDAD</td>
					<td class='table_cont' >FECHA</td>
					<td class='table_cont'>HORA</td>
				</tr>";
	foreach ($datos as $dato){
	//array convierte número de mes en nombre 
	echo "
		<tr>	
			<td class='table_cont'>".$dato->nombre." ".$dato->apellidop." ".$dato->apellidom."</td>
			<td class='table_font' colspan='4'>".$dato->registro_bit."</td>
			<td class='table_font'>".$dato->fecha_bit."</td>
			<td class='table_font'>".$dato->hora_bit."</td>
		</tr>
		<tr><td>&nbsp;</td></tr>";
	}
	echo "	</table>";
?>
</div>
