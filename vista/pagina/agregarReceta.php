
<!DOCTYPE html>
<html>
<head>
  <title>Nueva Receta</title>
</head>
<body>

<?php

$depositos=ControladorFormularios::ctrListaDepositos();

$recetas=ControladorFormularios::ctrListaRecetas();

$nueva_receta=ControladorFormularios::ctrCrearReceta();


?>

<div class="container">
           <br>
            <h4>Nueva Receta</h4>
            <br>  
                          <h6>Complete los datos de la nueva receta que desea agregar:</h6>
                          <br>
      <form method="post" class="needs-validation">
                     <div class="row">
                            <div class="form-group col-12">
                         <label for="NombreReceta">Nombre de la nueva receta:</label>
                    <input type="text" class="form-control text-center" id="NombreReceta" name="nombreCrearReceta" placeholder="Ingrese el nombre de la nueva receta" required>
                                   <div class="invalid-feedback">
                                   Ingrese el nombre de la nueva receta
                                    </div>
                                </div>
                  </div>
              <p>Complete los insumos necesarios para fabricar 100 kg de producto fresco:</p>
              <div class="container">
                  <table class="table table-sm">
                <thead>
                    <tr>
                      <th scope="col">Deposito</th>
                                <th scope="col">ID</th>
                      <th scope="col">Insumo</th>
                      <th scope="col">Cantidad</th>
                                <th scope="col">Unidad</th>
                      <th scope="col">Borrar</th>
                    </tr> 
                  </thead>
                <tbody id="TablaReceta">
                            <tr id="seleccioninsumos">
                        <td scope="col">
                          <select class="custom-select depo" name="depositoInsumoReceta">
                        <option value="">Seleccione el depósito</option>

<?php

foreach($depositos as $deposito){

  echo '<option value="' . $deposito["id_deposito"] . '">' . $deposito["nombre"] . '</option>';

};

