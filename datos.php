<?php

require_once"controlador/plantillaCTR.php";
require_once"controlador/formulariosCTR.php";
require_once"modelo/formulariosMDL.php";

if(isset($_POST["idDepositoFiltroInsumo"]) && !empty($_POST["idDepositoFiltroInsumo"])){
    //Get all state data

    $inusmosxdeposito=ControladorFormularios::ctrInsumosDeposito();

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
};

if(isset($_POST["idInsumoAgregarReceta"]) && !empty($_POST["idInsumoAgregarReceta"])){
    //Get all state data

    $unidaddeinsumo=ControladorFormularios::ctrUdmInsumos();

   // $query = $db->query("SELECT * FROM states WHERE country_id = ".$_POST['country_id']." AND status = 1 ORDER BY state_name ASC");
    
    //Count total number of rows
    
    //Display states list
    if($unidaddeinsumo){
        foreach ($unidaddeinsumo as $unidad) {
            echo $unidad['nombre'];
        }}

    else{
        echo 'error unidad';
    }
}

if(isset($_POST["chequeado"])){

 $recetas=ControladorFormularios::ctrListaRecetas();

    if($_POST["chequeado"]==1){
        
    foreach($recetas as $receta){

        if ($receta["activo"]==1) {
    
            echo '<tr><td scope="col">' . $receta["id_receta"] . '</td><td scope="col">' . $receta["nombre"] . '</td><td scope="col">' . $receta["descripcion"] . '</td><td scope="col">Activa</td><td scope="col"><a class="btn btn-secondary btn-sm" href="index.php?pagina=detalleReceta&idReceta=' . $receta["id_receta"] . '&nombrereceta=' .  $receta["nombre"]  . '&estado=' .  $receta["activo"] . '">Ver detalles</a></td></tr>';
        }else{

            echo '<tr><td scope="col">' . $receta["id_receta"] . '</td><td scope="col">' . $receta["nombre"] . '</td><td scope="col">' . $receta["descripcion"] . '</td><td scope="col">Desactivada</td><td scope="col"><a class="btn btn-secondary btn-sm" href="index.php?pagina=detalleReceta&idReceta=' . $receta["id_receta"] . '&nombrereceta=' .  $receta["nombre"]  . '&estado=' .  $receta["activo"] . '">Ver detalles</a></td></tr>';
        }
    }
    }else{
       
    foreach($recetas as $receta){


        if ($receta["activo"]==1) {
    
        echo '<tr><td scope="col">' . $receta["id_receta"] . '</td><td scope="col">' . $receta["nombre"] . '</td><td scope="col">' . $receta["descripcion"] . '</td><td scope="col">Activa</td><td scope="col"><a class="btn btn-secondary btn-sm" href="index.php?pagina=detalleReceta&idReceta=' . $receta["id_receta"] . '&nombrereceta=' .  $receta["nombre"]  . '&estado=' .  $receta["activo"] . '">Ver detalles</a></td></tr>';
   }
}
}
}

if (isset($_POST["idRecetaDetalle"])){

    if ($_POST['estado']==0) {
        
        $activar=ControladorFormularios::ctrActivarReceta();
        return $activar;
    }
    if ($_POST['estado']==1) {
    
        $desactivar=ControladorFormularios::ctrDesactivarReceta();
        return $desactivar;

}}

