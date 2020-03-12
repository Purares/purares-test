<!DOCTYPE html>
<html>
<head>
	<title>Detalle receta</title>
</head>
<body>

<?php

$detalleReceta=ControladorFormularios::ctrDetalleReceta();

foreach ($detalleReceta as $receta) {


?>


<div class="container">
	<br>
  					<h4>Receta ID <a class="idreceta"><?php echo $_GET['idReceta'] ?></a> "<a class="nombrereceta"><?php echo $_GET['nombrereceta'] ?></a>"</h4>
  					<br>
          
                  <div class="row">
                            <div class="form-group col-6">
                         <label for="spanrecetanombre">Nombre de la receta:</label>
                                <span class="input-group-text nombrereceta" id="spanrecetanombre"><?php echo $_GET['nombrereceta'] ?></span>
                                </div>
                            <div class="form-group col-6">
                         <label for="spanrecetafechaalta">Fecha de Alta:</label>
                                <span class="input-group-text fechadealta" id="spanrecetafechaalta"><?php echo $receta['fecha_alta'] ?></span>
                                </div>
        				</div>
                    <div class="row">
                     <div class="form-group col-6">
                         <label for="spanrecetaporcenpaston">Porcentaje de carne:</label>
                                <span class="input-group-text recetaporcentajecarne" id="spanrecetaporcenpaston"><?php echo $receta['porcent_carne'] ?> %</span>
                                </div>
                            <div class="form-group col-6">
                         <label for="spanrecetamermaesp">Merma esperada:</label>
                                <span class="input-group-text recetamermaesperada" id="spanrecetamermaesp"><?php echo $receta['merma_esperada'] ?> %</span>
                                </div>
        				</div>
                    <div class="container">
                    <p>Insumos de la receta</p>
                        <table class="table table-sm">
    						<thead>
        						<tr>
           							<th scope="col">ID</th>
                                    <th scope="col">Insumo</th>
                                    <th scope="col">Cantidad</th>
           							<th scope="col">Unidad</th>
        						</tr>
      						</thead>
  							<tbody id="myTable3">


  								
  							</tbody>
					</table>
                    </div>
                      <div class="row">
                     <div class="form-group col-6">
                         <label for="spanrecetadiasprodu">Días de producción:</label>
                                <span class="input-group-text recetadiasproduccion" id="spanrecetadiasprodu"><?php echo $receta['dias_produccion'] ?> días</span>
                                </div>
                            <div class="form-group col-6">
                         <label for="spanrecetadiasven">Días de vencimiento:</label>
                                <span class="input-group-text recetadiasvencimiento" id="spanrecetadiasven"><?php echo $receta['dias_vencimiento'] ?> días</span>
                                </div>
        				</div>
                           <div class="row">
                     <div class="form-group col-6">
                         <label for="spanrecetalargouni">Largo por unidad:</label>
                                <span class="input-group-text recetalargoporunidad" id="spanrecetalargouni"><?php echo $receta['largo_unidad'] ?> cm/unidad</span>
                                </div>
                            <div class="form-group col-6">
                         <label for="spanrecetapesouni">Peso por unidad:</label>
                                <span class="input-group-text recetapesoporunidad" id="spanrecetapesouni"><?php echo $receta['peso_unidad'] ?> gramos/unidad</span>
                                </div>
        				</div>
     		<br>
               		<button type="button" class="btn btn-warning" id="Imprimirreceta">Imprimir receta</button> 
      			</div>

<?php

}

?>


</body>
</html>