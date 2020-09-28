<?php
	
	require('../conexion/conexion.php');
	
	$idVehiculo = $_POST['idVehiculo'];
	
	$sql = "SELECT vh.iPlaca, mr.strMarca_Vehiculo, md.strModelo_Vehiculo, ln.strLinea_Vehiculo, sv.idServicio, sv.dFecha_Inicio_Servicio, sv.hHora_Inicio_Servicio 
		 FROM [dbo].[tbVehiculo] as vh 
		 inner join [dbo].[tbMarca_Vehiculo] as mr on mr.idMarca_Vehiculo = vh.idMarca_Vehiculo 
		 inner join [dbo].[tbModelo_Vehiculo] as md ON md.idModelo_Vehiculo = vh.idModelo_Vehiculo 
		 inner join [dbo].[tbLinea_Vehiculo] as ln ON ln.idLinea_Vehiculo = vh.idLinea_Vehiculo 
		 inner join [dbo].[tbKM_Vehiculo_Servicio] as kmvs ON kmvs.idVehiculo = vh.idVehiculo 
		 inner join [dbo].[tbServicio_Vehiculo]as sv ON sv.idServicio = kmvs.idServicio
		  WHERE vh.idVehiculo = $idVehiculo AND sv.bActivo in (0,1)";
	
	$result = sqlsrv_query($conn, $sql);
	
	if($result){
		$row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
		
		$row['dFecha_Inicio_Servicio'] = $row['dFecha_Inicio_Servicio']->format("d-m-Y");
		$row['hHora_Inicio_Servicio'] = $row['hHora_Inicio_Servicio']->format("H:i"); 
		
		echo json_encode($row);
	}
	else
	{
		echo "Error al intetntar obtener los datos";
	}
	
	
?>