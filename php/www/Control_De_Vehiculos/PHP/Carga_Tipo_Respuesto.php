<?php
	require('../conexion/conexion.php');
	
	$sql = "
SELECT 
	[idTipo_Repuesto],
	[strTipo_Repuesto] 
FROM 
	[dbo].[tbTipo_Repuesto]
";
	
	$result = sqlsrv_query($conn, $sql);
	
	if($result){
		while( $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC) )
		{
			echo "<option value = '". $row['idTipo_Repuesto']."'>". $row['strTipo_Repuesto']."</option>";
		}
	}
	else
	{
		echo "<option>Contenido no encotrado</option>";
	}
?>