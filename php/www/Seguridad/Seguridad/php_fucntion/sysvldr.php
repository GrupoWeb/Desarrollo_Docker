<?php
include'../Conexiones/conexion.php';
$linka=$_POST['nombrea'];
$linkb=$_POST['nombreb'];

$sqlvldcn="select Nombre_sys, ruta_sistema from Tsistema where Nombre_sys like '$linka' and ruta_sistema like '../$linkb';";
$params = array();
$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
$stmt = sqlsrv_query( $conn, $sqlvldcn , $params, $options );
$row_count = sqlsrv_num_rows( $stmt );

if($row_count == 0 ){

$sql = "insert into Tsistema(Nombre_sys, ruta_sistema, estado)
    VALUES
    (
    '".$_POST["nombrea"]."',
	'../".$_POST["nombreb"]."',
			    ".$_POST["a"].");";
	
				
				$res=sqlsrv_query($conn,$sql);
	
	if($res==true){
			sqlsrv_close($conn);	
			echo " 
                <script > 
                alert('DATOS INGRESADOS CON EXITO'); 
				window.history.go(-1);
                </script>
				";}
	
} else{
	echo"ya existo"; echo $row_count;
		
		
		echo " 
                <script > 
                alert('EL USUARIO YA EXISTE');
					window.history.go(-1);
                </script>";
	}


?>