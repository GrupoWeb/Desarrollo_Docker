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
	$cc= $_REQUEST['md'];
	
	
	
	//correo 
	
		
		
		
		
			// envio de correo al abrir la notifiacion.



		$sqlls="	 select expt.Id_expediente, expt.id_solicitante, usert.nombre, usert.apellido, usert.correo		 
		  from expediente as expt inner join
		  usuario as usert on expt.id_solicitante = usert.id_usuario   where expt.Id_expediente = '$cc'";
		$stmtss = sqlsrv_query( $conn, $sqlls);
	
	 while( $ff = sqlsrv_fetch_array( $stmtss, SQLSRV_FETCH_ASSOC) ){ 
 
 //informacino del usuario que envio el expediente
 $correosolic= $ff['correo']; 
 $nombresolic=     $ff['nombre']; 
 $apellidosolic=     $ff['apellido'];
 
 
 }
 
 
 
 
 
 		$sqlls="select top 1  expt.Id_expediente, usert.nombre, usert.apellido, usert.correo, est.Estado,dept.Nombre_dependencia		 
		  from movimiento as expt inner join
		  usuario as usert on expt.usuario_recibe = usert.id_usuario  inner join 
		  estado as est on expt.id_estado = est.Id_estado inner join dependencia as dept on 
		  dept.id_dependencia = usert.id_dependencia
		    where expt.Id_expediente = '$cc'   order by id_movimiento desc";
		$stmtss = sqlsrv_query( $conn, $sqlls);
	
	 while( $ff = sqlsrv_fetch_array( $stmtss, SQLSRV_FETCH_ASSOC) ){ 
 
  //informacino del usuario que recibio el correo 
 $correoreb= $ff['correo']; 
 $nombrereb=     $ff['nombre']; 
 $apellidoreb=     $ff['apellido'];
 $dependenciareb= $ff ['Nombre_dependencia'];
 $estadoexp = $ff['Estado'];
 
 
 
 }
 
 



$Fecha= date('d-m-Y');
$Ho= date('H:i:s');

$hr = $Ho-1;
$Hora= date('i:s');


     $para = $correosolic; 
     $nombre = $nombresolic;
	 $asunto = "Finalizacion de expedinte # $cc";
	 $mensaje = "Estimado(a), $nombresolic $apellidosolic 
	
	Gusto en saludarle,
	
	Por este medio le informo que el dia de hoy  $Fecha siendo  $hr:$Hora hrs
	mi persona $nombrereb $apellidoreb de $dependenciareb 
	dio como finalizado el  expediente No. $cor  
	
	Para verificar el expediente ingrese al siguiente link
	http://128.5.101.78:8080/
	
	Saludos.
	

	
	";
	$de = "$nombrereb".$apellidoreb." ".$correoreb;
	
	
//	$headers = "MIME-version:1.0;\r\n";
//	$headers .= "Content-type: text/html; \r\n charset=iso-8859-1; \r\n";
//	$headers .= "From: $de \r\n";
//	$headers .= "To: $para; \r\n subject:$asunto \r\n";
	
	
	$headers = 'From: ' .$de. "\r\n" .
    'Reply-To: admin@dayshare.local' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

   //if( mail($para, $titulo, $mensaje, $cabeceras))
	
	
	if(mail($para,$asunto,$mensaje,"De: admin@dayshare.local \ r \ nX-Mailer: PHP"))
		echo "enviado correctamente";
		
	else
		echo "Fallo en envio";
		
	//fin correo
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
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
		

  $sqlz3 = "update movimiento  set id_estado = 1  where  Id_expediente = '$cc'";
sqlsrv_query($conn,$sqlz3 ) ; 
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}


  $sqlz2 = "insert into movimiento ( id_expediente,id_usuario, id_estado,id_dependencia,usuario_recibe,fecha_traslado,comentarios,id_recibido ) values ('$cc','$uen','3','$depc2','$uen',GETDATE(),'$te',20)";
sqlsrv_query($conn,$sqlz2 ) ; 
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}



 $sqlz3 = "update expediente set id_estado ='3'  where  Id_expediente = '$cc'";
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
