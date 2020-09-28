<?php
	require('../conexion/conexion.php');
	
	
	require('../conexion/conexion.php');
	
	$iPlaca = $_POST['Placa'];
	
	
		$query = "SELECT * FROM [dbo].[tbLugar_Servicio] WHERE bActivo = 1 AND idLugar_Servicio = $iPlaca";
		
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
					echo "<tr id = '". $row['idLugar_Servicio']. "'><td>". $row['strLugar_Servicio']. "</td>";
					echo "<td>". $row['DireccionLugar']. "</td>";
				}
			}
?>