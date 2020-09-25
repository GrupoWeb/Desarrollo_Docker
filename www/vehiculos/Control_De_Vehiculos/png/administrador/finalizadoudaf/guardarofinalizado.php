<?
session_start();
include('../../conexion/conexion.php');

$usn=$_SESSION['usern'];

$sql = "select apellido , nombre, id_usuario, id_dependencia, correo from usuario where usuario='$usn'";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
//echo	  "hola".$row["nombre"]."  ".$row["apellido"]."</option>"; 
$ap=$row["apellido"];
 $nom=$row["nombre"];
 $uen=$row["id_usuario"];
 $depc2=$row["id_dependencia"];
 $correoss = $row ['correo'];

}
sqlsrv_free_stmt( $stmt);	
?>
<html>
<body bgcolor="#F2F2F2">
<blockquote>&nbsp;</blockquote>




<?

	
/*$fecha= date("Y-m-d ");
$hora= date("H:i:s",time()-3600);*/


	
		
		
		
		
//echo "texto         ",$arg	, "<br>";
//echo "correlativo ",$md, "<br>";	

if($_POST){

	
	$te= $_REQUEST['arg'];
echo	$cc= $_REQUEST['md'];
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
    $sqlz1 = " select id_usuario from expediente_udaf where Id_expedienteudaf = '$cc' ";
$stmt = sqlsrv_query( $conn, $sqlz1 );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}
 $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ;
	
	//print " usuario ant".$row["id_usuario"]."<br>"; 
	//print " estado ant".$row["id_estado"]."<br>"; 
	$av=$row["id_usuario"];

sqlsrv_free_stmt( $stmt);		
		

  $sqlz3 = "update movimientoudaf  set id_estado = 1  where  Id_expedienteudaf = '$cc'";
sqlsrv_query($conn,$sqlz3 ) ; 
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}


 echo $sqlz2 = "insert into movimientoudaf ( id_expedienteudaf,id_usuario, id_estado,id_dependencia,usuario_recibe,fecha_traslado,comentarios,tipoexpediente,id_recibido) values ('$cc','$uen',3,'$depc2','$uen',GETDATE(),'$te',2,20)";
sqlsrv_query($conn,$sqlz2 ) ; 
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}






 $sqlz3 = "update expediente_udaf set id_estado ='3'  where  Id_expedienteudaf = '$cc'";
sqlsrv_query($conn,$sqlz3 ) ; 
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}


 
//echo " Dato guardado "; 
	 
	
 
  //echo	" Dato guardado "; 

// echo '<meta http-equiv="refresh" content="0.0000000001;  URL=../versolicitud/versolicitud.php" />'; 
           	   


} //fin de if post	


$h=$md;
echo 


"
<center><h1 estilo1><img src='images/check.jpg' height='100' width='100' alt='Botón' /> Observación guardada satisfactoriamente </h1></center>
<br></br>
 <table width='350' border='0' align='center'	>

  
   <tr>
    <td><a href='../versolicitud/versolicitud.php?ex=$h'><img src='images/images.jpg' height='100' width='100' alt='Botón' /> </a></td>
	<td	> <a href='../versolicitud/versolicitud.php?ex=$h'> 	<h2> Regreso a expediente</h2></td></a>
    
  </tr>
</table>";



?>




</body>
</html>
