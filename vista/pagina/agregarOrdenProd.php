<head>
  <title>Nueva Orden Purares</title>
</head>
<body>


<?php

$recetas=ControladorFormularios::ctrListaRecetas();

$carnes=ControladorFormularios::ctrListaCarnes();

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

	echo '<option value="' . $receta["id"] . '">' . $receta["nombre"] . '</option>';

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
                           <p>Se requeriran estas cantidades de insumos:</p>
                           <div class="calculo"></div>
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
                    </tr> 
                  </thead>
                <tbody id="TablaCarnesDesposte">
              
<?php

foreach($carnes as $carne){

  echo '<tr><td scope="col">' . $carne[0] . '<input type="hidden" name="idCarnesAgregarOP[]" value="' . $carne[0] . '"></td><td scope="col">' . $carne[1] . '<input type="hidden" class="nomcarne" value="' . $carne[1] . '"></td><td scope="col"><div class="input-group"><input type="number" min=0 step=0.0001 name="catidadCarnesAgregarOP[]" class="form-control cantcarne" placeholder="Cantidad"><div class="input-group-append"><span class="input-group-text"><a class="unitcarne">'. $carne[2] . '</a></span></div></div></td></tr>';

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
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirmar orden</h5>
        </div>
        <div class="modal-body">
          Usted ha cargado una orden de [RECETA] [CANTIDAD] [EL DATO QUE QUERAMOS] ¿Confirma que desea CARGAR ESTA ORDEN?
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

$.ajax({
                type:'POST',
                url:'datos.php',
                data:{idRecetaAltaOP: $('#idReceta').val(),pesoPastonAltaOP:$('#PesoPaston').val()},
                dataType: "json",
                success:function(respuestacod){

                    alert('esto anda')

                    if (respuestacod.validacion_=="SI") {

                         alert('alcanza')
                        alert(respuestacod.tablaInsumos_)

                    }else{

                             alert('no alcanza')
                      $('.calculo').html("no alcanzan los inusumos")


                    }
                      
                    

}})}) 

</script>


</body>
</html>