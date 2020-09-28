<?php
	require('../conexion/conexion.php');
	
	$idSolicitud = $_POST['Solicitud'];
	//$idSolicitud = 91347;
	
	$query = "
SELECT 
	sl.dFecha_Solicitud, 
	sl.hHora_Solicitud, 
	sl.dFecha_Salida, 
	sl.hHora_Salida, 
	sl.dFecha_Regreso, 
	sl.hHora_Regreso, 
	sl.strDireccion, 
	ts.strTipo_Solicitud, 
	tc.strTipo_Comision, 
	motivo.strMotivo as MotivoSalida, 
	([ap].[nombre1] + ' ' + [ap].[apellidop]) AS strAprobador
FROM 
	tbSolicitud_Vehiculo as sl 
	inner join tbTipo_Solicitud as ts on ts.idTipo_Solicitud = sl.idTipo_Solicitud 
	inner join tbTipo_Comision as tc on tc.idTipo_Comision = sl.idTipo_Comision 
	inner join [syslogin].[dbo].[Tusuario] as ap on ap.id_usu = sl.idAprobador
	INNER JOIN tbMotivos motivo
  ON motivo.idsolicitud = sl.idSolicitud_Vehiculo 
WHERE 
	sl.idSolicitud_Vehiculo =  $idSolicitud";
	
	$result = sqlsrv_query($conn, $query);
	
	if($result){
	
		$row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
		
		$row['dFecha_Solicitud'] = $row['dFecha_Solicitud']->format("d-m-Y");
		
		$row['hHora_Solicitud'] = $row['hHora_Solicitud']->format("H:i:s");
		
		if(!empty($row['dFecha_Salida'])){
			$row['dFecha_Salida'] = $row['dFecha_Salida']->format("d-m-Y");
		
			$row['hHora_Salida'] = $row['hHora_Salida']->format("H:i:s");
		}
		else
		{
			$row['dFecha_Salida'] = "Solicitud sin fecha de salida";
		
			$row['hHora_Salida'] = "Solicitud sin hora de salida";
		}
		if(!empty($row['dFecha_Regreso'])){
			$row['dFecha_Regreso'] = $row['dFecha_Regreso']->format("d-m-Y");
		
			$row['hHora_Regreso'] = $row['hHora_Regreso']->format("H:i:s");
		}
		else
		{
			$row['dFecha_Regreso'] = "Solicitud sin fecha de regreso";
		
			$row['hHora_Regreso'] = "Solicitud sin hora de regreso";
		}
		
		echo json_encode($row,JSON_UNESCAPED_UNICODE);
		
	}
	else
	{
		echo("Datos no encontrados");
	}
	
?>