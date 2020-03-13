<?php
#ACTUALIZADO 13/3-1.43hs

require_once"modelo/conexion.php";

$conexion=Conexion::conectarBD();

class ModeloFormularios{


	#------------------------- Lista  DEPOSITOS -------------------------#


	static public function mdlListaDeposito(){

		$stmt=conexion::conectarBD()->prepare("SELECT id_deposito, nombre FROM depositos_n where activo=1");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 

	}


	#------------------------- Lista UDM -------------------------#


	static public function mdlListaUDM(){

		$stmt=conexion::conectarBD()->prepare("SELECT id_udm, nombre FROM udm_n where activo=1");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}

#------------------------- Lista CUENTAS -------------------------#


	static public function mdlListaCuentas(){

		$stmt=conexion::conectarBD()->prepare("SELECT id_cuenta, nombre FROM cuentas_n where activo=1");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}

#------------------------- Lista INSUMOS -------------------------#


	static public function mdlListaInsumos(){

		$stmt=conexion::conectarBD()->prepare("SELECT * FROM insumos_n where activo=1");
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

		$stmt=conexion::conectarBD()->prepare("call ins_AgregarInsumo( :_nombre,:_id_udm,:_id_deposito,:_alertaQmin );");
		
		$stmt -> bindparam (":_nombre",$datos['nombreInsumo_'],PDO::PARAM_STR);
		$stmt -> bindparam (":_id_deposito",$datos['idDeposito_'],PDO::PARAM_INT);
		$stmt -> bindparam (":_id_udm",$datos['idUm_'],PDO::PARAM_INT);
		$stmt -> bindparam (":_alertaQmin",$datos ['alertaQmin_'],PDO::PARAM_STR);


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

		$stmt=conexion::conectarBD()->prepare("call ins_AgregarMovInsumo( :id_insumo,:cantidad,:id_cuenta, null,:id_usuario,:comentario);");
		
		$stmt -> bindparam (":id_insumo",$datos['idInsumo_'],PDO::PARAM_INT);
		$stmt -> bindparam (":cantidad",$datos['cantidad_'],PDO::PARAM_STR); 
		$stmt -> bindparam (":id_cuenta",$datos['idCuenta_'],PDO::PARAM_INT);
		$stmt -> bindparam (":comentario",$datos['comentario_'],PDO::PARAM_STR); 
		$stmt -> bindparam (":id_usuario",$datos['idUsuario_'],PDO::PARAM_INT);

		if ($stmt -> execute()){
			return "OK"; #si se ejecutó correctamente le envío un OK

		}else{
			print_r(conexion::conectarBD());#Si se ejecutó con error le envío el error}
		}
		
		$stmt -> close(); #cierra la conexion
		$stmt =null;
	}


#------------------------- Insumos por Depositos -------------------------#


	static public function mdlInsumosDeposito($id_deposito){

		$stmt=conexion::conectarBD()->prepare("SELECT id_insumo, nombre from insumos_n where id_deposito=$id_deposito and activo = 1 order by nombre;");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}

#------------------------- UDM de Insumo  -------------------------#


	static public function mdlUdmInsumo($id_insumo){

		$stmt=conexion::conectarBD()->prepare("SELECT * from v_udminsumo where id_insumo=$id_insumo;");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}


#------------------------- Lista RECETAS -------------------------#


	static public function mdlListaRecetas(){

		$stmt=conexion::conectarBD()->prepare("SELECT * FROM v_lista_recetas");
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

		$stmt=conexion::conectarBD()->prepare("SELECT * FROM v_InsumosReceta where id_receta = $id_receta;");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}



#------------------------- Inactivar RECETA -------------------------#

	static public function mdlDesactivarReceta($id_receta){

		$stmt=conexion::conectarBD()->prepare("call act_InactivarReceta($id_receta);");
		
		if ($stmt -> execute()){
			return "ok";
		}else{ 
			print_r(conexion::conectarBD()->errorInfo());
		}
		
		$stmt -> close(); #cierra la conexion
		$stmt =null;  
	}

#------------------------- Activar RECETA -------------------------#

	static public function mdlActivarReceta($id_receta){

		$stmt=conexion::conectarBD()->prepare("call act_ActivarReceta($id_receta);");
		
		if ($stmt -> execute()){
			return "ok";
		}else{ 
			print_r(conexion::conectarBD()->errorInfo());
		}
		
		$stmt -> close(); #cierra la conexion
		$stmt =null;  
	}


#------------------------- Crear RECETA agrga el encabezado-------------------------#

