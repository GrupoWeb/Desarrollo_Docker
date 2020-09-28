<?php
	require('../conexion/conexion.php');
	
	$strTipo_Repuesto = $_POST['Tipo'];
	$strRepuesto = $_POST['Repuesto'];
	$Precio = $_POST['Precio_Repuesto'];
	print $strTipo_Repuesto;
	print $strRepuesto;
	print $Precio;

	$query = "INSERT INTO tbRepuesto(strRepuesto, ftPrecio_Repuesto, bActivo, idTipo_Repuesto) VALUES ('$strRepuesto',$Precio,1,$strTipo_Repuesto)";
	
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