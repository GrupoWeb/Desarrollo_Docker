<?
session_start();

include('../conexion/conexion.php');

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
<style>

#texto
{font-family:"Segoe UI";
font-size:24px;
}

#titulo
{font-family:"Segoe UI";
font-size:18px;
}


</style>

<html>
<body bgcolor="#F2F2F2">


<?

	
/*$fecha= date("Y-m-d ");
$hora= date("H:i:s",time()-3600);*/


	

//echo "comentario      ",$coment,"<br>";
//echo "id_usuario      ",$usuarip,"<br>";
//echo "id_empresa      ", $emp, "<br>";
//echo "id_dependencia  ", $dept, "<br>";
//echo "id_estado       ",  $estab, "<br>";
//echo "id_solicitud    ", $solic, "<br>";
//echo "rut adjunto:     ", $envi, "<br>";

	if($_POST){

	$a= $_REQUEST['coment'];
	$b= $_REQUEST['usuarip'];
	$c= $_REQUEST['emp'];
	$d= $_REQUEST['dept'];
	$e= $_REQUEST['estab'];
	$g= $_REQUEST['solic'];
	$m= $_REQUEST['fo2'];
	$ni= $_REQUEST['nits'];
	$envi=$_REQUEST['uen'];
	$tipdoc=$_REQUEST['tipdoc'];
	
	

	
		   
		    $nombre_archivo = $HTTP_POST_FILES['userfile']['name'];
	$tipo_archivo = $HTTP_POST_FILES['userfile']['type'];
	$tamano_archivo = $HTTP_POST_FILES['userfile']['size'];	

	
	if (strlen($userfile)==0)
	{
	 echo 
"
<center><h1 estilo1 id='texto'><img src='images/error.png' height='100' width='100' alt='Botón' /> No a ingresado el domumento adjunto, el campo es requerido </h1></center>
<br></br>
 <table width='350' border='0' align='center'	>
  
   <tr>
    <td><a href='ingreso_rpi.php'><img src='images/maletin.png' height='100' width='100' alt='Botón' /> </a></td>
	<td	> <a href='ingreso_rpi.php'> 	<h2 id='titulo'> Ingrese Nuevamente el Expediente</h2></td></a>
    
  </tr>
</table>";	
	
}
else
{



   


if($tipo_archivo ===  'application/x-msdownload' || $tipo_archivo ===  'audio/mp3'|| $tipo_archivo==='video/mp4' || $tipo_archivo==='application/octet-stream')
	
	{
	
	 echo 
"
<center><h1 estilo1 id='texto'><img src='images/error_button.png' height='100' width='100' alt='Botón' /> Formatos no validos .exe .mp3 .mp4 y .rar </h1></center>
<br></br>
 <table width='350' border='0' align='center'	>
  
   <tr>
    <td><a href='ingreso_rpi.php'><img src='images/images.jpg' height='100' width='100' alt='Botón' /> </a></td>
	<td	> <a href='ingreso_rpi.php'> 	<h2 id='titulo'> Ingrese nuevamente el Expediente</h2></td></a>
    
  </tr>
</table>";	
	
	 
	 } //fin if validacion de formatos adjuntos
	 else 
	{
	

	$tmpfile = "../upload/".date("d").date("m").date("Y").date("H").date("i").date("s")."_".$nombre_archivo;
	
	
	$query =  "insert into documento (direccion,Descripcion,id_usuario,fechaad,nombrearchivo,tipoexpediente,id_documentoudaf) values ('$tmpfile','$a','$b',GETDATE(),'$nombre_archivo',1,1)";
   $row= sqlsrv_query($conn,$query ) or die (sqlsrv_errors()); 
	
	
	if (strlen($userfile)>0)
	{
	 	move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'],$tmpfile);
	
	}
			
	
	   	$query2 = "select max(id_documento) as ar from documento";
		  $stmt= sqlsrv_query($conn,$query2 ) or die (sqlsrv_errors()); 
		  $ro= sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
   
           $ro['ar']."<br />";
			// 	echo "<h2>ADJUNTO GUARDADO </h2>";

        

               $doc = $ro['ar'];
					//	echo "id_documento", $doc, "<br>";
		
		//agrega el correlatico SG-XX-2015
		
			$query2 = "select max(id_expediente) as ar from dbo.expediente";
		  $stmt= sqlsrv_query($conn,$query2 ) or die (sqlsrv_errors()); 
		  $numexp= sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
   
           $numexp['ar']."<br />";
			//  toma el valor del select y se le suma un 1
                   $idd = $numexp['ar'];
				   $idcorr = $idd +1 ;
				   
				   $Fecha= date('d-m-Y');
				   $año = date ('Y');
				   
		$idindex = 'SG'."-".$idcorr."-".$año; 
				   
				
        //fin de toma de correlativo las letas SG y el año son automaticas 
				
	   $sql ="insert into dbo.expediente (fecha_ingreso,comentario,id_usuario,id_empresa,id_dependencia,id_estado,id_documento,id_solicitud,folio,numerodenit,id_solicitante,id_ingreso,id_correlativoftp,id_recibido ) 
	   values (GETDATE(), '$a','$b','$c','$d','1',' $doc','$g','$m','$ni','$uen','5','$idindex',20)";

			 sqlsrv_query($conn,$sql ) or die (sqlsrv_errors()); 
		
			
			//echo "<h2>DATO GUARDATO </h2>";


		$query3 = "select max(id_expediente) as aj from expediente";
		  $stmt= sqlsrv_query($conn,$query3 ) or die (sqlsrv_errors()); 
		  $roe= sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
   
            // echo $roe['aj']."<br />";
			 	
                    $expd = $roe['aj'];
				    
			//	echo "id_expediente  ",  $expd, "<br>";
				
				
			//	echo " hola hola ", $doc, "<br>";

	
   		   	$query5 =  "update documento set id_expediente ='$expd'  where  id_documento = '$doc'";
   $roer= sqlsrv_query($conn,$query5 ) or die (sqlsrv_errors());
			   
             echo 
"

<center><h1 estilo1><img src='images/check.png' height='100' width='100' alt='Botón' /> <p id='texto'> Su expediente a sido guardado satisfactorio, su correlativo es : </p>
<p id='texto'> SG-$expd-$año  </h1></center>

<br></br>


 <table width='350' border='0' align='center'	>

  
   <tr>
    <td><a href='ingreso_rpi.php'><img src='images/maletin.png' height='100' width='100' alt='Botón' /> </a></td>
	<td	> <a href='ingreso_rpi.php'> 	<h2 id='titulo'>¿Desea ingresar otro Expediente? </h2></td></a>
    
  </tr>
</table>";	


}//fin de if validacion archivo
}	
}//fin de if post

$sql="select correo,nombre,apellido  from usuario where activo= 1 and id_usuario='$b'";
		$stmt = sqlsrv_query( $conn, $sql );
	
	 while( $fila = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){ 
 $cor= $fila['correo']; 
 $nombr=     $fila['nombre']; 
 $ape=     $fila['apellido'];

}


//envio de correo 


		$sql="select correo,nombre,apellido  from usuario where activo= 1 and id_usuario='$uen'";
		$stmt = sqlsrv_query( $conn, $sql );
	
	 while( $fila = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){ 
 $correo= $fila['correo']; 
 $nombre=     $fila['nombre']; 
 $apellido=     $fila['apellido'];

}


    $para = $cor; 
     $nombre = $nom;
	 $asunto = "Revisar expediente No. SG-$expd-$año";
	 $mensaje = "Estimado $nombr $ape
	
	Gusto en saludarle,
	Por este medio se le informa que se le a sigo asignado el expediente No. SG-$expd-$año para su revisión. 
	
	Para verificar el expediente asignado por $nom $ap ingrese al siguiente link
	http://128.5.101.78:8080/
	
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