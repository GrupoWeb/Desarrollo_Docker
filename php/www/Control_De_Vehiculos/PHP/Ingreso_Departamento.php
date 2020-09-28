<?php

	require('../conexion/conexion.php');
	
	$Departamento = $_POST['Departamento'];
	
	$query = "INSERT INTO tbDepartamento(strDepartamento,iCantidad_Solicitudes) VALUES ('$Departamento',0)";
	
	$result = sqlsrv_query($conn, $query);
	
	$error = sqlsrv_errors();
	
	sqlsrv_close($conn);
	
	if($result)
	{
		echo "<script>alert('Datos ingresados correctamente');location.replace('../Menu_Principal.php');</script>";
	}
	else
	{
		echo "<script>alert('Error al intentar enviar los datos $error');</script>";
	}

?>