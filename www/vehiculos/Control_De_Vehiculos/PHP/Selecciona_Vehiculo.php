<?php
	
	require('../conexion/conexion.php');
	
	$iPlaca = $_POST['Placa'];
	$name = $_POST['Name'];
	$IDP = $_POST['IDPiloto'];
	
	
	$query = "SELECT 
		vh.iPlaca, 
		mr.strMarca_Vehiculo, 
		md.strModelo_Vehiculo, 
		ln.strLinea_Vehiculo, 
		(pl.strPiloto + ' ' + pl.strApellidos) AS strPiloto  ,
		vh.idPiloto_Asignado
	FROM 
		tbVehiculo as vh 
		inner join tbMarca_Vehiculo as mr on vh.idMarca_Vehiculo = mr.idMarca_Vehiculo 
		inner join tbModelo_Vehiculo as md on md.idModelo_Vehiculo = vh.idMarca_Vehiculo 
		inner join tbLinea_Vehiculo as ln on ln.idLinea_Vehiculo = vh.idLinea_Vehiculo 
		inner join tbBitacora_Estado_Vehiculo as btvh on btvh.idVehiculo = vh.idVehiculo 
		left join tbPiloto as pl on pl.idPiloto = vh.idPiloto_Asignado
		 WHERE vh.idVehiculo = $iPlaca";
	
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
	
	if($name==1)
	{
		echo "<td><input type = 'hidden' id = 'Piloto' name = 'Piloto' value =".$IDP." />". $row['strPiloto']."</td></tr>";	
	}
	else
	{
		echo "<td><input type = 'hidden' id = 'Piloto' name = 'Piloto' value =".$IDP." />Vehiculo sin piloto</tr>";	
	}
?>