<?php
	require('../conexion/conexion.php');
	
		$query = "
SELECT 
	vh.idVehiculo, 
	vh.iPlaca, 
	mr.strMarca_Vehiculo, 
	md.strModelo_Vehiculo, 
	ln.strLinea_Vehiculo, 
	pl.strPiloto  
FROM 
	[dbo].[tbVehiculo] as vh 
	INNER JOIN [dbo].[tbBitacora_Estado_Vehiculo] AS bev ON bev.idVehiculo = vh.idVehiculo 
	INNER JOIN [dbo].[tbMarca_Vehiculo] as mr ON mr.idMarca_Vehiculo = vh.idMarca_Vehiculo 
	INNER JOIN [dbo].[tbModelo_Vehiculo] as md ON md.idModelo_Vehiculo = vh.idModelo_Vehiculo  
	INNER JOIN [dbo].[tbLinea_Vehiculo] as ln ON ln.idLinea_Vehiculo = vh.idLinea_Vehiculo 
	LEFT JOIN [dbo].[tbPiloto] as pl ON pl.idPiloto = vh.idPiloto_Asignado 
WHERE vh.bActivo = 1 AND bev.idEstado_Vehiculo = 1 AND bev.bActivo = 1 ";
		
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
?>