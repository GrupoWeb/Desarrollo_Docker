<?php
	require('../conexion/conexion.php');
	
	$idSolicitud = $_POST['idSolicitud'];
	
	$Contenido = array();
	
	$sql = "
	SELECT
		[sl].[dFecha_Solicitud],
		[sl].[hHora_Solicitud],
		[bes].[dFecha_Modificacion],
		[bes].[hHora_Modificacion],
		[ap].[strAprobador],
		[at].[strAutorizador],
		[vr].[strVerificador],
		[es].[strEstado_Solicitud],
		[vh].[iPlaca],
		[mr].[strMarca_Vehiculo],
		[md].[strModelo_Vehiculo],
		[ln].[strLinea_Vehiculo],
		[pl].[strPiloto]    
	FROM
		[dbo].[tbSolicitud_Vehiculo] AS [sl]
		LEFT JOIN [dbo].[tbAprobador] AS [ap] ON [ap].[idAprobador] = [sl].[idAprobador]
		LEFT JOIN [dbo].[tbAutorizador] AS [at] ON [at].[idAutorizador] = [sl].[idAutorizador] 
		LEFT JOIN [dbo].[tbVerificardor] AS [vr] ON [vr].[idVerificador] = [sl].[idVerificador] 
		LEFT JOIN [dbo].[tbKM_Vehiculo_Soloicitud] AS [kvs] ON [kvs].[idSolicitud] = [sl].[idSolicitud_Vehiculo] 
		LEFT JOIN [dbo].[tbVehiculo] AS [vh] ON [vh].[idVehiculo] = [kvs].[idVehiculo] 
		LEFT JOIN [dbo].[tbMarca_Vehiculo] AS [mr] ON [mr].[idMarca_Vehiculo] = [vh].[idVehiculo]
		LEFT JOIN [dbo].[tbModelo_Vehiculo] AS [md] ON [md].[idModelo_Vehiculo] = [vh].[idModelo_Vehiculo] 
		LEFT JOIN [dbo].[tbLinea_Vehiculo] AS [ln] ON [ln].[idLinea_Vehiculo] = [vh].[idLinea_Vehiculo] 
		LEFT JOIN [dbo].[tbPiloto] AS [pl] ON [pl].[idPiloto] = [vh].[idPiloto_Asignado] 
		LEFT JOIN [dbo].[tbBitacora_Estado_Solicitud] AS [bes] ON [bes].[idSolicitud] = [sl].[idSolicitud_Vehiculo]  
		LEFT JOIN [dbo].[tbEstado_Solicitud] AS [es] ON [es].idEstado_Solicitud = [bes].[idEstaod_Solicitud]  
	WHERE 
		[sl].[idSolicitud_Vehiculo] = $idSolicitud
	ORDER BY
		[bes].[idBitacora_Estado_Solicitud] DESC
	";
	
	$result = sqlsrv_query($conn, $sql);
	
	if($result)
	{
		$row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
		
		while($Aux = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC) )
		{
			if( $Aux['strEstado_Solicitud'] ===  'EN AUTORIZACION')
			{
				$Contenido['FechaAprobacion'] = $Aux['dFecha_Modificacion'];
				$Contenido['HoraAprobacion'] = $Aux['hHora_Modificacion'];
			}
			if($Aux['strEstado_Solicitud'] ===  'EN COMPROBACION' )
			{
				$Contenido['FechaAutorizacion'] = $Aux['dFecha_Modificacion'];
				$Contenido['HoraAutorizacion'] = $Aux['hHora_Modificacion'];
			}
			if( $Aux['strEstado_Solicitud'] ===  'EN VERIFICACION' )
			{
				$Contenido['FechaComprobacion'] = $Aux['dFecha_Modificacion'];
				$Contenido['HoraComprobacion'] = $Aux['hHora_Modificacion'];
			}
			if($Aux['strEstado_Solicitud'] ===  'FINALIZADA' )
			{
				$Contenido['FechaVerificacion'] = $Aux['dFecha_Modificacion'];
				$Contenido['HoraVerificacion'] = $Aux['hHora_Modificacion'];
			}
		}
		
		if( empty($row['dFecha_Solicitud']) )
		{
			echo "<h2 style = 'margin-left: 30%;'>Solicitud no existente</h2>";
		}
		else
		{
			echo "
			<table class = 'tablaa'>
				<tr class = 'columnaa'>
					<td>Estado de la solicitud: </td><td>". $row['strEstado_Solicitud']."</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
				</tr>
				<tr class = 'columnaa'>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
				</tr>
				<tr class = 'columnab'>
					<td>Fecha de inicion de la solicitud: </td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>". $row['dFecha_Solicitud']->format("d-m-Y")."</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>Hora de inicio de la solicitud: </td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>". $row['hHora_Solicitud']->format("H:i:s")."
				</tr>
				<tr class = 'columnab'>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
				</tr>
				<tr class = 'columnaa'>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
				</tr>";
			if( !empty($row['strVerificador']) )
			{
			echo "	
				<tr class = 'columnaa'>
					<td>Fecha de finalizacion de la solicitud: </td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>". $row['dFecha_Modificacion']->format("d-m-Y")."</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>Hora de finalizacion de la solicitud: </td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>". $row['hHora_Modificacion']->format("H:i:s")."
				</tr>
				<tr class = 'columnaa'>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
				</tr>";
			}
			if( !empty($Contenido['HoraAprobacion']) )
			{
				echo "	
				<tr class = 'columnab'>
					<td>Aprobador: </td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>". $row['strAprobador']."</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
				</tr>
				<tr class = 'columnab'>	
					<td>Fecha de aprobacion de la solicitud:</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>". $Contenido['FechaAprobacion']->format("d-m-Y")."
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>Hora de aprobacion de la solicitud:</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>". $Contenido['HoraAprobacion']->format("H:i:s")."
				</tr>
				<tr class = 'columnab'>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
				</tr>";
			}
			if( !empty($Contenido['HoraAutorizacion']) )
			{
				echo "	
				<tr class = 'columnaa'>
					<td>Autorizador: </td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>". $row['strAutorizador']."</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
				</tr>
				<tr class = 'columnaa'>	
					<td>Fecha de autorizacion de la solicitud:</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>". $Contenido['FechaAutorizacion']->format("d-m-Y")."
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>Hora de autorizacion de la solicitud:</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>". $Contenido['HoraAutorizacion']->format("H:i:s")."
				</tr>
				<tr class = 'columnaa'>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
				</tr>";
			}
			if( !empty($Contenido['FechaComprobacion']) )
			{
				echo "	
				<tr class = 'columnab'>
					<td>Comprobador: </td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>". $row['strPiloto']."</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
				</tr>
				<tr class = 'columnab'>	
					<td>Fecha de comprobacion de la solicitud:</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>". $Contenido['FechaComprobacion']->format("d-m-Y")."
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>Hora de comprobacion de la solicitud:</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>". $Contenido['HoraComprobacion']->format("H:i:s")."
				</tr>
				<tr class = 'columnab'>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
				</tr>";
			}
			if( !empty($row['strVerificador']) )
			{
				echo "	
				<tr class = 'columnaa'>
					<td>Verificador: </td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>". $row['strVerificador']."</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
				</tr>
				<tr class = 'columnaa'>	
					<td>Fecha de verificacion de la solicitud:</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>". $row['dFecha_Modificacion']->format("d-m-Y")."</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>Hora de verificacion de la solicitud: </td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>". $row['hHora_Modificacion']->format("H:i:s")."
				</tr>
				<tr class = 'columnaa'>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
				</tr>";
			}
			if( $row['strEstado_Solicitud'] === "EN AUTORIZACION" )
			{
				echo "	
				<tr class = 'columnaa'>
					<td>Aprobador: </td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>". $row['strAprobador']."</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
				</tr>
				<tr class = 'columnaa'>
					<td>Fecha de aprobacion de la solicitud: </td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>". $row['dFecha_Modificacion']->format("d-m-Y")."</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>Hora de aprobacion de la solicitud: </td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>". $row['hHora_Modificacion']->format("H:i:s")."
				</tr>
				<tr class = 'columnaa'>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
				</tr>";	
			}
			if( $row['strEstado_Solicitud'] === "EN COMPROBACION" )
			{
				echo "
				<tr class = 'columnaa'>
					<td>Autorizador: </td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>". $row['strAutorizador']."</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
				</tr>	
				<tr class = 'columnaa'>
					<td>Fecha de autorizacion de la solicitud: </td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>". $row['dFecha_Modificacion']->format("d-m-Y")."</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>Hora de autorizacion de la solicitud: </td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>". $row['hHora_Modificacion']->format("H:i:s")."
				</tr>
				<tr class = 'columnaa'>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
				</tr>";	
			}
			if(!empty($row['strAutorizador']))
			{
				echo "	
				<tr class = 'columnab'>
					<td>Vehiculo Seleccionado: </td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>". $row['iPlaca']."</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>Piloto seleccionado: </td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>". $row['strPiloto']."
				</tr>
				<tr class = 'columnab'>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
				</tr>";	
			}
			if( $row['strEstado_Solicitud'] === "EN VERIFICACION" )
			{
				echo "	
				<tr class = 'columnaa'>
					<td>Comprobador: </td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>". $row['strPiloto']."</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
				</tr>	
				<tr class = 'columnaa'>
					<td>Fecha de comprobacion de la solicitud: </td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>". $row['dFecha_Modificacion']->format("d-m-Y")."</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>Hora de comprobacion de la solicitud: </td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>". $row['hHora_Modificacion']->format("H:i:s")."
				</tr>
				<tr class = 'columnaa'>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
				</tr>";	
			}
			if( $row['strEstado_Solicitud'] === "CONGELADA SALIDA" )
			{
				echo "	
				<tr class = 'columnaa'>
					<td>Fecha de congelacion de la solicitud: </td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>". $row['dFecha_Modificacion']->format("d-m-Y")."</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>Hora de congelacion de la solicitud: </td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>". $row['hHora_Modificacion']->format("H:i:s")."
				</tr>
				<tr class = 'columnaa'>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td>&nbsp;&nbsp;&nbsp;</td>
				</tr>";	
			}
			
			echo "
			</table>
			";
		}
	}
	else
	{
		echo "<h2 style = 'margin-left: 30%;'>Solicitud no encontrada</h2>";
	}
?>