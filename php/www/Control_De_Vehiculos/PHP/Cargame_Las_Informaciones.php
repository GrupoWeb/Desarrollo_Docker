<?php
	require('../conexion/conexion.php');
	
	$idVehiculo = $_POST['idVehiculo'];
	
	$sql = "
	SELECT
		[mr].[strMarca_Vehiculo], 
		[md].[strModelo_Vehiculo],
		[ln].[strLinea_Vehiculo]  
	FROM
		[dbo].[tbVehiculo] AS [vh]
		INNER JOIN [dbo].[tbMarca_Vehiculo] AS [mr] ON [mr].[idMarca_Vehiculo] = [vh].[idMarca_Vehiculo] 
		INNER JOIN [dbo].[tbModelo_Vehiculo] AS [md] ON [md].[idModelo_Vehiculo] = [vh].[idModelo_Vehiculo] 
		INNER JOIN [dbo].[tbLinea_Vehiculo] AS [ln] ON [ln].[idLinea_Vehiculo] = [vh].[idLinea_Vehiculo]
	WHERE 
		[vh].[bActivo] = 1
		AND [vh].[idVehiculo] = $idVehiculo
	";
	
	$result = sqlsrv_query($conn, $sql);
	
	if( $result )
	{
		$row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
		
		echo json_encode($row);
	}
	else
	{
		echo "Errore";
	}
?>