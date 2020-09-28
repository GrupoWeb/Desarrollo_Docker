<?php
session_start();
require('conexion/conexion.php');


$idSolicitud = $_REQUEST['p'];
$idUsuario = $_SESSION['username'];

header('Content-Type: text/html; charset=ISO-8859-1');
$sql = "
SELECT
	[sl].[Observaciones],
	[sl].[idSolicitud_Vehiculo],
	[sl].[dFecha_Solicitud],
	[sl].[hHora_Solicitud],
	[sl].[dFecha_Regreso],
	[sl].[hHora_Regreso],
	[sl].[dFecha_Salida],
	[sl].[hHora_Salida],
	[sl].[strMotivo],
	[sl].[idTipo_Comision],
	[dp].[nombre_dependencia],
	[be].[dFecha_Modificacion],
	[be].[hHora_Modificacion],
	([ss].[nombre1]  + ' ' + [ss].[apellidop] ) AS strSolicitante,
	([ap].[nombre1]  + ' ' + [ap].[apellidop] ) AS strAprobador,
	([at].[nombre1]  + ' ' + [at].[apellidop] ) AS strAutorizador,
	([tp].[strPiloto]  + ' ' + [tp].[strApellidos] ) AS strPiloto,
	([mr].[strMarca_Vehiculo] + ' , ' + [ln].[strLinea_Vehiculo] + ' , ' + [md].[strModelo_Vehiculo]) AS strVehiculo,
	[v].[iPlaca],
	[KV].[KM_Salida],
	[KV].[KM_Regreso],
	[bs].[dFecha_Modificacion] AS [FechaInicioReal],
	[bs].[hHora_Modificacion] AS [HoraInicioReal],
	[bss].[dFecha_Modificacion] AS [FechaFinalReal],
	[bss].[hHora_Modificacion] AS [HoraFinalReal],
	idPiloto_Asignado

FROM
	[dbo].[tbSolicitud_Vehiculo] AS [sl] 
	INNER JOIN [syslogin].[dbo].[Tusuario] AS [ss] ON [ss].[id_usu] = [sl].[idSolicitante] 
	INNER JOIN [syslogin].[dbo].[dependencia] AS [dp] ON [dp].[id_dependencia] = [sl].[idDependencia] 
	INNER JOIN [dbo].[tbBitacora_Estado_Solicitud] AS [be] ON [be].[idSolicitud] = [sl].[idSolicitud_Vehiculo] AND [be].[idEstaod_Solicitud] = 5
	INNER JOIN [syslogin].[dbo].[Tusuario] AS [ap] ON [ap].[id_usu] = [sl].[idAprobador]  
	INNER JOIN [syslogin].[dbo].[Tusuario] AS [at] ON [at].[id_usu] = [sl].[idAutorizador] 
	INNER JOIN [tbKM_Vehiculo_Soloicitud] AS [KV] ON [KV].[idSolicitud] = [sl].[idSolicitud_Vehiculo] 
	INNER JOIN [tbVehiculo] AS [v] ON [v].[idVehiculo] = [KV].[idVehiculo]
	INNER JOIN [tbMarca_Vehiculo] AS [mr] ON [mr].[idMarca_Vehiculo] = [v].[idMarca_Vehiculo] 
	INNER JOIN [tbModelo_Vehiculo] AS [md] ON [md].[idModelo_Vehiculo] = [v].[idModelo_Vehiculo] 
	INNER JOIN [tbLinea_Vehiculo] AS [ln] ON [ln].[idLinea_Vehiculo] = [v].[idLinea_Vehiculo]
	INNER JOIN [tbAsignacionPiloto] AS [asp] ON [asp].[idSolicitud] = [sl].[idSolicitud_Vehiculo] 
	INNER JOIN [syslogin].[dbo].[Tusuario] AS [pl] ON [pl].[id_usu] = $idUsuario
	INNER JOIN [tbBitacora_Estado_Solicitud] AS [bs] ON [bs].[idSolicitud] = [sl].[idSolicitud_Vehiculo] AND [bs].[idEstaod_Solicitud] = 1
	INNER JOIN [tbBitacora_Estado_Solicitud] AS [bss] ON [bss].[idSolicitud] = [sl].[idSolicitud_Vehiculo] AND [bss].[idEstaod_Solicitud] = 5
	inner join tbPiloto as tp on tp.idPiloto = asp.idPilotoAsignado 
