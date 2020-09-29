<?php
include'../Conexiones/conexion.php';


$sql = "insert into Tusuario(nombre1, nombre2, apellidop, apellidom, usuario, passwordd, id_dependencia, email, estado)
    VALUES
    (
    '".$_POST["nombrea"]."',
		'".$_POST["nombreb"]."',
			'".$_POST["apellidoa"]."',
				'".$_POST["apellidob"]."',
			'".$_POST["usu"]."',
		'".$_POST["psw"]."',
	  ".$_POST["dep"].",
	  '".$_POST["email"]."',
    ".$_POST["estado"].");";
	
	$res=sqlsrv_query($conn,$sql);

sqlsrv_close($conn);	


header("Location: ../index.php");
exit;




?>