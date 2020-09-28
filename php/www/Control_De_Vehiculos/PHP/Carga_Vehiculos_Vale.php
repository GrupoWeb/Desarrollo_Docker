<?php
	require('../conexion/conexion.php');
	
	$Tipo_Solicitud = $_POST['TipoSolicitud'];
	
	$query = "
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
	[v].[bActivo] = 1";
	
	$result = sqlsrv_query($conn, $query);
	
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
            //$row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
			echo "<tr class = 'envia' id = '". $row['idVehiculo']. "'>". "<td>". $row['iPlaca']. "</td>";
			echo "<td>". $row['strMarca_Vehiculo']. "</td>";
			echo "<td>". $row['strLinea_Vehiculo']. "</td>";
			echo "<td>". $row['strModelo_Vehiculo']. "</td>";
			if(!empty($row['strPiloto']) )
			{
				echo "<td>". $row['strPiloto']. "</td></tr>";
			}
			else
			{
				echo "<td>Vehiculo sin piloto asignado </td></tr>";
			}
		}
	}
	else
	{
		echo "Contenido no encontrado";
	}
?>