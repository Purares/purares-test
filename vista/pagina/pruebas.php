<h1>RESULTADOS:</h1>
<br>
<br>

<?php

$id_OrdenProd=17;

$tabla=ModeloFormularios::mdlDetalleOpInsumos($id_OrdenProd);

$longitud=count($tabla);


var_dump($longitud);

var_dump($tabla);



?>

<h1>pruebas</h1>
