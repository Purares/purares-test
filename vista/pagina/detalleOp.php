<!DOCTYPE html>
<html>
<head>
	<title>Detalle Orden</title>
</head>
<body>

<?php

$detalleOrden=ControladorFormularios::ctrDetalleOP();

?>


<div class="container">
	<br>
  				<div class="d-flex">
  					<div class="mr-auto">
  					<h4>Orden ID <a class="idorden"><?php echo $_GET['idOrdenProdDetalle']; ?></a> "<a class="nombrereceta"><?php echo $_GET['nombreop']; ?></a>" <span class="medalla"><?php if ($_GET['estado']==0) {echo '     <span class="badge badge-success medal">Activa</span>';}else{echo '<span class="badge badge-danger medal">Desactivada</span>';};?>
					</span>
  				</h4>
  					</div>
  					<div>
  						<!--<div class="boton">
  						<?php// if ($_GET['estado']==1) {echo '<button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#ConfirmarEstadoReceta" data-accion="desactivar" id="botonCambiarEstado">Desactivar Receta</button>';}else{echo '<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#ConfirmarEstadoReceta" data-accion="activar" id="botonCambiarEstado">Activar Receta</button>';}?>
  						</div>-->
  					</div>	
  					<br>
              </div>
                  <div class="row">

                            <div class="form-group col-6">
                         <label for="spannombreop">Nombre de la receta:</label>

                         <?php

$detalleAltaOp=$detalleOrden['detalleAltaOP_'];

?>
                                <span class="input-group-text nombreop" id="spannombreop"><?php echo $detalleAltaOp[0]['nombre_receta'];?></span>
                                </div>


                            <div class="form-group col-6">
                         <label for="spanfechaaltaop">Fecha de Alta:</label>
                                <span class="input-group-text fechadealtaop" id="spanfechaaltaop"><?php echo $detalleAltaOp[0]['fecha_alta'] ?></span>
                                </div>
        				</div>
                    <div class="row">
                     <div class="form-group col-6">
                         <label for="spanpastonop">Peso Pastón:</label>
                                <span class="input-group-text pesopastonop" id="spanpastonop"><?php echo $detalleAltaOp[0]['peso_paston'] ?> kilos</span>
                                </div>
                            <div class="form-group col-6">
                         <label for="spanusuarioaltaop">Usuario:</label>
                                <span class="input-group-text spanusuarioaltaop" id="spanusuarioaltaop"><?php echo $detalleAltaOp[0]['usuario_alta'] ?></span>
                                </div>
        				</div>
                    <br>
                    <p>Insumos de la orden</p>
                        <table class="table table-hover table-bordered table-sm">
    						<thead class="thead-light">
        						<tr>
                                    <th scope="col">Insumo</th>
                                    <th scope="col">Cantidad</th>
        						</tr>
      						</thead>
  							<tbody>
<?php

$insumoop=$detalleOrden['detalleInsumosOP_'];

for ($i = 0; $i <= count($insumoop)-1; $i++) {

echo '<tr><td scope="col">' . $insumoop[$i]['insumo'] . '</td><td scope="col" class="text-right">' . $insumoop[$i]['cantidad'] .' '. $insumoop[$i]['udm'] . '</td></tr>';

};
?>
  								
  							</tbody>
					</table>
                    <br>
   <p>Carnes de la orden</p>
                        <table class="table table-hover table-bordered table-sm">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">ID Desposte</th>
                        <th scope="col">Fecha Desposte</th>
                        <th scope="col">Carne</th>
                        <th scope="col">Cantidad</th>
                    </tr>
                  </thead>
                <tbody>
<?php

$carneop=$detalleOrden['detalleCarnesOP_'];

for ($j = 0; $j <= count($carneop)-1; $j++)  {

echo '<tr><td scope="col">' . $carneop[$j]['id_desposte'] . '</td><td scope="col">' . $carneop[$j]['fecha_desposte'] . '</td><td scope="col">' . $carneop[$j]['carne'] . '</td></td><td scope="col">' . $carneop[$j]['cantidad'] .' '.$carneop[$j]['udm'].'</td></tr>';

};
?>
                  
                </tbody>
          </table>        
     		<br>
<?php

