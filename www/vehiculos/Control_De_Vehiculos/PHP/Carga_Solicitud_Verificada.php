<?php
	require('../conexion/conexion.php');
	
	$query = "SELECT * FROM tbSolicitud_Vehiculos";
	
	$result = sqlsrv_query($conn, $query);

	echo "<table>";

	while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
	{
		echo "<td>"
	}
	
	echo"</table>";
?>