<h1>RESULTADOS2:</h1>
<br>
<br>

<?php
require_once"modelo/formulariosMDL.php";

$id_receta=1;
$respuesta= ModeloFormularios::mdlDetalleReceta($id_receta);

var_dump($respuesta);
?>

<h1>pruebas</h1>
