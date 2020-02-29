

<?php 

#Stock de insumos
$stock_insumos=ControladorFormularios::ctrStockInsumos();
var_dump($stock_insumos)

#Agregar Insumo 
$agregar_insumo=ControladorFormularios::ctrAgregarInsumo();
	#Ver las variables POST que me tiene que eviar
	#El return es un OK o el error en su defecto

#Actualizar stock del insumo seleccionado


 ?>


<h1>Ver Insumos</h1>

<button type="button" class="btn btn-primary" onclick = "location='index.php?pagina=agregarInsumo'"">Nuevo Insumo</button>

 

<!--TABLA-->

<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Insumo</th>
			<th>UdM</th>
			<th>Depósito</th>
			<th>Stock</th>
		</tr>
	</thead>
	<tbody>
		
		<?php foreach ($stock_insumos as $key => $value): ?> <!--COMPLETAR LA TABLA-->
			<tr>
				<td><?php echo $value["id_insumo"]; ?></td>
				<td><?php echo $value["insumo"]; ?></td>
				<td><?php echo $value["udm"]; ?></td>
				<td><?php echo $value["deposito"]; ?></td>
				<td><?php echo $value["StockActual"]; ?></td>
			</tr>
		<?php endforeach; ?>


	</tbody>
</table>