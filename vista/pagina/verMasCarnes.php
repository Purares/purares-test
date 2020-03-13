<!DOCTYPE html>
<html>
<head>
  <title>Ver Recetas</title>
</head>
<body>

  <?php

  $desbastes=ControladorFormularios::ctrComposicionStockCarnes();


  ?>

  <br>
<div class="container">

<div class="d-flex">

<div class="mr-auto">

  <h4>Composicion por desbastes de la carne ID <a class="id"><?php echo $_GET["idCarneVerComposicion"];?></a>  "<a class="nombre"><?php echo $_GET["nombrecarne"];?></a>":</h4>

</div>

</div>
  <br>
             
                        <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                                    <th scope="col">ID Desbaste</th>
                                    <th scope="col">Stock</th>
                                     <th scope="col">Unidad</th>
                                    <th scope="col">Fecha de desbaste</th>
                    </tr>
                  </thead>
                <tbody id="tablacomposicioncarne">
<?php

foreach($desbastes as $desbaste){
  
  echo '<tr><td scope="col">' . $desbaste['id_desbaste'] . '</td><td scope="col" class="text-right">' . $desbaste['stock'] . '</td><td scope="col">' . $desbaste['udm'] . '</td><td scope="col">' . $desbaste['fecha_desbaste'] . '</td></tr>';

};

?>
                </tbody>
          </table>
 
        </div>

<script>


</script>

</body>
</html>