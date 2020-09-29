<?php
require 'Conexiones/conexion.php';
?>
  <link rel="stylesheet" type="text/css" href="css/bootstrap-select.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-select.min.css">

  <script src="js/bootstrap-select.js"></script>
  <script src="js/bootstrap-select.min.js"></script>


	
	


<div >
<br />
<div >
    <div ></div>
    <div >
         <div >
             <h4 style="color: #0d0d0d; margin: initial; margin-bottom: 10px;">Nuevo Usuario</h4><hr>
				<form action="php_fucntion/usuvldr.php" method="POST">
		   <div class="input-group margin-bottom-20">
			    <span class="input-group-addon"><i class="fa fa-user "></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="Primer Nombre" name="nombrea"  type="text" required></div>
				<div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="fa fa-user "></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="Segundo Nombre" name="nombreb"  type="text" required></div>
				<div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="fa fa-user "></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="Apellido Paterno" name="apellidoa"  type="text" required></div>
				<div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="fa fa-user "></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="Apellido Materno" name="apellidob"  type="text" required></div>
				<div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="fa fa-user "></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="Usuario" name="usu" type="text" required></div>
            <div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="fa fa-key "></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="Password" name="psw"  type="password" required></div>
				<br>
				<br>
            <div class="select-group margin-bottom-20">
				 <select name="dep"  required>
				<option value="1" data-tokens="estado">-Dependencia-</option>
                <?php 
				$sql="select * from dependencia";
				$resulset=sqlsrv_query($conn, $sql);
				while ($reg = sqlsrv_fetch_array( $resulset, SQLSRV_FETCH_NUMERIC)){?>
				<option value="<?php echo $reg[0]; ?>" data-tokens="<?php echo $reg[1]; ?>"><?php echo $reg[1]; ?></option>


<?php }
sqlsrv_close($conn);
?>
</select>
<br>
<br>
          
            <div class="input-group margin-bottom-20">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope mycolor"></i></span>
                            <input size="60" maxlength="255" class="form-control" placeholder="Email" name="email"  type="text" >
                        </div>
                    <br>
                    <br>
                            <select name="estado" class="selectpicker show-tick">
                                <option value="1" data-tokens="Activo">Activo</option>
                                <option value="0" data-tokens="No Activo">No Activo</option>

                            </select>
            <br>
            <br>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn-u pull-left" type="submit">Registrar Usuario</button>
                            </div>
                        </div>

                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-9">
                                <button class="btn-u pull-left" type="button">Cancelar</button>
                            </div>
                        </div>

         </div>
        <div class="col-md-2"></div>
        </div>
        </div>
</form>


</div>