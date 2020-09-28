<?php
include '../conexion.php';

$registro = "SELECT 
                idSolicitud_Vehiculo,
                idSolicitud_Vehiculo as Nombre
            FROM tbsolicitud_Vehiculo
            where year(dFecha_Solicitud) = 2018
            ORDER BY idSolicitud_Vehiculo desc

";

$result = sqlsrv_query($conn, utf8_decode($registro));

$rowdata = array();
$i = 0;

while ($row = sqlsrv_fetch_array($result)) {

    $rowdata[$i]=$row;
    $i++;

}

//eliminamos la coma que sobra

echo json_encode($rowdata);

?>