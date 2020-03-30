<!DOCTYPE html>
<html>
<head>
	<title>Detalle compra</title>
</head>
<body>

<?php

$detalleCompra=ControladorFormularios::ctrDetalleCompra();

$detalleinsumos=ControladorFormularios::ctrInsumosReceta();

foreach ($detalleCompra as $compra) {


?>


<div class="container">
	<br>
  				<div class="d-flex">
  					<div class="mr-auto">
  					<h4>Compra ID <a class="idcompra"><?php echo $_GET['idCompra'] ?></a> "Numero de remito <a class="nro_remito"><?php echo $_GET['nro_remito'] ?></a>" <span class="medalla"><?php if ($_GET['estado']==1) {echo '     <span class="badge badge-success medal">Activa</span>';}else{echo '<span class="badge badge-danger medal">Desactivada</span>';}?>
					</span>
  				</h4>
  					</div>
  					<div>
  						<div class="boton">
  						<?php if ($_GET['estado']==1) {echo '<button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#ConfirmarEstadoCompra" data-accion="desactivar" id="botonCambiarEstado">Anular compra</button>';}?>
  						</div>
  					</div>	
  					<br>
              </div>
                  <div class="row">
                            <div class="form-group col-6">
                         <label for="spannumeroremito">Número de remito:</label>
                                <span class="input-group-text numeroremito" id="spannumeroremito"><?php echo $_GET['nro_remito'] ?></span>
                                </div>
                       <div class="form-group col-4">
                         <label for="spancompraproveedor">Proveedor:</label>
                                <span class="input-group-text compraproveedor" id="spancompraproveedor"><?php echo $compra['proveedor'] ?> %</span>
                                </div>
        				</div>
                    <div class="row">
                            <div class="form-group col-4">
                         <label for="spanfechacompra">Fecha de compra:</label>
                                <span class="input-group-text fechacompra" id="spanfechacompra"><?php echo $compra['fecha_compra'] ?></span>
                                </div>
                            <div class="form-group col-4">
                         <label for="spanfechadealta">Fecha de alta:</label>
                                <span class="input-group-text fechaalta" id="spanfechadealta"><?php echo $compra['fecha_alta'] ?></span>
                                </div>
                     <div class="form-group col-4">
                         <label for="spancomprausuarioalta">Usuario que dió de alta:</label>
                                <span class="input-group-text comprausuarioalta" id="spancomprausuarioalta"><?php echo $compra['usuario_alta'] ?> %</span>
                                </div>
                    </div>
                    <br>
                    <p>Insumos de la compra</p>
                        <table class="table table-hover table-bordered table-sm">
    						<thead class="thead-light">
        						<tr>
           							<th scope="col">ID</th>
                                    <th scope="col">Insumo</th>
                                    <th scope="col" class="text-right">Cantidad</th>
           							<th scope="col">Unidad</th>
        						</tr>
      						</thead>
  							<tbody>
<?php

foreach ($detalleinsumos as $insumo) {

echo '<tr><td scope="col">' . $insumo[1] . '</td><td scope="col">' . $insumo[2] . '</td><td scope="col" class="text-right">' . $insumo[3] . '</td><td scope="col">' . $insumo[4] . '</td></tr>';

};
?>
  								
  							</tbody>
					</table>
                    <br>
                      <div class="row">
                     <div class="form-group col-6">
                         <label for="spanrecetadiasprodu">Días de producción:</label>
                                <span class="input-group-text recetadiasproduccion" id="spanrecetadiasprodu"><?php echo $receta['dias_produccion'] ?> días</span>
                                </div>
                            <div class="form-group col-6">
                         <label for="spanrecetadiasven">Días de vencimiento:</label>
                                <span class="input-group-text recetadiasvencimiento" id="spanrecetadiasven"><?php echo $receta['dias_vencimiento'] ?> días</span>
                                </div>
        				</div>
                           <div class="row">
                     <div class="form-group col-6">
                         <label for="spanrecetalargouni">Largo por unidad lote:</label>
                                <span class="input-group-text recetalargoporunidad" id="spanrecetalargouni"><?php echo $receta['largo_unidad_lote'] ?> cm/unidad</span>
                                </div>
                         <div class="form-group col-6">
                         <label for="spanrecetalargouni">Largo por unidad esperado:</label>
                                <span class="input-group-text recetalargoporunidadesperado" id="spanrecetalargouni"><?php echo $receta['largo_unidad_esperado'] ?> cm/unidad</span>
                                </div>
                              </div>
                                 <div class="row">
                           <div class="form-group col-6">
                         <label for="spanrecetapesouni">Peso por unidad lote:</label>
                                <span class="input-group-text recetapesoporunidad" id="spanrecetapesouni"><?php echo $receta['peso_unidad_lote'] ?> gramos/unidad</span>
                                </div>
                                 <div class="form-group col-6">
                         <label for="spanrecetapesouni">Peso por unidad esperado:</label>
                                <span class="input-group-text recetapesoporunidadesperado" id="spanrecetapesouni"><?php echo $receta['peso_unidad_esperado'] ?> gramos/unidad</span>
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