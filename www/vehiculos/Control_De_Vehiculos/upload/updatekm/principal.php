<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Administrador Vehiculos</title>

	<link rel="stylesheet" href="demo.css">
    <link rel="stylesheet" href="sidebar-collapse.css">

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    
        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script src="../updatekm/controller/comandosload.js"></script>
	<link rel="stylesheet" href="font-awesome/4.5.0/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>

    <!-- datatables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.16/af-2.2.2/b-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/sc-1.4.3/sl-1.2.4/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.16/af-2.2.2/b-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/sc-1.4.3/sl-1.2.4/datatables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="custom.css">
    <!-- fin -->
    
    


</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
   
        <div class="container">
        <a class="navbar-brand" href="./"><b>DIACO</b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
        <ul class="navbar-nav mr-auto">
            

            <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Vehiculos
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" onClick="cargarDiv('kilometraje.php')">Kilometraje</a>
                        <a class="dropdown-item" onClick="cargarDiv('HistoricoKM.php')" >Historico</a>
                        <a class="dropdown-item" onClick="cargarDiv('pilotos.php')" >Pilotos</a>
                        <a class="dropdown-item" onClick="cargarDiv('placas.php')" >Placas</a>
                        <a class="dropdown-item" onClick="cargarDiv('HistoricoKM.php')" >Motivo</a>
                    </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="controller/logon.php">Salir</a>
            </li>

       
            </ul>

        </div>
        
        </div>
 
</nav>




	<div id="contenedor" class="container" >
	</div>


</body>

</html>
