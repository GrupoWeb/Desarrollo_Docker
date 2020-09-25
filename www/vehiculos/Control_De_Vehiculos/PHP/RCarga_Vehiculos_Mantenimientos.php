<?php
	require('../conexion/conexion.php');
	
	$Vehiculos = array();
	
	echo "
	<thead>
		<tr>
			<td>Placa</td>
			<td>Marca</td>
			<td>Linea</td>
			<td>Modelo</td>
			<td>Piloto</td>
			<td>Cantidad Mantenimientos</td>
		</tr>
	</thead>
	";
	
	$sql = "
SELECT
	[vh].[idVehiculo],
	[vh].[iPlaca],
	[mr].[strMarca_Vehiculo],
	[md].[strModelo_Vehiculo],
	[ln].[strLinea_Vehiculo],
	[pl].[strPiloto] 
FROM 
	[dbo].[tbVehiculo] AS [vh]
	INNER JOIN [dbo].[tbMarca_Vehiculo] AS [mr] ON [mr].[idMarca_Vehiculo] = [vh].[idMarca_Vehiculo] 
	INNER JOIN [dbo].[tbModelo_Vehiculo] AS [md] ON [md].[idModelo_Vehiculo] = [vh].[idModelo_Vehiculo] 
	INNER JOIN [dbo].[tbLinea_Vehiculo] AS [ln] ON [ln].[idLinea_Vehiculo] = [vh].[idLinea_Vehiculo] 
	LEFT JOIN [dbo].[tbPiloto] AS [pl] ON [pl].idPiloto = [vh].idPiloto_Asignado 
WHERE
	[vh].[bActivo] = 1";
	
	$result = sqlsrv_query($conn, $sql);
	
	if($result)
	{
		$i = 0;
		while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
		{
			$Vehiculos[$i] = $row;
			$i++;
		}
		
		$valida = true;
		for($j = 0; $Vehiculos[$j]; $j++)
		{
			$query = "
			SELECT
				COUNT(*) AS 'Cantidad_Solicitudes'
			FROM 
				[dbo].[tbVehiculo] AS [vh]
				INNER JOIN [dbo].[tbKM_Vehiculo_Servicio] AS [kvs] ON [kvs].[idVehiculo] = [vh].[idVehiculo]
			WHERE 
				[kvs].[idVehiculo] = " . $Vehiculos[$j]['idVehiculo'];
				
				$resultado = sqlsrv_query($conn, $query);
				
				if($resultado)
				{					
					$Cantidad = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC);
					$Vehiculos[$j]['Cantidad_Solicitudes'] = $Cantidad['Cantidad_Solicitudes'];
				}
				else
				{
					$valida = false;
				}
		}
		
		if($valida == true)
		{
			for($i = 0; $Vehiculos[$i]; $i++)
			{
				echo "
					<tr class = 'envia' id = '". $Vehiculos[$i]['idVehiculo']. "'>
						<td>". $Vehiculos[$i]['iPlaca']."</td>
						<td>". $Vehiculos[$i]['strMarca_Vehiculo']."</td>
						<td>". $Vehiculos[$i]['strLinea_Vehiculo']."</td>
						<td>". $Vehiculos[$i]['strModelo_Vehiculo']."</td>";
				if($Vehiculos[$i]['strPiloto'] != NULL)
				{
					echo "	<td>". $Vehiculos[$i]['strPiloto']."</td>";
				}
				else
				{
					echo "	<td>Vehiculo sin piloto asignado</td>";
				}
			
				echo "	<td>". $Vehiculos[$i]['Cantidad_Solicitudes']."</td>
					</tr>
				";
			}
		}
		else
		{
			echo "<tr><td>Solicitudes no existentes</td></tr>";
		}
	}
	else
	{
		echo "<tr><td>Vehiculos no encontrados</td></tr>";
	}
?>