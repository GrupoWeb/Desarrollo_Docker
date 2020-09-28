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
            <h3>Pilotos</h3>
        </div>
        <div class="card-body">
            <form id="dataHistory">
                <div class="container">
                    <div class="row">
                        <div class='col-sm-6' >
                            <p>Piloto Asignado: <select name="PilotosName"  style="text-align: center" id="PilotosName"  class="form-control"></select></p>        
                        </div>
                        <div class='col-sm-6' >
                            <p>Solicitud: <select name="SolicitudRow"  style="text-align: center" id="SolicitudRow"  class="form-control"></select></p>   
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-3">
                            <button type="submit" id="buscar" class="btn btn-info">Buscar</button>
                            <button type="submit" id="cambiar" class="btn btn-info">Cambiar</button>
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

        $("#cambiar").show();
		$("#buscar").show();
		

    //UpdateReporte('model/updatekilometraje.php','#ModalUpdate','catalogos/equipos.php','#update');
    llenarCombos('model/Pilotos.php',"#PilotosName");
    llenarCombos('model/NoSolicitud.php',"#SolicitudRow");
    Historico('model/DataSolicitud.php','#dataHistory');
    $("#dtBox").DateTimePicker({
                mode: 'date',
                dateFormat: 'yyyy-MM-dd'

    });

    $('#cambiar').click(function(){
        UpdatePiloto('model/updatePiloto.php','#dataHistory');
    })
    
});


</script>

</body>