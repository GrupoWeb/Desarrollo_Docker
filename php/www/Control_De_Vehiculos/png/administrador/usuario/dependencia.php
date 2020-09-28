<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>

<style>
div{
width:300px; float:left;
padding:10px;
background:#f6f6f6;
}
</style>
<script type="text/javascript" language="javascript" src="js/ajax.js"></script>	

</head>
<body>

<?php include ("conexion.php");?>
	
	<?php 
		$sql="select nombre_dependencia, id_dependencia from dependencia ";
		$stmt=sqlsrv_query($conn,$sql);
		/*while ($fila=mysql_fetch_array($res)){
		echo $fila['nombre'];
		}*/
?>


	<form name="form1" action="">
		<div>
			Clientes:
			<select name="cliente" id="" onChange="from(document.form1.cliente.value,'midiv','usuarios.php')">
				<option value="0">-Seleccione-</option>
				<?php while( $fila = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){ ?>
					<option value="<?php echo $fila['id_dependencia']?>"><?php echo $fila['nombre_dependencia']?></option>
				<?php }?>
							
			</select>	
		</div>
		
		<div id="midiv">
			
		</div>
	
	
	
	</form>
</body>
</html>