<?php
	require('../conexion/conexion.php');
	
	echo $sql = "
SELECT
	*
FROM
	[dbo].[tbGasolinera] 
WHERE
	[bActivo] = 1";
	
	$result = sqlsrv_query($conn, $sql);
	
	if($result)
	{
		while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
		{
			echo "<option value = '". $row['idGasolinera']. "'>". $row['strDireccinoGasolinera']. "</option>";
		}
	}
	else
	{
		echo "<option>-Contenido no valida-</option>";
	}
?>