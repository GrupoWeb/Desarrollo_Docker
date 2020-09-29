<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<?php require 'Conexiones/conexion.php';?>
	
	<?php 
		$sql="select *from Tlinks where id_tlink=".$_GET['phpid'].";";
		$stmt = sqlsrv_query( $conn, $sql );
		/*while ($fila=mysql_fetch_array($res)){
		echo $fila['nombre'];
		}*/
	?>
	
	
	<select name="funcion"  required="required">

<option value="<?php echo $fila['id_link']?>">-Seleccione-</option>	
	<?php while( $fila = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){ ?>
	<option value="<?php echo $fila['id_link']?>"><?php echo $fila['Nombre_lk']?></option>
<?php }?>
</select>

<body>
</body>
</html>