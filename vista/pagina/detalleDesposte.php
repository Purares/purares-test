<!DOCTYPE html>
<html>
<head>
	<title>Detalle desposte</title>
</head>
<body>

<?php

$detalleDesbastes=ControladorFormularios::ctrDetalleDesposte();

$detallecarnesdesbaste=ControladorFormularios::ctrCarnesDesposte();

$nuevo_movcarne=ControladorFormularios::ctrMovCarne();


foreach ($detalleDesbastes as $detalleDesbaste) {

?>


<div class="container">
	<br>
  				<div class="d-flex">
  					<div class="mr-auto">
  					<h4>Desposte ID <a class="iddesbaste"><?php echo $_GET['idDesposteVerDetalles'] ?></a> <span class="medalla"><?php if ($_GET['estado']==0) {echo '     <span class="badge badge-success medal">Activo</span>';}else{echo '<span class="badge badge-danger medal">Anulado</span>';}?>
					</span>
  				</h4>
  					</div>
  					<div>
  						<div class="boton">
  						<?php if ($_GET['estado']==0) {echo '<button type="button" class="btn btn-danger btn-lg" id="botonAnularDesbaste">Anular Desposte</button>';};?>
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
                    <p>Carnes obtenidas en el desposte:</p>
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

echo '<tr><td scope="col">' . $detallecarnedesbaste["id_carne"] . '</td><td scope="col">' . $detallecarnedesbaste["carne"] . '</td><td scope="col" class="text-right">' . $detallecarnedesbaste["qObtenido"] . '</td><td scope="col">' . $detallecarnedesbaste["udm"] . '</td><td scope="col" class="text-right">' . $detallecarnedesbaste["stockactual"] . '</td><td scope="col">' . $detallecarnedesbaste["udm"] . '</td><td scope="col"><button class="btn btn-secondary btn-sm botonmovimiento" data-toggle="modal" data-target="#NuevoMovimientoCarne" data-idcarne="'. $detallecarnedesbaste["id_carne"] .'" data-nombrecarne="'.$detallecarnedesbaste["carne"].'" data-unidadcarne="'.$detallecarnedesbaste["udm"] .'" data-iddesposteventana="'. $_GET["idDesposteVerDetalles"]. '">Nuevo movimiento</button></td></tr>';

}
?>
  								
  							</tbody>
					</table>
     		<br>
               		<button type="button" class="btn btn-warning" id="Imprimirdesbaste">Imprimir desposte</button> 
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

   <div class="modal fade" id="NuevoMovimientoCarne" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
        	<h3>Nuevo moivimiento Carne ID <a class="id_carne_movimiento"></a> "<a class="nombre_carne_movimiento"></a>"</h3>
    	</div>
        <div class="modal-body">


 <form method="post" class="needs-validation">

        			<input type="hidden" id="input_id_carne" name="idCarneMovimientoCarne">
		
		              <div class="input-group">
               <div class="input-group-prepend">
                     <span class="input-group-text">Movimiento:</span>
                </div>
                <input type="hidden" name="idDesposteMovimientoCarne" id="id_desposte_ventana">
                    <select class="custom-select" id="cuentasmovimientoCarne" name="idCuentaMovimientoCarne" required>
                    </select>
                     <div class="invalid-feedback">
                                    Seleccione el tipo de movimiento
                                    </div>
              </div>
              <br>
              <div class="input-group"> 
                    <div class="input-group-prepend">
                    <span class="input-group-text">Cantidad:</span>
                  </div>
                    <input type="number" min=0 step=0.0001 class="form-control text-right" id="cantidadMovCarne" name="cantidadMovimientoCarne" placeholder="Ingrese la cantidad" required>
                  <div class="input-group-append">
                  <span class="input-group-text unidadMovimimientoCarne"></span>
              </div>
                <div class="invalid-feedback">
                                    Ingrese la cantidad
                                    </div>
                </div>
                <br>
              <div class="input-group"> 
                    <div class="input-group-prepend">
                    <span class="input-group-text">Descripción:</span>
                  </div>
                    <input type="text" class="form-control text-right" name="descripcionMovimientoCarne" id="descripcionMovCarne" placeholder="Describa" required>
                     <div class="invalid-feedback">
                                    Ingrese una descripción
                                    </div>
                </div>

                <br>
        </div>
        <div class="modal-footer">
        
	      <button type="button" class="btn btn-success" data-toggle="modal" id="botonAgregarMovCarne" data-target="#ConfirmarMovCarne">Cargar Movimiento</button> 

        </div>
      </div>
    </div>
  </div>

    <!-- ConfirmarMovimientoInsumo -->
  <div class="modal fade" id="ConfirmarMovCarne" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirmar Movimiento Carne</h5>
        </div>
        <div class="modal-body">
          <p>Usted va a cargar el movimiento <a class="movimiento"></a> de <a class="cantidad"></a> <a class="unidad"> </a> para la carne <a class="nombremodal"></a>.

          <p>La descripción será la siguiente: <p><a class="descripcion"></a>.</p></p>

          <p>¿Confirma que desea CARGAR ESTE MOVIMIENTO DE CARNE?</p>
        </div>
        <div class="modal-footer">
           <button type="submit"  class="btn btn-success">Sí, cargar movimiento de carne</button>
             <button type="button" class="btn btn-danger" data-dismiss="modal">No, descartar movimiento</button>
      </div>
    </div>

