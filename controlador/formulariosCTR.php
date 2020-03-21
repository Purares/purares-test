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
		#La función que se está realizando en el front(ej:Actualizar insumo)
		if (isset($_POST["funcion"])){
			$funcion=$_POST["funcion"];
			$respuesta= ModeloFormularios::mdlListaCuentas($funcion);
			return $respuesta;
		}
	}	

#------------------------- Lista desplegable PROVEEDORES -------------------------#

 static public function ctrListaProveedores(){

		if (isset($_POST["tipoProveedor_NuevaCompra"])or(isset($_GET["tipoProveedor_NuevaCompra"]))){
			
			if($_GET["tipoProveedor_NuevaCompra"]){
			$tipoProveedor=$_GET["tipoProveedor_NuevaCompra"];
			}
			else{
			$tipoProveedor=$_POST["tipoProveedor_NuevaCompra"];
			}
		$respuesta= ModeloFormularios::mdlListaProveedor($tipoProveedor); #Tipo: Carnes, Insumos. 
		return $respuesta;
		}
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
	
	$longitud=1;

			$datos= array(	'idInsumo_'		=>$_POST["idInsumoActI"],
							'cantidad_'		=>$_POST["cantidadActI"],
							'idCuenta_'		=>$_POST["idCuentaActI"], #Número fijo para la cuenta compra
							'idOrdenProd_'	=>$array_fill(0,$logitud,null),
							'idCompra_'		=>$array_fill(0,$logitud,null),
							'idUsuario_'	=>$array_fill(0,$logitud,'1'),
							'descripcion_'	=>$_POST["descripcionActI"],
							'funcion_'		=>array_fill(0,$longitud,'ActualizarInsumo'));

		$datos2=array_column($datos,0);
		$respuesta=ModeloFormularios::mdlMovimientoInsumo($datos);

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
			isset($_POST["uFinalXuCrearReceta"])|| #unidades_final_xunidad
			isset($_POST["porcentcarneCrearReceta"])){

			#COMPLETAR EN LA BD:
					$datos= array(	'nombre_' => $_POST["nombreCrearReceta"],
									'diasprod_' => $_POST["diasprodCrearReceta"],
									'diasvenc_' => $_POST["diasvencCrearReceta"],
									'porcentcarne_'	 => $_POST["porcentcarneCrearReceta"],
									'largouni_' => $_POST["largouniCrearReceta"],
									'pesouni_' => $_POST["pesouniCrearReceta"],
									'merma_' => ($_POST["mermaCrearReceta"]/100),
									'unidadesFinalXunidad_' => $_POST["uFinalXuCrearReceta"],
									'descripcion_' => $_POST["descripcionCrearReceta"]);

				#Agrega la Receta y obtiene el ID de la mism
					$idReceta_nueva=ModeloFormularios::mdlCrearReceta($datos);

				#Crea el Array de insumos por receta
					$longitud=count( $_POST["idinsumoCrearReceta"]);	
					$datos2= array(	'idInsumo_'=> $_POST["idinsumoCrearReceta"],
									'cantidadInsumo_'=> $_POST["cantidadinsumoCrearReceta"],
									'idReceta_'=>array_fill(0,$longitud,$idReceta_nueva));

				#Recorre el Array de insumos agregandolos en la BD
					for ($i=0; $i <$longitud ; $i++) { 
					
						$datos3= array_column($datos2,$i);
						$respuesta=ModeloFormularios::mdlAltaInsumosReceta($datos3);
						
					#Si no dio error sigue el loop
						if ($respuesta != "ok") { return $respuesta2;}
					} #exit for

			return $respuesta;
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
								'alertaQmin' => $_POST["alertaQminCarne"],
								'vencimientoDias' => $_POST["vencimientoDiasCarne"]);


			$respuesta=ModeloFormularios::mdlAgregarCarne($datos);
			return $respuesta;
		}

	}
	
	#------------------------- Lista de DESPOSTE -------------------------#

	static public function ctrListaDesposte(){
	
		#if (isset($_POST["CantidadFilasDespostes"])){

			$cantidadFilas=100; #[TO DO] PAGINACION

			$respuesta= ModeloFormularios::mdlListaDesposte($cantidadFilas);
			return $respuesta;

		#}	
	}	

	#------------------------- Lista de DESPOSTE -------------------------#

	static public function ctrDetalleDesposte(){
	
		if (isset($_GET["idDesposteVerDetalles"])){

			$id_desposte=$_GET["idDesposteVerDetalles"];

			$respuesta= ModeloFormularios::mdlDetalleDesposte($id_desposte);

			return $respuesta;
		}	
	}
	

	#------------------------- Carnes de DESPOSTE -------------------------#

	static public function ctrCarnesDesposte(){
	
		if (isset($_GET["idDesposteVerDetalles"])){

			$id_desposte=$_GET["idDesposteVerDetalles"];

			$respuesta= ModeloFormularios::mdlCarnesDesposte($id_desposte);
	
			return $respuesta;
		}	
	}


	#------------------------- Registrar un nuevo DESPOSTE -------------------------#

	static public function ctrCrearDesposte(){

		if (isset($_POST["nroRemitoAltaDesposte"])||
			isset($_POST["proveedorAltaDesposte"])||
			isset($_POST["unidadesAltaDesposte"])||
			isset($_POST["pesoTotalAltaDesposte"])||
			isset($_POST["fechaDesposteAltaDesposte"])) {

			#COMPLETAR LA BD
			$datos= array(	'nroRemito_' => $_POST["nroRemitoAltaDesposte"],
							'proveedor_' => $_POST["proveedorAltaDesposte"],
							'unidades_' => $_POST["unidadesAltaDesposte"],
							'pesoTotal_' => $_POST["pesoTotalAltaDesposte"],
							'fechaDesposte_' => strval(date("y-m-d",strtotime($_POST["fechaDesposteAltaDesposte"]))),
							'usuarioAlta_'	 => 1, #[TO DO]
							'descripcion_' => $_POST["descripcionAltaDesposte"]);

			#Introduce el registro en la BD y recupera el ID
			$idDesposte_nuevo=ModeloFormularios::mdlCrearDesposte($datos); 

			#Crea el Array para realizar los movimiento de Carnes
			$longitud=count($_POST["idCarneAltaDesposte"]);
			
			$datos2= array(	'idCarne_'		=> $_POST["idCarneAltaDesposte"],
							'idCuenta_'		=> array_fill(0,$longitud,1), #VariableFIJA!
							'idDesposte_'	=> array_fill(0,$longitud,$idDesposte_nuevo),
							'cantidad_'		=> $_POST["cantidadAltaDesposte"],
							'idOrenProd_'	=> array_fill(0,$longitud,null),
							'idUsuario_'	=> array_fill(0,$longitud,1),#[TO DO]
							'descripcion_'	=> array_fill(0,$longitud,null));

			#Recorre el Array de insumos agregandolos en la BD
			for ($i=0; $i <$longitud ; $i++) { 
			
				$datos3= array_column($datos2,$i);
				$respuesta=ModeloFormularios::mdlMovimientoCarne($datos3);
				
				#Si no dio error sigue el loop
				if ($respuesta != "ok") { return $respuesta2;}
			} #exit for

			return $respuesta;
		}
	}

	#------------------------- Movimientos de Carne -------------------------#

	static public function ctrMovCarne(){

		if (isset($_POST["idCarneMovimientoCarne"])||
			isset($_POST["idCuentaMovimientoCarne"])||
			isset($_POST["idDesposteMovimientoCarne"])||
			isset($_POST["cantidadMovimientoCarne"])) {

			#Crear el Array con todos los datos que se necesitarán
			$longitud=1;
			$datos2= array(	'idCarne_'		=> [$_POST["idCarneMovimientoCarne"]],
							'idCuenta_'		=> [$_POST["idCuentaMovimientoCarne"]], #VariableFIJA!
							'idDesposte_'	=> [$_POST["idDesposteMovimientoCarne"]],
							'cantidad_'		=> [$_POST["cantidadMovimientoCarne"]],
							'idOrenProd_'	=> array_fill(0,$longitud,null),
							'idUsuario_'	=> array_fill(0,$longitud,1),#[TO DO]
							'descripcion_'	=> [$_POST["descripcionMovimientoCarne"]]);
				
			$datos3 = array_column($datos2,0);
			
			#Validar que exista el stock suficiente para realizar el movimiento
			$respuesta1=ModeloFormularios::mdlValidacionMovCarne($datos3);
		
			$stockActual=$respuesta1[0]['stock'];

				if ($stockActual>=$_POST["cantidadMovimientoCarne"]) {
					#$respuesta='ok';
					$respuesta=ModeloFormularios::mdlMovimientoCarne($datos3);
				}else{
					$respuesta='Stock insuficiente.';
				}
			return $respuesta;

		}
	}


	#-------------PROCEO PARA ANULAR DESPOSTES----------------

	static public function ctrValidacionAnularDesposte(){

			if (isset($_POST["idDesposteVerDetalles"])&&empty($_POST["motivoAnulacionDesposte"])){

			$id_desposte=$_POST["idDesposteVerDetalles"];
			
			#Validar que no exista ninguna OP(no anulada) que consuma las carnes del desposte a anulr
			$respuesta=ModeloFormularios::mdlValidacionAnularDesposte1($id_desposte);
			$longitud=count($respuesta);
			if ($longitud>0) { 
				#En caso de que existan OP cargadas, informará cuales son
				$opAeliminar= array_column($respuesta,1);#Columan de ID_OP
				$cadena= 'Debe anular la op: ';

					for ($i=0; $i <$longitud ; $i++) {
						$cadena=$cadena.$opAeliminar[$i].', ';
					}
				$respuesta= substr($cadena,0,strlen($cadena)-2);
				return $respuesta;					
			}#Exit 1ra validacion
			
			#Validar que la cuenta de carnes del $desposte este en cero. 
			$respuesta2= ModeloFormularios::mdlValidacionAnularDesposte2($id_desposte);
			$longitud2=count($respuesta2);
			if ($longitud2>0) {	
				#En caso de que las cuentas no estén balanceadas le informara que carnes tiene que corregir
				$cadena2= 'Debe corregir el stock de las siguientes carnes: <br>';
					for ($i=0; $i < $longitud2 ; $i++) { 
						$carne= $respuesta2[$i][1];
						$cantidad= $respuesta2[$i][2];
						$cadena2= $cadena2.$carne.' ('.$cantidad.'),<br>';
					}
				$respuesta=substr($cadena2,0,strlen($cadena2)-5);
				return $respuesta;
			}else{
			$respuesta=0;#Exit 2da Validacion
		return $respuesta;
		}	}

			#Si cumple con las dos validaciones pedira que informe porque lo anula
     if (isset($_POST["idDesposteVerDetalles"])&&!empty($_POST["motivoAnulacionDesposte"])){

     			$id_desposte=$_POST["idDesposteVerDetalles"];
				
				#1)Ejecuta un Procedure(act) para anular el desposte.
				#2)Se ejecuta un trigger para realizar el contra-asiente.
				$datos= array(	'idDesposte_'=> $id_desposte,
								'idUsuario_'=>'1',
								'motivoAnulacion_'=> $_POST["motivoAnulacionDesposte"]);#[TO DO]
				$respuesta=ModeloFormularios::mdlAnularDesposte($datos);
				return $respuesta;
			}else{
				$respuesta="error al intentar anular"; #[TO DO] #Envía esta variable para que complete el motivo 
			}
	}

	#------------------------- Compra de INSUMOS -------------------------#

	static public function ctrCompraInsumo(){
	
		if (isset($_POST["idInsumoCompraInsumo"])||
			isset($_POST["cantidadCompraInsumo"])||
			isset($_POST["idProvedorCompraInsumo"])||
			isset($_POST["fechaCompraInsumo"])){

			#Datos de la compra
			$datosC= array(	'idProveedor_'	=> $_POST["idProvedorCompraInsumo"],
							'nroRemito_'	=>$_POST["nroRemitoCompraInsumo"],
							'fechaCompra_'	=> strval(date("y-m-d",strtotime($_POST["fechaCompraInsumo"]))),
							'descripcion_'	=>$_POST["descripcionCompraInsumo"],
							'idUsuario_'	=> '1');#[TO DO] Deberia tomar el usuario que ingreso

			$id_compra_nueva= ModeloFormularios::mdlCompraInsumo($datosC);

			#Datos de los Movimiento de Insumo
			$longitud= count($_POST["idInsumoCompraInsumo"]);

			$datosMI= array('idInsumo_'		=>$_POST["idInsumoCompraInsumo"],
							'cantidad_'		=>$_POST["cantidadCompraInsumo"],
							'idCuenta_'		=>array_fill(0,$longitud,10), #Número fijo para la cuenta compra
							'idOrdenProd_'	=>array_fill(0,$longitud,null),
							'idCompra_'		=>array_fill(0,$longitud,$id_compra_nueva),
							'idUsuario_'	=>array_fill(0,$longitud,'1'),
							'descripcion_'	=>array_fill(0,$longitud,null),
							'funcion_'		=>array_fill(0,$longitud,'CompraInsumo'));

			#Cargar los Movimientos de Insumo
			for ($i=0; $i < $longitud ; $i++) { 
				$datos=array_column($datosMI,$i);
				
				$respuesta=ModeloFormularios::mdlMovimientoInsumo($datos);
				if ($respuesta != "OK") { return $respuesta;}
			}
			
			return $respuesta;
		}	
	}