if($detallesfinop=$detalleOrden['detalleFinOP_']){

    echo '<div class="row">
                     <div class="form-group col-6">
                         <label for="spanfechafinop">Fecha de finalización:</label>
                                <span class="input-group-text fechafinop" id="spanfechafinop">'. $detallesfinop[0]['fecha_finalizacion']. '</span>
                                </div>
                            <div class="form-group col-6">
                         <label for="mermaobtenidaop">Usuario:</label>
                                <span class="input-group-text spanmermaobtenidaop" id="mermaobtenidaop">'.$detallesfinop[0]['fecha_finalizacion'].' %</span>
                                </div>
                </div>
                <div class="row">
                     <div class="form-group col-6">
                         <label for="spanproducobtenidoop">Producto obtenido:</label>
                                <span class="input-group-text producobtenidoop" id="spanproducobtenidoop">'. $detallesfinop[0]['producto_obtenido'].' kilos </span>
                                </div>
                            <div class="form-group col-6">
                         <label for="spanunidadesobtenidasop">Unidades obtenidas:</label>
                                <span class="input-group-text unidadesobtenidasop" id="spanunidadesobtenidasop">'.$detallesfinop[0]['unidades_obtenidas'].' unidades</span>
                                </div>
                </div>';


}else{

echo '<div class="row">
                     <div class="form-group col-6">
                         <label for="spanfechafinop">Fecha de finalización:</label>
                                <span class="input-group-text fechafinop" id="spanfechafinop" disabled> La orden está activa aún </span>
                                </div>
                            <div class="form-group col-6">
                         <label for="mermaobtenidaop">Usuario que finalizó la orden:</label>
                                <span class="input-group-text spanmermaobtenidaop" id="mermaobtenidaop" disabled> La orden está activa aún </span>
                                </div>
                </div>
                <div class="row">
                     <div class="form-group col-6">
                         <label for="spanproducobtenidoop">Producto obtenido:</label>
                                <span class="input-group-text producobtenidoop" id="spanproducobtenidoop" disabled> La orden está activa aún </span>
                                </div>
                            <div class="form-group col-6">
                         <label for="spanunidadesobtenidasop">Unidades obtenidas:</label>
                                <span class="input-group-text unidadesobtenidasop" id="spanunidadesobtenidasop" disabled> La orden está activa aún </span>
                                </div>
                </div>';

}

?>

   <p>Detalles de medicion de la orden</p>

<?php

if ($detallesmediciones=$detalleOrden['detalleMedicionesesOP_']){

echo '<div class="row">
                     <div class="form-group col-4">
                         <label for="spanpesofinop">Peso Final:</label>
                                <span class="input-group-text pesofinop" id="spanpesofinop">'.$detallesmediciones[0]['peso'].'</span>
                                </div>
                            <div class="form-group col-4">
                         <label for="spanresponsable">Responsable:</label>
                                <span class="input-group-text responsable" id="spanresponsable">'.$detallesmediciones[0]['responsable'].'</span>
                                </div>
                         <div class="form-group col-4">
                         <label for="spanfechafinopresponsable">Fecha:</label>
                                <span class="input-group-text fechafinopresponsable" id="spanfechafinopresponsable">'.$detallesmediciones[0]['fecha'].'</span>
                                </div>
                </div>';


}else{

echo '<div class="row">
                     <div class="form-group col-4">
                         <label for="spanpesofinop">Peso Final:</label>
                                <span class="input-group-text pesofinop" id="spanpesofinop" disabled>La orden aún está activa</span>
                                </div>
                            <div class="form-group col-4">
                         <label for="spanresponsable">Responsable:</label>
                                <span class="input-group-text responsable" id="spanresponsable" disabled>La orden aún está activa</span>
                                </div>
                         <div class="form-group col-4">
                         <label for="spanfechafinopresponsable">Fecha:</label>
                                <span class="input-group-text fechafinopresponsable" id="spanfechafinopresponsable" disabled>La orden aún está activa</span>
                                </div>
                </div>';

}

?>
<br>
               <a class="btn btn-danger" href="index.php?pagina=finalizarop&idOrdenProdAlta_FinOP=<?php echo $_GET['idOrdenProdDetalle'];?>">Finalizar orden...</a>
               		<button type="button" class="btn btn-warning" id="Imprimirorden">Imprimir orden</button> 
      			</div>



</body>
</html>