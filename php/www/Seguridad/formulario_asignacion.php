<?php 
//iniciamos la sesion
session_start();
//agregamos la conexion de la base de datos
require('conexion.php');
//le indicamos que si la secion es diferente al id del usuario logueado nos redireccione hacia el login.php
if(!isset($_SESSION['username']))
{ header("location: login.php");}
//asignamos la sesion a la variable idusuario
$idusuario=$_SESSION['username'];
 ?>
 
 <style>
     select{
         padding-left: 5px;
     }
 select option {
    margin:40px;
    background: rgba(20, 53, 96, 0.9);
    color:#fff;
    text-shadow:0 1px 0 rgba(0,0,0,0.4);
     
}
     form{
         padding-left: 5px;
         padding-right: 5px;
     }
 </style>
 <a href="index.php">inicio</a>
<hr>

<?php
                      require_once ("Conexiones/conexion.php");
                      
                      $sql = "select *from Tusuario where id_usu=" . $_GET["id"] . "";
						          $resulset=sqlsrv_query($conn, $sql);
                      if( $reg =  sqlsrv_fetch_array( $resulset, SQLSRV_FETCH_ASSOC)) {
?>
									
								        <p>
                          <b>
                            <?php echo $reg['nombre1'];?>
                            <?php echo $reg['nombre2'];?> 
                            <?php echo $reg['apellidop'];?>  
                            <?php echo $reg['apellidom'];?>
                          </b>
                        </p>
							
<?php }
		sqlsrv_close($conn);
?>



  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/acordeon.css">
  <link rel="stylesheet" type="text/css" href="media/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">

<p>Seleccione un sistema</p>
<div>

      <?php 
            require 'Conexiones/conexion.php';
      		  $sql="select * from tsistema where estado=1;";
      		  $stmt=sqlsrv_query($conn,$sql);
      ?>
     <!--        principal-->
      <div class="row" >
           <!--        sistema-->
           <form name="form1" action="php_fucntion/validar_asignacion.php" method="POST" >
            <div class="col-sm-3" >
                    
    		      <input type="hidden" name="idu" value="<?php echo $idusu=$reg['id_usu'];?>">
    		      <input type="hidden" name="usuarip" value="<?php echo $_SESSION['usuarip'];?>">
                    <select  class="form-control" name="dept" id="" onChange="from(document.form1.dept.value,'usuarip','usuarios.php')" >
                      <option value="<?php echo $fila['id_sistema']?>">-Seleccione-</option>
                      <?php while( $fila = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){ ?>
                      <option value="<?php echo $fila['id_sistema']?>"><?php echo $fila['Nombre_sys']?></option>
                      <?php }?>
                    </select>
                    
            </div>
            <div class="col-sm-3" style="background-color:bluesky;">
                  <select class="form-control" select name="usuarip"  id="usuarip" required="required" onChange="from(document.form1.usuarip.value,'per','Permisos.php')" >
                    <option value="<?php echo $fila['id_rol']?>">-Seleccione uno-</option>	
      	                <?php while( $fila = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){ ?>
      	                       <option value="<?php echo $fila['id_rol']?>"><?php echo $fila['Nombre_rol']?></option>
                        <?php }?>
                  </select>		
            </div>
            <div class="col-sm-3" style="background-color:bluesky;">
                  <select class="form-control" select name="Permisos" id="per" required="required" onChange="from(document.form1.Permisos.value,'fun','funcion.php')" >
                    <option value="<?php echo $fila['id_tlink']?>">-Seleccione-</option>	
    	                    <?php while( $fila = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){ ?>
    	                         <option value="<?php echo $fila['id_tlink']?>"><?php echo $fila['tipo_enlace']?></option>
                          <?php }?>
                  </select>		
            </div>
            <div class="col-sm-3" style="background-color:bluesky;">
                  <select class="form-control" name="funcion"  id="fun" required="required">
                      <option value="<?php echo $fila['id_link']?>">-Seleccione-</option>	
    	                  <?php while( $fila = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){ ?>
    	                       <option value="<?php echo $fila['id_link']?>"><?php echo $fila['Nombre_lk']?></option>
                        <?php }?>
                  </select>		
            </div>

