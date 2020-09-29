
<!DOCTYPE html>
<html>
<head>
	<title>usuario</title>
	  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://bootswatch.com/yeti/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
    <style>
  .modal-header, h4, .close {
      background-color: #1b96e2;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-footer {
      background-color: #1b96e2;
  }
  </style>
  
  
</head>
<body>


<div class="container">
  <h2>Nuevo</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-default btn-lg" id="myBtn">Nuevo</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
     <form action="vldr.php" method="POST" role="form" >
	 <?php
                      require_once ("conexion.php");
                      
                      $sql = "select *from Tusuario 
                          where id_login=" . $_GET["id"] . "";
                      //echo $sql;
                      $res = mysql_query($sql, $con);
                      if( $reg = mysql_fetch_array($res)) {
                          ?>
	 
	 
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-list-alt"></span> Nuevo Usuario</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">

            <div>
              <label for="usrname"><span class="glyphicon glyphicon-list-alt"></span> Primero Nombre</label>
              <input type="text" class="form-control" id="usrname" name="nombreA" placeholder="Ingrese su primer Nombre">
            </div>
			            <div>
              <label for="usrname"><span class="glyphicon glyphicon-list-alt"></span> Segundo Nombre</label>
              <input type="text" class="form-control" id="usrname" name="nombreB" placeholder="Ingrese su segundo Nombre">
            </div>
			            <div>
              <label for="usrname"><span class="glyphicon glyphicon-list-alt"></span> Apellido Paterno</label>
              <input type="text" class="form-control" id="usrname" name="ApellidoA" placeholder="Ingrese apellido paterno">
            </div>
			            <div>
              <label for="usrname"><span class="glyphicon glyphicon-list-alt"></span> Apellido Materno</label>
              <input type="text" class="form-control" id="usrname" name="ApellidoB" placeholder="Ingrese apellido materno">
            </div>
			
						            <div>
              <label for="usrname"><span class="glyphicon glyphicon-list-alt"></span> Usuario</label>
              <input type="text" class="form-control" id="usrname" name="USU" placeholder="Ingrese Usuario">
            </div>
						            <div>
              <label for="usrname"><span class="glyphicon glyphicon-eye-close"></span> Password</label>
              <input type="password" class="form-control" id="usrname" name="psw" placeholder="Ingrese Nueva Clave">
            </div>
			
			            <div>
              <label for="usrname"><span class="glyphicon glyphicon-list-alt"></span> Estado</label>
              <select name="estado">
			  <option>-Seleccione-</option>
			  <option value="1">-Activo-</option>
			  <option value="0">-Inactivo-</option>

			  </select>
            </div>
			<div>
               <button type="submit"><span class="glyphicon glyphicon-check"></span> Guardar</button>
            </div>
			<br>
		  
		  
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
		  </form>
        </div>
      </div>
      
    </div>
  </div>
</div>


 <div style = "font-size:16px; color:#cc0000;"><?php echo isset($error) ? utf8_decode($error) : '' ; ?></div>
 
 
 <!-- Inicia el formulario de Edicion-->
 <div  class="container">
  <h2>Buscar</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-default btn-lg" id="mBtn">Buscar</button>

  <!-- Modal -->
  <div  class="modal fade" id="mModal" role="dialog">
    <div style="width:60%" class="modal-dialog">
     <form action="">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-list-alt"></span> Buscar Usuario</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
		
		<div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-search"></span> Buscar</label>
              <input type="password" class="form-control" id="usrname" name="nombreA" placeholder="Buscar">
            </div>
                   

  <table class="table table-striped">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
		<th>Editar</th>
		<th>Eliminar</th>
      </tr>
    </thead>
    <tbody>
      <tr class="success">
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
		<td>
		
		
 <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editModal">Open Modal</button>

  <!-- Modal -->
  <div class="modal fade" id="editModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  

		
		
		
		</td>
		<td></td>
      </tr>
      <tr class="danger">
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr class="info">
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
	        <tr class="info">
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
    </tbody>
  </table>

				   
				   
				   
            </div>
		  
		  
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
		  </form>
        </div>
      </div>
      
    </div>
  </div>
</div>
<script>
$(document).ready(function(){
    $("#editBtn").click(function(){
        $("#editModal").modal();
    });
});
</script>
 
 
 
<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>

<script>
$(document).ready(function(){
    $("#mBtn").click(function(){
        $("#mModal").modal();
    });
});
</script>




	 
</body>
</html>