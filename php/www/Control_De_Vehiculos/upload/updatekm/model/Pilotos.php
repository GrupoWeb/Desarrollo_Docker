<?php
include '../conexion.php';

$registro = "SELECT idPiloto, (piloto.strPiloto + ' ' + strApellidos) as Nombre FROM tbPiloto piloto WHERE bActivo = 1";

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