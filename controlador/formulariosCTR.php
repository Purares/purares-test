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

		if (isset($_GET["idCarneVerComposicion"])){

			$id_carne=$_GET["idCarneVerComposicion"];
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

			$cantidadFilas=100;#$_POST["CantidadFilasDesbastes"]; #Debe enviar la cantidad de registro que quiere que le envie. La query envía los registros mas nuevos. [TO DO] PAGINACION

			$respuesta= ModeloFormularios::mdlListaDesbaste($cantidadFilas);
	
			return $respuesta;
		}	
	}	

	#------------------------- Lista de Desbaste -------------------------#

	static public function ctrDetalleDesbaste(){
	
		if (isset($_GET["idDesbasteVerDetalles"])){

			$id_desbaste=$_GET["idDesbasteVerDetalles"];

			$respuesta= ModeloFormularios::mdlDetalleDesbaste($id_desbaste);

			return $respuesta;
		}	
	}
	

	#------------------------- Carnes de Desbaste -------------------------#

	static public function ctrCarnesDesbaste(){
	
		if (isset($_GET["idDesbasteVerDetalles"])){

			$id_desbaste=$_GET["idDesbasteVerDetalles"];

			$respuesta= ModeloFormularios::mdlCarnesDesbaste($id_desbaste);
	
			return $respuesta;
		}	
	}


	#------------------------- Registrar un nuevo DESBASTE -------------------------#

	static public function ctrCrearDesbaste(){

		if (isset($_POST["nroRemitoAltaDesbaste"])||
			isset($_POST["proveedorAltaDesbaste"])||
			isset($_POST["unidadesAltaDesbaste"])||
			isset($_POST["pesoTotalAltaDesbaste"])||
			isset($_POST["fechaDesbasteAltaDesbaste"])) {

$fecha_desbasteV = date("y-m-d",strtotime($_POST["fechaDesbasteAltaDesbaste"]));

				$datosAD= array('nro_remito_' => $_POST["nroRemitoAltaDesbaste"],
								'proveedor_' => $_POST["proveedorAltaDesbaste"],
								'unidades_' => $_POST["unidadesAltaDesbaste"],
								'peso_total_' => $_POST["pesoTotalAltaDesbaste"],
								'fecha_desbaste_' => date("y-m-d",strtotime($_POST["fechaDesbasteAltaDesbaste"])),
								'usuario_alta_'	 => 1, #[TO DO]
								'descripcion_' => $_POST["descripcionAltaDesbaste"]);


				$idDesbaste_nuevo=ModeloFormularios::mdlCrearDesbaste($datosAD,$fecha_desbasteV); 

				$datosMCV= array('id_carne_'=> $_POST["idCarneAltaDesbaste"],
								'cantidad_'=> $_POST["cantidadAltaDesbaste"]);
				

				#$datosMCF= array('id_cuenta_'=>'1',#[To Do] Debemos asignar la que corresponda a DESBASTE
				#				'id_desbaste_'=> $idDesbaste_nuevo,
				#				'id_ordenprod_'=>'', #El procedure es generico, por lo que espera todos
				#				'descripcion_'=>'', #El procedure es generico, por lo que espera todos
				#				'id_usuario_'=> '1');#[TO DO] Deberia tomar el usuario que ingreso

				$respuesta=ControladorFormularios::ctrMovCarnesDesbaste($datosMCV,$idDesbaste_nuevo);

				return $respuesta;
		}

	}
	#--------- Agregar registro de DESBASTE, agrega los cortes ---------#

	static public function ctrMovCarnesDesbaste($datosMCV,$idDesbaste_nuevo){
		
		$logitud=count($datosMCV)+1;

		for ($i=0; $i <$logitud ; $i++) { 

			#Le envía solo la fila por la cual se desplaza el loop
			$idCarneDesbaste=$datosMCV['id_carne_'][$i];
			$qCarneDesbaste=$datosMCV['cantidad_'][$i];

			#crear el Array para enviar

			$datos= array('id_cuenta_'=>'1',#[To Do] Debemos asignar la que corresponda a DESBASTE
							'id_desbaste_'=> $idDesbaste_nuevo,
							'id_ordenprod_'=> null, #El procedure es generico, por lo que espera todos
							'descripcion_'=> null, #El procedure es generico, por lo que espera todos
							'id_usuario_'=> '1',
							'id_carne_'=> $idCarneDesbaste,
							'cantidad_'=> $qCarneDesbaste);#[TO DO] Deberia tomar el usuario que ingreso


			#Inserta el campo en la Base de datos
			$respuesta=ModeloFormularios::mdlMovimientoCarne($datos);
			#Si no dio error sigue el loop
			if ($respuesta != "ok") { return $respuesta;}
		}	

		return "ok";

	}


	#------------------------- Movimientos de Carne -------------------------#

	static public function ctrMovCarne(){

		if (isset($_POST["idCarneMovimientoCarne"])||
			isset($_POST["idCuentaMovimientoCarne"])||
			isset($_POST["idDesbasteMovimientoCarne"])||
			isset($_POST["cantidadMovimientoCarne"])) {

				$datos= array(	'id_carne_'=> $_POST["idCarneMovimientoCarne"],
								'id_cuenta_'=>$_POST["idCuentaMovimientoCarne"],
								'id_desbaste_'=> $_POST["idDesbasteMovimientoCarne"],
								'cantidad_'=> $_POST["cantidadMovimientoCarne"],
								'id_ordenprod_'=>'', #El procedure es generico, por lo que espera todos
								'descripcion_'=> $_POST["descripcionMovimientoCarne"],
								'id_usuario_'=> '1');#[TO DO] Deberia tomar el usuario que ingreso
				
				$respuesta=ControladorFormularios::ctrMovCarnesDesbaste($datos);

				return $respuesta;
		}

	}


	
	#-------------PROCEO PARA ANULAR DESBASTES----------------

