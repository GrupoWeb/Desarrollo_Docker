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
             <h4 style="color: #0d0d0d; margin: initial; margin-bottom: 10px;">Nuevo permiso</h4><hr>
				<form action="php_fucntion/tlinkvldr.php" method="POST">
				
				<div class="select-group margin-bottom-20">
				 <select name="sys" class="selectpicker" data-live-search="true" required>
				 <option data-tokens="estado"></option>
                <?php 
				$sql="select *from Tsistema where estado=1";
				$resulset=sqlsrv_query($conn, $sql);
				while ($reg = sqlsrv_fetch_array( $resulset, SQLSRV_FETCH_NUMERIC)){?>
				<option value="<?php echo $reg[0]; ?>" data-tokens="<?php echo $reg[1]; ?>"><?php echo $reg[1]; ?></option>


<?php }
sqlsrv_close($conn);
?>
<br>
<br>
				
		   <div class="input-group margin-bottom-20">
		   			    <span class="input-group-addon"><i ></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="Tipo de enlace en el sistema" name="nombrea"  type="text" required></div>


<br>
<br>
                
            <div class="row">
                <div class="col-md-12">
                    <button class="btn-u pull-left" type="submit">Registrar Permiso</button>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
      </div>
</form>


  </div>