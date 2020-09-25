<?php
	require('../conexion/conexion.php');
	
 	$idSolicitud = $_POST['idSolicitud'];
	$dFecha_Salida = (!is_null($_POST['bFechaSalida']) ? "'".$_POST['bFechaSalida']."'" : "NULL");
	$hHora_Salida = (!is_null($_POST['bHoraSalida']) ? "'".$_POST['bHoraSalida']."'" : "NULL");
	$dFecha_Regreso = (!is_null($_POST['bFechaRegreso']) ? "'".$_POST['bFechaRegreso']."'" : "NULL");
	$hHora_Regreso = (!is_null($_POST['bHoraRegreso']) ? "'".$_POST['bHoraRegreso']."'" : "NULL");
	$strMotivo = (!is_null($_POST['bMotivo']) ? "'".$_POST['bMotivo']."'" : "NULL");
	
	$sql = "EXECUTE PR_Reenvia_Modificacion $idSolicitud, $dFecha_Salida, $hHora_Salida, $dFecha_Regreso, $hHora_Regreso, $strMotivo, 2, 1";
	
	$result = sqlsrv_query($conn, $sql);
	
	if($result)
	{
		echo "<script>alert('Solicitud reenviada correctamente'); location.replace('../Menu_Principal.php'); window.opener.history.back(); window.close();</script>";
	}
	else
	{
		echo "<script>alert('Error al intetntar reenviar la solicitud'); location.replace('../Menu_Principal.php'); window.opener.history.back(); window.close();</script>";
	}
	
	
?>