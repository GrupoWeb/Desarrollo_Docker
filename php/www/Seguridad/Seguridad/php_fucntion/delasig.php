<?php 
//iniciamos la sesion
session_start();
//agregamos la conexion de la base de datos
require('../conexion.php');
//le indicamos que si la secion es diferente al id del usuario logueado nos redireccione hacia el login.php
if(!isset($_SESSION['username']))
{ header("location: login.php");}
//asignamos la sesion a la variable idusuario
$idusuario=$_SESSION['username'];



include'../Conexiones/conexion.php';



$sql = "UPDATE Tasignacion SET estado=0 where id_asignacion=$_GET[asg];";

	$res=sqlsrv_query($conn,$sql);

sqlsrv_close($conn);	


echo " 
                <script > 
                
					window.history.go(-1);
                </script>";



?>

