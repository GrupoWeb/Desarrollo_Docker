<?php
	
	require('../conexion/conexion.php');
	
	$iPlaca = $_POST['Placa'];
	
	$query = "SELECT vh.idVehiculo, vh.iPlaca, mr.strMarca_Vehiculo, md.strModelo_Vehiculo, ln.strLinea_Vehiculo, pl.strPiloto  FROM [dbo].[tbVehiculo] as vh INNER JOIN [dbo].[tbMarca_Vehiculo] as mr ON mr.idMarca_Vehiculo = vh.idMarca_Vehiculo INNER JOIN [dbo].[tbModelo_Vehiculo] as md ON md.idModelo_Vehiculo = vh.idModelo_Vehiculo  INNER JOIN [dbo].[tbLinea_Vehiculo] as ln ON ln.idLinea_Vehiculo = vh.idLinea_Vehiculo LEFT JOIN [dbo].[tbPiloto] as pl ON pl.idPiloto = vh.idPiloto_Asignado WHERE vh.bActivo = 1 AND vh.idVehiculo = $iPlaca";
	
	$result = sqlsrv_query($conn, $query);
	
	$row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
	
	echo "<thead>
			 		<tr>		
						<th>Placa</th>
						<th>Marca</th>
						<th>Modelo</th>
						<th>Linea</th>
						<th>Piloto</th>
					</tr>
				</thead>";
	
	echo "<tr><td>". $row['iPlaca'] . "&nbsp;</td><td>". $row['strMarca_Vehiculo']. "&nbsp;</td><td>". $row['strModelo_Vehiculo']. "&nbsp;</td><td>". $row['strLinea_Vehiculo']. "&nbsp;</td>";
	if(!empty($row['strPiloto']))
	{
		echo "<td><input type = 'hidden' id = 'Piloto' name = 'Piloto' value = '0'/>". $row['strPiloto']. "</tr>";	
	}
	else
	{
		echo "<td><input type = 'hidden' id = 'Piloto' name = 'Piloto' value = '1'/>Vehiculo sin piloto</tr>";	
	}
?>