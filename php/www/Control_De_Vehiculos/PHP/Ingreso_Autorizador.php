<?
	require('../conexion/conexion.php');
	
	$strAutorizador = $_POST['Autorizador'];
	
	$query = "INSERT INTO tbAutorizador(strAutorizador) VALUES ('$strAutorizador')";
	
	$result = sqlsrv_query ($conn, $query);
	
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