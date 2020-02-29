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
								'alertaQmax' => $_POST["alertaQmax"]);

		}


			$respuesta=ModeloFormularios::mdlAgregarInsumo($datos);

			return $respuesta;
	}


#------------------------- Actualizar stock de Insumo -------------------------#

	static public function ctrActualizarInsumo(){

		if (isset($_POST["idInsumoActI"])||
			isset($_POST["cantidadActI"])||
			isset($_POST["idCuentaActI"])) {

				$datos= array(	'idInsumo' => $_POST["idInsumoActI"],
								'cantidad' => $_POST["cantidadActI"],
								'idCuenta' => $_POST["idCuentaActI"],
								'comentario' => $_POST["comentarioActI"],
								'idUsuario' => $idUsaruiO); #[TO DO] Lo tiene que traer del objeto login ubicado en loginMDL.PHP 
		}

	}





}


?>
