<?php
	require('../conexion/conexion.php');
	
	$noFactura = $_REQUEST['noFactura'];
	$idServicio = $_REQUEST['idServicio'];
	
	$sql = "INSERT INTO [dbo].[tbFactura_Servicio] OUTPUT inserted.idFactura_Servicio VALUES ('$noFactura', NULL, GETDATE(),  1, GETDATE(), $idServicio, NULL)";
	
	$result = sqlsrv_query($conn, $sql);
	
	sqlsrv_fetch($result);
			
	$error = sqlsrv_errors();
	$identity =  sqlsrv_get_field($result, 0);
	
	if($result){
		
		for($i = 0; !empty($_REQUEST['Cantidad'.$i]); $i++){
			$sql32 = "EXECUTE PR_IngresoDetalleFactura $identity, NULL, '". $_REQUEST['Descripcion'.$i]."', '". $_REQUEST['Cantidad'.$i]."', ". $_REQUEST['Valor'.$i].""; 
			
			$result32 = sqlsrv_query($conn, $sql32);
		}
		
		for($i = 0; !empty($_REQUEST['CantidadRepuesto'.$i]); $i++){
			$sql32 = "EXECUTE PR_IngresoDetalleFactura $identity, ". $_REQUEST['Repuesto'.$i].", NULL, '". $_REQUEST['CantidadRepuesto'.$i]."', ". $_REQUEST['ValorRepuesto'.$i].""; 
			
			$result32 = sqlsrv_query($conn, $sql32);
		}
		
		if($result32){
			echo "<script> alert('Datos ingresados correctamente!'); window.opener.document.getElementById('idFactura').innerHTML = 'Factura no: ' + '$noFactura'; window.close();</script>";
		}
		else
		{
			//echo "<script> alert('Error al intentar ingresar los datos'); </script>";
		}
		
	}
	else
	{
	
	}
?>