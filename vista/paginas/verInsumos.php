<?php 

$stock_insumos=ControladorFormularios::ctrMostrarStockInsumos();
#var_dump($stock_insumos)

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