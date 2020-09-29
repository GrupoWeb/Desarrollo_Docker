<?php
$serverName = "KDEPAZ\DEV";
$connectionInfo = array( "Database"=>"syslogin", "UID"=>"sa", "PWD"=>"abc123");
$conn = sqlsrv_connect( $serverName, $connectionInfo );
if( $conn === false ) {
    die( print_r( sqlsrv_errors(), true));
}


?>
