<?php
	
	require('../conexion/conexion.php');
	
	$idSolicitud = $_POST['idSolicitud'];
	
	$sql = "
SELECT 
	drs.strDireccion,
	dp.strDepartamento,
	mn.strMunicipio 
FROM 
	[dbo].[tbDirecciones_Solicitud] as drs 
	INNER JOIN [dbo].[tbDepartamento] as dp ON dp.idDepartamento = drs.idDepartamento 
	INNER JOIN [dbo].[tbMunicipio] as mn ON mn.idMunicipio = drs.idMunicipio 
WHERE 
	drs.idSolicitud_Vehiculo = $idSolicitud 
	AND drs.bActivo = 1";
	
	$result = sqlsrv_query($conn, $sql);
	
	if($result)
	{
		
		while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){
			echo json_encode($row);

		}
		
	}
?>