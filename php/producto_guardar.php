<?php
	require_once "../inc/session_start.php";
	require_once "main.php";

	/*== Almacenando datos ==*/

    /* Fila 1 */
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

    /* Fila 12 */
    $acta=$_FILES['acta'];
    $nombre_acta=$_FILES['acta']['name'];
    $ruta=$_FILES['acta']['tmp_name'];
    $destino="../actas/".$nombre_acta;


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

	/*== Guardando datos ==*/
    $guardar_producto=conexion();
    $guardar_producto=$guardar_producto->prepare("INSERT INTO inventario_solufast3(Usuario,Activo,Puesto_de_Trabajo,categoria_id,Centro_de_Costos,Proyecto,Ubicacion_Ciudad,Ubicacion_Direccion,Gerencia,Propio_Renta,FE_Entrega_del_Proveedor_de_Renta,FE_Entrega_a_Usuario_Xolit,FE_Devolución_Usuario_Xolit,FE_Devolución_al_Proveedor_de_Renta,Nombre_del_Usuario,Identificacion,Cargo,Grupo_de_Internet,Usuario_Red,Usuario_Local,Email,HW_SW,Equipo_Licencia,Vencimiento_Licencia,Proveedor_de_Venta_o_Renta,factura_id,Fecha_de_Factura_u_OI,Valor_COP,Numero_de_Contrato_Cotización_u_OC,Nombre_del_Equipo,Marca_Fabricante,Modelo_Equipo_Versión_Licencia,Numero_de_Serie_Equipo_Licencia,Placa_del_Activo,Procesador,Vel_Procesador,Memoria_RAM,Memoria_Adicional,Memoria_Total,Disco_Duro,Tarjeta_de_Video,Direccion_IP_LAN,MAC_Address_LAN,Direccion_IP_Wireless,Mac_Address_Wireless,Orden_MTTO,Fecha_Primer_Mantenimiento,Fecha_Segundo_Mantenimiento,Fecha_Revision_Inventario,Impresión_Color_Blanco_y_Negro,VPN,Foto,Observaciones) VALUES(:producto_usuario,:producto_activo,:producto_puesto_de_trabajo,:categoria_id,:producto_centro_de_costos,:producto_proyecto,:producto_ubicacion_ciudad,:producto_ubicacion_direccion,:producto_gerencia,:producto_propio_renta,:producto_entrega_del_proveedor,:producto_entrega_a_usuario,:producto_devolucion_usuario,:producto_devolucion_al_proveedor,:producto_nombre_usuario,:producto_identificacion,:producto_cargo,:producto_grupo_internet,:producto_usuario_red,:producto_usuario_local,:producto_email,:producto_hw_sw,:producto_equipo_licencia,:producto_vencimiento_licencia,:producto_proveedor_venta_renta,:producto_factura,:producto_fecha_factura,:producto_valor,:producto_numero_contrato,:producto_nombre_equipo,:producto_marca_fabricante,:producto_modelo_equipo,:producto_numero_serie,:producto_placa_activo,:producto_procesador,:producto_vel_procesador,:producto_memoria_ram,:producto_memoria_adicional,:producto_memoria_total,:producto_disco_duro,:producto_tarjeta_video,:producto_direccion_ip_lan,:producto_mac_address_lan,:producto_direccion_ip_wireless,:producto_mac_address_wireless,:producto_orden_mtto,:producto_primer_mantenimiento,:producto_segundo_mantenimiento,:producto_revision_inventario,:producto_impresion,:producto_vpn,:producto_foto,:producto_observaciones)");

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
        ":producto_observaciones"=>$producto_observaciones
    ];

    $guardar_producto->execute($marcadores);

    if($guardar_producto->rowCount()==1){
        if (copy($ruta, $destino)) {
            echo '
            <div class="notification is-info is-light">
                <strong>¡PRODUCTO REGISTRADO!</strong><br>
                El producto se registro con exito
            </div>
        ';
        } else {
            echo '
            <div class="notification is-danger is-light">
                <strong>¡El archivo seleccionado no es tipo PDF!</strong><br>
                No se pudo registrar el producto, por favor intente nuevamente
            </div>
        ';
        }
    }else{

        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No se pudo registrar el producto, por favor intente nuevamente
            </div>
        ';
    }
    $guardar_producto=null;