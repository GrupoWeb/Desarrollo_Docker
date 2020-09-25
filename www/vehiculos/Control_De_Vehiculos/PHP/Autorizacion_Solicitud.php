<?php
session_start();
error_reporting(0);
$idUsuario = $_SESSION['username'];
require('../conexion/conexion.php');



$idVehiculo = $_POST['idVehiculo'];
$idSolicitud = $_POST['idSolicitud'];
$Piloto = $_POST['SelecPiloto'];
$TipoPiloto = $_POST['idPiloto'];

?>
<script>
var piloto = "<?php echo($Piloto); ?>"
console.log(piloto);
		//alert(piloto);
		</script>
		<?
		if($TipoPiloto > 0){

			$query = "EXECUTE SP_Autoriza_Solicitud $idSolicitud, $idUsuario, 6, $idVehiculo; EXECUTE PR_Asignacion_Piloto $Piloto, $idVehiculo, $idUsuario, $idSolicitud";
		}
		else
		{
			$query = "EXECUTE SP_Autoriza_Solicitud $idSolicitud, $idUsuario, 7, $idVehiculo; EXECUTE PR_Asignacion_Piloto $Piloto, $idVehiculo, $idUsuario, $idSolicitud";
		}	

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
				$para = $roww['emailVerifica']; 
				$nombre = $roww['Verificador'];
				$asunto = "Solicitud No. $idSolicitud";
				$mensaje = "Estimado ". $nombre ."

				Gusto en saludarle.

				Por este medio se le informa que la solicitud de comisi�n con No. $idSolicitud ha sido AUTORIZADA.

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

		//---------------------Area para el solicitante------------------------------------------//	
				$para = $roww['emailSolicita']; 
				$nombre = $roww['Solicitante'];
				$asunto = "Solicitud No. $idSolicitud";
				$mensaje = "Estimado ". $nombre ."

				Gusto en saludarle.

				Por este medio se le informa que la solicitud de comisi�n con No. $idSolicitud ha sido AUTORIZADA.

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
				echo "<script> alert('Solicitud autorizada correctamente'); location.replace('../Menu_Principal.php');</script>";
			}
		}
		else
		{
			echo "<script> alert('Error al intentar autorizar la solicitud'); location.replace('../Menu_Principal.php');</script>";
		}
		?>