<?php
session_start();
$Usuario = $_SESSION['username'];
	require('../conexion/conexion.php');
	
	
	
	 if ($Usuario == 11) {

     			$query = "SELECT 
				    [sl].[idSolicitud_Vehiculo], 
				    ([sol].[nombre1] + ' ' + apellidop) AS Solicitante, 
				    [dp].[nombre_dependencia], 
				    [sl].[dFecha_Solicitud], 
				    [sl].[hHora_Solicitud], 
				    [essl].[idEstaod_Solicitud],
				    Solicitud.strEstado_Solicitud
				FROM 
				    [tbSolicitud_Vehiculo] AS [sl] 
				    INNER JOIN [syslogin].[dbo].[Tusuario] AS [sol] ON [sol].[id_usu] = [sl].[idSolicitante]
				    INNER JOIN [syslogin].[dbo].[dependencia] AS [dp] ON [dp].[id_dependencia] = [sl].[idDependencia] 
				    INNER JOIN [tbBitacora_Estado_Solicitud] AS [essl] ON [essl].[idSolicitud] = [sl].[idSolicitud_Vehiculo]
				   INNER JOIN [tbEstado_Solicitud] as [Solicitud] ON Solicitud.idEstado_Solicitud =  [essl].[idEstaod_Solicitud]
				WHERE 
				    essl.idEstaod_Solicitud in (3) 
				    order by sl.idSolicitud_Vehiculo desc;
";
	}else{

				$query = "SELECT 
				    [sl].[idSolicitud_Vehiculo], 
				    ([sol].[nombre1] + ' ' + apellidop) AS Solicitante, 
				    [dp].[nombre_dependencia], 
				    [sl].[dFecha_Solicitud], 
				    [sl].[hHora_Solicitud], 
				    [essl].[idEstaod_Solicitud],
				    Solicitud.strEstado_Solicitud
				FROM 
				    [tbSolicitud_Vehiculo] AS [sl] 
				    INNER JOIN [syslogin].[dbo].[Tusuario] AS [sol] ON [sol].[id_usu] = [sl].[idSolicitante]
				    INNER JOIN [syslogin].[dbo].[dependencia] AS [dp] ON [dp].[id_dependencia] = [sl].[idDependencia] 
				    INNER JOIN [tbBitacora_Estado_Solicitud] AS [essl] ON [essl].[idSolicitud] = [sl].[idSolicitud_Vehiculo]
				   INNER JOIN [tbEstado_Solicitud] as [Solicitud] ON Solicitud.idEstado_Solicitud =  [essl].[idEstaod_Solicitud]
				WHERE 
				    essl.idEstaod_Solicitud in (3) 
				     order by sl.idSolicitud_Vehiculo desc;

				    
				"; 
	}
	
	$result = sqlsrv_query($conn, $query);
	
	if($result){
				
		while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))

		{
			
            //$row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
			echo "<tr class = 'envia' id = '". $row['idSolicitud_Vehiculo']. "' name = '". $row['Solicitante']."'>". "<td>". $row['idSolicitud_Vehiculo']. "</td>";
			echo "<td>". $row['Solicitante']. "</td>";
			echo "<td>". $row['nombre_dependencia']. "</td>";
			echo "<td>". $row['dFecha_Solicitud']->format('d-m-Y'). "</td>";
			echo "<td>". $row['hHora_Solicitud']->format('H:i'). "</td></tr>";	}
	}
	else
	{
		echo "Contenido no encontrado";
	}
?>