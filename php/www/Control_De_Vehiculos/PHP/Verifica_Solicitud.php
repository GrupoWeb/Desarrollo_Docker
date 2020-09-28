<?php
session_start();
$idUsuario = $_SESSION['username'];
	require('../conexion/conexion.php');
	
	$idSolicitud = $_POST['idSolicitud'];
	$kmRegreso = $_POST['KMRegreso'];
	$Observacion = $_POST['ObRegreso'];
	$IdPiloto = $_POST['idpiloto'];

	//upload file

	// if ($_FILES['upfile']['size'] > 1000000) {
    //     throw new RuntimeException('L�mite de tama�o de archivo excedido.');
    // }else{
    // 	$carpeta = "../upload/files/";
	// 	opendir($carpeta);
	// 	if (!($carpeta == '../upload/files/')) {
	// 		$destino = $carpeta.$_FILES['file_source']['name'];
			
	// 		copy($_FILES['file_source']['tmp_name'],$destino);
	// 	}
		
    // }




	// finaly



	$query = "EXECUTE PR_Verifica_Solicitud $idSolicitud, 5, $idUsuario, $kmRegreso, '$Observacion',$IdPiloto";
	
	$result = sqlsrv_query($conn, $query);
	
	if($result)
	{
		$ssql = "
		SELECT
			[idVale]
		FROM 
			[tbAsignacion_Vales] 
		WHERE
			[idVehiculo] = (SELECT [idVehiculo] FROM [dbo].[tbKM_Vehiculo_Soloicitud] WHERE idSolicitud = $idSolicitud AND bActivo = 1 )
			AND [bActivo] = 1";
		
		$params = array();
		$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
		
		$rresult = sqlsrv_query($conn, $ssql, $params, $options);
		
		$row_count = sqlsrv_num_rows( $rresult );		
		
		$reesult = true;
		if($row_count > 0)
		{
			$KMSigAsignacion = $kmRegreso + 255;
			$sqql = "EXECUTE [PR_Libera_Asignacion_Vale] $kmRegreso, $idSolicitud, $KMSigAsignacion";
			
			$reesult = sqlsrv_query($conn, $sqql);
		}
			
			if($reesult)
			{
			//------------------------------------------area correo--------------------------------//
			$ssql = "
			SELECT 
				([tu].[nombre1] + ' ' + [tu].[apellidop]) AS [Verificador],
				[tu].[email] AS [emailVerifica],
				([uu].[nombre1] + ' ' + [uu].[apellidop]) AS [Solicitante],
				[uu].[email] AS [emailSolicita],
				[sl].[idSolicitud_Vehiculo]
			FROM	
				[dbo].[tbSolicitud_Vehiculo] AS [sl] 
				INNER JOIN [syslogin].[dbo].[Tusuario] AS [tu] ON [tu].[id_usu] = [sl].[idVerificador]
				INNER JOIN [syslogin].[dbo].[Tusuario] AS [uu] ON [uu].[id_usu] = [sl].[idSolicitante] 
			WHERE
				[sl].[idSolicitud_Vehiculo] = $idSolicitud
			";
			
			$rresult = sqlsrv_query($conn, $ssql);
			
			if($rresult)
			{
				$roww = sqlsrv_fetch_array($rresult, SQLSRV_FETCH_ASSOC);
			//---------------------Area para el verificador------------------------------------------//	
				$para = $roww['emailVerifica']; 
				$nombre = $roww['Verificador'];
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
						
						
				$headers = 'From:' .$de. "\r\n" .
				'Reply-To: jjolon@diaco.gob.gt' . "\r\n" .
				'X-Mailer: PHP/' . phpversion();
		
		   //if( mail($para, $titulo, $mensaje, $cabeceras))
						
						
				//mail($para,$asunto,$mensaje,"De: Sistema de Control de veh�culos de DIACO \ r \ nX-Mailer: PHP");
			//-----------------------Fin area para verificador
			
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
			
		//-------------------------------fin area correo-----------------------------------------//
				echo "true";
				}
			}
			else
			{
				echo "Error al intentar enviar el correo al solicitante";
			}
		
	}
	else
	{
		echo "Error al intetar ingresar los datos";
	}
?>