<?header('Content-Type: text/html; charset=ISO-8859-1');?>
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
        <th>Nombre</th>
        <th>Apellido Paterno</th>
		<th>Apellido Materno</th>
        <th>Usuario</th>
        <th>Dependencia</th>
		<th>Editar</th>
		<th>Eliminar</th>
      </tr>
    </thead>
    <tbody>
	
                    <?php
					
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
						            <td><?=$reg[10];?></td>
                        
                        
                                                <td>
                            <a href="javascript:void(0) "
                               onClick="window.location=
                               'formulario_update_usu.php?id=<?= $reg[0];?>';"
                           class="glyphicon glyphicon-pencil"
                                                      </td>
                        
                        

                                                      <td>
                            <a href="javascript:void(0)"
                               onClick="window.location=
                               ('php_fucntion/delusu.php?id=<?= $reg[0];?>');"
                               
                            class="glyphicon glyphicon-trash"
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
    

