<?php
	require('../conexion/conexion.php');
	
	$Tipo_Solicitud = $_POST['TipoSolicitud'];
	
	$query = "select * from tbModelo_Vehiculo";
	
	$result = sqlsrv_query($conn, $query);
	
	if($result){
 		echo "<thead>
			 		<tr>		
						<th>id Modelo Vehiculo</th>
						<th>Modelo Vehiculo</th>
						<th>Modificiar</th>
						<th>Eliminar</th>
					</tr>
				</thead>";
		while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
		{
            //$row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
			echo "<tr id = '". $row['idModelo_Vehiculo']. "'>". "<td>". $row['idModelo_Vehiculo']. "</td>";
			echo "<td>". $row['strModelo_Vehiculo']. "</td>";
			echo "<td><i class='fa fa-cog fa-spin' style='font-size:22px; color:hsl(0, 10%, 60%);'></i></td>";
			echo "<td><i class='fa fa-close' style='font-size:22px;color:hsl(0, 50%, 50%);'></i></td></tr>";
		}
	}
	else
	{
		echo "Contenido no encontrado";
	}
?>