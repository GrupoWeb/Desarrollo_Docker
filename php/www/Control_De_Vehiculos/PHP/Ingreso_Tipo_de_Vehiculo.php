<?php
	require('../conexion/conexion.php');
	
	$strTipo_Vehiculo = $_POST['Tipo_Vehiculo'];
	
	$query = "EXECUTE SP_InsertarTipoVehiculo '$strTipo_Vehiculo'";
	
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