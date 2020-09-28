<?php
	require('conexion/conexion.php');
	
	$idSolicitud = $_REQUEST['p'];
	
	$sql= "
SELECT
	[sl].[idSolicitud_Vehiculo],
	([tu].[nombre1] + ' ' + [tu].[apellidop]) AS strUsuario,
	[es].[strEstado_Solicitud],
	[be].[dFecha_Modificacion],
	[be].[hHora_Modificacion] 
FROM
	[dbo].[tbSolicitud_Vehiculo] AS [sl]
	INNER JOIN [dbo].[tbBitacora_Estado_Solicitud] AS [be] ON [be].[idSolicitud] = [sl].[idSolicitud_Vehiculo] 
	INNER JOIN [syslogin].[dbo].[Tusuario] AS [tu] ON [tu].[id_usu] = [be].[idUsuario] 
	INNER JOIN [tbEstado_Solicitud] AS [es] ON [es].[idEstado_Solicitud] = [be].[idEstaod_Solicitud] 
WHERE 
	[sl].[idSolicitud_Vehiculo] = $idSolicitud";
	
	$row = array();
	
	$result = sqlsrv_query($conn, $sql);
	
	if($result)
	{
		$i = 0;
		while($row[$i] = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
		{
			$i++;
		}
	}
?>
<!-- 
	id = "Principio"
id = "SolicituEncontrada" -->
<body>
<div >
	<div  class="container">
		<h1>Busqueda de solicitud</h1>
		<h2>Solicitud Buscada: <? echo $idSolicitud; ?></h2>
		<div class="container">
			<table  class="table" cellpadding="9px">
				<? for($i = 0; $row[$i]; $i++ ){ ?>
				<tr class = "<? echo ($i%2) == 0 ? "col1" : "col2"; ?>">
					<td>
						<label>Estado de la solicitud: </label>
					</td>
					<td>
						<label><? echo $row[$i]['strEstado_Solicitud']?></label>
					</td>
				
					<td>
						<label>Usuario responsable: </label>
					</td>
					<td>
						<label><? echo $row[$i]['strUsuario']?></label>
					</td>
				</tr>
				<tr  class = "<? echo ($i%2) == 0 ? "col1" : "col2"; ?>">
					<td>
						<label>Fecha de la accion sobre la solicitud</label>
					</td>
					<td>
						<label><? echo $row[$i]['dFecha_Modificacion']->format("d-m-Y")?></label>
					</td>
					
					<td>
						<label>Hora de la accion sobre la solicitud</label>
					</td>
					<td>
						<label><? echo $row[$i]['hHora_Modificacion']->format("H:i:s")?></label>
					</td>
				</tr>
				<? } ?>
			</table>
		</div>
	</div>
</div>
	<style>
		#Principio{
			margin-top: 3%;
			display: inline-block;
			width: 100%;
		}
		
		#leTabla{
			border-collapse: collapse
		}
		
		.col1{
			background: hsl(220, 60%, 80%);
		}
		
		.col2{
			background: hsl(220, 70%, 60%);
		}
	</style>
</body>

