<!DOCTYPE html>
<html>
<head>
	<title>Detalle desbaste</title>
</head>
<body>

<?php

$detalleDesbastes=ControladorFormularios::ctrDetalleDesbaste();

$detallecarnesdesbaste=ControladorFormularios::ctrCarnesDesbaste();

foreach ($detalleDesbastes as $detalleDesbaste) {

?>


<div class="container">
	<br>
  				<div class="d-flex">
  					<div class="mr-auto">
  					<h4>Desbaste ID <a class="iddesbaste"><?php echo $_GET['idDesbasteVerDetalles'] ?></a> <span class="medalla"><?php if ($_GET['estado']==0) {echo '     <span class="badge badge-success medal">Activo</span>';}else{echo '<span class="badge badge-danger medal">Anulado</span>';}?>
					</span>
  				</h4>
  					</div>
  					<div>
  						<div class="boton">
  						<?php if ($_GET['estado']==0) {echo '<button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#ConfirmarAnularDesbaste" data-accion="anular" id="botonAnularDesbaste">Anular Desbaste</button>';};?>
  						</div>
  					</div>	
  					<br>
              </div>
                  <div class="row">
                            <div class="form-group col-6">
                         <label for="spanrecetanombre">Número de remito:</label>
                                <span class="input-group-text nombrereceta" id="spanrecetanombre"><?php echo $detalleDesbaste['nro_remito'] ?></span>
                                </div>
                            <div class="form-group col-6">
                         <label for="spanrecetafechaalta">Proveedor:</label>
                                <span class="input-group-text fechadealta" id="spanrecetafechaalta"><?php echo $detalleDesbaste['proveedor'] ?></span>
                                </div>
        				</div>
                    <div class="row">
                     <div class="form-group col-6">
                         <label for="spanrecetaporcenpaston">Unidades:</label>
                                <span class="input-group-text recetaporcentajecarne" id="spanrecetaporcenpaston"><?php echo $detalleDesbaste['unidades'] ?> medias reses</span>
                                </div>
                            <div class="form-group col-6">
                         <label for="spanrecetamermaesp">Peso total:</label>
                                <span class="input-group-text recetamermaesperada" id="spanrecetamermaesp"><?php echo $detalleDesbaste['peso_total'] ?> kilos</span>
                                </div>
        				</div>
                    <br>
                    <p>Carnes obtenidas en el desbaste:</p>
                        <table class="table table-hover table-bordered table-sm">
    						<thead class="thead-light">
        						<tr>
           							<th scope="col">ID Carne</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col" class="text-right">Cantidad Obtenida</th>
           							<th scope="col">Unidad</th>
                        <th scope="col" class="text-right">Stock Actual</th>
                        <th scope="col">Unidad</th>
                         <th scope="col">Movimiento</th>
        						</tr>
      						</thead>
  							<tbody>
<?php

};

foreach ($detallecarnesdesbaste as $detallecarnedesbaste) {

echo '<tr><td scope="col">' . $detallecarnedesbaste["id_carne"] . '</td><td scope="col">' . $detallecarnedesbaste["carne"] . '</td><td scope="col" class="text-right">' . $detallecarnedesbaste["qObtenido"] . '</td><td scope="col">' . $detallecarnedesbaste["udm"] . '</td><td scope="col" class="text-right">' . $detallecarnedesbaste["stockactual"] . '</td><td scope="col">' . $detallecarnedesbaste["udm"] . '</td><td scope="col"><button class="btn btn-secondary btn-sm">Nuevo movimiento</button></td></tr>';

}
?>
  								
  							</tbody>
					</table>
     		<br>
               		<button type="button" class="btn btn-warning" id="Imprimirdesbaste">Imprimir desbaste</button> 
      			</div>



  <div class="modal fade" id="AnularDesbaste" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Anulacion</h5>
        </div>
        <div class="modal-body">

        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>

   <div class="modal fade" id="Confirmada" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
    	</div>
        <div class="modal-body">
        		<div class="alert alert-success" role="alert">
          <h5 class="modal-title">Receta <a class="confirmacion"></a></h5>
        </div>
        </div>
        <div class="modal-footer">
   			<button type="button" class="btn btn-secondary btn-lg" id="aceptar">Aceptar</button>
        </div>
      </div>
    </div>
  </div>

<script>
  
var accion;

var url;

var url1;

$("#botonAnularDesbaste").on( "click", function() {

    $.ajax({
                type:'POST',
                url:'datos.php',
                data:{idDesbasteVerDetalles: $('.iddesbaste').text()},
                success:function(anulacion){
                //alert('activo'+html);
                $('#AnularDesbaste').modal('show')
                var modal = $('#AnularDesbaste')
                modal.find('.modal-body').html(anulacion)
      
}})})


/*


$('#ConfirmarAnularDesbaste').modal('show')});

$('#ConfirmarEstadoReceta').on('show.bs.modal', function (event) {
var button = $('#botonCambiarEstado'); // Button that triggered the modal
accion = button.data('accion')
var modal = $(this)
modal.find('.accion').text('' + accion);

$("#confirmar").on( "click", function() {

	//alert (accion)

if (accion=='activar') {

   $.ajax({
                type:'POST',
                url:'datos.php',
                data:{idRecetaDetalle: $('.idreceta').text(), estado: 0},
                success:function(html){
                //alert('activo'+html);
                $('#ConfirmarEstadoReceta').modal('hide')
                var modalconfir = $('#Confirmada').modal('show')
                modalconfir.find('.confirmacion').text('activada')
                url=$(location).attr('href')
                url1=url.replace("estado=0", "estado=1")
               
                //$('#botonCambiarEstado').remove();
          		//$('.boton').html('<button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#ConfirmarEstadoReceta" data-accion="desactivar" id="botonCambiarEstado">Desactivar Receta</button>')
          		//$('.medal').remove()
          		//$('.medalla').html('<span class="badge badge-success medal">Activa</span>')

                }})};


if (accion=='desactivar') {

   $.ajax({
                type:'POST',
                url:'datos.php',
                data:{idRecetaDetalle: $('.idreceta').text(), estado: 1},
                success:function(html){
                $(this).prop("disabled", true);
                $('#ActivarReceta').prop("disabled", false);
                //alert('desactivo ' + html);
                $('#ConfirmarEstadoReceta').modal('hide')
                var modalconfir = $('#Confirmada').modal('show')
                modalconfir.find('.confirmacion').text('desactivada')
                url=$(location).attr('href')
                url1=url.replace("estado=1", "estado=0")
               
          		//$('#botonCambiarEstado').remove();
          		//$('.boton').html('<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#ConfirmarEstadoReceta" data-accion="activar" id="botonCambiarEstado">Activar Receta</button>')
          		//$('.medal').remove()
          		//$('.medalla').html('<span class="badge badge-danger medal">Desactivada</span>')
                }})}})});



$("#aceptar").on( "click", function() {

 $(location).attr('href',url1)

})*/

</script>

</body>
</html>