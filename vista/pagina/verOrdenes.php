
<!DOCTYPE html>
<html>
<head>
	<title>Ver Recetas</title>
</head>
<body>

  <?php

  $ordenes=ControladorFormularios::ctrListaOP();


  ?>
  <br>
<div class="container">

<div class="d-flex">

<div class="mr-auto p-2">

	<h4>Listado de ordenes actual</h4>

</div>
<div class="p-2">
<div class="container">
   <input type="text" id="buscar" onkeyup="buscarordenesporId()" placeholder="Buscar orden por ID">
</div>
</div>
<div class="form-check p-2">
 <!-- <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
  <label class="form-check-label" for="defaultCheck1">
    Mostrar recetas inactivas
  </label>-->
</div>
</div>
	<br>
             
                        <table class="table table-hover">
    						<thead class="thead-light">
        						<tr>
           							<th scope="col">ID Orden</th>
                                    <th scope="col">Nombre Receta</th>
                                    <th scope="col">Peso Pastón</th>
                                    <th scope="col">Fecha de alta</th>
           							<th scope="col">Ordenante</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Ver Detalles</th>
        						</tr>
      						</thead>
  							<tbody id="tablaordenes">
<?php

foreach($ordenes as $orden){

if ($orden["anulado"]==0) {
	
	echo '<tr><td scope="col">' . $orden["id_ordenprod"] . '</td><td scope="col">' . $orden["nombre_receta"] . '</td><td scope="col">' . $orden["peso_paston"] . '</td><td scope="col">' . $orden["fecha_alta"] .'</td><td scope="col">' . $orden["usuario_alta"].'</td><td scope="col">Activa</td><td scope="col"><a class="btn btn-secondary btn-sm" href="index.php?pagina=detalleOp&idOrdenProdDetalle=' . $orden["id_ordenprod"] . '&nombreop=' .  $orden["nombre_receta"]  . '&estado=' .  $orden["anulado"] . '">Ver detalles</a></td></tr>';

}

};

?>
  							</tbody>
					</table>
 
        </div>

<script>


/*$( "input" ).on( "click", function() {
	
if ($('#defaultCheck1').prop('checked')==true) {

   $.ajax({
                type:'POST',
                url:'datos.php',
                data:'chequeado='+ 1,
                success:function(html){
                $('#tablarecetas').children().detach();
                    $('#tablarecetas').html(html); 
                }})}
            
else{

	$.ajax({
               type:'POST',
              url:'datos.php',
               data:'chequeado='+ 0,
               success:function(html){
                	$('#tablarecetas').children().detach();
                   $('#tablarecetas').html(html); 
            }
        });


}
});*/

                  function buscarordenesporId() {
                        // Declare variables 
                        var input, filter, table, tr, td, i, j, visible;
                        input = document.getElementById("buscar");
                        filter = input.value.toUpperCase();
                        table = document.getElementById("tablaordenes");
                        tr = table.getElementsByTagName("tr");

                        // Loop through all table rows, and hide those who don't match the search query
                        for (i = 0; i < tr.length; i++) {
                          visible = false;
                          /* Obtenemos todas las celdas de la fila, no sólo la primera */
                          td = tr[i].getElementsByTagName("td");
                          
                            if (td[0] && td[0].innerHTML.toUpperCase().indexOf(filter) > -1) {
                              visible = true;
                            }

                          if (visible === true) {
                            tr[i].style.display = "";
                          } else {
                            tr[i].style.display = "none";
                          }
                        }
                      };


</script>

</body>
</html>