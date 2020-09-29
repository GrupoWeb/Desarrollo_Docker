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
 ?>


	
	


<div class="col-sm-9">
<br />
<div class="container">
    <div class="col-md-3"></div>
    <div class="col-md-6">
         <div class="row myborder">
             <h4 style="color: #0d0d0d; margin: initial; margin-bottom: 10px;">Nueva Dependencia</h4><hr>
				<form action="php_fucntion/deptovldr.php" method="POST">
		   <div class="input-group margin-bottom-20">
			    <span class="input-group-addon"><i></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="Nombre de la Dependencia" name="nombrea"  type="text" required></div>
				<input type="hidden" name="a" value="1"/>
	
                
            <div class="row">
                <div class="col-md-12">
                    <button class="btn-u pull-left" type="submit">Registrar Dependencia</button>
                </div>
            </div>
             </form>
        </div>
        <div class="col-md-2"></div>
    </div>
      </div>


<br>
<br>

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


  </div>