if(isset($_POST["chequeadoDesposte"])){

  $despostes=ControladorFormularios::ctrListaDesposte();

    if($_POST["chequeadoDesposte"]==0){
        
    foreach($despostes as $desposte){

        if ($desposte["anulado"]==0) {
    
    echo '<tr><td scope="col">' . $desposte["id_desposte"] . '</td><td scope="col">' . $desposte["nro_remito"] . '</td><td scope="col">' . $desposte["proveedor"] . '</td><td scope="col">' . $desposte["unidades"] . '</td><td scope="col">' . $desposte["peso_total"] . '</td><td scope="col">' . $desposte["fecha_desposte"] . '</td><td scope="col">Activo</td><td scope="col"><a class="btn btn-secondary btn-sm" href="index.php?pagina=detalleDesposte&idDesposteVerDetalles=' . $desposte["id_desposte"] . '&estado=' .  $desposte["anulado"] . '">Inspeccionar Desposte</a></td></tr>';

}          else{
    
         echo '<tr><td scope="col">' . $desposte["id_desposte"] . '</td><td scope="col">' . $desposte["nro_remito"] . '</td><td scope="col">' . $desposte["proveedor"] . '</td><td scope="col">' . $desposte["unidades"] . '</td><td scope="col">' . $desposte["peso_total"] . '</td><td scope="col">' . $desposte["fecha_desposte"] . '</td><td scope="col">Anulado</td><td scope="col"><a class="btn btn-secondary btn-sm" href="index.php?pagina=detalleDesposte&idDesposteVerDetalles=' . $desposte["id_desposte"] . '&estado=' .  $desposte["anulado"] . '">Inspeccionar Desposte</a></td></tr>';


        }
    }
    }else{
       
    foreach($despostes as $desposte){


     if ($desposte["anulado"]==0) {
    
    echo '<tr><td scope="col">' . $desposte["id_desposte"] . '</td><td scope="col">' . $desposte["nro_remito"] . '</td><td scope="col">' . $desposte["proveedor"] . '</td><td scope="col">' . $desposte["unidades"] . '</td><td scope="col">' . $desposte["peso_total"] . '</td><td scope="col">' . $desposte["fecha_desposte"] . '</td><td scope="col">Activo</td><td scope="col"><a class="btn btn-secondary btn-sm" href="index.php?pagina=detalleDesposte&idDesposteVerDetalles=' . $desposte["id_desposte"] . '&estado=' .  $desposte["anulado"] . '">Inspeccionar Desposte</a></td></tr>';

}
}
}
}

if (isset($_POST["idDesposteVerDetalles"])){

   $anulacion=ControladorFormularios::ctrValidacionAnularDesposte();

   echo $anulacion;

}

 //   }

 //   echo $anulacion;

if(isset($_POST["funcion"])){
    //Get all state data

    $cuentas=ControladorFormularios::ctrListaCuentas();

   // $query = $db->query("SELECT * FROM states WHERE country_id = ".$_POST['country_id']." AND status = 1 ORDER BY state_name ASC");
    
    //Count total number of rows
    
    //Display states list
    if($cuentas){
        foreach ($cuentas as $cuenta) {
            echo '<option value="'.$cuenta["id_cuenta"].'">'.$cuenta["nombre"].'</option>';
        }}

    else{
        echo $cuentas . $_POST["funcion"];
    }
}

 if (isset($_POST["idCarneMovimientoCarne"])||
    isset($_POST["idCuentaMovimientoCarne"])||
    isset($_POST["idDesposteMovimientoCarne"])||
    isset($_POST["cantidadMovimientoCarne"])) {

$respuesta=ControladorFormularios::ctrMovCarne();

echo $respuesta;

}

if(isset($_POST["idRecetaAltaOP"])&&isset($_POST["pesoPastonAltaOP"])){

$calculoinsumos=ControladorFormularios::ctrCalculoInsumos();

    }

if (isset($_POST["nombreCrearReceta"])||
            isset($_POST["diasprodCrearReceta"])||
            isset($_POST["diasvencCrearReceta"])||
            isset($_POST["porcentcarneCrearReceta"])||
            isset($_POST["largouniLoteCrearReceta"])||
            isset($_POST["pesouniLoteCrearReceta"])||
            isset($_POST["mermaCrearReceta"])||
            isset($_POST["largoUniEsperadoCrearReceta"])||
            isset($_POST["pesoUniEsperadoCrearReceta"])||
            isset($_POST["uFinalXuCrearReceta"])|| #unidades_final_xunidadDe Lote       
            isset($_POST["descripcionCrearReceta"])){

    $nuevareceta=ControladorFormularios::ctrCrearReceta();

    $respuestacod=json_encode($nuevareceta);
    echo $respuestacod;
}

?>