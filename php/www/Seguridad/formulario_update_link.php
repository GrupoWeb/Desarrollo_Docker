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
             <h4 style="color: #7EB59E; margin: initial; margin-bottom: 10px;">Actualizar enlace</h4><hr>
				<form action="php_fucntion/rolact.php" method="POST">
				<?php
                      
                      
                      $sql = "select id_link, Nombre_sys, Nombre_lk, nombre_link  from 
Tlinks as tlk inner join Tsistema as tss on tlk.id_sistema=tss.id_sistema where tlk.id_link=" . $_GET["id"] . "";
						  $resulset=sqlsrv_query($conn, $sql);
                      if( $reg =  sqlsrv_fetch_array( $resulset, SQLSRV_FETCH_NUMERIC)) {
                          ?>
						  <input type="hidden" name="idecito"  value="<?= $reg[0]; ?>"> 
						  
		   <div class="input-group margin-bottom-20">
			    <span class="input-group-addon"><i class="glyphicon glyphicon-user mycolor"></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="" name="nombrea"  type="text" value="<?= $reg[1]; ?>" disabled></div>
				
				<div class="input-group margin-bottom-20">
			    <span class="input-group-addon"><i class="glyphicon glyphicon-user mycolor"></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="Ubicacion del Link Ejemplo: sistema/index.php" name="nombrea"  type="text" value="<?= $reg[2]; ?>" required></div>
				
				<div class="input-group margin-bottom-20">
			    <span class="input-group-addon"><i class="glyphicon glyphicon-user mycolor"></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="Nombre del Permiso" name="nombrea"  type="text" value="<?= $reg[3]; ?>" required></div>

                <select name="estado" class="selectpicker show-tick" required>
				<option data-tokens="estado"></option>
  <option value="1" data-tokens="Activo">Activo</option>
  <option value="0" data-tokens="No Activo">No Activo</option>

</select>

					  <?php  } ?>
					  
<br>

<br>
            <div class="row">
                <div class="col-md-12">
                    <button class="btn-u pull-left" type="submit">Actualizar ROL</button>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
      </div>
</form>


  </div>