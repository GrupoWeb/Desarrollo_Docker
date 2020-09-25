<?php
	require('../conexion/conexion.php');
	
	$strModelo_Vehiculo = $_POST['Modelo_Vehiculo'];
	$idMarca_Vehiculo = $_POST['idMarca_Vehiculo'];
	
	$query = "EXECUTE SP_InsertarModeloVehiculo '$strModelo_Vehiculo', '$idMarca_Vehiculo'";
	
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