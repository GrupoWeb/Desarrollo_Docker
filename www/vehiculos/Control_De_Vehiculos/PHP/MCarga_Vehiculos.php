<?php
	require('../conexion/conexion.php');
	
	$Tipo_Solicitud = $_POST['TipoSolicitud'];
	
	$query = "select vh.iPlaca, tv.strTipo_Vehiculo, mar.strMarca_Vehiculo, mode.strModelo_Vehiculo, lv.strLinea_Vehiculo, pl.strPiloto from tbVehiculo as vh inner join tbTipo_Vehiculo as tv on vh.idTipo_Vehiculo = tv.idTipo_Vehiculo inner join tbMarca_Vehiculo as mar on vh.idMarca_Vehiculo = mar.idMarca_Vehiculo inner join tbModelo_Vehiculo as mode on vh.idModelo_Vehiculo = mode.idModelo_Vehiculo inner join tbLinea_Vehiculo as lv on vh.idLinea_Vehiculo = lv.idLinea_Vehiculo inner join tbPiloto as pl on vh.idPiloto_Asignado = pl.idPiloto where vh.bActivo = 1";
	
	$result = sqlsrv_query($conn, $query);
	
	if($result){
 		echo "<thead>
			 		<tr>		
						<th>Placa</th>
						<th>Tipo</th>
						<th>Marca</th>
						<th>Modelo</th>
						<th>Linea</th>
						<th>Piloto</th>
						
					</tr>
				</thead>";
		while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
		{
            //$row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
			echo "<tr id = '". $row['iPlaca']. "'>". "<td>". $row['iPlaca']. "</td>";
			echo "<td>". $row['strTipo_Vehiculo']. "</td>";
			echo "<td>". $row['strMarca_Vehiculo']. "</td>";
			echo "<td>". $row['strLinea_Vehiculo']. "</td>";
			echo "<td>". $row['strModelo_Vehiculo']. "</td>";
			echo "<td>". $row['strPiloto']. "</td>";
			// echo "<td><i class='fa fa-cog fa-spin' style='font-size:22px; color:hsl(0, 10%, 60%);'></i></td>";
			// echo "<td><i class='fa fa-close' style='font-size:22px;color:hsl(0, 50%, 50%);'></i></td></tr>";
			//<th>Modificiar</th>
			//			<th>Eliminar</th>
		}
	}
	else
	{
		echo "Contenido no encontrado";
	}
?>