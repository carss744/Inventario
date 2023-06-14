<div class="container is-fluid mb-6">
	<h1 class="title">Inventaio</h1>
	<h2 class="subtitle">Actualizar Equipo</h2>
</div>

<div class="container pb-6 pt-6">
	<?php
		include "inc/btn_back.php";

		require_once "php/main.php";

		$id = (isset($_GET['product_id_up'])) ? $_GET['product_id_up'] : 0;
		$id=limpiar_cadena($id);

		/*== Verificando producto ==*/
    	$check_producto=conexion();
    	$check_producto=$check_producto->query("SELECT * FROM inventario_solufast3 WHERE producto_id='$id'");

        if($check_producto->rowCount()>0){
        	$datos=$check_producto->fetch();
	?>

	<div class="form-rest mb-6 mt-6"></div>
	
	<h2 class="title has-text-centered"><?php echo $datos['Nombre_del_Usuario']; ?></h2>

	<!-- FORMULARIO ACTUALIZAR PRODUCTOS -->

	<form action="php/producto_actualizar.php" method="POST" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data" >
	<input type="hidden" name="producto_id" value="<?php echo $datos['producto_id']; ?>" required >

         <!-- Fila 1 -->
		
		<h2 class="subtitle"><strong>INFORMACION GENERAL</strong></h2><hr>
		<div class="columns">
		  	<div class="column">
		    	<div class="control">
					<label>Usuario</label>
				  	<input class="input" type="number" name="producto_usuario" pattern="[0-9]{1,5}" value="<?php echo $datos['Usuario']; ?>"maxlength="5" required >
				</div>
		  	</div>

            <div class="column">
		    	<div class="control">
					<label>Activo</label>
				  	<input class="input" type="number" name="producto_activo" pattern="[0-9]{1,5}" value="<?php echo $datos['Activo']; ?>" maxlength="5" required >
				</div>
		  	</div>

            <div class="column">
		    	<div class="control">
					<label>Puesto de Trabajo</label>
				  	<input class="input" type="number" name="producto_puesto_de_trabajo" pattern="[0-9]{1,5}" value="<?php echo $datos['Puesto_de_Trabajo']; ?>" maxlength="5" required >
				</div>
		  	</div>

            <div class="column">
				<label>Categoría</label><br>
		    	<div class="select is-rounded">
				  	<select name="categoria_id" >
				    	<option value="" selected="" >Seleccione una opción</option>
				    	<?php
    						$categorias=conexion();
    						$categorias=$categorias->query("SELECT * FROM categoria");
    						if($categorias->rowCount()>0){
    							$categorias=$categorias->fetchAll();
    							foreach($categorias as $row){
    								echo '<option value="'.$row['categoria_id'].'" >'.$row['categoria_nombre'].'</option>';
				    			}
				   			}
				   			$categorias=null;
				    	?>
				  	</select>
				</div>
		  	</div>

		  	<div class="column">
		    	<div class="control">
					<label>Centro de Costos</label>
				  	<input class="input" type="text" name="producto_centro_de_costos" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}"value="<?php echo $datos['Centro_de_Costos']; ?>" maxlength="70" required >
				</div>
		  	</div>
		</div><br>

        <!-- Fila 2 -->
		
		<div class="columns">
            <div class="column">
		    	<div class="control">
					<label>Proyecto</label>
				  	<input class="input" type="text" name="producto_proyecto" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}" value="<?php echo $datos['Proyecto']; ?>" maxlength="70" required >
				</div>
		  	</div>

            <div class="column">
		    	<div class="control">
					<label>Ubicacion (Ciudad)</label>
				  	<input class="input" type="text" name="producto_ubicacion_ciudad" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}" value="<?php echo $datos['Ubicacion_Ciudad']; ?>" maxlength="70" required >
				</div>
		  	</div>

            <div class="column">
		    	<div class="control">
					<label>Ubicacion (Direccion)</label>
				  	<input class="input" type="text" name="producto_ubicacion_direccion" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}" value="<?php echo $datos['Ubicacion_Direccion']; ?>" maxlength="70" required >
				</div>
		  	</div>

		  	<div class="column">
		    	<div class="control">
					<label>Gerencia</label>
				  	<input class="input" type="text" name="producto_gerencia" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}" value="<?php echo $datos['Gerencia']; ?>" maxlength="70" required >
				</div>
		  	</div>

		  	<div class="column">
				<label>Propio/Renta</label><br>
		    	<div class="select is-rounded">
				  	<select name="producto_propio_renta" >
				    	<option value="<?php echo $datos['Propio_Renta']; ?>" selected="" ><?php echo $datos['Propio_Renta']; ?>(Actual)</option>
                        <option value="PROPIO">Propio</option>
                        <option value="RENTA">Renta</option>
				  	</select>
				</div>
		  	</div>
		</div><hr><br>

        <!-- Fila 3 -->

		<h2 class="subtitle"><strong>FECHAS DE RENTA DEL EQUIPO</strong></h2><hr>
		<div class="columns">

            <div class="column">
		    	<div class="control">
					<label>FE Entrega del Proveedor</label>
				  	<input class="input" type="text" name="producto_entrega_del_proveedor" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}" value="<?php echo $datos['FE_Entrega_del_Proveedor_de_Renta']; ?>" maxlength="70" required >
				</div>
		  	</div>

            <div class="column">
		    	<div class="control">
					<label>FE Entrega a Usuario</label>
				  	<input class="input" type="text" name="producto_entrega_a_usuario" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}" value="<?php echo $datos['FE_Entrega_a_Usuario_Xolit']; ?>" maxlength="70" required >
				</div>
		  	</div>

            <div class="column">
		    	<div class="control">
					<label>FE Devolucion Usuario</label>
				  	<input class="input" type="text" name="producto_devolucion_usuario" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}" value="<?php echo $datos['FE_Devolución_Usuario_Xolit']; ?>" maxlength="70" required >
				</div>
		  	</div>

            <div class="column">
		    	<div class="control">
					<label>FE Devolucion al Proveedor</label>
				  	<input class="input" type="text" name="producto_devolucion_al_proveedor" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}" value="<?php echo $datos['FE_Devolución_al_Proveedor_de_Renta']; ?>" maxlength="70" required >
				</div>
		  	</div>
		</div><br>

        <!-- Fila 4 -->
		<h2 class="subtitle"><strong>DATOS DEL USUARIO</strong></h2><hr>
		<div class="columns">
            <div class="column">
		    	<div class="control">
					<label>Nombre del Usuario</label>
				  	<input class="input" type="text" name="producto_nombre_usuario" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}" value="<?php echo $datos['Nombre_del_Usuario']; ?>" maxlength="70" required >
				</div>
		  	</div>

            <div class="column">
		    	<div class="control">
					<label>Identificacion</label>
				  	<input class="input" type="number" name="producto_identificacion" pattern="[0-9]{1,10}" value="<?php echo $datos['Identificacion']; ?>" maxlength="10" required >
				</div>
		  	</div>

            <div class="column">
		    	<div class="control">
					<label>Cargo</label>
				  	<input class="input" type="text" name="producto_cargo" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}" value="<?php echo $datos['Cargo']; ?>" maxlength="70" required >
				</div>
		  	</div>

		  	<div class="column">
		    	<div class="control">
					<label>Grupo de Internet</label>
				  	<input class="input" type="text" name="producto_grupo_internet" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}" value="<?php echo $datos['Grupo_de_Internet']; ?>" maxlength="70" required >
				</div>
		  	</div>
        </div><br>

        <!-- Fila 5 -->

		<div class="columns">
			<div class="column">
		    	<div class="control">
					<label>Usuario de Red</label>
				  	<input class="input" type="text" name="producto_usuario_red" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,20}" value="<?php echo $datos['Usuario_Red']; ?>" maxlength="20" required >
				</div>
		  	</div>

            <div class="column">
		    	<div class="control">
					<label>Usuario Local</label>
				  	<input class="input" type="text" name="producto_usuario_local" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,20}" value="<?php echo $datos['Usuario_Local']; ?>" maxlength="20" required >
				</div>
		  	</div>

            <div class="column">
		    	<div class="control">
					<label>Email</label>
				  	<input class="input" type="email" name="producto_email" value="<?php echo $datos['Email']; ?>" maxlength="30" required >
				</div>
		  	</div>
        </div><hr><br>

        <!-- Fila 6 -->
		<h2 class="subtitle"><strong>INFORMACION GENERAL DEL EQUIPO</strong></h2><hr>
		<div class="columns">
				<div class="column">
					<label>HW/SW</label><br>
					<div class="select is-rounded">
						<select name="producto_hw_sw" >
							<option value="<?php echo $datos['HW_SW']; ?>" selected="" ><?php echo $datos['HW_SW']; ?>(Actual)</option>
							<option value="Hardware">Hardware</option>
							<option value="Software">Software</option>
						</select>
					</div>
		  		</div>

		  	<div class="column">
		    	<div class="control">
					<label>Equipo-Licencia</label>
				  	<input class="input" type="text" name="producto_equipo_licencia" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}" value="<?php echo $datos['Equipo_Licencia']; ?>" maxlength="70" required >
				</div>
		  	</div>

		  	<div class="column">
		    	<div class="control">
					<label>Vencimiento Licencia</label>
				  	<input class="input" type="text" name="producto_vencimiento_licencia" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,20}" value="<?php echo $datos['Vencimiento_Licencia']; ?>" maxlength="20" required >
				</div>
		  	</div>

            <div class="column">
		    	<div class="control">
					<label>Proveedor de Venta/Renta</label>
				  	<input class="input" type="text" name="producto_proveedor_venta_renta" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,30}" value="<?php echo $datos['Proveedor_de_Venta_o_Renta']; ?>" maxlength="30" required >
				</div>
		  	</div>
        </div><br>

        <!-- Fila 7 -->

		<div class="columns">
            <div class="column">
		    	<div class="control">
					<label>Nombre del Equipo</label>
				  	<input class="input" type="text" name="producto_nombre_equipo" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,20}" value="<?php echo $datos['Nombre_del_Equipo']; ?>" maxlength="20" required >
				</div>
		  	</div>

            <div class="column">
		    	<div class="control">
					<label>Marca Fabricante</label>
				  	<input class="input" type="text" name="producto_marca_fabricante" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,25}" value="<?php echo $datos['Marca_Fabricante']; ?>" maxlength="25" required >
				</div>
		  	</div>

            <div class="column">
		    	<div class="control">
					<label>Modelo Equipo - Licencia</label>
				  	<input class="input" type="text" name="producto_modelo_equipo" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}" value="<?php echo $datos['Modelo_Equipo_Versión_Licencia']; ?>" maxlength="70" required >
				</div>
		  	</div>

		  	<div class="column">
		    	<div class="control">
					<label>Numero de Serie Equipo</label>
				  	<input class="input" type="text" name="producto_numero_serie" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,30}" value="<?php echo $datos['Numero_de_Serie_Equipo_Licencia']; ?>" maxlength="30" required >
				</div>
		  	</div>

		  	<div class="column">
		    	<div class="control">
					<label>Placa_del_Activo</label>
				  	<input class="input" type="text" name="producto_placa_activo" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,20}" value="<?php echo $datos['Placa_del_Activo']; ?>" maxlength="20" required >
				</div>
		  	</div>
        </div><hr><br>

		<!-- Fila 8 -->
		<h2 class="subtitle"><strong>FACTURA</strong></h2><hr>
		<div class="columns">
			<div class="column">
		    	<div class="control">
					<label>Factura Orden de Ingreso</label>
				  	<input class="input" type="text" name="producto_factura" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,30}" value="<?php echo $datos['factura_id'];?>" maxlength="30" required >
				</div>
		  	</div>

            <div class="column">
		    	<div class="control">
					<label>Fecha de Factura</label>
				  	<input class="input" type="date" name="producto_fecha_factura" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}" value="<?php echo $datos['Fecha_de_Factura_u_OI']; ?>" maxlength="70">
				</div>
		  	</div>

		  	<div class="column">
		    	<div class="control">
					<label>Valor (COP)</label>
				  	<input class="input" type="number" name="producto_valor" pattern="[0-9]{1,20}" value="<?php echo $datos['Valor_COP']; ?>" maxlength="20" required >
				</div>
		  	</div>

		  	<div class="column">
		    	<div class="control">
					<label>Numero Contrato Cotizacion</label>
				  	<input class="input" type="text" name="producto_numero_contrato" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,20}" value="<?php echo $datos['Numero_de_Contrato_Cotización_u_OC']; ?>" maxlength="20" required >
				</div>
		  	</div>
		</div><hr><br>

        <!-- Fila 9 -->
        <h2 class="subtitle"><strong>DETALLES DEL EQUIPO</strong></h2><hr>
		<div class="columns">
            <div class="column">
		    	<div class="control">
					<label>Procesador</label>
				  	<input class="input" type="text" name="producto_procesador" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,20}" maxlength="20" value="<?php echo $datos['Procesador']; ?>" required >
				</div>
		  	</div>

            <div class="column">
		    	<div class="control">
					<label>Velocidad Procesador</label>
				  	<input class="input" type="text" name="producto_vel_procesador" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,15}" value="<?php echo $datos['Vel_Procesador']; ?>" maxlength="15" required >
				</div>
		  	</div>

            <div class="column">
		    	<div class="control">
					<label>Memoria RAM</label>
				  	<input class="input" type="text" name="producto_memoria_ram" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,10}" value="<?php echo $datos['Memoria_RAM']; ?>" maxlength="10" required >
				</div>
		  	</div>

		  	<div class="column">
		    	<div class="control">
					<label>Memoria Adicional</label>
				  	<input class="input" type="text" name="producto_memoria_adicional" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,10}" value="<?php echo $datos['Memoria_Adicional']; ?>" maxlength="10" required >
				</div>
		  	</div>

		  	<div class="column">
		    	<div class="control">
					<label>Memoria Total</label>
				  	<input class="input" type="text" name="producto_memoria_total" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,20}" value="<?php echo $datos['Memoria_Total']; ?>" maxlength="20" required >
				</div>
		  	</div>
        </div><br>

        <!-- Fila 10 -->

		<div class="columns">
            <div class="column">
		    	<div class="control">
					<label>Disco Duro</label>
				  	<input class="input" type="text" name="producto_disco_duro" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,10}" maxlength="10" value="<?php echo $datos['Disco_Duro']; ?>" required >
				</div>
		  	</div>

            <div class="column">
		    	<div class="control">
					<label>Tarjeta de Video</label>
				  	<input class="input" type="text" name="producto_tarjeta_video" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,30}" value="<?php echo $datos['Tarjeta_de_Video']; ?>" maxlength="30" required >
				</div>
		  	</div>

            <div class="column">
		    	<div class="control">
					<label>Direccion IP LAN</label>
				  	<input class="input" type="text" name="producto_direccion_ip_lan" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,20}" value="<?php echo $datos['Direccion_IP_LAN']; ?>" maxlength="20" required >
				</div>
		  	</div>

		  	<div class="column">
		    	<div class="control">
					<label>MAC Address LAN</label>
				  	<input class="input" type="text" name="producto_mac_address_lan" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,20}" value="<?php echo $datos['MAC_Address_LAN']; ?>" maxlength="20" required >
				</div>
		  	</div>

		  	<div class="column">
		    	<div class="control">
					<label>Direccion IP Wireless</label>
				  	<input class="input" type="text" name="producto_direccion_ip_wireless" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,20}" value="<?php echo $datos['Direccion_IP_Wireless']; ?>" maxlength="20" required >
				</div>
		  	</div>
        </div><br>

        <!-- Fila 11 -->

		<div class="columns">
            <div class="column">
		    	<div class="control">
					<label>MAC Address Wireless</label>
				  	<input class="input" type="text" name="producto_mac_address_wireless" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,20}" value="<?php echo $datos['Mac_Address_Wireless']; ?>" maxlength="20" required >
				</div>
		  	</div>

            <div class="column">
		    	<div class="control">
					<label>Orden MTTO</label>
				  	<input class="input" type="text" name="producto_orden_mtto" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,15}" value="<?php echo $datos['Orden_MTTO']; ?>" maxlength="15" required >
				</div>
		  	</div>

            <div class="column">
		    	<div class="control">
					<label>Fecha 1er Mantenimiento</label>
				  	<input class="input" type="date" name="producto_primer_mantenimiento" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,20}" value="<?php echo $datos['Fecha_Primer_Mantenimiento']; ?>" maxlength="20">
				</div>
		  	</div>

		  	<div class="column">
		    	<div class="control">
					<label>Fecha 2do Mantenimiento</label>
				  	<input class="input" type="date" name="producto_segundo_mantenimiento" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,20}" value="<?php echo $datos['Fecha_Segundo_Mantenimiento']; ?>" maxlength="20">
				</div>
		  	</div>

		  	<div class="column">
		    	<div class="control">
					<label>Fecha Revision Inventario</label>
				  	<input class="input" type="date" name="producto_revision_inventario" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,20}" value="<?php echo $datos['Fecha_Revision_Inventario']; ?>" maxlength="20">
				</div>
		  	</div>
        </div><br>

        <!-- Fila 12 -->

		<div class="columns">
            <div class="column">
		    	<div class="control">
					<label>Impresion Color - B/N</label>
				  	<input class="input" type="text" name="producto_impresion" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,10}" value="<?php echo $datos['Impresión_Color_Blanco_y_Negro']; ?>" maxlength="10" required >
				</div>
		  	</div>

            <div class="column">
		    	<div class="control">
					<label>VPN</label>
				  	<input class="input" type="text" name="producto_vpn" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,15}" value="<?php echo $datos['VPN']; ?>" maxlength="15" required >
				</div>
		  	</div>

            <div class="column">
		    	<div class="control">
					<label>Foto</label>
				  	<input class="input" type="text" name="producto_foto" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}" value="<?php echo $datos['Foto']; ?>" maxlength="70" required >
				</div>
		  	</div>

		  	<div class="column">
		    	<div class="control">
					<label>Observaciones</label>
				  	<input class="input" type="text" name="producto_observaciones" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,30}" value="<?php echo $datos['Observaciones']; ?>" maxlength="30" required >
				</div>
		  	</div>
        </div><br>
        
		<p class="has-text-centered">
			<button type="submit" class="button is-link is-rounded">Guardar</button>
		</p>
	</form><br><br><hr><br>

	<!-- FORMULARIO ACTA -->
	<h2 class="subtitle"><strong>SUBIR ACTA DE ENTREGA</strong></h2><hr>
	<form action="php/acta_guardar.php" method="POST" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data" >
		<div class="columns">
			<div class="column">
				<div class="control">
				<label>Acta de Entrega (El archivo debe ser nombrado de la siguiente forma "Acta_(usuario local).pdf")</label>
				<input class="input" type="file" name="acta" accept="application/pdf" required>
				</div>
			</div>
		</div><br>

		<p class="has-text-centered">
		<button type="submit" class="button is-link is-rounded">Subir</button>
		</p>
	</form>

	<?php 
		}else{
			include "inc/error_alert.php";
		}
		$check_producto=null;
	?>
</div>