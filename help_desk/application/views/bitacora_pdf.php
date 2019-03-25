<style>
@page {
    margin: 0cm 0cm;
    }
/** Define now the real margins of every page in the PDF **/
body {
    margin-top: 3cm;
    margin-left: 2cm;
    margin-right: 2cm;
    margin-bottom: 2cm;
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
	font-size: 11px;
	font-family:Arial, Helvetica, sans-serif;
}
.p_fecha{
	text-align: right;
	font-weight: bold;
	font-size: 11px;
	font-family:Arial, Helvetica, sans-serif;
}
table{
	width: 100%; 
	border-collapse: collapse;
	border: 1px;
}
.p_justify{
	text-align: justify;
	font-size: 10px;
	font-family:Arial, Helvetica, sans-serif;
}
.p_center{
	text-align: center;
	font-size: 10px;
	font-weight: bold;
	font-family:Arial, Helvetica, sans-serif;
}
</style>
<?php
	header("Content-Type: text/html;charset=ISO-8859-1");
	$year = date('Y');
	$mes = date('m');
	$day = date('d');
	$months = array (1=>'ENERO',2=>'FEBRERO',3=>'MARZO',4=>'ABRIL',5=>'MAYO', 6=>'JUNIO', 7=>'JULIO', 8=>'AGOSTO', 9=>'SEPTIEMBRE', 10=>'OCTUBRE',11=>'NOVIEMBRE',12=>'DICIEMBRE');	 
?>
<body>
	<header>
		<img src="assets/img/header.png" width="100%" height="90%">
	</header>
	<h1>BITÁCORA - SISTEMA DE CONTROL DE OFICIOS<br>FISCALÍA GENERAL DE JUSTICIA DEL ESTADO DE MÉXICO<br>COORDINACIÓN GENERAL DE COMBATE AL SECUESTRO</h1>
	<p class="p_fecha">METEPEC, ESTADO DE MEXICO A <?php echo $day." DE ".$months[(int)$mes]." DE ".$year."."; ?></p>
	<br>		
	<table>
		<tr>
			<td><p class="p_center">NOMBRE</p></td>
			<td colspan='4'><p class="p_center">ACTIVIDAD</p></td>
			<td><p class="p_center">FECHA</p></td>
			<td><p class="p_center">HORA</p></td>
		</tr>
	<?php 	
		foreach ($datos as $dato){
		//array convierte número de mes en nombre 
		echo "<tr>	
				<td><p class='p_justify'>".$dato->nombre." ".$dato->apellidop." ".$dato->apellidom."</p></td>
				<td colspan='4'><p class='p_justify'>".$dato->registro_bit."</p></td>
				<td><p class='p_justify'>".$dato->fecha_bit."</p></td>
				<td><p class='p_justify'>".$dato->hora_bit."</p></td>
			</tr>";
		}
	?>		
	</table>		
</div>
</body>