
<!DOCTYPE html>
<html>
<head>
	<title>usuario</title>
	  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">

<script type="text/javascript" language="javascript" src="DataTables/media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js">
  
  
  
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
  
  <script>

$(document).ready(function(){
    $('#mit').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }
    } );
	
});

</script>
</head>
<body>



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
 
 

        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-list-alt"></span> Buscar Usuario</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
		
		<div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-search"></span> Buscar</label>
              <input type="password" class="form-control" id="usrname" name="nombreA" placeholder="Buscar">
            </div>
                   

<table id="mit" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>apellido</th>
        <th>usuario</th>
		<th>Editar</th>
		<th>Eliminar</th>
      </tr>
    </thead>
    <tbody>
	
                    <?php
require 'conexion.php';
$sql="select *from tusuario order by 1 desc";
$res=  sqlsrv_query($conn, $sql);
while ($reg = sqlsrv_fetch_array( $res, SQLSRV_FETCH_NUMERIC))
{
?>
	
                    <tr>
                        <td><?=$reg[1];?></td>
                        <td><?=$reg[3];?></td>
                        <td><?=$reg[5];?></td>
                        
                        
                                                <td>
                            <a href="javascript:void(0) "
                               onClick="window.location=
                               'editar.php?id=<?= $reg[0];?>';"
                            class="glyphicon glyphicon-pencil"
                                                      </td>
                        
                        

                                                      <td>
                            <a href="javascript:"
                               onClick="eliminar
                               ('Eliminar.php?id=<?= $reg[0];?>');"
                               
                            class="glyphicon glyphicon-remove"
                                                      </td>
                          

                    </tr>
                   <?php
                   }
                   ?>
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