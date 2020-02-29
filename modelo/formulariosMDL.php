<?php

require_once"modelo/conexion.php";

$conexion=Conexion::conectarBD();

class ModeloFormularios{

	#------------------------- VER INSUMOS -------------------------#

	static public function mdlVerInsumos(){
 
		$stmt=conexion::conectarBD()->prepare("select * from v_stock_insumos;");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 

	}

	#------------------------- Lista  DEPOSITOS -------------------------#


	static public function mdlListaDeposito(){

		$stmt=conexion::conectarBD()->prepare("SELECT id_deposito, nombre FROM depositos_n");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 

	}


	#------------------------- Lista  Unidad De Medida -------------------------#


	static public function mdlListaUDM(){

		$stmt=conexion::conectarBD()->prepare("SELECT id_udm, nombre FROM udm_n");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}

	#------------------------- AGREGAR INSUMO -------------------------#

	static public function mdlAgregarInsumo(){


	}
}

?>
