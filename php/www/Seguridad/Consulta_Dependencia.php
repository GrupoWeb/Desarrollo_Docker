<?php 
//iniciamos la sesion
session_start();
//agregamos la conexion de la base de datos
require 'Conexiones/conexion.php';
//le indicamos que si la secion es diferente al id del usuario logueado nos redireccione hacia el login.php
if(!isset($_SESSION['username']))
{ header("location: error.html");}
//asignamos la sesion a la variable idusuario
$idusuario=$_SESSION['username'];
header('Content-Type: text/html; charset=ISO-8859-1');
 ?>

<!DOCTYPE html>
<html>
<head>



<title>Page Title</title>
</head>
<body>

<table id="mit" cellspacing="0" width="100%">
    <thead>
      <tr>
	  <th>#</th>
        <th>Nombre Dependencia</th>

      </tr>
    </thead>
    <tbody>
	
                    <?php
require 'Conexiones/conexion.php';
$sql="select id_dependencia, nombre_dependencia
from dependencia;";
$res=  sqlsrv_query($conn, $sql);
while ($reg = sqlsrv_fetch_array( $res, SQLSRV_FETCH_NUMERIC))
{
?>
	
                    <tr>
						<td><?=$reg[0];?></td>
                        <td><?=$reg[1];?></td>

                          

                    </tr>
                   <?php
                   }
                   ?>
    </tbody>
  </table>
  <script>
  $(document).ready(function(){
    $('#mit').DataTable( {
        "language": {
            "url": "json/Spanish.json"
        }
    } );
                
});
  </script>
</body>
</html>
    

