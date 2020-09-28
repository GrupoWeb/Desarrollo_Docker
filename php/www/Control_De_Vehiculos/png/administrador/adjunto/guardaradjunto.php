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
//echo "descripcion       ",$adjdes, "<br>";
//echo "adj       ",$userfile, "<br>";
//echo "correlativo     ",$cmd, "<br>";	


		if($_POST){

	$ab= $_REQUEST['adjdes'];
	
	$ac= $_REQUEST['cmd'];
//	$ae= $_REQUEST['dept'];
//	$e= $_REQUEST['estab'];
//	$g= $_REQUEST['solic'];


  
		    $nombre_archivo = $HTTP_POST_FILES['userfile']['name'];
	$tipo_archivo = $HTTP_POST_FILES['userfile']['type'];
	   $extension = split('[.]',$nombre_archivo);
		$extension = $extension[sizeof($extension)-1];
	$tamano_archivo = $HTTP_POST_FILES['userfile']['size'];

	//echo "tipo de archivo     ",$tipo_archivo, "<br>";
	if (strlen($userfile)==0)
	{
	 echo 
"
<center><h1 estilo1><img src='images/error_button.png' height='100' width='100' alt='Botón' /> No a ingresado domumento adjunto el campo es requerido </h1></center>
<br></br>
 <table width='350' border='0' align='center'	>
  
  
  
    <td><a href='../versolicitud/versolicitud.php?ex=$cmd'><img src='images/images.jpg' height='100' width='100' alt='Botón' /> </a></td>
	<td	> <a href='../versolicitud/versolicitud.php?ex=$cmd'> 	<h2> Regreso a expediente</h2></td></a>
    
  </tr>	
</table>";	
}

else
{
	if($tipo_archivo ===  'application/x-msdownload' || $tipo_archivo ===  'audio/mp3'|| $tipo_archivo==='video/mp4' || $tipo_archivo==='application/octet-stream')
	
	{
	
	 echo 
"
<center><h1 estilo1><img src='images/error_button.png' height='100' width='100' alt='Botón' /> Formatos no validos .exe .mp3 .mp4 y .rar </h1></center>
<br></br>
 <table width='350' border='0' align='center'	>
 
    <td><a href='../versolicitud/versolicitud.php?ex=$cmd'><img src='images/images.jpg' height='100' width='100' alt='Botón' /> </a></td>
	<td	> <a href='../versolicitud/versolicitud.php?ex=$cmd'> 	<h2> Regreso a expediente</h2></td></a>
    
  </tr>
  
</table>";	
	
	 
	 } //fin if validacion de formatos adjuntos
	 else 
	{
	
	 
	 $sqlz1 = " select id_usuario from expediente where Id_expediente = '$ac' ";
$stmt = sqlsrv_query( $conn, $sqlz1 );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}
 $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ;
	
//	print " usuario ant".$row["id_usuario"]."<br>"; 
	//print " estado ant".$row["id_estado"]."<br>"; 
	$adj=$row["id_usuario"];


   	$tmpfile = "../../../upload".date("d").date("m").date("Y").date("H").date("i").date("s")."_".$nombre_archivo;
	
	
	$query =  "insert into documento (direccion,id_expediente,Descripcion,id_usuario,fechaad,nombrearchivo) values ('$tmpfile','$ac','$ab','$uen',GETDATE(),'$nombre_archivo')";
   $row= sqlsrv_query($conn,$query ) or die (sqlsrv_errors()); 
	
		if (strlen($userfile)>0)
	{
		move_uploaded_file($_FILES['userfile']['tmp_name'],$tmpfile);
	}
	
	



echo 
"
<center><h1 estilo1><img src='images/check.jpg' height='100' width='100' alt='Botón' /> Adjunto Guardado Satisfactoriamente </h1></center>
<br></br>
 <table width='350' border='0' align='center'	>
  <tr>
    <td><a href='../versolicitud/versolicitud.php?ex=$cmd'><img src='images/images.jpg' height='100' width='100' alt='Botón' /> </a></td>
	<td	> <a href='../versolicitud/versolicitud.php?ex=$cmd'> 	<h2> Regreso a expediente</h2></td></a>
    
  </tr>
</table>";	
	 }//fin de if validacion archivo
	
}//fin if post
}
?>


</body>
</html>