?>
                          </select>
                        </td>
                        <td scope="col">
                          <a class="idinsumoselec"></a>
                        </td>
                        <td scope="col">
                          <select class="custom-select nomingre" name="idinsumoCrearReceta[]">
                                        <option value="0">Seleccione el insumo</option>
                                         <option value="1">Insumo1</option>
                          </select>
                        </td>
                        <td scope="col" colspan="2">
                          <div class="input-group"> 
                          <input type="number" min=0 step=0.0001 name="cantidadinsumoCrearReceta[]" class="form-control text-right cantingre" placeholder="Cantidad">
                              <div class="input-group-append">
                  <span class="input-group-text"><a class="unitingre">Unidad</a></span>
              </div>
                  </div>
                        </td>
                                    <td scope="col">
                                    <button type="button" class="btn btn-danger btn-sm borrar">Borrar</button>
                                     </td>
                    </tr> 
                </tbody>
            </table>
            <button type="button" id="BotonAgregarInsumoReceta" class="btn btn-secondary btn-sm">Agregar Insumo</button>
          </div>
          <br>
          <div class="row">
            <div class="input-group col-6"> 
             <div class="input-group-prepend">
                    <span class="input-group-text">Porcentaje de carne:</span>
                  </div>
                    <input type="number" min=0 step=0.01 max=100 class="form-control text-right" id="KilosCarne" name="porcentcarneCrearReceta" placeholder="Ingrese el porcentaje de carne" required>
                  <div class="input-group-append">
                  <span class="input-group-text">%</span>
              </div>
                             <div class="invalid-feedback">
                                    Ingrese la el porcentaje de carne que tendrá el paston
                                    </div>
              </div>
            <div class="input-group col-6"> 
                    <div class="input-group-prepend">
                    <span class="input-group-text">Merma esperada:</span>
                  </div>
                    <input type="number" min=0 step=0.01 max=99.99 class="form-control text-right" id="MermaEsperada" name="mermaCrearReceta" placeholder="Porcentaje esperado" required>
                  <div class="input-group-append">
                  <span class="input-group-text">%</span>
              </div>
                               <div class="invalid-feedback">
                                    Ingresa el porcentaje de merma esperado
                                    </div>
            </div>
          </div>
              <br>
              <div class="row">
                <div class="input-group col-6"> 
                    <div class="input-group-prepend">
                    <span class="input-group-text">Días de producción:</span>
                  </div>
                    <input type="number" min=0 class="form-control text-right" id="DiasProduccion" name="diasprodCrearReceta" placeholder="días" required>
                  <div class="input-group-append">
                  <span class="input-group-text">días</span>
              </div>
                             <div class="invalid-feedback">
                                    Ingresa la cantidad de dias que se requieren para producir
                                    </div>
                </div>
              <br>
                <div class="input-group col-6"> 
                            <div class="input-group-prepend">
                    <span class="input-group-text">Días para vencimiento:</span>
                  </div>
                    <input type="number" min=0 class="form-control text-right" id="DiasVencimiento" name="diasvencCrearReceta" placeholder="días" required>
                  <div class="input-group-append">
                  <span class="input-group-text">días</span>
              </div>
                           <div class="invalid-feedback">
                                    Ingrese la cantidad de dias que el producto es consumible.
                                    </div>     
               </div>
              </div>
              <br>
                    <div class="row">
                            <div class="form-group col-6">
                         <label for="largouniLoteCrearReceta">Largo por unidad lote en centímetros/unidad:</label>
                     <div class="input-group">
                                <input type="number" min=0 step=0.01 class="form-control text-right" name="largouniLoteCrearReceta" id="cmxunidad" placeholder="centímetros por unidad" required>
                                  <div class="input-group-append">
                  <span class="input-group-text">cm/unidad</span>
                            </div>
                             <div class="invalid-feedback">
                                    Ingrese el largo por unidad lote
                                    </div>
                       </div>         
                      </div>
                      <div class="form-group col-6">
                         <label for="largoUniEsperadoCrearReceta">Largo por unidad esperado en centímetros/unidad:</label>
                     <div class="input-group">
                                <input type="number" min=0 step=0.01 class="form-control text-right" name="largoUniEsperadoCrearReceta" id="cmxunidadesperado" placeholder="centímetros por unidad" required>
                                  <div class="input-group-append">
                  <span class="input-group-text">cm/unidad</span>
                            </div>
                             <div class="invalid-feedback">
                                    Ingrese el largo por unidad esperado
                                    </div>
                       </div>         
                      </div>
                    </div>
                    <div class="row">
                         <div class="form-group col-6">
                         <label for="pesouniLoteCrearReceta">Peso por unidad lote en gramos/unidad:</label>
                     <div class="input-group">
                    <input type="number" min=0 step=0.01 class="form-control text-right" name="pesouniLoteCrearReceta" id="gramosxunidad" placeholder="gramos por unidad" required>
                                  <div class="input-group-append">
                  <span class="input-group-text">gramos/unidad</span>
                            </div>
                               <div class="invalid-feedback">
                                    Ingrese el peso por unidad lote en gramos 
                                    </div>
                       </div>         
                      </div>
                    <div class="form-group col-6">
                         <label for="pesoUniEsperadoCrearReceta">Peso por unidad esperado en gramos/unidad:</label>
                     <div class="input-group">
                    <input type="text" class="form-control text-right" name="pesoUniEsperadoCrearReceta" id="gramosxunidadesperado" placeholder="" disabled>
                                  <div class="input-group-append">
                  <span class="input-group-text">gramos/unidad</span>
                            </div>
                       </div>         
                      </div>
                        </div>
                          <div class="row">
                                <div class="form-group col-6">
                         <label for="uFinalXuCrearReceta">Unidades finales por unidad producida:</label>
                     <div class="input-group">
                    <input type="number" min=0 step=1 class="form-control text-right" name="uFinalXuCrearReceta" id="unidadesfinalesxunidad" placeholder="Unidades finales" required>
                                  <div class="input-group-append">
                  <span class="input-group-text">Unidades</span>
                            </div>
                               <div class="invalid-feedback">
                                    Ingrese la cantidad de unidades finales por unidad producida 
                                    </div>
                       </div>         
                      </div>
                           <div class="input-group col-6"> 
                     <label for="descripcionCrearReceta">Descripción:</label>
                     <div class="input-group">
                    <input type="text" class="form-control text-right" name="descripcionCrearReceta" id="descripcionreceta" placeholder="Describa">
                       </div>  
                </div>
              </div>
  
                     <br>
                  <button type="button" class="btn btn-success" id="BotonAgregarReceta" data-toggle="modal" data-target="#ConfirmarNuevaReceta">Agregar receta</button>
            </div>

  <!-- ConfirmarNuevaReceta -->
  <div class="modal fade" id="ConfirmarNuevaReceta" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirmar Nueva receta</h5>
        </div>
        <div class="modal-body">
          <p>Usted está a punto de cargar la receta <a class="nombre"></a>.</p>

          <p>Utilizará <a class="kilos"></a> % de carne sobre el peso del pastón, con <a class="merma"></a>% de merma esperada.</p>

          <p>Requerirá <a class="diasprodu"></a> días de producción y <a class="diasvenc"></a> días para su vencimiento.</p>

          <p>Tiene un largo por unidad lote de <a class="largo"></a> centímetros y un largo por unidad esperado de <a class="largoesperado"></a> centímetros.

          <p>Tiene un peso por unidad lote de <a class="peso"></a> kilos y un peso por unidad esperado de  <a class="pesoesperado"></a> kilos .</p>

          <p>Tendrá la siguiente descripción:</p> 

          <p><a class="descripcion"></a>.</p>

          <p>La receta tendrá los siguientes ingredientes:</p>

          <div class="container">
          <table class="table table-hover">
            <thead>
            <tr><th scope="col">Ingredientes</th><th scope="col">Cantidad</th><th scope="col">Unidad</th></tr>
            </thead>
            <tbody id="tablaconfirmar">
              
            </tbody>
          </table>
          </div>
            <br>
          <p>¿Confirma que desea CARGAR ESTA RECETA?</p>
        </div>
        <div class="modal-footer">
          <button type="submit"  class="btn btn-success">Sí, cargar receta</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">No, volver a atrás</button>
        </div>
      </div>
    </div>
  </div>

       </form>


