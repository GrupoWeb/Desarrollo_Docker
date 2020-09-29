<!DOCTYPE html>
<?php
include("conexion.php");
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Mi sitio</title>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#pais').change(function(){
                    var id=$('#pais').val();
                    $('#estados').load('ajax.php?id='+id);
                });    
            });
        </script>
    </head>
    <body>
	
	<?php 
		$sql="select *from tsistema where estado=1;";
		$stmt=sqlsrv_query($conn,$sql);
		/*while ($fila=mysql_fetch_array($res)){
		echo $fila['nombre'];
		}*/
?>
        <select name="dept" id="" >
				<option value="<?php echo $fila['id_sistema']?>">-Seleccione-</option>
				<?php while( $fila = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){ ?>
					<option value="<?php echo $fila['id_sistema']?>"><?php echo $fila['Nombre_sys']?></option>
				<?php }?>
							
    </select>
        <div id="estados">
            <select name="edo">
                <option value="">Seleccione un pais</option>
            </select>
        </div>
    </body>
</html>
    