<?
	
	require('../conexion/conexion.php');

    $query = "SELECT * FROM tbSolicitante WHERE idSolicitante = 1";

    $result = sqlsrv_query($conn, $query);

    $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

	echo json_encode($row);
?>