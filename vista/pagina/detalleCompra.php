<!DOCTYPE html>
<html>
<head>
	<title>Detalle compra</title>
</head>
<body>

<?php

$detalleCompra=ControladorFormularios::ctrDetalleCompra();

$detalleCompraInsumos=ControladorFormularios::ctrDetalleCompraInsumos();

foreach ($detalleCompra as $compra) {


?>


<div class="container">
	<br>
  				<div class="d-flex">
  					<div class="mr-auto">
  					<h4>Compra ID <a class="idcompra"><?php echo $_GET['idCompra'] ?></a> "Numero de remito <a class="nro_remito"><?php echo $_GET['nroRemito'] ?></a>" <span class="medalla"><?php if ($_GET['estado']==0) {echo '     <span class="badge badge-success medal">Activa</span>';}else{echo '<span class="badge badge-danger medal">Desactivada</span>';}?>
					</span>
  				</h4>
  					</div>
  					<div>
  						<div class="boton">
  						<?php if ($_GET['estado']==0) {echo '<button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#ConfirmarEstadoCompra" data-accion="anular" id="botonCambiarEstado">Anular compra</button>';}?>
  						</div>
  					</div>	
  					<br>
              </div>
                  <div class="row">
                            <div class="form-group col-6">
                         <label for="spannumeroremito">Número de remito:</label>
                                <span class="input-group-text numeroremito" id="spannumeroremito"><?php echo $_GET['nroRemito'] ?></span>
                                </div>
                       <div class="form-group col-6">
                         <label for="spancompraproveedor">Proveedor:</label>
                                <span class="input-group-text compraproveedor" id="spancompraproveedor"><?php echo $compra['proveedor'] ?></span>
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
                                <span class="input-group-text comprausuarioalta" id="spancomprausuarioalta"><?php echo $compra['usuario_alta'] ?></span>
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
        						</tr>
      						</thead>
  							<tbody>
<?php

foreach ($detalleCompraInsumos as $insumo) {

echo '<tr><td scope="col">' . $insumo[0] . '</td><td scope="col">' . $insumo[1] . '</td><td scope="col">' . $insumo[2] .' ' . $insumo[3].'</td></tr>';

};
?>
  								
  							</tbody>
					</table>
                    <br>
                  
     		<br>
               		<button type="button" class="btn btn-warning" id="Imprimirreceta">Imprimir receta</button> 
      			</div>



  <div class="modal fade" id="ConfirmarEstadoCompra" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirmar estado</h5>
        </div>
        <div class="modal-body">
		
		  <p>Usted está a punto de <a class="accion"></a> esta compra.</p>

          <p>¿Confirma que desea <a class="accion"></a> esta compra?</p>

        </div>
        <div class="modal-footer">
   			<button type="button" class="btn btn-success btn-lg" id="confirmar">Sí</button>
          <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">No</button>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="AnularCompra" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Anulación Compra</h5>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer anular">
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
          <h5 class="modal-title">Compra <a class="confirmacion"></a></h5>
        </div>
        </div>
        <div class="modal-footer">
   			<button type="button" class="btn btn-secondary btn-lg" id="aceptar">Aceptar</button>
        </div>
      </div>
    </div>
  </div>

     <div class="modal fade" id="Mensaje" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"></h5>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
             <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="location.reload();">Cerrar</button>
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

$('#ConfirmarEstadoCompra').modal('show')});

$('#ConfirmarEstadoCompra').on('show.bs.modal', function (event) {
var button = $('#botonCambiarEstado'); // Button that triggered the modal
accion = button.data('accion')
var modal = $(this)
modal.find('.accion').text('' + accion);


  
$("#confirmar").on( "click", function() {

    $.ajax({
                type:'POST',
                url:'datos.php',
                data:{idCompraDetalle: $('.idcompra').text(),motivoAnulacionCompra: 0},
                success:function(anulacion){

                  alert(anduvo)
                      
                      if (anulacion=="OK") {                

                         $('#AnularCompra').modal('show')
                          var modal = $('#AnularDesbaste')
                          modal.find('.modal-body').html('<form method="post"><div class="form-group"><label>Describa el motivo de anulación de la compra:</label><div class="input-group"><input type="text" class="form-control text-right" name="motivoAnulacionCompra" id="descripcionanulacioncompra" placeholder="Describa" required><div class="invalid-feedback">Debe escribir un motivo de anulación del desposte.</div></div><br><button type="button" id="botonanularventana" class="btn btn-danger" onclick=enviamotivo()>Anular desposte</button></form>')

                  }else{


                      $('#AnularDesbaste').modal('show')
                          var modal = $('#AnularDesbaste')
                          modal.find('.modal-body').html(anulacion)
                          modal.find('.modal-footer').html('<button type="button" class="btn btn-danger">Cerrar</button>')
                  }
                //alert('activo'+html);
                //$('#AnularDesbaste').modal('show')
               // var modal = $('#AnularDesbaste')
               // modal.find('.modal-body').html(anulacion)
      
}})})


function enviamotivo(){


//alert($('#descripcionanulacion').val())
//alert($('.iddesbaste').text())

        //       $('#AnularDesbaste').modal('hide')

     // $('#AnularDesbaste').modal('hide')
     $.ajax({
                type:'POST',
                url:'datos.php',
                data:{idCompraDetalle: $('.idcompra').text(), motivoAnulacionCompra:$('#descripcionanulacioncompra').val()},
                success:function(respuesta){

                  if(respuesta=="OK"){

                  $('#AnularCompra').modal('show')
                  var modal = $('#AnularCompra')
                  modal.find('.modal-body').html(respuesta)
                  modal.find('.anular').html('<button type="button" class="btn btn-danger" id="cerraranular">Cerrar</button>')

                  $("#cerraranular").on( "click", function() {

var url2=$(location).attr('href')
var url3=url2.replace("estado=0", "estado=1")

 $(location).attr('href',url3)
$('#Mensaje').modal('hide')
})

                        
}
                }})
 //     alert("ajax no falló")

    //$('#descripcionanulacion').val();
    //$('.iddesbaste').text():

}

})

</script>

</body>
</html>