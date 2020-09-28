<?php
session_start();
$idUsuario = $_SESSION['username'];

	require('../conexion/conexion.php');
	
	$idVehiculo = $_POST['idVehiculo'];
	$idLugarServicio = $_POST['idLugarServicio'];
	$idTipoServicio = $_POST['Tipo_Servicio'];
	$Motivo = $_POST['iMotivo'];
	
	echo $sql = "EXECUTE PR_Servicio_Vehiculo $idVehiculo, $idLugarServicio, $idTipoServicio, '$Motivo', 5, $idUsuario";
	
	$result = sqlsrv_query($conn, $sql);

	$rows_affected = sqlsrv_rows_affected( $result);
	if($rows_affected > 0)
	{
		echo true;
	
		// echo "<script> alert('Vehiculo enviado a Servicio de Mantenimiento!'); location.replace('../Menu_Principal.php');</script>";
	}
	// else
	// {
	// 	echo "<script> alert('Error al intentar enviar el vehiculo a Servicio!'); location.replace('../Menu_Principal.php');</script>";
	// }
?>