<?php
	
	require('../conexion/conexion.php');
	
	$valesIniciales = $_POST['ValesIniciales'];
	$valesFinales = $_POST['ValesFinales'];
	$Monto = $_POST['Monto'];
	
	$Val = true; 
	$CodValErr;
	
	for($i = $valesIniciales; $i <= $valesFinales; $i++)
	{
		$sql = "INSERT INTO tbVale VALUES ($i, $Monto, 1, GETDATE(), GETDATE())";
		$result = sqlsrv_query($conn, $sql);
		
		if(!$result)
		{
			$Val = false;
			$CodValErr = $i;
			break;
		}
		
	}
	if($Val == false)
	{
		echo "<script> alert('Error al intentar ingresar los vales, Vale del error $CodValErr'); location.replace('../Menu_Principal.php');</script>";
	}
	else
	{
		echo "<script> alert('Vales ingresados correctamente'); location.replace('../Menu_Principal.php');</script>";
	}
	
?>