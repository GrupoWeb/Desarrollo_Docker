<?php
	require('../conexion/conexion.php');
	
	$iPlaca = $_POST['Placa_Vehiculo'];//varchar
	$idTipo_Vehiculo = $_POST['Tipo']; // integer
	$idPiloto_Asignado = $_POST['idPiloto'];//integer
	$idMarca_Vehiculo = $_POST['Marca'];//integer
	$idModelo_Vehiculo = $_POST['Modelo'];//integer		
	$idLinea_Vehiculo = $_POST['Linea'];//integer
	$strColor_Vehiculo = $_POST['Color'];//varchar
	$iVIN = $_POST['VIN'];		//integer
	$km = $_POST['KM_Actual']; //float	
	
	$query = "EXECUTE SP_InsertarVehiculo '$iPlaca', '$idMarca_Vehiculo', '$idModelo_Vehiculo', '$idLinea_Vehiculo', '$strColor_Vehiculo', '$iVIN', '$idTipo_Vehiculo', 0, 0, 1, '$idPiloto_Asignado', null,$km;";
	
	$result = sqlsrv_query($conn, $query);
	
	$error = sqlsrv_errors();
	
	sqlsrv_close($conn);
	echo $result;
	if($result)
	{
		echo "<script>alert('Datos ingresados correctamente');location.replace('../Menu_Principal.php');</script>";
	}
	else
	{
		echo "<script>alert('Error al intentar enviar los datos $error');</script>";
	}
?>