<?php
session_start();
$idUsuario = $_SESSION['username'];
	require('../conexion/conexion.php');
	
	$idSolicitud = $_POST['idSolicitud'];
	
	
	$query = "EXECUTE PR_Confirma_Solicitud $idSolicitud, 1, $idUsuario ";
	
	$result = sqlsrv_query($conn, $query);
	
	if($result)
	{
		$ssql = "
			SELECT 
				([tu].[nombre1] + ' ' + [tu].[apellidop]) AS [Verificador],
				[tu].[email] AS [emailVerifica],
				([uu].[nombre1] + ' ' + [uu].[apellidop]) AS [Solicitante],
				[uu].[email] AS [emailSolicita],
				[sl].[idSolicitud_Vehiculo]
			FROM	
				[dbo].[tbSolicitud_Vehiculo] AS [sl] 
				INNER JOIN [syslogin].[dbo].[Tusuario] AS [tu] ON [tu].[id_usu] = [sl].[idConfirmador]
				INNER JOIN [syslogin].[dbo].[Tusuario] AS [uu] ON [uu].[id_usu] = [sl].[idSolicitante] 
			WHERE
				[sl].[idSolicitud_Vehiculo] = $idSolicitud
			";
			$rresult = sqlsrv_query($conn, $ssql);
			
			if($rresult)
			{
				$roww = sqlsrv_fetch_array($rresult, SQLSRV_FETCH_ASSOC);
		//------------------------------area de  correo------------------------------------//
		/*$para = $roww['emailVerifica']; 
		$nombre = $roww['Verificador'];
		$asunto = "Solicitud No. $idSolicitud";
		$mensaje = "Estimado ". $nombre ."
		
Gusto en saludarle.
								
Por este medio se le informa que la solicitud de comision con No. $identity a sido CONFIRMDADA.
								
Cualquier duda al respecto favor comunicarse el parqueo del Ministerio de Economia.
								
Gracias por el apoyo.
								
Saludos. ";
					$de = "Sistema de Control de veh�culos del Ministerio de Econom�a";
                
                
//            $headers = "MIME-version:1.0;\r\n";
//            $headers .= "Content-type: text/html; \r\n charset=iso-8859-1; \r\n";
//            $headers .= "From: $de \r\n";
//            $headers .= "To: $para; \r\n subject:$asunto \r\n";
                
                
        $headers = 'From: ' .$de. "\r\n" .
	    'Reply-To: admin@dayshare.local' . "\r\n" .
    	'X-Mailer: PHP/' . phpversion();

   //if( mail($para, $titulo, $mensaje, $cabeceras))
                
                
		mail($para,$asunto,$mensaje,"De: admin@dayshare.local \ r \ nX-Mailer: PHP");
		*/
		//---------------------Area para el solicitante------------------------------------------//	
				$para = $roww['emailSolicita']; 
				$nombre = $roww['Solicitante'];
				$asunto = "Solicitud No. $idSolicitud";
				$mensaje = "Estimado ". $nombre ."
						
Gusto en saludarle.
								
Por este medio se le informa que la solicitud de comisi�n con No. $idSolicitud ha sido VERIFICADA.
								
Cualquier duda al respecto favor comunicarse al �rea de transporte de DIACO.
								
Gracias por el apoyo.
								
Saludos. ";
					$de = "Sistema de Control de veh�culos de DIACO";
						
						
		//            $headers = "MIME-version:1.0;\r\n";
		//            $headers .= "Content-type: text/html; \r\n charset=iso-8859-1; \r\n";
		//            $headers .= "From: $de \r\n";
		//            $headers .= "To: $para; \r\n subject:$asunto \r\n";
						
						
				$headers = 'From: ' .$de. "\r\n" .
				'Reply-To: jjolon@diaco.gob.gt' . "\r\n" .
				'X-Mailer: PHP/' . phpversion();
		
		   //if( mail($para, $titulo, $mensaje, $cabeceras))
						
						
				//mail($para,$asunto,$mensaje,"De: Sistema de Control de veh�culos de DIACO \ r \ nX-Mailer: PHP");
		//-----------------------------fin area Correo---------------------------//
		echo "Solicitud confimada correctamente";
		}
	}
	else
	{
		echo "Error al confirmar la solicitud";
	}
?>