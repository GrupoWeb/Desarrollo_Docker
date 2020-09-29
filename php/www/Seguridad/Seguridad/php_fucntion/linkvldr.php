<?php
include'../Conexiones/conexion.php';

$link=$_POST["nombrea"];
$link2=$_POST["nombreb"];
$link3=$_POST["sys"];
$link4=$_POST["estado"];


$sqlvldcn="select id_sistema, nombre_link, Nombre_lk, estado from Tlinks where id_sistema = $link3 and nombre_link='../$link' and Nombre_lk like'$link2' AND estado=$link4";
$params = array();
$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
$stmt = sqlsrv_query( $conn, $sqlvldcn , $params, $options );
$row_count = sqlsrv_num_rows( $stmt );
if($row_count == 0){

$sql = "insert into Tlinks(id_sistema, nombre_link, Nombre_lk, estado, id_tlink)
    VALUES
    (
    ".$_POST["sys"].",
	 '../".$_POST["nombrea"]."',
	  '".$_POST["nombreb"]."',
	".$_POST["estado"].",
".$_POST["tlk"].");";

$res=sqlsrv_query($conn,$sql);
	
	if($res==true){
			sqlsrv_close($conn);	
			echo " 
                <script > 
                alert('DATOS INGRESADOS CON EXITO'); 
				window.history.go(-1);
                </script>
				";

}

	}else{
		
		echo " 
                <script > 
                alert('LA FUNCION YA EXISTE');
					window.history.go(-1);
                </script>";
				
	} 




?>