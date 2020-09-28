<?php
	require('../conexion/conexion.php');
	
	$idVale = $_REQUEST['idVale'];
	$idVehiculo = $_REQUEST['idVehiculo'];
	
	$sql = "EXECUTE PR_Asigna_Comision $idVale, $idVehiculo, 1, 1";
	
	$result = sqlsrv_query($conn, $sql);
	
	if($result)
	{
		echo "true";
	}
	else
	{
		echo "Error al intentar asignar el vale";
	}
?>