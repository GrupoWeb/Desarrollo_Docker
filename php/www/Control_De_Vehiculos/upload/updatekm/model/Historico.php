<?php
    include('../conexion.php');

    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];
    $idVehiculo = $_POST['ContainerVehiculo'];

    // $date1 = '2018-07-01';
    // $date2 = '2018-07-23';
    // $idVehiculo = 18;

    

    $registro = "SELECT 
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
            WHERE solicitud.idVehiculo = $idVehiculo
            AND solicitud.dFecha_Ingreso between '$date1' and '$date2'  
    ";

    $count = "SELECT
                ROW_NUMBER() OVER(ORDER BY solicitud.idSolicitud ASC) AS cantidad
            FROM  tbKM_Vehiculo_Soloicitud solicitud
            WHERE solicitud.idVehiculo = $idVehiculo
            AND solicitud.dFecha_Ingreso between '$date1' and '$date2'
    ";



    $result = sqlsrv_query($conn, $registro);
	
    $RCantidad = sqlsrv_query($conn, $count);

    
    $rowdata = array();
    $i = 0;

	
	while($row = sqlsrv_fetch_array($result)){		
        
            $Historio[]= $row['Historico'];
            $KM_Salida[]= $row['KM_Salida'];
            $KM_Regreso[]= $row['KM_Regreso'];
            $dFecha_Ingreso[] = $row['fecha'];
            $idSolicitud[] = $row['idSolicitud'];
            $iPlaca[] = $row['strVehiculo'];	
    }	
    
    while($fila = sqlsrv_fetch_array($RCantidad)){
            $cantidad = $fila[0];
    }

    $paso=0;



	//eliminamos la coma que sobra
   
$tabla = '
    <table class="table table-striped table-bordered table-hover ">
        <thead class="thead-dark">
            <tr>
                <th>Historico</th>
                <th>Kilometraje Salida</th>
                <th>Kilometraje Entrada</th>
                <th>Fecha</th>
                <th>Solicitud</th>
                <th>Vehiculo</th>
            </tr>
        </thead>
        <tbody>';

        while($paso < $cantidad){
            $tabla .= '
                <tr>
                    <td>'; $tabla .= (int)$Historio[$paso]; $tabla .='</td>
                    <td>'; $tabla .= (int)$KM_Salida[$paso]; $tabla .='</td>
                    <td>'; $tabla .= (int)$KM_Regreso[$paso]; $tabla .='</td>
                    <td>'; $tabla .= $dFecha_Ingreso[$paso]; $tabla .='</td>
                    <td>'; $tabla .= $idSolicitud[$paso]; $tabla .='</td>
                    <td>'; $tabla .= $iPlaca[$paso]; $tabla .='</td>
                </tr>
            ';
        $paso++;
        }


$tabla .='</tbody>
    </table>

';

echo $tabla;

?>
