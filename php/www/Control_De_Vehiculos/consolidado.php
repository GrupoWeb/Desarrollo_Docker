  <head>
  
  
    <!-- <script src="plugins/select2/select2.full.min.js"></script>
    <script src="plugins/fastclick/fastclick.min.js"></script> -->
    <!--<script src="plugins/datepicker/js/bootstrap-datepicker.js"></script>
    <script src="plugins/datepicker/locales/bootstrap-datepicker.es.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script> -->
    <!-- <script src="plugins/printarea/jquery.printarea.js"></script>
    <script src="plugins/moment/moment.min.js"></script> -->
    
    <!-- <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    
    <script src="plugins/fastclick/fastclick.min.js"></script>
     <script src="dist/js/source_report.js"></script> 
  <script src="plugins/datatables/dataTables.bootstrap.min.js"></script> -->


      <!-- <link rel="stylesheet" href="plugins/select2/select2.min.css">
      <link rel="stylesheet" href="plugins/printarea/jquery.printarea.css"> -->
      <!-- <link rel="stylesheet" href="plugins/datepicker/css/bootstrap-datepicker3.css"> -->
      <link rel="stylesheet" type="text/css" href="Date/src/DateTimePicker.css" />
      <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
      <!-- <script type='text/javascript' src="js/jquery.min.js"></script> -->
      <script type='text/javascript' src="js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="Date/src/DateTimePicker.js"></script>
      <script type="text/javascript" src="Date/demo/jquery-1.11.0.min.js"></script> 
      <script type="text/javascript" src="DataTables/datatables.js"></script>

  </head>
  <body onload="pone_opcion_existe();">
  

    <div style="width:80%;position: relative;   display: inline-block;">
      <div >
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Reportes | Reportes de Movimiento de Vehiculos
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <!-- <li><a href="inicio.php"><i class="fa fa-dashboard"></i> Home</a></li> -->
            <li class="active">Consolidado de Movimiento de Kilometraje.</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Your Page Content Here -->
          
          <div class='row'>
            <div class='col-md-6 col-xs-8 col-sm-8 '>
              <div class='box box-primary'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Rango de Fecha...</h3>
                </div>
                <div class='box-body'>
                  <div class="input-group">
                    <span class='input-group-addon bg-purple'><i class="fa fa-calendar"></i> Fecha Inicial:</span>
                    <input type="text" data-field="date" class="form-control pull-right" id="fecha" onchange="" autocomplete="off">

                    <span class='input-group-addon bg-purple'><i class="fa fa-calendar"></i> Fecha Final:</span>
                    <input type="text" data-field="date"  class="form-control pull-right" id="fecha2" onchange="" autocomplete="off">
                  </div><!-- /.form group -->
                  <div id="dtBox" ></div>
                </div>

              </div>
            </div>
          

            <div class='col-md-6 col-xs-8 col-sm-8'>
              <div >
                <div class='box box-primary'>
                  <div class='box-header with-border'>
                    <h4>Selecciona opcion.</h4>
                  </div>
                  <div class='box-body'>
                    <div class='form-group'>
                      <label for="vehiculo">Seleccione Vehiculo:</label>
                      <select class="form-control" id="vehiculo" name ="vehiculo" required>
                      </select>  
                    </div>
                  </div>
                  <div class='box-footer'>
                    <button type='button' class='btn btn-primary pull-right' onclick='Mostrar_Datos();' id='btn-listo'><i class='fa fa-search'></i> Buscar</button>
                    <button type="button" class="btn btn-primary" onclick='print_detalle_existe();'><i class='fa fa-print'></i> Imprimir</button>
                    <button name="create_excel" id="create_excel" onclick="tableToExcel('mostrar_Vehiculos', 'Consolidado Vehiculos')" class="btn btn-success">Exportar Excel</button>  
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class=' container col-md-12 col-xs-12 col-sm-12' >
            <div >
              <div id='existencias'  class="printing">


              </div>
            </div>
          </div>
        </section><!-- /.content -->

      </div><!-- /.content-wrapper -->
        

       
    </div>

    <script>
    // $("#fecha").datepicker({
    //   language: "es",
    //   format: "yyyy-mm-dd"
    // });

    // $(document).ready(function()
    //   {
    //     $("#dtBox").DateTimePicker();
       
    //   });


    // $("#fecha2").datepicker({
    //   language: "es",
    //   format: "yyyy-mm-dd"
    // });

 

    $.ajax({
    url: 'PHP/CargarVehiculos.php',
    async: false,
    success: function(data)
    {
      $("#vehiculo").empty();
      $("#vehiculo").append(data);
    }
  });


           var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById(table)
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
    window.location.href = uri + base64(format(template, ctx))
  }
})()

    

    $(Mostrar_Datos());

function print_detalle_existe(){
   $(".printing").printArea();
}


    function Mostrar_Datos(){
      var Cual_Vehiculo = $("#vehiculo option:selected").val();

      if($("#fecha").val()!="" && $("#fecha2").val()!="" && Cual_Vehiculo != '-- Seleccione Vehiculo --' ){
        
            var parametros='fechaInicial='+$("#fecha").val()+'&fechaFinal='+$("#fecha2").val()+'&vehiculo='+Cual_Vehiculo;
      } 

               



      $.ajax({
        url: 'PHP/rpt_Vehiculos.php',
        type: 'POST',
        data: parametros,
      })
      .done(function(respuesta){
        $('#existencias').html(respuesta);
      })
    }




   

    </script>
  </body>
