<?php
	require('../conexion/conexion.php');
	
	echo "
	<thead>
		<tr>
			<th>Placa</th>
			<th>Marca</th>
			<th>Linea</th>
			<th>Modelo</th>
			<th>Piloto Asignado</th>
			<th>Estado</th>
		</tr>
	</thead>
	";
	
	$sql = "
SELECT 
	[vh].[iPlaca],
	[mr].[strMarca_Vehiculo],
	[mo].[strModelo_Vehiculo],
	[ln].[strLinea_Vehiculo],
	[pl].[strPiloto],
	[ev].[strEstado_Vehiculo] 
FROM
	[dbo].[tbVehiculo] AS [vh]
	INNER JOIN [dbo].[tbBitacora_Estado_Vehiculo] AS [beh] ON [beh].[idVehiculo] = [vh].[idVehiculo] 
	INNER JOIN [dbo].[tbMarca_Vehiculo] AS [mr] ON [mr].[idMarca_Vehiculo] = [vh].[idMarca_Vehiculo] 
	INNER JOIN [dbo].[tbModelo_Vehiculo] AS [mo] ON [mo].[idModelo_Vehiculo] = [vh].[idModelo_Vehiculo] 
	INNER JOIN [dbo].[tbLinea_Vehiculo] AS [ln] ON [ln].[idLinea_Vehiculo] = [vh].[idLinea_Vehiculo] 
	LEFT JOIN [dbo].[tbPiloto] AS [pl] ON [pl].[idPiloto] = [vh].[idPiloto_Asignado] 
	INNER JOIN [dbo].[tbEstado_Vehiculo] AS [ev] ON [ev].[idEstado_Vehiculo] = [beh].[idEstado_Vehiculo] 
WHERE
	[vh].[bActivo] = 1
	AND [beh].[bActivo] = 1
	AND [beh].[idEstado_Vehiculo] = 1
ORDER BY
	[vh].[iPlaca] ";
	
	$result = sqlsrv_query($conn, $sql);
	
	if($result)
	{
		while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
		{
			echo "
				<tr>
					<td>". $row['iPlaca']."</td>
					<td>". $row['strMarca_Vehiculo']."</td>
					<td>". $row['strLinea_Vehiculo']."</td>
					<td>". $row['strModelo_Vehiculo']."</td>";
			if($row['strPiloto'] != NULL)
			{
				echo "<td>". $row['strPiloto']."</td>";
			}
			else
			{
				echo "<td>Vehiculo sin piloto asignado</td>";
			}
			echo "	<td>". $row['strEstado_Vehiculo']."</td>
				</tr>
			";
		}
	}
	else
	{
		echo "<tr><td>No se encuentran Vehiculos Disponibles</td></tr>";
	}
?>