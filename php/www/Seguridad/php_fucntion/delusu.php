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

$sql = "UPDATE Tusuario SET estado=0 where id_usu=$_GET[id];";
	
	$res=sqlsrv_query($conn,$sql);

sqlsrv_close($conn);	


echo " 
                <script > 
               					window.history.go(-1);
                </script>";




?>