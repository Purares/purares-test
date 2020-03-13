
<!DOCTYPE html>
<html>
<head>
	<title>Ver Desabastes</title>
</head>
<body>

  <?php

  $desbastes=ControladorFormularios::ctrListaDesbaste();


  ?>
  <br>
<div class="container">

<div class="d-flex">

<div class="mr-auto p-2">

	<h4>Listado de desbastes actual:</h4>

</div>
<div class="p-2">
<div class="container">
   <input type="text" id="buscar" onkeyup="buscardesbaste()" placeholder="Buscar desbaste">
</div>
</div>

<div class="form-check p-2">
  <input class="form-check-input" type="checkbox" value="" id="defaultCheckDesbaste">
  <label class="form-check-label" for="defaultCheckDesbaste">
    Mostrar desbastes anulados
  </label>
</div>
</div>
	<br>
             
                        <table class="table table-hover">
    						<thead class="thead-light">
        						<tr>
           							<th scope="col">ID Desbaste</th>
                                    <th scope="col">Número de remito</th>
                                    <th scope="col">Proveedor</th>
                                    <th scope="col">Unidades</th>
           							<th scope="col">Peso Total</th>
           							<th scope="col">Fecha Desbaste</th>
           							<th scope="col">Estado</th>
           							<th scope="col">Inspeccionar</th>
        						</tr>
      						</thead>
  							<tbody id="tabladesbastes">
<?php

foreach($desbastes as $desbaste){

if ($desbaste["anulado"]==0) {
	
	echo '<tr><td scope="col">' . $desbaste["id_desbaste"] . '</td><td scope="col">' . $desbaste["nro_remito"] . '</td><td scope="col">' . $desbaste["proveedor"] . '</td><td scope="col">' . $desbaste["unidades"] . '</td><td scope="col">' . $desbaste["peso_total"] . '</td><td scope="col">' . $desbaste["fecha_desbaste"] . '</td><td scope="col">Activo</td><td scope="col"><a class="btn btn-secondary btn-sm" href="index.php?pagina=inspeccionarDesbaste&idDesbaste=' . $desbaste["id_desbaste"] . '&estado=' .  $desbaste["anulado"] . '">Inspeccionar Desbaste</a></td></tr>';

}

};

?>
  							</tbody>
					</table>
 
        </div>

<script>


$( "input" ).on( "click", function() {
	
if ($('#defaultCheckDesbaste').prop('checked')==true) {

   $.ajax({
                type:'POST',
                url:'datos.php',
                data:'chequeadoDesbaste='+ 0,
                success:function(html){
                $('#tabladesbastes').children().detach();
                    $('#tabladesbastes').html(html); 
                }})}
            
else{

	$.ajax({
               type:'POST',
              url:'datos.php',
               data:'chequeadoDesbaste='+ 1,
               success:function(html){
                	$('#tabladesbastes').children().detach();
                   $('#tabladesbastes').html(html); 
            }
        });


}


});

                  function buscardesbaste() {
                        // Declare variables 
                        var input, filter, table, tr, td, i, j, visible;
                        input = document.getElementById("buscar");
                        filter = input.value.toUpperCase();
                        table = document.getElementById("tabladesbastes");
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