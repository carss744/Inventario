<?php
header('Content-type:application/xls');
header('Content-Disposition: attachment; filename=stock_xolit.xls');

require_once('main.php');
$conexion=conexion();

$campos="inventario_solufast3.producto_id,inventario_solufast3.Usuario,inventario_solufast3.Activo,inventario_solufast3.Puesto_de_Trabajo,inventario_solufast3.categoria_id,inventario_solufast3.Centro_de_Costos,inventario_solufast3.Proyecto,inventario_solufast3.Ubicacion_Ciudad,inventario_solufast3.Ubicacion_Direccion,inventario_solufast3.Gerencia,inventario_solufast3.Propio_Renta,inventario_solufast3.FE_Entrega_del_Proveedor_de_Renta,inventario_solufast3.FE_Entrega_a_Usuario_Xolit,inventario_solufast3.FE_Devolución_Usuario_Xolit,inventario_solufast3.FE_Devolución_al_Proveedor_de_Renta,inventario_solufast3.Nombre_del_Usuario,inventario_solufast3.Identificacion,inventario_solufast3.Cargo,inventario_solufast3.Grupo_de_Internet,inventario_solufast3.Usuario_Red,inventario_solufast3.Usuario_Local,inventario_solufast3.Email,inventario_solufast3.HW_SW,inventario_solufast3.Equipo_Licencia,inventario_solufast3.Vencimiento_Licencia,inventario_solufast3.Proveedor_de_Venta_o_Renta,inventario_solufast3.factura_id,inventario_solufast3.Fecha_de_Factura_u_OI,inventario_solufast3.Valor_COP,inventario_solufast3.Numero_de_Contrato_Cotización_u_OC,inventario_solufast3.Nombre_del_Equipo,inventario_solufast3.Marca_Fabricante,inventario_solufast3.Modelo_Equipo_Versión_Licencia,inventario_solufast3.Numero_de_Serie_Equipo_Licencia,inventario_solufast3.Placa_del_Activo,inventario_solufast3.Procesador,inventario_solufast3.Vel_Procesador,inventario_solufast3.Memoria_RAM,inventario_solufast3.Memoria_Adicional,inventario_solufast3.Memoria_Total,inventario_solufast3.Disco_Duro,inventario_solufast3.Tarjeta_de_Video,inventario_solufast3.Direccion_IP_LAN,inventario_solufast3.MAC_Address_LAN,inventario_solufast3.Direccion_IP_Wireless,inventario_solufast3.Mac_Address_Wireless,inventario_solufast3.Orden_MTTO,inventario_solufast3.Fecha_Primer_Mantenimiento,inventario_solufast3.Fecha_Segundo_Mantenimiento,inventario_solufast3.Fecha_Revision_Inventario,inventario_solufast3.Impresión_Color_Blanco_y_Negro,inventario_solufast3.VPN,inventario_solufast3.Foto,inventario_solufast3.Observaciones,categoria.categoria_id,categoria.categoria_nombre";

$datos=$conexion->query("SELECT $campos FROM inventario_solufast3 INNER JOIN categoria ON inventario_solufast3.categoria_id=categoria.categoria_id");
$datos = $datos->fetchAll();

