<?php
	require('../conexion/conexion.php');
	
	$idVehiculo = $_POST['idVehiculo'];
	$KMRegreso = $_POST['KMRegreso'];
	
	$sql = "SELECT [KMSalida] FROM [dbo].[tbKM_Vehiculo_Reparacion] WHERE [idVehiculo] = $idVehiculo AND bActivo = 1";
	
	$result = sqlsrv_query($conn, $sql);
	
	$row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
	
	echo $KMRegreso - $row['KMSalida'];
?>