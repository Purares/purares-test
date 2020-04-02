
<!DOCTYPE html>
<html>
<head>
  <title>Nueva Desposte</title>
</head>
<body>

<?php

$carnes=ControladorFormularios::ctrListaCarnes();

$proveedores=ControladorFormularios::ctrListaProveedores();


?>

<div class="container">
           <br>
            <h2>Agregar desposte</h2>
            <hr>
                          <br>
      <form method="post" class="needs-validation" id="formnuevodesposte">
                     <div class="row">
    <div class="input-group col-6"> 
             <div class="input-group-prepend">
                    <span class="input-group-text">Proveedor:</span>
                  </div>
              <select class="custom-select" name="proveedorAltaDesposte" id="NombreProveedor" required>
                        <option value="">Seleccione el proveedor</option>
    
    <?php

    if ($proveedores) {

foreach($proveedores as $proveedor){

  echo '<option value="' . $proveedor["id_proveedor"] . '">' . $proveedor["nombre"] . '</option>';
}}
else{

echo $proveedores;

};?>
                               </select>
                             <div class="invalid-feedback">
                                    Seleccione el proveedor
                                    </div>
              </div>
                            <div class="input-group col-6"> 
             <div class="input-group-prepend">
                    <span class="input-group-text">N° de Remito:</span>
                  </div>
                    <input type="text" class="form-control text-center" id="NumeroRemito" name="nroRemitoAltaDesposte" placeholder="Ingrese el número de remito" required>
                             <div class="invalid-feedback">
                                    Ingrese un número de remito
                                    </div>
              </div>
               </div>
               <br>
               <hr>
               <br>

         <div class="row">
              
                     <div class="input-group col-6"> 
             <div class="input-group-prepend">
                    <span class="input-group-text">Cantidad de medias reses:</span>
                  </div>
                    <input type="number" min=0 step=1 class="form-control text-right" name="unidadesAltaDesposte" id="unidadesDesposte" placeholder="Ingrese la cantidad" required>
                             <div class="invalid-feedback">
                            Ingrese la cantidad de medias reses
                                    </div>
              </div>


             <div class="input-group col-6"> 
             <div class="input-group-prepend">
                    <span class="input-group-text">Peso total:</span>
                  </div>
                    <input type="number" min=0 step=0.01  class="form-control text-right" name="pesoTotalAltaDesposte" id="pesoTotalDesposte" placeholder="Peso total" required>
                              <div class="input-group-append">
                  <span class="input-group-text">Kilos</span><button type="button" class="btn btn-warning text-white font-weight-bold" data-toggle="tooltip" data-placement="top" title="Ingrese el peso total que figura en el remito">
  ?
</button>
                            </div>
                             <div class="invalid-feedback">
                                     Ingresa el peso total
                                    </div>
                       </div>

          </div>
          <br>
          <div class="row">


              <div class="input-group col-6"> 
             <div class="input-group-prepend">
                    <span class="input-group-text">Merma inicial:</span>
                  </div>
                    <input type="number" min=0 step=0.01 max=100  class="form-control text-right" name="mermaInicialAltaDesposte" id="mermainicialdesposte" placeholder="Merma" required>
                              <div class="input-group-append">
                  <span class="input-group-text">%</span><button type="button" class="btn btn-warning text-white font-weight-bold" data-toggle="tooltip" data-placement="top" title="Ingrese la merma obtenida antes del desposte">
  ?
</button>
                            </div>
                             <div class="invalid-feedback">
                                     Ingresa el porcentaje de merma inicial
                                    </div>
                       </div>  
                                    <div class="input-group col-6">
                   <div class="input-group-prepend">
                    <span class="input-group-text">Fecha de desposte:</span>
                  </div>
                          <div class="input-group-append">
                <input type="date" id="fechaDesposte" name="fechaDesposteAltaDesposte" required>
                             <div class="invalid-feedback">
                                    Ingresa la fecha de deposte
                                    </div>
                </div>
                 </div>

              </div>
              <br>
                <br>
              <h5>Complete la cantidad de carnes despostadas:</h5>
              <hr>
              <div class="container">
                 <div class="col-6">          
                  <table class="table table-sm table-hover">
                <thead>
                    <tr>
                      <th scope="col" class="text-center text-white bg-dark">ID</th>
                                <th scope="col" class="text-white bg-dark">Carne</th>
                      <th scope="col" class="text-center text-white bg-dark">Cantidad</th>
                    </tr> 
                  </thead>
                <tbody id="TablaCarnesDesposte">
              
<?php

foreach($carnes as $carne){

  echo '<tr><td scope="col" class="text-center" width="15%">' . $carne[0] . '<input type="hidden" name="idCarneAltaDesposte[]" value="' . $carne[0] . '"></td><td scope="col"  width="45%">' . $carne[1] . '<input type="hidden" class="nomcarne" value="' . $carne[1] . '"></td><td scope="col"  width="40%"><div class="input-group"><input type="number" min=0 step=0.0001 name="cantidadAltaDesposte[]" class="form-control text-right cantcarne" placeholder="Cantidad"><div class="input-group-append"><span class="input-group-text"><a class="unitcarne">'. $carne[2] . '</a></span></div></div></td></tr>';

}

