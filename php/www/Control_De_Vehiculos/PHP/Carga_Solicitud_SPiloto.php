<?php
session_start();
$idUsuario = $_SESSION['username'];
	require('../conexion/conexion.php');
	
	
/*SELECT 
	sl.idSolicitud_Vehiculo, 
	([sol].[nombre1] + ' ' + [sol].[apellidom]) AS strSolicitante, 
	dp.nombre_dependencia, 
	sl.dFecha_Solicitud, 
	sl.hHora_Solicitud 
FROM 
	tbSolicitud_Vehiculo as sl 
	inner join [syslogin].[dbo].[Tusuario] as sol on sol.id_usu = sl.idSolicitante  
	inner join [syslogin].[dbo].[dependencia] as dp on dp.id_dependencia = sl.idDependencia 
	inner join tbBitacora_Estado_Solicitud as bts on bts.idSolicitud = sl.idSolicitud_Vehiculo 
WHERE 
	bts.idEstaod_Solicitud = $Tipo_Solicitud 
	AND bts.bActivo = 1 
	AND sl.bActivo = 1
	AND */

	echo $query = "
SELECT 
	sl.idSolicitud_Vehiculo, 
	([sol].[nombre1] + ' ' + [sol].[apellidom]) AS strSolicitante, 
	dp.nombre_dependencia, 
	sl.dFecha_Solicitud, 
	sl.hHora_Solicitud,
	[ap].[idPilotoAsignado] 
FROM 
	tbSolicitud_Vehiculo as sl 
	inner join [syslogin].[dbo].[Tusuario] as sol on sol.id_usu = sl.idSolicitante 
	inner join [syslogin].[dbo].[dependencia] as dp on dp.id_dependencia = sl.idDependencia 
	inner join tbBitacora_Estado_Solicitud as bts on bts.idSolicitud = sl.idSolicitud_Vehiculo 
	LEfT JOIN [tbAsignacionPiloto] AS [ap] ON [ap].[idSolicitud] = [sl].[idSolicitud_Vehiculo] 
	LEFT JOIN [syslogin].[dbo].[Tusuario] AS [tu] ON [tu].[id_usu] = [ap].[idPilotoAsignado] 
WHERE bts.idEstaod_Solicitud = 7 
	AND bts.bActivo = 1 
	AND sl.bActivo = 1 ";
	
	$result = sqlsrv_query($conn, $query);
	
	if($result){
 		echo "<thead>
			 		<tr>		
						<th>No. Solicitud</th>
						<th>Solicitante</th>
						<th>Dependencia</th>
						<th>Fecha Solicitud</th>
						<th>Hora Solicitud</th>
					</tr>
				</thead>";
		while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
		{
            //$row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
			echo "<tr class = 'envia' id = '". $row['idSolicitud_Vehiculo']. "' name = '". $row['strNombre_Solicitante']."'>". "<td>". $row['idSolicitud_Vehiculo']. "</td>";
			echo "<td>". $row['strSolicitante']. "</td>";
			echo "<td>". $row['nombre_dependencia']. "</td>";
			echo "<td>". $row['dFecha_Solicitud']->format('d-m-Y'). "</td>";
			echo "<td>". $row['hHora_Solicitud']->format('H:i'). "</td>";
		}
	}
	else
	{
		echo "Contenido no encontrado";
	}
?>