<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<?php include ("conexion.php");?>
	
	<?php 
		$sql="select us.nombre,us.apellido , us.id_usuario from usuario as us inner join dependencia as dep on 
us.id_dependencia = dep.id_dependencia where us.activo= 1 and dep.id_dependencia=".$_GET['id']."order by us.nombre";
		$stmt = sqlsrv_query( $conn, $sql );
		/*while ($fila=mysql_fetch_array($res)){
		echo $fila['nombre'];
		}*/
	?>
	<select name="usuarip" >

<option value="0">-Seleccione-</option>	
	<?php while( $fila = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){ ?>
	<option value="<?php echo $fila['id_usuario']?>"><?php echo $fila['nombre']," ",$fila['apellido']?></option>
<?php }?>
</select>

<body>
</body>
</html>
