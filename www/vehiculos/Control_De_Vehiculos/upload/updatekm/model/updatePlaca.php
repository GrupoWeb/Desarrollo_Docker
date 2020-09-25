<?php
include '../conexion.php';

$idPlaca = $_POST['PlacaId'];
$idSolicitud = $_POST['SolicitudRow'];

// $idPlaca = 19;
// $idSolicitud = 91363;


//$idPlaca = 10005;

/*placa actual de la solicitud */


    //Placa de solicitud actual

       $ActualPlaca = "SELECT         
                        idVehiculoAsignado
                    FROM tbAsignacionPiloto asignacion
                    INNER JOIN tbVehiculo vehiculo ON vehiculo.idVehiculo = asignacion.idVehiculoAsignado
                    INNER JOIN tbMarca_Vehiculo marca ON marca.idMarca_Vehiculo = vehiculo.idMarca_Vehiculo
                    INNER JOIN tbLinea_Vehiculo linea ON linea.idLinea_Vehiculo = vehiculo.idLinea_Vehiculo
                    INNER JOIN tbModelo_Vehiculo modelo ON modelo.idModelo_Vehiculo = vehiculo.idModelo_Vehiculo
                    INNER JOIN tbPiloto pilotos ON pilotos.idPiloto = asignacion.idPilotoAsignado
                    where idSolicitud = $idSolicitud
    ";

$DataPlaca = sqlsrv_query($conn, $ActualPlaca);

while($row = sqlsrv_fetch_array($DataPlaca)){
    $PlacaNow = (int)$row['idVehiculoAsignado']; 
}

    /*fin */




//verificar el kilometraje del vehiculo

$KILOMETRAJE = "SELECT TOP 1 
            ROW_NUMBER() OVER(ORDER BY idSolicitud ASC) AS cantidad,
            IsNULL(solicitud.KM_Regreso,solicitud.KM_Salida) as Historico,
            solicitud.KM_Salida,
            solicitud.KM_Regreso, 
            CONVERT(nvarchar(10), dFecha_Ingreso, 103) as fecha,
            solicitud.idSolicitud ,
            vehiculo.iPlaca,
            (vehiculo.iPlaca + ' , ' + marca.strMarca_Vehiculo + ' , ' + linea.strLinea_Vehiculo + ' , ' + modelo.strModelo_Vehiculo) AS strVehiculo
            FROM  tbKM_Vehiculo_Soloicitud solicitud
            INNER JOIN tbVehiculo vehiculo ON vehiculo.idVehiculo = solicitud.idVehiculo
            INNER JOIN tbMarca_Vehiculo marca ON marca.idMarca_Vehiculo = vehiculo.idMarca_Vehiculo
            INNER JOIN tbLinea_Vehiculo linea ON linea.idLinea_Vehiculo = vehiculo.idLinea_Vehiculo
            INNER JOIN tbModelo_Vehiculo modelo ON modelo.idModelo_Vehiculo = vehiculo.idModelo_Vehiculo
            WHERE solicitud.idVehiculo = $idPlaca
            ORDER BY idSolicitud desc 
";


$DataKilometraje = sqlsrv_query($conn, $KILOMETRAJE);

while($row = sqlsrv_fetch_array($DataKilometraje)){
    $kmActual = (int)$row['Historico']; 
}


/*Fin */



//Cambio de Vehiculo en la solicitud
$sesion2 = "UPDATE 
tbAsignacionPiloto
SET idVehiculoAsignado =  $idPlaca
where idSolicitud = $idSolicitud
";

$responseAsignacion = sqlsrv_query($conn, $sesion2);
$fil2 = sqlsrv_rows_affected($responseAsignacion);


//Libera el vehiculo para poder ser asignado
$liberar = "UPDATE 
tbBitacora_Estado_Vehiculo
SET idEstado_Vehiculo = 1,dFecha_Modificacion = GETDATE(), hHora_Modificacion = GETDATE()
where idVehiculo = $PlacaNow and bactivo = 1
";

$ResponseLibre = sqlsrv_query($conn, $liberar);
$FilaLibre = sqlsrv_rows_affected($ResponseLibre);


//Reserva el nuevo
$liberar = "UPDATE 
tbBitacora_Estado_Vehiculo
SET idEstado_Vehiculo = 2, dFecha_Modificacion = GETDATE(), hHora_Modificacion = GETDATE()
where idVehiculo = $idPlaca and bactivo = 1
";

$ResponseLibre = sqlsrv_query($conn, $liberar);
$FilaLibre = sqlsrv_rows_affected($ResponseLibre);


//cambia el estado del kilometraje
// $UpKM = "UPDATE 
// tbBitacora_Kilometraje 
// SET bActivo = 0 
// WHERE idVehiculo = $PlacaNow AND bActivo = 1
// ";

// $KmLibre = sqlsrv_query($conn, $UpKM);
// $FilaKm = sqlsrv_rows_affected($KmLibre);



// $UpKMBitacora = "INSERT INTO 
// tbBitacora_Kilometraje
// VALUES ($kmActual, $KmServicio, GETDATE(), GETDATE(), $idPlaca, 1)
// ";

// $KmBitacora = sqlsrv_query($conn, $UpKMBitacora);
// $FilaKmBitacora = sqlsrv_rows_affected($KmBitacora);

// fin



$sesion = "UPDATE 
tbkm_Vehiculo_Soloicitud
SET idVehiculo =  $idPlaca, KM_Salida = $kmActual
where idSolicitud = $idSolicitud
";

$response = sqlsrv_query($conn, $sesion);
$fil = sqlsrv_rows_affected($response);

if ($fil2 > 0 && $FilaLibre > 0 && $fil > 0) {
   echo $fil;
}else{
    echo "Error, no se puede modificar la solicitud";
}


?>


    
		