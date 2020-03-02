<?php

require_once"modelo/loginMDL.php";



class ControladorFormularios{

#------------------------- Lista desplegable DEPOSITOS -------------------------#

	static public function ctrListaDepositos(){
		$respuesta= ModeloFormularios::mdlListaDeposito();
		return $respuesta;
	}	

#------------------------- Lista desplegable UDM -------------------------#

	static public function ctrListaUDM(){
		$respuesta= ModeloFormularios::mdlListaUDM();
		return $respuesta;
	}	


#------------------------- Lista desplegable CUENTA -------------------------#

	static public function ctrListaCuentas(){
		$respuesta= ModeloFormularios::mdlListaCuentas();
		return $respuesta;
	}	


#------------------------- Stock de Insumos -------------------------#

	static public function ctrStockInsumos(){

		$respuesta= ModeloFormularios::mdlStockInsumo();
		return $respuesta;
		
	}

#------------------------- Agregar Insumo -------------------------#

	static public function ctrAgregarInsumo(){
		
				
		if (isset($_POST["nombreInsumo"])||
			isset($_POST["idDeposito"])||
			isset($_POST["Unidad"]))
		{
				$datos= array(	'nombreInsumo' => $_POST["nombreInsumo"],
								'idDeposito' => $_POST["idDeposito"],
								'idUdm' => $_POST["idUdm"],
								'alertaQmin' => $_POST["alertaQmin"]);


			$respuesta=ModeloFormularios::mdlAgregarInsumo($datos);
			return $respuesta;
		}


	}


#------------------------- Actualizar stock de Insumo -------------------------#

	static public function ctrActualizarInsumo(){

		if (isset($_POST["idInsumoActI"])||
			isset($_POST["cantidadActI"])||
			isset($_POST["idCuentaActI"])) {

				$datos= array(	'idInsumo_' => $_POST["idInsumoActI"],
								'cantidad_' => $_POST["cantidadActI"],
								'idCuenta_' => $_POST["idCuentaActI"],
								'comentario_' => $_POST["comentarioActI"],
								'idUsuario_' => $idUsaruiO); #[TO DO] Lo tiene que traer del objeto login ubicado en loginMDL.PHP 
		$respuesta=ModeloFormularios::mdlActualizarInsumo($datos);
		return $respuesta;
		}

			
	}	
#------------------------- Lista de Recetas -------------------------#

	static public function ctrListaRecetas(){

		$respuesta= ModeloFormularios::mdlListaRecetas();
		
		return $respuesta;
		
	}



#------------------------- Detalle de Receta -------------------------#

	static public function ctrDetalleReceta(){

		if (isset($_POST["idRecetaDetalle"])){

			$id_receta= $_POST["idRecetaDetalle"]; #[TO DO] Me debe enviar el id de la receta que se quiere ver
			$respuesta= ModeloFormularios::mdlDetalleReceta($id_receta);
		
			return $respuesta;	
		}

	}


#------------------------- Detalle de Receta -------------------------#

	static public function ctrInsumosReceta(){

		if (isset($_POST["idRecetaDetalle"])){

			$id_receta=$_POST["idRecetaDetalle"]; #[TO DO] Me debe enviar el id de la receta que se quiere ver
			$respuesta= ModeloFormularios::mdlInsumosReceta($id_receta);
	
			return $respuesta;	
		}

	
	}

#------------------------- Desactivar Receta -------------------------#

	static public function ctrDesactivarReceta(){

		if (isset($_POST["idRecetaDetalle"])){

			$id_receta=$_POST["idRecetaDetalle"]; #[TO DO] Me debe enviar el id de la receta que se quiere ver
			$respuesta= ModeloFormularios::mdlDesactivarReceta($id_receta);
	
			return $respuesta;	
		}

	
	}

#------------------------- Activar Receta -------------------------#

