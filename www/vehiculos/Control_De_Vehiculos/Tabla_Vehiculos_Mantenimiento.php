<head>
    
	<script src="datatables/table/datatables.js"></script>
	<script src="datatables/table/fonts.js"></script>
	<script src="datatables/table/pdfmake.js"></script>
	<link rel="stylesheet" href="datatables/table/datatables.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/controles/TListarFMantenimiento.js"></script>
    <script src="js/controles/RetornoVehiculos.js"></script>
</head>

<body>
    <div class="container containerr">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <form  id="RetornoVehiculo">
                    <h2>Retorno de Verhiculos de Mantenimiento</h2>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <table class="table table-hover" id="Vehiculo">
                                <thead>
                                    <th class="bg-blue title">PLACA</th>
                                    <th class="bg-blue title">NOMBRE</th>
                                    <th class="bg-blue title">PILOTO</th>
                                    <th class="bg-blue title">CONTROL</th>
                                </thead>
                            </table>
                        </div>
                    </div>
                </form>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <form  id="RetornoVehiculo">
                    <h2>Historial de Solicitudes de Mantenimiento</h2>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <table class="table table-striped table-hover" id="Rvehiculo">
                                <thead>
                                    <th class="bg-blue title">ID</th>
                                    <th class="bg-blue title">PLACA</th>
                                    <th class="bg-blue title">SALIDA</th>
                                    <th class="bg-blue title">FECHA INICIO</th>
                                    <th class="bg-blue title">LUGAR</th>
                                    <th class="bg-blue title">TIPO SERVICIO</th>
                                    <th class="bg-blue title">MOTIVO</th>
                                    <th class="bg-blue title">ENCARGADO</th>
                                    <th class="bg-blue title">CONTROL</th>
                                </thead>
                            </table>
                        </div>
                    </div>
                </form>
        </div>
    </div> 
</body>
        <!-- <script type='text/javascript' src="js/jquery.min.js"></script>
        <script type='text/javascript' src="js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
        <script>
        $.ajax({ url: 'PHP/Carga_Vehiculo_Mantenimiento.php',
         data: {},
         type: 'POST',
         async: false,
         success: function(data) {
           $("#Vehiculo").append(data);
           $('#Vehiculo').DataTable({
            "language": {
                "url": "js/Spanish.json"
            }
        });
       }
   });
        
        $(document).ready(function(){
            $("#Vehiculo").on("click",".envia",function(){
               var str = this.id;
               $("#cont").load("Formulario_Retorno_Servicio.php?idVehiculo="+str);
           });
        });
        </script> -->
    </body>