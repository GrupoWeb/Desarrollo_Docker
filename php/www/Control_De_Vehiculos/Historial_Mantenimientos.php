<?php
	
	require('conexion/conexion.php');
	
	$idVehiculo = $_REQUEST['p'];
	
	$sql = "
SELECT 
	[v].[idVehiculo],
	[sv].[idServicio],
	[v].[iPlaca],
	[mr].[strMarca_Vehiculo],
	[ln].[strLinea_Vehiculo],
	[md].[strModelo_Vehiculo],
	[sv].[dFecha_Inicio_Servicio],
	[sv].[hHora_Inicio_Servicio],
	[sv].[dFecha_Termino_Servicio],
	[sv].[hHora_Termino_Servicio],
	[KMsv].[ftKMSalida],
	[KMsv].[ftKM_Regreso],
	[ts].[strTipo_Servicio],
	[sv].[strMotivo],
	([ue].[nombre1] + ' ' + [ue].[apellidop] ) AS strUsuarioEnvia,
	([ur].[nombre1] + ' ' + [ur].[apellidop] ) AS strUsuarioResive,
	[ls].[strLugar_Servicio] 
	 
FROM
	[dbo].[tbVehiculo] AS [v]
	INNER JOIN [dbo].[tbMarca_Vehiculo] AS [mr] ON [mr].[idMarca_Vehiculo] = [v].[idMarca_Vehiculo]
	INNER JOIN [dbo].[tbModelo_Vehiculo] AS [md] ON [md].[idModelo_Vehiculo] = [v].[idModelo_Vehiculo] 
	INNER JOIN [dbo].[tbLinea_Vehiculo] AS [ln] ON [ln].[idLinea_Vehiculo] = [v].[idLinea_Vehiculo] 
	INNER JOIN [dbo].[tbKM_Vehiculo_Servicio] AS [KMsv] ON [KMsv].[idVehiculo] = [v].[idVehiculo] 
	INNER JOIN [dbo].[tbServicio_Vehiculo] AS [sv] ON [sv].[idServicio] = [KMsv].[idServicio] 
	INNER JOIN [dbo].[tbTipo_Servicio] AS [ts] ON [ts].[idTipo_Servicio] = [sv].[idTipo_Serivicio] 
	INNER JOIN [syslogin].[dbo].[Tusuario] AS [ue] ON [ue].[id_usu] = [sv].[idUsuarioEnvia]
	LEFT JOIN [syslogin].[dbo].[Tusuario] AS [ur] ON [ur].[id_usu] = [sv].[idUsuarioResive]
	INNER JOIN [dbo].[tbLugar_Servicio] AS [ls] ON [ls].[idLugar_Servicio] = [sv].[idLugar_Servicio] 
