<head>
  <title>Nueva Orden Purares</title>
</head>
<body>


<?php

$recetas=ControladorFormularios::ctrListaRecetas();

$carnes=ControladorFormularios::ctrStockCarnes();

$nuevaorden=ControladorFormularios::ctrAgregarOP();

?>


  <div class="container">  
    <br>
    <h4>Nueva orden</h4>
              <br>
            	<h6>Complete los datos de la nueva orden de producción:</h6>
          			<br>
<form method="post" class="needs-validation">
                      <div class="row">
          				<div class="input-group col-6">
  							<div class="input-group-prepend">
           						<span class="input-group-text">Receta:</span>
           					</div>
          					<select class="custom-select" id="idReceta" name="idRecetaAltaOP" required>
                    <option value="">Seleccione una receta</option>
<?php

foreach($recetas as $receta){

	echo '<option value="' . $receta["id_receta"] . '">' . $receta["nombre"] . '</option>';

};

?>

            					</select>
                                     <div class="invalid-feedback">
                                    Seleccione una receta
                                      </div>
            				</div>
            			<br>
            				<div class="input-group col-6">	
            					<div class="input-group-prepend">
           						<span class="input-group-text">Peso del pastón:</span>
           					</div>
          						<input type="number" min=0 step=0.01 class="form-control text-right" id="PesoPaston" name="pesoPastonAltaOP" placeholder="Ingrese el peso" required>
                              <div class="input-group-append">
      							<span class="input-group-text">kilos</span>
   							</div>
                                 <div class="invalid-feedback">
                                      Ingrese un numero mayor a cero
                                      </div>
          				</div>
                          </div>
                          <br>
                           <p class="infoinsumos">Seleccione una receta y luego ingrese el peso del pastón para calcular los insumos que se requeriran</p>
                         <table class="table table-hover table-bordered table-sm">
                <thead class="thead-light headinsumosop">
                </thead>
                <tbody class="bodyinsumosop">
                </tbody>
                  </table>
                           <br>
              <h6>Ingrese la cantidad de carnes que utilazará la receta:</h6>
              <br>
              <div class="container">
                  <table class="table table-sm">
                <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Carne</th>
                      <th scope="col">Cantidad</th>
                       <th scope="col" class="text-right">Stock Actual</th>
                    </tr> 
                  </thead>
                <tbody id="TablaCarnesDesposte">
              
<?php

foreach($carnes as $carne){

  echo '<tr><td scope="col" width="10%">' . $carne[0] . '<input type="hidden" name="idCarnesAgregarOP[]" value="' . $carne[0] . '"></td><td scope="col" width="50%" class="nomcarne">' . $carne[1] . '<input type="hidden" value="' . $carne[1] . '"></td><td scope="col" width="25%"><div class="input-group"><input type="number" min=0 step=0.0001 max="'.$carne[2].'" name="catidadCarnesAgregarOP[]" class="form-control cantcarneop" placeholder="Cantidad"><div class="input-group-append"><span class="input-group-text"><a class="unitcarne">'. $carne[3] . '</a></span></div></div></td><td scope="col" width="15%" class="text-right">' . $carne[2] .' '. $carne[3] .'</td></tr>';

}

?>
                </tbody>
            </table>
          </div>
       
                          <br>
   <button type="button" class="btn btn-success" id="BotonEstablecerOrden" data-toggle="modal" data-target="#ConfirmarOrden">Establecer orden</button>

                  </div>

  <!-- ConfirmarOrden -->
  <div class="modal fade" id="ConfirmarOrden" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirmar orden</h5>
        </div>
        <div class="modal-body">
          <p>Usted está a punto de cargar una orden de produccion de la receta <a class="nombre_receta"></a> con un pastón total de <a class="pesopaston"></a> kilos.</p>

          <p>Utilizará los siguientes insumos:</p>

          <div class="container">
          <table class="table table-hover table-sm">
            <thead>
            <tr><th scope="col">Insumo</th><th scope="col">Cantidad op</th><th scope="col">Stock actual</th><th scope="col">Stock fúturo</th></tr>
            </thead>
            <tbody id="tablaconfirmarinsuop">
              
            </tbody>
          </table>
          </div>
            <br>
          <p>Utilizará los siguientes carnes:</p>
           <div class="container">
          <table class="table table-hover table-sm">
            <thead>
            <tr><th scope="col">Carne</th><th scope="col" class="text-right">Cantidad</th></tr>
            </thead>
            <tbody id="tablaconfirmarcarneop">
              
            </tbody>
          </table>
          </div>
            <br>
          <p>¿Confirma que desea cargar esta orden de producción?</p>
        </div>
        <div class="modal-footer">
           <button type="submit"  class="btn btn-success">Sí, establecer orden</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">No, descartar orden</button>
        </div>
      </div>
    </div>
  </div>

