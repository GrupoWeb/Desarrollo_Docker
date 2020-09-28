<?php
session_start();
require('../conexion/conexion.php');

$idSolicitante = $_SESSION['username'];	
	
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
	[essl].[bActivo] = 1 
	AND [essl].[idEstaod_Solicitud] <> 11
	AND [sol].[id_usu] = $idSolicitante";
	
	$result = sqlsrv_query($conn, $query);
	
	if($result){
 		echo "<thead>
			 		<tr>		
						<th>No. Solicitud</th>
						<th>Solicitante</th>
						<th>Dependencia</th>
						<th>Fecha Solicitud</th>
						<th>Hora Solicitud</th>";
		echo "<th>Estado Solicitud</td>";		
		echo"
					</tr>
				</thead>";

            while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){
				if($row['idEstaod_Solicitud'] == 7){
					echo "<tr id = '". $row['idSolicitud_Vehiculo']. "' class = 'mouseBlue' name = '". $row['Solicitante']."'>". "<td>". $row['idSolicitud_Vehiculo']. "</td>";
				}
				else if($row['idEstaod_Solicitud'] == 9){
					echo "<tr id = '". $row['idSolicitud_Vehiculo']. "' class = 'mouseBlueSky' name = '". $row['Solicitante']."'>". "<td>". $row['idSolicitud_Vehiculo']. "</td>";
				}
				else
				{
					echo "<tr id = '". $row['idSolicitud_Vehiculo']. "' name = '". $row['Solicitante']."'>". "<td>". $row['idSolicitud_Vehiculo']. "</td>";
				}
				echo "<td>". $row['Solicitante']. "</td>";
				echo "<td>". $row['nombre_dependencia']. "</td>";
				echo "<td>". $row['dFecha_Solicitud']->format('d-m-Y'). "</td>";
				echo "<td>". $row['hHora_Solicitud']->format('H:i'). "</td>";
				if($row['idEstaod_Solicitud'] == 2){
				echo "<td><i class='fa fa-clock-o' style='font-size:22px;color: hsl(0, 60%, 50%);'></i></td>";
				}
				else if($row['idEstaod_Solicitud'] == 3){
					echo "<td><i class='fa fa-clock-o' style='font-size:22px;color:hsl(55, 100%, 50%);'></i></td>";
				}
				else if($row['idEstaod_Solicitud'] == 6 || $row['idEstaod_Solicitud'] == 8 || $row['idEstaod_Solicitud'] == 1){
					echo "<td><i class='fa fa-clock-o' style='font-size:22px;color:hsl(120, 60%, 50%);'></i></td>";
				}
				else if($row['idEstaod_Solicitud'] == 7){
					echo "<td><i class='fa fa-clock-o' style='font-size:22px;color:hsl(240, 60%, 50%);'></i></td>";
				}	
				else if($row['idEstaod_Solicitud'] == 9){
					echo "<td><i class='fa fa-clock-o' style='font-size:22px;color:hsl(180, 60%, 50%);'></i></td>";
				}		
				else if($row['idEstaod_Solicitud'] == 10){
					echo "<td><i class='fa fa-clock-o' style='font-size:22px;color:hsl(280, 60%, 50%);'></i></td>";
				}
				
				echo "</tr>";
			}
	}
	else
	{
		echo "Contenido no encontrado";
	}
?>