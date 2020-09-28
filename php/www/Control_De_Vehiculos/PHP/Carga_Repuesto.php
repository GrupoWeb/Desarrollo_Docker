<?php
	require('../conexion/conexion.php');
	
	$sql = "
SELECT 
	[idRepuesto],
	[strRepuesto] 
FROM 
	[dbo].[tbRepuesto]
WHERE
	[bActivo] = 1";
	
	$result = sqlsrv_query($conn, $sql);
	
	if($result){
		while( $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC) )
		{
			echo "<option value = '". $row['idRepuesto']."'>". $row['strRepuesto']."</option>";
		}
	}
	else
	{
		echo "<option>Contenido no encotrado</option>";
	}
?>