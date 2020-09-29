<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<?php require 'Conexiones/conexion.php';?>
	
	<?php 
		$sql="select *from tipo_link;";
		$stmt = sqlsrv_query( $conn, $sql );
		/*while ($fila=mysql_fetch_array($res)){
		echo $fila['nombre'];
		}*/
	?>
	<form name="form3" action="">
	<select select name="Permisos"  required="required" onChange="from(document.form3.Permisos.value,'midiv3','funcion.php')" >

<option value="<?php echo $fila['id_tlink']?>">-Seleccione-</option>	
	<?php while( $fila = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){ ?>
	<option value="<?php echo $fila['id_tlink']?>"><?php echo $fila['tipo_enlace']?></option>
<?php }?>
</select>
</form>

<body>
<br>
<label class="desc" id="title10" for="Field10">
Funcion:</label>
<div id="midiv3">
			
  </div>
</body>
</html>