?>
                </tbody>
            </table>
          </div>
          </div>
                        <h5>Descripción</h5>
              <hr>
              <textarea class="form-control" style="min-width: 100%" name="descripcionAltaDesposte" id="descripcionDesposte" placeholder="..." required></textarea>
                             <div class="invalid-feedback">
                                    Ingrese una descripción
                                    </div>
              
            
              <br>
                  <button type="button" class="btn btn-success" id="BotonAgregarDesposte" data-toggle="modal" data-target="#ConfirmarNuevoDesposte">Agregar desposte</button>

            </div>


  <!-- ConfirmarNuevaReceta -->
  <div class="modal fade" id="ConfirmarNuevoDesposte" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirmar Nuevo desposte</h5>
        </div>
        <div class="modal-body">
          <p>Usted está a punto de cargar el desposte con numero de remito <a class="numero"></a> del proveedor <a class="proveedor"></a>, con fecha <a class="fecha"></a>.</p>

          <p>Son <a class="mediasreses"></a> medias reses con un peso total de <a class="pesototal"></a> kilos y una merma inicial de <a class="mermainicial"></a>%</p>

          <p>La cantidad de carne del desposte será:</p>

           <div class="container">
          <table class="table table-hover">
            <br>
            <thead>
            <tr><th scope="col">Carnes</th><th scope="col">Cantidad</th><th scope="col">Unidad</th></tr>
            </thead>
            <tbody id="tablaconfirmarcarne">
              
            </tbody>
          </table>
          <br>
          <p>Tiene la siguiente descripcion:</p>

          <p><a class="descripcion"></a>.</p>
        </div>
            <br>
          <p>¿Confirma que desea CARGAR ESTE DESPOSTE?</p>
        </div>
        <div class="modal-footer">
          <button type="button"  class="btn btn-success" id="botonconfirmaragregardesposte">Sí, cargar desposte</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">No, volver a atrás</button>
        </div>
      </div>
    </div>
  </div>

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
          <a type="button" class="btn btn-info" id="botonaceptarnuevodesposte" onclick="location.reload();">Aceptar</a>
        </div>
      </div>
    </div>
  </div>


<script>

  $('#ConfirmarNuevoDesposte').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget);
var modal = $(this)
completarmodaldesposte()
function completarmodaldesposte(){             
                                  var numeroremito=$('#NumeroRemito').val()
                                      nombreproveedor=$('#NombreProveedor').val(),
                                      fechadesbaste=$('#fechaDesposte').val()
                                      unidades=$('#unidadesDesposte').val()
                                      pesototal=$('#pesoTotalDesposte').val()
                                      mermainicial=$('#mermainicialdesposte').val()
                                      descripcion=$('#descripcionDesposte').val()

                                      var nombrecarnes = [];
                                      cantidadcarnes=[];
                                      unidadcarnes=[];

                                      $('.trcarne').remove();

                                      $('.nomcarne').each(function(){
                                        nombrecarnes.push($(this).val());
                                      })
                                       $('.cantcarne').each(function(){
                                        cantidadcarnes.push($(this).val());
                                      })
                                         $('.unitcarne').each(function(){
                                        unidadcarnes.push($(this).text());
                                      })



                                       
modal.find('.numero').text('' + numeroremito);

modal.find('.proveedor').text('' + nombreproveedor);

modal.find('.fecha').text('' + fechadesbaste);

modal.find('.mediasreses').text('' + unidades);

modal.find('.pesototal').text('' + pesototal);

modal.find('.mermainicial').text('' + mermainicial);

modal.find('.descripcion').text('' + descripcion);

for (var i=0; i<=nombrecarnes.length-1;i++){
  
  modal.find('#tablaconfirmarcarne').append($('<tr class="trcarne"><td scope="col">' + nombrecarnes[i] +'</td><td scope="col" class="text-right">'+ cantidadcarnes[i] + '</td><td scope="col">' + unidadcarnes[i]+ '</td></tr>'))

  }}});


// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      var button= document.getElementById('BotonAgregarDesposte');
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

$(document).ready(function(){

 $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})   


})

$(document).ready( function() {   // Esta parte del código se ejecutará automáticamente cuando la página esté lista.
    $("#botonconfirmaragregardesposte").click( function() {     // Con esto establecemos la acción por defecto de nuestro botón de enviar.
                           
       $.post("datos.php",$("#formnuevodesposte").serialize(),function(respuestacod1){
       // alert(respuestacod1)
                          //alert(respuestacod)
//console.log(respuestacod1);

                if(respuestacod1.validacion_ == "OK"){
                  $('#ConfirmarNuevoDesposte').modal('hide')
                    var modal=$('#MensajeConfirmacion').modal('show')
                  modal.find('.modal-body').empty()
                  modal.find('.modal-body').html(
                    '<div class="alert alert-success" role="alert"><h4 class="alert-heading">Desposte agregado</h4><p>Usted ha agregado el nuevo desposte correctamente. El id del nuevo desposte es <a id="id_nuevodesposte"></a></p><hr></div>')
                  modal.find("#id_nuevodesposte").text(respuestacod1.idDesposte_)
                 var link="index.php?pagina=detalleDesposte&idDesposteVerDetalles="+respuestacod1.idDesposte_+"&estado=0"
                 modal.find('#botonaceptarnuevodesposte').unbind('click');
                  modal.find('#botonaceptarnuevodesposte').attr("href", link)

                } else {
                    $('#ConfirmarNuevoDesposte').modal('hide')
                    var modal=$('#MensajeConfirmacion').modal('show')
           modal.find('.modal-body').empty()
                  modal.find('.modal-body').html(
                    '<div class="alert alert-danger" role="alert"><h4 class="alert-heading">Error</h4><p>Ha ocurrido un error al intentar agregar el desposte. <a id="erroragregardesposte"></a></p><hr></div>')
                   modal.find('#erroragregardesposte').empty()
                  modal.find('#erroragregardesposte').html(respuestacod1.validacion_)

                }
            },"json");
  
    });    
});


</script>

</body>
</html>


