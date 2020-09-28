<?php 
require("conexion.php");

 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php 

$sql = "SELECT *from dependencia";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
      echo $row['ID_DEPENDENCIA'].", ".$row['DEPENDENCIA']."<br />";
}

sqlsrv_free_stmt( $stmt);

$sql2="select *from empleado";
$ReslQ=sqlsrv_query($conn, $sql2);
if($sql2==false){

	die(print_r(sqlsrv_erros(), true));
}

while($fila =sqlsrv_fetch_array($ReslQ, SQLSRV_FETCH_ASSOC)){
echo $fila["NOMBRE"].",".$fila["DPI"]."</br>"; 

}

sqlsrv_free_stmt($ReslQ);




 ?>

</body>
</html>