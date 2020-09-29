<script src="../js/jquery.js"></script>
<?php
include'../Conexiones/conexion.php';

$link=$_POST["nombrea"];

$sqlvldcn="select nombre_dependencia, activo from dependencia where nombre_dependencia like '$link' and activo=1;";
$params = array();
$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
$stmt = sqlsrv_query( $conn, $sqlvldcn , $params, $options );
$row_count = sqlsrv_num_rows( $stmt );
if($row_count == 0){

    $maximo = "select MAX(id_dependencia)+1 as valor from dependencia;";
    $max = sqlsrv_query($conn,$maximo);
    $rmax = sqlsrv_fetch_array($max);
    $valor = $rmax["valor"];
   
$sql = "insert into dependencia(id_dependencia,nombre_dependencia, activo)
    VALUES
    (
    ".$valor.",
    '".$_POST["nombrea"]."',
    ".$_POST["a"].");";
	
	$res=sqlsrv_query($conn,$sql);
	
	if($res==true){
        
			sqlsrv_close($conn);	
			echo " 
                <script > 
                alert('DATOS INGRESADOS CON EXITO'); 
				window.history.go(-1);
                </script>
				";
    

}}else{
	
	echo " 
                <script > 
                alert('LA DEPENDENCIA YA EXISTE');
					window.history.go(-1);
                </script>";
}



?>