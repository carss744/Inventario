<?php
	require_once "main.php";

	/*== Almacenando id ==*/
    $id=limpiar_cadena($_POST['producto_id']);

    /*== Verificando producto ==*/
	$check_producto=conexion();
	$check_producto=$check_producto->query("SELECT * FROM inventario_solufast3 WHERE producto_id='$id'");

    if($check_producto->rowCount()<=0){
    	echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El producto no existe en el sistema
            </div>
        ';
        exit();
    }else{
    	$datos=$check_producto->fetch();
    }
    $check_producto=null;


    /*== Almacenando datos ==*/
    /* Fila 1 */
    $producto_id=limpiar_cadena($_POST['producto_id']);    
	$producto_usuario=limpiar_cadena($_POST['producto_usuario']);
	$producto_activo=limpiar_cadena($_POST['producto_activo']);
	$producto_puesto_de_trabajo=limpiar_cadena($_POST['producto_puesto_de_trabajo']);
	$categoria_id=limpiar_cadena($_POST['categoria_id']);
	$producto_centro_de_costos=limpiar_cadena($_POST['producto_centro_de_costos']);

    /* Fila 2 */
	$producto_proyecto=limpiar_cadena($_POST['producto_proyecto']);
	$producto_ubicacion_ciudad=limpiar_cadena($_POST['producto_ubicacion_ciudad']);
	$producto_ubicacion_direccion=limpiar_cadena($_POST['producto_ubicacion_direccion']);
	$producto_gerencia=limpiar_cadena($_POST['producto_gerencia']);
	$producto_propio_renta=limpiar_cadena($_POST['producto_propio_renta']);

    /* Fila 3 */
	$producto_entrega_del_proveedor=limpiar_cadena($_POST['producto_entrega_del_proveedor']);
	$producto_entrega_a_usuario=limpiar_cadena($_POST['producto_entrega_a_usuario']);
	$producto_devolucion_usuario=limpiar_cadena($_POST['producto_devolucion_usuario']);
	$producto_devolucion_al_proveedor=limpiar_cadena($_POST['producto_devolucion_al_proveedor']);

    /* Fila 4 */
	$producto_nombre_usuario=limpiar_cadena($_POST['producto_nombre_usuario']);
	$producto_identificacion=limpiar_cadena($_POST['producto_identificacion']);
	$producto_cargo=limpiar_cadena($_POST['producto_cargo']);
	$producto_grupo_internet=limpiar_cadena($_POST['producto_grupo_internet']);
	$producto_usuario_red=limpiar_cadena($_POST['producto_usuario_red']);

    /* Fila 5 */
	$producto_usuario_local=limpiar_cadena($_POST['producto_usuario_local']);
	$producto_email=limpiar_cadena($_POST['producto_email']);
	$producto_hw_sw=limpiar_cadena($_POST['producto_hw_sw']);
	$producto_equipo_licencia=limpiar_cadena($_POST['producto_equipo_licencia']);
	$producto_vencimiento_licencia=limpiar_cadena($_POST['producto_vencimiento_licencia']);

    /* Fila 6 */
	$producto_proveedor_venta_renta=limpiar_cadena($_POST['producto_proveedor_venta_renta']);
	$producto_factura=limpiar_cadena($_POST['producto_factura']);
	$producto_fecha_factura=limpiar_cadena($_POST['producto_fecha_factura']);
	$producto_valor=limpiar_cadena($_POST['producto_valor']);
	$producto_numero_contrato=limpiar_cadena($_POST['producto_numero_contrato']);

    /* Fila 7 */
	$producto_nombre_equipo=limpiar_cadena($_POST['producto_nombre_equipo']);
	$producto_marca_fabricante=limpiar_cadena($_POST['producto_marca_fabricante']);
	$producto_modelo_equipo=limpiar_cadena($_POST['producto_modelo_equipo']);
	$producto_numero_serie=limpiar_cadena($_POST['producto_numero_serie']);
	$producto_placa_activo=limpiar_cadena($_POST['producto_placa_activo']);

    /* Fila 8 */
	$producto_procesador=limpiar_cadena($_POST['producto_procesador']);
	$producto_vel_procesador=limpiar_cadena($_POST['producto_vel_procesador']);
	$producto_memoria_ram=limpiar_cadena($_POST['producto_memoria_ram']);
	$producto_memoria_adicional=limpiar_cadena($_POST['producto_memoria_adicional']);
	$producto_memoria_total=limpiar_cadena($_POST['producto_memoria_total']);

    /* Fila 9 */
	$producto_disco_duro=limpiar_cadena($_POST['producto_disco_duro']);
	$producto_tarjeta_video=limpiar_cadena($_POST['producto_tarjeta_video']);
	$producto_direccion_ip_lan=limpiar_cadena($_POST['producto_direccion_ip_lan']);
	$producto_mac_address_lan=limpiar_cadena($_POST['producto_mac_address_lan']);
	$producto_direccion_ip_wireless=limpiar_cadena($_POST['producto_direccion_ip_wireless']);

    /* Fila 10 */
	$producto_mac_address_wireless=limpiar_cadena($_POST['producto_mac_address_wireless']);
	$producto_orden_mtto=limpiar_cadena($_POST['producto_orden_mtto']);
	$producto_primer_mantenimiento=limpiar_cadena($_POST['producto_primer_mantenimiento']);
	$producto_segundo_mantenimiento=limpiar_cadena($_POST['producto_segundo_mantenimiento']);
	$producto_revision_inventario=limpiar_cadena($_POST['producto_revision_inventario']);

    /* Fila 11 */
	$producto_impresion=limpiar_cadena($_POST['producto_impresion']);
	$producto_vpn=limpiar_cadena($_POST['producto_vpn']);
	$producto_foto=limpiar_cadena($_POST['producto_foto']);
	$producto_observaciones=limpiar_cadena($_POST['producto_observaciones']);


	/*== Verificando campos obligatorios ==*/
    if(
        $producto_usuario=="" || $producto_activo=="" || $producto_puesto_de_trabajo=="" || $categoria_id=="" || $producto_centro_de_costos=="" || 
        $producto_proyecto=="" || $producto_ubicacion_ciudad=="" || $producto_ubicacion_direccion=="" || $producto_gerencia=="" || $producto_propio_renta=="" ||
        $producto_entrega_del_proveedor=="" || $producto_entrega_a_usuario=="" || $producto_devolucion_usuario=="" || $producto_devolucion_al_proveedor=="" || 
        $producto_nombre_usuario=="" || $producto_identificacion=="" || $producto_cargo=="" || $producto_grupo_internet=="" || $producto_usuario_red=="" ||
        $producto_usuario_local=="" || $producto_email=="" || $producto_hw_sw=="" || $producto_equipo_licencia=="" || $producto_vencimiento_licencia=="" ||
        $producto_proveedor_venta_renta=="" || $producto_factura=="" || $producto_valor=="" || $producto_numero_contrato=="" ||
        $producto_nombre_equipo=="" || $producto_marca_fabricante=="" || $producto_modelo_equipo=="" || $producto_numero_serie=="" || $producto_placa_activo=="" ||
        $producto_procesador=="" || $producto_vel_procesador=="" || $producto_memoria_ram=="" || $producto_memoria_adicional=="" || $producto_memoria_total=="" ||
        $producto_disco_duro=="" || $producto_tarjeta_video=="" || $producto_direccion_ip_lan=="" || $producto_mac_address_lan=="" || $producto_direccion_ip_wireless=="" ||
        $producto_mac_address_wireless=="" || $producto_orden_mtto=="" ||
        $producto_impresion=="" || $producto_vpn=="" || $producto_foto=="" || $producto_observaciones==""){
            
            echo '
                <div class="notification is-danger is-light">
                    <strong>¡Ocurrio un error inesperado!</strong><br>
                    No has llenado todos los campos que son obligatorios
                </div>
            ';
            exit();
        }


    /*== Verificando categoria ==*/
    if($categoria_id!=$datos['categoria_id']){
	    $check_categoria=conexion();
	    $check_categoria=$check_categoria->query("SELECT categoria_id FROM categoria WHERE categoria_id='$categoria_id'");
	    if($check_categoria->rowCount()<=0){
	        echo '
	            <div class="notification is-danger is-light">
	                <strong>¡Ocurrio un error inesperado!</strong><br>
	                La categoría seleccionada no existe
	            </div>
	        ';
	        exit();
	    }
	    $check_categoria=null;
    }

    $guardar_producto=conexion();
    $guardar_producto=$guardar_producto->prepare("INSERT INTO inventario_solufast3(Usuario,Activo,Puesto_de_Trabajo,categoria_id,Centro_de_Costos,Proyecto,Ubicacion_Ciudad,Ubicacion_Direccion,Gerencia,Propio_Renta,FE_Entrega_del_Proveedor_de_Renta,FE_Entrega_a_Usuario_Xolit,FE_Devolución_Usuario_Xolit,FE_Devolución_al_Proveedor_de_Renta,Nombre_del_Usuario,Identificacion,Cargo,Grupo_de_Internet,Usuario_Red,Usuario_Local,Email,HW_SW,Equipo_Licencia,Vencimiento_Licencia,Proveedor_de_Venta_o_Renta,factura_id,Fecha_de_Factura_u_OI,Valor_COP,Numero_de_Contrato_Cotización_u_OC,Nombre_del_Equipo,Marca_Fabricante,Modelo_Equipo_Versión_Licencia,Numero_de_Serie_Equipo_Licencia,Placa_del_Activo,Procesador,Vel_Procesador,Memoria_RAM,Memoria_Adicional,Memoria_Total,Disco_Duro,Tarjeta_de_Video,Direccion_IP_LAN,MAC_Address_LAN,Direccion_IP_Wireless,Mac_Address_Wireless,Orden_MTTO,Fecha_Primer_Mantenimiento,Fecha_Segundo_Mantenimiento,Fecha_Revision_Inventario,Impresión_Color_Blanco_y_Negro,VPN,Foto,Observaciones) VALUES(:producto_usuario,:producto_activo,:producto_puesto_de_trabajo,:categoria_id,:producto_centro_de_costos,:producto_proyecto,:producto_ubicacion_ciudad,:producto_ubicacion_direccion,:producto_gerencia,:producto_propio_renta,:producto_entrega_del_proveedor,:producto_entrega_a_usuario,:producto_devolucion_usuario,:producto_devolucion_al_proveedor,:producto_nombre_usuario,:producto_identificacion,:producto_cargo,:producto_grupo_internet,:producto_usuario_red,:producto_usuario_local,:producto_email,:producto_hw_sw,:producto_equipo_licencia,:producto_vencimiento_licencia,:producto_proveedor_venta_renta,:producto_factura,:producto_fecha_factura,:producto_valor,:producto_numero_contrato,:producto_nombre_equipo,:producto_marca_fabricante,:producto_modelo_equipo,:producto_numero_serie,:producto_placa_activo,:producto_procesador,:producto_vel_procesador,:producto_memoria_ram,:producto_memoria_adicional,:producto_memoria_total,:producto_disco_duro,:producto_tarjeta_video,:producto_direccion_ip_lan,:producto_mac_address_lan,:producto_direccion_ip_wireless,:producto_mac_address_wireless,:producto_orden_mtto,:producto_primer_mantenimiento,:producto_segundo_mantenimiento,:producto_revision_inventario,:producto_impresion,:producto_vpn,:producto_foto,:producto_observaciones)");

    $check_producto=conexion();
    	$check_producto=$check_producto->query("SELECT * FROM inventario_solufast3 WHERE producto_id='$id'");

        if($check_producto->rowCount()>0){
        	$datos=$check_producto->fetch();

    $marcadores2=[
        ":producto_usuario"=>$datos['Usuario'],
        ":producto_activo"=>$datos['Activo'],
        ":producto_puesto_de_trabajo"=>$datos['Puesto_de_Trabajo'],
        ":categoria_id"=>"2",
        ":producto_centro_de_costos"=>$datos['Centro_de_Costos'],
        ":producto_proyecto"=>$datos['Proyecto'],
        ":producto_ubicacion_ciudad"=>$datos['Ubicacion_Ciudad'],
        ":producto_ubicacion_direccion"=>$datos['Ubicacion_Direccion'],
        ":producto_gerencia"=>$datos['Gerencia'],
        ":producto_propio_renta"=>$datos['Propio_Renta'],
        ":producto_entrega_del_proveedor"=>$datos['FE_Entrega_del_Proveedor_de_Renta'],
        ":producto_entrega_a_usuario"=>$datos['FE_Entrega_a_Usuario_Xolit'],
        ":producto_devolucion_usuario"=>$datos['FE_Devolución_Usuario_Xolit'],
        ":producto_devolucion_al_proveedor"=>$datos['FE_Devolución_al_Proveedor_de_Renta'],
        ":producto_nombre_usuario"=>$datos['Nombre_del_Usuario'],
        ":producto_identificacion"=>$datos['Identificacion'],
        ":producto_cargo"=>$datos['Cargo'],
        ":producto_grupo_internet"=>$datos['Grupo_de_Internet'],
        ":producto_usuario_red"=>$datos['Usuario_Red'],
        ":producto_usuario_local"=>$datos['Usuario_Local'],
        ":producto_email"=>$datos['Email'],
        ":producto_hw_sw"=>$datos['HW_SW'],
        ":producto_equipo_licencia"=>$datos['Equipo_Licencia'],
        ":producto_vencimiento_licencia"=>$datos['Vencimiento_Licencia'],
        ":producto_proveedor_venta_renta"=>$datos['Proveedor_de_Venta_o_Renta'],
        ":producto_factura"=>$datos['factura_id'],
        ":producto_fecha_factura"=>$datos['Fecha_de_Factura_u_OI'],
        ":producto_valor"=>"0",
        ":producto_numero_contrato"=>$datos['Numero_de_Contrato_Cotización_u_OC'],
        ":producto_nombre_equipo"=>$datos['Nombre_del_Equipo'],
        ":producto_marca_fabricante"=>$datos['Marca_Fabricante'],
        ":producto_modelo_equipo"=>$datos['Modelo_Equipo_Versión_Licencia'],
        ":producto_numero_serie"=>$datos['Numero_de_Serie_Equipo_Licencia'],
        ":producto_placa_activo"=>$datos['Placa_del_Activo'],
        ":producto_procesador"=>$datos['Procesador'],
        ":producto_vel_procesador"=>$datos['Vel_Procesador'],
        ":producto_memoria_ram"=>$datos['Memoria_RAM'],
        ":producto_memoria_adicional"=>$datos['Memoria_Adicional'],
        ":producto_memoria_total"=>$datos['Memoria_Total'],
        ":producto_disco_duro"=>$datos['Disco_Duro'],
        ":producto_tarjeta_video"=>$datos['Tarjeta_de_Video'],
        ":producto_direccion_ip_lan"=>$datos['Direccion_IP_LAN'],
        ":producto_mac_address_lan"=>$datos['MAC_Address_LAN'],
        ":producto_direccion_ip_wireless"=>$datos['Direccion_IP_Wireless'],
        ":producto_mac_address_wireless"=>$datos['Mac_Address_Wireless'],
        ":producto_orden_mtto"=>$datos['Orden_MTTO'],
        ":producto_primer_mantenimiento"=>$datos['Fecha_Primer_Mantenimiento'],
        ":producto_segundo_mantenimiento"=>$datos['Fecha_Segundo_Mantenimiento'],
        ":producto_revision_inventario"=>$datos['Fecha_Revision_Inventario'],
        ":producto_impresion"=>$datos['Impresión_Color_Blanco_y_Negro'],
        ":producto_vpn"=>$datos['VPN'],
        ":producto_foto"=>$datos['Foto'],
        ":producto_observaciones"=>$datos['Observaciones'],

    ];
}

