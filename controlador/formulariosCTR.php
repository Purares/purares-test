<?php


class ControladorFormularios{

#------------------------- VER INSUMOS -------------------------#

	static public function ctrMostrarStockInsumos(){

		$respuesta= ModeloFormularios::mdlVerInsumos();
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
			$tabla="insumos_n";
			$datos= array('nombre' => $_POST["nombreNUevoInsumo"],
						  'udm' => $_POST["udmNuevoIsumo"],
						  'deposito' => $_POST["depositoNuevoIsumo"],
						  'alertaQmin' => $_POST["alertaQminNuevoInsumo"]);

			$respuesta=$datos;
			#$respuesta= ModeloFormularios::mdlRegistro($tabla,$datos);

			return $respuesta;
	}

}


?>
