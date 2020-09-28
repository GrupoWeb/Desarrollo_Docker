<?php
session_start();
$idUsuario = $_SESSION['username'];
	require('../conexion/conexion.php');
	
	
	$idSolicitud = $_POST['idSolicitud'];
	$strNombrePilotoAX = $_POST['NombrePiloto'];
	$numLicencia = $_POST['noLicencia'];
	$fechaVencimiento = $_POST['fechaVencimiento'];
	$Conductor = $_POST['Responsable'];
			
	$nombreArchivo = $HTTP_POST_FILES['Licencia']['name']; //este es el nombre del archivo que acabas de subir
	$tipoArchivo = $HTTP_POST_FILES['Licencia']['type']; //este es el tipo de archivo que acabas de subir
	$tamanioArchivo = $HTTP_POST_FILES['Licencia']['size']; //este es el tamaño en bytes que tiene el archivo que acabas de subir.

	if($tamanioArchivo <= 1000000)
	{
					
			if($Conductor == 0)
			{
				$strNombrePilotoAX = "JULIO MENDEZ";
			}
			
			$direccionArchivo = $_SERVER['DOCUMENT_ROOT']. '/Control_De_Vehiculos/imgTemp/';
			
			$DirArchivo = $direccionArchivo . $nombreArchivo;
			
			move_uploaded_file($_FILES['Licencia']['tmp_name'],$direccionArchivo. $nombreArchivo);
			
			$sql = "EXECUTE PR_Reenvia_Solicitud '$strNombrePilotoAX', '$DirArchivo', '$numLicencia', '$fechaVencimiento', $idUsuario, $idSolicitud; EXECUTE PR_Confirma_Reenvio $idSolicitud, 1, $idUsuario";
			
			$result = sqlsrv_query($conn, $sql);
			
			if($result)
			{
				echo ("<script>alert('Solicitud reenviada correctamente'); location.replace('../Menu_Principal.php');</script>");
			}
			else
			{
				echo ("<script>alert('Error al intentar reenviar la solicitud'); location.replace('../Menu_Principal.php');</script>");
			}
		
	}
	else
	{
		echo "Tamaño del archivo demasiado grande";
	}
?>