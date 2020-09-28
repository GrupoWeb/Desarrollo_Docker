<?php
session_start();
$idUsuario = $_SESSION['username'];

	require('../conexion/conexion.php');
	
	$idServicio = $_POST['idServicio'];
	$idVehiculo = $_POST['idVehiculo'];
	$KMRegreso = $_POST['KMRegreso'];
	
	echo $sql = "EXECUTE PR_Retorna_Servicio $idVehiculo, $idServicio, $idUsuario, $KMRegreso";
	
	$result = sqlsrv_query($conn, $sql);
	
	if($result){
		echo 'success';
		// echo "<script>alert('Vehiculo retornado correctamente'); location.replace('../Menu_Principal.php');</script>";
	}
	else{
		// echo "<script>alert('Error al intentar retornar el vehiculo'); location.replace('../Menu_Principal.php');</script>";
	}
?>