WHERE 
	[v].[idVehiculo] = $idVehiculo";
	
	$result = sqlsrv_query($conn, $sql);
	
	if($result)
	{
		$i = 0;
		while($row[$i] = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
		{
			$i++;
		}
	}
	
?><body>
<table id = "LeTable" cellpadding="9px 0">
	<tr>
		<td colspan="8" align="center">
			<label><h2>Historial de servicios de mantenimiento</h2></label>
		</td>
	</tr>
	<tr class = "cab">
		<td>
			<label>Placa del vehiculo: </label>
		</td>
		<td>
			<label><?php echo $row[0]['iPlaca']; ?></label>
		</td>
		
		<td>
			<label>Marca del vehiculo: </label>
		</td>
		<td>
			<label><?php echo $row[0]['strMarca_Vehiculo']; ?></label>
		</td>
		
		<td>
			<label>Linea del vehiculo: </label>
		</td>
		<td>
			<label><?php echo $row[0]['strLinea_Vehiculo']; ?></label>
		</td>
		
		<td>
				<label>Modelo del vehiculo: </label>
		</td>
		<td>
			<label><?php echo $row[0]['strModelo_Vehiculo']; ?></label>
		</td>
	</tr>
	<?php for($i = 0; $row[$i]['idServicio']; $i++){ 
	
		if( ($i%2) == 0)
		{
			$Columna = "Clomuna1";
		}
		else
		{
			$Columna = "Clomuna2";
		}
	?>
	<tr class = "<?php echo $Columna; ?>">
		<td colspan="8" align="center">
			<label><strong>#<?php echo $i+1 ?></strong></label>
		</td>
	<tr>
	<tr class = "<?php echo $Columna; ?>">
		<td>
			<label><strong>Inicio del servicio</strong></label>
		</td>
		
		<td>
			<label>Usuario que inicia el servicio: </label>
		</td>
		<td>
			<label><?php echo $row[$i]['strUsuarioEnvia']; ?></label>
		</td>
		
		<td>
			<label>Fecha de inicio del servicio: </label>
		</td>
		<td>
			<label><?php echo $row[$i]['dFecha_Inicio_Servicio']->format("d-m-Y"); ?></label>
		</td>
		
		<td>
			<label>Hora de inicio del servicio: </label>
		</td>	
		<td>
			<label><?php echo $row[$i]['hHora_Inicio_Servicio']->format("H:i:s"); ?></label>
		</td>
		<!--Relleno-->
		<td></td>
		<!--Fin del relleno-->
	</tr>
	<tr class = "<?php echo $Columna; ?>">
		<td>
			<label>Kilometraje del vehiculo al momento de salir: </label>
		</td>
		<td>
			<label><?php echo $row[$i]['ftKMSalida']; ?></label>
		</td>
		
		<td>
			<label>Tipo de servicio: </label>
		</td>
		<td>
			<label><?php echo $row[$i]['strTipo_Servicio']; ?></label>
		</td>
		
		<td>
			<label>Taller donde se realizo el servicio: </label>
		</td>
		<td>
			<label><?php echo $row[$i]['strLugar_Servicio']; ?></label>
		</td>
		<!--Relleno-->
		<td></td><td></td>
		<!--Fin del relleno-->
	</tr>
	
	<tr class = "<?php echo $Columna; ?>">
		<td>
			<label>Motivo del servicio: </label>
		</td>
		<td colspan="7">
			<label><?php echo $row[$i]['strMotivo'] ?></label>
		</td>
	</tr>
	<?php if($row[$i]['dFecha_Termino_Servicio']){ ?>
	
	<!--Area de la factura-->
	<?php
		$ssql = "
		SELECT
			[idFactura_Servicio],
			[iNo_Factuda_Servicio] 
		FROM
			[dbo].[tbFactura_Servicio] 
		WHERE 
			[idServicio] =" . $row[$i]['idServicio'];
			
		$rresult = sqlsrv_query($conn, $ssql);
		
		if($rresult)
		{
			while($raw = sqlsrv_fetch_array($rresult, SQLSRV_FETCH_ASSOC))
			{
	?>
	<tr class = "<?php echo $Columna; ?>">
		<td>
			<label><strong>Factura por el servicio</strong></label>
		</td>
		<td colspan="2" align="right">
			<label>Numero de la factura: </label>
		</td>
		<td colspan="5">
			<label><strong><?php echo $raw['iNo_Factuda_Servicio']; ?></strong></label>
		</td>
	</tr>
	<tr class = "<?php echo $Columna; ?>">
		<td colspan="8">
			<label class = "VerReporte" id = "<?php echo $raw['idFactura_Servicio']; ?>"><u>Para ver el datalle de esta factura <a>[haga click aqui]</a></u></label>
		</td>
	</tr>
	<?php
			}
		}
	?>	
	<!--Fin del area de la factura-->
	<tr class = "<?php echo $Columna; ?>">
		<td>
			<label><strong>Fin del servicio </strong></label>
		</td>		
		
		<td>
			<label>Usuario que resivio el vehiculo: </label></td>
		<td>
			<label><?php echo $row[$i]['strUsuarioResive']; ?></label>
		</td>
		
		<td>
			<label>Fecha de la finalizacion del servicio: </label>
		</td>
		<td>
			<label><?php echo $row[$i]['dFecha_Termino_Servicio']->format("d-m-Y"); ?></label>
		</td>
		
		<td>
			<label>Hora de la finalizacion del servicio: </label>
		</td>
		<td>
			<label><?php echo $row[$i]['hHora_Termino_Servicio']->format("H:i:s"); ?></label>
		</td>
		<!--Relleno-->
		<td></td>
		<!--Fin del relleno-->
	</tr>
	
	<tr class = "<?php echo $Columna; ?>">
		<td>
			<label>Kilometraje del vehiculo al momento de regresar: </label>
		</td>
		<td>
			<label><?php echo $row[$i]['ftKM_Regreso'] ?></label>
		</td>
		
		<td>
			<label>Kilometraje total recorrido: </label>
		</td>
		<td>
			<label><?php echo $row[$i]['ftKM_Regreso'] - $row[$i]['ftKMSalida']; ?></label>
		</td>
		<!--Relleno-->
		<td></td><td></td><td></td><td></td>
		<!--Fin del relleno-->
	</tr>
	<?php }else{ ?>
	<tr class = "<?php echo $Columna; ?>">
		<td>
			<label><strong>El servicio no a finalizado aun </strong></label>
		</td>		
		<!--Relleno-->
		<td></td><td></td><td></td><td></td><td></td><td></td><td></td>
		<!--Fin del relleno-->
	</tr>
	<?php } ?>
	<?php } ?>
</table>


<style>
	#LeTable{
		width: 110%;
		margin-left: -20%;
		margin-top: 1%;
		display: inline-table;
		border-collapse: collapse;
		font-size: 15px;
		color: hsl(230, 100%, 15%);
	}
	
	.Clomuna1{
		background: hsl(220, 60%, 90%);
		border: 1px solid hsl(0, 5%, 90%);
	}
	
	.Clomuna2{
		background: hsl(220, 80%, 80%);
		border: 1px solid hsl(0, 5%, 90%);
	}
	
	.cab{
		background: hsl(230, 80%, 90%);
		border: 1px solid hsl(210, 100%, 80%);
	}
</style>
<script>
	$(document).ready(function(){
		$(".VerReporte").click(function(){
			window.open("VerDetalleFactura.php?p=" + $(this).attr("id"));
		});
	});
</script>

</body>