WHERE 
	[sl].[idSolicitud_Vehiculo] = $idSolicitud
	and asp.idSolicitud = sl.idSolicitud_Vehiculo;
";

$result = sqlsrv_query($conn, $sql);

$row = array();
$Direcciones = array();
$Herramientos = array();

if($result)
	
{
	$row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
	
	$ssql = "
	SELECT	
		[dp].[strDepartamento],
		[mn].[strMunicipio],
		[ds].[strDireccion] 
	FROM	  
		[dbo].[tbDirecciones_Solicitud] AS [ds]
		INNER JOIN [dbo].[tbDepartamento] AS [dp] ON [dp].[idDepartamento] = [ds].[idDepartamento]
		INNER JOIN [dbo].[tbMunicipio] AS [mn] ON [mn].[idMunicipio] = [ds].[idMunicipio]
	WHERE
		[ds].[idSolicitud_Vehiculo] = $idSolicitud
	";
	
	$rresult = sqlsrv_query($conn, $ssql);
	if($rresult)
	{

		$i = 0;
		while($Direcciones[$i] = sqlsrv_fetch_array($rresult, SQLSRV_FETCH_ASSOC))
		{
			$i++;
		}
		
		$sqql = "
		SELECT
			[ah].[idHerramiento],
			[h].[strHerramienta_Vehiculo] 
		FROM	
			[dbo].[tbKM_Vehiculo_Soloicitud] AS [KV] 
			INNER JOIN [dbo].[tbAsignacion_Herramientas] AS [ah] ON [ah].[idVehiculo] = [KV].[idVehiculo] 
			INNER JOIN [dbo].[tbHerramienta_Vehiculo] AS [h] ON [h].[idHerramienta_Vehiculo] = [ah].[idHerramiento] 
		WHERE
			[KV].[idSolicitud] = $idSolicitud
			AND [ah].[bActivo] = 1
		";
		
		$reesult = sqlsrv_query($conn, $sqql);
		
		if($reesult)
		{
			$i = 0;
			while($Herramientas[$i] = sqlsrv_fetch_array($reesult, SQLSRV_FETCH_ASSOC))
			{
				$i++;
			}
		}
	}

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;" charset="ISO-8859-1" />
<title>Imprecion de solicitud</title>
<style>
	#leTable{
		width: 100%;
		height: 100%;
		border: 1px solid;
		border-radius: 25px;
	
	}
	
	#leTable td{
		width: auto;

	}

	
	body{
		font-family: Arial, Helvetica, sans-serif;
		font-size: 12px;
	}

	.titulo{
		font-size: 16px;
		font-family: Helvetica;
		font-style: italic;
	}
	.texto{

	}
</style>
</head>

