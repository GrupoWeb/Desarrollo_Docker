<?php
	require('../conexion/conexion.php');
	
	$idDepartamento = $_POST['idDepartamento'];
	
	$query = "SELECT idMunicipio, * FROM tbMunicipio WHERE idDepartamento = $idDepartamento";
	
	$result = sqlsrv_query($conn, $query);
	
	$error = sqlsrv_errors();
	
	if($result)
	{
		$i = 1;
		while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))	
		{
			echo $data = "<option value = '" .$row['idMunicipio'] ."'>" .$row['strMunicipio'] ."</option>";
			$i++;
		}
		sqlsrv_close($conn);
	}
	else
	{
		echo "Error al intentar cargar los datos";
	}
?>