<?php
include'../Conexiones/conexion.php';

$link=$_POST["nombrea"];
$link2=$_POST["sys"];



$sqlvldcn="select tipo_enlace from tipo_link where tipo_enlace='$link' and id_sistema='$link2';";
$params = array();
$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
$stmt = sqlsrv_query( $conn, $sqlvldcn , $params, $options );
$row_count = sqlsrv_num_rows( $stmt );
if($row_count == 0 ){
$sql = "insert into tipo_link(tipo_enlace, id_sistema)
    VALUES
    (
    '".$_POST["nombrea"]."',
	".$_POST["sys"].");";
	
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
                alert('EL Menu ya Existe YA EXISTE');
					window.history.go(-1);
                </script>";
	}




?>