<?php
if ($_SESSION['rol']=="Administrador") {
	$inicio = ($pagina>0) ? (($pagina * $registros)-$registros) : 0;
	$tabla="";

	$campos="inventario_solufast3.producto_id,inventario_solufast3.Usuario,inventario_solufast3.Activo,inventario_solufast3.Puesto_de_Trabajo,inventario_solufast3.categoria_id,inventario_solufast3.Centro_de_Costos,inventario_solufast3.Proyecto,inventario_solufast3.Ubicacion_Ciudad,inventario_solufast3.Ubicacion_Direccion,inventario_solufast3.Gerencia,inventario_solufast3.Propio_Renta,inventario_solufast3.FE_Entrega_del_Proveedor_de_Renta,inventario_solufast3.FE_Entrega_a_Usuario_Xolit,inventario_solufast3.FE_Devolución_Usuario_Xolit,inventario_solufast3.FE_Devolución_al_Proveedor_de_Renta,inventario_solufast3.Nombre_del_Usuario,inventario_solufast3.Identificacion,inventario_solufast3.Cargo,inventario_solufast3.Grupo_de_Internet,inventario_solufast3.Usuario_Red,inventario_solufast3.Usuario_Local,inventario_solufast3.Email,inventario_solufast3.HW_SW,inventario_solufast3.Equipo_Licencia,inventario_solufast3.Vencimiento_Licencia,inventario_solufast3.Proveedor_de_Venta_o_Renta,inventario_solufast3.factura_id,inventario_solufast3.Fecha_de_Factura_u_OI,inventario_solufast3.Valor_COP,inventario_solufast3.Numero_de_Contrato_Cotización_u_OC,inventario_solufast3.Nombre_del_Equipo,inventario_solufast3.Marca_Fabricante,inventario_solufast3.Modelo_Equipo_Versión_Licencia,inventario_solufast3.Numero_de_Serie_Equipo_Licencia,inventario_solufast3.Placa_del_Activo,inventario_solufast3.Procesador,inventario_solufast3.Vel_Procesador,inventario_solufast3.Memoria_RAM,inventario_solufast3.Memoria_Adicional,inventario_solufast3.Memoria_Total,inventario_solufast3.Disco_Duro,inventario_solufast3.Tarjeta_de_Video,inventario_solufast3.Direccion_IP_LAN,inventario_solufast3.MAC_Address_LAN,inventario_solufast3.Direccion_IP_Wireless,inventario_solufast3.Mac_Address_Wireless,inventario_solufast3.Orden_MTTO,inventario_solufast3.Fecha_Primer_Mantenimiento,inventario_solufast3.Fecha_Segundo_Mantenimiento,inventario_solufast3.Fecha_Revision_Inventario,inventario_solufast3.Impresión_Color_Blanco_y_Negro,inventario_solufast3.VPN,inventario_solufast3.Foto,inventario_solufast3.Observaciones,categoria.categoria_id,categoria.categoria_nombre";

	if(isset($busqueda) && $busqueda!=""){

		$consulta_datos="SELECT $campos FROM inventario_solufast3 INNER JOIN categoria ON inventario_solufast3.categoria_id=categoria.categoria_id  WHERE inventario_solufast3.Nombre_del_Usuario LIKE '%$busqueda%' OR inventario_solufast3.Usuario_Local LIKE '%$busqueda%' OR inventario_solufast3.Nombre_del_Equipo LIKE '%$busqueda%' OR inventario_solufast3.Equipo_Licencia LIKE '%$busqueda%' OR inventario_solufast3.cargo LIKE '%$busqueda%' ORDER BY inventario_solufast3.producto_id ASC LIMIT $inicio,$registros";
		$consulta_total="SELECT COUNT(producto_id) FROM inventario_solufast3 WHERE Usuario_Local LIKE '%$busqueda%' OR Nombre_del_Usuario LIKE '%$busqueda%' OR Nombre_del_Equipo LIKE '%$busqueda%' OR Equipo_Licencia LIKE '%$busqueda%' OR cargo LIKE '%$busqueda%'";

	}elseif($categoria_id>0){

		$consulta_datos="SELECT $campos FROM inventario_solufast3 INNER JOIN categoria ON inventario_solufast3.categoria_id=categoria.categoria_id WHERE inventario_solufast3.categoria_id='$categoria_id' ORDER BY inventario_solufast3.producto_id ASC LIMIT $inicio,$registros";
		$consulta_total="SELECT COUNT(producto_id) FROM inventario_solufast3 WHERE categoria_id='$categoria_id'";

	}else{

		$consulta_datos="SELECT $campos FROM inventario_solufast3 INNER JOIN categoria ON inventario_solufast3.categoria_id=categoria.categoria_id ORDER BY inventario_solufast3.producto_id ASC LIMIT $inicio,$registros";
		$consulta_total="SELECT COUNT(producto_id) FROM inventario_solufast3";

	}

	$conexion=conexion();

	$datos = $conexion->query($consulta_datos);
	$datos = $datos->fetchAll();

	$total = $conexion->query($consulta_total);
	$total = (int) $total->fetchColumn();

	$Npaginas =ceil($total/$registros);

	$tabla.='
	<div class="table-container tabla-p" align="right">
		<a class="button is-link is-rounded is-small" href="index.php?vista=product_search"><i class="fa-solid fa-magnifying-glass"></i></a>
		<a class="button is-link is-rounded is-small" href="index.php?vista=product_new"><i class="fa-solid fa-plus"></i></a>
		<hr>
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
                <tr class="has-text-centered">
                	<th>#</th>
					<th>ID</th>
                    <th>Nombre del Usuario</th>
					<th>Estado</th>
                    <th>Equipo</th>
					<th>Serial</th>
					<th>Numero Factura</th>
                    <th>Observaciones</th>
                    <th>Reasignar</th>
                </tr>
            </thead>
            <tbody>
	';

	if($total>=1 && $pagina<=$Npaginas){
		$contador=$inicio+1;
		$pag_inicio=$inicio+1;
		foreach($datos as $rows){
			$tabla.='
				<tr class="has-text-centered" >
					<td>'.$contador.'</td>
					<td>'.$rows['producto_id'].'</td>
                    <td><a href="actas/'.$rows['Usuario_Red'].'.pdf" target="blank">'.$rows['Nombre_del_Usuario'].'</a></td>
                    <td>'.$rows['categoria_nombre'].'</td>
					<td>'.$rows['Equipo_Licencia'].'</td>
					<td>'.$rows['Nombre_del_Equipo'].'</td>
					<td><a href="facturas/'.$rows['factura_id'].'.pdf" target="blank">'.$rows['factura_id'].'</a></td>
                    <td>'.$rows['Observaciones'].'</td>
                    <td>
                        <a href="index.php?vista=product_update&product_id_up='.$rows['producto_id'].'" class="button is-link is-rounded is-small"><i class="fa-solid fa-pen-to-square"></i></a>
                    </td>
                </tr>
            ';
            $contador++;
		}
		$pag_final=$contador-1;
	}else{
		if($total>=1){
			$tabla.='
				<p class="has-text-centered" >
					<a href="'.$url.'1" class="button is-link is-rounded is-small mt-4 mb-4">
						Haga clic acá para recargar el listado
					</a>
				</p>
			';
		}else{
			$tabla.='
				<p class="has-text-centered" >No hay registros en el sistema</p>
			';
		}
	}

	if($total>0 && $pagina<=$Npaginas){
		$tabla.='<p class="has-text-right">Mostrando productos <strong>'.$pag_inicio.'</strong> al <strong>'.$pag_final.'</strong> de un <strong>total de '.$total.'</strong></p>';
	}

	$conexion=null;
	echo $tabla;

	if($total>=1 && $pagina<=$Npaginas){
		echo paginador_tablas($pagina,$Npaginas,$url,7);
	}
} else {
	$inicio = ($pagina>0) ? (($pagina * $registros)-$registros) : 0;
	$tabla="";

	$campos="inventario_solufast3.producto_id,inventario_solufast3.Usuario,inventario_solufast3.Activo,inventario_solufast3.Puesto_de_Trabajo,inventario_solufast3.categoria_id,inventario_solufast3.Centro_de_Costos,inventario_solufast3.Proyecto,inventario_solufast3.Ubicacion_Ciudad,inventario_solufast3.Ubicacion_Direccion,inventario_solufast3.Gerencia,inventario_solufast3.Propio_Renta,inventario_solufast3.FE_Entrega_del_Proveedor_de_Renta,inventario_solufast3.FE_Entrega_a_Usuario_Xolit,inventario_solufast3.FE_Devolución_Usuario_Xolit,inventario_solufast3.FE_Devolución_al_Proveedor_de_Renta,inventario_solufast3.Nombre_del_Usuario,inventario_solufast3.Identificacion,inventario_solufast3.Cargo,inventario_solufast3.Grupo_de_Internet,inventario_solufast3.Usuario_Red,inventario_solufast3.Usuario_Local,inventario_solufast3.Email,inventario_solufast3.HW_SW,inventario_solufast3.Equipo_Licencia,inventario_solufast3.Vencimiento_Licencia,inventario_solufast3.Proveedor_de_Venta_o_Renta,inventario_solufast3.factura_id,inventario_solufast3.Fecha_de_Factura_u_OI,inventario_solufast3.Valor_COP,inventario_solufast3.Numero_de_Contrato_Cotización_u_OC,inventario_solufast3.Nombre_del_Equipo,inventario_solufast3.Marca_Fabricante,inventario_solufast3.Modelo_Equipo_Versión_Licencia,inventario_solufast3.Numero_de_Serie_Equipo_Licencia,inventario_solufast3.Placa_del_Activo,inventario_solufast3.Procesador,inventario_solufast3.Vel_Procesador,inventario_solufast3.Memoria_RAM,inventario_solufast3.Memoria_Adicional,inventario_solufast3.Memoria_Total,inventario_solufast3.Disco_Duro,inventario_solufast3.Tarjeta_de_Video,inventario_solufast3.Direccion_IP_LAN,inventario_solufast3.MAC_Address_LAN,inventario_solufast3.Direccion_IP_Wireless,inventario_solufast3.Mac_Address_Wireless,inventario_solufast3.Orden_MTTO,inventario_solufast3.Fecha_Primer_Mantenimiento,inventario_solufast3.Fecha_Segundo_Mantenimiento,inventario_solufast3.Fecha_Revision_Inventario,inventario_solufast3.Impresión_Color_Blanco_y_Negro,inventario_solufast3.VPN,inventario_solufast3.Foto,inventario_solufast3.Observaciones,categoria.categoria_id,categoria.categoria_nombre";

	if(isset($busqueda) && $busqueda!=""){

		$consulta_datos="SELECT $campos FROM inventario_solufast3 INNER JOIN categoria ON inventario_solufast3.categoria_id=categoria.categoria_id  WHERE inventario_solufast3.Nombre_del_Usuario LIKE '%$busqueda%' OR inventario_solufast3.Usuario_Local LIKE '%$busqueda%' OR inventario_solufast3.Nombre_del_Equipo LIKE '%$busqueda%' OR inventario_solufast3.Equipo_Licencia LIKE '%$busqueda%' OR inventario_solufast3.cargo LIKE '%$busqueda%' ORDER BY inventario_solufast3.producto_id ASC LIMIT $inicio,$registros";
		$consulta_total="SELECT COUNT(producto_id) FROM inventario_solufast3 WHERE Usuario_Local LIKE '%$busqueda%' OR Nombre_del_Usuario LIKE '%$busqueda%' OR Nombre_del_Equipo LIKE '%$busqueda%' OR Equipo_Licencia LIKE '%$busqueda%' OR cargo LIKE '%$busqueda%'";

	}elseif($categoria_id>0){

		$consulta_datos="SELECT $campos FROM inventario_solufast3 INNER JOIN categoria ON inventario_solufast3.categoria_id=categoria.categoria_id WHERE inventario_solufast3.categoria_id='$categoria_id' ORDER BY inventario_solufast3.producto_id ASC LIMIT $inicio,$registros";
		$consulta_total="SELECT COUNT(producto_id) FROM inventario_solufast3 WHERE categoria_id='$categoria_id'";

	}else{

		$consulta_datos="SELECT $campos FROM inventario_solufast3 INNER JOIN categoria ON inventario_solufast3.categoria_id=categoria.categoria_id ORDER BY inventario_solufast3.producto_id ASC LIMIT $inicio,$registros";
		$consulta_total="SELECT COUNT(producto_id) FROM inventario_solufast3";

	}

	$conexion=conexion();

	$datos = $conexion->query($consulta_datos);
	$datos = $datos->fetchAll();

	$total = $conexion->query($consulta_total);
	$total = (int) $total->fetchColumn();

	$Npaginas =ceil($total/$registros);

	$tabla.='
	<div class="table-container tabla-p" align="right">
		<a class="button is-link is-rounded is-small" href="index.php?vista=product_search"><i class="fa-solid fa-magnifying-glass"></i></a>
		<hr>
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
                <tr class="has-text-centered">
                	<th>#</th>
                    <th>Nombre del Usuario</th>
                    <th>Equipo</th>
					<th>Serial</th>
					<th>Numero Factura</th>
                    <th>Observaciones</th>
                </tr>
            </thead>
            <tbody>
	';

	if($total>=1 && $pagina<=$Npaginas){
		$contador=$inicio+1;
		$pag_inicio=$inicio+1;
		foreach($datos as $rows){
			$tabla.='
				<tr class="has-text-centered" >
					<td>'.$contador.'</td>
                    <td><a href="actas/'.$rows['Usuario_Red'].'.pdf" target="blank">'.$rows['Nombre_del_Usuario'].'</a></td>
                    <td>'.$rows['Equipo_Licencia'].'</td>
					<td>'.$rows['Nombre_del_Equipo'].'</td>
					<td><a href="facturas/'.$rows['factura_id'].'.pdf" target="blank">'.$rows['factura_id'].'</a></td>
                    <td>'.$rows['Observaciones'].'</td>
                </tr>
            ';
            $contador++;
		}
		$pag_final=$contador-1;
	}else{
		if($total>=1){
			$tabla.='
				<p class="has-text-centered" >
					<a href="'.$url.'1" class="button is-link is-rounded is-small mt-4 mb-4">
						Haga clic acá para recargar el listado
					</a>
				</p>
			';
		}else{
			$tabla.='
				<p class="has-text-centered" >No hay registros en el sistema</p>
			';
		}
	}

	if($total>0 && $pagina<=$Npaginas){
		$tabla.='<p class="has-text-right">Mostrando productos <strong>'.$pag_inicio.'</strong> al <strong>'.$pag_final.'</strong> de un <strong>total de '.$total.'</strong></p>';
	}

	$conexion=null;
	echo $tabla;

	if($total>=1 && $pagina<=$Npaginas){
		echo paginador_tablas($pagina,$Npaginas,$url,7);
	}
}

	
?>