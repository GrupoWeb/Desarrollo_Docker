<?php
	require('../conexion/conexion.php');
	
	echo "<option>Seleccione una opcion</option>";
	
	$sql = "
	SELECT
		[idPiloto],
		[strPiloto] 
	FROM
		[dbo].[tbPiloto]
	WHERE 
		[bActivo] = 1
	";
	
	$result = sqlsrv_query($conn, $sql);
	
	if( $result )
	{
		while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
		{
			echo "
			<option value = '".  $row['idPiloto']."'>". $row['strPiloto']."</option>
			";
		}
	}
	else
	{
		echo "<option>Error al intentar cargar los pilotos</option>";
	}
?>