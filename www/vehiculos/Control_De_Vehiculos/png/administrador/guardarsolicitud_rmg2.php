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

	$Id_empresa= $_REQUEST['Id_empresa'];
	$id_solicitud= $_REQUEST['id_solicitud'];
	
	
	
	
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
		
				
	   $sql ="insert into dbo.expediente (Id_empresa,id_solicitud,preingreso,id_usuario)
	   values ('$Id_empresa','$id_solicitud','1','$uen')";

			 sqlsrv_query($conn,$sql ) or die (sqlsrv_errors()); 
		
			
			//echo "<h2>DATO GUARDATO </h2>";


		$query3 = "select max(id_expediente) as aj from expediente";
		  $stmt= sqlsrv_query($conn,$query3 ) or die (sqlsrv_errors()); 
		  $roe= sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
   
            // echo $roe['aj']."<br />";
			 	
                    $expd = $roe['aj'];
				    
			//	echo "id_expediente  ",  $expd, "<br>";
				
				
			//	echo " hola hola ", $doc, "<br>";

	
   		   
			   
             echo 
"

<center><h1 estilo1><img src='images/check.png' height='100' width='100' alt='Botón' /> <p id='texto'> El Preingreso de Su expediente a sido guardado satisfactorio, su correlativo es : </p>
<p id='texto'> SG-$expd-$año  </h1></center>

<br></br>


 <table width='350' border='0' align='center'	>

  
   <tr>
    <td><a href='ingreso_rpi.php'><img src='images/maletin.png' height='100' width='100' alt='Botón' /> </a></td>
	<td	> <a href='ingreso_rgm.php'> 	<h2 id='titulo'>¿Desea ingresar otro Expediente? </h2></td></a>
    
  </tr>
</table>";	


}//fin de if validacion archivo