<!-- </li>

</li>

</li> -->
   
	  <br>	
	  <br>
	  <br>
	  <select name="estado">
              <option value=1>activo</option>
              <option value=2>No Activo</option>
      </select>
	  <br>
	  <br>
      <button  type="submit">Asignar</button>
     </form>
      </div>
</div>
<br>
<br>




<table id="mit" cellspacing="0" width="100%" >
    <thead>
      <tr>
        <th>Usuario</th>
        <th>Sistema</th>
        <th>Rol</th>
		<th>Nombre del permiso</th>
        <th>Categoria del Permiso</th>
        <th>Eliminar</th>
      </tr>
    </thead>
    <tbody>

	<!-- $idusu -->
                    <?php
require 'Conexiones/conexion.php';
$sql="select  usu.usuario, gt.Nombre_sys, tl.Nombre_rol,  ss.Nombre_lk, tlk.tipo_enlace, id_asignacion, usu.id_usu
from Tasignacion as enlace inner join Tlinks as ss 
on enlace.id_link=ss.id_link inner join Trol as tl on tl.id_rol=enlace.id_rol inner join Tusuario as usu 
on usu.id_usu=enlace.id_usu inner join Tsistema as gt 
on gt.id_sistema=enlace.id_sistema inner join tipo_link as tlk on tlk.id_tlink=enlace.id_tlink where usu.id_usu= $idusu and enlace.estado=1;";
// $idusu = 4;
//echo $idusu;
$res=  sqlsrv_query($conn, $sql);
while ($reg = sqlsrv_fetch_array( $res, SQLSRV_FETCH_NUMERIC))
{
?>
	
                    <tr>
                        <td><?=$reg[0];?></td>
                       
                        <td><?=$reg[1];?></td>
						<td><?=$reg[2];?></td>
						<td><?=$reg[3];?></td>
						<td><?=$reg[4];?></td>
                        
                        
                                                
                                                      <td>
                            <a href="javascript:void(0)"
                               onClick="window.location=
                               ('php_fucntion/delasig.php?asg=<?=$reg[5];?>&id=<?=$reg[6];?>');"
                               
                               class="glyphicon glyphicon-trash"></a>
                                                      </td>
                          

                    </tr>
                   <?php
                   }
                   ?>
    </tbody>
  </table>
  <script src="js/jquery.js"></script>
  <script src="media/js/jquery.dataTables.min.js"></script>
  <script>
  $(document).ready(function(){
    $('#mit').DataTable( {
        "language": {
            "url": "json/Spanish.json"
        }
    } );
                
});

  </script>
  <script>
  function obtiene_http_request()
{
var req = false;
try
  {
    req = new XMLHttpRequest(); /* p.e. Firefox */
  }
catch(err1)
  {
  try
    {
     req = new ActiveXObject("Msxml2.XMLHTTP");
  /* algunas versiones IE */
    }
  catch(err2)
    {
    try
      {
       req = new ActiveXObject("Microsoft.XMLHTTP");
  /* algunas versiones IE */
      }
      catch(err3)
        {
         req = false;
        }
    }
  }
return req;
}
var miPeticion = obtiene_http_request();
//***************************************************************************************
function from(id,ide,url){
		var mi_aleatorio=parseInt(Math.random()*99999999);//para que no guarde la página en el caché...
		var vinculo=url+"?phpid="+id+"&rand="+mi_aleatorio;
		//alert(vinculo);
		miPeticion.open("GET",vinculo,true);//ponemos true para que la petición sea asincrónica
		miPeticion.onreadystatechange=miPeticion.onreadystatechange=function(){
               if (miPeticion.readyState==4)
               {
				   //alert(miPeticion.readyState);
                       if (miPeticion.status==200)
                       {
                                //alert(miPeticion.status);
                               //var http=miPeticion.responseXML;
                               var http=miPeticion.responseText;
                               document.getElementById(ide).innerHTML= http;

                       }
               }/*else
               {
			document.getElementById(ide).innerHTML="<img src='ima/loading.gif' title='cargando...' />";

                }*/
       }
       miPeticion.send(null);

}
//************************************************************************************************
function limpiar()
{
	document.form.reset();
	
}


</script>