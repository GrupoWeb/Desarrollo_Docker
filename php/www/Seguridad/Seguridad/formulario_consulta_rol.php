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

 
  <link rel="stylesheet" type="text/css" href="media/css/jquery.dataTables.min.css">

  <script src="js/jquery.js"></script>
  <script src="media/js/jquery.dataTables.min.js"></script>



<title>Page Title</title>
</head>
<body>

<table id="mit" cellspacing="0" width="100%">
    <thead>
      <tr>
	  <th>#</th>
        <th>ROL</th>
        <th>Sistema</th>
		<th>Editar</th>
		<th>Eliminar</th>
      </tr>
    </thead>
    <tbody>
	
      <?php
                    require 'Conexiones/conexion.php';
                    $sql="select id_rol, Nombre_rol, Nombre_sys from
                    Trol as trl inner join Tsistema as sstm on trl.id_sistema=sstm.id_sistema where trl.estado=1 ";
                    $res=  sqlsrv_query($conn, $sql);
                    while ($reg = sqlsrv_fetch_array( $res, SQLSRV_FETCH_NUMERIC))
                    {
      ?>
	
                    <tr>
						<td><?=$reg[0];?></td>
            <td><?=$reg[1];?></td>
						<td><?=$reg[2];?></td>
                        
                        
                                                <td>

                            <a href="javascript:void(0) "
                               onClick="window.location=
                               'formulario_update_rol.php?id=<?= $reg[0];?>';"
                             class="glyphicon glyphicon-pencil" ></a>
                                                      </td>
                        
                        

                                                      <td>
                            <a href="javascript:void(0)"
                               onClick="window.location=
                               ('php_fucntion/delrol.php?id=<?= $reg[0];?>');"
                               
                             class="glyphicon glyphicon-trash" ></a>
                                                      </td>
                          

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
    

