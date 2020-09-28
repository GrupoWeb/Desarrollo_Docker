<?php

	require('../conexion/conexion.php');

	$idVehiculo = $_POST['idVehiculo'];

	$sql = "
SELECT 
	[KM_Inicio], [KM_Final]
FROM
	[dbo].[tbKM_Gasolina] 
WHERE
	[idVehiculo] = $idVehiculo
	AND [bActivo] = 1";

	$result = sqlsrv_query($conn, $sql);

	if($result)
	{
		$row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

		if($row['KM_Inicio'] >= ($row['KM_Final'] - 25))
		{
			echo "true";
		}
		else
		{
			echo "<br>". $row['KM_Inicio'] . "<br>";
			echo $row['KM_Final'];
		}
	}
	else
	{
		echo "Error al consultar el vehiculo";
	}
?>