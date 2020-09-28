<?php
	
	require('../conexion/conexion.php');
	
	$idVehiculo = $_POST['idVehiculo'];
	
	$sql = "
SELECT 
	vh.iPlaca, 
	mr.strMarca_Vehiculo, 
	md.strModelo_Vehiculo, 
	ln.strLinea_Vehiculo, 
	sv.idReparacion_Vehiculo, 
	sv.dFecha_Inicio_Reparacion, 
	sv.hHora_Inicio_Reparacion 
FROM 
	[dbo].[tbVehiculo] as vh 
	inner join [dbo].[tbMarca_Vehiculo] as mr on mr.idMarca_Vehiculo = vh.idMarca_Vehiculo 
	inner join [dbo].[tbModelo_Vehiculo] as md ON md.idModelo_Vehiculo = vh.idModelo_Vehiculo 
	inner join [dbo].[tbLinea_Vehiculo] as ln ON ln.idLinea_Vehiculo = vh.idLinea_Vehiculo 
	inner join [dbo].[tbKM_Vehiculo_Reparacion] as kmvr ON kmvr.idVehiculo = vh.idVehiculo 
	inner join [dbo].[tbReparacion_Vehiculo] as sv ON sv.idReparacion_Vehiculo = kmvr.idReparacion
WHERE 
	vh.idVehiculo = $idVehiculo
	AND kmvr.bActivo = 1
	AND sv.bActivo = 1";
	
	$result = sqlsrv_query($conn, $sql);
	
	if($result){
		$row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
		
		$row['dFecha_Inicio_Reparacion'] = $row['dFecha_Inicio_Reparacion']->format("d-m-Y");
		$row['hHora_Inicio_Reparacion'] = $row['hHora_Inicio_Reparacion']->format("H:i"); 
		
		echo json_encode($row);
	}
	else
	{
		echo "Error al intetntar obtener los datos";
	}
	
	
?>