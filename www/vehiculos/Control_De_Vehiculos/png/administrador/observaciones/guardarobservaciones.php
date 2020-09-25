<?
session_start();
	include('../../conexion/conexion.php');

$usn=$_SESSION['usern'];

$sql = "select apellido , nombre, id_usuario from usuario where usuario='$usn'";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
//echo	  "hola".$row["nombre"]."  ".$row["apellido"]."</option>"; 
$ap=$row["apellido"];
 $nom=$row["nombre"];
 $uen=$row["id_usuario"];

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
	$cc= $_REQUEST['md'];
	
	
	
    $sqlz1 = " select id_usuario from expediente where Id_expediente = '$cc' ";
$stmt = sqlsrv_query( $conn, $sqlz1 );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}
 $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ;
	
	//print " usuario ant".$row["id_usuario"]."<br>"; 
	//print " estado ant".$row["id_estado"]."<br>"; 
	$av=$row["id_usuario"];

sqlsrv_free_stmt( $stmt);		
		


  $sqlz2 = "insert into descripciones_tab  (id_expediente, descripcion,id_usuario,fechadescripcion ) values ('$cc','$te','$uen',GETDATE())";
sqlsrv_query($conn,$sqlz2 ) ; 
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
<center><h1 estilo1><img src='images/check.jpg' height='100' width='100' alt='Botón' /> Observacion Guardada Satisfactoriamente </h1></center>
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
