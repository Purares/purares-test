<?php

require_once"modelo/conexion.php";

$conexion=Conexion::conectarBD();

class ModeloFormularios{


	#------------------------- Lista  DEPOSITOS -------------------------#


	static public function mdlListaDeposito(){

		$stmt=conexion::conectarBD()->prepare("SELECT id_deposito, nombre FROM depositos_n");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 

	}


	#------------------------- Lista UDM -------------------------#


	static public function mdlListaUDM(){

		$stmt=conexion::conectarBD()->prepare("SELECT id_udm, nombre FROM udm_n");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}

#------------------------- Lista CUENTAS -------------------------#


	static public function mdlListaCuentas(){

		$stmt=conexion::conectarBD()->prepare("SELECT id_cuenta, nombre FROM cuentas_n");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}


	#------------------------- Stock Insumos -------------------------#

	static public function mdlStockInsumo(){
 
		$stmt=conexion::conectarBD()->prepare("select * from v_stockinsumos;");
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

	#------------------------- ACTUALIZAR STOCK DE INSUMO -------------------------#

static public function mdlActualizarInsumo($datos){

		$stmt=conexion::conectarBD()->prepare("call ins_AgreagarMovInsumo( :id_insumo,:cantidad,:id_cuenta,:comentario,id_usuario);");
		
		$stmt -> bindparam (":id_insumo",$datos(idInsumo_),PDO::PARAM_INT);
		$stmt -> bindparam (":cantidad",$datos(cantidad_),PDO::PARAM_STR); #[TO DO] Cambiar a decimal
		$stmt -> bindparam (":id_cuenta",$datos(idCuenta_),PDO::PARAM_INT);
		$stmt -> bindparam (":comentario",$datos(comentario_),PDO::PARAM_STR); 
		$stmt -> bindparam (":id_usuario",$datos(idUsuario_),PDO::PARAM_INT);

		if ($stmt -> execute()){
			return "OK"; #si se ejecutó correctamente le envío un OK

		}else{
			print_r(conexion::conectarBD());#Si se ejecutó con error le envío el error}
		}
		
		$stmt -> close(); #cierra la conexion
		$stmt =null;
	}


#------------------------- Lista RECETAS -------------------------#


	static public function mdlListaRecetas(){

		$stmt=conexion::conectarBD()->prepare("SELECT * FROM recetas_n");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}


#------------------------- Detalle de RECETA -------------------------#


	static public function mdlDetalleReceta($id_receta){

		$stmt=conexion::conectarBD()->prepare("SELECT * FROM recetas_n where id_receta=$id_receta");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}


#------------------------- Insumos de RECETA -------------------------#


	static public function mdlInsumosReceta($id_receta){

		$stmt=conexion::conectarBD()->prepare("call v_InsumosReceta($id_receta);");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}


#------------------------- Inactivar RECETA -------------------------#


	static public function mdlDesactivarReceta($id_receta){

		$stmt=conexion::conectarBD()->prepare("call act_InactivarReceta($id_receta);");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}

#------------------------- Activar RECETA -------------------------#


	static public function mdlActivarReceta($id_receta){

		$stmt=conexion::conectarBD()->prepare("call act_ActivarReceta($id_receta);");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}


}

?>
