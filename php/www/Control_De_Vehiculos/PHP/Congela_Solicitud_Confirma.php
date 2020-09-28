<?php
	require('../conexion/conexion.php');
	
	$idSolicitud = $_POST['idSolicitud'];
	
	$sql = "EXECUTE [PR_Congela_Solicitud_Verificacion] $idSolicitud, 10, 6, 1";
	
	$result = sqlsrv_query($conn, $sql);
	
	if($result)
	{
	/*/--------------------------------------------------area correo---------------------------------//
		$para = "rbarahona@mineco.gob.gt"; 
    	$nombre = "Raul";
        $asunto = "Solicitud No. $idSolicitud";
        $mensaje = "Estimado Raul Hernandez
                
        	Gusto en saludarle,
        	Por este medio se le informa que la solicitud No. $idSolicitud a sido CONGELADA
          
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
		//-----------------------------------------fin area correo-------------------------------------/*/
		echo "Se a congelado la solicitud ya que el vehiculo no cuenta con todas sus herramientas";
	}
	else
	{
		echo "Error al intentar conectarse";
	}
?>