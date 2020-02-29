<?php


class ControladorFormularios{

#------------------------- VER INSUMOS -------------------------#

	static public function ctrStockInsumos(){

		$respuesta= ModeloFormularios::mdlStockInsumo();
		return $respuesta;
		
	}

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


#------------------------- DATOS DEL NUEVO INSUMO -------------------------#

	static public function ctrNuevoInsumoDatos(){
			
		if (isset($_POST["nombreInsumo"])||
			isset($_POST["idDeposito"])||
			isset($_POST["Unidad"])) {

				$datos= array(	'nombreInsumo_' => , $_POST["nombreInsumo"],
								'idDeposito_' => , $_POST["idDeposito"]
								'idUdm_' => , $_POST["idUdm"])
								'alertaQmax_' => , $_POST["alertaQmax"];

		}

			$respuesta=ModeloFormularios::mdlAgregarInsumo($datos);

			return $respuesta;
	}

}


?>
