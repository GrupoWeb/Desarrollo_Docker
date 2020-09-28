<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Notificacion</title>
<script type='text/javascript' src="js/jquery.min.js"></script>
</head>

<body style="font-family: 'Segoe UI';">
<?php
	require('conexion/conexion.php');
	$sql = "SELECT strObservacion FROM tbModificaciones WHERE idSolicitud = ".$_GET['p'];
	$result = sqlsrv_query($conn, $sql);
	$row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);	
?>
<h3 style = "margin-left: 50%;">Notificacion de solicitud Modificada</h3>	
<textarea readonly style = "margin-left: 50%;"><? echo $row['strObservacion'];?></textarea>
<br>
<br>
<input type = "button" id = "Aceptar" value = "Aceptar Notificacion" style ="margin-left: 60%;"/>
</body>
<script>
	$(document).ready(function(){
		$("#Aceptar").click(function(){
			window.close();
		});
	});
</script>
</html>
