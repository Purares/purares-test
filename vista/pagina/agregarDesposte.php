
<!DOCTYPE html>
<html>
<head>
  <title>Nueva Desposte</title>
</head>
<body>

<?php

$carnes=ControladorFormularios::ctrListaCarnes();

$nuevodesposte=ControladorFormularios::ctrCrearDesposte();


?>

<div class="container">
           <br>
            <h4>Nuevo Desposte</h4>
            <br>  
                          <h6>Complete los datos del nuevo desposte que desea agregar:</h6>
                          <br>
      <form method="post" class="needs-validation">
                     <div class="row">
                            <div class="form-group col-4">
                         <label for="NumeroRemito">Número de remito:</label>
                    <input type="text" class="form-control text-center" id="NumeroRemito" name="nroRemitoAltaDesposte" placeholder="Ingrese el número de remito" required>
                                   <div class="invalid-feedback">
                                   Ingrese el número de remito
                                    </div>
                                </div>
                             <div class="form-group col-4">
                           <label for="NombreProveedor">Proveedor:</label>
                    <input type="text" class="form-control text-center" id="NombreProveedor" name="proveedorAltaDesposte" placeholder="Ingrese el nombre del proveedor" required>
                                   <div class="invalid-feedback">
                                   Ingrese el nombre del proveedor del desposte
                                    </div>

                                </div>
                                    <div class="input-group col-4"> 
                  <label for="fechaDesbasteAltaDesposte">Fecha de desposte:</label>
                          <div class="input-group">
                <input type="date" id="fechaDesposte" name="fechaDesposteAltaDesposte" required>
                             <div class="invalid-feedback">
                                    Ingresa la fecha de deposte
                                    </div>
                </div>
                 </div>
                </div>
         <div class="row">
              <div class="input-group col-6"> 

                  <label for="unidadesAltaDesposte">Cantidad de medias reses:</label>
                     <div class="input-group">
                                <input type="number" min=0 step=1 class="form-control text-right" name="unidadesAltaDesposte" id="unidadesDesposte" placeholder="Ingrese la cantidad" required>
                                  <div class="input-group-append">
                  <span class="input-group-text">Medias reses</span>
                            </div>
                             <div class="invalid-feedback">
                                    Ingrese la cantidad de medias reses
                                    </div>
                       </div>        

      
                </div>
            <div class="input-group col-6"> 

               <label for="pesoTotalAltaDesposte">Peso total:</label>
                     <div class="input-group">
                                <input type="number" min=0 step=0.01  class="form-control text-right" name="pesoTotalAltaDesposte" id="pesoTotalDesposte" placeholder="Peso total" required>
                                  <div class="input-group-append">
                  <span class="input-group-text">Kilos</span>
                            </div>
                             <div class="invalid-feedback">
                                     Ingresa el peso total
                                    </div>
                       </div>        
            </div>
          </div>
              <br>
                
              <p>Complete la cantidad de carnes despostadas:</p>
              <div class="container">
                  <table class="table table-sm">
                <thead>
                    <tr>
                      <th scope="col">ID</th>
                                <th scope="col">Carne</th>
                      <th scope="col">Cantidad</th>
                    </tr> 
                  </thead>
                <tbody id="TablaCarnesDesposte">
              
<?php

foreach($carnes as $carne){

  echo '<tr><td scope="col">' . $carne[0] . '<input type="hidden" name="idCarneAltaDesposte[]" value="' . $carne[0] . '"></td><td scope="col">' . $carne[1] . '<input type="hidden" class="nomcarne" value="' . $carne[1] . '"></td><td scope="col"><div class="input-group"><input type="number" min=0 step=0.0001 name="cantidadAltaDesposte[]" class="form-control cantcarne" placeholder="Cantidad"><div class="input-group-append"><span class="input-group-text"><a class="unitcarne">'. $carne[2] . '</a></span></div></div></td></tr>';

}

?>
                </tbody>
            </table>
          </div>
          <br>
              <div class="row">
                 <div class="form-group col-12">
                     <label for="descripcionAltaDesposte">Descripción:</label>
                     <div class="input-group">
                                <input type="text" class="form-control text-right" name="descripcionAltaDesposte" id="descripcionDesposte" placeholder="Describa" required>
                             <div class="invalid-feedback">
                                    Ingrese una descripción
                                    </div>
                       </div>      
               </div>
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

          <p>Son <a class="mediasreses"></a> medias reses con un peso total de <a class="pesototal"></a> kilos.</p>

          <p>Tiene la siguiente descripcion:</p>

          <p><a class="descripcion"></a>.</p>

          <p>La cantidad de carne del desposte será:</p>

           <div class="container">
          <table class="table table-hover">
            <thead>
            <tr><th scope="col">Carnes</th><th scope="col">Cantidad</th><th scope="col">Unidad</th></tr>
            </thead>
            <tbody id="tablaconfirmarcarne">
              
            </tbody>
          </table>
        </div>
            <br>
          <p>¿Confirma que desea CARGAR ESTE DESPOSTE?</p>
        </div>
        <div class="modal-footer">
          <button type="submit"  class="btn btn-success">Sí, cargar desposte</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">No, volver a atrás</button>
        </div>
      </div>
    </div>
  </div>

</form>



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


</script>

</body>
</html>


