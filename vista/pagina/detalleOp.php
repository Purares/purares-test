<!DOCTYPE html>
<html>
<head>
	<title>Detalle Orden</title>
</head>
<body>

<?php

$detalleOrden=ControladorFormularios::ctrDetalleOP();


$detalleAltaOp=$detalleOrden['detalleAltaOP_'];


$detalleReceta=$detalleOrden['detalleReceta_'];

?>


<div class="container">
	<br>
  				<div class="d-flex">
  					<div class="mr-auto">
  					<h2>Orden N°<a class="idorden"><?php echo $_GET['idOrdenProdDetalle']; ?></a> <a class="nombrereceta"><?php echo $detalleAltaOp[0]['nombre_receta']; ?></a> <span class="medalla"><?php if ($detalleAltaOp[0]['estado']=="a") {echo '     <span class="badge badge-danger medal">Anulada</span>';}if($detalleAltaOp[0]['estado']=="p"){echo '<span class="badge badge-warning medal">En producción</span>';}if($detalleAltaOp[0]['estado']=="f"){echo '<span class="badge badge-success medal">Finalizada</span>';};?>
					</span>
  				</h2>
  					</div>
  					<div>
  						<!--<div class="boton">
  						<?php// if ($_GET['estado']==1) {echo '<button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#ConfirmarEstadoReceta" data-accion="desactivar" id="botonCambiarEstado">Desactivar Receta</button>';}else{echo '<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#ConfirmarEstadoReceta" data-accion="activar" id="botonCambiarEstado">Activar Receta</button>';}?>
  						</div>-->
  					</div>	
  					<br>
              </div>
              <hr>
              <br>
                <div class="row">
                            <div class="input-group col-6">
                                <div class="input-group-prepend">
                         <span class="input-group-text">Ordenante:</span>
                                </div>
                                <input class="form-control input-group-text spanusuarioaltaop" id="spanusuarioaltaop" value="<?php echo $detalleAltaOp[0]['usuario_alta'] ?>" readonly>
                                </div>

                            <div class="input-group col-6">
                         <div class="input-group-prepend">
                         <span class="input-group-text">Fecha de Alta:</span>
                            </div>
                                <input class="form-control input-group-text fechadealtaop" id="spanfechaaltaop" value="<?php echo $detalleAltaOp[0]['fecha_alta'] ?>" readonly>
                                </div>
        				</div>
                <br>
              <h5>1 - Preparación del pastón</h5>
              <hr>
                  <div class="row">
                    <div class="input-group col-6">
                        <div class="input-group-prepend">     
                         <span class="input-group-text">Nombre de la receta:</span>
                        </div>
                        <input class="form-control input-group-text nombreop" id="spannombreop" value="<?php echo $detalleAltaOp[0]['nombre_receta'];?>" readonly>
                        </div>
                     <div class="input-group col-6">
                        <div class="input-group-prepend">
                         <span class="input-group-text">Peso Pastón:</span>
                        </div>
                        <input class="input-group-text form-control pesopastonop" id="spanpastonop" value="<?php echo $detalleAltaOp[0]['peso_paston'] ?> kilos" readonly>
                                </div>
        				</div>
                    <hr>
                    <div class="row">
                         <div class="input-group col-6">
                        <div class="input-group-prepend">     
                         <span class="input-group-text">Peso de unidad fresca:</span>
                        </div>
                        <input class="form-control input-group-text pesounidadfresca" id="spanpesounidadfresca" value="<?php echo $detalleReceta[0]['peso_unidad_lote'];?> kilos/unidad" readonly>
                        </div>
                            <div class="input-group col-6">
                        <div class="input-group-prepend">     
                         <span class="input-group-text">Cantidad de unidades frescas:</span>
                        </div>
                        <input class="form-control input-group-text cantunidadesfrescas" id="spancantunidadesfrescas" value="<?php echo $detalleReceta[0]['cantidad_unidades_lote'];?> unidades" readonly>
                        </div>
                    </div>
                    <br>
                     <div class="row">
                         <div class="input-group col-6">
                        <div class="input-group-prepend">     
                         <span class="input-group-text">Largo de unidad fresca:</span>
                        </div>
                        <input class="form-control input-group-text largounidadfresca" id="spanlargounidadfresca" value="<?php echo $detalleReceta[0]['largo_unidad_lote'];?> metros/unidad" readonly>
                        </div>
                        </div>
                    <br>
                    <h6>Insumos de la orden</h6>
                    <hr>
                    <div class="col-6">
                        <table class="table table-hover table-sm">
    						<thead class="thead-light">
        						<tr>
                                    <th scope="col" class="text-white bg-dark">Insumo</th>
                                    <th scope="col" class="text-center text-white bg-dark">Cantidad</th>
        						</tr>
      						</thead>
  							<tbody>
<?php

$insumoop=$detalleOrden['detalleInsumosOP_'];

