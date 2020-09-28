<?php include ("conexion.php");?>
	
	<?php 
		$sql="select us.usuario , us.id_dependencia from usuario as us inner join dependencia as dep on 
us.id_dependencia = dep.id_dependencia where dep.id_dependencia=".$_GET['id'];
		$stmt = sqlsrv_query( $conn, $sql );
		/*while ($fila=mysql_fetch_array($res)){
		echo $fila['nombre'];
		}*/
	?>
	<select name="maquinas" >

<option value="0">-Seleccione-</option>	
	<?php while( $fila = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){ ?>
	<option value="<?php echo $fila['id_dependencia']?>"><?php echo $fila['usuario']?></option>
<?php }?>
</select>