	static public function ctrActivarReceta(){

		if (isset($_POST["idRecetaDetalle"])){

			$id_receta=$_POST["idRecetaDetalle"]; #[TO DO] Me debe enviar el id de la receta que se quiere ver
			$respuesta= ModeloFormularios::mdlActivarReceta($id_receta);
	
			return $respuesta;	
		}

	
	}


#------------------------- Crear Receta -------------------------#

#################DOING!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	static public function ctrCrearReceta(){

		if (isset($_POST["nombreCrearReceta"])||
			isset($_POST["mermaCrearReceta"])||
			isset($_POST["diasprodCrearReceta"])||
			isset($_POST["diasvencCrearReceta"])||
			isset($_POST["largouniCrearReceta"])||
			isset($_POST["pesouniCrearReceta"])||
			isset($_POST["porcentcarneCrearReceta"])){

				$datos= array(	'nombre_' => $_POST["nombreCrearReceta"],
								'merma_' => $_POST["mermaCrearReceta"],
								'diasprod_' => $_POST["diasprodCrearReceta"],
								'diasvenc_' => $_POST["diasvencCrearReceta"],
								'largouni_' => $_POST["largouniCrearReceta"],
								'pesouni_' => $_POST["pesouniCrearReceta"],
								'porcentcarne_'	 => $_POST["porcentcarneCrearReceta"],
								'descripcion_' => $_POST["descripcionCrearReceta"]);

				$datos2= array(	'id_insumo_'=> $_POST["idinsumoCrearReceta"],
								'cantidad_insumo_'=> $_POST["cantidadinsumoCrearReceta"]);

				$idReceta_nueva=ModeloFormularios::mdlCrearReceta($datos); #[To DO] No devuelve el id de la receta creada
				

				$respuesta=ControladorFormularios::ctrInsumosReceta($idReceta_nueva,$datos2);



				return $respuesta;
		}

	
	}
	#------------------------- Alta Insumos por Receta -------------------------#

	#################DOING!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	static public function ctrAltaInsumosReceta($idReceta_nueva,$datos2){
		
		$logitud=count($datos2);

		#Recorre todos los insumos para agregarlos a la BD
		for ( $i=0 ; $i < $logitud ; $i++) { 
				
			$datos3=$datos2[$i]; #[TO DO] Seleccionar la fila del array
			$respuesta2=ModeloFormularios::mdlAltaInsumosReceta($idReceta_nueva,$datos3);

			if ($respuesta2 != "ok"){
				return $respuesta2;
			}
		}	

	}

	#------------------------- Lista de carnes -------------------------#

	static public function ctrListaCarnes(){
	
		$respuesta= ModeloFormularios::mdlListaCarnes();
		return $respuesta;
	}	
	
	#------------------------- Stock de Carnes -------------------------#

	static public function ctrStockCarnes(){

		$respuesta= ModeloFormularios::mdlStockCarnes();
		return $respuesta;
		
	}

#------------------------- Agregar Carne -------------------------#

	static public function ctrAgregarCarne(){
		
				
		if (isset($_POST["nombreCarne"])||
			isset($_POST["idUdmCarne"]))
		{
				$datos= array(	'nombreInsumo' => $_POST["nombreCarne"],
								'idUdm' => $_POST["idUdmCarne"],
								'alertaQmin' => $_POST["alertaQminCarne"]);


			$respuesta=ModeloFormularios::mdlAgregarCarne($datos);
			return $respuesta;
		}

	}
	
	#------------------------- Lista de Desbaste -------------------------#

	static public function ctrVerRegistroDesbaste(){
	
		$respuesta= ModeloFormularios::mdlVerRegistroDesbaste();
		return $respuesta;
	}	
	







/*

	#------------------------- ELIMINAR- SE UTILIZA PARA REALIZAR PRUEBAS -------------------------#

	#################DOING!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	static public function prueba1(){

	$respuesta=ControladorFormularios::prueba2();

	return $respuesta;

	}


	#################DOING!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	static public function prueba2(){

		$traspaso=4;
		return $traspaso;
	}
*/

}#cierra la clase

?>