<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<style>
.Estilo1 {font-size: xx-large}


body {font-family: Arial, Helvetica, sans-serif;}

table {     font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
    font-size: 12px;    margin: 10px;     width: 800px; text-align: center;    border-collapse: collapse; }

th {     font-size: 18px;     font-weight: normal;     padding: 8px;     background: #b9c9fe;
    border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039; }

td {    padding: 15px;     background: #e8edff;     border-bottom: 1px solid #fff;
    color: #669;    border-top: 1px solid transparent; }
	

tr:hover td { background: #d0dafd; color: #339; }
.Estilo4 {font-size: 12px}
--> 
</style
></head>

<body>




<p class="Estilo1">Eliminar Emprea  </p>
<p> 



  <?
  
include('../../conexion/conexion.php');
 while($row) 
	   {

	    $user2=($row["id_empresa"]); 
		
       }
  	$cor=$_REQUEST["user2"];
	
	
	
	
	
	
	
	$sql = "select   nombre_empresa, nits, id_empresa from dbo.empresa where id_empresa='$cor' and activo = 1";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
  

  $usp=($row["id_usuario"]); 
        $user=$usp;      
		
		
		
	echo "
	
	  <form action=''  method='post' enctype='multipart/form-data' name='form2'>
	<table width='300'  border='1'>
  <tr>
    <td>Nombre empresa:</td>
    <td>".$row["nombre_empresa"]."</td>
  </tr>
  <tr>
    <td>Nit:</td>
    <td>".$row["nits"]."</td>
  </tr>
  <tr>
    <td>Desea eliminar el usuario </td>
    <td> <select name='usde'> 
			
<option value=0>- NO -</option>; 

<option value=1>- SI -</option>; 

      </select>
	  
	  <input type='submit' value='procesar' /> 
 </td>
 
  </tr>
</table>";
			
      	
 }
sqlsrv_free_stmt( $stmt);	
 
 

 include('deleteus2.php');
 ?>
 
 
 
 
 
 


</body>
</html>
