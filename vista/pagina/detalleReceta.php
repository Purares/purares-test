<!DOCTYPE html>
<html>
<head>
	<title>Detalle receta</title>
</head>
<body>

<?php

$detalleReceta=ControladorFormularios::ctrDetalleReceta();

$detalleinsumos=ControladorFormularios::ctrInsumosReceta();

foreach ($detalleReceta as $receta) {


?>


<div class="container">
	<br>
  				<div class="d-flex">
  					<div class="mr-auto">
  					<h2>Receta: <a class="nombrereceta"><?php echo $receta['nombre'] ?></a> <span class="medalla"><?php if ($_GET['estado']==1) {echo '     <span class="badge badge-success medal">Activa</span>';}else{echo '<span class="badge badge-danger medal">Desactivada</span>';}?>
					</span>
  				</h2>
  					</div>
  					<div>
  						<div class="boton">
  						<?php if ($_GET['estado']==1) {echo '<button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#ConfirmarEstadoReceta" data-accion="desactivar" id="botonCambiarEstado">Desactivar Receta</button>';}else{echo '<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#ConfirmarEstadoReceta" data-accion="activar" id="botonCambiarEstado">Activar Receta</button>';}?>
  						</div>
  					</div>	
  					<br>
              </div>
              <hr>
                  <div class="row">
                            <div class="form-group col-3">
                         <label for="spanrecetaid" class="font-weight-bold" >ID Receta:</label>
                                <span class="input-group-text recetaid" id="spanrecetaid"><?php echo $_GET['idReceta'] ?></span>
                                </div>
                            <div class="form-group col-3">
                         <label for="spanrecetafechaalta" class="font-weight-bold">Fecha de Alta:</label>
                                <span class="input-group-text fechadealta" id="spanrecetafechaalta"><?php echo $receta['fecha_alta'] ?></span>
                                </div>
        				</div>
                    <br>
                    <h5>Insumos de la receta</h5>
                    <hr>
                    <div class="container">
                      <div class="col-6">
                        <table class="table table-hover table-sm">
    						<thead class="thead-light">
        						<tr>
           							<th scope="col" class="text-center text-white bg-dark">ID</th>
                        <th scope="col" class="text-white bg-dark">Insumo</th>
                        <th scope="col" class="text-center text-white bg-dark">Cantidad</th>
        						</tr>
      						</thead>
  							<tbody>
<?php

foreach ($detalleinsumos as $insumo) {

echo '<tr><td scope="col" class="text-center">' . $insumo[1] . '</td><td scope="col">' . $insumo[2] . '</td><td scope="col" class="text-right">' . $insumo[3].' ' . $insumo[4] . '</td></tr>';

};
?>
  								
  							</tbody>
					</table>
        </div>
        </div>
        <hr>
                    <br>
                        <div class="row">
                        <div class="form-group col-6">
                         <label for="spanrecetaporcenpaston" class="font-weight-bold">Unidades finales por unidad producida:</label>
                                <span class="input-group-text unidadesfinales" id="unidadesfinales"><?php echo $receta['unidades_final_xunidad'] ?> unidades</span>
                                </div>
                        </div>
                    <div class="row">
                     <div class="form-group col-3">
                         <label for="spanrecetaporcenpaston" class="font-weight-bold">Porcentaje de carne:</label>
                                <span class="input-group-text recetaporcentajecarne" id="spanrecetaporcenpaston"><?php echo $receta['porcent_carne'] ?> %</span>
                                </div>
                            <div class="form-group col-3">
                         <label for="spanrecetamermaesp" class="font-weight-bold">Merma esperada:</label>
                                <span class="input-group-text recetamermaesperada" id="spanrecetamermaesp"><?php echo $receta['merma_esperada'] ?> %</span>
                                </div>
                        </div>
                          <div class="row">
                     <div class="form-group col-3">
                         <label for="spanrecetadiasprodu" class="font-weight-bold">Días de producción:</label>
                                <span class="input-group-text recetadiasproduccion" id="spanrecetadiasprodu"><?php echo $receta['dias_produccion'] ?> días</span>
                                </div>
                            <div class="form-group col-3">
                         <label for="spanrecetadiasven" class="font-weight-bold">Vencimiento:</label>
                                <span class="input-group-text recetadiasvencimiento" id="spanrecetadiasven"><?php echo $receta['dias_vencimiento'] ?> días</span>
                                </div>
        				</div>
                      <br>
              <h5>Producto fresco</h5>
              <hr>
                           <div class="row">
                     <div class="form-group col-3">
                         <label for="spanrecetalargouni" class="font-weight-bold">Largo por unidad lote:</label>
                                <span class="input-group-text recetalargoporunidad" id="spanrecetalargouni"><?php echo $receta['largo_unidad_lote'] ?> metros/unidad</span>
                                </div>
                         <div class="form-group col-3">
                         <label for="spanrecetalargouni" class="font-weight-bold">Largo por unidad esperado:</label>
                                <span class="input-group-text recetalargoporunidadesperado" id="spanrecetalargouni"><?php echo $receta['largo_unidad_esperado'] ?> metros/unidad</span>
                                </div>
                              </div>
                      <br>
              <h5>Producto terminado</h5>
              <hr>
                                 <div class="row">
                           <div class="form-group col-3">
                         <label for="spanrecetapesouni" class="font-weight-bold">Peso por unidad lote:</label>
                                <span class="input-group-text recetapesoporunidad" id="spanrecetapesouni"><?php echo $receta['peso_unidad_lote'] ?> kilos/unidad</span>
                                </div>
                                 <div class="form-group col-3">
                         <label for="spanrecetapesouni" class="font-weight-bold">Peso por unidad esperado:</label>
                                <span class="input-group-text recetapesoporunidadesperado" id="spanrecetapesouni"><?php echo $receta['peso_unidad_esperado'] ?> kilos/unidad</span>
                                </div>
        				</div>
     		<br>
               		<button type="button" class="btn btn-warning" id="Imprimirreceta">Imprimir receta</button> 
      			</div>



  <div class="modal fade" id="ConfirmarEstadoReceta" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirmar estado</h5>
        </div>
        <div class="modal-body">
		
		  <p>Usted está a punto de <a class="accion"></a> esta receta.</p>

          <p>¿Confirma que desea <a class="accion"></a> esta receta?</p>

        </div>
        <div class="modal-footer">
   			<button type="button" class="btn btn-success btn-lg" id="confirmar">Sí</button>
          <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">No</button>
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


<?php

}

?>

<script>
  
var accion;

var url;

var url1;

$("#botonCambiarEstado").on( "click", function() {

$('#ConfirmarEstadoReceta').modal('show')});

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

})

</script>

</body>
</html>