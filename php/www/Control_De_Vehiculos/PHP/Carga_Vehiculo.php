<?php
	
	require('../conexion/conexion.php');

    $idSolicitud = $_POST['idSolicitud']; 
    $FechaSalida = $_POST['FechaSalida'];
    $FechaRegreso = $_POST['FechaRegreso'];
    $HoraSalida = $_POST['HoraSalida'];
    $HoraRegreso = $_POST['HoraRegreso'];
	
	if($FechaSalida != "Solicitud sin fecha de salida")
	{
		$dFechaSalida = new DateTime($FechaSalida);
		$dFechaSalida = $dFechaSalida->format('Y-m-d');
		$hHoraSalida =  new DateTime($HoraSalida);
		$hHoraSalida = $hHoraSalida->format('H:i:s');
		$hHoraSOlgura = date('H:i:s', strtotime('+1 hours', $HoraSalida));
	}
	else
	{
		$dFechaSalida = NULL;
		$hHoraSalida = NULL;
		$hHoraSOlgura = NULL;
	}
	
	if($FechaRegreso != "Solicitud sin fecha de regreso")
	{
		$dFechaRegreso = new DateTime($FechaRegreso);
		$dFechaRegreso = $dFechaRegreso->format('Y-m-d');
		$hHoraRegreso = new DateTime($HoraRegreso);
		$hHoraRegreso = $hHoraRegreso->format('H:i:s');
		$hHoraROlgura = date('H:i:s', strtotime('+1 hours', $HoraRegreso));
	}
	else
	{
		$dFechaRegreso = NULL;
		$hHoraRegreso = NULL;
		$hHoraROlgura = NULL;
		
	}
	
	$Vehiculos = array();
	
    echo $query = "
	SELECT 
		vh.idVehiculo, 
		vh.iPlaca, 
		vh.idPiloto_Asignado, 
		mr.strMarca_Vehiculo, 
		md.strModelo_Vehiculo, 
		ln.strLinea_Vehiculo, 
		pl.strPiloto 
	FROM 
		tbVehiculo as vh 
		inner join tbMarca_Vehiculo as mr on vh.idMarca_Vehiculo = mr.idMarca_Vehiculo 
		inner join tbModelo_Vehiculo as md on md.idModelo_Vehiculo = vh.idMarca_Vehiculo 
		inner join tbLinea_Vehiculo as ln on ln.idLinea_Vehiculo = vh.idLinea_Vehiculo 
		inner join tbBitacora_Estado_Vehiculo as btvh on btvh.idVehiculo = vh.idVehiculo 
		LEFT JOIN tbPiloto as pl on pl.idPiloto = vh.idPiloto_Asignado 
	WHERE 
		vh.bActivo = 1 
		AND btvh.idEstado_Vehiculo =  1 
		AND btvh.bActivo =  1 
		AND vh.idPiloto_Asignado > 0";
	
	$params = array();
	$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
	
	$result = sqlsrv_query($conn, $query, $params, $options);
			
	$row_count = sqlsrv_num_rows( $result );	
	
	if($result){
		echo "<thead>
				<tr>		
					<th>Placa</th>
					<th>Marca</th>
					<th>Modelo</th>
					<th>Linea</th>
					<th>Piloto</th>
				</tr>
			</thead>";
		while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
		{
			echo "<tr class = 'envia' id = '". $row['idVehiculo']. "'><td>". $row['iPlaca']. "</td>";
			echo "<td>". $row['strMarca_Vehiculo']. "</td>";
			echo "<td>". $row['strModelo_Vehiculo']. "</td>";
			echo "<td>". $row['strLinea_Vehiculo']. "</td>";
			if(!empty($row['strPiloto']))
			{
				echo "<td>". $row['strPiloto']. "</td></tr>";
			}
			else
			{
				echo "<td>Vehiculo sin piloto</td></tr>";
			}
		}
	}
	
	$slq02 = "
	SELECT 
		vh.idVehiculo, 
		sv.dFecha_Salida, 
		sv.hHora_Salida, 
		sv.dFecha_Regreso,
		sv.hHora_Regreso, 
		sv.idSolicitud_Vehiculo, 
		vh.iPlaca, 
		vh.idPiloto_Asignado,
		mr.strMarca_Vehiculo, 
		md.strModelo_Vehiculo, 
		ln.strLinea_Vehiculo, 
		pl.strPiloto, 
	CASE 
		WHEN 
			sv.dFecha_Salida LIKE '$dFechaSalida' OR sv.dFecha_Regreso LIKE '$FechaRegreso' 
		THEN 
			CASE 
				WHEN 
					(sv.hHora_Salida <= '$hHoraSalida' OR sv.hHora_Salida >= '$hHoraSOlgura') AND(sv.hHora_Regreso < '$hHoraRegreso' OR sv.hHora_Regreso > '$hHoraROlgura') 
				THEN 'DIFERENTE' 
				ELSE 'IGUALES' 
			END 
		ELSE 'DIFERENTES' 
	END 
	AS 'IGUALDA' 
	FROM 
		[dbo].[tbVehiculo] AS vh 
		INNER JOIN [dbo] .[tbBitacora_Estado_Vehiculo] AS kmsv ON kmsv.idVehiculo = vh.idVehiculo 
		INNER JOIN [dbo] .[tbSolicitud_Vehiculo] AS sv ON sv.idSolicitud_Vehiculo <> $idSolicitud 
		INNER JOIN [dbo].[tbKM_Vehiculo_Soloicitud] AS kmv ON kmv.idSolicitud = sv.idSolicitud_Vehiculo AND kmv.idVehiculo = vh.idVehiculo 
		inner join tbMarca_Vehiculo as mr on vh.idMarca_Vehiculo = mr.idMarca_Vehiculo 
		inner join tbModelo_Vehiculo as md on md.idModelo_Vehiculo = vh.idMarca_Vehiculo 
		inner join tbLinea_Vehiculo as ln on ln.idLinea_Vehiculo = vh.idLinea_Vehiculo 
		LEFT JOIN tbPiloto as pl on pl.idPiloto = vh.idPiloto_Asignado 
	WHERE 
		kmsv.idEstado_Vehiculo = 2 
		AND kmsv.bActivo = 1 
		AND kmv.bActivo = 1 
		AND vh.bActivo = 1  
		AND vh.idPiloto_Asignado > 0
