<?php
$serverName = "SISTEMAVEHICULO\SQLEXPRESS"; //serverName\instanceName
$connectionInfo = array( "Database"=>"syslogin", "UID"=>"sa", "PWD"=>"123456");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
}else{
     echo "Conexion no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
} 
?>