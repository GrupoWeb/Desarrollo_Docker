<?php
	require('../conexion/conexion.php');
	
	$Tipo_Solicitud = $_POST['TipoSolicitud'];
	
	$query = "select * from tbTipo_Vehiculo";
	
	$result = sqlsrv_query($conn, $query);
	
	if($result){


 		echo "<table><thead>
			 		<tr>		
						<th>id Tipo Vehiculo</th>
						<th>Tipo Vehiculo</th>
						<th>Modificiar</th>
						<th>Eliminar</th>
					</tr>
				</thead>
		</table>
		";


		 while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
		 {
				
			  echo "<tr>";
			  echo "<td>". $row['idTipo_Vehiculo']. "</td>";
	 	      echo "<td>". $row['strTipo_Vehiculo']. "</td>";
		 	  echo "<td><i class='fa fa-cog  fa-spin' style='font-size:22px; color:hsl(0, 10%, 60%);'></i></td>";
		 	  echo "<td><i class='fa fa-close' style='font-size:22px;color:hsl(0, 50%, 50%);'></i></td></tr>";

		 };

		 echo "</tbody>";
	
	}
	else
	{
		echo "Contenido no encontrado";
	}

	// while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
		// {
				
			
		// 	  echo "<tr id = '". $row['idTipo_Vehiculo']. "'>". "<td>". $row['idTipo_Vehiculo']. "</td></tr>";
		// 	  echo "<tr><td>". $row['strTipo_Vehiculo']. "</td></tr>";
		// 	  echo "<td><i class='fa fa-cog  fa-spin' style='font-size:22px; color:hsl(0, 10%, 60%);'></i></td>";
		// 	  echo "<td><i class='fa fa-close' style='font-size:22px;color:hsl(0, 50%, 50%);'></i></td></tr>";

		// }
?>

