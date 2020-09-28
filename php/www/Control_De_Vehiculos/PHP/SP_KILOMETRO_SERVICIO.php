<?php
	require('../conexion/conexion.php'); 
	$KMRegreso = $_POST['KMRegreso'];
    $idServicio = $_POST['idServicio'];
	
	
		$sql = "DECLARE @RETURN_VALUE INT;
                    EXEC @RETURN_VALUE = SP_KmRecorrido $idServicio,$KMRegreso";
	
		$result = sqlsrv_query($conn, $sql);
		
		if ($result) {
			$row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
			echo $row['RETORNO'];
		}else{
			echo '--Kilometraje Total--';
		}
		
	
    
?>