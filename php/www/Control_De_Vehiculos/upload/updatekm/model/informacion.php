<?php
    include('../conexion.php');

    

    $registro = "SELECT 
                   KM_Salida,
                   KM_Regreso,
                   idSolicitud
                   from tbKM_Vehiculo_Soloicitud
                   order by idSolicitud desc
                   
    ";


    $result = sqlsrv_query($conn, $registro);
	
	$tabla = "";
	
	while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){		

         $editar = '<a data-toggle=\"modal\" data-target=\"#ModalUpdate\"     onClick=\"GetDocumento(\''.$row['idSolicitud'].'\',\''.(int)$row['KM_Salida'].'\',\''.(int)$row['KM_Regreso'].'\')\" style=\"font-size: 2em; padding-left: 16px;color:red;cursor:pointer;\"><i class=\"fas fa-sync\"></i></a>';
        
		
		$tabla.='{
				  "Salida":"'. (int)$row['KM_Salida'].'",
                  "Regreso":"'.(int)$row['KM_Regreso'].'",
                  "Solicitud":"'.$row['idSolicitud'].'",
                  "Update":"'.$editar.'"
                 
				},';		
	}	

	//eliminamos la coma que sobra
	$tabla = substr($tabla,0, strlen($tabla) - 1);

    echo '{"data":['.$tabla.']}';	


?>
