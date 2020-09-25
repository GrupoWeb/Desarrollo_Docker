<?php

	require('../conexion/conexion.php');
	
	$query = "SELECT * FROM	tbDepartamento";
	
	$result = sqlsrv_query($conn, $query);
	
	$error = sqlsrv_errors();
	
	if($result)
	{
        echo $data = "<option value='' disabled selected>--Seleccione una opcion--</option>";
		while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))	
		{
			echo $data = "<option value = '" .$row['idDepartamento'] ."'>" .$row['strDepartamento'] ."</option>";
		}
		sqlsrv_close($conn);
	}
	else
	{
		echo "Error datos no encontrados";
	}
	
?>