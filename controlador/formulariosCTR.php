<?php
#ACTUALIZADO 13/3-1.43hs

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


#------------------------- Lista desplegable INSUMOS -------------------------#

	static public function ctrListaInsumos(){
		$respuesta= ModeloFormularios::mdlListaInsumos();
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
			isset($_POST["idUm"]))
		{
				$datos= array(	'nombreInsumo_' => $_POST["nombreInsumo"],
								'idDeposito_' => $_POST["idDeposito"],
								'idUm_' => $_POST["idUm"],
								'alertaQmin_' => $_POST["alertaQmin"]);


			$respuesta=ModeloFormularios::mdlAgregarInsumo($datos);
			return $respuesta;
		}


	}


#------------------------- Actualizar stock de Insumo -------------------------#

	static public function ctrActualizarInsumo(){

		if (isset($_POST["idInsumoActI"])||
			isset($_POST["cantidadActI"])||
			isset($_POST["idCuentaActI"])) {

				$datos= array(	'idInsumo_' => $_GET["idInsumoActI"],
								'cantidad_' => $_POST["cantidadActI"],
								'idCuenta_' => $_POST["idCuentaActI"],
								'comentario_' => $_POST["comentarioActI"],
								'idUsuario_' => 1); #[TO DO]
			
		$respuesta=ModeloFormularios::mdlActualizarInsumo($datos);
		return $respuesta;
		}

			
	}


#------------------------- InsumosXdeposito -------------------------#

	static public function ctrInsumosDeposito(){

		if (isset($_POST["idDepositoFiltroInsumo"])){

			$id_deposito=$_POST["idDepositoFiltroInsumo"];
			$respuesta= ModeloFormularios::mdlInsumosDeposito($id_deposito);
	
			return $respuesta;	
		}

	
	}

