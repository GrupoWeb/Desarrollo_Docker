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
  $correo=$row["correo"]; 
}
sqlsrv_free_stmt( $stmt);	


 while($row) 
	   {
	    $date = ($row["Fecha_ingreso"]);
	    $ex=($row["idf"]); 
		
       }
  	$cor=$_REQUEST["ex"];
	
	  $año = date ('Y');
	
  echo " EXPEDIENTE NO.  DF-",$cor,"-",$año,"<br>";
  
  $k=$cor;
  
  
  
  $sqlls=" update dbo.expediente_udaf set id_recibido = 19  where Id_expedienteudaf = '$k'";
		sqlsrv_query($conn,$sqlls ) ; 
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}
  
  
  
 				// envio de correo al abrir la notifiacion.



		$sqlls="	 select expt.Id_expedienteudaf, expt.id_solicitante, usert.nombre, usert.apellido, usert.correo,
	 sur.nombre as nom, sur.apellido as apell, sur.correo as corr, depen.Nombre_dependencia 
	  from expedienteudaf as expt inner join
	  usuario as usert on expt.id_solicitante = usert.id_usuario inner join  usuario as sur on 
	  expt.Id_usuario = sur.id_usuario inner join dependencia as depen on depen.id_dependencia = sur.id_dependencia   where expt.Id_expedienteudaf = '$cor'	";
		$stmtss = sqlsrv_query( $conn, $sqlls);
	
	 while( $ff = sqlsrv_fetch_array( $stmtss, SQLSRV_FETCH_ASSOC) ){ 
 
 //informacino del usuario que envio el expediente
 $correosolic= $ff['correo']; 
 $nombresolic=     $ff['nombre']; 
 $apellidosolic=     $ff['apellido'];
  //informacino del usuario que recibio el correo 
 $correoreb= $ff['corr']; 
 $nombrereb=     $ff['nom']; 
 $apellidoreb=     $ff['apell'];
 $dependenciareb = $ff ['Nombre_dependencia'];
 
}

$Fecha = date('d-m-Y');
$Ho= date('H:i:s');

$hr = $Ho-1;
$Hora= date('i:s');


    $para = $correosolic; 
     $nombre = $nombresolic;
	 $asunto = "Revision de expedinte No. DF-$cor-$año";
	 $mensaje = "Estimado(a), $nombresolic $apellidosolic 
	
	Gusto en saludarle,
	
	Por este medio le informo que el dia $Fecha  siendo  $hr:$Hora hrs
	mi persona $nombrereb $apellidoreb de $dependenciareb 
	ha recibido el expediente NO. DF-$cor-$año 
	

	
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
	
	
	mail($para,$asunto,$mensaje,"De: admin@dayshare.local \ r \ nX-Mailer: PHP")

  
  
  








  
  
  
  
  
  
  
  ?>