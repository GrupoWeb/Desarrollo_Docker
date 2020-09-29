<?php
require('../Conexiones/conexion.php');


$link=$_POST["nombrea"];
$link2=$_POST["sys"];



$sqlvldcn="select * from Trol where nombre_rol like '$link' and id_sistema=$link2";

$params = array();
$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
$stmt = sqlsrv_query( $conn, $sqlvldcn , $params, $options );
$row_count = sqlsrv_num_rows( $stmt );
if($row_count == 0){
echo "No existe";
$sql = "insert into Trol(nombre_rol, id_sistema, estado)
    VALUES
    (
    '".$_POST["nombrea"]."',
			    ".$_POST["sys"].",
				".$_POST["estado"].");";
				
				
				
				$res=sqlsrv_query($conn,$sql);
	
	if($res==true){
			sqlsrv_close($conn);	
			echo " 
                <script > 
                alert('DATOS INGRESADOS CON EXITO'); 
				window.history.go(-1);
                </script>
				";
	
}} else{
		
		
		echo " 
                <script > 
                alert('EL ROL YA EXISTE');
					window.history.go(-1);
                </script>";
	}
	
?>