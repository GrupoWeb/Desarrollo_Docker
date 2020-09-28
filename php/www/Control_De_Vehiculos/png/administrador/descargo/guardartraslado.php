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



<?
	
/*$fecha= date("Y-m-d ");
$hora= date("H:i:s",time()-3600);*/

		

//echo "id_dependencia  ", $dept2, "<br>";
//echo "id_usuario      ",$usuarip2,"<br>";
//echo "id_estado       ",$coment2, "<br>";
//echo "id_estado       ",$estab2, "<br>";
//echo "correlativo     ",$mc, "<br>";	

if($_POST){

 echo "numero expediente",   $expd=$_REQUEST["d"];
	
	$aa= $_REQUEST['dept2'];
	$bb= $_REQUEST['usuarip'];
	$cc= $_REQUEST['coment2'];
	$dd= $_REQUEST['estab2'];
	$ee= $_REQUEST['mc'];
	
	
    $sqlz1 = " select id_usuario, id_estado, Id_expediente from expediente where Id_expediente = '$ee' ";
$stmt = sqlsrv_query( $conn, $sqlz1 );

if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}
 $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ;
	
	//print " usuario ant".$row["id_usuario"]."<br>"; s
	//print " estado ant".$row["id_estado"]."<br>"; 
	$ff=$row["id_usuario"];
	$gg=$row["id_estado"];	
	

sqlsrv_free_stmt( $stmt);		

  $sqlz3 = "update movimiento  set id_estado = 1  where  Id_expediente = '$ee'";
sqlsrv_query($conn,$sqlz3 ) ; 
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}



  $sqlz2 = "insert into movimiento ( id_expediente,id_usuario, id_estado,id_dependencia,usuario_recibe,fecha_traslado,comentarios,id_recibido ) values ('$ee','$uen','17','$aa','$bb',GETDATE(),'$cc',20)";
sqlsrv_query($conn,$sqlz2 ) ; 
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}
 
//echo " Dato guardado "; 
	
	
  $sqlz3 = "update expediente set id_estado = '2'  where  Id_expediente = '$ee'";
sqlsrv_query($conn,$sqlz3 ) ; 
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}
 
  //echo	" Dato guardado "; 

// echo '<meta http-equiv="refresh" content="0.0000000001;  URL=../versolicitud/versolicitud.php" />'; 
           	   


} //fin de if post		  
	
	
	


 echo 
"
<center><h1 estilo1><img src='images/check.jpg' height='100' width='100' alt='Botón' /> Traslado Realizado Satisfactoriamente </h1></center>
<br></br>
 <table width='350' border='0' align='center'	>
 
   <tr>
    <td><a href='../versolicitud/versolicitud.php?ex=$ee'><img src='images/images.jpg' height='100' width='100' alt='Botón' /> </a></td>
	<td	> <a href='../versolicitud/versolicitud.php?ex=$ee'> 	<h2>¿Desea Regrear al Expediente?</h2></td></a>
    
  </tr>
</table>";







$sql="select correo,nombre,apellido  from usuario where activo= 1 and id_usuario='$bb'";
		$stmt = sqlsrv_query( $conn, $sql );
	
	 while( $fila = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){ 
  $cor= $fila['correo']; 
 $nombr=     $fila['nombre']; 
 $ape=     $fila['apellido'];

}





		$sql="select correo,nombre,apellido  from usuario where activo= 1 and id_usuario='$uen'";
		$stmt = sqlsrv_query( $conn, $sql );
	
	 while( $fila = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){ 
 $correo= $fila['correo']; 
 $nombre=     $fila['nombre']; 
 $apellido=     $fila['apellido'];

}


     $para = $cor; 
     $nombre = $nom;
     $asunto = "Revisar expediente No.  $expd";
	 $mensaje = "Estimado '$nombr', '$ape'
	
	Gusto en saludarle,
	
	Por este medio se le informa que se le a sigo asignado por merdio de un traslado el expediente No. $ee para su revisión. 
	
	Gracias por el apoyo.
	
	Saludos.
	
	";
	$de = "$nombre ".$apellido." ".$correo;
	
	
//	$headers = "MIME-version:1.0;\r\n";
//	$headers .= "Content-type: text/html; \r\n charset=iso-8859-1; \r\n";
//	$headers .= "From: $de \r\n";
//	$headers .= "To: $para; \r\n subject:$asunto \r\n";
	
	
	$headers = 'From: ' .$de. "\r\n" .
    'Reply-To: admin@dayshare.local' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

   //if( mail($para, $titulo, $mensaje, $cabeceras))
	
	
	mail($para,$asunto,$mensaje,"De: admin@dayshare.local \ r \ nX-Mailer: PHP")







?>

	
</body>
</html>

