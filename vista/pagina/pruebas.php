<h1>RESULTADOS:</h1>
<br>
<br>

<?php

$id_compra=3;
$detalleCompra= ModeloFormularios::mdlDetalleCompra($id_compra);
$anulado=$detalleCompra[0]['anulado'];
if ($anulado==0) {
	$respuesta="OK";
}else{
	$respuesta="La Compra Mro:".$id_compra." ya se encuentra anulada";
}


if ($respuesta="OK") {
	$msg="Anular";
}

var_dump($msg);

?>

<h1>pruebas</h1>
