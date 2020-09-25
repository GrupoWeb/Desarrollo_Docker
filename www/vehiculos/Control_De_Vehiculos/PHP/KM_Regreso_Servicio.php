<?php
	require('../conexion/conexion.php');
	
	$idVehiculo = $_POST['idVehiculo'];
	$KMRegreso = $_POST['KMRegreso'];
	$idServicio = $_POST['idServicio'];
	
	$sql = "
SELECT 
	[ftKMSalida] 
FROM 
	[dbo].[tbKM_Vehiculo_Servicio] 
WHERE 
	[idVehiculo] = $idVehiculo
	AND [idServicio] = $idServicio 
	AND bActivo = 1";
	
	$result = sqlsrv_query($conn, $sql);
	
	$row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
	
	echo $KMRegreso - $row['ftKMSalida'];
?>