?>
<table id="datos" cellspacing="0" cellpadding="0" border="1">
    <tr class="primary">
        <th scope="col">ID</th>
        <th scope="col">Usuario </th>
        <th scope="col">Activo</th>
        <th scope="col">Puesto de Trabajo</th>
        <th scope="col">Estado</th>
        <th scope="col">Centro de Costos</th>
        <th scope="col">Proyecto</th>
        <th scope="col">Ubicacion Ciudad</th>
        <th scope="col">Ubicacion Direccion</th>
        <th scope="col">Gerencia</th>
        <th scope="col">Propio / Renta</th>
        <th scope="col">FE Entrega del Proveedor de Renta</th>
        <th scope="col">FE Entrega a Usuario Xolit</th>
        <th scope="col">FE Devolución Usuario Xolit</th>
        <th scope="col">FE Devolución al Proveedor de Renta</th>
        <th scope="col">Nombre del Usuario</th>
        <th scope="col">Identificacion (CC)</th>
        <th scope="col">Cargo</th>
        <th scope="col">Grupo de Internet</th>
        <th scope="col">Usuario Red</th>
        <th scope="col">Usuario Local</th>
        <th scope="col">Email</th>
        <th scope="col">HW/SW</th>
        <th scope="col">Equipo-Licencia</th>
        <th scope="col">Vencimiento Licencia</th>
        <th scope="col">Proveedor de Venta o Renta</th>
        <th scope="col">Factura/Orden de Ingreso</th>
        <th scope="col">Fecha de Factura u OI</th>
        <th scope="col">Valor COP</th>
        <th scope="col">Numero de Contrato, Cotización u OC</th>
        <th scope="col">Nombre del Equipo</th>
        <th scope="col">Marca/Fabricante</th>
        <th scope="col">Modelo Equipo/Versión Licencia</th>
        <th scope="col">Numero de Serie Equipo/Licencia</th>
        <th scope="col">Placa del Activo</th>
        <th scope="col">Procesador</th>
        <th scope="col">Vel. Procesador (Ghz)</th>
        <th scope="col">Memoria RAM (GB)</th>
        <th scope="col">Memoria Adicional (GB)</th>
        <th scope="col">Memoria Total (GB)</th>
        <th scope="col">Disco Duro (GB)</th>
        <th scope="col">Tarjeta de Video</th>
        <th scope="col">Direccion IP LAN</th>
        <th scope="col">MAC Address LAN</th>
        <th scope="col">Direccion IP Wireless</th>
        <th scope="col">Mac Address Wireless</th>
        <th scope="col">Orden MTTO</th>
        <th scope="col">Fecha Primer Mantenimiento</th>
        <th scope="col">Fecha Segundo Mantenimiento</th>
        <th scope="col">Fecha Revision Inventario</th>
        <th scope="col">Impresión Color/Blanco y Negro</th>
        <th scope="col">VPN</th>
        <th scope="col">Foto</th>
        <th scope="col">Observaciones</th>
    </tr>
    <?php
        foreach($datos as $fila){
    ?>

    <tr>
        <td scope="col"><?php echo $fila['producto_id'];?></td>
        <td scope="col"><?php echo $fila['Usuario'];?></td>
        <td scope="col"><?php echo $fila['Activo'];?></td>
        <td scope="col"><?php echo $fila['Puesto_de_Trabajo'];?></td>
        <td scope="col"><?php echo $fila['categoria_nombre'];?></td>
        <td scope="col"><?php echo $fila['Centro_de_Costos'];?></td>
        <td scope="col"><?php echo $fila['Proyecto'];?></td>
        <td scope="col"><?php echo $fila['Ubicacion_Ciudad'];?></td>
        <td scope="col"><?php echo $fila['Ubicacion_Direccion'];?></td>
        <td scope="col"><?php echo $fila['Gerencia'];?></td>
        <td scope="col"><?php echo $fila['Propio_Renta'];?></td>
        <td scope="col"><?php echo $fila['FE_Entrega_del_Proveedor_de_Renta'];?></td>
        <td scope="col"><?php echo $fila['FE_Entrega_a_Usuario_Xolit'];?></td>
        <td scope="col"><?php echo $fila['FE_Devolución_Usuario_Xolit'];?></td>
        <td scope="col"><?php echo $fila['FE_Devolución_al_Proveedor_de_Renta'];?></td>
        <td scope="col"><?php echo $fila['Nombre_del_Usuario'];?></td>
        <td scope="col"><?php echo $fila['Identificacion'];?></td>
        <td scope="col"><?php echo $fila['Cargo'];?></td>
        <td scope="col"><?php echo $fila['Grupo_de_Internet'];?></td>
        <td scope="col"><?php echo $fila['Usuario_Red'];?></td>
        <td scope="col"><?php echo $fila['Usuario_Local'];?></td>
        <td scope="col"><?php echo $fila['Email'];?></td>
        <td scope="col"><?php echo $fila['HW_SW'];?></td>
        <td scope="col"><?php echo $fila['Equipo_Licencia'];?></td>
        <td scope="col"><?php echo $fila['Vencimiento_Licencia'];?></td>
        <td scope="col"><?php echo $fila['Proveedor_de_Venta_o_Renta'];?></td>
        <td scope="col"><?php echo $fila['factura_id'];?></td>
        <td scope="col"><?php echo $fila['Fecha_de_Factura_u_OI'];?></td>
        <td scope="col"><?php echo $fila['Valor_COP'];?></td>
        <td scope="col"><?php echo $fila['Numero_de_Contrato_Cotización_u_OC'];?></td>
        <td scope="col"><?php echo $fila['Nombre_del_Equipo'];?></td>
        <td scope="col"><?php echo $fila['Marca_Fabricante'];?></td>
        <td scope="col"><?php echo $fila['Modelo_Equipo_Versión_Licencia'];?></td>
        <td scope="col"><?php echo $fila['Numero_de_Serie_Equipo_Licencia'];?></td>
        <td scope="col"><?php echo $fila['Placa_del_Activo'];?></td>
        <td scope="col"><?php echo $fila['Procesador'];?></td>
        <td scope="col"><?php echo $fila['Vel_Procesador'];?></td>
        <td scope="col"><?php echo $fila['Memoria_RAM'];?></td>
        <td scope="col"><?php echo $fila['Memoria_Adicional'];?></td>
        <td scope="col"><?php echo $fila['Memoria_Total'];?></td>
        <td scope="col"><?php echo $fila['Disco_Duro'];?></td>
        <td scope="col"><?php echo $fila['Tarjeta_de_Video'];?></td>
        <td scope="col"><?php echo $fila['Direccion_IP_LAN'];?></td>
        <td scope="col"><?php echo $fila['MAC_Address_LAN'];?></td>
        <td scope="col"><?php echo $fila['Direccion_IP_Wireless'];?></td>
        <td scope="col"><?php echo $fila['Mac_Address_Wireless'];?></td>
        <td scope="col"><?php echo $fila['Orden_MTTO'];?></td>
        <td scope="col"><?php echo $fila['Fecha_Primer_Mantenimiento'];?></td>
        <td scope="col"><?php echo $fila['Fecha_Segundo_Mantenimiento'];?></td>
        <td scope="col"><?php echo $fila['Fecha_Revision_Inventario'];?></td>
        <td scope="col"><?php echo $fila['Impresión_Color_Blanco_y_Negro'];?></td>
        <td scope="col"><?php echo $fila['VPN'];?></td>
        <td scope="col"><?php echo $fila['Foto'];?></td>
        <td scope="col"><?php echo $fila['Observaciones'];?></td>
    </tr>
    <?php 
    }
    ?>
    </table>

