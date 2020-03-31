<!DOCTYPE html>
<html>

<head>
	<title>Finalizar op</title>
</head>
<body>

	<div class="container">
<br>
  					<h2>Finalizar Orden de produccion ID <?php echo $_GET['idOrdenProdAlta_FinOP']; ?></h2>
    <br>          		
        		
        			<h5>Complete los datos para finalizar</h5>
              <hr>
        			<br>
       	<form method="post" class="needs-validation" id="formfinop">
  <input type="hidden" name="idOrdenProdAlta_FinOP" id="idopfin" value="<?php echo $_GET['idOrdenProdAlta_FinOP']; ?>">
            <div class="row">
          				<div class="input-group col-md-6">	
          					<div class="input-group-prepend">
         						<span class="input-group-text">Producto obtenido:</span>
         					</div>
        						<input type="number" min=0 step=0.0001 class="form-control text-center" name="productoObtenido_FinOp" id="productoobtenido" placeholder="Ingrese la cantidad" required>
                     <div class="input-group-append">
                  <span class="input-group-text">Kilos</span><button type="button" class="btn btn-warning text-white font-weight-bold" data-toggle="tooltip" data-placement="top" title="Ingrese el peso total en kilogramos de produto obtenido">
  ?
</button>
              </div>
                                    <div class="invalid-feedback">
                                    Ingrese la cantidad
                                    </div>
                  </div>
	<div class="input-group col-md-6">  
                    <div class="input-group-prepend">
                    <span class="input-group-text">Unidades obtenidas:</span>
                  </div>
                    <input type="number" min=0 step=1 class="form-control text-center" name="unidades_FinOP" id="unidadesobtenidas" placeholder="Ingrese la cantidad" required>
                      <div class="input-group-append">
                  <span class="input-group-text">Unidades</span><button type="button" class="btn btn-warning text-white font-weight-bold" data-toggle="tooltip" data-placement="top" title="Ingrese las unidades totales obtenidas">
  ?
</button>
              </div>
                       <div class="invalid-feedback">
                                    Ingrese la cantidad de unidades obtenidas
                                    </div>
                </div>
        			</div>
<br>
        <br>
              <h5>Complete los datos correspondientes a la medición y seguimiento:</h5>
              <hr>
              <br>
 
 <table class="table table-hover">
  <thead>
   <tr><th scope="col" class="text-white text-center bg-dark">#</th><th scope="col" class="text-white text-center bg-dark">PESO</th><th scope="col" class="text-white text-center bg-dark">RESPONSABLE</th><th scope="col" class="text-white text-center bg-dark">FECHA</th></tr>
 </thead>
 <tbody>

<?php

for ($i=1; $i <5 ; $i++) { 

echo '<td scope=col>'.$i.'</td><td scope=col><div class="input-group"><div class="input-group-prepend"><input type="number" min=0 step=0.0001 class="form-control input text-center pesos" name="MedicionesPeso_FinOP[]" placeholder="Ingrese el peso" required></div><div class="input-group-append "> <span class="input-group-text">Unidades</span></div></div></td><td scope=col><input type="text" class="form-control text-right responsables" name="MedicionesResponsable_FinOP[]" placeholder="Ingrese el responsable" required></td> <td scope=col> <input type="date" class="fechas" name="MedicionesFechaMedicion_FinOP[]" required></td> </tr>';

 };
 
