<?php
	require('../conexion/conexion.php');
	
	$strLugar_Servicio = $_POST['Lugar_Servicio'];
	$strDireccion = $_POST['Dir_Servicio'];
	
	$query = "EXECUTE SP_InsertarLugarServicio '$strLugar_Servicio','$strDireccion'";
	
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