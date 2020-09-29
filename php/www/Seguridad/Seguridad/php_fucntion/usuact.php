<?php
include'../Conexiones/conexion.php';
/*
$nom1=$_POST['nombrea'];
	$nom2=$_POST['nombreb'];
		$ape1=$_POST['apellidoa'];
			$ape2=$_POST['apellidob'];
				$usuario=$_POST['nombrea'];
					$paswor=$_POST['usu'];
			$depto=$_POST['psw'];
		//$dpi=$_POST['dpi'];
	//$tuemail=$_POST['email'];
//$tuphone=$_POST['phone'];
$std=$_POST['estado'];

*/

$sql = "Update Tusuario set
    
    nombre1='" . $_POST["nombrea"] . "',
	nombre2='" . $_POST["nombreb"] . "',
	apellidop='" . $_POST["apellidoa"] . "',
	apellidom='" . $_POST["apellidoa"] . "',
	usuario='" . $_POST["usu"] . "',
	passwordd='" . $_POST["psw"] . "',
	id_dependencia=" . $_POST["dep"] . ",
    estado=" . $_POST["estado"] . "
    where id_usu=" . $_POST["idecito"] . "";
	
	$res=sqlsrv_query($conn,$sql);

sqlsrv_close($conn);	


header("Location: ../index.php");
exit;




?>