<?php
require 'Conexiones/conexion.php';
?>


	 <link href="css/registro.css" rel="stylesheet">
	 <link href="css/fontbootstrap.css" rel="stylesheet">
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap-select.min.css">
<script src="js/bootstrap-select.min.js"></script>
<script src="js/i18n/defaults-*.min.js"></script>

	
	


<div class="col-sm-9">
<br />
<div class="container">
    <div class="col-md-3"></div>
    <div class="col-md-6">
         <div class="row myborder">
             <h4 style="color: #7EB59E; margin: initial; margin-bottom: 10px;">Nuevo Usuario</h4><hr>
				<form action="php_fucntion/usuvldr.php" method="POST">
		   <div class="input-group margin-bottom-20">
			    <span class="input-group-addon"><i class="glyphicon glyphicon-user mycolor"></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="Primer Nombre" name="nombrea"  type="text"></div>
				<div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user mycolor"></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="Segundo Nombre" name="nombreb"  type="text"></div>
				<div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user mycolor"></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="Apellido Paterno" name="apellidoa"  type="text"></div>
				<div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user mycolor"></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="Apellido Materno" name="apellidob"  type="text"></div>
				<div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user mycolor"></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="Usuario" name="usu" type="text"></div>
            <div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock mycolor"></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="Password" name="psw"  type="password"></div>
            <div class="select-group margin-bottom-20">
				 <select name="dep" class="selectpicker" data-live-search="true">
				<option value="1" data-tokens="estado">-Dependencia-</option>
                <?php 
				$sql="select *from dependencia";
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
                <span class="input-group-addon"><i class="glyphicon glyphicon-user mycolor"></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="DPI" name="dpi"  type="text" disabled></div>
            <div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope mycolor"></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="Email" name="email"  type="text" disabled></div>
            <div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="glyphicon glyphicon-phone mycolor"></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="Numero de Telefono" name="phone" " type="text" disabled"></div>
				<div class="select-group margin-bottom-20">
                
                <select name="estado" class="selectpicker show-tick">
				<option data-tokens="estado">-Estado-</option>
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
        </div>
        <div class="col-md-2"></div>
    </div>
      </div>
</form>


  </div>