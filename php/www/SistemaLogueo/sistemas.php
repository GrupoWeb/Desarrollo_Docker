<?php 
session_start();

//agregamos la conexion de la base de datos
require('conexion.php');
//le indicamos que si la secion es diferente al id del usuario logueado nos redireccione hacia el login.php
if(!isset($_SESSION['username']))
{ header("location: login.php");}
//asignamos la sesion a la variable idusuario
$idusuario=$_SESSION['username'];
$usuariogt=$_SESSION['usern'];
$gt=$_SESSION['nom1'];
		  $gt2=$_SESSION['apellidop'];

 ?>




<!DOCTYPE html>
<html lang="en">

<head>

    <link href="../Seguridad/css/registro.css" rel="stylesheet">
    <link href="../Seguridad/css/fontbootstrap.css" rel="stylesheet">
    <script src="../Seguridad/js/jquery-3.1.1.min.js"></script>
    <script src="../Seguridad/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../Seguridad/css/bootstrap-select.min.css">
    <script src="../Seguridad/js/bootstrap-select.min.js"></script>
    <script src="../Seguridad/js/i18n/defaults-es_CL.js"></script>

    <!-- Libreria DataTable-->
    <script src="../Seguridad/js/dataTables.bootstrap.min.js"></script>
    <script src="../Seguridad/js/dataTables.bootstrap4.min.js"></script>
    <script src="../Seguridad/js/jquery.dataTables.js"></script>
    <script src="../Seguridad/js/jquery.dataTables.min.js"></script>

    <!-- Estilos DataTable-->
    <link rel="stylesheet" href="../Seguridad/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../Seguridad/css/dataTables.uikit.min.css">
    <link rel="stylesheet" href="../Seguridad/css/jquery.dataTables.min.css">

    <!-- Estilos f-->
    <link rel="stylesheet" href="../Seguridad/css/font-awesome.css">
    <link rel="stylesheet" href="../Seguridad/css/font-awesome.min.css">

    <style>
    .circle-tile {
        margin-bottom: 15px;
        text-align: center;
    }

    .circle-tile-heading {
        border: 3px solid rgba(255, 255, 255, 0.3);
        border-radius: 100%;
        color: #FFFFFF;
        height: 80px;
        margin: 0 auto -40px;
        position: relative;
        transition: all 0.3s ease-in-out 0s;
        width: 80px;
    }

    .circle-tile-heading .fa {
        line-height: 80px;
    }

    .circle-tile-content {
        padding-top: 50px;
    }

    .circle-tile-number {
        font-size: 26px;
        font-weight: 700;
        line-height: 1;
        padding: 5px 0 15px;
    }

    .circle-tile-description {
        text-transform: uppercase;
    }

    .circle-tile-footer {
        background-color: rgba(100, 210, 255, 1);
        color: #000000;
        display: block;
        padding: 5px;
        transition: all 0.3s ease-in-out 0s;
    }

    .circle-tile-footer:hover {
        background-color: rgba(100, 210, 255, 1);
        color: rgba(255, 255, 255, 0.5);
        text-decoration: none;
    }

    .circle-tile-heading.dark-blue:hover {
        background-color: #2E4154;
    }

    .circle-tile-heading.green:hover {
        background-color: #138F77;
    }

    .circle-tile-heading.orange:hover {
        background-color: #DA8C10;
    }

    .circle-tile-heading.blue:hover {
        background-color: #2473A6;
    }

    .circle-tile-heading.red:hover {
        background-color: #CF4435;
    }

    .circle-tile-heading.purple:hover {
        background-color: #7F3D9B;
    }

    .tile-img {
        text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.9);
    }

    .dark-blue {
        background-color: #34495E;
    }

    .green {
        background-color: #16A085;
    }

    .blue {
        background-color: #2980B9;
    }

    .orange {
        background-color: #F39C12;
    }

    .red {
        background-color: #E74C3C;
    }

    .purple {
        background-color: #8E44AD;
    }

    .dark-gray {
        background-color: #7F8C8D;
    }

    .gray {
        background-color: #95A5A6;
    }

    .light-gray {
        background-color: #BDC3C7;
    }

    .yellow {
        background-color: #F1C40F;
    }

    .text-dark-blue {
        color: #34495E;
    }

    .text-green {
        color: #16A085;
    }

    .text-blue {
        color: #2980B9;
    }

    .text-orange {
        color: #F39C12;
    }

    .text-red {
        color: #E74C3C;
    }

    .text-purple {
        color: #8E44AD;
    }

    .text-faded {
        color: rgba(255, 255, 255, 0.7);
    }
    </style>

    <title>Sistemas</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
    var myVar = setInterval(myTimer, 1000);

    function myTimer() {
        var d = new Date();
        document.getElementById("demo").innerHTML = d.toLocaleTimeString();
    }
    </script>

    <style>
    .btn-default {
        background: #00BFFF;
        color: #fff;
    }

    .btn-default:hover {
        background: #fff;
        color: #000;
    }
    </style>

