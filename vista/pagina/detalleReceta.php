<!DOCTYPE html>
<html>
<head>
	<title>Detalle receta</title>
</head>
<body>

<?php

$detalleReceta=ControladorFormularios::ctrDetalleReceta();

$detalleinsumos=ControladorFormularios::ctrInsumosReceta();

foreach ($detalleReceta as $receta) {


?>


<div class="container">
	<br>
  					<h4>Receta ID <a class="idreceta"><?php echo $_GET['idReceta'] ?></a> "<a class="nombrereceta"><?php echo $_GET['nombrereceta'] ?></a>"<?php if ($_GET['estado']==1) {echo '     <span class="badge badge-success">Activa</span>';}else{echo '<span class="badge badge-danger">Desactivada</span>';}?></h4>
  					<br>
          
                  <div class="row">
                            <div class="form-group col-6">
                         <label for="spanrecetanombre">Nombre de la receta:</label>
                                <span class="input-group-text nombrereceta" id="spanrecetanombre"><?php echo $_GET['nombrereceta'] ?></span>
                                </div>
                            <div class="form-group col-6">
                         <label for="spanrecetafechaalta">Fecha de Alta:</label>
                                <span class="input-group-text fechadealta" id="spanrecetafechaalta"><?php echo $receta['fecha_alta'] ?></span>
                                </div>
        				</div>
                    <div class="row">
                     <div class="form-group col-6">
                         <label for="spanrecetaporcenpaston">Porcentaje de carne:</label>
                                <span class="input-group-text recetaporcentajecarne" id="spanrecetaporcenpaston"><?php echo $receta['porcent_carne'] ?> %</span>
                                </div>
                            <div class="form-group col-6">
                         <label for="spanrecetamermaesp">Merma esperada:</label>
                                <span class="input-group-text recetamermaesperada" id="spanrecetamermaesp"><?php echo $receta['merma_esperada'] ?> %</span>
                                </div>
        				</div>
                    <br>
                    <p>Insumos de la receta</p>
                        <table class="table table-hover table-bordered table-sm">
    						<thead class="thead-light">
        						<tr>
           							<th scope="col">ID</th>
                                    <th scope="col">Insumo</th>
                                    <th scope="col" class="text-right">Cantidad</th>
           							<th scope="col">Unidad</th>
        						</tr>
      						</thead>
  							<tbody>
<?php

foreach ($detalleinsumos as $insumo) {

echo '<tr><td scope="col">' . $insumo[1] . '</td><td scope="col">' . $insumo[2] . '</td><td scope="col" class="text-right">' . $insumo[3] . '</td><td scope="col" class="text-right">' . $insumo[4] . '</td></tr>';

};
?>
  								
  							</tbody>
					</table>
                    <br>
                      <div class="row">
                     <div class="form-group col-6">
                         <label for="spanrecetadiasprodu">Días de producción:</label>
                                <span class="input-group-text recetadiasproduccion" id="spanrecetadiasprodu"><?php echo $receta['dias_produccion'] ?> días</span>
                                </div>
                            <div class="form-group col-6">
                         <label for="spanrecetadiasven">Días de vencimiento:</label>
                                <span class="input-group-text recetadiasvencimiento" id="spanrecetadiasven"><?php echo $receta['dias_vencimiento'] ?> días</span>
                                </div>
        				</div>
                           <div class="row">
                     <div class="form-group col-6">
                         <label for="spanrecetalargouni">Largo por unidad:</label>
                                <span class="input-group-text recetalargoporunidad" id="spanrecetalargouni"><?php echo $receta['largo_unidad'] ?> cm/unidad</span>
                                </div>
                            <div class="form-group col-6">
                         <label for="spanrecetapesouni">Peso por unidad:</label>
                                <span class="input-group-text recetapesoporunidad" id="spanrecetapesouni"><?php echo $receta['peso_unidad'] ?> gramos/unidad</span>
                                </div>
        				</div>
     		<br>
<div class="container">
<div class="d-flex flex-column">
        <div class="form-check p-2">
  <input class="form-check-input check" type="checkbox" value="" id="ActivarReceta">
  <label class="form-check-label" for="defaultCheck1">
    Activar Receta
  </label>
</div>
<div class="form-check p-2">
  <input class="form-check-input check" type="checkbox" value="" id="DesactivarReceta">
  <label class="form-check-label" for="defaultCheck1">
    Desactivar Receta
  </label>
</div>
 </div>
 </div>
<br>
               		<button type="button" class="btn btn-warning" id="Imprimirreceta">Imprimir receta</button> 
      			</div>

<?php

}

?>

<script>
  
$(document).ready(function(){
   
  var estado=<?php echo $_GET['estado'] ?>;

  if (estado==1){

             $('#ActivarReceta').prop("checked", false);
             $('#ActivarReceta').prop("disabled", true); 
             $('#DesactivarReceta').prop("checked", false); 
             $('#DesactivarReceta').prop("disabled", false);  

  }else{

       $('#DesactivarReceta').prop("checked", false);
       $('#DesactivarReceta').prop("disabled", true); 
       $('#ActivarReceta').prop("checked", false);
       $('#ActivarReceta').prop("disabled", false); 

  }

   });










$("#ActivarReceta").on( "click", function() {
  
if ($(this).prop('checked')==true) {

   $.ajax({
                type:'POST',
                url:'datos.php',
                data:{idRecetaDetalle: $('.idreceta').text(), estado: 0},
                success:function(html){
                $(this).prop("disabled", true);
                $('#DesactivarReceta').prop("disabled", false);
                alert('activo'+html);
                }})}});








$("#DesactivarReceta").on( "click", function() {

if ($(this).prop('checked')==true) {

   $.ajax({
                type:'POST',
                url:'datos.php',
                data:{idRecetaDetalle: $('.idreceta').text(), estado: 1},
                success:function(html){
                $(this).prop("disabled", true);
                $('#ActivarReceta').prop("disabled", false);
                alert('desactivo ' + html);
                }})}});

</script>


</body>
</html>