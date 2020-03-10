<?php
		$campo='id_receta';
		$tabla='recetas_n';
$respuesta1= ModeloFormularios::mdlUltimoId($campo,$tabla);
$respuesta2=$respuesta1[0][0];
var_dump($respuesta2);
?>

<h1>pruebas</h1>