#1) Ver que no tenga ningun Movimiento y en caso de que exista un movimiento de carne debe estár anulado.
	#No deben existir OP Sin anular que tengan asociado ese stock
		#QUERY->v_validacion_op-desbaste

	#Chequear que el stock desbaste - stock actual sea cero
		#QUERY-> v_validacion_carne_si-sa


	#-------- Validar que no exista OP sin anular --------#

	static public function ctrValidacionAnularDesbaste1(){

		if (isset($_POST["idDesbasteVerDetalles"])){

			$id_desbaste=$_POST["idDesbasteVerDetalles"];
			$id_desbaste=1;
			
			$respuesta=ModeloFormularios::mdlValidacionAnularDesbaste1($id_desbaste);
			$longitud=count($respuesta);
			
			#el primer if valida que no exista una OP cargada que consuma las carnes de este desbate
			if ($longitud>10) { #si tien OP se fija cuales son
				$opAeliminar= array_column($respuesta,1);#me quedo solo con la columan OP
				$cadena= 'Debe anular la op: ';

					for ($i=0; $i <$longitud ; $i++) {

						$cadena=$cadena.$opAeliminar[$i].', ';
					}
				
				$respuesta= substr($cadena,0,strlen($cadena)-2);
				return $respuesta;				
			}
			#En caso de que no existan OP, validará que mediante otra operación no se halla consumido carnes de este desbaste
			else{
				$respuesta2= ModeloFormularios::mdlValidacionAnularDesbaste2($id_desbaste);
				$longitud2=count($respuesta2);
				$cadena2= 'Debe corregir el stock de las siguientes carnes: <br>';
					for ($i=0; $i < $longitud2 ; $i++) { 
						$carne= $respuesta2[$i][1];
						$cantidad= $respuesta2[$i][2];
						$cadena2= $cadena2.$carne.' ('.$cantidad.'),<br>';
					}
				$respuesta2=substr($cadena2,0,strlen($cadena2)-5);
				return $cadena2;
			}				
		
		#Si llegamos a este punto es porque no tiene OP asociada, ni se consumio de la carne, ahora se ejecutar un group by, el cual anula el desbaste, y un trigger debera realizar el contrasiento


			$datos= array(	'id_desbaste_'=> $id_desbaste,
							'id_usuario_'=>'1');#[TO DO] Deberia tomar el usuario que ingreso

			$respuesta3=ModeloFormularios::mdlAnularDesbaste($datos);



		}	
	}




	static public function prueba(){

		$fecha=date('YYYY-mm-dd');
		$fecha='2020-01-02';#getdate();
		$respuesta=date("y-m-d",strtotime($_POST["fechaDesbasteAltaDesbaste"]));

		return $respuesta;
	}



#2)Al completar el campo Anulado, deberá disparse un trigger en la tabla movimeinto de carnes que haga el contrasiento 	 






	#------------------------- ELIMINAR- SE UTILIZA PARA REALIZAR PRUEBAS -------------------------#

	static public function prueba1(){


	$idCarneAltaDesbaste=[8,9,10,11];
	$cantidadAltaDesbaste=[100,12,312,97];


	$datosA= array(	'id_carne_'=> $idCarneAltaDesbaste,
					'cantidad_'=> $cantidadAltaDesbaste);


	$datosB= array(	'id_cuenta_'=>'1',#[To Do] Debemos asignar la que corresponda a DESBASTE
					'id_desbaste_'=> 33,
					'id_ordenprod_'=>'', #El procedure es generico, por lo que espera todos
					'descripcion_'=>'', #El procedure es generico, por lo que espera todos
					'id_usuario_'=> '1');#[TO DO] Deberia tomar el usuario que ingreso


	
	#$respuesta=$datos2;
	$respuesta= array_column($datos2,1);

	#$respuesta=ControladorFormularios::ctrMovCarnesDesbaste($datos2);
	return $respuesta;



	}


}	#cierra la clase

?>
