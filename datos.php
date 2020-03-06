<?php

require_once"controlador/plantillaCTR.php";
require_once"controlador/formulariosCTR.php";
require_once"modelo/formulariosMDL.php";

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