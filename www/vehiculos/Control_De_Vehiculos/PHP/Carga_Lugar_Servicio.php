<?php
	require('../conexion/conexion.php');
	
		$query = "SELECT * FROM [dbo].[tbLugar_Servicio] WHERE bActivo = 1";
		
			$result = sqlsrv_query($conn, $query);
			
			if($result){
			
				echo "<thead>
						<tr>		
							<th>Nombre establecimiento</th>
							<th>Direccion</th>
						</tr>
					</thead>";
				while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
				{
					echo "<tr class = 'envia' id = '". $row['idLugar_Servicio']. "'><td>". $row['strLugar_Servicio']. "</td>";
					echo "<td>". $row['DireccionLugar']. "</td>";
				}
			}
?>