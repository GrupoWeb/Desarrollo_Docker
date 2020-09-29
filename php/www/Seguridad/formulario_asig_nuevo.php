<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/acordeon.css">
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
        <th>Nombre</th>
        <th>Apellido Paterno</th>
		<th>Apellido Materno</th>
        <th>Usuario</th>
        <th>Dependencia</th>
		<th>Asinar Roles y Permisos</th>
      </tr>
    </thead>
    <tbody>
	
                    <?php
					//header('Content-Type: text/html; charset=ISO-8859-1');
require 'Conexiones/conexion.php';
$sql="select id_usu, nombre1, nombre2, apellidop, apellidom, usuario, nombre_dependencia 
from Tusuario as usu  inner join dependencia as dep on usu.id_dependencia=dep.id_dependencia where usu.estado=1 ";
$res=  sqlsrv_query($conn, $sql);
while ($reg = sqlsrv_fetch_array( $res, SQLSRV_FETCH_NUMERIC))
{
?>
	
                    <tr>
                        <td><?=$reg[0];?></td>
                       
                        <td><?=$reg[1];?></td>
						<td><?=$reg[3];?></td>
						<td><?=$reg[4];?></td>
						<td><?=$reg[5];?></td>
						<td><?=$reg[6];?></td>
                        
                        
                                                <td>
                            <a href="javascript:void(0) "
                               onClick="window.location=
                               'formulario_asignacion.php?id=<?= $reg[0];?>';"
                            class="glyphicon glyphicon-pencil"
                                                      </td>
                          

                    </tr>
                   <?php
                   }
                   ?>
    </tbody>
  </table>
  <script>
  $(document).ready(function(){
    $('#mit').DataTable();
                
});
  </script>
</body>
</html>
    

