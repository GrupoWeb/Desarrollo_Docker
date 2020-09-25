<?php
	require('../conexion/conexion.php');
	
	$sql = "
SELECT 
	[idVale],
	[iNo_Vale],
	[ftMonto_Vale]
FROM
	[dbo].[tbVale]
WHERE 
	[bActivo] = 1";
	
	$result = sqlsrv_query($conn, $sql);
	
	echo "<thead>
		<tr>
			<th>No. Vale</th>
			<th>Monto del vale</th>
		</tr>
		</thead>
	";
	
	if($result)
	{
		while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
		{
			echo "
				<tr class = 'envia' id = '". $row['idVale']. "'>
					<td>". $row['iNo_Vale'] . "</td>";
				
			echo "<td>". $row['ftMonto_Vale']. "</tr>	
				</tr>	
			";
		}
	}
?>