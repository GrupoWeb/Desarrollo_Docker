<?php
	require('../conexion/conexion.php');
	
	$idReparacion = $_POST['idReparacion'];
	$idVehiculo = $_POST['idVehiculo'];
	$KMRegreso = $_POST['KMRegreso'];
	
	echo $sql = "EXECUTE [PR_Retorna_Reparacion] $idVehiculo, $idReparacion, 1, $KMRegreso";
	
	$result = sqlsrv_query($conn, $sql);
	
	if($result){
		echo "<script>alert('Vehiculo retornado correctamente'); location.replace('../Menu_Principal.php');</script>";
	}
	else{
		echo "<script>alert('Error al intentar retornar el vehiculo'); location.replace('../Menu_Principal.php');</script>";
	}
?>