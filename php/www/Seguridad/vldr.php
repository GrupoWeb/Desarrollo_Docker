<?php

//probar si llega el array POST
echo "Datos ingresados Satisfactoriamente";
require('conexion.php');

$name1=$_POST["nombreA"];
$name2=$_POST["nombreB"];
$apellido1=$_POST["ApellidoA"];
$apellido2=$_POST["ApellidoB"];
$user=$_POST["USU"];
$Pass=$_POST["psw"];
$estado=$_POST["estado"];

$sql = "INSERT INTO Tusuario (nombre1, nombre2, apellidop, apellidom, usuario, passwordd, estado)
    VALUES (
    '".$_POST["nombreA"]."',
    '".$_POST["nombreB"]."',
	'".$_POST["ApellidoA"]."',
	'".$_POST["ApellidoB"]."',
	'".$_POST["USU"]."',
	'".$_POST["psw"]."',
    '".$_POST["estado"]."');";
	
	$row=sqlsrv_query($conn,$sql ); 
	










?>