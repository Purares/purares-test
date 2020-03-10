
<!DOCTYPE html>
<html>
<head>
	<title>Ver Cortes</title>
</head>
<body>

  <?php

  $stockcarnes=ControladorFormularios::ctrStockCarnes();


  ?>
  <br>
<div class="container">			

	<h4>Stock de cortes actual</h4>

	<br>
             
                        <table class="table table-hover">
    						<thead class="thead-light">
        						<tr>
           							<th scope="col">ID</th>
                                    <th scope="col">Corte</th>
                                    <th scope="col" class="text-right">Stock Actual</th>
                                    <th scope="col">Unidad</th>
           							<th scope="col">Movimiento</th>
        						</tr>
      						</thead>
  							<tbody>
<?php

foreach($stockcarnes as $stockcorte){

  echo '<tr><td scope="col">' . $stockcorte["id_carne"] . '</td><td scope="col">' . $stockcorte["nombre"] . '</td><td scope="col" class="text-right">' . $stockcorte["Stock"] . '</td><td scope="col">???</td><td scope="col"><a class="btn btn-secondary btn-sm" href="movimiento carne.html">Nuevo movimiento</a></td></tr>';

};

?>
  							</tbody>
					</table>
 
        </div>


</body>
</html>