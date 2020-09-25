<?php

	require('../conexion/conexion.php');
	
//Marca.strMarca_Vehiculo + '   ' + Linea.strLinea_Vehiculo + '   '+Modelo.strModelo_Vehiculo + '       '+

	$query = "
			select Vehiculo.idVehiculo, Vehiculo.iPlaca,Vehiculo.bActivo,
			upper( Vehiculo.iPlaca  ) as Nombre,Tipo.strTipo_Vehiculo
			from tbVehiculo as Vehiculo
			inner join tbMarca_Vehiculo as Marca on Marca.idMarca_Vehiculo = Vehiculo.idMarca_Vehiculo
			inner join tbModelo_Vehiculo as Modelo on Modelo.idModelo_Vehiculo = Vehiculo.idModelo_Vehiculo
			inner join tbLinea_Vehiculo as Linea on Linea.idLinea_Vehiculo = Vehiculo.idLinea_Vehiculo
			inner join tbTipo_Vehiculo as Tipo on Tipo.idTipo_Vehiculo = Vehiculo.idTipo_Vehiculo
			where idVehiculo > 16
	";
	
		$result = sqlsrv_query($conn, $query);
	
	$error = sqlsrv_errors();
	
	if($result)
	{
		echo $data = "<option value='' disabled selected>-- Seleccione Vehiculo --</option>";
		echo $data = "<option value = 0 >Todos los Vehiculos</option>";
		while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))	
		{
			echo $data = "<option value = '" .$row['idVehiculo'] ."'>" .$row['Nombre'] ."</option>";
		}
		sqlsrv_close($conn);
	}
	else
	{
		echo "Error datos no encontrados";
	}
	
?>