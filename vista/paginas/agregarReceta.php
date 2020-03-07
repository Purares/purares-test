
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

if(isset($_POST["depo_id"]) && !empty($_POST["depo_id"])){
    //Get all state data

    $inusmosxdeposito=ControladorFormularios::ctrInsumosDeposito($_POST["depo_id"]);

   // $query = $db->query("SELECT * FROM states WHERE country_id = ".$_POST['country_id']." AND status = 1 ORDER BY state_name ASC");
    
    //Count total number of rows
    
    //Display states list
    if($inusmosxdeposito){
        echo '<option value="">Select inusumo</option>';
        foreach ($inusmosxdeposito as $insumo) {
           echo '<option value="'.$insumo[0].'">'.$insumo[1].'</option>';
        }
    }else{
        echo '<option value="">iNSUMO not available</option>';
    }
}


?>

<div class="container">
           <br>
            <h4>Nueva Receta</h4>
            <br>  
                          <h6>Complete los datos de la nueva receta que desea agregar:</h6>
                          <br>
      <form method="post" class="needs-validation">
                     <div class="row">
                            <div class="form-group col-6">
                         <label for="NombreReceta">Nombre de la nueva receta:</label>
                    <input type="text" class="form-control text-center" id="NombreReceta" name="nombreCrearReceta" placeholder="Ingrese el nombre de la nueva receta" required>
                                   <div class="invalid-feedback">
                                   Ingrese el nombre de la nueva receta
                                    </div>
                                </div>
                             <div class="form-group col-6">
                         <label for="ReemplazaReceta">¿Reemplaza a alguna receta ya cargada?</label>
                    <select class="custom-select" id="ReemplazaReceta" required>
                  <option value="">Seleccione la receta que reemplazaría</option>

<?php

foreach($recetas as $receta){

  echo '<option value="' . $receta["id_receta"] . '">' . $receta["nombre"] . '</option>';

};

?>

                  <option value="0">No reemplaza a ninguna</option>
                    </select>
                       <div class="invalid-feedback">
                                    Seleccione si reemplaza a alguna receta
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
                        </td>
                        <td scope="col">
                          <select class="custom-select nomingre" name="idinsumoCrearReceta[]">
                                        <option value="0">Seleccione el insumo</option>
                                         <option value="1">Insumo1</option>
                          </select>
                        </td>
                        <td scope="col">
                          <div class="input-group"> 
                          <input type="number" min=0 step=0.0001 name="cantidadinsumoCrearReceta[]" class="form-control text-right cantingre" placeholder="Cantidad">
                  </div>
                        </td>
                                    <td scope="col">
                                    <a class="unitingre" id="unidad"></a>
                                    </td>
                                    <td scope="col">
                                    <button type="button" class="btn btn-danger btn-sm borrar">Borrar</button>
                                     </td>
                    </tr> 
                </tbody>
            </table>
                          <div class="container">
                        <p style="color:#FF0000" id="errorinsumos"></p>
                        </div>
            <button type="button" id="BotonAgregarInsumoReceta" class="btn btn-secondary btn-sm">Agregar Insumo</button>
          </div>
          <br>
          <div class="row">
              <div class="input-group col-6"> 
                    <input type="number" min=0 max=100 step=0.01 class="form-control text-right" id="KilosCarne" name="porcentcarneCrearReceta" placeholder="Kilos" required>
                  <div class="input-group-append">
                  <span class="input-group-text">kg de Carne en 100 kg de paston</span>
              </div>
                             <div class="invalid-feedback">
                                    Ingrese la cantidad de kilos de carne cada 100 kg de pastón
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
                         <label for="LargoUnidad">Largo por unidad en centímetros/unidad:</label>
                     <div class="input-group">
                                <input type="number" min=0 step=0.01 class="form-control text-right" name="largouniCrearReceta" id="cmxunidad" placeholder="centímetros por unidad" required>
                                  <div class="input-group-append">
                  <span class="input-group-text">cm/unidad</span>
                            </div>
                             <div class="invalid-feedback">
                                    Ingrese el largo por unidad en centímetros
                                    </div>
                       </div>         
                      </div>
                         <div class="form-group col-6">
                         <label for="PesoUnidad">Peso por unidad en gramos/unidad:</label>
                     <div class="input-group">
                    <input type="number" min=0 step=0.01 class="form-control text-right" name="pesouniCrearReceta" id="gramosxunidad" placeholder="gramos por unidad" required>
                                  <div class="input-group-append">
                  <span class="input-group-text">gramos/unidad</span>
                            </div>
                               <div class="invalid-feedback">
                                    Ingrese el peso por unidad en gramos
                                    </div>
                       </div>         
                      </div>
                        </div>
                           <div class="input-group"> 
                    <div class="input-group-prepend">
                    <span class="input-group-text">Descripción:</span>
                  </div>
                    <input type="text" class="form-control text-right" name="descripcionCrearReceta" placeholder="Describa" required>
                     <div class="invalid-feedback">
                                    Ingrese una descripción
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
          <p>Usted está a punto de cargar la receta <a class="nombre"></a>, que <a class="reemplaza"></a>.</p>

          <p>Utilizará <a class="kilos"></a> kilos de carne cada 100 kilos de pastón, con <a class="merma"></a>% de merma esperada.</p>

          <p>Requerirá <a class="diasprodu"></a> días de producción y <a class="diasvenc"></a> días para su vencimiento.</p>

          <p>Tiene un largo por unidad de <a class="largo"></a> centímetros y un peso por unidad de <a class="peso"></a> kilos.</p>

          <p>La receta tendrá los siguientes ingredientes:</p>

          <table>
            <thead>
            <tr><th scope="col">Ingredientes</th><th scope="col">Cantidad</th><th scope="col">Unidad</th></tr>
            </thead>
            <tbody id="tablaconfirmar">
              
            </tbody>
          </table>
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
                                      reemplazareceta=$('#ReemplazaReceta option:selected').text(),
                                      noreemplaza=$('#ReemplazaReceta').val()
                                      kiloscarne=$('#KilosCarne').val()
                                      mermaesperada=$('#MermaEsperada').val()
                                      diasproduccion=$('#DiasProduccion').val()
                                      diasvencimiento=$('#DiasVencimiento').val()
                                      gramosxunidad=$('#gramosxunidad').val()
                                      cmxunidad=$('#cmxunidad').val()

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