?>  
    
 </tbody>
 </table>
  
           		<br>               
               		<button type="button" class="btn btn-danger" id="botonmodalfinalizarop"  data-toggle="modal" data-target="#ConfirmarFinalizarOp">Finalizar orden</button>
       	 	  </div> 



  <!-- ConfirmarNuevaReceta -->
  <div class="modal fade" id="ConfirmarFinalizarOp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirmar Finalización orden</h5>
        </div>
        <div class="modal-body">
          <p>Usted está a punto de finalizar la orden de producción ID <a class="idopfin"></a>.</p>

          <p>El producto obtenido es de <a class="productoobtenido"></a>, y se obtuvieron <a class="unidadesobtenidas"></a> unidades.</p>

          <p>Los datos de medición son los siguientes:</p>

          <div class="container">
          <table class="table table-hover">
            <thead>
            <tr><th scope="col">#</th><th scope="col">Peso</th><th scope="col">Responsable</th><th scope="col">Fecha</th></tr>
            </thead>
            <tbody id="tablaconfirmarop">
              
            </tbody>
          </table>
          </div>
            <br>
          <p>¿Confirma que desea cargar estos datos y FINALIZAR la ordeen?</p>
        </div>
        <div class="modal-footer">
          <button type="button"  class="btn btn-success" id="botonconfirmarfinop">Sí, finalizar orden</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">No, volver a atrás</button>
        </div>
      </div>
    </div>
  </div>

  <script>
  	

// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      var button= document.getElementById('botonmodalfinalizarop');
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

       </form>

  <!-- Mensaje confirmacion -->
  <div class="modal fade" id="MensajeConfirmacion" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-info" data-dismiss="modal" onclick="location.reload();">Aceptar</button>
        </div>
      </div>
    </div>
  </div>



<script>



$(document).ready( function() {   // Esta parte del código se ejecutará automáticamente cuando la página esté lista.
    $("#botonconfirmarfinop").click( function() {    // Con esto establecemos la acción por defecto de nuestro botón de enviar.
                              
       $.post("datos.php",$("#formfinop").serializeArray(),function(respuestacod){
                if(respuestacod == "OK"){
                  $('#ConfirmarFinalizarOp').modal('hide')
                    var modal=$('#MensajeConfirmacion').modal('show')
                  modal.find('.modal-body').empty()
                  modal.find('.modal-body').html(
                    '<div class="alert alert-success" role="alert"><h4 class="alert-heading">Orden Finalizada</h4><p>Usted ha finalizado la orden de produccion correctamente.</p><hr></div>')

                } else {
                    $('#ConfirmarFinalizarOp').modal('hide')
                    var modal=$('#MensajeConfirmacion').modal('show')
                  modal.find('.modal-body').empty()
                  modal.find('.modal-body').html(
                    '<div class="alert alert-danger" role="alert"><h4 class="alert-heading">Error</h4><p>Ha ocurrido un error al intentar finalizar la orden</p><hr><p class="mensajeerror"></p></div>')
                   modal.find('.mensajeerror').text(respuestacod)
                }
            },"json");
  
    });    
  
 $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})   
});



$('#ConfirmarFinalizarOp').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget);
var modal = $(this)
completarmodalfinalizarop()
function completarmodalfinalizarop(){             
                                  var idop=$('#idopfin').val()
                                        producto=$('#productoobtenido').val()
                                      unidadesobtenidas=$('#unidadesobtenidas').val()
                                    
                                      var pesos = [];
                                      responsables=[];
                                      fechas=[];

                                      $('.mediciones').remove();

                                      $('.pesos').each(function(){
                                        pesos.push($(this).val());
                                      })
                                       $('.responsables').each(function(){
                                        responsables.push($(this).val());
                                      })
                                         $('.fechas').each(function(){
                                        fechas.push($(this).val());
                                      })



 
modal.find('.idopfin').text('' + idop);                                      
modal.find('.productoobtenido').text('' + producto);
modal.find('.unidadesobtenidas').text('' + unidadesobtenidas);


for (var i=0; i<=pesos.length-1;i++){
  
  modal.find('#tablaconfirmarop').append($('<tr class="mediciones"><td scope="col">' + [i+1] +'</td><td scope="col">' + pesos[i] +'</td><td scope="col" class="text-right">'+ responsables[i] + '</td><td scope="col">' + fechas[i]+ '</tr>'))

  }}})



</script>
        
  
</body>
</html>


