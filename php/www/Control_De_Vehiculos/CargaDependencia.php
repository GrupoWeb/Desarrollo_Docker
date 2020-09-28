<?php
	require('conexion.php');
	
	$sql = "SELECT iddireccion, nombre FROM [dbo].[direccion] WHERE activo = 1";
	
	$result = sqlsrv_query($conn,$sql);
	
	if($result)
	{
		while( $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC) )
		{
			echo "<option value = '". $row['iddireccion']."'>". $row['nombre']."</option>";
		}	
	}
	else
	{
		echo "No hay datos";
	}
?>