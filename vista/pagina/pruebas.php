<h1>RESULTADOS:</h1>
<br>
<br>

<?php

$id_receta=117;
$cantidad_carne=[100,200,100];


$detalleReceta=ModeloFormularios::mdlDetalleReceta($id_receta);

$porcentCarne=$detalleReceta [0]['porcent_carne'];

$cantidadTotalCarne=array_sum($cantidad_carne);

var_dump($cantidadTotalCarne);
var_dump($porcentCarne);		
var_dump($detalleReceta);		


?>

<h1>pruebas</h1>