</form>

<script>

  // Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      var button= document.getElementById('BotonEstablecerOrden');
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

  
$('#PesoPaston').keyup(function(){

 //alert($('#idReceta').val())

$.ajax({
                type:'POST',
                url:'datos.php',
                data:{idRecetaAltaOP: $('#idReceta').val(),pesoPastonAltaOP:$('#PesoPaston').val()},
                dataType: "json",
                success:function(respuestacod){

                    if (respuestacod.validacion_=="SI") {

                        //alert('alcanza')
                         $('.infoinsumos').html("Se requeriran estas cantidades de insumos:")

                        $('.headinsumosop').html('<tr><th scope="col">ID Insumo</th><th scope="col">Insumo</th><th scope="col">Cantidad</th><th scope="col">Stock</th><th scope="col">Cantidad OP</th><th scope="col">Diferencia</th></tr>')

                               $('.bodyinsumosop').find('tr').remove()
                    for (var i = 0; i < respuestacod.tablaInsumos_.length; i++) {


                        
                        $('.bodyinsumosop').append('<tr><td scope="col">'+respuestacod.tablaInsumos_[i][1]+'</td><td scope="col" class="nominsu">'+respuestacod.tablaInsumos_[i][2]+'</td><td scope="col">'+respuestacod.tablaInsumos_[i][3]+' '+respuestacod.tablaInsumos_[i][4]+'</td><td scope="col" class="stockinsu">'+respuestacod.tablaInsumos_[i][5]+' '+respuestacod.tablaInsumos_[i][4]+'</td><td scope="col" class="cantinsuop">'+respuestacod.tablaInsumos_[i][6]+' '+respuestacod.tablaInsumos_[i][4]+'</td><td scope="col"  class="stockinsufuturo">'+respuestacod.tablaInsumos_[i][7]+' '+respuestacod.tablaInsumos_[i][4]+'</td></tr>')


                       //   alert()
                       // alert(respuestacod.tablaInsumos_[i][2])
                       //   alert(respuestacod.tablaInsumos_[i][3])
                        //   alert(respuestacod.tablaInsumos_[i][4])
                          //  alert(respuestacod.tablaInsumos_[i][5])
                        console.log(respuestacod);

                    }}else{

                             alert('no alcanza')
                      $('.calculo').html("no alcanzan los inusumos")


                    }
                      
                    

}})}) 

 $('#idReceta').on('change',function(){

  $('#PesoPaston').val('')
  $('.infoinsumos').html("Ingrese el peso del paston para calcular los insumos")
  $('.bodyinsumosop').find('tr').remove()
  $('.headinsumosop').find('tr').remove()

 })

$('#ConfirmarOrden').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget);
var modal = $(this)
completarmodalorden()
function completarmodalorden(){             
                                  var nombrereceta=$('#idReceta option:selected').text()
                                      pesopaston=$('#PesoPaston').val()
                                    
                                      var nombreinsumos = [];
                                      cantidadinsumosop=[];
                                      stockactualinsumos=[];
                                      stockfututoinsumos=[];

                                      $('.trinsu').remove();

                                      $('.nominsu').each(function(){
                                        nombreinsumos.push($(this).text());
                                      })
                                       $('.cantinsuop').each(function(){
                                        cantidadinsumosop.push($(this).text());
                                      })
                                         $('.stockinsu').each(function(){
                                        stockactualinsumos.push($(this).text());
                                      })
                                          $('.stockinsufuturo').each(function(){
                                        stockfututoinsumos.push($(this).text());
                                      })
                                    
                                      var nombrecarnes = [];
                                      cantidadcarnesop=[];

                                      $('.trcarne').remove();

                                      $('.nomcarne').each(function(){
                                        nombrecarnes.push($(this).text());
                                      })
                                       $('.cantcarneop').each(function(){
                                        cantidadcarnesop.push($(this).val());
                                      })
                                    
                            
modal.find('.nombre_receta').text('' + nombrereceta);
modal.find('.pesopaston').text('' + pesopaston);


for (var i=0; i<=nombreinsumos.length-1;i++){
  
  modal.find('#tablaconfirmarinsuop').append($('<tr class="trinsu"><td scope="col">' + nombreinsumos[i] +'</td><td scope="col" class="text-right">'+ cantidadinsumosop[i] + '</td><td scope="col">' + stockactualinsumos[i]+ '</td><td scope="col">'+ stockfututoinsumos[i]+'</td></tr>'))

  }

for (var i=0; i<=nombrecarnes.length-1;i++){
  
  modal.find('#tablaconfirmarcarneop').append($('<tr class="trcarne"><td scope="col">' + nombrecarnes[i] +'</td><td scope="col" class="text-right">'+ cantidadcarnesop[i] + ' kilos</td></tr>'))

  }



}})




</script>


</body>
</html>