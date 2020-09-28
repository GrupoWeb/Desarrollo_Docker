<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Rechazo de Solicitud</title>
</head>

<body style="font-family: 'Segoe UI';">
	<? $idSolicitud =  $_GET['p'];?>
	<form action = "PHP/Rechaza_Solicitud.php" method = "POST">
	<div align="center">
		<h1>Rechazo de Solicitud</h1>
		<label>Ingrese el motivo por el cual la solicitud se Eliminara<font color="#FF0000">**</font>:</label>
		<br>
		<textarea required id = "Observacion" autofocus name = "Observacion" style="width: 40%; height: 80px;"></textarea>
		<input type = "hidden" id= "idSolicitud" name = "idSolicitud" value = "<? echo $idSolicitud;?>"/>
		<br>
		<br>
		<input type = "submit" id = "EnvioFormulario" value = "Envio formulario para modificacion"/>
	</div>
	</form>
</body>
</html>
