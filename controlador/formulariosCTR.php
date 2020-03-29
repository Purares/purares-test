<?php
#ACTUALIZADO 25/3-1.43hs

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

			#COMPLETAR EN LA BD:
					$datos= array(	'nombre_' => 				$_POST["nombreCrearReceta"],
									'diasProd_' => 				$_POST["diasprodCrearReceta"],
									'diasVenc_' => 				$_POST["diasvencCrearReceta"],
									'porcentCarne_'=> 			round(($_POST["porcentcarneCrearReceta"]/100),3),
									'largoUniLote_' => 			$_POST["largouniLoteCrearReceta"],
									'pesoUniLote_' => 			$_POST["pesouniLoteCrearReceta"],
									'merma_' => 				round(($_POST["mermaCrearReceta"]/100),3),
									'largoUniEsperado_' =>		$_POST["largoUniEsperadoCrearReceta"],
									'pesoUniEsperado_' =>		round($_POST["pesoUniEsperadoCrearReceta"],3),
									'unidadesFinalXunidad_' => 	$_POST["uFinalXuCrearReceta"],
									'descripcion_' => 			$_POST["descripcionCrearReceta"]);

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
						if ($respuesta != "OK") { return $respuesta2;}
					} #exit for OK

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
							'descripcion_'	=> array_fill(0,$longitud,null),
							'funcion_'		=> array_fill(0,$longitud,'Desposte'));

			#Recorre el Array de insumos agregandolos en la BD
			for ($i=0; $i <$longitud ; $i++) { 
			
				$datos3= array_column($datos2,$i);
				$respuesta=ModeloFormularios::mdlMovimientoCarne($datos3);
				
				#Si no dio error sigue el loop
				if ($respuesta != "OK") { return $respuesta2;}
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
					#$respuesta='OK';
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

#------------------------- Lista de Compras -------------------------#

	static public function ctrListaCompras(){

		$respuesta= ModeloFormularios::mdlListaCompras();
		
		return $respuesta;
		
	}



#------------------------- Detalle de Compra -------------------------#

	static public function ctrDetalleCompra(){

		if (isset($_GET["idCompra"])){

			$id_compra= $_GET["idCompra"];
			$respuesta= ModeloFormularios::mdlDetalleCompra($id_compra);
		
			return $respuesta;	
		}
	}

#-------------------------  Validar anulacion de  Compra -------------------------#

static public function ctrValidarAnulacionCompra(){

		if (isset($_GET["idCompra"])){

			$detalleCompra= ModeloFormularios::mdlDetalleCompra($_GET["idCompra"]);
			$anulado=$detalleCompra[0]['anulado'];
			if ($anulado==0) {
				$respuesta="OK";
			}else{
				$respuesta="La Compra Mro:".$_GET["idCompra"]." ya se encuentra anulada";
			}

			return $respuesta;	
		}
	}


#-------------------------  Anular Compra -------------------------#

	static public function ctrAnularCompra(){

		if (isset($_GET["idCompra"])||
			isset($_POST["motivoAnulacionCompra"])) {

			$validacion=ControladorFormularios::ctrValidarAnulacionCompra();
			if ($validacion="OK") {

				$datos= array(	'idCompra_'=> $_GET["idCompra"],
								'idUsuario_'=>'1', #[TO DO]
								'motivoAnulacion_'=> $_POST["motivoAnulacionCompra"]);
					
				$respuesta=ModeloFormularios::mdlAnularCompra($datos);
			}else{
				$respuesta=$validacion;
			}
			
		return $respuesta;
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

#------------------------- Calculo de Insumos 	FRONT!-------------------------#

	static public function ctrCalculoInsumos(){

	#Al seleccionar una Receta, e introducir una Q deberia de ejecutarse esta función
		
		if (isset($_POST["idRecetaAltaOP"])||
			isset($_POST["pesoPastonAltaOP"])){

		$datos= array(	'idRecetaAltaOP_'	=> $_POST["idRecetaAltaOP"],
						'pesoPastonAltaOP_'	=>$_POST["pesoPastonAltaOP"]);
		
		$tablaInsumosOP=ModeloFormularios::mdlListaInsumosOP($datos);
		$respuesta2=ModeloFormularios::mdlValidacionStockInsumosOP($datos);

			#Valida si alcanza el stock actual de insumo
			if (count($respuesta2)>0) {
				$validacion="NO";
			}else{
				$validacion="SI";
			}
		#Transformado la tabla para JSON
		$tablaInsumos=array();
			foreach ($tablaInsumosOP as $insumo) {
				
				$tablaInsumos[]=$insumo;
			}

		$respuesta= array(	'tablaInsumos_'	 => $tablaInsumosOP,
							'validacion_'	 => $validacion);

		#Transformado la tabla para JSON
		$respuestacod=json_encode($respuesta);
		echo $respuestacod;


		}
	}


#------------------------- Calculo de Insumos 	FRONT!-------------------------#

	static public function ctrCalculoInsumosBack(){

	#Al seleccionar una Receta, e introducir una Q deberia de ejecutarse esta función
		
		if (isset($_POST["idRecetaAltaOP"])||
			isset($_POST["pesoPastonAltaOP"])){

			$datos= array(	'idRecetaAltaOP_'	=> $_POST["idRecetaAltaOP"],
							'pesoPastonAltaOP_'	=>$_POST["pesoPastonAltaOP"]);
			
			$tablaInsumosOP=ModeloFormularios::mdlListaInsumosOP($datos);
			$respuesta2=ModeloFormularios::mdlValidacionStockInsumosOP($datos);

				#Valida si alcanza el stock actual de insumo
				if (count($respuesta2)>0) {
					$validacion="NO";
				}else{
					$validacion="SI";
				}
			
			$respuesta= array(	'tablaInsumos_'	 => $tablaInsumosOP,
								'validacion_'	 => $validacion);

		return $respuesta;
		}
	}

	#------------------------- Agregar OP -------------------------#

	static public function ctrAgregarOP(){

		
		if (isset($_POST["idRecetaAltaOP"])||
			isset($_POST["pesoPastonAltaOP"])||
			isset($_POST["idCarnesAgregarOP"])||
			isset($_POST["catidadCarnesAgregarOP"])){


			$carnesOP = array(	'idCarnes' =>$_POST["idCarnesAgregarOP"] ,
								'cantidad' =>$_POST["catidadCarnesAgregarOP"]);


			#1)Validación de Insumos
			$calculo_Insumos=ControladorFormularios::ctrCalculoInsumosBack();
			$validacion_Insumos=$calculo_Insumos['validacion_'];

				if ($validacion_Insumos="SI") {
					
				#2)Validacion de Carnes
					$validacion_Carnes= ControladorFormularios::ctrValidarStockCarnesOP($carnesOP);
					if ($validacion_Carnes='OK') {
						
						#Crear Alta de OP
						$datosOP = array(	'idReceta_' 	=> $_POST["idRecetaAltaOP"],
											'pesoPaston_' 	=> $_POST["pesoPastonAltaOP"], 
											'idUsuario_' 	=> 1 ); #[TO DO]

						$idOrdenProd=ModeloFormularios::mdlAltaOP($datosOP);

						#3)Movimiento de Insumos

							$respuesta=ControladorFormularios::ctrMovInsumoAltaOP($calculo_Insumos,$idOrdenProd);
							if ($respuesta != "OK") { return $respuesta;}

						#4)Movimiento de Carne
							$respuesta=ControladorFormularios::ctrMovCarneAltaOP($carnesOP,$idOrdenProd);
							if ($respuesta != "OK") { return $respuesta;}

					}else{
						$respuesta=$validacion_Carnes;
					}
								
				}else{$respuesta="Stock de Insumos insuficientes";}#cierre de la validación de insumos
			
			return $respuesta;
		}		
	}

#---------------------------------------------------------------------


	static public function ctrValidarCantidadCarnesOP($carnesOP){

		
	}
 #---------------------------------------------------------------------

	static public function ctrValidarStockCarnesOP($carnesOP){


		$longitud=count($carnesOP['idCarnes']);
		$cadena=null;
			for ($i=0; $i <$longitud ; $i++) { 
				
				$respuestaVC=ModeloFormularios::mdlValidacionStockCarnes($carnesOP['idCarnes'][$i]);
				
				#Valida si hay stock de carnes
				if ($respuestaVC[0]['Stock']<$carnesOP['cantidad'][$i]) {
					$cadena=$cadena.$respuestaVC[0]['nombre'].", ";
				}
			}
			#Si Cadena tiene datos envía el mensaje
			if (strlen($cadena)== null) {
				$respuesta="OK";
			}else{
				$respuesta= "Stock insuficiente de las siguientes carnes: ".substr($cadena,0,strlen($cadena)-2).".";}
	return $respuesta;

	}

#--------------------------MOVIMIENTO DE INSUMO PARA ALTA DE OP-------------------------------------------

	static public function ctrMovInsumoAltaOP($calculo_Insumos,$idOrdenProd){

		$tablaInsumos_receta=$calculo_Insumos['tablaInsumos_'];#del array solo me quedo con la tabla de insumos
		$longitud=count($tablaInsumos_receta);#cuento los registros
		
			#Armo el array
			$datosMI= array('idInsumo_'		=>array_column($tablaInsumos_receta, 'id_insumo'),
							'cantidad_'		=>array_column($tablaInsumos_receta, 'cantidad_op'),
							'idCuenta_'		=>array_fill(0,$longitud,2), #Número fijo para la cuenta compra
							'idOrdenProd_'	=>array_fill(0,$longitud,$idOrdenProd),
							'idCompra_'		=>array_fill(0,$longitud,null),
							'idUsuario_'	=>array_fill(0,$longitud,'1'),#[To Do]
							'descripcion_'	=>array_fill(0,$longitud,null),
							'funcion_'		=>array_fill(0,$longitud,'OrdenProd'));
		#Recorro el Array 
		for ($i=0; $i <$longitud ; $i++) { 
			# Inserto insumo por insumo
			$datos=array_column($datosMI,$i);
			$respuesta=ModeloFormularios::mdlMovimientoInsumo($datos);

			if ($respuesta != "OK") { return $respuesta;}
		}

	return "OK";
	}


#--------------------------MOVIMIENTO DE CARNE PARA ALTA DE OP-------------------------------------------

	static public function ctrMovCarneAltaOP($carnesOP,$idOrdenProd){

		$longitud=count($carnesOP['idCarnes']);
		#Con este for navego las carnes que componene a la op
		for ($z=0; $z <$longitud ; $z++) { 
		
			$stockCarnes_composicion=ModeloFormularios::mdlComposicionStockCarnes($carnesOP['idCarnes'][$z]);

			$resta=$carnesOP['cantidad'][$z];
			
			if ($resta>0) {
				$i=0;
				#Navego los desposte para descontarle la carne
				while ( $resta != 0) {

					#IF el stock de ese desposte en menor a lo que resta, descuento toda la carne de ese desposte, ELSE solo lo que resta
					if ($resta>$stockCarnes_composicion[$i]['stock']) {
						$cantidad=$stockCarnes_composicion[$i]['stock'];
					}else{
						$cantidad=$resta;
					}
						#Armo el array
						$datosMC= array(	'idCarne_'		=> [$stockCarnes_composicion[$i]['id_carne']],
											'idCuenta_'		=> [2], #VariableFIJA!
											'idDesposte_'	=> [$stockCarnes_composicion[$i]['id_desposte']],
											'cantidad_'		=> [$cantidad],
											'idOrenProd_'	=> [$idOrdenProd],
											'idUsuario_'	=> [1],#[TO DO]
											'descripcion_'	=> [null],
											'funcion_'		=> ['OrdenProd']);

						#Agregar el registro en la BD
						$respuesta=ModeloFormularios::mdlMovimientoCarne(array_column($datosMC,0));
						if ($respuesta != "OK") { return $respuesta;}

					#A lo que falta repartir le resto la cantidad del desposte anterior
					$resta=$resta-$cantidad;
					$i++;#siguiente desposte

				}#cierra el while de despostes
			}#Cierra el if
		}#cierra el for de carnes

	return "OK";
	}#Cierra la funcion

#------------------------- Lista Orden de produccion -------------------------#

	static public function ctrListaOP(){
		$respuesta= ModeloFormularios::mdlListaOP();
		return $respuesta;
	}	

#------------------------- Detallede Orden De Produccion -------------------------#

	static public function ctrDetalleOP(){

		if (isset($_GET["idOrdenProdDetalle"])){

			$id_OrdenProd=$_GET["idOrdenProdDetalle"];
			$detalleAltaOP= ModeloFormularios::mdlDetalleOpAlta($id_OrdenProd);
			$detalleFinOP=ModeloFormularios::mdlDetalleOpFin($id_OrdenProd);
			$detalleInsumosOP=ModeloFormularios::mdlDetalleOpInsumos($id_OrdenProd);
			$detalleCarnesOP=ModeloFormularios::mdlDetalleOpCarnes($id_OrdenProd);
			$detalleMediciones=ModeloFormularios::mdlDetalleOpMediciones($id_OrdenProd);

			$respuesta = array(	'detalleAltaOP_' 		=> $detalleAltaOP,
								'detalleFinOP_' 		=> $detalleFinOP,
								'detalleInsumosOP_' 	=> $detalleInsumosOP,
								'detalleCarnesOP_' 		=> $detalleCarnesOP,
								'detalleMedicionesesOP_'=> $detalleMediciones);
	
			return $respuesta;	
		}	
	}

#------------------------- Finalizar Orden de produccion -------------------------#

	static public function ctrFinalizarOP(){
				
		if (isset($_POST["idOrdenProdAlta_FinOP"])||
			isset($_POST["productoObtenido_FinOp"])||
			isset($_POST["unidades_FinOP"])||
			isset($_POST["MedicionesPeso_FinOP"])||
			isset($_POST["MedicionesResponsable_FinOP"])||
			isset($_POST["MedicionesFechaMedicion_FinOP"])){


			#valida que la OP Alta no esté anulada
			$detalleAltaOP=ModeloFormularios::mdlDetalleOpAlta($_POST["idOrdenProdAlta_FinOP"]);
			$opAnulada=$detalleAltaOP[0]['anulado'];
			if ($opAnulada=0) {
				
				#valida que ya nose encuentre una finalización de OP que no esté anulada
				$detalleFinOP=ModeloFormularios::mdlDetalleOpFin($_POST["idOrdenProdAlta_FinOP"]);
				$longitud=count($detalleFinOP);
				if ($longitud=0) {

					#Insertar los campos en la finalización de OP
					$datosOP= array('idOrdenProdAlta_'	=> $_POST["idOrdenProdAlta_FinOP"],
									'productoObtenido_'	=> $_POST["productoObtenido_FinOp"],
									'unidadesObtenidas_'=> $_POST["unidades_FinOP"],
									'idUsuarioAlta_'	=> 1); #[TO DO]

						$id_ordenprod_fin=ModeloFormularios::mdlFinOP($datosOP);

					#insertar Datos de Mediciones
					$longitud=count($_POST["MedicionesPeso_FinOP"]);
					
					$datosMediciones=array(
									'idOrdenProdFin_'			=> array_fill(0,$longitud,$id_ordenprod_fin),
									'MedicionesPeso_'			=> $_POST["MedicionesPeso_FinOP"],
									'MedicionesResponsable_'	=> $_POST["MedicionesResponsable_FinOP"],
									'MedicionesFechaMedicion_'	=> strval(date("y-m-d",strtotime($_POST["MedicionesFechaMedicion_FinOP"]))));

					for ($i=0; $i <$longitud ; $i++) {

						$datosM=array_column($datosMediciones,$i);
						$respuesta=ModeloFormularios::mdlAgregarMedicionFinOP($datosM);
						if ($respuesta != "OK") { return $respuesta;}
					}
				}else{
					$respuesta="La OP ".$_POST["idOrdenProdAlta_FinOP"]." ya está finalizada.";	
				}

			}else{
				$respuesta="La OP ".$_POST["idOrdenProdAlta_FinOP"]." se encuetra anulada.";
			}

		return $respuesta;
		}
	}	


}	#cierra la clase

?>