	static public function mdlCrearReceta($datos){

		$stmt=conexion::conectarBD()->prepare("call ins_AgregarReceta( :nombre,:merma,:diaspord,:diasvenc,:largouni,:pesouni,:porcentcarne,:descripcion);");
		
		$stmt -> bindparam (":nombre",$datos['nombre_'],PDO::PARAM_STR);
		$stmt -> bindparam (":merma",$datos['merma_'],PDO::PARAM_STR);
		$stmt -> bindparam (":diaspord",$datos['diasprod_'],PDO::PARAM_STR);
		$stmt -> bindparam (":diasvenc",$datos['diasvenc_'],PDO::PARAM_STR); 
		$stmt -> bindparam (":largouni",$datos['largouni_'],PDO::PARAM_STR);
		$stmt -> bindparam (":pesouni",$datos['pesouni_'],PDO::PARAM_STR);
		$stmt -> bindparam (":porcentcarne",$datos['porcentcarne_'],PDO::PARAM_STR);
		$stmt -> bindparam (":descripcion",$datos['descripcion_'],PDO::PARAM_STR);

		if ($stmt -> execute()){

				#Busca el ultimo ID insertado en la tabla
				$campo='id_receta';
				$tabla='recetas_n';
				$idReceta_nuevaArray=ModeloFormularios::mdlUltimoId($campo,$tabla);
				$idReceta_nueva=$idReceta_nuevaArray[0][0];
			return $idReceta_nueva;

		}else{ 
			print_r(conexion::conectarBD()->errorInfo());
		}

		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}

#------------------------- Crear RECETA Agrega los insumos -------------------------#

	static public function mdlAltaInsumosReceta($idReceta_nueva,$idInsumoReceta,$qInsumoReceta){

		$stmt=conexion::conectarBD()->prepare("call ins_AgregarInsumosXReceta($idReceta_nueva, $idInsumoReceta, $qInsumoReceta);");

		if ($stmt -> execute()){
			return "ok";
		}else{ 
			print_r(conexion::conectarBD()->errorInfo());
		}

		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}


#------------------------- Lista CARNES -------------------------#


	static public function mdlListaCarnes(){

		$stmt=conexion::conectarBD()->prepare("SELECT * FROM v_carnes ");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}


#------------------------- Stock CARNES------------------------#

	static public function mdlStockCarnes(){
 
		$stmt=conexion::conectarBD()->prepare("SELECT * FROM v_stockcarnes;");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 

	}

#------------------------- Composicion Stock de CARNES------------------------#

	static public function mdlComposicionStockCarnes($id_carne){
 
		$stmt=conexion::conectarBD()->prepare("SELECT * FROM v_composicionstockcarne where id_carne=$id_carne;");

		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 

	}

	#------------------------- AGREGAR CARNE -------------------------#

	static public function mdlAgregarCarne($datos){

		$stmt=conexion::conectarBD()->prepare("call ins_AgregarCarne(:nombreCarne, :idUDM, :alertaQmin);");
		
		$stmt -> bindparam (":nombreCarne",$datos['nombreCarne'],PDO::PARAM_STR);
		$stmt -> bindparam (":idUDM",$datos['idUDM'],PDO::PARAM_INT);
		$stmt -> bindparam (":alertaQmin",$datos['alertaQmin'],PDO::PARAM_INT);


		if ($stmt -> execute()){
			return "OK"; #si se ejecutó correctamente le envío un OK

		}else{
			print_r(conexion::conectarBD());#Si se ejecutó con error le envío el error}
		}
		
		$stmt -> close(); #cierra la conexion
		$stmt =null;
	}

#------------------------- Lista de DESBASTE------------------------#

	static public function mdlListaDesbaste($cantidadFilas){
 
		$stmt=conexion::conectarBD()->prepare("SELECT * FROM v_listadesbaste LIMIT $cantidadFilas;");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 

	}


#------------------------- Detalle de DESBASTE------------------------#

	static public function mdlDetalleDesbaste($id_desbaste){
 
		$stmt=conexion::conectarBD()->prepare("SELECT * FROM v_detalledesbastes where id_desbaste=$id_desbaste;");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 

	}


#-------------------------Carnes de DESBASTE------------------------#

	static public function mdlCarnesDesbaste($id_desbaste){
 
		$stmt=conexion::conectarBD()->prepare("SELECT * FROM v_qcarnesdesbaste where id_desbaste=$id_desbaste;");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 

	}


#------------------------- Registrar un nuevo DESBASTE------------------------#

static public function mdlCrearDesbaste($datos){

		$stmt=conexion::conectarBD()->prepare("call ins_AgregarDesbaste(:nro_remito, :proveedor, :unidades, :peso_total, ':fecha_desbaste', :usuario_alta,:descripcion);");
		
		$stmt -> bindparam (":nro_remito",$datos['nro_remito_'],PDO::PARAM_STR);
		$stmt -> bindparam (":proveedor",$datos['proveedor_'],PDO::PARAM_STR);
		$stmt -> bindparam (":unidades",$datos['unidades_'],PDO::PARAM_STR);
		$stmt -> bindparam (":peso_total",$datos['peso_total_'],PDO::PARAM_STR); 
		$stmt -> bindparam (":fecha_desbaste",$datos['fecha_desbaste_'],PDO::PARAM_STR);
		$stmt -> bindparam (":usuario_alta",$datos['usuario_alta_'],PDO::PARAM_INT);
		$stmt -> bindparam (":descripcion",$datos['descripcion_'],PDO::PARAM_STR);


		if ($stmt -> execute()){

				#Busca el ultimo ID insertado en la tabla
				$campo='id_desbaste';
				$tabla='desbaste_reg';
				$idReceta_nuevaArray=ModeloFormularios::mdlUltimoId($campo,$tabla);
				$idReceta_nueva=$idReceta_nuevaArray[0][0];#De el array solo me quedo con el valor
			return $idReceta_nueva;

		}else{ 
			print_r(conexion::conectarBD()->errorInfo());
		}

		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}

#-------------------------Agregar registro de DESBASTE, agrega los cortes -------------------------#

