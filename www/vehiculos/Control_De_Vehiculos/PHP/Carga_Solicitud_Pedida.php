<?php
	require('../conexion/conexion.php');
	
	$Tipo_Solicitud = $_POST['TipoSolicitud'];
	
	$query = "
	SELECT 
		sl.idSolicitud_Vehiculo, 
		sol.strNombre_Solicitante, 
		dp.strDependencia, 
		sl.dFecha_Solicitud, 
		sl.hHora_Solicitud 
	FROM 
		tbSolicitud_Vehiculo as sl 
		inner join tbSolicitante as sol on sol.idSolicitante = sl.idSolicitante 
		inner join tbDependencia as dp on dp.idDependencia = sl.idDependencia 
		inner join tbBitacora_Estado_Solicitud as bts on bts.idSolicitud = sl.idSolicitud_Vehiculo 
	WHERE 
		bts.idEstaod_Solicitud = $Tipo_Solicitud 
		AND bts.bActivo = 1 
		AND sl.bActivo = 1";
	
	$result = sqlsrv_query($conn, $query);
	
	if($result){
 		echo "<thead>
			 		<tr>		
						<th>No. Solicitud</th>
						<th>Solicitante</th>
						<th>Dependencia</th>
						<th>Fecha Solicitud</th>
						<th>Hora Solicitud</th>";
		if($Tipo_Solicitud == 1)
			{
				echo "<th>Piloto seleccionado</td>";
			}
						
		echo"
					</tr>
				</thead>";
				
		while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
		{
            //$row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
			echo "<tr class = 'envia' id = '". $row['idSolicitud_Vehiculo']. "' name = '". $row['strNombre_Solicitante']."'>". "<td>". $row['idSolicitud_Vehiculo']. "</td>";
			echo "<td>". $row['strNombre_Solicitante']. "</td>";
			echo "<td>". $row['strDependencia']. "</td>";
			echo "<td>". $row['dFecha_Solicitud']->format('d-m-Y'). "</td>";
			echo "<td>". $row['hHora_Solicitud']->format('H:i'). "</td>";
			if($Tipo_Solicitud == 1)
			{
				if(empty($row['strPiloto']))
				{
					echo "<td><i class='fa fa-car' style='font-size:22px;color: hsl(0, 60%, 50%);'></i></td>";
				}
				else
				{
					echo "<td><i class='fa fa-car' style='font-size:22px;color: hsl(120, 60%, 50%);'></i></td>";
				}
			}			
			echo "</tr>";
		}
	}
	else
	{
		echo "Contenido no encontrado";
	}
?>