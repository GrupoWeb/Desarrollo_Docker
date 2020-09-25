<?php
    include('../conexion.php');

    $idSolicitud = $_POST['SolicitudRow'];
    //$idSolicitud = 91361;

    // $date1 = '2018-07-01';
    // $date2 = '2018-07-23';
    // $idVehiculo = 18;




    /* fin */

    $registro = "SELECT
                    asignacion.idSolicitud,
                    (vehiculo.iplaca + ' ' +marca.strMarca_Vehiculo + ' , ' + linea.strLinea_Vehiculo + ' , ' + modelo.strModelo_Vehiculo) AS strVehiculo,
                    (pilotos.strPiloto +' ' + pilotos.strApellidos) as NombrePiloto
                    FROM tbAsignacionPiloto asignacion
                    INNER JOIN tbVehiculo vehiculo ON vehiculo.idVehiculo = asignacion.idVehiculoAsignado
                    INNER JOIN tbMarca_Vehiculo marca ON marca.idMarca_Vehiculo = vehiculo.idMarca_Vehiculo
                    INNER JOIN tbLinea_Vehiculo linea ON linea.idLinea_Vehiculo = vehiculo.idLinea_Vehiculo
                    INNER JOIN tbModelo_Vehiculo modelo ON modelo.idModelo_Vehiculo = vehiculo.idModelo_Vehiculo
                    INNER JOIN tbPiloto pilotos ON pilotos.idPiloto = asignacion.idPilotoAsignado
                    where idSolicitud = $idSolicitud
  
    ";


    $result = sqlsrv_query($conn, $registro);
	

   	
	while($row = sqlsrv_fetch_array($result)){		
        
            $Solicitud[]= $row['idSolicitud'];
            $Vehiculo[]= $row['strVehiculo'];
            $NombrePiloto[]= $row['NombrePiloto'];
	
    }	
 



	//eliminamos la coma que sobra
   
$tabla = '
    <table class="table table-striped table-bordered table-hover ">
        <thead class="thead-dark">
            <tr>
                <th>Solicitud</th>
                <th>Vehiculo Asignado</th>
                <th>Piloto Asignado</th>
            </tr>
        </thead>
        <tbody>';

            $tabla .= '
                <tr>
                    <td>'; $tabla .= (int)$Solicitud[0]; $tabla .='</td>
                    <td>'; $tabla .= $Vehiculo[0]; $tabla .='</td>
                    <td>'; $tabla .= $NombrePiloto[0]; $tabla .='</td>
                </tr>
            ';

$tabla .='</tbody>
    </table>

';

echo $tabla;

?>
