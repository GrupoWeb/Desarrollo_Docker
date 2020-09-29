<?php 
//iniciamos la sesion
session_start();
//agregamos la conexion de la base de datos
require'conexion.php';
//le indicamos que si la secion es diferente al id del usuario logueado nos redireccione hacia el login.php
if(!isset($_SESSION['id_usuario']))
{ header("location: login.php");}
//asignamos la sesion a la variable idusuario
$idusuario=$_SESSION['id_usuario'];
$usuario=$_SESSION['usuario'];

//hacemos la consulta a la base de datos y comparamos los datos
$sql="SELECT u.ID_USUARIOS, p.nombre 
FROM usuarios AS u INNER JOIN personal AS p 
ON u.id_personal=p.ID_PERSONAL WHERE u.ID_USUARIOS = $idusuario";
//ejecutamos el script y lo guardamos en la variable resulta
$resulta=sqlsrv_query($conn, $sql);
//procesamos el vector y ya comparado lo guardamos en la variable row que es la que posteriormente 
//le va a dar la bienvenida en la pantalla principal.
//$row = sqlsrv_fetch_array( $resulta, SQLSRV_FETCH_ASSOC);

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sistema de Seguridad</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://bootswatch.com/yeti/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script type='text/javascript'>
    function cargarContenido(pagina) {
        $.ajax({
                    url: 'Listar_Links.php',
                    data: (Rol: document.getElementsByName("Rol").value),
                    type: `'POST',
		async: false,
		succes: function(data){
			document.getElementById("Contenido_Menu").innerHTML = data;
		}
		
		});
    }
    </script>
    <style>
    .menu {
        width: 20%;
        height: 25px;
        float: none;
        padding: 10px;
        text-align: center;
        background: #fff;
        color: #000;
    }

    .menu:hover {
        background: #000;
        color: #fff;
    }

    #content {
        clear: both;
        background: #e5e5e5;
        padding: 0;
        overflow-y: scroll;
        width: 100%;
        height: 600px;
        border: 0;
    }
    </style>
    <style>
    button.accordion {
        background-color: #00425C;
        /*Es el color Inactivo*/
        color: #FFFFFF;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        transition: 0.4s;
    }

    button.accordion.active,
    button.accordion:hover {
        background-color: #0093CD;
        /*Es el color cuando se activa el boton*/
    }

    button.accordion:after {
        content: '\02795';
        font-size: 13px;
        color: #777;
        float: right;
        margin-left: 5px;

    }

    button.accordion.active:after {
        content: "\2796";

    }

    div.panel {
        padding: 0 0px;
        background-color: initial;
        max-height: 0;
        overflow: hidden;
        transition: 0.6s ease-in-out;
        opacity: 0;
    }

    div.panel.show {
        opacity: 1;
        max-height: 500px;
    }

    img {
        height: auto;
        width: auto;
    }
    </style>
    <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {
        height: 550px
    }

    /* Set gray background color and 100% height */
    .sidenav {
        background-color: ##1F618D;
        height: 100%;
        position: absolute;
    }

    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
        .row.content {
            height: auto;
        }
    }
    </style>
    <style>
    .btnv {
        width: 100%;
    }
    </style>
    <style>
    .left {
        float: left;
        background: blue
    }

    .right {
        float: right;
        background: red
    }

    .center {
        background: green;
    </style>
</head>

<body>
    <input type="hidden" id="<? echo $row['Rol'] ?>" name="Rol" />
    <nav class="navbar navbar-inverse visible-xs">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Sistema de Seguridad</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Dashboard</a></li>
                    <li><a href="#">Age</a></li>
                    <li><a href="#">Gender</a></li>
                    <li><a href="#">Geo</a></li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-3 sidenav hidden-xs">
                <h2>Sistema de Seguridad</h2>
                <ul class="nav nav-pills nav-stacked">
                    <button class="accordion">MANTENIMIENTOS</button>
                    <div id="Contenido_Menu" class="panel">
                        <a onClick="cargarContenido(<?echo $row['nombre_link'];?>)" href="#">
                            <button type="button" class="btn btn-primary btn-sm btn-block">Usuario</button></a>
                        <a onClick="cargarContenido('sistema.php')" href="#">
                            <button type="button" class="btn btn-primary btn-sm btn-block">Sistema</button></a>
                        <a onClick="cargarContenido('roles.php')" href="#">
                            <button type="button" class="btn btn-primary btn-sm btn-block">Roles</button></a>
                        <a onClick="cargarContenido('permisos.php')" href="#">
                            <button type="button" class="btn btn-primary btn-sm btn-block">Permisos</button></a>
                        <a onClick="cargarContenido('links.php')" href="#">
                            <button type="button" class="btn btn-primary btn-sm btn-block">Links</button></a>
                        <a onClick="cargarContenido('asignaciones.php')" href="#">
                            <button type="button" class="btn btn-primary btn-sm btn-block">Asignaciones</button></a>

                    </div>

                    <button class="accordion">ASIGNACIONES</button>
                    <div class="panel">
                        <button type="button" class="btn btn-primary btn-sm btn-block">Asignar Usuario</button>
                        <button type="button" class="btn btn-primary btn-sm btn-block">Button 1</button>
                        <button type="button" class="btn btn-primary btn-sm btn-block">Button 1</button>
                        <button type="button" class="btn btn-primary btn-sm btn-block">Button 1</button>
                    </div>


                    <button class="accordion">REPORTES</button>
                    <div class="panel">
                        <button type="button" class="btn btn-primary btn-sm btn-block">Button 1</button>
                        <button type="button" class="btn btn-primary btn-sm btn-block">Button 1</button>
                        <button type="button" class="btn btn-primary btn-sm btn-block">Button 1</button>
                        <button type="button" class="btn btn-primary btn-sm btn-block">Button 1</button>
                    </div>




            </div>
            <br>

            <div class="col-sm-9">
                <div id='capa'>
                    <div class="right">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button"
                                data-toggle="dropdown"><?php echo 'Bienvenido '.utf8_decode($row['nombre']); ?>
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <?php if($_SESSION['tipo_usuario']==1) { ?>
                                <li><a href="sistema.php">Sistema</a><br>
                                    <?php }?></li>
                                <li><a href="logout.php">Cerrar Sesion</a></li>
                            </ul>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
    <script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].onclick = function() {
            this.classList.toggle("active");
            this.nextElementSibling.classList.toggle("show");
        }
    }
    </script>

</body>

</html>