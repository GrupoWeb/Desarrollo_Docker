<?php 
    require('../conexion/conexion.php');

    $query = 'DECLARE @RETURN_VALUE INT;
                EXEC @RETURN_VALUE = SP_ListarS;';
    
    $result = sqlsrv_query($conn, $query);

    // $tabla = array();
    $tabla = "";
    while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
		{
            $PRINTER = '<button onClick=\"PrintServicio(this.id);\" type=\"button\" class=\"editar btn btn-primary\" id=\"'.$row['idServicio'].'\"><i class=\"fa fa-print\" aria-hidden=\"true\"></i></button>';
            $tabla.='{  
                      "PLACA":"'.$row['PLACA'].'",
                      "SALIDA":"'.$row['SALIDA'].'",
                      "FECHA_INICIO":"'.$row['FECHA_INICIO'].'",
                      "LUGAR":"'.$row['LUGAR'].'",
                      "TIPO_SERVICIO":"'.$row['TIPO_SERVICIO'].'",
                      "MOTIVO":"'.$row['MOTIVO'].'",
                      "ENVIA_RECIBE":"'.$row['ENVIA_RECIBE'].'",
                      "PRINTER":"'.$PRINTER.'"
                }';


        }


        echo '{"data":['.$tabla.']}';	
        
      

?>