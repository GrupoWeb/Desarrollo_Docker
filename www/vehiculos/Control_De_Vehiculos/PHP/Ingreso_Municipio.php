<?php

	require('../conexion/conexion.php');
	
	$Municipio = $_POST['Municipio'];
	$Departamento = $_POST['Departamento'];
	
	$query = "INSERT INTO tbMunicipio(strMunicipio,idDepartamento) VALUES ('$Municipio',$Departamento)";
	
	$result = sqlsrv_query($conn, $query);
	
	sqlsrv_close($conn);
	
	if($result)
	{
		echo "<script>alert('Datos ingresados correctamente');location.replace('../Menu_Principal.php');</script>";
	}
	else
	{
		echo "<script>alert('Error al intentar enviar los datos'); location.replace('../Menu_Principal.php');</script></script>";
	}
	
?>