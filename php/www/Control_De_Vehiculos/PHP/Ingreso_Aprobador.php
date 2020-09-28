<?php
	
	require('../conexion/conexion.php');
	
	$strAprobador = $_POST['Aprobador'];
	
	echo $query = "INSERT INTO tbAprobador(strAprobador) VALUES ('$strAprobador')";
	
	$result = sqlsrv_query($conn,$query);

	sqlsrv_close($conn);
	
	if($result)
	{
		
		echo "<script>alert('Datos ingresados correctamente'); location.replace('../Menu_Principal.php');</script>";
	}
	else
	{
		echo "<script>alert('Error al intentar enviar los datos'); location.replace('../Menu_Principal.php');</script></script>";
	}
	
?>