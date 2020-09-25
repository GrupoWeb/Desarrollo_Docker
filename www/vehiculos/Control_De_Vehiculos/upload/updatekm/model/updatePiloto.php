<?php
include('../conexion.php');

$idPiloto = $_POST['PilotosName'];
$idSolicitud = $_POST['SolicitudRow'];

//$idPiloto = 5;
//$idSolicitud = 91361;


$sesion = "UPDATE tbAsignacionPiloto SET idPilotoAsignado = '$idPiloto' where idSolicitud = $idSolicitud;";




    $response = sqlsrv_query($conn, $sesion);

    $fil = sqlsrv_rows_affected($response);
    echo $fil




?>