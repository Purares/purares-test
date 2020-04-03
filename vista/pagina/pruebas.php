<h1>RESULTADOS2:</h1>
<br>
<br>

<?php
require_once"modelo/formulariosMDL.php";

$id_OrdenProd=10;

$detalleAltaOP= ModeloFormularios::mdlDetalleOpAlta($id_OrdenProd);

$id_Receta=$detalleAltaOP[0]['id_receta'];

var_dump($id_Receta);
var_dump($detalleAltaOP);

?>

<h1>pruebas</h1>
