<?php

	require('../conexion/conexion.php');

	$fechaInicial = $_POST['fechaInicial'];
	$fechaFinal = $_POST['fechaFinal'];
	$Vehiculo = $_POST['vehiculo'];

	$salida = "";
	$query = "
		select 
		Solicitud.idSolicitud_Vehiculo,
		Solicitud.dfecha_solicitud, 
		Solicitud.hHora_solicitud,
		Solicitud.dfecha_salida,
		Solicitud.hHora_salida,
		Solicitud.strMotivo,
		Solicitud.observaciones,
		Kilometraje.KM_Salida,
		Kilometraje.KM_Regreso,
		(Kilometraje.KM_Regreso - Kilometraje.KM_Salida) as Recorrido_Total,
		Kilometraje.dFecha_Ingreso,
		Kilometraje.hHora_Ingreso,
		Vehiculo.iPlaca,
		(Marca.strMarca_Vehiculo + '  ' + Linea.strLinea_Vehiculo + '  ' + Modelo.strModelo_Vehiculo) as Nombre_Vehiculo,
		(Solicitante.nombre1 + ' ' + Solicitante.apellidop) AS Solicitante,
		Modelo.strModelo_Vehiculo
		from tbSolicitud_Vehiculo Solicitud
		INNER JOIN tbKM_Vehiculo_Soloicitud Kilometraje
		ON Kilometraje.idSolicitud = Solicitud.idSolicitud_Vehiculo
		INNER JOIN tbVehiculo Vehiculo
		ON Vehiculo.idVehiculo = Kilometraje.idVehiculo
		INNER JOIN [syslogin].[dbo].Tusuario AS Solicitante 
		ON Solicitante.id_usu = Solicitud.idSolicitante
		INNER JOIN tbMarca_Vehiculo as Marca
		ON Marca.idMarca_Vehiculo = Vehiculo.idMarca_Vehiculo
		INNER JOIN tbLinea_Vehiculo as Linea
		ON Linea.idLinea_Vehiculo = Vehiculo.idLinea_Vehiculo
		INNER JOIN tbModelo_Vehiculo as Modelo
		ON Modelo.idModelo_Vehiculo = Vehiculo.idModelo_Vehiculo
		 
	 ";

 if (isset($_POST['fechaInicial']) && isset($_POST['fechaFinal'])) {
 	 	 $query = "
		select 
		Solicitud.idSolicitud_Vehiculo,
		Solicitud.dfecha_solicitud, 
		Solicitud.hHora_solicitud,
		Solicitud.dfecha_salida,
		Solicitud.hHora_salida,
		Solicitud.strMotivo,
		Solicitud.observaciones,
		Kilometraje.KM_Salida,
		Kilometraje.KM_Regreso,
		(Kilometraje.KM_Regreso - Kilometraje.KM_Salida) as Recorrido_Total,
		Kilometraje.dFecha_Ingreso,
		Kilometraje.hHora_Ingreso,
		Vehiculo.iPlaca,
		(Marca.strMarca_Vehiculo + ' ' + Linea.strLinea_Vehiculo + ' ' + Modelo.strModelo_Vehiculo) as Nombre_Vehiculo,
		(Solicitante.nombre1 + ' ' + Solicitante.apellidop) AS Solicitante,
		Modelo.strModelo_Vehiculo,
		Vehiculo.idVehiculo
		from tbSolicitud_Vehiculo Solicitud
		INNER JOIN tbKM_Vehiculo_Soloicitud Kilometraje
		ON Kilometraje.idSolicitud = Solicitud.idSolicitud_Vehiculo
		INNER JOIN tbVehiculo Vehiculo
		ON Vehiculo.idVehiculo = Kilometraje.idVehiculo
		INNER JOIN [syslogin].[dbo].Tusuario AS Solicitante 
		ON Solicitante.id_usu = Solicitud.idSolicitante
		INNER JOIN tbMarca_Vehiculo as Marca
		ON Marca.idMarca_Vehiculo = Vehiculo.idMarca_Vehiculo
		INNER JOIN tbLinea_Vehiculo as Linea
		ON Linea.idLinea_Vehiculo = Vehiculo.idLinea_Vehiculo
		INNER JOIN tbModelo_Vehiculo as Modelo
		ON Modelo.idModelo_Vehiculo = Vehiculo.idModelo_Vehiculo
		and  Modelo.idMarca_Vehiculo = Marca.idMarca_Vehiculo
		where  Solicitud.dFecha_Solicitud between '$FechaInicial' and '$fechaFinal'  and Vehiculo.idVehiculo = $Vehiculo
	 ";
	} 
	$result = sqlsrv_query($conn, $query);
	
	if($result){
				
		while($fila = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))

		{
			echo "
			<tr>
						 <td>".$fila['dfecha_salida']->format("d-m-Y")."</td>
						 <td>".$fila['dFecha_Ingreso']->format("d-m-Y")."</td>
						 <td>".$fila['hHora_salida']->format("H:i:s")."</td>
						 <td>".$fila['hHora_Ingreso']->format("H:i:s")."</td>
						 <td>".$fila['KM_Salida']."</td>
						 <td>".$fila['KM_Regreso']."</td>
						 <td>".$fila['Recorrido_Total']."</td>
						 <td>".strtolower($fila['strMotivo'])."</td>
						 <td>".strtolower($fila['Solicitante'])."</td>
						 <td>".$fila['Nombre_Vehiculo']."</td>
						 <td>".$fila['iPlaca']."</td>
						 <td>".$fila['strModelo_Vehiculo']."</td>
					</tr>
					";
		}
	}
			else
	{
		echo "Contenido no encontrado";
	}

 	 ?>
