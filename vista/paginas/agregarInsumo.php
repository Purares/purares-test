<h1>Agregar Insumo</h1>

<form method="post" >

<!--NOMBRE DEL INSUMO-->	

	<div class="form-group">
		<label for="nombreInsumo">Nombre de Insumo</label>
		<input type="text" class="form-control" id="nombre" name="nombreNuevoInsumo">
	</div>
	

<!--Lista de UDM-->


<select name="udmNuevoIsumo">
 	<?php 
 	$listaUDM=ControladorFormularios::ctrListaUDM();
		for ($i=0; $i <count($listaUDM); $i++) {

 			echo "<option value=".$listaUDM[$i][0].">".$listaUDM[$i][1]."</option>";
		}
 	?>        
</select>


<!--Lista de DEPOSITOS-->

<select name="depositoNuevoIsumo">
 	<?php 
 	$listaDepositos=ControladorFormularios::ctrListaDepositos();
		for ($i=0; $i <count($listaDepositos); $i++) {

 			echo "<option value=".$listaDepositos[$i][0].">".$listaDepositos[$i][1]."</option>";
		}
 	?>        
</select>

<!--Alerta Q minima-->	

	<div class="form-group">
		<label for="alertaQminNuevoInsumo">Alerta de Cantidad minima</label>
		<input type="text" class="form-control" id="alerta" name="alertaQminNuevoInsumo">
	</div>


<!--INSTANCIAMIENTO DEL METODO ESTÁTICO-->

<?php

if (isset($imprimir)) {
	$Imprimir=ControladorFormularios::ctrNuevoInsumoDatos();
	echo $Imprimir;
}


  ?>

	
	<button type="submit" class="btn btn-primary">Crear insumo</button>
</form>