if (noreemplaza==0) {

modal.find('.reemplaza').text('no reemplazará a ninguna receta anteriormente cargada');

}else{

modal.find('.reemplaza').text('reemplazará a la receta: ' + reemplazareceta);

}
modal.find('.nombre1').text('' + reemplazareceta);
modal.find('.kilos').text('' + kiloscarne);
modal.find('.merma').text('' + mermaesperada);
modal.find('.diasprodu').text('' + diasproduccion);
modal.find('.diasvenc').text('' + diasvencimiento);
modal.find('.largo').text('' + gramosxunidad);
modal.find('.peso').text('' + cmxunidad);

for (var i=0; i<=nombreingredientes.length-1;i++){
  
  modal.find('#tablaconfirmar').append($('<tr class="tringre"><td scope="col">' + nombreingredientes[i] +'</td><td scope="col">'+ cantidadingredientes[i] + '</td><td scope="col">' + unidadingredientes[i]+ '</tr>'))

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
            $('<a>idinusmo</a>')
            ),

            $('<td>').attr('scope','col')
          .append
          (
            
              $("<select class='custom-select nomingre' name='idinsumoCrearReceta[]'><option value='0'>Seleccione el insumo</option><option value='238'>Insumo1</option></select>")

            ),

           $('<td>').attr('scope','col')
          .append
          (
            
              $("<div class='input-group'><input type='number' min=0 step=0.0001 name='cantidadinsumoCrearReceta[]' class='form-control text-right cantingre' id='cantidad1'></div>")

            ),

             $('<td>').attr('scope','col')
          .append
          (
            $('<a class="unitingre">unidad</a>')
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

$('.depo').change(function(){
 
  $('.nomingre').empty();
  $.getJSON('datos.php',{Accion:'getInsumos', IdDeposito:$('.depo option:selected').val()},function(insumos){
    for (x=0;x<insumos.length;x++){

      $('.nomingre').append(new Option(insumos[x].nombre,insumos[x].id_insumo));

    }
  })});

$(document).ready(function(){
    $('.depo').on('change',function(){
        var depoID = $(this).val();
        if(depoID){
            $.ajax({
                type:'POST',
                url:'datos.php',
                data:'depo_id='+depoID,
                success:function(html){
                    $('.nomingre').html(html); 
                }
            }); 
        }else{
            $('#nomingre').html('<option value="">Selecione el deposito1</option>');
            $('#unitingre').html('<option value="">Seleccione inusmo antes</option>'); 
        }
    });
    
});

</script>

</body>
</html>