<body>
<table cellspacing="9px 0" id = "leTable" class="table">
	<tr>
		<td colspan="4" align="right">
		<label><?php date_default_timezone_set("America/Guatemala"); echo "Fecha de impresion: " . date("d-m-Y") . "<br>Hora de impresion: " . date("H:i:s"); ?></label>
		</td>
	</tr>
	<tr>
		<td colspan = "4" align="center" class="titulo">
			<label>SOLICITUD DE VEHICULO PARA COMISION</label>
			<br />
			<label>DIRECCION DE ATENCION Y ASISTENCIA AL CONSUMIDOR --DIACO--</label>
		</td>
	</tr>
	<tr>
		<td>
			<label>No. Comision: </label>
		</td>
		<td>
			<u><label><?php echo $row['idSolicitud_Vehiculo']; ?></label></u>
		</td>
	</tr>
	<tr>
		<td>
			<label>Fecha de la creacion de la Solicitud: </label>
		</td>
		<td>
			<u><label id = "FechaSolicitud"><?php echo $row['dFecha_Solicitud']->format("d-m-Y"); ?></label></u>
		</td>
		
		<td> 
			<label>Hora de la creacion de la solicitud: </label>
		</td>
		<td>
			<u><label id = "HoraSolicitud"><?php echo $row['hHora_Solicitud']->format("H:i"); ?></label></u>
		</td>
	</tr>
	<tr>
		<td>
			<label>Fecha de inicio de la solicitud: </label>
		</td>
		<td>
			<u><label id = "FechaInicio"><?php echo $row['dFecha_Salida'] != NULL ? $row['dFecha_Salida']->format("d-m-Y") : "Solicitud sin fecha de salida"; ?></label></u>
		</td>
		
		<td>
			<label>Hora de inicio de la solicitud: </label>
		</td>
		<td>
			<u><label id = "HoraInicio"><?php echo $row['hHora_Salida'] != NULL ? $row['hHora_Salida']->format("H:i") : "Solicitud sin hora de salida"; ?></label></u>
		</td>
	</tr>
		<tr>
		<td>
			<label>Fecha de finalizacion de la solicitud: </label>
		</td>
		<td>
			<u><label id = "FechaInicio"><?php echo $row['dFecha_Regreso'] != NULL ? $row['dFecha_Regreso']->format("d-m-Y") : "Solicitud sin fecha de salida"; ?></label></u>
		</td>
		
		<td>
			<label>Hora de finalizacion de la solicitud: </label>
		</td>
		<td>
			<u><label id = "HoraInicio"><?php echo $row['hHora_Regreso'] != NULL ? $row['hHora_Regreso']->format("H:i") : "Solicitud sin hora de salida"; ?></label></u>
		</td>
	</tr>
	<tr>
		<td>
			<label>Solicitante: </label>
		</td>
		<td>
			<u><label id = "Solicitante"><?php echo $row['strSolicitante']; ?></label></u>
		</td>
		
		<td>
			<label>Depencencia: </label>
		</td>
		<td>
			<u><label id = "Dependencia"><?php echo $row['nombre_dependencia']; ?></label></u>
		</td>
	</tr>
	<tr>
		<td>
			<label>Director o Jefe Dependencia: </label>
		</td>
		<td>
			<u><label id = "JefeDependencia"><?php echo $row['strAprobador']; ?></label></u>
		</td>
	</tr>
	<tr>
		<td>
			<label>Lugar de comision: </label>
		</td>	
	</tr>
	<?php for($i = 0; $Direcciones[$i]; $i++){ ?>
	<tr >
		<td >
			<label>Departamento:     </label>
		</td>
		<td>
			<u ><label >  <?php echo $Direcciones[$i]['strDepartamento'] ?></label></u><br>
		</td>
		<td >
			<label>Municipio:     </label>
		</td>
		<td>
			<u ><label><?php echo $Direcciones[$i]['strMunicipio']; ?></label></u>
		</td>
	</tr>
	<tr>
		<td>
			<label>Direccion:     </label>
			</td>
		<td>
			<u ><label> <?php echo $Direcciones[$i]['strDireccion']; ?></label></u>
		</td>
	
	<?php }?>
	
		<td>
			<label>Justificacion: </label>
		</td>
		<td colspan="3">
			<u><label id = "Justificacion"><?php echo $row['strMotivo']; ?></label></u>
		</td>
	</tr>
	<tr>
		<td ><label>Comision Menor o Local</label>
		</td>
		<td>
		<input type = "checkbox" id = "CMenor" <?php echo $row['idTipo_Comision'] == 1 ? "checked" : false; ?> readonly/>
		</td>
			
		<td ><label>Comision Mayor</label>
		</td>
		<td>
		<input type = "checkbox" id = "CMayor"  <?php echo $row['idTipo_Comision'] == 2 ? "checked" : false; ?> readonly/>
		</td>
	</tr>
	<tr>
		<td>
			<label>Piloto seleccionado para la comision: </label>
		</td>
		<td>
			<u><label><?php echo $row['strPiloto']; ?></label></u>
		</td>
	</tr>
	<tr>
		<td>
			<label>Vehiculo seleccionado para la comision: </label>
		</td>
		<td>
			<u><label id = "VehiculoSeleccionado"><?php echo $row['strVehiculo'];  ?></label></u>
		</td>
		
		<td>
			<label>Placa del vehiculo: </label>
		</td>
		<td>
			<u><label id = "PlacaVehiculo"><?php echo $row['iPlaca']; ?></label></u>
		</td>
	</tr>
	<tr>
		<td>
			<label>Kilometraje de salida: </label>
		</td>
		<td>
			<u><label id = "KMSalida"><?php echo $row['KM_Salida']; ?> KM.</label></u>
		</td>
		
		<td>
			<label>Kilometraje de regreso: </label>
		</td>
		<td>
			<u><label><?php echo $row['KM_Regreso']; ?> KM.</label></u>
		</td>
	</tr>
	<tr>
		<td>
			<label>Kilometraje Total: </label>
		</td>
		<td>
			<u><label><?php echo $row['KM_Regreso'] - $row['KM_Salida']; ?> KM.</label></u>
		</td>
	</tr>
	<?php 
	$Herramientasss = array("LLANTA DE REPUESTO","TARJETA DE CIRCULACION","TRICKET Y BARILLA","EXTINGUIDOR","LLAVE DE CHUCHOS","TRIANGULOS DE EMERGENCIA");
	for($i = 0; $Herramientasss[$i]; $i++){ ?>
	<tr>
		<td>
			<label><?php echo $Herramientasss[$i]; ?></label>
		</td>
		<td>
			<input type = "checkbox" <?php echo $Herramientas[$i]['idHerramiento'] ? "checked" : false; $i++ ?>  readonly/>
		</td>
		<td>
			<label><?php echo $Herramientasss[$i]; ?></label>
		</td>
		<td>
			<input type = "checkbox" <?php echo $Herramientas[$i]['idHerramiento'] ? "checked" : false; ?>  readonly/>
		</td>
	</tr>
	<?php } ?>
	<tr>
		<td>
			<label>Fecha exacta de la salida de la Solicitud: </label>
		</td>
		<td>
			<u><label id = "FechaSolicitud"><?php echo $row['FechaInicioReal']->format("d-m-Y"); ?></label></u>
		</td>
		
		<td> 
			<label>Hora exacta de la salida de la solicitud: </label>
		</td>
		<td>
			<u><label id = "HoraSolicitud"><?php echo $row['HoraInicioReal']->format("H:i"); ?></label></u>
		</td>
	</tr>
	<tr>
		<td>
			<label>Fecha exacta de la finalizacion de la Solicitud: </label>
		</td>
		<td>
			<u><label id = "FechaSolicitud"><?php echo $row['FechaFinalReal']->format("d-m-Y"); ?></label></u>
		</td>
		
		<td> 
			<label>Hora exacta de la finalizacion de la solicitud: </label>
		</td>
		<td>
			<u><label id = "HoraSolicitud"><?php echo $row['HoraFinalReal']->format("H:i"); ?></label></u>
		</td>

	</tr>
	<tr>
	<td> 
			<label>Observaciones Generales: </label>
		</td>
		<td>
			<u><textarea class="form.control" id = "observaciones" readonly><?php echo $row['Observaciones']; ?></textarea></u>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>
			<label>Autorizador de la solicitud: </label>
		</td>
		<td>
			<u><label><?php echo $row['strAutorizador']; ?></label></u>
		</td>
		<td>
			<label>Firma:______________________________</label>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	<tr>
	<tr>
		<td>
			<label>Piloto de la solicitud: </label>
		</td>
		<td>
			<u><label><?php echo $row['strPiloto']; ?></label></u>
		</td>
		<td>
			<label>Firma:______________________________</label>
		</td>
	</tr>
</table>

<!-- <a href="impresion.php?t=pdf" target="_blank">PDF</a> -->

</body>
</html>
