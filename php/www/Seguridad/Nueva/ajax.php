<?php
include("conexion.php");
$sql="select tl.id_rol, tl.Nombre_rol, tl.estado  from Trol as tl where tl.id_sistema= ".$_GET['id']." and estado=1;";
		$stmt = sqlsrv_query( $conn, $sql );

<select name="usuarip" >

<option value="<?php echo $fila['id_rol']?>">-Seleccione-</option>	
	<?php while( $fila = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){ ?>
	<option value="<?php echo $fila['id_rol']?>"><?php echo $fila['Nombre_rol']?></option>
<?php }?>
</select>
?>