for ($i = 0; $i <= count($insumoop)-1; $i++) {

echo '<tr><td scope="col">' . $insumoop[$i]['insumo'] . '</td><td scope="col" class="text-center">' . $insumoop[$i]['cantidad'] .' '. $insumoop[$i]['udm'] . '</td></tr>';

};
?>
  								
  							</tbody>
					</table>
                           </div> 
                    <br>
   <h6>Carnes de la orden</h6>
   <hr>
   <div class="col-6">
                        <table class="table table-hover table-sm">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" class="text-center text-white bg-dark">N° Desposte</th>
                        <th scope="col" class="text-center text-white bg-dark">Fecha Desposte</th>
                        <th scope="col" class="text-white bg-dark">Carne</th>
                        <th scope="col" class="text-white bg-dark">Cantidad</th>
                    </tr>
                  </thead>
                <tbody>
<?php

$carneop=$detalleOrden['detalleCarnesOP_'];

for ($j = 0; $j <= count($carneop)-1; $j++)  {

echo '<tr><td scope="col" class="text-center">' . $carneop[$j]['id_desposte'] . '</td><td scope="col" class="text-center">' . $carneop[$j]['fecha_desposte'] . '</td><td scope="col">' . $carneop[$j]['carne'] . '</td></td><td scope="col">' . $carneop[$j]['cantidad'] .' '.$carneop[$j]['udm'].'</td></tr>';

};
?>
                  
                </tbody>
          </table> 
         </div>
     		<br>

              <h5>2 - Resultado del embutido</h5>
              <hr>
                <div class="row">
                         <div class="input-group col-6">
                        <div class="input-group-prepend">     
                         <span class="input-group-text">Unidades frescas:</span>
                        </div>
                        <input class="form-control input-group-text unidadesfrescasobtenidas" id="spanunidadesfrescasobtenidas" value="<?php echo '???';?> unidades" readonly>
                        </div>
                        </div>
            <br>

              <h5>3 - Mediciones de goteo y secado</h5>
              <hr>
              <div class="col-6">
                <table class="table table-hover table-sm">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" class="text-center text-white bg-dark">#</th>
                        <th scope="col" class="text-center text-white bg-dark">Peso</th>
                        <th scope="col" class="text-white bg-dark">Merma</th>
                        <th scope="col" class="text-white bg-dark">Responsable</th>
                        <th scope="col" class="text-white bg-dark">Fecha</th>
                    </tr>
                  </thead>
                <tbody>
                </tbody>
                </table>
                </div>
            <br>
                  <h5>4 - Envasado</h5>
              <hr>
   <div class="row">
                         <div class="input-group col-6">
                        <div class="input-group-prepend">     
                         <span class="input-group-text">Corte:</span>
                        </div>
                        <input class="form-control input-group-text corte" id="spancorte" value="<?php echo '???';?> unidades" readonly>
                        </div>
                         <div class="input-group col-6">
                        <div class="input-group-prepend">     
                         <span class="input-group-text">Peso esperado:</span>
                        </div>
                        <input class="form-control input-group-text pesoesperado" id="spanpesoesperado" value="<?php echo '???';?> kilos/unidad" readonly>
                        </div>
                        </div>
            <br>
    <div class="row">
                         <div class="input-group col-6">
                        <div class="input-group-prepend">     
                         <span class="input-group-text">Unidades esperadas:</span>
                        </div>
                        <input class="form-control input-group-text corte" id="spancorte" value="<?php echo '???';?> unidades" readonly>
                        </div>
                         <div class="input-group col-6">
                        <div class="input-group-prepend">     
                         <span class="input-group-text">Largo esperado:</span>
                        </div>
                        <input class="form-control input-group-text pesoesperado" id="spanpesoesperado" value="<?php echo '???';?> metros/unidad" readonly>
                        </div>
                        </div>
                        <br>
                         <h6>Resultados obtenidos</h6>
                        <hr>
                        <div class="row">
                         <div class="input-group col-6">
                        <div class="input-group-prepend">     
                         <span class="input-group-text">Unidades obtenidas:</span>
                        </div>
                        <input class="form-control input-group-text corte" id="spancorte" value="<?php echo '???';?> unidades" readonly>
                        </div>
                          <div class="input-group col-6">
                        <div class="input-group-prepend">     
                         <span class="input-group-text">Producto total obtenido:</span>
                        </div>
                        <input class="form-control input-group-text corte" id="spancorte" value="<?php echo '???';?> kilos" readonly>
                        </div>
                        </div>
                        <br>
                         <div class="row">
                         <div class="input-group col-6">
                        <div class="input-group-prepend">     
                         <span class="input-group-text">Responsable:</span>
                        </div>
                        <input class="form-control input-group-text corte" id="spancorte" value="<?php echo '???';?>" readonly>
                        </div>
                          <div class="input-group col-6">
                        <div class="input-group-prepend">     
                         <span class="input-group-text">Fecha de finalización:</span>
                        </div>
                        <input class="form-control input-group-text corte" id="spancorte" value="<?php echo '???';?>" readonly>
                        </div>
                        </div>
<br>
               <a class="btn btn-danger" href="index.php?pagina=finalizarop&idOrdenProdAlta_FinOP=<?php echo $_GET['idOrdenProdDetalle'];?>">Finalizar orden...</a>
               		<button type="button" class="btn btn-warning" id="Imprimirorden">Imprimir orden</button> 
      			</div>



</body>
</html>