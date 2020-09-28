<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Reenvio de Solicitud para su Modificacion</title>
</head>

<body style="font-family: 'Segoe UI';">
<form action = "PHP/Reenvio_Modificacion.php" action = "GET">
	<div align="center">
		<h1>Reenvio de Solilcitud para su Modificacion</h1>
		<label>Ingrese el motivo por el cual el formulario se reenviara<font color="#FF0000">**</font>:</label>
		<br>
		<textarea required  name = "Observacion" autofocus style="width: 40%; height: 80px;"></textarea>
		<br>
		<input type = "hidden" id = "idSolicitud" name = "idSolicitud" value = "<? echo $_GET['p']; ?>"/>
		<input type = "hidden" id = "FechaSalida" name = "FechaSalida" value = "<? echo $_GET['fs']; ?>"/>
		<input type = "hidden" id = "HoraSalida" name = "HoraSalida" value = "<? echo $_GET['hs']; ?>"/>
		<input type = "hidden" id = "FechaRegreso" name = "FechaRegreso" value = "<? echo $_GET['fr']; ?>"/>
		<input type = "hidden" id = "HoraRegreso" name = "HoraRegreso" value = "<? echo $_GET['hr']; ?>"/>
		<input type = "hidden" id = "TipoSolicitud" name = "TipoSolicitud" value = "<? echo $_GET['ts']; ?>"/>
		<input type = "hidden" id = "TipoComision" name = "TipoComision" value = "<? echo $_GET['tc']; ?>"/>
		<input type = "hidden" id = "Motivo" name = "Motivo" value = "<? echo $_GET['mo']; ?>"/>
		<br>
		<input type = "submit" value = "Envio formulario para modificacion"/>
	</div>
	</form>
</body>
</html>
