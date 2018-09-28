<style>
/*
* Estilo para las tablas PDF
*/
.reporte, .encabezado {
	/*border-collapse:collapse;*/
	width:100%;
}
.reporte th, td{
	font-size:10px;
	font-family:Arial, Helvetica, sans-serif;
}

.fecha_lib{
	width: 70%;
	border: 0.0px solid white
}


.datos_auto{
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
	text-align: center;
	border: 0.5px solid black;
	height: 15px;
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
* Reporte para liberacion de combustible
*/
</style>
<?php
	header("Content-Type: text/html;charset=ISO-8859-1");

?>

<TABLE>
	<TR><th align="center"><h2> ORDEN DE SERVICIO </h2></th></TR>
	<TR><td>&nbsp;</td></TR>
	<TR><td>&nbsp;</td></TR>
	<TR><td>&nbsp;</td></TR>
	<TR><td>&nbsp;</td></TR>
	<TR><td>&nbsp;</td></TR>
</TABLE>
<?php
	setlocale(LC_TIME, 'es_ES.UTF-8');
?>

<table>
	<tr><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td></tr>
</table>

<table class="datos_auto">
	<tr>
		<td class="heading" >FOLIO </td>
		<td class="table_cont" align="LEFT"><?php echo $peticion[0]->id ?></td>
	</tr>
</table>

<table class="datos_auto">
	<tr>
		<td class="heading">NOMBRE</td>
		<td class="table_cont" align="LEF"><?php echo $peticion[0]->nombre ?></td>
	</tr>
	<tr>
		<td class="heading">MARCA</td>
		<td class="table_cont" align="LEFT"><?=$peticion[0]->marca ?></td>
	</tr>
	<tr>
		<td class="heading">MODELO</td>
		<td class="table_cont" align="LEFT"><?=$peticion[0]->modelo ?></td>
	</tr>
	<tr>
		<td class="heading">SERIE</td>
		<td class="table_cont" align="LEFT"><?=$peticion[0]->serie ?></td>
	</tr>
	<tr>
		<td class="heading">DESCRIPCION</td>
		<td class="table_cont" align="LEFT"><?=$peticion[0]->descripcion ?></td>
	</tr>
</table>

<table>
	<tr>
		<td align="center">ATENTAMENTE</td>
	</tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr>
		<td align="center">EMPRESA</td>
	</tr>

</table>
