<?php 

    header('Content-Type: application/json');
    require_once('../conexion/conexion.php');
    
    $idVehiculo = $_POST['idVehiculo'];
    //$idVehiculo = 10010;
    
    $sql = "DECLARE @RETURN_VALUE INT; 
            EXEC @RETURN_VALUE = SP_ListarRetorno $idVehiculo";
    $result = sqlsrv_query($conn, $sql);
    while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
		{
   
            $data[]=$row;

        }

        echo json_encode($data);

?>