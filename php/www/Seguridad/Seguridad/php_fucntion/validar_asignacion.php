<?php 
//iniciamos la sesion
session_start();
//agregamos la conexion de la base de datos
require('../Conexiones/conexion.php');
//le indicamos que si la secion es diferente al id del usuario logueado nos redireccione hacia el login.php
if(!isset($_SESSION['username']))
{ header("location: login.php");}
//asignamos la sesion a la variable idusuario
$idusuario=$_SESSION['username'];
 ?>
<?php


include'../Conexiones/conexion.php';
$link=$_POST["idu"];
$link5=$_POST["funcion"];
$link6=$_POST["estado"];
$fecha = date("y-m-d H:i:s");   
print($fecha);


$sqlvldcn="select id_usu,  id_link, estado from tasignacion where id_usu=$link and id_link=$link5 and estado=1;";
$params = array();
$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
$stmt = sqlsrv_query( $conn, $sqlvldcn , $params, $options );
$row_count = sqlsrv_num_rows( $stmt );

if($row_count == 0){

$sql = "insert into Tasignacion(id_usu, id_sistema, id_rol, id_tlink,fecha_asig,id_link, estado)
    VALUES
    (
    	".$_POST["idu"].",
		".$_POST["dept"].",
			".$_POST["usuarip"].",
				".$_POST["Permisos"].",
                '".$fecha."',
				".$_POST["funcion"].",
						".$_POST["estado"].")";

						$res=sqlsrv_query($conn,$sql);
	print($sql);
	if($res == true){
			sqlsrv_close($conn);	
			echo " 
                <script > 
                alert('PERMISO ASIGNADO CON EXITO'); 
				window.history.go(-1);
                </script>
				";
						
			}
}else{
	
	echo " 
                <script > 
                alert('LA ASIGNACION EXISTE :D');
					window.history.go(-1);
                </script>";
}
	




?>