<script type="text/javascript">

$('#ConfirmarNuevaReceta').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget);
var modal = $(this)
completarmodalrecetas()
function completarmodalrecetas(){             
                                  var nombrereceta=$('#NombreReceta').val()
                                      unidadesfinalesxunidad=$('#unidadesfinalesxunidad').val()
                                      kiloscarne=$('#KilosCarne').val()
                                      descripcion=$('#descripcionreceta').val()
                                      mermaesperada=$('#MermaEsperada').val()
                                      diasproduccion=$('#DiasProduccion').val()
                                      diasvencimiento=$('#DiasVencimiento').val()
                                      gramosxunidad=$('#gramosxunidad').val()
                                      cmxunidad=$('#cmxunidad').val()
                                      gramosxunidadesperado=$('#gramosxunidadesperado').val()
                                      cmxunidadesperado=$('#cmxunidadesperado').val()

                                      var nombreingredientes = [];
                                      cantidadingredientes=[];
                                      unidadingredientes=[];

                                      $('.tringre').remove();

                                      $('.nomingre option:selected').each(function(){
                                        nombreingredientes.push($(this).text());
                                      })
                                       $('.cantingre').each(function(){
                                        cantidadingredientes.push($(this).val());
                                      })
                                         $('.unitingre').each(function(){
                                        unidadingredientes.push($(this).text());
                                      })



                                       
modal.find('.nombre').text('' + nombrereceta);
modal.find('.kilos').text('' + kiloscarne);
modal.find('.merma').text('' + mermaesperada);
modal.find('.diasprodu').text('' + diasproduccion);
modal.find('.diasvenc').text('' + diasvencimiento);
modal.find('.largo').text('' + gramosxunidad);
modal.find('.peso').text('' + cmxunidad);
modal.find('.largoesperado').text('' + gramosxunidadesperado);
modal.find('.pesoesperado').text('' + cmxunidadesperado);
modal.find('.descripcion').text('' + descripcion);
modal.find('.unidades finales').text('' + unidadesfinalesxunidad);


for (var i=0; i<=nombreingredientes.length-1;i++){
  
  modal.find('#tablaconfirmar').append($('<tr class="tringre"><td scope="col">' + nombreingredientes[i] +'</td><td scope="col" class="text-right">'+ cantidadingredientes[i] + '</td><td scope="col">' + unidadingredientes[i]+ '</tr>'))

  }}})

