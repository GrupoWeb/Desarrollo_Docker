<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web Service Update Km</title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="custom.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="ace.min.css">
   
    <script src="controller/DatosTabla/InfoKilometro.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.16/af-2.2.2/b-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/sc-1.4.3/sl-1.2.4/datatables.min.css"/>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="controller/comandosload.js"></script>
    

</head>

<body>
        <div id="navbar" class="navbar   navbar-collapse navbar-inverse">
            <div class="navbar-container" id="navbar-container">
       
                <div class="navbar-header pull-left">
                    <a href="#" class="navbar-brand">
                        <small>
                           
                            Web Service Update 
                        </small>
                    </a>
                </div>
            </div>
            <!-- /.navbar-container -->
        </div>

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