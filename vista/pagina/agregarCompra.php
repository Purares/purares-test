
<!DOCTYPE html>
<html>
<head>
  <title>Nueva Compra</title>
</head>
<body>

<?php

$depositos=ControladorFormularios::ctrListaDepositos();

$proveedores=ControladorFormularios::ctrListaProveedores();

$compra_insumo=ControladorFormularios::ctrCompraInsumo();

?>

<div class="container">
           <br>
            <h4>Nueva Compra</h4>
            <br>  
                          <h6>Complete los datos del remito de la nueva compra:</h6>
                          <br>
      <form method="post" class="needs-validation">
                    <div class="row">
                            <div class="form-group col-4">
                         <label for="NumeroRemitoCompra">Número de remito:</label>
                    <input type="text" class="form-control text-center" id="NumeroRemitoCompra" name="nroRemitoCompraInsumo" placeholder="Ingrese el número de remito" required>
                                   <div class="invalid-feedback">
                                   Ingrese el número de remito
                                    </div>
                                </div>
                             <div class="form-group col-4">
                           <label for="idProvedorCompraInsumo">Proveedor:</label>
                        <select class="custom-select" name="idProvedorCompraInsumo" id="proveedorcompra" required>
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
                                   Elija el nombre del proveedor del desbaste
                                    </div>
 
                                </div>
                                    <div class="input-group col-4"> 
                  <label for="fechaCompraInsumo">Fecha de compra:</label>
                          <div class="input-group">
                <input type="date" id="fechaCompraInsumo" name="fechaCompraInsumo" required>
                             <div class="invalid-feedback">
                                    Ingresa la fecha de debaste
                                    </div>
                </div>
                 </div>
                </div>
              <p>Complete la cantidad de insumos que se compraron:</p>
              <div class="container">
                  <table class="table table-sm">
                <thead>
                    <tr>
                      <th scope="col">Deposito</th>
                      <th scope="col">ID</th>
                      <th scope="col">Insumo</th>
                      <th scope="col">Cantidad</th>
                      <th scope="col">Unidad</th>
                      <th scope="col">Fecha de Vencimiento</th>
                      <th scope="col">Borrar</th>
                    </tr> 
                  </thead>
                <tbody id="TablaCompraInsumos">
                            <tr id="seleccioninsumoscompra">
                        <td scope="col">
                          <select class="custom-select depo" name="depositoInsumoCompra">
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
                          <select class="custom-select nomingre" name="idInsumoCompraInsumo[]">
                                        <option value="0">Seleccione el insumo</option>
                          </select>
                        </td>
                        <td scope="col" colspan="2">
                          <div class="input-group"> 
                          <input type="number" min=0 step=0.0001 name="cantidadCompraInsumo[]" class="form-control text-right cantingre" placeholder="Cantidad">
                              <div class="input-group-append">
                  <span class="input-group-text"><a class="unitingre">Unidad</a></span>
              </div>
                  </div>
                        </td>
                    <td scope="col">
                         <div class="input-group">
                <input type="date" id="fechaDesbaste" name="fechaDesbasteAltaDesbaste" required>
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
                           <div class="input-group"> 
                     <label for="descripcionCrearReceta">Descripción:</label>
                     <div class="input-group">
                    <input type="text" class="form-control text-right" name="descripcionCompraInsumo" id="descripcionCompraInsumo" placeholder="Describa" required>
                               <div class="invalid-feedback">
                                    Ingrese una descripción
                                    </div>
                       </div>  
                </div>
                     <br>
                  <button type="button" class="btn btn-success" id="BotonAgregarCompra" data-toggle="modal" data-target="#ConfirmarNuevaCompra">Agregar compra</button>
            </div>

  <!-- ConfirmarNuevaReceta -->
  <div class="modal fade" id="ConfirmarNuevaCompra" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirmar Nueva compra</h5>
        </div>
        <div class="modal-body">
          <p>Usted está a punto de cargar la compra del remito numero <a class="numero remito"></a>, del proveedor <a class="proveedor compra"></a>, con fecha <a class="fechacompra"></a></p>

          <p>Tendrá la siguiente descripción:</p> 

          <p><a class="descripcion"></a>.</p>

          <p>La compra es por las siguientes cantidades de insumos:</p>

          <div class="container">
          <table class="table table-hover">
            <thead>
            <tr><th scope="col">Insumos</th><th scope="col">Cantidad</th><th scope="col">Unidad</th></tr>
            </thead>
            <tbody id="tablaconfirmarcomprainsumos">
              
            </tbody>
          </table>
          </div>
            <br>
          <p>¿Confirma que desea CARGAR ESTA COMPRA?</p>
        </div>
        <div class="modal-footer">
          <button type="submit"  class="btn btn-success">Sí, cargar compra</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">No, volver a atrás</button>
        </div>
      </div>
    </div>
  </div>

       </form>


<script type="text/javascript">

$('#ConfirmarNuevaCompra').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget);
var modal = $(this)
completarmodalcomprainsumos()
function completarmodalcomprainsumos(){             
                                  var numeroremitocompra=$('#NumeroRemitoCompra').val()
                                      proveedor=$('#proveedorcompra option:selected').val()
                                      fechacompra=$('#fechaCompraInsumo').val()
                                      descripcion=$('#descripcionCompraInsumo').val()
                                     
                                      var nombreisumoscompra = [];
                                      cantidadinsumoscompra=[];
                                      unidadinsumoscompras=[];

                                      $('.tringre').remove();

                                      $('.nomingre option:selected').each(function(){
                                        nombreisumoscompra.push($(this).text());
                                      })
                                       $('.cantingre').each(function(){
                                        cantidadinsumoscompra.push($(this).val());
                                      })
                                         $('.unitingre').each(function(){
                                        unidadinsumoscompras.push($(this).text());
                                      })



                                       
modal.find('.numero remito').text('' + numeroremitocompra);
modal.find('.proveedor compra').text('' + proveedor);
modal.find('.fechacompra').text('' + fechacompra);
modal.find('.descripcion').text('' + descripcion);



for (var i=0; i<=nombreisumoscompra.length-1;i++){
  
  modal.find('#tablaconfirmarcomprainsumos').append($('<tr class="tringre"><td scope="col">' + nombreisumoscompra[i] +'</td><td scope="col" class="text-right">'+ cantidadinsumoscompra[i] + '</td><td scope="col">' + unidadinsumoscompras[i]+ '</tr>'))

  }}})

$('#BotonAgregarInsumoReceta').on('click', function (event) {

agregarinsumoscompra();
function agregarinsumoscompra() {

  $("#TablaCompraInsumos")
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

              
            .attr('name','depositoInsumoCompra')
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
            
              $("<select class='custom-select nomingre' name='idInsumoCompraInsumo[]'><option value='0'>Seleccione el insumo</option></select>")

            ),

           $('<td>').attr('scope','col').attr('colspan','2')
          .append
          (
            
              $("<div class='input-group'><input type='number' min=0 step=0.0001 name='cantidadCompraInsumo[]' class='form-control text-right cantingre'><div class='input-group-append'><span class='input-group-text'><a class='unitingre'>Unidad</a></span></div></div>")

            ),

             $('<td>').attr('scope','col')
          .append
          ($('<div class="input-group"><input type="date" id="fechaVencimientoinsumo" name="fecha_compraI[]" required>'

            )),
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
      var button= document.getElementById('BotonAgregarCompra');
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
    $('#TablaCompraInsumos').on('change', '.depo',function(){
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
    $('#TablaCompraInsumos').on('change', '.nomingre',function(){
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

</script>

</body>
</html>


