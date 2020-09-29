<?
require 'Conexiones/conexion.php';
?>


	
	


<div class="col-sm-9">
<br />
<div class="container">
    <div class="col-md-3"></div>
    <div class="col-md-6">
         <div class="row myborder">
             <h4 style="color: #7EB59E; margin: initial; margin-bottom: 10px;">Actualizar Usuario</h4><hr>
				<form action="php_fucntion/usuact.php" method="POST">
				<?php
                      require_once ("Conexiones/conexion.php");
                      
                      $sql = "select *from Tusuario 
                          where id_usu=" . $_GET["id"] . "";
						  $resulset=sqlsrv_query($conn, $sql);
                      if( $reg =  sqlsrv_fetch_array( $resulset, SQLSRV_FETCH_NUMERIC)) {
                          ?>
						  <input type="hidden" name="idecito"  value="<?= $reg[0]; ?>"> 
		   <div class="input-group margin-bottom-20">
			    <span class="input-group-addon"><i class="glyphicon glyphicon-user mycolor"></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="Primer Nombre" name="nombrea"  type="text" value="<?= $reg[1]; ?>"></div>
				<div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user mycolor"></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="Segundo Nombre" name="nombreb"  type="text" value="<?= $reg[2]; ?>"></div>
				<div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user mycolor"></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="Apellido Paterno" name="apellidoa"  type="text" value="<?= $reg[3]; ?>"></div>
				<div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user mycolor"></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="Apellido Materno" name="apellidob"  type="text" value="<?= $reg[4]; ?>"></div>
				<div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user mycolor"></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="Usuario" name="usu" type="text" value="<?= $reg[5]; ?>" disabled></div>
            <div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock mycolor"></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="Password" name="psw"  type="password" value="<?= $reg[6]; ?>"></div>
             <div class="select-group margin-bottom-20">
				 <select name="dep" class="selectpicker" data-live-search="true">
				<option data-tokens="estado">-Dependencia-</option>
                <?php 
				$sql="select *from dependencia";
				$resulset=sqlsrv_query($conn, $sql);
				while ($reg = sqlsrv_fetch_array( $resulset, SQLSRV_FETCH_NUMERIC)){?>
				<option value="<? echo $reg[0]; ?>" data-tokens="<? echo $reg[1]; ?>"><? echo $reg[1]; ?></option>
				

<?php }
sqlsrv_close($conn);
?>
</select>
<br>

            <div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope mycolor"></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="Email" name="email"  type="text" ></div>
           
				<div class="select-group margin-bottom-20">
                
                <select name="estado" class="selectpicker show-tick">
				<option data-tokens="estado">-Estado-</option>
  <option value="1" data-tokens="Activo">Activo</option>
  <option value="0" data-tokens="No Activo">No Activo</option>

</select>

					  <?php  } ?>
					  
<br>

<br>
            <div class="row">
                <div class="col-md-12">
                    <button class="btn-u pull-left" type="submit">Registrar Usuario</button>
                </div>
            </div>
			<br>
			<div class="row">
                <div class="col-md-12">
                    <button class="btn-u pull-left" type="button">Cancelar</button>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
      </div>
</form>


  </div>