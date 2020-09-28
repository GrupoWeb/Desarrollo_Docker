<?php

	require('../conexion/conexion.php');
	
	date_default_timezone_set("America/Guatemala");
	
    //Datos para la solicitud de vehiculos;
    $idSolicitante = $_POST['Solicitante'];
    $idDependencia = $_POST['Dependencia'];
    $idDepartamento = $_POST['Departamento'];
    $idMunicipio = $_POST['Municipio'];
    $dFecha_Salida = $_POST['Fecha_Salida'];
    $hHora_Salida = $_POST['Hora_Salida'] . ":00";
    $dFecha_Regreso = $_POST['Fecha_Regreso'];
    $hHora_Regreso = $_POST['Hora_Regreso']. ":00";
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
	if($dFecha_Regreso != null && $dFecha_Salida != null)
	{
		if( ($Fecha_Regreso < $Fecha_Salida) || ($Fecha_Salida < $Fecha_Sistema) )
		{
			echo "<script> alert('Fecha ingresada incorrecta'); location.replace('../Menu_Principal.php');</script>";
		}
		else
		{
			if( (($Hora_Regreso < $Hora_Sistema) && ($Fecha_Regreso == $Fecha_Salida))  || (($Hora_Salida < $Hora_Sistema) && ($Fecha_Regreso == $Fecha_Salida)) )
			{
				echo "<script> alert('Hora ingresada incorrecta'); location.replace('../Menu_Principal.php');</script>";
			}
			else
			{		
				$query = "EXECUTE SP_Ingreso_Solicitud 1, 1, '$dFecha_Regreso', '$hHora_Regreso', '$dFecha_Salida', '$hHora_Salida', '$strMotivo', $idTipo_Solicitud, $idTipo_Comision";
				$result = sqlsrv_query ($conn, $query);
				sqlsrv_fetch($result);
			
				$error = sqlsrv_errors();
				$identity =  sqlsrv_get_field($result, 0);
				
				$PQL = "EXECUTE PR_Ingres_Direccion $identity, " . $_POST['Departamento'].",". $_POST['Municipio'].", '".$_POST['Direccion']."'";

				sqlsrv_query($conn, $PQL);
				
				for($i = 1; $_POST['Departamento'.$i]; $i++){
				
				$sql = "EXECUTE PR_Ingres_Direccion $identity, " . $_POST['Departamento'.$i].",". $_POST['Municipio'.$i].", '".$_POST['Direccion'.$i]."'";
				
				sqlsrv_query ($conn, $sql);
				
				}
				sqlsrv_close($conn);
				if($result)
				{
				/*/--------------------------------area correo--------------------------------------//
					$para = "rbarahona@mineco.gob.gt"; 
    	$nombre = "Raul";
        $asunto = "Solicitud No. $idSolicitud";
        $mensaje = "Estimado Raul Hernandez
                
        	Gusto en saludarle,
        	Por este medio se le informa que la solicitud No. $idSolicitud a sido INGRESADA
          
        	Cualquier duda al respecto favor comunicarse el parqueo del Ministerio de Economia.
                
            Gracias por el apoyo.
                
            Saludos.
                
            ";
       	$de = "Sistema de Vehiculos";
                
                
//            $headers = "MIME-version:1.0;\r\n";
//            $headers .= "Content-type: text/html; \r\n charset=iso-8859-1; \r\n";
//            $headers .= "From: $de \r\n";
//            $headers .= "To: $para; \r\n subject:$asunto \r\n";
                
                
        $headers = 'From: ' .$de. "\r\n" .
	    'Reply-To: admin@dayshare.local' . "\r\n" .
    	'X-Mailer: PHP/' . phpversion();

   //if( mail($para, $titulo, $mensaje, $cabeceras))
                
                
		mail($para,$asunto,$mensaje,"De: admin@dayshare.local \ r \ nX-Mailer: PHP");
		//------------------------------------------------fin area correo-----------------------------------------/*/
					echo "<script> alert('Datos ingresados correctamente.. Se confirmara la solicitud mediante correo electronico.. Numero de Solicitud: $identity'); location.replace('../Menu_Principal.php');</script>";
				}
				else
				{
					echo "<script> alert('Error al intentar enviar los datos: $error'); location.replace('../Menu_Principal.php');</script>";
				}
			}
		}
	}
	else if(($Fecha_Sistema <= $Fecha_Regreso) && ($Fecha_Regreso != null))
	{
		if(($Hora_Regreso < $Hora_Sistema) && ($Fecha_Regreso == $Fecha_Sistema))
		{
			echo "<script> alert('Hora ingresada incorrecta'); location.replace('../Menu_Principal.php');</script>";
		}
		else
		{
			$query = "EXECUTE SP_Ingreso_Solicitud 1, 1, '$dFecha_Regreso', '$hHora_Regreso',  NULL, NULL, '$strMotivo', $idTipo_Solicitud, $idTipo_Comision";
			$result = sqlsrv_query ($conn, $query);
			sqlsrv_fetch($result);
		
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
				
				/*/-----------------------------------------------area correo----------------------------------//
					$para = "rbarahona@mineco.gob.gt"; 
    	$nombre = "Raul";
        $asunto = "Solicitud No. $idSolicitud";
        $mensaje = "Estimado Raul Hernandez
                
        	Gusto en saludarle,
        	Por este medio se le informa que la solicitud No. $idSolicitud a sido INGRESADA
          
        	Cualquier duda al respecto favor comunicarse el parqueo del Ministerio de Economia.
                
            Gracias por el apoyo.
                
            Saludos.
                
            ";
       	$de = "Sistema de Vehiculos";
                
                
//            $headers = "MIME-version:1.0;\r\n";
//            $headers .= "Content-type: text/html; \r\n charset=iso-8859-1; \r\n";
//            $headers .= "From: $de \r\n";
//            $headers .= "To: $para; \r\n subject:$asunto \r\n";
                
                
        $headers = 'From: ' .$de. "\r\n" .
	    'Reply-To: admin@dayshare.local' . "\r\n" .
    	'X-Mailer: PHP/' . phpversion();

   //if( mail($para, $titulo, $mensaje, $cabeceras))
                
                
		mail($para,$asunto,$mensaje,"De: admin@dayshare.local \ r \ nX-Mailer: PHP");
		//-------------------------------------------------fin area correo--------------------------------/*/
					echo "<script> alert('Datos ingresados correctamente.. Se confirmara la solicitud mediante correo electronico.. Numero de Solicitud: $identity'); location.replace('../Menu_Principal.php');</script>";	
				}
				else
				{
					echo "<script> alert('Error al intentar enviar los datos: $error'); location.replace('../Menu_Principal.php');</script>";
				}
		}
	}
	else if( $Fecha_Sistema <= $Fecha_Salida && ($Fecha_Salida != null))
	{
		if(($Hora_Salida < $Hora_Sistema) && ($Fecha_Salida == $Fecha_Sistema))
		{
			echo "<script> alert('Hora ingresada incorrecta'); location.replace('../Menu_Principal.php');</script>";
		}
		else
		{
			$query = "EXECUTE SP_Ingreso_Solicitud 1, 1,  NULL, NULL, '$dFecha_Salida', '$hHora_Salida', '$strMotivo', $idTipo_Solicitud, $idTipo_Comision";
			
			$result = sqlsrv_query ($conn, $query);
			sqlsrv_fetch($result);
		
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
					$para = "rbarahona@mineco.gob.gt"; 
    	$nombre = "Raul";
        $asunto = "Solicitud No. $idSolicitud";
        $mensaje = "Estimado Raul Hernandez
                
        	Gusto en saludarle,
        	Por este medio se le informa que la solicitud No. $idSolicitud a sido INGRESADA
          
        	Cualquier duda al respecto favor comunicarse el parqueo del Ministerio de Economia.
                
            Gracias por el apoyo.
                
            Saludos.
                
            ";
       	$de = "Sistema de Vehiculos";
                
                
//            $headers = "MIME-version:1.0;\r\n";
//            $headers .= "Content-type: text/html; \r\n charset=iso-8859-1; \r\n";
//            $headers .= "From: $de \r\n";
//            $headers .= "To: $para; \r\n subject:$asunto \r\n";
                
                
        $headers = 'From: ' .$de. "\r\n" .
	    'Reply-To: admin@dayshare.local' . "\r\n" .
    	'X-Mailer: PHP/' . phpversion();

   //if( mail($para, $titulo, $mensaje, $cabeceras))
                
                
		mail($para,$asunto,$mensaje,"De: admin@dayshare.local \ r \ nX-Mailer: PHP");
					echo "<script> alert('Datos ingresados correctamente.. Se confirmara la solicitud mediante correo electronico.. Numero de Solicitud: $identity'); location.replace('../Menu_Principal.php');</script>";			
				}
				else
				{
					echo "<script> alert('Error al intentar enviar los datos: $error'); location.replace('../Menu_Principal.php');</script>";
				}
		}
	}
	else
	{
		echo "<script> alert('Error al ingresar las fechas');</script>";
	}
?>