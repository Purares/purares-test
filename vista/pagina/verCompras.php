
<!DOCTYPE html>
<html>
<head>
	<title>Ver Recetas</title>
</head>
<body>

  <?php

  $compras=ControladorFormularios::ctrListaCompras();


  ?>
  <br>
<div class="container">

<div class="d-flex">

<div class="mr-auto p-2">

	<h4>Listado de compras actual</h4>

</div>
<div class="p-2">
<div class="container">
   <input type="text" id="buscarcompra" onkeyup="buscarcompras()" placeholder="Buscar compra">
</div>
</div>

<div class="form-check p-2">
  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
  <label class="form-check-label" for="defaultCheck1">
    Mostrar compras inactivas
  </label>
</div>
</div>
	<br>
             
                        <table class="table table-hover">
    						<thead class="thead-light">
        						<tr>
           							<th scope="col">Fecha de compra</th>
                                    <th scope="col">Proveedor</th>
                                    <th scope="col">N° de remito</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Estado</th>
           							<th scope="col">Detalle</th>
        						</tr>
      						</thead>
  							<tbody id="tablacompras">
<?php

foreach($compras as $compra){

if ($compra["anulado"]==0) {
	
	echo '<tr><td scope="col">' . $compra["fecha_compra"] . '</td><td scope="col">' . $compra["proveedor"] . '</td><td scope="col">' . $compra["nro_remito"] . '</td><td scope="col">' . $compra["descripcion"] . '</td><td scope="col">Activa</td><td scope="col"><a class="btn btn-secondary btn-sm" href="index.php?pagina=detalleCompra&idCompra=&nombrereceta=&estado=' .  $compra["anulado"] . '">Ver detalles</a></td></tr>';

}

};

?>
  							</tbody>
					</table>
 
        </div>

<script>


$( "input" ).on( "click", function() {
	
if ($('#defaultCheck1').prop('checked')==true) {

   $.ajax({
                type:'POST',
                url:'datos.php',
                data:'chequeadocompras='+ 0,
                success:function(html){
                $('#tablacompras').children().detach();
                    $('#tablacompras').html(html); 
                }})}
            
else{

	$.ajax({
               type:'POST',
              url:'datos.php',
               data:'chequeadocompras='+ 1,
               success:function(html){
                	$('#tablacompras').children().detach();
                   $('#tablacompras').html(html); 
            }
        });


}


});

                  function buscarcompras() {
                        // Declare variables 
                        var input, filter, table, tr, td, i, j, visible;
                        input = document.getElementById("buscarcompra");
                        filter = input.value.toUpperCase();
                        table = document.getElementById("tablacompras");
                        tr = table.getElementsByTagName("tr");

                        // Loop through all table rows, and hide those who don't match the search query
                        for (i = 0; i < tr.length; i++) {
                          visible = false;
                          /* Obtenemos todas las celdas de la fila, no sólo la primera */
                          td = tr[i].getElementsByTagName("td");
                          for (j = 0; j < td.length; j++) {
                            if (td[j] && td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                              visible = true;
                            }
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