if(($guardar_producto->execute($marcadores2))){
            echo '
            <div class="notification is-info is-light">
                <strong>¡PRODUCTO GUARDADO!</strong><br>
                El registro anterior se guardo con exito
            </div>
        ';
    }else{
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No se pudo actualizar el producto, por favor intente nuevamente
            </div>
        ';
    }
    
    $guardar_producto=null;


    /*== Actualizando datos ==*/
    $actualizar_producto=conexion();
    $actualizar_producto=$actualizar_producto->prepare("UPDATE inventario_solufast3 SET Usuario=:producto_usuario,Activo=:producto_activo,Puesto_de_Trabajo=:producto_puesto_de_trabajo,categoria_id=:categoria_id,Centro_de_Costos=:producto_centro_de_costos,Proyecto=:producto_proyecto,Ubicacion_Ciudad=:producto_ubicacion_ciudad,Ubicacion_Direccion=:producto_ubicacion_direccion,Gerencia=:producto_gerencia,Propio_Renta=:producto_propio_renta,FE_Entrega_del_Proveedor_de_Renta=:producto_entrega_del_proveedor,FE_Entrega_a_Usuario_Xolit=:producto_entrega_a_usuario,FE_Devolución_Usuario_Xolit=:producto_devolucion_usuario,FE_Devolución_al_Proveedor_de_Renta=:producto_devolucion_al_proveedor,Nombre_del_Usuario=:producto_nombre_usuario,Identificacion=:producto_identificacion,Cargo=:producto_cargo,Grupo_de_Internet=:producto_grupo_internet,Usuario_Red=:producto_usuario_red,Usuario_Local=:producto_usuario_local,Email=:producto_email,HW_SW=:producto_hw_sw,Equipo_Licencia=:producto_equipo_licencia,Vencimiento_Licencia=:producto_vencimiento_licencia,Proveedor_de_Venta_o_Renta=:producto_proveedor_venta_renta,factura_id=:producto_factura,Fecha_de_Factura_u_OI=:producto_fecha_factura,Valor_COP=:producto_valor,Numero_de_Contrato_Cotización_u_OC=:producto_numero_contrato,Nombre_del_Equipo=:producto_nombre_equipo,Marca_Fabricante=:producto_marca_fabricante,Modelo_Equipo_Versión_Licencia=:producto_modelo_equipo,Numero_de_Serie_Equipo_Licencia=:producto_numero_serie,Placa_del_Activo=:producto_placa_activo,Procesador=:producto_procesador,Vel_Procesador=:producto_vel_procesador,Memoria_RAM=:producto_memoria_ram,Memoria_Adicional=:producto_memoria_adicional,Memoria_Total=:producto_memoria_total,Disco_Duro=:producto_disco_duro,Tarjeta_de_Video=:producto_tarjeta_video,Direccion_IP_LAN=:producto_direccion_ip_lan,MAC_Address_LAN=:producto_mac_address_lan,Direccion_IP_Wireless=:producto_direccion_ip_wireless,Mac_Address_Wireless=:producto_mac_address_wireless,Orden_MTTO=:producto_orden_mtto,Fecha_Primer_Mantenimiento=:producto_primer_mantenimiento,Fecha_Segundo_Mantenimiento=:producto_segundo_mantenimiento,Fecha_Revision_Inventario=:producto_revision_inventario,Impresión_Color_Blanco_y_Negro=:producto_impresion,VPN=:producto_vpn,Foto=:producto_foto,Observaciones=:producto_observaciones WHERE producto_id=:id");

    $marcadores=[
        ":producto_usuario"=>$producto_usuario,
        ":producto_activo"=>$producto_activo,
        ":producto_puesto_de_trabajo"=>$producto_puesto_de_trabajo,
        ":categoria_id"=>$categoria_id,
        ":producto_centro_de_costos"=>$producto_centro_de_costos,
        ":producto_proyecto"=>$producto_proyecto,
        ":producto_ubicacion_ciudad"=>$producto_ubicacion_ciudad,
        ":producto_ubicacion_direccion"=>$producto_ubicacion_direccion,
        ":producto_gerencia"=>$producto_gerencia,
        ":producto_propio_renta"=>$producto_propio_renta,
        ":producto_entrega_del_proveedor"=>$producto_entrega_del_proveedor,
        ":producto_entrega_a_usuario"=>$producto_entrega_a_usuario,
        ":producto_devolucion_usuario"=>$producto_devolucion_usuario,
        ":producto_devolucion_al_proveedor"=>$producto_devolucion_al_proveedor,
        ":producto_nombre_usuario"=>$producto_nombre_usuario,
        ":producto_identificacion"=>$producto_identificacion,
        ":producto_cargo"=>$producto_cargo,
        ":producto_grupo_internet"=>$producto_grupo_internet,
        ":producto_usuario_red"=>$producto_usuario_red,
        ":producto_usuario_local"=>$producto_usuario_local,
        ":producto_email"=>$producto_email,
        ":producto_hw_sw"=>$producto_hw_sw,
        ":producto_equipo_licencia"=>$producto_equipo_licencia,
        ":producto_vencimiento_licencia"=>$producto_vencimiento_licencia,
        ":producto_proveedor_venta_renta"=>$producto_proveedor_venta_renta,
        ":producto_factura"=>$producto_factura,
        ":producto_fecha_factura"=>$producto_fecha_factura,
        ":producto_valor"=>$producto_valor,
        ":producto_numero_contrato"=>$producto_numero_contrato,
        ":producto_nombre_equipo"=>$producto_nombre_equipo,
        ":producto_marca_fabricante"=>$producto_marca_fabricante,
        ":producto_modelo_equipo"=>$producto_modelo_equipo,
        ":producto_numero_serie"=>$producto_numero_serie,
        ":producto_placa_activo"=>$producto_placa_activo,
        ":producto_procesador"=>$producto_procesador,
        ":producto_vel_procesador"=>$producto_vel_procesador,
        ":producto_memoria_ram"=>$producto_memoria_ram,
        ":producto_memoria_adicional"=>$producto_memoria_adicional,
        ":producto_memoria_total"=>$producto_memoria_total,
        ":producto_disco_duro"=>$producto_disco_duro,
        ":producto_tarjeta_video"=>$producto_tarjeta_video,
        ":producto_direccion_ip_lan"=>$producto_direccion_ip_lan,
        ":producto_mac_address_lan"=>$producto_mac_address_lan,
        ":producto_direccion_ip_wireless"=>$producto_direccion_ip_wireless,
        ":producto_mac_address_wireless"=>$producto_mac_address_wireless,
        ":producto_orden_mtto"=>$producto_orden_mtto,
        ":producto_primer_mantenimiento"=>$producto_primer_mantenimiento,
        ":producto_segundo_mantenimiento"=>$producto_segundo_mantenimiento,
        ":producto_revision_inventario"=>$producto_revision_inventario,
        ":producto_impresion"=>$producto_impresion,
        ":producto_vpn"=>$producto_vpn,
        ":producto_foto"=>$producto_foto,
        ":producto_observaciones"=>$producto_observaciones,
        ":id"=>$id
    ];

    if(($actualizar_producto->execute($marcadores))){
            echo '
            <div class="notification is-info is-light">
                <strong>¡PRODUCTO REASIGNADO!</strong><br>
                El producto se reasigno con exito
            </div>
        ';
    }else{
    echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
            No se pudo actualizar el producto, por favor intente nuevamente
        </div>
    ';
    }
    $actualizar_producto=null;

    