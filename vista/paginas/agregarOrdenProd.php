<head>
  <title>Nueva Orden Purares</title>
</head>
<body>


<?php

$recetas=ControladorFormularios::ctrListaRecetas();

?>


  <div class="container">  
    <br>
    <h4>Nueva orden</h4>
              <br>
            	<h6>Complete los datos de la nueva orden de producción:</h6>
          			<br>
                      <div class="row">
          				<div class="input-group col-6">
  							<div class="input-group-prepend">
           						<span class="input-group-text">Receta:</span>
           					</div>
          					<select class="custom-select" id="Receta" required>
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
          						<input type="number" min=0 step=0.01 class="form-control text-right" id="PesoPaston" placeholder="Ingrese el peso" required>
                              <div class="input-group-append">
      							<span class="input-group-text">kilos</span>
   							</div>
                                 <div class="invalid-feedback">
                                      Ingrese un numero mayor a cero
                                      </div>
          				</div>
                          </div>
                            	<br>    
                      <p>Complete los kilos de carne requeridos </p>
            				<table class="table table-sm">
      						<thead>
          						<tr>
             						<th scope="col">ID Carne</th>
                                  <th scope="col">Nombre</th>
             						<th scope="col-1">Cantidad</th>
             						<th scope="col">Unidad</th>
                                  <th scope="col">Stock actual</th>
             						<th scope="col">Borrar</th>
          						</tr>
        						</thead>
    							<tbody id="TablaCarnes">
                              <tr id="seleccioncarnes">
             							<td scope="col">
            							</td>
                          <td scope="col">
                          <select class="custom-select" id="nombreCarnes">
                                          <option value="0">Seleccione la carne</option>
            								</select>
                          </td>
            							<td scope="col-1">	
             								<input type="number" min=0 step=0.0001 id="CantidadCarne" class="form-control text-right" placeholder="Cantidad">
            							</td>
                                      <td scope="col">
                                      <span class="input-group-text" id="unidadcarnes"></span>
                                      </td>
                                      <td scope="col">
                                       <div class="input-group-prepend">
                                      <span class="input-group-text" id="stockcarnes"></span><span class="input-group-text" id="stockcarnesunidad"></span>
                                      </div>
                                      </td>
           						</tr>  
    							</tbody>
  						</table>
      
                          <p style="color:#FF0000" id="errorcarnesinvalidas"></p>
  						<button type="button" id="BotonAgregarCarne" class="btn btn-secondary btn-sm">Agregar Carne</button>
                
                          <br>
                          <p style="color:#FF0000" id="errorcarnes"></p>
              
                          <span class="input-group-text"><span id="kilosnecesarios"></span>&nbsp;kilos de carne requeridos</span> 

                          <br>
                 		<button type="button" class="btn btn-success" id="EstablecerOrden"  data-toggle="modal" data-target="#ConfirmarOrden">Establecer orden</button> 

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
          <a class="btn btn-success" href="orden cargada.html">SÍ, ESTABLECER ORDEN</a>
          <button type="button" class="btn btn-danger" data-dismiss="modal">NO, DESCARTAR ORDEN</button>
        </div>
      </div>
    </div>
  </div>


</body>
</html>