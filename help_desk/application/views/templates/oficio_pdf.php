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
        <td class="heading"> Oficio </td>
        <td class="heading"> Asunto </td>
        <td class="heading"> Fecha </td>
    </tr>
    <tr>
        <td class="table_cont" align="center"><?php $dato[0] -> nomenclatura ?></td>
        <td class="table_cont" align="center"><?php $dato[0] -> asunto ?></td>
        <td class="table_cont" align="center"><?php $dato[0] -> fecha?></td>
    </tr>

</table>
<table class="datos_auto">
    <tr>
        <td class="heading"> Etiquetas de Asunto </td>
    </tr>
    <tr>
        <td class="table_cont" align="left"> Amparos </td>
        <td class="table_cont" align="left">
            <?php if($dato[0]-> amparos == 1){echo " X ";} ?>
        </td>
        <td class="table_cont" align="left"> Boletas de Audiencia</td>
        <td class="table_cont" align="left">
            <?php if($dato[0]-> boletas_audiencia == 1){echo " X ";}?>
        </td>
        <td class="table_cont" align="left"> Colaboración</td>
        <td class="table_cont" align="left">
            <?php if($dato[0] -> colaboracion == 1 ){echo " X ";}?>
        </td>
        <td class="table_cont" align="left"> Copias de Conocimiento</td>
        <td class="table_cont" align="left">
            <?php if($dato[0] -> copias_conocimiento == 1){echo " X ";}?>
        </td>
        <td class="table_cont" align="left"> Cursos y Capacitación</td>
        <td class="table_cont" align="left">
            <?php if($dato[0]->cursos_capacitaciones == 1){echo " X ";}?>
        </td>
        <td class="table_cont" align="left"> Estadistica</td>
        <td class="table_cont" align="left">
            <?php if($dato[0]->estadistica == 1){echo " X ";}?>
        </td>
        <td class="table_cont" align="left"> Gestión</td>
        <td class="table_cont" align="left"
            <?php if($dato[0] -> gestion == 1){echo " X ";}?>
        </td>
        <td class="table_cont" align="left"> Juzgados</td>
        <td class="table_cont" align="left">
            <?php if($dato[0] ->juzgados == 1){echo " X ";}?>
        </td>
        <td class="table_cont" align="left"> Recursos Humanos</td>
        <td class="table_cont" align="left"
            <?php if($dato[0] -> recursos_humanos == 1){echo " X ";}?>
        </td>
        <td class="table_cont" align="left"> Relaciones Institucionales</td>
        <td class="table_cont" align="left">
            <?php if($dato[0]->relaciones_interis == 1){echo " X ";}?>
        </td>
        <td class="table_cont" align="left"> Solicitudes</td>
        <td class="table_cont" align="left">
            <?php if($dato[0]-> solicitudes == 1 ){ echo " X "; }?>
        </td>
        <td class="table_cont" align="left"> Telefenía</td>
        <td class="table_cont" align="left">
            <?php if($dato[0]-> telefonia ==1 ){ echo " X ";} ?>
        </td>
    </tr>
