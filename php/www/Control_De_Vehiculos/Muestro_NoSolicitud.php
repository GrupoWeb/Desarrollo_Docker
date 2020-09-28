<?php
session_start();

$idSolicitud = $_SESSION['idSolicitud'];
?>
<body>
	<div align="center" >
	<img id = "cheada" width="111" height="108" src = "png/administrador/images/check.png" />
	<br>
	<br>
		<label id = "contenido">
			<br>
			<br>
			Su solicitud ha sido ingresada correctamente, el n&uacute;mero de su solicitud es: <span style = "font-weight: bold; position: relative; display: inherit;"><?php echo $idSolicitud ?></span>
			<br />
	  Porfavor asegurede de apuntar su n&uacute;mero de solicitud ya que con ella podra monitorearla</label>
	</div>
	<style>
		#contenido{
			
			position: relative;
			font-size: 1em;
		}
		
		#cheada{
			padding-top: 20px;
		}		
	</style>
</body>