<?php
session_start();
error_reporting(0);
	require('../conexion/conexion.php');
	
	date_default_timezone_set("America/Guatemala");
	
    //Datos para la solicitud de vehiculos;
    $idSolicitante = $_POST['idSolicitante'];
    $idDependencia = $_POST['idDependencia'];
    $idDepartamento = $_POST['Departamento'];
    $idMunicipio = $_POST['Municipio'];
    $dFecha_Salida = $_POST['Fecha_Salida'];
    $hHora_Salida = $_POST['Hora_Salida'];
    $dFecha_Regreso = $_POST['Fecha_Regreso'];
    $hHora_Regreso = $_POST['Hora_Regreso'];
    $strDireccion = $_POST['Direccion'];
    $strMotivo = $_POST['Motivo'];
	$idTipo_Solicitud = $_POST['TipoSolicitud'];
	
	
	if($idDepartamento == 1)
	{
		$idTipo_Comision = 1;
	}
	else
	{

		$idTipo_Comision = 2;
	}
	
	$dFecha_Solicitud = date("Y-m-d");
	$hHora_Solicitud = date("H:i:s");


	$Hora_Sistema = new DateTime($hHora_Solicitud);
	$Fecha_Sistema = new DateTime($dFecha_Solicitud);



	if(empty($dFecha_Salida))
	{	
		$dFecha_Salida = null;
		$hHora_Salida = null;
	}
	else
	{
		$Fecha_Salida = new DateTime($dFecha_Salida);
		echo "NADA";
		$Hora_Salida = new DateTime($hHora_Salida);
		
	}
	
	if(empty($dFecha_Regreso)){
		
		$dFecha_Regreso = null;
		$hHora_Regreso = null;
	}
	else
	{
		$Fecha_Regreso = new DateTime($dFecha_Regreso);
		$Hora_Regreso = new DateTime($hHora_Regreso);
	}

	// inicio de la verificacion de la fecha
	if($dFecha_Regreso != null && $dFecha_Salida != null)
	{
		//if( ($Fecha_Regreso < $Fecha_Salida) || ($Fecha_Salida < $Fecha_Sistema) )
		if( ($Fecha_Regreso < $Fecha_Salida) )
		{
			echo "Fecha ingresada incorrecta";
		}
		else
		{
			//comienza la verificacion de la hora
			// if( (($Hora_Salida < $Hora_Sistema) && ($Fecha_Regreso == $Fecha_Sistema)) )
			// {
			// 	echo "Hora ingresada incorrecta";
			// }
			// else
			// {	
					// verificacion	
				// if( (($Hora_Regreso < $Hora_Sistema ) && ($Fecha_Sistema == $Fecha_Salida)) )
				// {
				// 	echo "Hora ingresada incorrectaa";
				// }
				// else
				// {
					//verificacion
					// if( (($Hora_Regreso < $Hora_Salida ) && ($Fecha_Regreso == $Fecha_Salida)) )
					// {
					// 	echo "Hora ingresada incorrectaa";
					// }
					// else
					// {
						


						$query = "EXECUTE SP_Ingreso_Solicitud $idSolicitante, $idDependencia, '$dFecha_Regreso', '$hHora_Regreso', '$dFecha_Salida', '$hHora_Salida', '$strMotivo', $idTipo_Solicitud, $idTipo_Comision";
						$result = sqlsrv_query ($conn, $query);
						sqlsrv_fetch($result);

						$query2 = "EXECUTE InsertarMotivos '$strMotivo'";
						$result2 = sqlsrv_query ($conn, $query2);
						sqlsrv_fetch($result2);
					
						$error = sqlsrv_errors();
						$identity =  sqlsrv_get_field($result, 0);
						
						$PQL = "EXECUTE PR_Ingres_Direccion $identity, " . $_POST['Departamento'].",". $_POST['Municipio'].", '".$_POST['Direccion']."'";
		
						sqlsrv_query($conn, $PQL);
						
						for($i = 1; $_POST['Departamento'.$i]; $i++){
						
							$sql = "EXECUTE PR_Ingres_Direccion $identity, " . $_POST['Departamento'.$i].",". $_POST['Municipio'.$i].", '".$_POST['Direccion'.$i]."'";
						
							sqlsrv_query ($conn, $sql);
						
						}
						
						if($result)
						{
							$ssql = "
							SELECT 
								([uu].[nombre1] + ' ' + [uu].[apellidop]) AS [Solicitante],
								[uu].[email] AS [emailSolicita],
								[sl].[idSolicitud_Vehiculo]
							FROM	
								[dbo].[tbSolicitud_Vehiculo] AS [sl] 
								INNER JOIN [syslogin].[dbo].[Tusuario] AS [uu] ON [uu].[id_usu] = [sl].[idSolicitante] 
							WHERE
								[sl].[idSolicitud_Vehiculo] = $identity
							";
					
							$rresult = sqlsrv_query($conn, $ssql);
				
							if($rresult)
							{
								$roww = sqlsrv_fetch_array($rresult, SQLSRV_FETCH_ASSOC);
								//---------------------Area para el verificador------------------------------------------//	
								$para = $roww['emailSolicita']; 
								$nombre = $roww['Solicitante'];
								$asunto = "Solicitud No. $identity";
								$mensaje = "Estimado ". $nombre .".
								
Gusto en saludarle.
								
Por este medio se le informa que la solicitud de comisión con No. $identity ha sido INGRESADA.
								
Cualquier duda al respecto favor comunicarse al área de transporte de DIACO.
								
Gracias por el apoyo.
								
Saludos. ";
								$de = "Sistema de Control de vehículos de DIACO";
							
							
								//            $headers = "MIME-version:1.0;\r\n";
								//            $headers .= "Content-type: text/html; \r\n charset=iso-8859-1; \r\n";
								//            $headers .= "From: $de \r\n";
								//            $headers .= "To: $para; \r\n subject:$asunto \r\n";
								
									
								$headers = 'From: ' .$de. "\r\n" .
								'Reply-To: jjolon@diaco.gob.gt' . "\r\n" .
								'X-Mailer: PHP/' . phpversion();
			
							   //if( mail($para, $titulo, $mensaje, $cabeceras))
							
							
								mail($para,$asunto,$mensaje,"De: Sistema de Control de vehículos de DIACO \ r \ nX-Mailer: PHP");
								//------------------------------------------------fin area correo-----------------------------------------//
								$_SESSION['idSolicitud'] = $identity;
								echo "true";
							}
						}	
						else
						{
							echo "Error al intentar enviar los datos: $error";
						}
			// 		}
			// 	}
			// }
		//fin
		}
	}
	//verificacion de fechas
	//else if(($Fecha_Sistema <= $Fecha_Regreso) && ($Fecha_Regreso != null))
	else if($Fecha_Regreso != null)
	{
		// if(($Hora_Regreso < $Hora_Sistema) && ($Fecha_Regreso == $Fecha_Sistema))
		// {
		// 	echo "Hora ingresada incorrecta";
		// }
		// else
		// {
			$query = "EXECUTE SP_Ingreso_Solicitud $idSolicitante, $idDependencia, '$dFecha_Regreso', '$hHora_Regreso',  NULL, NULL, '$strMotivo', $idTipo_Solicitud, $idTipo_Comision";
			$result = sqlsrv_query ($conn, $query);
			sqlsrv_fetch($result);

			$query2 = "EXECUTE InsertarMotivos '$strMotivo'";
						$result2 = sqlsrv_query ($conn, $query2);
						sqlsrv_fetch($result2);
		
			$error = sqlsrv_errors();
			$identity =  sqlsrv_get_field($result, 0);
			
			sqlsrv_query ($conn, "EXECUTE PR_Ingres_Direccion $identity, " . $_POST['Departamento'].",". $_POST['Municipio'].", '".$_POST['Direccion']."'");
				
			for($i = 1; $_POST['Departamento'.$i]; $i++){
				
				$sql = "EXECUTE PR_Ingres_Direccion $identity, " . $_POST['Departamento'.$i].",". $_POST['Municipio'.$i].", '".$_POST['Direccion'.$i]."'";
				
				sqlsrv_query ($conn, $sql);
				
			}
						
			sqlsrv_close($conn);
			if($result)
			{
				$ssql = "
				SELECT 
					([uu].[nombre1] + ' ' + [uu].[apellidop]) AS [Solicitante],
					[uu].[email] AS [emailSolicita],
					[sl].[idSolicitud_Vehiculo]
				FROM	
					[dbo].[tbSolicitud_Vehiculo] AS [sl] 
					INNER JOIN [syslogin].[dbo].[Tusuario] AS [uu] ON [uu].[id_usu] = [sl].[idSolicitante] 
				WHERE
					[sl].[idSolicitud_Vehiculo] = $identity
				";
			
				$rresult = sqlsrv_query($conn, $ssql);
			
				if($rresult)
				{
					$roww = sqlsrv_fetch_array($rresult, SQLSRV_FETCH_ASSOC);
					//---------------------Area para el verificador------------------------------------------//	
					$para = $roww['emailSolicita']; 
					$nombre = $roww['Solicitante'];
					$asunto = "Solicitud No. $identity";
					$mensaje = "Estimado ". $nombre .".
								
Gusto en saludarle.
								
Por este medio se le informa que la solicitud de comisión con No. $identity ha sido INGRESADA.
								
Cualquier duda al respecto favor comunicarse al área de transporte de DIACO.
								
Gracias por el apoyo.
								
Saludos. ";
					$de = "Sistema de Control de vehículos de DIACO";
						
						
					//            $headers = "MIME-version:1.0;\r\n";
					//            $headers .= "Content-type: text/html; \r\n charset=iso-8859-1; \r\n";
					//            $headers .= "From: $de \r\n";
					//            $headers .= "To: $para; \r\n subject:$asunto \r\n";
						
						
					$headers = 'From: ' .$de. "\r\n" .
					'Reply-To: jjolon@diaco.gob.gt' . "\r\n" .
					'X-Mailer: PHP/' . phpversion();
		
				   //if( mail($para, $titulo, $mensaje, $cabeceras))
						
						
					mail($para,$asunto,$mensaje,"De: Sistema de Control de vehículos de DIACO \ r \ nX-Mailer: PHP");
					//------------------------------------------------fin area correo-----------------------------------------//
					$_SESSION['idSolicitud'] = $identity;
					echo "true";
				}
			}
			else
			{
				echo "Error al intentar enviar los datos: $error";
			}
		// }
	}


	//else if( $Fecha_Sistema <= $Fecha_Salida && ($Fecha_Salida != null))
	else if( $Fecha_Salida != null)
	{
		// if(($Hora_Salida < $Hora_Sistema) && ($Fecha_Salida == $Fecha_Sistema))
		// {
		// 	echo "Hora ingresada incorrecta";
		// }
		// else
		// {
			$query = "EXECUTE SP_Ingreso_Solicitud $idSolicitante, $idDependencia,  NULL, NULL, '$dFecha_Salida', '$hHora_Salida', '$strMotivo', $idTipo_Solicitud, $idTipo_Comision";
			
			$result = sqlsrv_query ($conn, $query);
			sqlsrv_fetch($result);

			$query2 = "EXECUTE InsertarMotivos '$strMotivo'";
						$result2 = sqlsrv_query ($conn, $query2);
						sqlsrv_fetch($result2);
		
			$error = sqlsrv_errors();
			$identity =  sqlsrv_get_field($result, 0);
			
			sqlsrv_query ($conn, "EXECUTE PR_Ingres_Direccion $identity, " . $_POST['Departamento'].",". $_POST['Municipio'].", '".$_POST['Direccion']."'");
				
			for($i = 1; $_POST['Departamento'.$i]; $i++){
				
				$sql = "EXECUTE PR_Ingres_Direccion $identity, " . $_POST['Departamento'.$i].",". $_POST['Municipio'.$i].", '".$_POST['Direccion'.$i]."'";
				
				sqlsrv_query ($conn, $sql);
				
			}
			if($result)
			{
				$ssql = "
				SELECT 
					([uu].[nombre1] + ' ' + [uu].[apellidop]) AS [Solicitante],
					[uu].[email] AS [emailSolicita],
					[sl].[idSolicitud_Vehiculo]
				FROM	
					[dbo].[tbSolicitud_Vehiculo] AS [sl] 
					INNER JOIN [syslogin].[dbo].[Tusuario] AS [uu] ON [uu].[id_usu] = [sl].[idSolicitante] 
				WHERE
					[sl].[idSolicitud_Vehiculo] = $identity
				";
			
				$rresult = sqlsrv_query($conn, $ssql);
				
				if($rresult)
				{
					$roww = sqlsrv_fetch_array($rresult, SQLSRV_FETCH_ASSOC);
					//---------------------Area para el verificador------------------------------------------//	
					$para = $roww['emailSolicita']; 
					$nombre = $roww['Solicitante'];
					$asunto = "Solicitud No. $identity";
					$mensaje = "Estimado ". $nombre .".
								
Gusto en saludarle.
								
Por este medio se le informa que la solicitud de comisión con No. $identity ha sido INGRESADA.
								
Cualquier duda al respecto favor comunicarse al área de transporte de DIACO.
								
Gracias por el apoyo.
								
Saludos. ";
					$de = "Sistema de Control de vehículos de DIACO";
							
						
					//            $headers = "MIME-version:1.0;\r\n";
					//            $headers .= "Content-type: text/html; \r\n charset=iso-8859-1; \r\n";
					//            $headers .= "From: $de \r\n";
					//            $headers .= "To: $para; \r\n subject:$asunto \r\n";
						
						
					$headers = 'From: ' .$de. "\r\n" .
					'Reply-To: jjolon@diaco.gob.gt' . "\r\n" .
					'X-Mailer: PHP/' . phpversion();
		
				   //if( mail($para, $titulo, $mensaje, $cabeceras))
						
						
					mail($para,$asunto,$mensaje,"De: Sistema de Control de vehículos de DIACO \ r \ nX-Mailer: PHP");
					//------------------------------------------------fin area correo-----------------------------------------//
					$_SESSION['idSolicitud'] = $identity;
					echo "true";
				}
			}
			else
			{
				echo "Error al intentar enviar los datos: $error";
			}
		// }
	}
	else
	{
		echo "Error al ingresar las fechas";
	}
?>