</head>

<body>

    <div class="jumbotron text-center">
        <?php
        /*
  
  $sql="select nombre1, nombre2, apellidop, apellidom from tusuario where id_usu=$idusuario";

$resultado=sqlsrv_query($conn, $sql);

while( $row = sqlsrv_fetch_array( $resultado, SQLSRV_FETCH_ASSOC) ) {*/?>

        <h1>SISTEMA SICI "Sistema interno de comunicación informático"</h1><br>

        <!--  <h4>SICI es el sistema interno del Ministerio de Economía y sus Dependencias para la comunicación entre las <br>
principales Direcciones y Despachos del mismo. Facilitara el procedimiento de solicitudes en <br>
Recursos Humanos, Dirección de Tecnologias de la Informacion, Almacen y otros procesos administrativos</h4> <br>
 -->
        <h2>BIENVENIDO(A)</h2>
        <?php echo " <h2>$gt"."  "."$gt2</h2>"?>
        <p>Dirección de Atención y Asistencia al Consumidor</p>
        <p>Ministerio de Economía Guatemala C.A.</p>
        <p id="demo"></p>



        <div class="container">
            <button type="button" class="btn btn-default" onClick="window.location.href='logout.php'">Cerrar
                Sesión</button>
        </div>


        <?php /*}*/?>


    </div>
    <?php
  
 
  $sql="select list.id_usu, list.id_tlink, enlace.ruta_sistema, enlace.nombre_sys, tr.nombre_link
from Tasignacion as list 
inner join Tsistema as enlace  on 
enlace.id_sistema=list.id_sistema join Tlinks as tr on 
tr.id_link=list.id_link inner join tipo_link as tl 
on tl.id_tlink=list.id_tlink where list.id_usu=$idusuario and list.id_tlink=1 and list.estado=1";

$resultado=sqlsrv_query($conn, $sql);

if($resultado==true){

while( $row = sqlsrv_fetch_array( $resultado, SQLSRV_FETCH_ASSOC) ) {?>

    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-8">
                <div class="circle-tile ">
                    <a href="<?php echo $row['ruta_sistema'];?>/<?php echo $row['nombre_link'];?>" data-toggle="tooltip"
                        title="Permitido tu ingreso">
                        <div class="circle-tile-heading dark-blue"><i class="fa fa-unlock fa-fw fa-3x"></i></div>
                    </a>
                    <div class="circle-tile-content dark-blue">
                        <div class="circle-tile-description text-faded"><?php echo $row['nombre_sys']?></div>
                        <div class="circle-tile-number text-faded ">Asignado</div>
                        <a class="circle-tile-footer"
                            href="<?php echo $row['ruta_sistema'];?>/<?php echo $row['nombre_link'];?>">Ingresar <i
                                class="fa fa-chevron-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <script>
            $(document).ready(function() {
                $('[data-toggle="tooltip"]').tooltip();
            });
            </script>

            <?php }


// Cerrar la conexión.
sqlsrv_close( $conn );
require('conexion.php');

//$Tsis="select ts.nombre_sys from Tasignacion as ta inner join Tsistema as ts on ts.id_sistema <> ta.id_sistema where ta.id_usu = $idusuario";

// $resultado=sqlsrv_query($conn, $Tsis);

// if($resultado==true){

// while( $row = sqlsrv_fetch_array( $resultado, SQLSRV_FETCH_ASSOC) ) 
// {?>

            <!-- <link rel="stylesheet" type="text/css"
                href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-8">
                        <div class="circle-tile ">
                            <a href="#" data-toggle="tooltip"
                                title="NO TIENES LOS SUFICIENTES PERMISOS PARA INGRESAR A ESTE SISTEMA">
                                <div class="circle-tile-heading dark-blue"><i class="fa fa-lock fa-fw fa-3x"></i></div>
                            </a>
                            <div class="circle-tile-content dark-blue">
                                <div class="circle-tile-description text-faded"><?php echo $row['nombre_sys']?></div>
                                <div class="circle-tile-number text-faded ">No asignado</div>
                                <label class="circle-tile-footer" <strike>Ingresar</Strike> <i
                                        class="fa fa-chevron-circle-right"></i></label>
                            </div>
                        </div>
                    </div> -->


                    <?php
//  }
// }

}?>




</body>

</html>