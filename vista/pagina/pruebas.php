<h1>RESULTADOS:</h1>
<br>
<br>

<?php


$fechas=[2,3,4,5,6,7,8];
$fechasC=array();

	#foreach ($_GET as $clave=>$valor)
	foreach ($fechas as $f) {
		$fechasC[]= $f+1;
	}


var_dump($fechasC);

?>

<h1>pruebas</h1>