<script>
	
	
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      var button= document.getElementById('botonAgregarMovCarne');
      button.addEventListener('click', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();

</script>


  </div>

</form>

<script>

	var id_desbaste=$('.iddesbaste').text();

  
$("#botonAnularDesbaste").on( "click", function() {

    $.ajax({
                type:'POST',
                url:'datos.php',
       			data:{idDesposteVerDetalles: id_desbaste,motivoAnulacionDesposte:""},
                success:function(anulacion){
                      
                      if (anulacion=="0") {                

                         $('#AnularDesbaste').modal('show')
                          var modal = $('#AnularDesbaste')
                          modal.find('.modal-body').html('<form method="post"><div class="form-group"><label for="spanrecetanombre">Describa el motivo de anulación del desposte:</label><div class="input-group"><input type="text" class="form-control text-right" name="motivoAnulacionDesposte" id="descripcionanulacion" placeholder="Describa" required><div class="invalid-feedback">Debe escribir un motivo de anulación del desposte.</div></div><br><button type="button" id="botonanularventana" class="btn btn-danger" onclick=enviamotivo()>Anular desposte</button></form>')

                  }else{


                         $('#AnularDesbaste').modal('show')
                          var modal = $('#AnularDesbaste')
                          modal.find('.modal-body').html(anulacion)

                  }
                //alert('activo'+html);
                //$('#AnularDesbaste').modal('show')
               // var modal = $('#AnularDesbaste')
               // modal.find('.modal-body').html(anulacion)
      
}})})


function enviamotivo(){


alert($('#descripcionanulacion').val())
alert($('.iddesbaste').text())

        //       $('#AnularDesbaste').modal('hide')

     // $('#AnularDesbaste').modal('hide')
     $.ajax({
                type:'POST',
                url:'datos.php',
                data:{idDesposteVerDetalles: id_desbaste, motivoAnulacionDesposte:$('#descripcionanulacion').val()},
                success:function(respuesta){

                  $('#AnularDesbaste').modal('show')
                  var modal = $('#AnularDesbaste')
                  modal.find('.modal-body').html(respuesta)
                }})
 //     alert("ajax no falló")

    //$('#descripcionanulacion').val();
    //$('.iddesbaste').text():

}

$('#NuevoMovimientoCarne').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget);// Button that triggered the modal
var idcarne = button.data('idcarne')
var iddesposte=button.data('iddesposteventana')
var nombrecarne= button.data('nombrecarne')
var unidadcarne= button.data('unidadcarne')
var modal = $(this)
modal.find('.id_carne_movimiento').text('' + idcarne);
$('#input_id_carne').val(idcarne);
$('#id_desposte_ventana').val(iddesposte);
modal.find('.nombre_carne_movimiento').text('' + nombrecarne);
modal.find('.unidadMovimimientoCarne').text('' + unidadcarne);

$.ajax({
                type:'POST',
                url:'datos.php',
                data:{funcion:"'ActualizarCarne'"},
                success:function(html){

                  alert(html)

                $('#cuentasmovimientoCarne').append('<option value="">Seleccione el tipo de movimiento</option>'+html)

                }



})






})




$('#ConfirmarMovCarne').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget);
var modal = $(this)
completarmodalmovcarne()
function completarmodalmovcarne(){             
                                  var movimiento=$('#cuentasmovimientoCarne option:selected').text()
                                      cantidad=$('#cantidadMovCarne').val()
                                      unidad=$('.unidadMovimimientoCarne').text()
                                      descripcion=$('#descripcionMovCarne').val()
                                      nombre=$('.nombre_carne_movimiento').text()              
                                      

modal.find('.movimiento').text('' + movimiento);
modal.find('.unidad').text('' + unidad);
modal.find('.cantidad').text('' + cantidad);
modal.find('.descripcion').text('' + descripcion);
modal.find('.nombremodal').text('' + nombre);

  }})
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