<!DOCTYPE html>
<html>

<head>
	<title>Finalizar op</title>
</head>
<body>

	<div class="container">
<br>
  					<h4>Finalizar Orden de produccion ID x</h4>
    <br>          		
        		
        			<h6>Complete los datos para finalizar</h6>
        			<br>
       	<form method="post" class="needs-validation">

            <div class="row">
          				<div class="input-group col-md-6">	
          					<div class="input-group-prepend">
         						<span class="input-group-text">Producto obtenido:</span>
         					</div>
        						<input type="text" class="form-control text-center" name="nombreInsumo" id="nombreinsumo" placeholder="Ingrese la cantidad de producto obtenido" required>
                                    <div class="invalid-feedback">
                                    Ingrese la cantidad de producto obtenido
                                    </div>
        				</div>
	<div class="input-group col-md-6">  
                    <div class="input-group-prepend">
                    <span class="input-group-text">Unidades obtenidas:</span>
                  </div>
                    <input type="number" min=0 step=0.0001 class="form-control text-right" name="alertaQmin" id="alerta" placeholder="Ingrese la cantidad de unidades obtenidas" required>
                       <div class="invalid-feedback">
                                    Ingrese la cantidad de unidades obtenidas
                                    </div>
                </div>
        			</div>
<br>
        
              <h6>Complete los datos de medición:</h6>
              <br>
 
 <table class="table table-hover">
  <thead>
   <tr><th scope="col">#</th><th scope="col">PESO</th><th scope="col">RESPONSABLE</th><th scope="col">FECHA</th></tr>
 </thead>
 <tbody>
   <tr><td scope=col>1</td><td scope=col><input type="number" min=0 step=0.0001 class="form-control text-right" name="alertaQmin" id="alerta" placeholder="Ingrese el peso" required></td><td scope=col><input type="text" class="form-control text-right" name="alertaQmin" id="alerta" placeholder="Ingrese el responsable" required></td><td scope=col><input type="date" id="fechaDesposte" name="fechaDesposteAltaDesposte" required></td></tr>
  <tr><td scope=col>2</td><td scope=col><input type="number" min=0 step=0.0001 class="form-control text-right" name="alertaQmin" id="alerta" placeholder="Ingrese el peso" required></td><td scope=col><input type="text" class="form-control text-right" name="alertaQmin" id="alerta" placeholder="Ingrese el responsable" required></td><td scope=col><input type="date" id="fechaDesposte" name="fechaDesposteAltaDesposte" required></td></tr>
   <tr><td scope=col>3</td><td scope=col><input type="number" min=0 step=0.0001 class="form-control text-right" name="alertaQmin" id="alerta" placeholder="Ingrese el peso" required></td><td scope=col><input type="text" class="form-control text-right" name="alertaQmin" id="alerta" placeholder="Ingrese el responsable" required></td><td scope=col><input type="date" id="fechaDesposte" name="fechaDesposteAltaDesposte" required></td></tr>
    <tr><td scope=col>4</td><td scope=col><input type="number" min=0 step=0.0001 class="form-control text-right" name="alertaQmin" id="alerta" placeholder="Ingrese el peso" required></td><td scope=col><input type="text" class="form-control text-right" name="alertaQmin" id="alerta" placeholder="Ingrese el responsable" required></td><td scope=col><input type="date" id="fechaDesposte" name="fechaDesposteAltaDesposte" required></td></tr>
     <tr><td scope=col>5</td><td scope=col><input type="number" min=0 step=0.0001 class="form-control text-right" name="alertaQmin" id="alerta" placeholder="Ingrese el peso"></td><td scope=col><input type="text" class="form-control text-right" name="alertaQmin" id="alerta" placeholder="Ingrese el responsable"></td><td scope=col><input type="date" id="fechaDesposte" name="fechaDesposteAltaDesposte"></td></tr>
 </tbody>
 </table>
  
           		<br>               
               		<button type="button" class="btn btn-danger" id="BotonAgregarInsumo"  data-toggle="modal" data-target="#ConfirmarInsumo">Finalizar orden</button>
       	 	  </div> 


        
  
</body>
</html>


