<?php
	require('../conexion/conexion.php');
	
	$sql = "SELECT vh.idVehiculo, vh.iPlaca, vh.idPiloto_Asignado, mr.strMarca_Vehiculo, md.strModelo_Vehiculo, 
	ln.strLinea_Vehiculo, pl.strPiloto FROM tbVehiculo as vh inner join tbMarca_Vehiculo as mr on 
	vh.idMarca_Vehiculo = mr.idMarca_Vehiculo inner join 
	tbModelo_Vehiculo as md on md.idModelo_Vehiculo = vh.idMarca_Vehiculo inner join 
	tbLinea_Vehiculo as ln on ln.idLinea_Vehiculo = vh.idLinea_Vehiculo inner join 
	tbBitacora_Estado_Vehiculo as btvh on btvh.idVehiculo = vh.idVehiculo LEFT JOIN 
	tbPiloto as pl on pl.idPiloto = vh.idPiloto_Asignado WHERE vh.bActivo = 1 AND btvh.idEstado_Vehiculo =  5 AND 
	btvh.bActivo =  1";
	
	$result = sqlsrv_query($conn, $sql);
	
	if($result)
	{
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
	else
	{
		echo "Contenido no encontrado";
	}
?>