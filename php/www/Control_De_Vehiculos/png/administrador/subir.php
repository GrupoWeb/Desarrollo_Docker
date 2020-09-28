<?php
//conexion a la base de datos
//mysql_connect("servidor", "usuario", "contrasena") or die(mysql_error()) ;
//mysql_select_db("base_de_datos") or die(mysql_error()) ;


$serverName = "JOHNPORTATIL\desarrollo";
$connectionInfo = array( "Database"=>"ciente", "UID"=>"sa", "PWD"=>"abc123");
$conn = sqlsrv_connect( $serverName, $connectionInfo );
if( $conn === false ) {
    die( print_r( sqlsrv_errors(), true));
}

echo "comentario      ",$userfile,"<br>";

if($_POST){
	

 
 
   $nombre_archivo = $HTTP_POST_FILES['userfile']['name'];
	$tipo_archivo = $HTTP_POST_FILES['userfile']['type'];
	$tamano_archivo = $HTTP_POST_FILES['userfile']['size'];

	

	$tmpfile = "upload/".date("d").date("m").date("Y").date("H").date("i").date("s")."_".$nombre_archivo;
	
	

	
	$query =  "insert into documento (direccion) values ( '$tmpfile')";
   $row= sqlsrv_query($conn,$query ) or die (sqlsrv_errors()); 
	
	if (strlen($userfile)>0)
	{
		move_uploaded_file($_FILES['userfile']['tmp_name'],$tmpfile);
	}
			
	
	   	$query2 = "select max(id_documento) as ar from documento";
		  $stmt= sqlsrv_query($conn,$query2 ) or die (sqlsrv_errors()); 
		  $ro= sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
   
             echo $ro['ar']."<br />";

}
?>
