

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>
<CENTER>
<body>

<table width="527" border="1" align="center">
  <tr>
    <td>Nombre</td>
    <td>Usuario</td>
    <td>Editar</td>
    <td>Eliminar</td>
    <td>Borrar Contraseña</td>
  </tr>



<?
include('../../conexion/conexion.php');


        $nomb= $_POST['nombre1'];
        $apel= $_POST['apellido1'];



    
   
   if ($nomb == ""  && $apel== "" )
   
   {
   
   	$sql = "select  top 5 nombre, apellido, usuario, id_usuario from dbo.usuario where  activo = 1";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
  
  //echo	  "hola".$row["nombre"]."  ".$row["apellido"]."</option>";
  
  $usp=($row["id_usuario"]); 
        $user=$usp;      
			
      		echo "<tr><td>".$row["nombre"]." ".$row["apellido"]."</td> ";	   
			echo "<td>".$row["usuario"]."</td> ";
			echo "<td> <a href='edit.php?user2=$user' > <img src='imagenes/editarusuario.jpg' width='54' height='52'>";
			echo "<td>  <a href='deleteus.php?user2=$user' >  <img src='imagenes/eliminarusuario.jpg' width='54' 	height='52'> ";
			echo "<td>  <a href='pass.php?user2=$user' >  <img src='imagenes/contraseñaus.png' width='54' height='52'> </td> </tr>";
 }
sqlsrv_free_stmt( $stmt);	

  }
  
  
     if ($nomb != ""  && $apel== "" )
   
   {
   
   	$sql = "select  * from dbo.usuario where nombre like '%$nomb%' COLLATE Traditional_Spanish_ci_ai and activo = 1";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
  
  //echo	  "hola".$row["nombre"]."  ".$row["apellido"]."</option>"; 
			
  $usp=($row["id_usuario"]); 
        $user=$usp;      
			
      		echo "<tr><td>".$row["nombre"]." ".$row["apellido"]."</td> ";	   
			echo "<td>".$row["usuario"]."</td> ";
			echo "<td> <a href='edit.php?user2=$user' > <img src='imagenes/editarusuario.jpg' width='54' height='52'>";
			echo "<td>  <a href='deleteus.php?user2=$user' >  <img src='imagenes/eliminarusuario.jpg' width='54' 	height='52'> ";
			echo "<td>  <a href='pass.php?user2=$user' >  <img src='imagenes/contraseñaus.png' width='54' height='52'> </td> </tr>";
 }
sqlsrv_free_stmt( $stmt);	

  }
  
  
       if ($nomb == ""  && $apel != "" )
   
   {
   
   	$sql = "select  * from dbo.usuario where apellido like '%$apel%' COLLATE Traditional_Spanish_ci_ai and activo = 1 ";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
  
  //echo	  "hola".$row["nombre"]."  ".$row["apellido"]."</option>"; 
			
  $usp=($row["id_usuario"]); 
        $user=$usp;      
			
      		echo "<tr><td>".$row["nombre"]." ".$row["apellido"]."</td> ";	   
			echo "<td>".$row["usuario"]."</td> ";
			echo "<td> <a href='edit.php?user2=$user' > <img src='imagenes/editarusuario.jpg' width='54' height='52'>";
			echo "<td>  <a href='deleteus.php?user2=$user' >  <img src='imagenes/eliminarusuario.jpg' width='54' 	height='52'> ";
			echo "<td>  <a href='pass.php?user2=$user' >  <img src='imagenes/contraseñaus.png' width='54' height='52'> </td> </tr>";
 }
sqlsrv_free_stmt( $stmt);	

  }


       if ($nomb != ""  && $apel != "" )
   
   {
   
   	$sql = "select  * from dbo.usuario where apellido like '%$apel%' COLLATE Traditional_Spanish_ci_ai  and  nombre like '%$nomb%' COLLATE Traditional_Spanish_ci_ai and activo = 1 ";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
  
  //echo	  "hola".$row["nombre"]."  ".$row["apellido"]."</option>"; 
			
  $usp=($row["id_usuario"]); 
        $user=$usp;      
			
      		echo "<tr><td>".$row["nombre"]." ".$row["apellido"]."</td> ";	   
			echo "<td>".$row["usuario"]."</td> ";
			echo "<td> <a href='edit.php?user2=$user' > <img src='imagenes/editarusuario.jpg' width='54' height='52'>";
			echo "<td>  <a href='deleteus.php?user2=$user' >  <img src='imagenes/eliminarusuario.jpg' width='54' 	height='52'> ";
			echo "<td>  <a href='pass.php?user2=$user' >  <img src='imagenes/contraseñaus.png' width='54' height='52'> </td> </tr>";
 }
sqlsrv_free_stmt( $stmt);	

  }







   
    
  
  
  



?>

<style>
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
</style>
</body>
</html>