";
			
	$params = array();
	$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
			
	$result02 = sqlsrv_query($conn, $slq02, $params, $options);
	$row_count02 = sqlsrv_num_rows( $result02 );	
	
	if($row_count02 == 0)
	{
		$query = "
		SELECT 
			vh.idVehiculo, 
			vh.iPlaca, 
			vh.idPiloto_Asignado, 
			mr.strMarca_Vehiculo, 
			md.strModelo_Vehiculo, 
			ln.strLinea_Vehiculo, 
			pl.strPiloto 
		FROM 
			tbVehiculo as vh 
			inner join tbMarca_Vehiculo as mr on vh.idMarca_Vehiculo = mr.idMarca_Vehiculo 
			inner join tbModelo_Vehiculo as md on md.idModelo_Vehiculo = vh.idMarca_Vehiculo 
			inner join tbLinea_Vehiculo as ln on ln.idLinea_Vehiculo = vh.idLinea_Vehiculo 
			inner join tbBitacora_Estado_Vehiculo as btvh on btvh.idVehiculo = vh.idVehiculo 
			LEFT JOIN tbPiloto as pl on pl.idPiloto = vh.idPiloto_Asignado 
		WHERE 
			vh.bActivo = 1 
			AND btvh.idEstado_Vehiculo =  1 
			AND btvh.bActivo =  1";
		$params = array();
		$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
		$result = sqlsrv_query($conn, $query, $params, $options);
		if($result)
		{
			while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
			{
				echo "<tr class = 'envia' id = '". $row['idVehiculo']. "'><td>". $row['iPlaca']. "</td>";
				echo "<td>". $row['strMarca_Vehiculo']. "</td>";
				echo "<td>". $row['strModelo_Vehiculo']. "</td>";
				echo "<td>". $row['strLinea_Vehiculo']. "</td>";
				if(!empty($row['strPiloto']))
				{
					echo "<td>". $row['strPiloto']. "</td></tr>";
				}
				else
				{
					echo "<td>Vehiculo sin piloto</td></tr>";
				}
			}
			
			$slq02 = "
			SELECT 
				vh.idVehiculo, 
				sv.dFecha_Salida, 
				sv.hHora_Salida, 
				sv.dFecha_Regreso,
				sv.hHora_Regreso, 
				sv.idSolicitud_Vehiculo, 
				vh.iPlaca, 
				vh.idPiloto_Asignado,
				mr.strMarca_Vehiculo, 
				md.strModelo_Vehiculo, 
				ln.strLinea_Vehiculo, 
				pl.strPiloto, 
			CASE 
				WHEN 
					sv.dFecha_Salida LIKE '$dFechaSalida' OR sv.dFecha_Regreso LIKE '$FechaRegreso' 
				THEN 
					CASE 
						WHEN 
						(sv.hHora_Salida <= '$hHoraSalida' OR sv.hHora_Salida >= '$hHoraSOlgura') AND(sv.hHora_Regreso < '$hHoraRegreso' OR sv.hHora_Regreso > '$hHoraROlgura') 
						THEN 'DIFERENTE' 
						ELSE 'IGUALES' 
					END 
				ELSE 'DIFERENTES' 
			END 
			AS 'IGUALDA' 
			FROM 
				[dbo].[tbVehiculo] AS vh 
				INNER JOIN [dbo] .[tbBitacora_Estado_Vehiculo] AS kmsv ON kmsv.idVehiculo = vh.idVehiculo 
				INNER JOIN [dbo] .[tbSolicitud_Vehiculo] AS sv ON sv.idSolicitud_Vehiculo <> 126 
					INNER JOIN [dbo].[tbKM_Vehiculo_Soloicitud] AS kmv ON kmv.idSolicitud = sv.idSolicitud_Vehiculo AND kmv.idVehiculo = vh.idVehiculo 				
				INNER JOIN tbMarca_Vehiculo as mr on vh.idMarca_Vehiculo = mr.idMarca_Vehiculo 
				inner join tbModelo_Vehiculo as md on md.idModelo_Vehiculo = vh.idMarca_Vehiculo 
				inner join tbLinea_Vehiculo as ln on ln.idLinea_Vehiculo = vh.idLinea_Vehiculo 
				LEFT JOIN tbPiloto as pl on pl.idPiloto = vh.idPiloto_Asignado 
			WHERE 
				kmsv.idEstado_Vehiculo = 2 
				AND kmsv.bActivo = 1 
				AND kmv.bActivo = 1 
				AND vh.bActivo = 1
	";
				
			$params = array();
			$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
				
			$result02 = sqlsrv_query($conn, $slq02, $params, $options);
		}
	}
	if($result02)
	{
		while($row02 = sqlsrv_fetch_array($result02, SQLSRV_FETCH_ASSOC))
		{
			if($row02['IGUALDA'] === 'DIFERENTES')
			{
				echo "<tr class = 'envia' id = '". $row02['idVehiculo']. "'><td>". $row02['iPlaca']. "</td>";
				echo "<td>". $row02['strMarca_Vehiculo']. "</td>";
				echo "<td>". $row02['strModelo_Vehiculo']. "</td>";
				echo "<td>". $row02['strLinea_Vehiculo']. "</td>";
				if(!empty($row02['strPiloto']))
				{
					echo "<td>". $row02['strPiloto']. "</td>";
				}
				else
				{
					echo "<td>Vehiculo sin piloto</td>";
				}
			}
		}
	}
	else
	{
		echo "<tr><td>Contenido no encontrado</td></tr>";
	}
?>