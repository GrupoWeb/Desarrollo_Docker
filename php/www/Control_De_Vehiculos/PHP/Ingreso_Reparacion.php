<?php
session_start();
$idUsuario = $_SESSION['username'];

	require('../conexion/conexion.php');
	
	$idVehiculo = $_POST['idVehiculo'];
	$idLugarServicio = $_POST['idLugarServicio'];
	$Motivo = $_POST['Motivo'];
	
	echo $sql = "EXECUTE PR_Reparacion_Vehiculo $idVehiculo, $idLugarServicio, '$Motivo', 4, $idUsuario";
	
	$result = sqlsrv_query($conn, $sql);
	
	if($result)
	{
		echo "<script> alert('Vehiculo enviado a Reparacion!'); location.replace('../Menu_Principal.php');</script>";
	}
	else
	{
		echo "<script> alert('Error al intentar enviar el vehiculo a Reparacion!'); location.replace('../Menu_Principal.php');</script>";
	}
?>