<?php 

session_start();
$idUsuario = $_SESSION['username'];
	require('../conexion/conexion.php');
	
	$Tipo_Solicitud = $_POST['TipoSolicitud'];
	
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
 	essl.idEstaod_Solicitud = 2 
	AND essl.bActivo = 1 
	AND sl.bActivo = 1
	AND sl.idDependencia = (SELECT [id_dependencia] FROM [syslogin].[dbo].[Tusuario] WHERE [id_usu] = $idUsuario)";
	
	$result = sqlsrv_query($conn, $query);
	
	if (!$result) {
		die("Error");
	}else{
		while ($data = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
			$arreglo["data"][] =  $data;
		}
		 echo json_encode($arreglo);

	}
	// sqlsrv_free_smtp($result);	sqlsrv_close($conexion);
 ?>