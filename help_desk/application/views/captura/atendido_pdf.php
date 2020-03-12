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
.p_atendido{
	text-align: right;
	font-size: 11px;
	font-family:Arial, Helvetica, sans-serif;
}
.p_remitente{
	text-align: left;
	font-size: 11px;
	font-family:Arial, Helvetica, sans-serif;
}
.p_justify{
	text-align: justify;
	font-size: 11px;
	font-family:Arial, Helvetica, sans-serif;
}
.p_atentamente{
	text-align: center;
	font-size: 11px;
	font-family:Arial, Helvetica, sans-serif;
}
.p_cc{
	text-align: left;
	font-size: 10px;
	font-family:Arial, Helvetica, sans-serif;
}
</style>
<body>
<?php
	$date = $dato[0]->fecha_atenCap;
	//corta los datos de d,m,a
	$ext = explode("-",$date);
	$year = $ext[0];
	$mont = $ext[1];
	$day = $ext[2];
	//array convierte número de mes en nombre 
	$months = array (1=>'ENERO',2=>'FEBRERO',3=>'MARZO',4=>'ABRIL',5=>'MAYO', 6=>'JUNIO', 7=>'JULIO', 8=>'AGOSTO', 9=>'SEPTIEMBRE', 10=>'OCTUBRE',11=>'NOVIEMBRE',12=>'DICIEMBRE'); 
?>
	<br><br><br>
	<p class="p_remitente"><b>
		<?php echo $dato[0]->nombre_atenCap."<br>".$dato[0]->cargo_atenCap."<br>PRESENTE.";?>	
	</b></p>	
	<br><br>
	<p class="p_justify">	
		<?php echo nl2br($dato[0]->descCap);?>
	</p>
	<br><br><br><br><br><br><br><br><br><br>
	<p class="p_atentamente"><b>
		ATENTAMENTE<br><br><br><br>
<?php
		$nom = $dato[0]->nomenclatura_cap; 
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
<?php echo nl2br($dato[0]->copia_aCap); 	echo var_dump($datos);?>
	</b></p>
</body>