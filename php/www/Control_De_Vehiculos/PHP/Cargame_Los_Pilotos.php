<?php
	require('../conexion/conexion.php');
	
	echo "<option>Seleccione una opcion</option>";
	
	$sql = "
	SELECT
		[idVehiculo],
		[iPlaca]
	FROM
		[dbo].[tbVehiculo]
	WHERE 
		[bActivo] = 1
	";
	
	$result = sqlsrv_query($conn, $sql);
	
	if( $result )
	{
		while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
		{
			echo "
			<option value = '".  $row['idVehiculo']."'>". $row['iPlaca']."</option>
			";
		}
	}
	else
	{
		echo "<option>Error al intentar cargar los vehiculos</option>";
	}
?>