<?php
	require('../conexion/conexion.php');
	
	$idVehiculo = $_POST['idVehiculo'];
	
	$sql = "
SELECT
	[v].[idVehiculo],
	[v].[iPlaca],
	[mr].[strMarca_Vehiculo],
	[ln].[strLinea_Vehiculo],
	[md].[strModelo_Vehiculo],
	([p].[strPiloto] + ' ' + [p].[strApellidos] ) AS strPiloto
FROM
	[dbo].[tbVehiculo] AS [v]
	INNER JOIN [dbo].[tbMarca_Vehiculo] AS [mr] ON  [mr].[idMarca_Vehiculo] = [v].[idMarca_Vehiculo] 
	INNER JOIN [dbo].[tbModelo_Vehiculo] AS [md] ON [md].[idModelo_Vehiculo] = [v].[idModelo_Vehiculo] 
	INNER JOIN [dbo].[tbLinea_Vehiculo] AS [ln] ON [ln].[idLinea_Vehiculo] = [v].[idLinea_Vehiculo] 
	LEFT JOIN [dbo].[tbPiloto] AS [p] ON [p].[idPiloto] = [v].[idPiloto_Asignado] 
WHERE
	[v].[bActivo] = 1
	AND [v].[idVehiculo] = $idVehiculo	
	";
	
	$result = sqlsrv_query($conn, $sql);
	
	if($result){
 		echo "<thead>
			 		<tr>		
						<th style = 'border: 1px solid;'>Placa</th>
						<th style = 'border: 1px solid;'>Marca</th>
						<th style = 'border: 1px solid;'>Modelo</th>
						<th style = 'border: 1px solid;'>Linea</th>
						<th style = 'border: 1px solid;'>Piloto</th>
					</tr>
				</thead>
				<tbody>";
		while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
		{
            //$row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
			echo "<tr><td style = 'border: 1px solid;'>". $row['iPlaca']. "</td>";
			echo "<td style = 'border: 1px solid;'>". $row['strMarca_Vehiculo']. "</td>";
			echo "<td style = 'border: 1px solid;'>". $row['strLinea_Vehiculo']. "</td>";
			echo "<td style = 'border: 1px solid;'>". $row['strModelo_Vehiculo']. "</td>";
			if(!empty($row['strPiloto']) )
			{
				echo "<td style = 'border: 1px solid;'>". $row['strPiloto']. "</td></tr>";
			}
			else
			{
				echo "<td style = 'border: 1px solid;'>Vehiculo sin piloto asignado </td></tr>";
			}
			echo "</tbody>";
		}
	}
	else
	{
		echo "Contenido no encontrado";
	}
?>