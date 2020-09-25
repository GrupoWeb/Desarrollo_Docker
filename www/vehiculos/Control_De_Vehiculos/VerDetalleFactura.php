<?php
	require('conexion/conexion.php');
	
	$idFactura = $_REQUEST['p'];
	
	$sql = "
SELECT
	[r].[strRepuesto],
	[strManoObra],
	[iCantidad_Repuestos],
	[PrecioUnidad] 
FROM
	[dbo].[tbDetalle_Factura] AS [d]
	LEFT JOIN [dbo].[tbRepuesto] AS [r] ON [r].[idRepuesto] = [d].[idRepuesto] 
WHERE
	[idFactura] = $idFactura
	";
	
	$result = sqlsrv_query($conn, $sql);
	
	if($result)
	{
		$i = 0;
		$ManoDeObra = false;
		$NOIM = -1;
		$Repuesto = false;
		$NOIR = -1;
		while($row[$i] = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
		{
			if($row[$i]['strManoObra'] && ($NOIM == -1))
			{
				$ManoDeObra = true;
				$NOIM = $i;
			}
			if($row[$i]['strRepuesto'] && ($NOIR == -1))
			{
				$Repuesto = true;
				$NOIR = $i;
			}
			$i++;
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Detalle de factura por servicio de mantenimiento</title>
<style>
	table{
		width: 80%;
		border-collapse: collapse;
		color: hsl(230, 100%, 25%);
	}
	
	table th, td{
		border: 1px solid hsl(0, 5%, 80%);
	}
	
	table th{
		background: hsl(230, 80%, 90%);
		border: 1px solid hsl(210, 100%, 80%);
	}
	
	.Clomuna1{
		background: hsl(220, 60%, 90%);
		border: 1px solid hsl(0, 5%, 90%);
	}
	
	.Clomuna2{
		background: hsl(220, 80%, 80%);
		border: 1px solid hsl(0, 5%, 90%);
	}
	
	.Columna0{
		background: hsl(0, 5%, 95%);
	}
</style>
</head>

<body>
<div align="center">
	<table>
		<tr class = "Columna0">
			<td colspan="4" align="left">
				<label>Factura NO: <? echo $idFactura; ?></label>
			</td>
		</tr>
		<tr>
			<th>
				<label>Cantidad</label>
			</th>
			<th>
				<label>Descripcion del servicio</label>
			</th>
			<th>
				<label>Valor</label>
			</th>
			<th>
				<label>Total</label>
			</th>
		</tr>	
		<tr class = "Columna0">
			<!--Relleno-->
			<td>&nbsp;</td><td></td><td></td><td></td>
			<!--Fin del relleno-->
		</tr>
		<? if($ManoDeObra){ ?>
		<tr>
			<th colspan="4" align="center">
				<label>Mano de obra</label>
			</th>
		</tr>
		<? $TotalManoObra = 0; for($i = $NOIM; $row[$i]['strManoObra']; $i++){ ?>
		<tr class = "Clomuna1">
			<td>
				<label><? echo $row[$i]['iCantidad_Repuestos']; ?></label>
			</td>
			<td>
				<label><? echo $row[$i]['strManoObra']; ?></label>
			</td>
			<td>
				<label>Q. <? echo $row[$i]['PrecioUnidad']; $TotalManoObra += ( (float)$row[$i]['PrecioUnidad'] * (int)$row[$i]['iCantidad_Repuestos']);?></label>
			</td>
			<td></td>
		</tr>
		<? } ?>
		<tr class = "Clomuna1">
			<!--Relleno-->
			<td></td>
			<!--Fin de relleno-->
			<td align="center">
				<label>Total de mano de obra</label>
			</td>
			<!--Relleno-->
			<td></td>
			<!--Fin de relleno-->
			<td>
				<label>Q. <? echo $TotalManoObra; ?></label>
			</td>
		</tr>
		<tr class = "Clomuna1">
			<!--Relleno-->
			<td>&nbsp;</td><td></td><td></td><td></td>
			<!--Fin del relleno-->
		</tr>
		<? } ?>
		<? if($Repuesto){ ?>
		<tr>
			<th colspan="4" align="center">
				<label>Repuestos y Lubricatnes</label>
			</th>
		</tr>
		<? $TotalRepuesto = 0; for($i = $NOIR; $row[$i]['strRepuesto']; $i++){ ?>
		<tr class = "Clomuna2">
			<td>
				<label><? echo $row[$i]['iCantidad_Repuestos']; ?></label>
			</td>
			<td>
				<label><? echo $row[$i]['strRepuesto']; ?></label>
			</td>
			<td>
				<label>Q. <? echo $row[$i]['PrecioUnidad']; $TotalRepuesto += ( (float)$row[$i]['PrecioUnidad'] * (int)$row[$i]['iCantidad_Repuestos']) ;?></label>
			</td>
			<td></td>
		</tr>
		<? } ?>
		<tr class = "Clomuna2">
			<!--Relleno-->
			<td></td>
			<!--Fin de relleno-->
			<td align="center">
				<label>Total de Repuestos y Lubricantes</label>
			</td>
			<!--Relleno-->
			<td></td>
			<!--Fin de relleno-->
			<td>
				<label>Q. <? echo $TotalRepuesto; ?></label>
			</td>
		</tr>
		<tr class = "Clomuna2">
			<!--Relleno-->
			<td>&nbsp;</td><td></td><td></td><td></td>
			<!--Fin del relleno-->
		</tr>
		<? } ?>
		<tr class = "Columna0">
			<td></td>
			<td align="center">
				<label>Total del servicio de mantenimiento</label>
			</td>
			<td></td>
			<td>
				<label>Q. <? echo $TotalManoObra + $TotalRepuesto; ?></label>
			</td>
		</tr>
	</table>
</div>
</body>
</html>
