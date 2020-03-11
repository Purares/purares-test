<?php

!RECETAS
*Agregar Receta 'LISTO'

*Crear receta -> !solucionado!#la linea 125 de formulariosMDL busca en una tabla que no existe en la BBDD, eso hace que cuando el usuario selecciona un insumo para agregar a la nueva receta, la unidad de este no se muestre (errorunidad).

*Lista de Recetas -> tiene que tener un botón para insepecionarla
	Activas
	Todas
*Inspeccionar receta
	Encabezado de receta :ctrDetalleReceta
	Insumos de la receta :ctrInsumosReceta
		*Desactivar receta
			:ctrDesactivarReceta

		*Activar receta
			:ctrActivarReceta

*Preguntar a Mariano idea para eficientizar la consulta de lista de recetas porque es muy largo de escribir.

!INSUMOS
*Muestra el stock con un icono a la derecha para realizar un movimiento
	:ctrStockInsumos

*!SOLUCIONADO!#La tabla v_stockinsumos de la BBDD es llamada en la linea 54 de formulariosMDL, pero no contine informacion sobre la unidad de medida de los insumos, esto hace que no se pueda mostrar la unidad de los insumos en la pagina "ver insumos". 
		
		Lo ideal seria almacenar en esa tabla el id de la unidad de medida del insumo en cuestion, y que la call de la linea 54 compare el id de la unidad de medida con los de la tabla de unidad de medida y devuelva el nombre de la unidad de medida para poder mostrarlo en pantalla

*Agregar insumo
	:ctrAgregarInsumo

*Actualiar stock de insumo
	:ctrActualizarInsumo

*Hay que revisar toda el procedure de agregarMovInsumo(), desde el nombre (tiene una a demás) hasta la cantidad de variables (6 en el procedure y 5 cuando se lo llama en la linea 103 de formulariosMDL). En esa linea a id_usuario le faltan los dos puntos. Estimo que pasa algo similar con movimiento carnes

--------------------------------------------
!CARNES
*muestra el stock
	:ctrStockCarnes

*!SOLUCIONADO!#Similar a lo que ocurre con v_stockinsumos, la tabla v_stockcarnes si muestra el id de la unidad de medida de la carne en cuestion, pero lo ideal seria que la compare con la tabla de unidades de medida para que en lugar del id devuelva el nombre de la unidad, a fin de poder mostrarlo en pantalla.

*usar ctrListaCarnes() y ctrListaInsumos() #Ambas tablas (v_stockinsumos y v_stockcarnes) no se actualizan cuando se agrega un nuevo insumo y/o carne, esto hace que no se las pueda mostrar en la pantalla de verinsumos/vercarnes y no se puede realizar ningun movimiento con ellas como por ejemplo setear el stock inicial.

*Agregar Carne
	:ctrAgregarCarne

-------------------------------------------
!DESBASTES
*Muestra los desbaste con un botón para abrirlo
	:ctrVerRegistroDesbaste

*Agregar desbaste  #Tiene que cargar una tabla con todos los cortes de carne activos
	Cortes de carne activos :ctrListaCarnes

	Detalle del debast :ctrCrearDesbaste
	Insertar lista de carnes :ctrMovCarnesDesbaste #lo llama automaticamente el controlador de crear receta
-------------------------------------------
!ORDEN PROD
*Ver OP 
	*Abiertas
		*Eliminar
	*Todas
*Crear OP
*Cerrar OP
?>