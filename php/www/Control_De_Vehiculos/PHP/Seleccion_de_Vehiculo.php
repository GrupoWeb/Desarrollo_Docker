<?php
	require('../conexion/conexion.php');
	
	$idVehiculo = $_POST['idVehiculo'];
	$idSolicitud = $_POST['idSolicitud'];
	
	$query = "UPDATE tbSolicitud_Vehiculo SET idVehiculo = $idVehiculo, idVerificador = 1, idEstado_Solicitud = 3 WHERE idSolicitud_Vehiculo = $idSolicitud";
	
	$result = sqlsrv_query($conn, $query);
	
	if($result)
	{
		echo "<script>alert('Solicitud verificada correctamente'); location.replace('../Menu_Principal.php');</script>";
	}
	else
	{
		echo "<script>alert('Error al intentar verificar la solicitud'); location.replace('../Menu_Principal.php');</script>";
	}
?>