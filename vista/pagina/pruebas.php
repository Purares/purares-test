<h1>RESULTADOS:</h1>
<br>
<br>

<?php
	
	$id_OrdenProd=1;
	$respuesta=ModeloFormularios::mdlDetalleOP($id_OrdenProd);
	
	var_dump($respuesta);




















/*
#$prueba=ControladorFormularios::prueba1();
#$prueba=ControladorFormularios::prueba2array();


$id=[8,9,10,11];
$q=[100,12,312,97];
$k='hola';
	
$insumos_receta=ModeloFormularios::mdlPrueba();

$prueba = array('tabla' => $insumos_receta,
				'k_' => $k);

#$longitud=count($prueba['id_receta']);


$i_r=$prueba['tabla'];


$longitud=count($i_r);

$datosMI= array('idInsumo_'		=>array_column($i_r, 'id_insumo'),
				'cantidad_'		=>array_column($i_r, 'cantidad'),
				'idCuenta_'		=>array_fill(0,$longitud,2), #Número fijo para la cuenta compra
				'idOrdenProd_'	=>array_fill(0,$longitud,'xxxx'),
				'idCompra_'		=>array_fill(0,$longitud,null),
				'idUsuario_'	=>array_fill(0,$longitud,'1'),#[To Do]
				'descripcion_'	=>array_fill(0,$longitud,null),
				'funcion_'		=>array_fill(0,$longitud,'OrdenProd'));




#var_dump(array_column($i_r, 'id_receta'));
#var_dump($longitud);
#var_dump($datosMI);

*/

?>

<h1>pruebas</h1>
