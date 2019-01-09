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
	font-size: 9px;
	text-transform: uppercase;
}
.table_font{
	text-align: left;
	border: 0.5px solid black;
	height: 15px;
	font-size: 8px;
}
.table_dont{
	text-align: left;
	height: 15px;
	font-size: 8px;
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
</style></header>
<?php
	header("Content-Type: text/html;charset=ISO-8859-1");
	//recibe fecha  
	$date = $dato[0]->fecha_ofseg;
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
</table>
<table>
	<tr><td>&nbsp;</td></tr>
	<tr><th align="center"> TRAMITE DE TURNO</th></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td align="right" class="table_dont">METEPEC, ESTADO DE MEXICO A <?php echo $day." DE ".$months[(int)$mont]." DE ".$year; ?></td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td></tr>
</table>

<table>
	<tr>
		<td class="table_cont"> NO. OFICIO</td>
		<td class="table_cont" colspan="4" >ASUNTO</td>
	</tr>
	<tr>	
		<td class="table_cont"><?php echo $dato[0]->nomen_ofseg; ?></td>
		<td class="table_font" colspan="4"> <?php echo $dato[0]->asunto_ofseg; ?></td>
	</tr>
	<tr><td>&nbsp;</td></tr>
</table>
<table>
	<tr><td class="table_dont">ETIQUETAS DE ASUNTOS:</td></tr>
	<tr><td>&nbsp;</td></tr>
</table>	
<table>
    <tr>
        <td class="table_font" colspan="4"> COLABORACIÓN </td>
        <td class="table_cont">
			<?php if($dato[0]->colaboracion == 1){echo " X ";} ?>
        </td>
        <td class="table_font" colspan="4"> RECURSOS HUMANOS </td>
        <td class="table_cont">
			<?php if($dato[0]->recursos_humanos == 1){echo " X ";}?>
        </td>
	</tr>
	<tr>
        <td class="table_font" colspan="4"> BOLETAS DE AUDIENCIA </td>
        <td class="table_cont">
			<?php if($dato[0]->boletas_audiencia == 1){echo " X ";}?>
        </td>
        <td class="table_font" colspan="4"> TELEFONÍA </td>
        <td class="table_cont">
			<?php if($dato[0]->telefonia ==1 ){ echo " X ";} ?>
        </td>
	</tr>
	<tr>
        <td class="table_font" colspan="4"> SOLICITUDES </td>
        <td class="table_cont" >
			<?php if($dato[0]->solicitudes == 1 ){ echo " X "; }?>
        </td>
        <td class="table_font" colspan="4"> ESTADÍSTICA </td>
        <td class="table_cont">
			<?php if($dato[0]->estadistica == 1){echo " X ";}?>
        </td>
	</tr>
	<tr>
        <td class="table_font" colspan="4"> GESTIÓN </td>
        <td class="table_cont" >
			<?php if($dato[0]->gestion == 1){echo " X ";}?>
        </td>
        <td class="table_font" colspan="4"> RELACIONES INTERINSTITUCIONALES </td>
        <td class="table_cont">
			<?php if($dato[0]->relaciones_interis == 1){echo " X ";}?>	
        </td>
	</tr>
	<tr>
        <td class="table_font" colspan="4"> CURSOS Y CAPACITACIONES  </td>
        <td class="table_cont" >
			<?php if($dato[0]->cursos_capacitaciones == 1){echo " X ";}?>
        </td>
        <td class="table_font"  colspan="4"> BOLETAS DE AUDIENCIA  </td>
        <td class="table_cont" >
			<?php if($dato[0]->boletas_audiencia == 1){echo " X ";}?>
        </td>
	</tr>
	<tr>
        <td class="table_font" colspan="4"> JUZGADOS </td>
        <td class="table_cont" >
			<?php if($dato[0]->juzgados == 1){echo " X ";}?>
        </td>
        <td class="table_font"  colspan="4"> COPIAS DE CONOCIMIENTO   </td>
        <td class="table_cont" >
			<?php if($dato[0]->copias_conocimiento == 1){echo " X ";}?>
        </td>
	</tr>
</table>
<table>
	<tr><td>&nbsp;</td></tr>
</table>		
<table>
	<tr>
		<td class="table_dont" colspan="5">EL COORDINADOR GENERAL DE COMBATE AL SECUESTRO DE LA FISCALÍA GENERAL DE JUSTICIA DEL ESTADO DE MÉXICO INSTRUYE SE TURNE A: </td>
	</tr>
</table>
<table>
	<tr><td>&nbsp;</td></tr>
</table>
<table>
    <tr>
        <td class="table_font"colspan="4"> CONASE </td>
        <td class="table_cont">
			<?php if($dato[0]->conase == 1){ echo " X ";}?>
		</td>
        <td class="table_font"colspan="4"> FISCAL GENERAL </td>
        <td class="table_cont" >
			<?php if($dato[0]->fiscal_general == 1){ echo " X ";}?>
        </td>
	</tr>
	<tr>
        <td class="table_font" colspan="5"> FISCALÍA ESPECIALIZADA DE SECUESTRO DE  </td>
        <td class="table_font" colspan="4"> VICEFISCALIA </td>
        <td class="table_cont" >
			<?php if($dato[0]->vicefiscalia){echo " X ";}?>
        </td>
	</tr>
	<tr>
        <td class="table_font" colspan="4"> VALLE DE TOLUCA </td>
        <td class="table_cont" >
			<?php if($dato[0]->valle_toluca == 1){echo " X";}?>
        </td>
        <td class="table_font" colspan="4"> OFICIALÍA MAYOR </td>
        <td class="table_cont" >
			<?php if($dato[0]->oficialia_mayor == 1){echo "X";}?>
        </td>
	</tr>
	<tr>
        <td class="table_font" colspan="4"> VALLE DE MÉXICO </td>
        <td class="table_cont" >
			<?php if($dato[0]->valle_mexico == 1){echo " X ";}?>
        </td>
        <td class="table_font" colspan="4"> DEPARTAMENTO DE INFORMACIÓN Y ESTADÍSTICA </td>
        <td class="table_cont" >
			<?php if($dato[0]->informacion_estadistica == 1){echo " X ";}?>
        </td>
	</tr>
	<tr>
        <td class="table_font" colspan="4"> ZONA ORIENTE </td>
        <td class="table_cont" >
			<?php if($dato[0]->zona_oriente == 1){echo " X "; }?>
        </td>
        <td class="table_font" colspan="4" > CENTRAL JURÍDICO </td>
        <td class="table_cont" >
			<?php if($dato[0]->central_juridico == 1){echo " X ";}?>
        </td>
	</tr>
	<tr>
        <td class="table_font" colspan="5"> OTRAS: <?php if($dato[0]->otra != ""){ echo $dato[0]->otra; }?></td>
        <td class="table_font" colspan="4"> SERVICIO DE CARRERA  </td>
        <td class="table_cont" >
			<?php if($dato[0]->servicio_carrera == 1){ echo " X ";}?>
        </td>
	</tr>
</table>
<table>
	<tr><td>&nbsp;</td></tr>
</table>
<table>
    <tr>
        <td class="table_font" colspan="5"> REALIZAR DILIGENCIAS EN VÍA DE COLABORACIÓN </td>
        <td class="table_cont">
			<?php if($dato[0]->realiza_diligencias == 1){ echo " X ";}?>
        </td>
		<td></td>
        <td class="table_font" colspan="3"> INFORMAR A: </td>
        <td class="table_cont" ></td>
		<td class="table_font" > TERMINO</td>
	</tr>
    <tr>
        <td class="table_font" colspan="5"> RECIBIR PERSONALMENTE EN AUDIENCIA E INFORMAR </td>
        <td class="table_cont" >
			<?php if($dato[0]->recibir_personalmente==1){echo " X ";}?>	
		</td>
		<td></td>
        <td class="table_font" colspan="3"> ESTA OFICINA </td>
        <td class="table_cont" ><?php if($dato[0]->esta_oficina == 1){ echo " X ";}?></td>
		<td class="table_cont" ><?php if($dato[0]->esta_oficina == 1){ echo $dato[0]->termino_ofseg; }?></td>
	</tr>
    <tr>
        <td class="table_font" colspan="5"> GESTIONAR PETICIÓN Y REMITIR CONSTANCIAS QUE ACREDITEN LA ATENCIÓN BRINDADA </td>
        <td class="table_cont"><?php if($dato[0]->gestionar_peticion == 1){echo " X ";}?></td>
		<td></td>
        <td class="table_font" colspan="3"> PETICIONARIO </td>
        <td class="table_cont"><?php if($dato[0]->peticionario == 1){echo " X ";}?> </td>
		<td class="table_cont"><?php if($dato[0]->peticionario == 1){ echo $dato[0]->termino_ofseg; }?></td>
	</tr>
    <tr>
        <td class="table_font" colspan="5"> ARCHIVO </td>
        <td class="table_cont"><?php if($dato[0]->archivo == 1){ echo " X ";}?></td>
		<td></td>
        <td class="table_font" colspan="3"> INSTITUCIÓN REQUIRENTE </td>
		<td class="table_cont"><?php if($dato[0]->institucion_requiriente == 1){ echo " X "; }?></td>
		<td class="table_cont"><?php if($dato[0]->institucion_requiriente == 1){ echo $dato[0]->termino_ofseg; }?></td> 
	</tr>
	<tr>
        <td class="table_font" colspan="6"> OTRAS: <?php if($dato[0]->otras != ""){ echo $dato[0]->otras;}?></td>
	</tr>
</table>
<table>
	<tr><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>&nbsp;</td></tr>
</table>
<table>
	<tr>
		<td></td>
		<td class="table_cont" colspan="5" > ELABORO:</td>
		<td colspan="2"></td>
		<td class="table_cont" colspan="6"> Vo. Bo.</td>
		<td  colspan="2"></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td class="table_cont" colspan="5"><br><br><br></td>
		<td colspan="2"></td>
		<td class="table_cont" colspan="6"></td>
		<td colspan="2"></td>
	</tr>
	<tr>
		<td></td>
		<td class="table_cont" colspan="5"><?php echo $dato[0]->nombre." ".$dato[0]->apellidop." ".$dato[0]->apellidom;?> </td>
		<td colspan="2"></td>
		<td class="table_cont" colspan = "6"> DR. H. C. RODRIGO ARCHUNDIA BARREINTOS COORDINADOR GENERAL DE COMBATE AL SECUESTRO
		</td>
		<td colspan="3"></td>
	</tr>
</table>
<table>
	<tr><td>&nbsp;</td></tr>
	<tr><td class="table_font" colspan="16"> OBSERVACIONES: <?php echo $dato[0]->obs_ofseg;?></td></tr>
</table>