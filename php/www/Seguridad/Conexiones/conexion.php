<?php
    $serverName = "ME-S-SQL2016\\\MESQL2016,1433";
    $connectionOptions = array(
        "Database" => "syslogin",
        "Uid" => "cnxdiaco",
        "PWD" => "@DbSchema20"
    );
    //Establishes the connection
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    if($conn){
        echo "Connected!";
    }
    else{
        die(
            print_r(sqlsrv_errors(), true)
        );
    }

?>
