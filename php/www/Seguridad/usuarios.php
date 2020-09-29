<?php
session_start();
//
$_SESSION['usuarip']; 


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<?php require 'Conexiones/conexion.php';?>
	
	<?php 
        
		$sql="select tl.id_rol, tl.Nombre_rol, tl.estado  from Trol as tl where tl.id_sistema=".$_GET['phpid']." and estado=1;";
		$stmt = sqlsrv_query( $conn, $sql );
		/*while ($fila=mysql_fetch_array($res)){
		echo $fila['nombre'];
		}*/
	?>
	
	<form name="form2" action="" >
	<select name="usuarip"  required="required" onChange="from(document.form2.usuarip.value,'midiv2','Permisos.php')" >

<option value="<?php echo $fila['id_rol']?>">-Seleccione-</option>	
	<?php while( $fila = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){ ?>
	<option value="<?php echo $fila['id_rol']?>"><?php echo $fila['Nombre_rol']?></option>
<?php }?>
</select>
</form>
<body>
<br>
<label class="desc" id="title10" for="Field10">
Permiso:</label>
<div id="midiv2">
			
  </div>
</body>
</html>
