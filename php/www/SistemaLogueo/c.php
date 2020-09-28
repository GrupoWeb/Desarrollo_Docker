  <?php
  
  $sql="select list.id_usu, enlace.ruta_sistema, enlace.nombre_sys, tr.nombre_link
from Tasignacion as list 
inner join Tsistema as enlace  on 
enlace.id_sistema=list.id_link inner join Tlinks as tr on tr.id_link=list.id_link where list.id_usu=$idusuario";

$resultado=sqlsrv_query($conn, $sql);

while( $row = sqlsrv_fetch_array( $resultado, SQLSRV_FETCH_ASSOC) ) {?>




    </div>
	
<?php }?>