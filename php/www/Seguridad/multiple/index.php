<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<?php
require'conexion.php';
$dept=$_SESSION['dept2']=@$_REQUEST['dept'];



$sql="select *from Tsistema";
$r1=sqlsrv_query($conn, $sql);

?>

<body>
<form name="fom1">
<p>Asigna un Sistema
<select name="dept" onChange="this.form.submit()" >
				<option value="<? echo $dept?>">-Seleccione-</option>
				<?php while( $fila = sqlsrv_fetch_array( $r1, SQLSRV_FETCH_ASSOC) ){ ?>
					<option value="<? echo $fila['id_sistema']?>"><? echo $fila['Nombre_sys']?></option>
				<?php }?>
							
    </select>
	

	
	</form>



</body>
</html>