<?php

require_once"modelo/conexion.php";

$conexion=Conexion::conectarBD();

class ModeloFormularios{

	#------------------------- VER INSUMOS -------------------------#

	static public function mdlStockInsumo(){
 
		$stmt=conexion::conectarBD()->prepare("select * from v_stockinsumos;");
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

	static public function mdlAgregarInsumo($datos){

		$stmt=conexion::conectarBD()->prepare("call ins_AgregarInsumo( :nombreInsumo,:id_udn,:id_deposito,:alertaQmax );");
		
		$stmt -> bindparam (":nombreInsumo",$datos(nombreInsumo_),PDO::PARAM_STR);
		$stmt -> bindparam (":idDeposito",$datos(idDeposito_),PDO::PARAM_INT);
		$stmt -> bindparam (":idUm",$datos(idUm_),PDO::PARAM_INT);
		$stmt -> bindparam (":alertaQmax",$datos(alertaQmax_),PDO::PARAM_STR);


		if ($stmt -> execute()){
			return "OK"; #si se ejecutó correctamente le envío un OK

		}else{
			print_r(conexion::conectarBD());#Si se ejecutó con error le envío el error}
		}
		
		$stmt -> close(); #cierra la conexion
		$stmt =null;
	}
}

?>