</table>
<table class="datos_auto">
     <tr>
         <td class="heading"> Dirigido A: </td>
     </tr>
    <tr>
        <td class="table_cont" align="left"> CONASE </td>
        <td class="table_cont" align="left">
            <?php if($dato[0]->consase == 1){ echo " X ";}?></td>
        <td class="table_cont" align="left"> Valle de México </td>
        <td class="table_cont" align="left">
            <?php if($dato[0]->valle_mexico == 1){echo " X";}?>
        </td>
        <td class="table_cont" align="left"> Valle de Toluca</td>
        <td class="table_cont" align="left">
            <?php if($dato[0]->valle_toluca == 1){echo " X ";}?>
        </td>
        <td class="table_cont" align="left"> Secuestros Zona Oriente</td>
        <td class="table_cont" align="left">
            <?php if($dato[0]->zona_oriente == 1){echo " X "; }?>
        </td>
        <td class="table_cont" align="left"> Fiscal General </td>
        <td class="table_cont" align="left">
            <?php if($dato[0] -> fiscal_general == 1){ echo " X ";}?>
        </td>
        <td class="table_cont" align="left"> Oficialia Mayor </td>
        <td class="table_cont" align="left">
            <?php if($dato[0]-> oficialia_mayor == 1){echo "X";}?>
        </td>
        <td class="table_cont" align="left"> Central Jurídico </td>
        <td class="table_cont" align="left">
            <?php if($dato[0]-> central_juridico == 1){echo " X ";}?>
        </td>
        <td class="table_cont" align="left"> Información Estadistica </td>
        <td class="table_cont" align="left">
            <?php if($dato[0]->informacion_estadistica == 1){echo " X";}?>
        </td>
        <td class="table_cont" align="left"> Vicefiscalia </td>
        <td class="table_cont" align="left">
            <?php if($dato[0]->vicefiscalia){echo " X ";}?>
        </td>
        <td class="table_cont" align="left"> Servicio Carrera</td>
        <td class="table_cont" align="left">
            <?php if($dato[0]->servicio_carrera == 1){ echo " X ";}?>
        </td>
        <td class="table_cont" align="left"> Otra</td>
        <td class="table_cont" align="left">
            <?php if($dato[0]->otra != " "){ echo "$dato->otra "; }?>
        </td>
    </tr>
</table>
<table class="datos_auto">
    <tr>
        <td class="heading"> Informar </td>
    </tr>
    <tr>
        <td class="table_cont" align="left"> Esta Oficina</td>
        <td class="table_cont" align="left">
            <?php if($dato[0]->esta_oficina == 1){ echo " X ";}?>
        </td>
        <td class="table_cont" align="left"> Institución Requiriente </td>
        <td class="table_cont" align="left">
            <?php if($dato[0]->institucion_requiriente == 1){ echo " X"; }?>
        </td>
        <td class="table_cont" align="left"> Peticionario</td>
        <td class="table_cont" align="left">
            <?php if($dato[0]->datoario == 1){echo " X ";}?>
        </td>
    </tr>
</table>
<table class="datos_auto">
    <tr>
        <td class="heading"> </td>
    </tr>
    <tr>
        <td class="table_cont" align="left"> Gestionar Petición </td>
        <td class="table_cont" align="left">
            <?php if($dato[0]-> gestionar_dato == 1){echo " X ";}?>
        </td>
        <td class="table_cont" align="left"> Realizar Diligencias </td>
        <td class="table_cont" align="left">
            <?php if($dato[0]->realiza_diliguencias == 1){ echo " X ";}?>
        </td>
        <td class="table_cont" align="left"> Recibir Personalmente </td>
        <td class="table_cont" align="left">
            <?php if($dato[0]->recibir_personalmente == 1){ echo " X ";}?>
        </td>
        <td class="table_cont" align="left"> Archivo </td>
        <td class="table_cont" align="left">
            <?php if($dato[0]->archivo == 1){ echo " X ";}?>
        </td>
        <td class="table_cont" align="left"> Otras </td>
        <td class="table_cont" align="left">
            <?php if($dato[0]->otras != " "){ echo $dato[0]->otra;}?>
        </td>
    </tr>
</table>
<table class="datos_auto">
    <tr>
        <td class="heading"> Observaciones </td>
        <td class="heading"> Termino </td>
    </tr>
    <tr>
        <td class="table_cont" align="left">
            <?php echo $dato[0]->observaciones ?>
        </td>
        <td class="table_cont" align="left">
            <?php echo $dato[0]->termino ?>
        </td>
    </tr>
</table>
<table>
	<tr>
        <td align="left">Realizo</td>
		<td align="right">Atentamente</td>
	</tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td></tr>
    </tr>

</table>