$('#BotonAgregarInsumoReceta').on('click', function (event) {

agregaringrediente();
function agregaringrediente() {

  $("#TablaReceta")
  .append
  (
      $('<tr>')
        .append
          (
           $('<td>').attr('scope','col')
          .append
          (
            $("<select class='custom-select'><option value=''>Seleccione el depósito</option>")

<?php

foreach($depositos as $deposito){

  echo '.append(`<option value="' . $deposito["id_deposito"] . '">' . $deposito["nombre"] . '</option>`)';

};

?>

              
            .attr('name','depositoInsumoReceta')
            .addClass('custom-select depo')

            ),
           
           $('<td>').attr('scope','col')
          .append
          (
            $('<a class="idinsumoselec"></a>')
            ),

            $('<td>').attr('scope','col')
          .append
          (
            
              $("<select class='custom-select nomingre' name='idinsumoCrearReceta[]'><option value='0'>Seleccione el insumo</option><option value='238'>Insumo1</option></select>")

            ),

           $('<td>').attr('scope','col').attr('colspan','2')
          .append
          (
            
              $("<div class='input-group'><input type='number' min=0 step=0.0001 name='cantidadinsumoCrearReceta[]' class='form-control text-right cantingre'><div class='input-group-append'><span class='input-group-text'><a class='unitingre'>Unidad</a></span></div></div>")

            ),

             $('<td>').attr('scope','col')
          .append
          (
            $('<button type="button" class="btn btn-danger btn-sm borrar">Borrar</button>')
            ),

)
     )   
    }
   }
   );


      $(function () {
                 $(document).on('click', '.borrar', function (event) {
                       event.preventDefault();
                        $(this).closest('tr').remove();
    });
});


// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      var button= document.getElementById('BotonAgregarReceta');
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
    $('#TablaReceta').on('change', '.depo',function(){
        var depoID = $(this).val();
        var depo=$(this);
        if(depoID){
            $.ajax({
                type:'POST',
                url:'datos.php',
                data:'idDepositoFiltroInsumo='+depoID,
                success:function(html){
                    $(depo).closest('tr').find('.nomingre').html(html); 
                }
            }); 
        }else{
            $(depo).closest('tr').find('.nomingre').html('<option value="">Selecione el deposito antes</option>');
        }
    });
    
});
$(document).ready(function(){
    $('#TablaReceta').on('change', '.nomingre',function(){
        var insuID = $(this).val();
        var insu=$(this);
        if(insuID){
            $.ajax({
                type:'POST',
                url:'datos.php',
                data:'idInsumoAgregarReceta='+insuID,
                success:function(html){
                    $(insu).closest('tr').find('.unitingre').text(''+ html);
                    $(insu).closest('tr').find('.idinsumoselec').text(''+ insuID); 
                }
            }); 
        }else{
            $(insu).closest('tr').find('.unitingre').html(""); 
        }
    });
    
});

$('#gramosxunidad').keyup(function(){

if ($('#MermaEsperada').val()!=""&&$('#unidadesfinalesxunidad').val()!="") {

$('#gramosxunidadesperado').val(($('#gramosxunidad').val()*(1-($('#MermaEsperada').val()/100))/$('#unidadesfinalesxunidad').val()))

}else{

$('#gramosxunidadesperado').val("Se calculará cuando termine de ingresar los datos")

}})

$('#MermaEsperada').keyup(function(){

if ($('#gramosxunidad').val()!=""&&$('#unidadesfinalesxunidad').val()!="") {

$('#gramosxunidadesperado').val(($('#gramosxunidad').val()*(1-($('#MermaEsperada').val()/100))/$('#unidadesfinalesxunidad').val()))

}else{

$('#gramosxunidadesperado').val("Se calculará cuando termine de ingresar los datos")

}})

$('#unidadesfinalesxunidad').keyup(function(){

if ($('#gramosxunidad').val()!=""&&$('#MermaEsperada').val()!="") {

$('#gramosxunidadesperado').val(($('#gramosxunidad').val()*(1-($('#MermaEsperada').val()/100))/$('#unidadesfinalesxunidad').val()))

}else{

$('#gramosxunidadesperado').val("Se calculará cuando termine de ingresar los datos")

}})


</script>

</body>
</html>


