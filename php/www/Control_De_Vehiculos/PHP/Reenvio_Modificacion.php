<?php
	
	require('../conexion/conexion.php');
	
	$idSolicitud = $_GET['idSolicitud'];
	$strObservacion = $_GET['Observacion'];
 	$FechaSalida = ($_GET['FechaSalida'] === "true" ? 1 : 0) ;
 	$HoraSalida = ($_GET['HoraSalida'] === "true" ? 1 : 0) ;
	$FechaRegreso = ($_GET['FechaRegreso'] === "true" ? 1 : 0) ;
	$HoraRegreso = ($_GET['HoraRegreso'] === "true" ? 1 : 0) ;
	$TipoSolicitud = ($_GET['TipoSolicitud'] === "true" ? 1 : 0) ;
 	$TipoComision = ($_GET['TipoComision'] === "true" ? 1 : 0) ;
	$Motivo = ($_GET['Motivo'] === "true" ? 1 : 0) ;
	
	
	
	$sql = "EXECUTE PR_Reevia_Modificacion $idSolicitud, 9, 1, '$strObservacion', $FechaSalida, $HoraSalida, $FechaRegreso, $HoraRegreso, $TipoSolicitud, $TipoComision, $Motivo";
	
	$result = sqlsrv_query($conn, $sql);
	
	if($result)
	{	
		/*/----------------------------------------Seccion de email--------------------------------------------------------------//
		$sql="select correo,nombre,apellido  from usuario where activo= 1 and id_usuario='$b'";
        $stmt = sqlsrv_query( $conn, $sql );
                
        while( $fila = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){ 
			$cor= $fila['correo']; 
			$nombr=     $fila['nombre']; 
			$ape=     $fila['apellido'];

		}

        $sql="select correo,nombre,apellido  from usuario where activo= 1 and id_usuario='$uen'";
        $stmt = sqlsrv_query( $conn, $sql );
                
		while( $fila = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){ 
			$correo= $fila['correo']; 
			$nombre=     $fila['nombre']; 
			$apellido=     $fila['apellido'];

		}

    	$para = "rbarahona@mineco.gob.gt"; 
    	$nombre = "Raul";
        $asunto = "Solicitud No. $idSolicitud";
        $mensaje = "Estimado Raul Hernandez
                
        	Gusto en saludarle,
        	Por este medio se le informa que la solicitud No. $idSolicitud se le a devuelto por el siguiente motivo: $strObservacion 
          
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
	//----------------------------------------Fin de Seccion de email--------------------------------------------------------------/*/
		echo "<script>alert('Solicitud enviada a Modificacion'); window.opener.location.replace('../Menu_Principal.php'); window.close()</script>";
	}
	else
	{
		echo "<script>alert('Error al Modificar'); window.close();</script>";
	}
?>