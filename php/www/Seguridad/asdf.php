<?php
include'Conexiones/conexion.php';
$sql = "insert into Tasignacion(id_usu, id_sistema, id_rol, id_tlink, id_link, estado)
    VALUES
    (
    ".$_POST["id"].",
		".$_POST["sys"].",
			".$_POST["rol"].",
				".$_POST["permisos"].",
					".$_POST["funcion"].",
						".$_POST["estado"].");";
	
	

	
	$res=sqlsrv_query($conn,$sql);

sqlsrv_close($conn);	


header("Location: ../Seguridad/index.php");
exit;
				



?>