<?php
	require('../conexion/conexion.php');
	
	// $Tipo_Solicitud = $_POST['TipoSolicitud'];
	
	$query = "
SELECT 
	[sl].[idSolicitud_Vehiculo], 
	([sol].[nombre1] + ' ' + apellidop) AS Solicitante, 
	[dp].[nombre_dependencia], 
	[sl].[dFecha_Solicitud], 
	[sl].[hHora_Solicitud], 
	[essl].[idEstaod_Solicitud] 
FROM 
	[tbSolicitud_Vehiculo] AS [sl] 
	INNER JOIN [syslogin].[dbo].[Tusuario] AS [sol] ON [sol].[id_usu] = [sl].[idSolicitante]
	INNER JOIN [syslogin].[dbo].[dependencia] AS [dp] ON [dp].[id_dependencia] = [sl].[idDependencia] 
	INNER JOIN [tbBitacora_Estado_Solicitud] AS [essl] ON [essl].[idSolicitud] = [sl].[idSolicitud_Vehiculo] 
WHERE  
	essl.idEstaod_Solicitud = 1 
	AND essl.bActivo = 1 
	AND sl.bActivo = 1";
	
	$result = sqlsrv_query($conn, $query);
	
	if($result){
 		echo "<thead>
			 		<tr>		
						<th>No. Solicitud</th>
						<th>Solicitante</th>
						<th>Dependencia</th>
						<th>Fecha Solicitud</th>
						<th>Hora Solicitud</th>
						<th>Piloto seleccionado</td>
					</tr>
				</thead>";
				
		while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
		{
            //$row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
			echo "<tr class = 'envia' id = '". $row['idSolicitud_Vehiculo']. "' name = '". $row['Solicitante']."'>". "<td>". $row['idSolicitud_Vehiculo']. "</td>";
			echo "<td>". $row['Solicitante']. "</td>";
			echo "<td>". $row['nombre_dependencia']. "</td>";
			echo "<td>". $row['dFecha_Solicitud']->format('d-m-Y'). "</td>";
			echo "<td>". $row['hHora_Solicitud']->format('H:i'). "</td>";
			if($row['idPiloto_Asignado'])
			{
				echo "<td><i class='fa fa-car' style='font-size:22px;color: hsl(0, 60%, 50%);'></i></td>";
			}
			else
			{
				echo "<td><i class='fa fa-car' style='font-size:22px;color: hsl(120, 60%, 50%);'></i></td>";
			}			
			echo "</tr>";
		}
	}
	else
	{
		echo "Contenido no encontrado";
	}
?>