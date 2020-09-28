<?php
	require('../conexion/conexion.php');
	
	$strTipo_Servicio = $_POST['Tipo_Servicio'];
	
	$query = "EXECUTE SP_InsertarTipoServicio '$strTipo_Servicio'";
	
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