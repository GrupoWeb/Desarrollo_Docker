<?php
	require('../conexion/conexion.php');
	
	$idSolicitud = $_POST['Solicitud'];
	
	$query = "SELECT dFecha_Solicitud, hHora_Solicitud, dFecha_Salida, hHora_Salida, dFecha_Regreso, hHora_Regreso FROM tbSolicitud_Vehiculo WHERE idSolicitud_Vehiculo = $idSolicitud";
	
	$result = sqlsrv_query($conn, $query);
	
	if($result){
	
		$row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
		
		$row['dFecha_Solicitud'] = $row['dFecha_Solicitud']->format("d-m-Y");
		
		$row['hHora_Solicitud'] = $row['hHora_Solicitud']->format("H:i:s");
		
		$row['dFecha_Salida'] = $row['dFecha_Salida']->format("d-m-Y");
		
		$row['hHora_Salida'] = $row['hHora_Salida']->format("H:i:s");
		
		$row['dFecha_Regreso'] = $row['dFecha_Regreso']->format("d-m-Y");
		
		$row['hHora_Regreso'] = $row['hHora_Regreso']->format("H:i:s");
	
		echo json_encode($row);
		
	}
	else
	{
		echo("Datos no encontrados");
	}
	
?>