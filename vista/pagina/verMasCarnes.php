<!DOCTYPE html>
<html>
<head>
  <title>Ver Recetas</title>
</head>
<body>

  <?php

  $despostes=ControladorFormularios::ctrComposicionStockCarnes();


  ?>

  <br>
<div class="container">

<div class="d-flex">

<div class="mr-auto">

  <h2>Composicion por desposte de la carne <a class="nombre"><?php echo $_GET["nombrecarne"];?></a></h2>

</div>

</div>
<hr>
  <br>
        <div class="col-6">     
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

foreach($despostes as $desposte){
  
  echo '<tr><td scope="col">' . $desposte['id_desposte'] . '</td><td scope="col" class="text-right">' . $desposte['stock'] . '</td><td scope="col">' . $desposte['udm'] . '</td><td scope="col">' . $desposte['fecha_desposte'] . '</td></tr>';

};

?>
                </tbody>
          </table>
 </div>
        </div>

<script>


</script>

</body>
</html>