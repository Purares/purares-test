<?php

!RECETAS
*Agregar Receta 'LISTO'

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

!INSUMOS
*Muestra el stock con un icono a la derecha para realizar un movimiento
	:ctrStockInsumos

*Agregar insumo
	:ctrAgregarInsumo

*Actualiar stock de insumo
	:ctrActualizarInsumo	

--------------------------------------------
!CARNES
*muestra el stock
	:ctrStockCarnes

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