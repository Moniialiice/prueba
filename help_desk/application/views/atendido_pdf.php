<body>
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
.p_atendido{
	text-align: right;
	font-size: 12px;
	font-family:Arial, Helvetica, sans-serif;
}
.p_remitente{
	text-align: left;
	font-size: 10px;
	font-family:Arial, Helvetica, sans-serif;
}
.p_justify{
	text-align: justify;
	font-size: 10px;
	font-family:Arial, Helvetica, sans-serif;
}
.p_atentamente{
	text-align: center;
	font-size: 11px;
	font-family:Arial, Helvetica, sans-serif;
}
.p_cc{
	text-align: left;
	font-size: 8px;
	font-family:Arial, Helvetica, sans-serif;
}
</style>
<?php
	$date = $dato[0]->fecha_atendido;
	//corta los datos de d,m,a
	$ext = explode("-",$date);
	$year = $ext[0];
	$mont = $ext[1];
	$day = $ext[2];
	//array convierte número de mes en nombre 
	$months = array (1=>'ENERO',2=>'FEBRERO',3=>'MARZO',4=>'ABRIL',5=>'MAYO', 6=>'JUNIO', 7=>'JULIO', 8=>'AGOSTO', 9=>'SEPTIEMBRE', 10=>'OCTUBRE',11=>'NOVIEMBRE',12=>'DICIEMBRE'); 
?>
	<h1>
	<?php 
		/*switch($year){ 
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
				echo "\"2019. AÑO DEL CENTÉSIMO ANIVERSARIO LUCTUOSO DE EMILIANO ZAPATA SALAZAR, EL CAUDILLO DEL SUR\".";
			break;
			case '2020':
				echo "\"2020. AÑO DE LAURA MÉNDEZ DE CUENCA; EMBLEMA DE LA MUJER MEXIQUENSE\".";
				//Año de Laura Méndez de Cuenca; emblema de la mujer mexiquense\".";
		}	*/
	?>
	</h1>
	<br><br>
	<!--p class="p_atendido"><b>
		FISCALÍA GENERAL DE JUSTICIA DEL ESTADO DE MÉXICO<br>
		COORDINACIÓN GENERAL DE COMBATE AL SECUESTRO<br>
		METEPEC, ESTADO DE MEXICO A <?php echo $day." DE ".$months[(int)$mont]." DE ".$year; ?><br>
		OFICIO <?php echo $dato[0]->nomenclatura_aten;?>
	</b></p-->	
	<br><br><br>
	<p class="p_remitente"><b>
		<?php 
		echo$dato[0]->nombre_aten."<br>".$dato[0]->cargo_aten."<br>PRESENTE.";?>	
	</b></p>	
	<br><br>
	<p class="p_justify">	
		<?php echo nl2br($dato[0]->descripcion);?><br><br>
	</p>	
	<p class="p_atentamente"><b>
	ATENTAMENTE<br><br><br><br>
		<?php
		$nom = $dato[0]->nomenclatura_aten; 
		$cut = explode("/",$nom); 
		switch ($year){
			/*case '2016':
				if($cut[0]=="400LIA000"){
				echo"DR. H. C. RODRIGO ARCHUNDIA BARRIENTOS <br>COORDINADOR GENERAL DE COMBATE AL SECUESTRO";
				}elseif($cut[0]=="400LI0010"){
					echo "ANTONIO MARTIN TORRES BALLESTEROS <br>SECRETARIO PARTICULAR DEL COORDINADOR <br>GENERAL DE COMBATE AL SECUESTRO";
				} 
			break;
			case '2018':
				if($cut[0]=="400LIA000"){
					echo"DR. H. C. RODRIGO ARCHUNDIA BARRIENTOS <br>COORDINADOR GENERAL DE COMBATE AL SECUESTRO";
				}elseif($cut[0]=="400LI0010"){
					echo "ANTONIO MARTIN TORRES BALLESTEROS <br>SECRETARIO PARTICULAR DEL COORDINADOR <br>GENERAL DE COMBATE AL SECUESTRO";
				} 
			break;*/
			case '2019':
				if($cut[0]=="400LIA000"){
					echo"DR. H. C. RODRIGO ARCHUNDIA BARRIENTOS <br>COORDINADOR GENERAL DE COMBATE AL SECUESTRO";
				}elseif($cut[0]=="400LI0010"){
					echo "ANTONIO MARTIN TORRES BALLESTEROS <br>SECRETARIO PARTICULAR DEL COORDINADOR <br>GENERAL DE COMBATE AL SECUESTRO";
				} 
			break;
			case '2020':
				if($cut[0]=="400LIA000"){
					echo"DR. H. C. RODRIGO ARCHUNDIA BARRIENTOS <br>COORDINADOR GENERAL DE COMBATE AL SECUESTRO";
				}elseif($cut[0]=="400LI0010"){
					echo "ANTONIO MARTIN TORRES BALLESTEROS <br>SECRETARIO PARTICULAR DEL COORDINADOR <br>GENERAL DE COMBATE AL SECUESTRO";
				} 
			break;	
		}
		?>
	</b></p>
	<p class="p_cc"><b>
		<?php echo nl2br($dato[0]->copia_a); ?>
	</b><p>	
</body>