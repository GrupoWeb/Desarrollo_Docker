<?php
session_start();
	require('../conexion/conexion.php');

	if(isset($_POST['fechaInicial']) and isset($_POST['fechaFinal']) and isset($_POST['vehiculo'])){
		$fechaInicial = $_POST['fechaInicial'];
		$fechaFinal = $_POST['fechaFinal'];
		$Vehiculo = $_POST['vehiculo'];
	}


	$salida = "";

	


if (isset($_POST['fechaInicial']) && isset($_POST['fechaFinal']) && isset($_POST['vehiculo'])) {
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
		where  Solicitud.dFecha_Solicitud between '$fechaInicial' and '$fechaFinal' 
	 	ORDER BY KM_Salida asc
	 ";
}else{

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
		ORDER BY KM_Salida asc
		 
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
		where Vehiculo.idVehiculo = $Vehiculo
		and  Solicitud.dFecha_Solicitud between '$fechaInicial' and '$fechaFinal'  
	 	ORDER BY KM_Salida asc
	 ";
	  }
	 
}


 

	 $resultado = sqlsrv_query($conn, $query);
	 if ($resultado) {
	 	$salida .="
	 	
		

		<style>
			

			  table {
				    border-collapse: collapse;
				    background-color: transparent;
				  }
				  .container table {     font-family: 'Lucida Sans Unicode', 'Lucida Grande', Sans-Serif;
				  font-size: 12px;    margin: 8px;     width: 100%; text-align: center;    border-collapse: collapse; }

				  .container th {     font-size: 14px;     font-weight: normal;     padding: 7px;     
				    border-top: 4px solid #D7DBEA;    border-bottom: 1px solid #fff; color: #000; text-align: center }

				  .container td {    padding: 15px;     background: #fff;     border: 1px solid #000;
				      color: #669;    }
				  .container tr:hover td { background: #26A8FA; color: #fff; cursor: pointer;}
		
			</style>
			
		<div class='container' style=\"width:100%;pisition: relative;   display: inline-block;\" >	
	 	<table class='table table-inverse'  id='mostrar_Vehiculos'>
					 <thead>
					 	<tr >
							<th class=\"bg-blue\">Solicitud</th>
							<th class=\"bg-blue\">Fecha</th>
					 		<th class=\"bg-blue\">KM Salida</th>
					 		<th class=\"bg-blue\">KM Entrada</th>
					 		<th class=\"bg-blue\">Recorrido</th>
					 		<th class=\"bg-blue\">Comision</th>
					 		<th class=\"bg-blue\">Solicitante</th>
					 		<th class=\"bg-blue\">Vehiculo</th>
					 		<th class=\"bg-blue\">Placa</th>
					 		<th class=\"bg-blue\">Modelo</th>
					 		
					 	</tr>
					 </thead>
					 <tbody>";

		while ($fila = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC)) {
			$salida.= "<tr>
						 <td>".$fila['idSolicitud_Vehiculo']."</td>
						 <td>".date_format($fila['dfecha_solicitud'],'Y-m-d')."</td>
						 <td>".$fila['KM_Salida']."</td>
						 <td>".$fila['KM_Regreso']."</td>
						 <td>".$fila['Recorrido_Total']."</td>
						 <td>".strtolower($fila['strMotivo'])."</td>
						 <td>".strtolower($fila['Solicitante'])."</td>
						 <td>".$fila['Nombre_Vehiculo']."</td>
						 <td>".$fila['iPlaca']."</td>
						 <td>".$fila['strModelo_Vehiculo']."</td>
					</tr>";
		}
		$salida.="
					</tbody>
					</table>
					</div>
					
					<script>
						 
						
						  var d = new Date();
						  var fecha = d.toLocaleDateString('es-CL');
						  var hora = d.toLocaleTimeString('es-CL');
						 $('#mostrar_Vehiculos').dataTable({
							'destroy': true,
							'pagingType': 'full',
					        'searching': false,
					        'ordering': false,
					        'lengthChange': true,
					        'autoWidth': false,
					        'pageLength': 5,
					        
					        'responsive': true,
					        'language': {
							        'sProcessing':     'Procesando...',
									'sLengthMenu':     'Mostrar _MENU_ registros',
									'sZeroRecords':    'No se encontraron resultados',
									'sEmptyTable':     'Ningún dato disponible en esta tabla',
									'sInfo':           '',
									'sInfoEmpty':      'Va de la targeta 0 a la 0 de un total de 0 registros',
									'sInfoFiltered':   '(filtrado de un total de _PAGES_ registros)',
									'sInfoPostFix':    '.',
									'sSearch':         'Buscar:',
									'sUrl':            '',
									'sInfoThousands':  ',',
									'sLoadingRecords': 'Cargando...',
									'oPaginate': {
										'sFirst':    'Primero',
										'sLast':     'Último',
										'sNext':     'Siguiente',
										'sPrevious': 'Atrás'
									},
									'oAria': {
										'sSortAscending':  ': Activar para ordenar la columna de manera ascendente',
										'sSortDescending': ': Activar para ordenar la columna de manera descendente'
									}   
        },
       
        'dom': 'Bfrtip'
                
         
      
        
						});
					</script>
				";
	 }else{
	 		$salida .= "No hay Datos";
	 }

	 echo $salida;

	 sqlsrv_close($conn);
	
?>