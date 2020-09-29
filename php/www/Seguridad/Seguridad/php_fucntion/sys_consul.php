<?php include('../conexion/conexion.php');?>
	
	<?php 
		$sql="select us.nombre,us.apellido , us.id_usuario, us.correo from usuario as us inner join dependencia as dep on 
us.id_dependencia = dep.id_dependencia where us.activo= 1 and dep.id_dependencia=".$_GET['id']."order by us.nombre";
		$stmt = sqlsrv_query( $conn, $sql );
		/*while ($fila=mysql_fetch_array($res)){
		echo $fila['nombre'];
		}*/
	?>
	<select name="usuarip"  required="required">

<option value="<?php echo $fila['id_usuario']?>">-Seleccione-</option>	
	<?php while( $fila = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){ ?>
	<option value="<?php echo $fila['id_usuario']?>"><?php echo $fila['nombre']," ",$fila['apellido']?></option>
<?php }?>
</select>