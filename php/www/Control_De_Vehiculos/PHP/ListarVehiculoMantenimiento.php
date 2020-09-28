<?php 
    include_once('../conexion/conexion.php');
    
    $sql = 'EXEC SP_ListarVehiculoRetorno';

    $result = sqlsrv_query($conn, $sql);

    while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
        $PRINTER = '<button onClick=\"returnData(this.id);\" type=\"button\" class=\"editar btn btn-primary\" id=\"'.$row['idVehiculo'].'\"><i class=\"fa fa-print\" aria-hidden=\"true\"></i></button>';
        $tabla.='{  
				  "PLACA":"'.$row['PLACA'].'",
                  "NOMBRE":"'.$row['NOMBRE'].'",
                  "PILOTO":"'.$row['PILOTO'].'",
                  "CONTROL":"'.$PRINTER.'"
				},';
    }

    $tabla = substr($tabla,0, strlen($tabla) - 1);

    echo '{"data":['.$tabla.']}';	

?>

