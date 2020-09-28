
<?php
include('conexion.php');

$sql="select list.id_rol, enlace.nombre_link
from Tasignacion as list 
inner join Tlinks as enlace on 
enlace.id_link=list.id_link where list.id_rol=1 and id_usu=1";
    $resultado=sqlsrv_query($conn, $sql);
    if( $resultado === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $resultado, SQLSRV_FETCH_ASSOC) ) {

	
  ?>
<li><?echo $row['nombre_link'];?></li><br>
<a href="html_images.asp">HTML Images</a>
<?php }?>