	static public function mdlMovimientoCarne($datos){

		$stmt=conexion::conectarBD()->prepare("call ins_AgregarMovCarne(:id_carne, :id_cuenta, :id_desbaste, :cantidad, :id_ordenprod, :id_usuario, :descripcion);
");

		$stmt -> bindparam (":id_carne",$datos['id_Carne_'],PDO::PARAM_INT);
		$stmt -> bindparam (":id_cuenta",$datos['id_cuenta_'],PDO::PARAM_INT);
		$stmt -> bindparam (":id_desbaste",$datos['id_desbaste_'],PDO::PARAM_INT);
		$stmt -> bindparam (":cantidad",$datos['cantidad_'],PDO::PARAM_STR);
		$stmt -> bindparam (":id_ordenprod",$datos['id_ordenprod_'],PDO::PARAM_INT);
		$stmt -> bindparam (":id_usuario",$datos['id_usuario_'],PDO::PARAM_INT);
		$stmt -> bindparam (":descripcion",$datos['descripcion_'],PDO::PARAM_STR);

		if ($stmt -> execute()){
			return "ok";
		}else{ 
			print_r(conexion::conectarBD()->errorInfo());
		}

		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}


	#-------------PROCEO PARA ANULAR DESBASTES----------------#

	#-------- Validar que no exista OP sin anular --------#
	static public function mdlValidacionAnularDesbaste1($id_desbaste){
 
		$stmt=conexion::conectarBD()->prepare("SELECT * FROM v_validacion_op_desbaste WHERE id_desbaste= $id_desbaste;");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null; 


	}


	#-------- Validar que la diferencia de Stock sea  cero --------#
	static public function mdlValidacionAnularDesbaste2($id_desbaste){
 
		$stmt=conexion::conectarBD()->prepare("SELECT * FROM v_validacion_carne_difstock0 WHERE id_desbaste= $id_desbaste;");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la 	conexion
		$stmt =null; 


	}


#-------------------------Anular DESBASTE -------------------------#

	static public function mdlAnularDesbaste($datos){

		$stmt=conexion::conectarBD()->prepare("call ins_AgregarMovCarne(:id_carne, :id_cuenta, :id_desbaste, :cantidad, :id_ordenprod, :id_usuario, :descripcion);
");

		$stmt -> bindparam (":id_carne",$datos['id_Carne_'],PDO::PARAM_INT);
		$stmt -> bindparam (":id_cuenta",$datos['id_cuenta_'],PDO::PARAM_INT);
		$stmt -> bindparam (":id_desbaste",$datos['id_desbaste_'],PDO::PARAM_INT);
		$stmt -> bindparam (":cantidad",$datos['cantidad_'],PDO::PARAM_STR);
		$stmt -> bindparam (":id_ordenprod",$datos['id_ordenprod_'],PDO::PARAM_INT);
		$stmt -> bindparam (":id_usuario",$datos['id_usuario_'],PDO::PARAM_INT);
		$stmt -> bindparam (":descripcion",$datos['descripcion_'],PDO::PARAM_STR);

		if ($stmt -> execute()){
			return "ok";
		}else{ 
			print_r(conexion::conectarBD()->errorInfo());
		}

		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}









#ESTA FUNCION DEBERIA SER REEMPLAZADA POR LA FUNCION DEL OBJETO!!!!!!!!!

#------------------------- Ultimo id de la tabla -------------------------#

	static public function mdlUltimoId($campo,$tabla){


		$stmt=conexion::conectarBD()->prepare("SELECT max($campo) from $tabla;");
		$stmt -> execute();
		return $stmt -> fetchAll(); #fetchAll devuelvo todos los registros
		$stmt -> close(); #cierra la conexion
		$stmt =null;
	}




/*

#------------------------- ELIMINAR SE UTILIZA PARA REALIZAR PRUEBAS! -------------------------#

	static public function mdlprueba(){

		$stmt=Conexion::conectarBD()->prepare("call ins_AgregarReceta('prueba202', 0.23, 12, 43, 60, 300, 0.9, 'creando una nueva receta ');
");

		if ($stmt -> execute()){

			#$con = conexion::conectarBD()->mysqli_connect();

		# [TO DO] NO FUNCIONA NINGUNA DE LAS OPCIONES!!!!!
			#$id_insertado= mysqli_insert_id($con);
			$id_insertado= Conexion::conectarBD()->lastInsertId();
			#$id_insertado=conexion::conectarBD()->prepare("SELECT LAST_INSERT_ID();");
			#$id_insertado=1;

			return "$id_insertado";


		}else{ 
			print_r(Conexion::conectarBD()->errorInfo());
		}

		$stmt -> close(); #cierra la conexion
		$stmt =null; 
	}

*/


} #Cierra la clase

?>
