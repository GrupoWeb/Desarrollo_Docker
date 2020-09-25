<?php
	require('../conexion/conexion.php');
	
	$Asignado = $_POST['Asignacion'];
	$Monto = $_POST['Monto'];
	$MesInicio = $_POST['MesIncio'];
	$MesFinal = $_POST['MesFinal'];
	$AñoInicio = $_POST['AnioInicio'];
	$AñoFinal = $_POST['AnioFinal'];
	
	$fechaInicio = $AñoInicio . "-" . $MesInicio . "-" . "01";
	if(($MesFinal)  === '02')
	{
		$fechaFinal = $AñoFinal . "-" . $MesFinal . "-" . "28";
		$Dia = "28";
	}
	else{
		if((($MesFinal) == 4) || (($MesFinal) == 6) || (($MesFinal) == 9) ||(($MesFinal) == 11) ) 
		{
			$fechaFinal = $AñoFinal . "-" . $MesFinal . "-" . "30";
			$Dia = "30";
		}
		else
		{
			$fechaFinal = $AñoFinal . "-" . $MesFinal . "-" . "31";
			$Dia = "31";
		}
	}
	
	$query = "
SELECT
	*
FROM
	[dbo].[tbVale] 
WHERE
	[FechaIngreso] >= '$fechaInicio'
	AND [FechaIngreso] <= '$fechaFinal'	
";

	if($Asignado>0)
	{
		$query .= "AND [bActivo] = " . ($Asignado - 1) ;
	}
	
	if($Monto>0)
	{
		$query .= "AND [ftMonto_Vale] = " .$Monto ;
	}
	
	$result = sqlsrv_query($conn, $query);
	
	if($result){
	echo "<thead>
			 		<tr class=\"t\">		
						<th class=\"th\">No Vale</th>
						<th class=\"th\">Monto Vale Q.</th>
						<th class=\"th\">Cod Asignacion</th>
						<th class=\"th\">Fecha de ingreso</th>
					</tr>
				</thead><tbody>";
		while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
		{
            //$row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
			echo "<tr id = '". $row['iNo_Vale']. "'>". "<td>". $row['iNo_Vale']. "</td>";
			echo "<td>". $row['ftMonto_Vale']. "</td>";
			if($row['bActivo'] == 1){
				echo "<td> Sin Asignar</td>";
			}
			else
			{
				echo "<td> Vale Asignado</td>";
			}
			echo "<td>". $row['FechaIngreso']->format("d-m-Y")."</td></tr>";
		}
	}
	else
	{
		echo "Contenido no encontrado";
	}
?>
</body>