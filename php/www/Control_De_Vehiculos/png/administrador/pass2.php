	

<?
error_reporting(0);
include('../conexion/conexion.php');

$pas=$_POST["password"];

//verificacion de correo

$sql="select  correo,nombre,apellido, id_usuario,usuario  from usuario where correo = '$password' and activo =1";
		$stmt = sqlsrv_query( $conn, $sql );
	
	 while( $fila = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){ 
 $cor= $fila['correo']; 
 $nombr=     $fila['nombre']; 
 $ape=     $fila['apellido'];
 $os= $fila['id_usuario'];
 $user= $fila['usuario'];
 
 
 
 	  }
	  
	  

	
	
	
	
  if ($os == "")
	  
	  echo "El correo ingresado no es valido";
	  
	  else 
	  
	  
	  echo "Su Password fue reiniciado las nuevas credenciales fueron enviadas al correo: ", $cor;
         
		     //restablece pass

               	$query5 =  "update usuario set passwordd ='$user' where  id_usuario = '$os'";
   $roer= sqlsrv_query($conn,$query5 ) or die (sqlsrv_errors());
	   
       
	   
	   
	   

	   
	   //vuelve a llamar la informacion
	   $sql="select  correo,nombre,apellido, id_usuario,usuario,passwordd  from usuario where correo = '$password' and activo =1";
		$stmt = sqlsrv_query( $conn, $sql );
	
	 while( $fila = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){ 
 $cor= $fila['correo']; 
 $nombr=     $fila['nombre']; 
 $ape=     $fila['apellido'];
 $os= $fila['id_usuario'];
 $usss= $fila['usuario'];
 $pass= $fila['passwordd'];
 
 
 	  }
	  

	   
	   
	  	   //enviar correo 

     $para = $cor; 
     $nombre = $nombr;
	 $asunto = "Reestablece Contraseña";
	 $mensaje = "Estimado $nombre , $ape
	
	Gusto en saludarle,
	Por este medio se le informa que sea reestablecido su contraseña existosamente.
    
	
	USER:     $usss
 	Password: $pass
	
	link de ingreso
	
	http://128.5.101.78:8080/
	
	si el sistema presenta errores favor de conomicarse al Departamento de Desarrollo
	
	ext. 1616 ó 1609
	
	
	Saludos.

	
	";
	$de = "expedientes@mineco.gob.gt";
	
	
//	$headers = "MIME-version:1.0;\r\n";
//	$headers .= "Content-type: text/html; \r\n charset=iso-8859-1; \r\n";
//	$headers .= "From: $de \r\n";
//	$headers .= "To: $para; \r\n subject:$asunto \r\n";
	
	
	$headers = 'From: ' .$de. "\r\n" .
    'Reply-To: admin@dayshare.local' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

   //if( mail($para, $titulo, $mensaje, $cabeceras))
	
	
	if(mail($para,$asunto,$mensaje,"De: admin@dayshare.local \ r \ nX-Mailer: PHP"))












?>

