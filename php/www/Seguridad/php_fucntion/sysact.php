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

$sql = "Update Tsistema set
    
    Nombre_sys='" . $_POST["nombrea"] . "',
	 ruta_sistema='" . $_POST["nombreb"] . "',
	estado=" . $_POST["estado"] . "
	    where id_sistema=" . $_POST["idecito"] . "";
	
	$res=sqlsrv_query($conn,$sql);
//echo $sql;
sqlsrv_close($conn);	


header("Location: ../index.php");
exit;




?>