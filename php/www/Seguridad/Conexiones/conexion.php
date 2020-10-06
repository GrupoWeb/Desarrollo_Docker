<?php
// $serverName = "sqlsrv:Server=SISTEMAVEHICULO\SQLEXPRESS";
$serverName = "ME-S-SQL2016\\\MESQL2016,1433"; //serverName\instanceName
$connectionInfo = array( "Database"=>"syslogin", "UID"=>"cnxdiaco", "PWD"=>"@DbSchema20");
$conn = sqlsrv_connect( $serverName, $connectionInfo );
if( $conn === false ) {
    die( print_r( sqlsrv_errors(), true));
}


?>
