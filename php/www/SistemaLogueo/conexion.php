<?php
// $serverName = "sqlsrv:Server=SISTEMAVEHICULO\SQLEXPRESS"; //serverName\instanceName
$serverName = "128.5.8.85"; //serverName\instanceName
$connectionInfo = array( "Database"=>"syslogin", "UID"=>"sa", "PWD"=>"123456");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
}else{
     echo "Conexion no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
} 
?>