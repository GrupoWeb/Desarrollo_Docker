<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- DATEPICKER BOOTSTRAP -->  
    <link rel="stylesheet" type="text/css" href="../../Date/src/DateTimePicker.css" />
    <script type="text/javascript" src="../../Date/src/DateTimePicker.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="custom.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    
    
    <script src="controller/comandosload.js"></script>

</head>

<body>

<div class="container">
    <div class="card">
        <div class="card-header bg-dark text-white">
            <h3>Historico de Vehiculos</h3>
        </div>
        <div class="card-body">
            <form id="dataHistory">
                <div class="container">
                    <div class="row">
                        <div class='col-sm-3' >
                            <p>Fecha Inicical: <input type="text" style="text-align: center" data-field="date" class="form-control" name="date1" id="date1"></p>   
                            <div id="dtBox"></div>
                        </div>
                        <div class='col-sm-3' >
                            <p>Fecha Final: <input type="text" style="text-align: center" data-field="date" class="form-control" name="date2" id="date2"></p>   
                            <div id="dtBox"></div>
                        </div>
                        <div class='col-sm-6' >
                            <p>Vehiculo: <select name="ContainerVehiculo"  style="text-align: center" id="ContainerVehiculo"  class="form-control"></select></p>   
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <button type="submit" id="buscar" class="btn btn-info">Buscar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div id="reporte" >

    </div>
    
</div>




<script>

$(document).ready(function(){

    //UpdateReporte('model/updatekilometraje.php','#ModalUpdate','catalogos/equipos.php','#update');
    llenarCombos('model/Vehiculos.php',"#ContainerVehiculo");
    Historico('model/Historico.php','#dataHistory');
    $("#dtBox").DateTimePicker({
                mode: 'date',
                dateFormat: 'yyyy-MM-dd'

    });
    
});


</script>

</body>