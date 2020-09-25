<?php
	require('../conexion/conexion.php');
	
	$idSolicitud = $_POST['idSolicitud'];
	
	$sql = "SELECT * FROM tbModificaciones where idSolicitud = $idSolicitud";
	
	$result = sqlsrv_query($conn, $sql);
	
	if($result)
	{
		$row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
		echo json_encode($row);
	}
	else
	{
		echo "Datos no encontrados";
	}
?>