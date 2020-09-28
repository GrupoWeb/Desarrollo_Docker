<?php
	require('../conexion/conexion.php');
	
	$idSolicitud = $_POST['idSolicitud'];
	$KMRegreso = $_POST['KMRegreso'];
	
	$sql = "SELECT [KM_Salida] FROM [Control_Vehiculos].[dbo].[tbKM_Vehiculo_Soloicitud] WHERE [idSolicitud] = $idSolicitud";
	
	$result = sqlsrv_query($conn, $sql);
	
	$row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
	
	echo $KMRegreso - $row['KM_Salida'];
?>