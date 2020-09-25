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
	$Disponibles = array();
	
	echo "<thead>
				<tr>		
					<th>Placa</th>
					<th>Marca</th>
					<th>Modelo</th>
					<th>Linea</th>
					<th>Piloto</th>
				</tr>
			</thead>";
	
	$sql = "
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
		AND vh.idPiloto_Asignado > 0
	";
	
	$params = array();
	$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
	$result = sqlsrv_query($conn, $sql, $params, $options);
	$row_count = sqlsrv_num_rows( $result );	
	
	if($result)
	{
		if($row_count > 0)
		{
			while( $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC) )
			{
				echo"
					<tr class = 'envia' id = '". $row['idVehiculo']. "'>
						<td>". $row['iPlaca']."</td>
						<td>". $row['strMarca_Vehiculo']."</td>
						<td>". $row['strModelo_Vehiculo']."</td>
						<td>". $row['strLinea_Vehiculo']."</td>
						<td>". $row['strPiloto']."</td>
					</tr>
				";
			}
		}
	}
	else
	{
		echo "<tr><td>No se encontraron los vehiculos</td></tr>";
	}
	
	//Vehiculos con solicitudes pero disponibles en horario;
	echo $sql = "
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
		pl.strPiloto
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
	$result = sqlsrv_query($conn, $sql, $params, $options);
	$row_count = sqlsrv_num_rows( $result );	
	
	if($result)
	{
		if($row_count > 0)
		{
			$i = 0;
			while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
			{
				if( $row['dFecha_Salida'] >= $dFechaSalida || $row['dFecha_Regreso'] <= $dFechaRegreso  )
				{
					$row['IGUALDA'] = "IGUALES";
				}
				else
				{
					$row['IGUALDA'] = "DIFERENTES";
				}
				
				$Vehiculos[$i] = $row;
				$i++;
			}
			
			$valida = true;
			$y = 0;
			for($i = 0; $Vehiculos[$i]; $i++)
			{
				for($j = 0; $Disponibles[$j]; $j++)
				{
					if($Vehiculos[$i]['idVehiculo'] == $Disponibles[$j]['idVehiculo'])
					{
						$valida = false;
						if($Vehiculos[$i]['IGUALDA'] === 'IGUALES')
						{
							echo $Disponibles[$j]['IGUALDA'] = 'IGUALES';
						}
					}
				}
				if($valida == true)
				{
					 $Disponibles[$y] = $Vehiculos[$i];
					$y++;
				}
			}
			
			for($i = 0; $Disponibles[$i]; $i++)
			{
				if($Disponibles[$i]['IGUALDA'] === 'DIFERENTES')
				{
					echo"
					<tr class = 'envia' id = '". $Disponibles[$i]['idVehiculo']. "'>
						<td>". $Disponibles[$i]['iPlaca']."</td>
						<td>". $Disponibles[$i]['strMarca_Vehiculo']."</td>
						<td>". $Disponibles[$i]['strModelo_Vehiculo']."</td>
						<td>". $Disponibles[$i]['strLinea_Vehiculo']."</td>
						<td>". $Disponibles[$i]['strPiloto']."</td>
					</tr>
				";
				}
			}
		}
		else
		{
			$sqql = "
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
			";
			
			$rresult = sqlsrv_query($conn, $sqql);
			
			if($rresult)
			{
				while( $row = sqlsrv_fetch_array($rresult, SQLSRV_FETCH_ASSOC) )
				{
					echo"
						<tr class = 'envia' id = '". $row['idVehiculo']. "'>
							<td>". $row['iPlaca']."</td>
							<td>". $row['strMarca_Vehiculo']."</td>
							<td>". $row['strModelo_Vehiculo']."</td>
							<td>". $row['strLinea_Vehiculo']."</td>
							<td>Vehiculo son piloto asignado</td>
						</tr>
					";
				}	
			}
			else
			{
				echo "<tr><td>No se encontraron los vehiculos</td></tr>";	
			}
			
			//Vehiculos con solicitudes disponibles y sin piloto
			$sql = "
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
					(sv.dFecha_Salida >= '2016-12-28' OR sv.dFecha_Regreso <= '2016-12-30' ) OR (sv.idTipo_Solicitud = 1)
				THEN 'IGUALES' 
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
			";
				
			$params = array();
			$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
			$result = sqlsrv_query($conn, $sql, $params, $options);
			$row_count = sqlsrv_num_rows( $result );	
			
			if($result)
			{
					if($row_count > 0)
				{
					$i = 0;
					while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
					{
						$Vehiculos[$i] = $row;
						$i++;
					}
					
					$valida = true;
					$y = 0;
					for($i = 0; $Vehiculos[$i]; $i++)
					{
						for($j = 0; $Disponibles[$j]; $j++)
						{
							if($Vehiculos[$i]['idVehiculo'] === $Disponibles[$j])
							{
								$valida = false;
								if($Vehiculos[$i]['IGUALDA'] === 'IGUALES')
								{
									echo $Disponibles[$j]['IGUALDA'] = 'IGUALES';
								}
							}
						}
						if($valida == true)
						{
							 $Disponibles[$y] = $Vehiculos[$i];
							$y++;
						}
					}
					
					for($i = 0; $Disponibles[$i]; $i++)
					{
						if($Disponibles[$i]['IGUALDA'] === 'DIFERENTES')
						{
							echo"
							<tr class = 'envia' id = '". $Disponibles['idVehiculo']. "'>
								<td>". $Disponibles[$i]['iPlaca']."</td>
								<td>". $Disponibles[$i]['strMarca_Vehiculo']."</td>
								<td>". $Disponibles[$i]['strModelo_Vehiculo']."</td>
								<td>". $Disponibles[$i]['strLinea_Vehiculo']."</td>
								<td>". $Disponibles[$i]['strPiloto']."</td>
							</tr>
						";
						}
					}
				}	
			}		
		}
	}
	else
	{
		echo "<tr><td>No se encontraron los vehiculos</td></tr>";
	}
?>