# !!!ORDENES DE PRODUCCION !!!#

#------------------------- Calculo de Insumos -------------------------#

	static public function ctrCalculoInsumos(){

	#Al seleccionar una Receta, e introducir una Q deberia de ejecutarse esta función
		
		if (isset($_POST["idRecetaAltaOP"])||
			isset($_POST["pesoPastonAltaOP"])){

		$datos= array(	'idRecetaAltaOP_'	=> $_POST["idRecetaAltaOP"],
						'pesoPastonAltaOP_'	=>$_POST["pesoPastonAltaOP"]);

		
		$respuesta1=ModeloFormularios::mdlListaInsumosOP($datos);
		$respuesta2=ModeloFormularios::mdlValidacionStockInsumosOP($datos);

			#Valida si alcanza el stock actual de insumo
			if (count($respuesta2)>0) {
				$validacion="NO";
			}else{
				$validacion="SI";
			}

		$respuesta= array(	'tablaInsumos_' => $respuesta1,
							'validadacion_' => $respuesta2);
		
		}
	}

	#------------------------- Agregar OP -------------------------#

	#static public function ctrCalculoInsumos(){
	#0) Variables post que debe ingresar
	#$$idRecetaAgregarOP=111;
	#$pesoPastonAgregarOP=150;
	#$idCarnesAgregarOP=[1];
	#$catidadCarnesAgregarOP[100];

	#1)Validación de Insumos
	#$Validacion_Insumos=ControladorFormularios::ctrCalculoInsumos();

	#if ($Validacion_Insumos) {
		# code...
	#}

	#2)Validación de Carnes

	#3) Copia los datos de la receta en la OP(es una redundancia de INFO), además agrega el Nro OP,PesoPaston,Fecha

	#4)Movimiento de Insumos (trigger)

	#5)Movimiento de Carnes (Procedure)

	#}

 #---------------------------------------------------------------------

	static public function prueba(){

		$id_receta=111;
		$peso_paston=150;

		$datos= ModeloFormularios::mdlDetalleReceta($id_receta);

		
		$datos = array(
			#Lote de produccion
			'largoUnidad_Lote'		=>$datos[0]['largo_unidad'],#Dato receta #Lote de produccion
			'pesoUnidad_Lote'		=>$datos[0]['peso_unidad'],
			#Esperado
			'merma_Esperado'		=>$datos[0]['merma_esperada'], #Dato Receta
			'largoUnidad_Esperado'	=>$datos[0]['largo_unidad']/$datos[0]['unidades_final_xunidad'],#Producto final
			'pesoUnidad_Esperado'	=>$datos[0]['peso_unidad']/$datos[0]['unidades_final_xunidad']);


		return $datos;
	}


	static public function pruebab(){

		

		$datos= array(	'id_proveedor_'	=> 111,
						'nro_remito_'	=>$_POST["pesoPastonAltaOP"]);

		
		$respuesta1=ModeloFormularios::mdlListaInsumosOP($datos);
		$respuesta2=ModeloFormularios::mdlValidacionStockInsumosOP($datos);

			#Valida si alcanza el stock actual de insumo
			if (count($respuesta2)>0) {
				$validacion="NO";
			}else{
				$validacion="SI";
			}

		$respuesta= array(	'tablaInsumos_' => $respuesta1,
							'validadacion_' => $respuesta2);

	}

	#------------------------- ELIMINAR- SE UTILIZA PARA REALIZAR PRUEBAS -------------------------#

	static public function prueba1(){


	$idCarneAltaDesposte=[8,9,10,11];
	$cantidadAltaDesposte=[100,12,312,97];
	$param1='hola';
	$param2='chau';

	$datosA= array(	'id_carne_'=> $idCarneAltaDesposte,
					'cantidad_'=> $cantidadAltaDesposte);


	$datosB= array(	'id_cuenta_'=>'1',#[To Do] Debemos asignar la que corresponda a DESPOSTE
					'id_desposte_'=> 33,
					'id_ordenprod_'=>'', #El procedure es generico, por lo que espera todos
					'descripcion_'=>'', #El procedure es generico, por lo que espera todos
					'id_usuario_'=> '1');#[TO DO] Deberia tomar el usuario que ingreso


 $logitud=count($idCarneAltaDesposte);

	$datosC = array('id_carne_'=> $idCarneAltaDesposte,
					'cantidad_'=> $cantidadAltaDesposte,
					'param1_'=> array_fill(0,$logitud,$param1));
	


	#$respuesta=array_sum(array_column($datosC,'cantidad_'));

	#$respuesta=array_sum($cantidadAltaDesposte);

	$respuesta= array_column($datosC,0);

	$respuesta=$datosC;

	#$respuesta=ControladorFormularios::ctrMovCarnesDesposte($datos2);
	return $respuesta;
	}

	static public function ctrMovCarnePRUEBA(){

		$idCarneMovimientoCarne=8;
		$idCuentaMovimientoCarne=7;
		$idDesposteMovimientoCarne=9;
		$cantidadMovimientoCarne=99;
		$descripcionMovimientoCarne="HC";

			$longitud=1;

			$datos2= array(	'idCarne_'		=> [$idCarneMovimientoCarne],
							'idCuenta_'		=> [$idCuentaMovimientoCarne], #VariableFIJA!
							'idDesposte_'	=> [$idDesposteMovimientoCarne],
							'cantidad_'		=> [$cantidadMovimientoCarne],
							'idOrenProd_'	=> array_fill(0,$longitud,null),
							'idUsuario_'	=> array_fill(0,$longitud,1),#[TO DO]
							'descripcion_'	=> [$descripcionMovimientoCarne]);
				
			$datos3 = array_column($datos2,0);

			#VALIDACIÓN


			#$respuesta=ModeloFormularios::mdlMovimientoCarne($datos3);
			
			$respuesta1=ModeloFormularios::mdlValidacionMovCarne($datos3);
		
			$stockActual=$respuesta1[0]['stock'];

			if ($stockActual>=$cantidadMovimientoCarne) {
				$respuesta='ok';
			}else{
				$respuesta='no';
			}
			

			return $respuesta;

		
	}






}	#cierra la clase

?>
