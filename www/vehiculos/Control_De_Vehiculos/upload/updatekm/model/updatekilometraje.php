<?php
    include('../conexion.php');

    
    $idSolicitud = $_POST['txtid'];
    $Salida = $_POST['txtSalida'];
    $Entrada = $_POST['txtEntrada'];

    $registro = "UPDATE tbKM_Vehiculo_Soloicitud
                    SET KM_Salida = $Salida  , KM_Regreso = $Entrada 
                        WHERE idSolicitud = $idSolicitud;        
    ";

    $response = sqlsrv_query($conn, $registro);

    $fil = sqlsrv_rows_affected($response);
    echo $fil;
    

   
?>
