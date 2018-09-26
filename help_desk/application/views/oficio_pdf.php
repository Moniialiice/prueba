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

.table_styles{
	text-align: left;
	border: 0.5px solid black;
	height: 15px
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
	setlocale(LC_TIME, 'es_ES.UTF-8');

?>
<table>
	<tr><th align="center"> TRAMITE DE TURNO</th></tr>
	<TR><td>&nbsp;</td></TR>
	<tr><td align="right">METEPEC, ESTADO DE MEXICO A <?php $dato[0]->activo ?>DE JUNIO DE 2018</td></tr>
	<TR><td>&nbsp;</td></TR>
</table>

<table align="center">
	<tr>
		<td class="table_styles"> No. OFICIO</td>
		<td class="table_cont" colspan="3" >ASUNTO</td>
	</tr>
	<tr>	
		<td class="table_cont"><?php echo $dato[0]->id_usuario ?></td>
		<td class="table_cont" colspan="3"><?php echo $dato[0]->id_usuario ?></td>
	</tr>
	<tr><td></td><td></td><td></td><td></td></tr>
</table>
<table >
	<tr><td>&nbsp;</td></tr>
	<tr><td align="left">ETIQUETAS DE ASUNTOS:</td></tr>
	<tr><td>&nbsp;</td></tr>
</table>
<table align="center">
	<tr>
		<td class="table_styles" colspan> COLABORACIÓN</td>
		<td class="table_cont" colspan="3" >ASUNTO</td>
	</tr>
	<tr>	
		<td class="table_cont"><?php echo $dato[0]->id_usuario ?></td>
		<td class="table_cont" colspan="3"><?php echo $dato[0]->id_usuario ?></td>
	</tr>
	<tr><td></td><td></td><td></td><td></td></tr>
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
