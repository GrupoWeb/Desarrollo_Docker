<?php
    $serverName = "SistemaVehiculo\SQLEXPRESS";
    $connectionInfo = array("Database" => "Control_Vehiculos", "UID"=>"sa", "PWD"=>"123456");
    $conn = sqlsrv_connect($serverName, $connectionInfo);
    if($conn === false)
    {
        die( print_r(sqlsrv_errors(), true) );
    }
?>