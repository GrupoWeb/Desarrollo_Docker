<?
require 'Conexiones/conexion.php';
?>




	
	


<div class="col-sm-9">
<br />
<div class="container">
    <div class="col-md-3"></div>
    <div class="col-md-6">
         <div class="row myborder">
             <h4 style="color: #7EB59E; margin: initial; margin-bottom: 10px;">Actualizar Sistema</h4><hr>
				<form action="php_fucntion/sysact.php" method="POST">
				<?php
                      require_once ("Conexiones/conexion.php");
                      
                      $sql = "select *from Tsistema 
                          where id_sistema=" . $_GET["id"] . "";
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
                    <button class="btn-u pull-left" type="submit">Actualizar Sistema</button>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
      </div>
</form>


  </div>