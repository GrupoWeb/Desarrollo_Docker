<?php
session_start();

$idSolicitud = $_SESSION['idSolicitud'];
?>
<body>
	<div align="center">
	<label><img id = "cheada" width="111" height="108" src = "png/administrador/images/check.png" /></label>
		<label id = "contenido">
			<br>
			<br>
			Su solicitud ha sido ingresada correctamento, con n&uacute;mero: <? echo $idSolicitud ?>
			<br />
	  Profavor asegurede de apuntar su n&uacute;mero de solicitud ya que con ella podra monitorearla</label>
	</div>
	<style>
		#contenido{
			margin-top: 2%;
			position: relative;
			font-size: 1.6em;
			display: inline-flex;
		}
		
		#cheada{
			margin-top: 15%;
		}		
	</style>
</body>