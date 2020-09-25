<?php
	require('../conexion/conexion.php');
	
	$llanta = $_POST['Llanta'];
	$tricket = $_POST['Tricket'];
	$llave = $_POST['Llave'];
	$tarjeta = $_POST['Tarjeta'];
	$estinguidor = $_POST['Estinguidor'];
	$triangulo = $_POST['Triangulo'];
	$Vehiculo = $_POST['Vehiculo'];
	
	$sql = "SELECT [idVehiculo] FROM [dbo].[tbVehiculo] WHERE iPlaca like '$Vehiculo' AND bActivo = 1";
	$result = sqlsrv_query($conn, $sql);
	
	if($result)
	{
		$idVehiculo = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
		
		$sql2 = "
SELECT 
	[hv].[strHerramienta_Vehiculo] 
FROM 
	[dbo].[tbVehiculo] AS vh 
	INNER JOIN [dbo].[tbAsignacion_Herramientas] AS ah ON ah.idVehiculo = vh.idVehiculo 
	INNER JOIN [dbo].[tbHerramienta_Vehiculo] AS hv ON hv.idHerramienta_Vehiculo = ah.idHerramiento
WHERE
	[vh].[idVehiculo] = ". $idVehiculo['idVehiculo'].
"	AND [vh].[bActivo] = 1
	AND [ah].[bActivo] = 1
	AND [hv].[bActivo] = 1";
	
		$result2 = sqlsrv_query($conn, $sql2);
		
		if($result2)
		{
			while($row = sqlsrv_fetch_array($result2, SQLSRV_FETCH_ASSOC))
			{
				if($row['strHerramienta_Vehiculo'] === "LLANTA DE REPUESTO")
				{
					if($llanta == "false")
					{
						echo "false";
						break;
					}	
				}
				else if($row['strHerramienta_Vehiculo'] === "TRICKET Y BARILLA")
				{
					if($tricket == "false")
					{
						echo "false";
						break;
					}				
				}
				else if($row['strHerramienta_Vehiculo'] === "LLAVE DE CHUCHOS")
				{
					if($llave == "false")
					{
						echo "false";
						break;
					}
				}
				else if($row['strHerramienta_Vehiculo'] === "TARJETA DE CIRCULACION")
				{
					if($tarjeta == "false")
					{
						echo "false";
						break;
					}
				}
				else if($row['strHerramienta_Vehiculo'] === "EXTINGUIDOR")
				{	
					if($estinguidor == "false")
					{
						echo "false";
						break;
					}
				}
				
				else if($row['strHerramienta_Vehiculo'] === "TRIANGULO DE EMERGENCIA")
				{
					if($triangulo == "false")
					{
						echo "false";
						break;
					}
				}
			}
		}
		else
		{
			echo "Error al intentar buscar las Herramientas";
		}
		
		if(true)
		{
		
		}
		else
		{
			echo "false";
		}
	}
	else
	{
		echo "Vehiculo no encontrado";
	}
	
?>