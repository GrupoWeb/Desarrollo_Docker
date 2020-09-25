<?php
    include('../conexion.php');

    

    $registro = "SELECT 
                vehiculo.idVehiculo,
                (vehiculo.iPlaca +'  ' + marca.strMarca_Vehiculo + '  ' + linea.strLinea_Vehiculo + '  ' + modelo.strModelo_Vehiculo) AS strVehiculo
                FROM tbVehiculo vehiculo
                INNER JOIN tbMarca_Vehiculo marca ON marca.idMarca_Vehiculo = vehiculo.idMarca_Vehiculo
                INNER JOIN tbLinea_Vehiculo linea ON linea.idLinea_Vehiculo = vehiculo.idLinea_Vehiculo
                INNER JOIN tbModelo_Vehiculo modelo ON modelo.idModelo_Vehiculo = vehiculo.idModelo_Vehiculo
                WHERE vehiculo.bActivo = 1  
    ";


    $result = sqlsrv_query($conn, $registro);
	
   
    
    $rowdata = array();
    $i = 0;

	
	while($row = sqlsrv_fetch_array($result)){		
        
        
        $rowdata[$i]=$row;
        $i++;
		
	}	

	//eliminamos la coma que sobra
    echo json_encode($rowdata);
	


?>