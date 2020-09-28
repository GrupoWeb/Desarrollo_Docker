<?php
session_start();
require('../conexion/conexion.php');
print("arg");
$idVale = $_REQUEST['idVale'];
$idVehiculo = $_REQUEST['idVehiculo'];
$idUsuario = $_SESSION['username'];
$idGasolinera = $_REQUEST['idGasolinera'];
$CantidadVales = $_REQUEST['CantidadVales'];
$CorrelativoInicial = $_REQUEST['ValeInicial'];
$CorrelativoFinal = $_REQUEST['ValeFinal'];
$MontoVale = $_REQUEST['MontoVale'];

if(!empty($CantidadVales))
{
	$query = "
	SELECT TOP $CantidadVales
	[idVale]
	FROM
	[dbo].[tbVale] 
	WHERE	
	[ftMonto_Vale] = $MontoVale
	AND [bActivo] = 1";

	$params = array();
	$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
	$stmt = sqlsrv_query( $conn, $query , $params, $options );

	if($stmt)
	{
		$row_count = sqlsrv_num_rows( $stmt );

		if($row_count ==  $CantidadVales)
		{	
			$Valida = false;
			while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))
			{
				$sql = "EXECUTE PR_Asigna_Comision ". $row['idVale'].", $idVehiculo, $idUsuario, $idGasolinera";
				$result = sqlsrv_query($conn, $sql);
				$Valida = true;
			}
			if($Valida)
			{
				echo "<script>alert('Vales asignados correctamente'); location.replace('../Menu_Principal.php');</script>";
			}
			else
			{
				echo "<script>alert('Error al asignar los vales'); location.replace('../Menu_Principal.php');</script>";
			}
		}
	}
	else
	{
		echo "<script>alert('Error al buscar los vales'); location.replace('../Menu_Principal.php');</script>";
	}
}
else
{
	if(!empty($CorrelativoInicial))
	{
		echo $query = "
		SELECT
		[idVale] 
		FROM
		[dbo].[tbVale] 
		WHERE	
		[ftMonto_Vale] = $MontoVale
		AND [iNo_Vale] >= $CorrelativoInicial
		AND [iNo_Vale] <= $CorrelativoFinal
		AND [bActivo] = 1";

		$stmt = sqlsrv_query($conn, $query);

		if($stmt)
		{
			$Valida = false;
			while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))
			{
				$sql = "EXECUTE PR_Asigna_Comision ". $row['idVale'].", $idVehiculo, $idUsuario, $idGasolinera";
				$result = sqlsrv_query($conn, $sql);
				$Valida = true;
			}

			if($Valida)
			{
				echo "<script>alert('Vales asignados correctamente'); location.replace('../Menu_Principal.php');</script>";
			}
			else
			{
				echo "<script>alert('Error al asignar los vales'); location.replace('../Menu_Principal.php');</script>";
			}
		}
		else
		{
			echo "<script>alert('Error al asignar los vales'); location.replace('../Menu_Principal.php');</script>";
		}
	}
}

?>