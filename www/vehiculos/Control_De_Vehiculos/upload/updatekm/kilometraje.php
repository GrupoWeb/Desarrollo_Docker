<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web Service Update Km</title>   
    

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="custom.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    
    <script src="controller/DatosTabla/InfoKilometro.js"></script>

</head>

<body>


<div class="container">
                    <div class="col-xs-12 col-sm-12 col-xl-12 " id="widget-container-col-2">
                        <div class="widget-box widget-color-blue" id="widget-box-2">
                            <div class="widget-header">
                                <h5 class="widget-title bigger lighter">
                                    <i class="fas fa-tachometer-alt"></i>
                                    Kilometraje
                                </h5>
                            </div>
                        
                            <div class="widget-body" >
                                <div class="widget-main no-padding  " >
                                    <table class="table table-striped table-bordered table-hover table-responsive "   id="InfoKilometros">
                                        <thead >
                                            <tr>
                                                <th>
                                                    
                                                    Salida
                                                </th>
                        
                                                <th>
                                                    
                                                    Regreso
                                                </th>
                                                <th>
                                                    Solicitud
                                                </th>
                                                <th class="update">
                                                    Update
                                                </th>
                                                
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


<form id="update">
 <div class="modal fade" id="ModalUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header bg-info" >
          <h4 class="modal-title" id="myModalLabel">Kilometraje Vehiculos</h4>
        <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
      </div>

      <div class="modal-body">
	      <form class="form-horizontal">
                <div class="form-group">
		            <label class="col-sm-3 control-label">ID SOLICITUD:</label>
		            <div class="col-sm-9"> 
                      <label class="control-label" id="lblid"></label>
		              <input type="hidden" name="txtid" class="form-control" id="txtid" placeholder="" >
		            </div>
		        </div>
		        <div class="form-group">
		            <label class="col-sm-3 control-label">KM SALIDA:</label>
		            <div class="col-sm-9"> 
		              <input type="text" name="txtSalida" class="form-control" id="txtSalida" placeholder=""  >
		            </div>
                </div>
                <div class="form-group">
		            <label class="col-sm-3 control-label">KM ENTRADA:</label>
		            <div class="col-sm-9"> 
		              <input type="text" name="txtEntrada" class="form-control" id="txtEntrada" placeholder=""  >
		            </div>
		        </div>
			
		  </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="mbtnCerrarModal" data-dismiss="modal">Cancelar</button>
        
        <button type="submit" class="btn btn-info" id="mbtnUpdPerona">Actualizar</button>
      </div>
    </div>
  </div>
</div>
</form>
<!-- MODAL FIRMA -->
<script>

$(document).ready(function(){
    
    //llenarCombos('../metodos/empleados.php',"#txtfirma"); 
    UpdateReporte('model/updatekilometraje.php','#ModalUpdate','catalogos/equipos.php','#update');
    //agregarReporte('../model/addEquipo.php','catalogos/equipos.php','#add','#ModalSearch');
    //valor();
});
GetDocumento = function(id,salida,regreso){

    $('#txtid').val(id);
    $('#lblid').text(id);
    $('#txtSalida').val(salida);
    $('#txtEntrada').val(regreso);


};
</script>

</body>

</html>