#------------------------- IUDM de Insumo -------------------------#

	static public function ctrUdmInsumos(){

		if (isset($_POST["idInsumoAgregarReceta"])){

			$id_insumo=$_POST["idInsumoAgregarReceta"];
			$respuesta= ModeloFormularios::mdlUdmInsumo($id_insumo);
	
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

		if (isset($_GET["idReceta"])){

			$id_receta= $_GET["idReceta"];
			$respuesta= ModeloFormularios::mdlDetalleReceta($id_receta);
		
			return $respuesta;	
		}

	}


#------------------------- Insumos de Receta -------------------------#

	static public function ctrInsumosReceta(){

		if (isset($_GET["idReceta"])){

			$id_receta=$_GET["idReceta"];
			$respuesta= ModeloFormularios::mdlInsumosReceta($id_receta);
	
			return $respuesta;	
		}

	
	}

#------------------------- Desactivar Receta -------------------------#

	static public function ctrDesactivarReceta(){

		if (isset($_POST["idRecetaDetalle"])){

			$id_receta=$_POST["idRecetaDetalle"]; 

			$respuesta= ModeloFormularios::mdlDesactivarReceta($id_receta);
	
			return $respuesta;	
		}

	
	}

#------------------------- Activar Receta -------------------------#

	static public function ctrActivarReceta(){

		if (isset($_POST["idRecetaDetalle"])){

			$id_receta=$_POST["idRecetaDetalle"]; 

			$respuesta= ModeloFormularios::mdlActivarReceta($id_receta);
	
			return $respuesta;	
		}

	
	}


	#------------------------- Crear Receta -------------------------#

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

				$respuesta=ControladorFormularios::ctrAltaInsumosReceta($idReceta_nueva,$datos2);

				return $respuesta;
		}

	
	}
	#------------------------- Alta Insumos por Receta -------------------------#

	static public function ctrAltaInsumosReceta($idReceta_nueva,$datos2){
		
		$logitud=count($datos2);

		for ($i=0; $i <$logitud ; $i++) { 

			#Le envía solo la fila por la cual se desplaza el loop
			$idInsumoReceta=$datos2['id_insumo_'][$i];
			$qInsumoReceta=$datos2['cantidad_insumo_'][$i];

			#Inserta el campo en la Base de datos
			$respuesta2=ModeloFormularios::mdlAltaInsumosReceta($idReceta_nueva,$idInsumoReceta,$qInsumoReceta);
			#Si no dio error sigue el loop
			if ($respuesta2 != "ok") { return $respuesta2;}
		}	

		return "ok";

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

#------------------------- Stock de Carnes -------------------------#

	static public function ctrComposicionStockCarnes(){

		if (isset($_POST["idCarneVerComposicion"])){

			$id_carne=$_POST["idCarneVerComposicion"];
			$respuesta= ModeloFormularios::mdlComposicionStockCarnes($id_carne);
			
			return $respuesta;
		}		
	}

#------------------------- Agregar Carne -------------------------#

	static public function ctrAgregarCarne(){
		
				
		if (isset($_POST["nombreCarne"])||
			isset($_POST["idUdmCarne"]))
		{
				$datos= array(	'nombreCarne' => $_POST["nombreCarne"],
								'idUDM' => $_POST["idUdmCarne"],
								'alertaQmin' => $_POST["alertaQminCarne"]);


			$respuesta=ModeloFormularios::mdlAgregarCarne($datos);
			return $respuesta;
		}

	}
	
	#------------------------- Lista de Desbaste -------------------------#

	static public function ctrListaDesbaste(){
	
		if (isset($_POST["CantidadFilasDesbastes"])){

			$cantidadFilas=$_POST["CantidadFilasDesbastes"]; #Debe enviar la cantidad de registro que quiere que le envie. La query envía los registros mas nuevos.

			$respuesta= ModeloFormularios::mdlListaDesbaste($cantidadFilas);
	
			return $respuesta;
		}	
	}	

	#------------------------- Lista de Desbaste -------------------------#

	static public function ctrDetalleDesbaste(){
	
		if (isset($_POST["idDesbasteVerDetalles"])){

			$id_desbaste=$_POST["idDesbasteVerDetalles"];

			$respuesta= ModeloFormularios::mdlDetalleDesbaste($id_desbaste);
	
		}	
	}
	

	#------------------------- Carnes de Desbaste -------------------------#

	static public function ctrCarnesDesbaste(){
	
		if (isset($_POST["idDesbasteVerDetalles"])){

			$id_desbaste=$_POST["idDesbasteVerDetalles"];

			$respuesta= ModeloFormularios::mdlDetalleDesbaste($id_desbaste);
	
			return $respuesta;
		}	
	}


	#------------------------- Registrar un nuevo DESBASTE -------------------------#

	static public function ctrCrearDesbaste(){

		if (isset($_POST["nroRemitoAltaDesbaste"])||
			isset($_POST["proveedorAltaDesbaste"])||
			isset($_POST["diasprodCrearReceta"])||
			isset($_POST["unidadesAltaDesbaste"])||
			isset($_POST["pesoTotalAltaDesbaste"])||
			isset($_POST["fechaDesbasteAltaDesbaste"])) {

				$datos= array(	'nro_remito_' => $_POST["nroRemitoAltaDesbaste"],
								'proveedor_' => $_POST["proveedorAltaDesbaste"],
								'unidades_' => $_POST["unidadesAltaDesbaste"],
								'peso_total_' => $_POST["pesoTotalAltaDesbaste"],
								'fecha_desbaste_' => $_POST["fechaDesbasteAltaDesbaste"],
								'usuario_alta_'	 => '1', #[TO DO]
								'descripcion_' => $_POST["descripcionAltaDesbaste"]);

				$idDesbaste_nuevo=ModeloFormularios::mdlCrearDesbaste($datos); 

				$datos2= array(	'id_carne_'=> $_POST["idCarneAltaDesbaste"],
								'id_cuenta_'=>'1',#[To Do] Debemos asignar la que corresponda a DESBASTE
								'id_desbaste_'=> $idDesbaste_nuevo,
								'cantidad_'=> $_POST["cantidadAltaDesbaste"],
								'id_ordenprod_'=>'', #El procedure es generico, por lo que espera todos
								'descripcion_'=>'', #El procedure es generico, por lo que espera todos
								'id_usuario_'=> '1');#[TO DO] Deberia tomar el usuario que ingreso
				
				$respuesta=ControladorFormularios::ctrMovCarnesDesbaste($datos2);

				return $respuesta;
		}

	}
	#--------- Agregar registro de DESBASTE, agrega los cortes ---------#

	static public function ctrMovCarnesDesbaste($datos){
		
		$logitud=count($datos);

		for ($i=0; $i <$logitud ; $i++) { 

			#Le envía solo la fila por la cual se desplaza el loop
			$datos3=array_column($datos, $i);

			#Inserta el campo en la Base de datos
			$respuesta=ModeloFormularios::mdlMovimientoCarne($datos3);
			#Si no dio error sigue el loop
			if ($respuesta != "ok") { return $respuesta;}
		}	

		return "ok";

	}

	
	#-------------PROCEO PARA ANULAR DESBASTES----------------

#1) Ver que no tenga ningun Movimiento y en caso de que exista un movimiento de carne debe estár anulado.
	#No deben existir OP Sin anular que tengan asociado ese stock
		#QUERY->v_validacion_op-desbaste

	#Chequear que el stock desbaste - stock actual sea cero
		#QUERY-> v_validacion_carne_si-sa


	#-------- Validar que no exista OP sin anular --------#

	static public function ctrValidacionAnularDesbaste1(){

		#if (isset($_POST["idDesbasteVerDetalles"])){

			#$id_desbaste=$_POST["idDesbasteVerDetalles"];
			$id_desbaste=1;
			
			$respuesta=ModeloFormularios::mdlValidacionAnularDesbaste1($id_desbaste);
			$longitud=count($respuesta);
	
			if ($longitud>0) {
				$opAeliminar= array_column($respuesta,1);	
				$cadena= 'Debe anular la op: ';

					for ($i=0; $i <$longitud ; $i++) { 
						$id_opAeliminar = $opAeliminar[$i];
						$cadena=$cadena.$opAeliminar[$i].', ';
					}
				$respuesta= substr($cadena,0,strlen($cadena)-2);
				return $respuesta;				
			}
			#else{
			#	$respuesta2= ModeloFormularios::mdlValidacionAnularDesbaste2($id_desbaste);
			#	$longitud=count($respuesta2);
			#}



		#}	
	}





#2)Al completar el campo Anulado, deberá disparse un trigger en la tabla movimeinto de carnes que haga el contrasiento 	 




/*

	#------------------------- ELIMINAR- SE UTILIZA PARA REALIZAR PRUEBAS -------------------------#

	static public function prueba1(){


	$cadena1=["z","x","y","w"];
	$cadena2=["a","b","c","d"];

	$datos = array(	'uno' => $cadena1,
					'dos'=> $cadena2);

	#for ($i=0 ; $i <3 ; $i++) { 
		
		$respuesta = array_column($datos, 0);
		#$respuesta = $arrayName = array('' => , );$datos=>0;

	#}

	return $respuesta;
	}


	#################DOING!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	static public function prueba2(){

		$respuesta= ModeloFormularios::mdlprueba();
		return $respuesta;
	}
*/

}	#cierra la clase

?>
