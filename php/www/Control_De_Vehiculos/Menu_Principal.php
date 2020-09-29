<?php
session_start();

require('conexion/conexion.php');
if(!isset($_SESSION['username']) || empty($_SESSION['username']))
{
	echo "<script>alert('Debe inicial secion para poder acceder al sistema'); location.replace('../SistemaLogueo');</script>";
}
else
{
	
	$idUsuario = $_SESSION['username'];
}



$sql = "
SELECT
([u].[nombre1] + ' ' + [u].[apellidop] ) AS Solicitante
FROM
[syslogin].[dbo].[Tusuario] AS [u]
WHERE 
id_usu = $idUsuario";

$result = sqlsrv_query($conn, $sql);



if($result)
{
	$vec = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
	
}

$sql2="
			select 
			enlace.id_link, 
			ss.nombre_link,
			ss.imagen, 
			ss.Nombre_lk, 
			usu.usuario
			from 
			[syslogin].[dbo].[Tasignacion] as enlace 
			inner join [syslogin].[dbo].[Tlinks] as ss on enlace.id_link=ss.id_link 
			inner join [syslogin].[dbo].[Trol] as tl on tl.id_rol=enlace.id_rol 
			inner join [syslogin].[dbo].[Tusuario] as usu on usu.id_usu=enlace.id_usu 
			where 
			enlace.id_usu = $idUsuario 
			and enlace.id_tlink = 15 
			and enlace.estado = 1";
			
			$resultado=sqlsrv_query($conn, $sql2);

			
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Menu Principal</title>
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" tpe="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/Theme_Menu.css" />
    <script type='text/javascript' src="js/jquery.min.js"></script>
    <script type='text/javascript' src="js/jquery.form.js"></script>
    <script type="text/javascript" src="js/noty/packaged/jquery.noty.packaged.js"></script>
    <script type="text/javascript" src="js/noty/notification_html.js"></script>
    <link rel="stylesheet" type="text/css" href="js/noty/buttons.css" />
    <link rel="stylesheet" type="text/css" href="js/noty/animate.css" />
    <link rel="stylesheet" href="bootstrap/css/grafico.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">




</head>
<script>
$(document).ready(function() {

    $("#head").click(function() {
        location.reload();
    });

    $(".submenu").click(function(event) {
        var id = event.target.id;
        $.get('Menus/' + this.id + '.php', function(data) {
            $('#Contenido_Menu').html(data);

            console.log(id);
            if (id == 'Menu_Reportes') {
                $('#cont').load("Tabla_Indes.php");

            } else if (id == 'Menu_Solicitudes') {
                $('#cont').load("verSolicitudesPendientes.php");
            } else if (id == 'Menu_Consulta') {
                $('#cont').load("verSolicitudesPendientes.php");
            } else {
                $('#cont').load("verSolicitudesPendientes.php");
            }
        });

        if (id == 'Menu_Herramientas') {
            var tab = window.open('upload/updatekm/', '_blank');
            tab.focus();
        }
    });

    $("#SolicitudBuscada").keypress(function(event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            if (($("#SolicitudBuscada").val() === undefined) || ($("#SolicitudBuscada").val().length !=
                    0)) {
                $('#Contenido_Menu').empty();
                $("#cont").load('SolicitudBuscada.php?p=' + $("#SolicitudBuscada").val());
                $("#SolicitudBuscada").val('');
            } else {
                alert('Debe completar el campo para proceder con la solicitud');
            }
        }
        event.stopPropagation();
    });

    $(".BuscaSolicitud").click(function() {
        if (($("#SolicitudBuscada").val() === undefined) || ($("#SolicitudBuscada").val().length !=
                0)) {
            $('#Contenido_Menu').empty();
            $("#cont").load('SolicitudBuscada.php?p=' + $("#SolicitudBuscada").val());
            $("#SolicitudBuscada").val('');
        } else {
            alert('Debe completar el campo para proceder con la solicitud');
        }
    });
});
</script>
<style>
textarea {
    text-transform: uppercase;
}



@import "https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css";
@import url('https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700');

body {
    font-size: 14px;
    color: #333;
    list-style: 26px;
    font-family: 'Roboto', sans-serif;
    margin: 0 auto;
    padding: 0 auto;
}

/** ======================  base css ==============================**/

a:hover {
    text-decoration: none;
}

.menu_principal td {
    display: inline-block;
    position: relative;
}


@import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700,300);
@import url(https://fonts.googleapis.com/css?family=Roboto:400,300,500,700);

footer {
    background-color: #005588;
    min-height: 50px;
    font-family: 'Roboto', sans-serif;
}

.footerleft {
    margin-top: 50px;
    padding: 0 36px;
}

.logofooter {
    margin-bottom: 10px;
    font-size: 25px;
    color: #fff;
    font-weight: 700;
}

.footerleft p {
    color: #fff;
    font-size: 12px !important;
    font-family: 'Roboto', sans-serif;
    margin-bottom: 15px;
}

.footerleft p i {
    width: 20px;
    color: #fff;
}


.paddingtop-bottom {
    margin-top: 50px;
}

.footer-ul {
    list-style-type: none;
    padding-left: 0px;
    margin-left: 2px;
}

.footer-ul li {
    line-height: 29px;
    font-size: 12px;
}

.footer-ul li a {
    color: #fff;
    transition: color 0.2s linear 0s, background 0.2s linear 0s;
}

.footer-ul i {
    margin-right: 10px;
}

.footer-ul li a:hover {
    transition: color 0.2s linear 0s, background 0.2s linear 0s;
    color: #fff;
}

.social:hover {
    -webkit-transform: scale(1.1);
    -moz-transform: scale(1.1);
    -o-transform: scale(1.1);
}




.icon-ul {
    list-style-type: none !important;
    margin: 0px;
    padding: 0px;
}

.icon-ul li {
    line-height: 75px;
    width: 100%;
    float: left;
}

.icon {
    float: left;
    margin-right: 5px;
}


.copyright {
    min-height: 40px;
    background-color: #1565C0;
}

.copyright p {
    text-align: left;
    color: #FFF;
    padding: 10px 0;
    margin-bottom: 0px;
}

.heading7 {
    font-size: 14px;
    font-weight: 700;
    color: #6BBDF8;
    margin-bottom: 22px;
}

.post p {
    font-size: 12px;
    color: #FFF;
    line-height: 20px;
}

.post p span {
    display: block;
    color: #8f8f8f;
}

.bottom_ul {
    list-style-type: none;
    float: right;
    margin-bottom: 0px;
}

.bottom_ul li {
    float: left;
    line-height: 40px;
}

.bottom_ul li:after {
    content: "/";
    color: #FFF;
    margin-right: 8px;
    margin-left: 8px;
}

.bottom_ul li a {
    color: #FFF;
    font-size: 12px;
}

#pie3 {

    font-size: 12px;
    /*width:100%;*/
    height: 60px;
    font-family: "Segoe UI";
    font-style: normal;
    font-color: white;
    border-top-color: black;
    background: #005588;
    color: #FFFFFF;

}

/*menu_principal*/


.header {
    background-color: #3c8dbc
}

.header .dropdown-menu {
    position: absolute;
    right: 0;
    left: auto;
    border-radius: 0px;
}

.header .user-image {
    float: left;
    width: 25px;
    height: 25px;
    border-radius: 50%;
    margin-right: 10px;
    margin-top: -2px;
}

.header .navbar-light .navbar-nav .nav-link {
    color: #fff
}

.header .navbar-light .navbar-nav .nav-link:hover,
.header .navbar-light .navbar-nav .nav-link:focus {

    background: rgba(0, 0, 0, 0.1);
    color: #f6f6f6;
}

.header .fa.fa-fw.fa-bars {
    color: #fff;
}

.header .navbar-light .navbar-nav .nav-link {
    color: #fff;
    padding: 10px 20px;
    position: relative;
}

.header li>a>.label {
    position: absolute;
    top: 9px;
    right: 7px;
    text-align: center;
    font-size: 9px;
    padding: 2px 3px;
    line-height: .9;
    background-color: #333;
    border-radius: .25em;
}

.header li>a:after {
    display: none;
}

.header-ul {
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
    background-color: #ffffff;
    padding: 7px 10px;
    border-bottom: 1px solid #f4f4f4;
    color: #333;
    font-size: 14px;
}

.navbar-nav>.notifications-menu>.dropdown-menu,
.navbar-nav>.messages-menu>.dropdown-menu,
.navbar-nav>.tasks-menu>.dropdown-menu {
    width: 280px;
    padding: 0 0 0 0;
    margin: 0;
    top: 100%;
}

.navbar-nav>.messages-menu>.dropdown-menu li .menu>li>a>div>img {
    margin: auto 10px auto auto;
    width: 40px;
    height: 40px;
}

.navbar-nav>.messages-menu>.dropdown-menu li .menu>li>a,
.navbar-nav>.notifications-menu>.dropdown-menu li .menu>li>a {
    margin: 0;
    padding: 10px 10px;
    display: block;
    white-space: nowrap;
    border-bottom: 1px solid #f4f4f4;
}

.navbar-nav>.messages-menu>.dropdown-menu li .menu>li>a>h4 {
    padding: 0;
    margin: 0 0 0 45px;
    color: #333;
    font-size: 15px;
    position: relative;
}

.navbar-nav>.messages-menu>.dropdown-menu li .menu>li>a>p {
    margin: 0 0 0 45px;
    font-size: 12px;
    color: #888888;
}

li span {
    padding-right: 12px;
    font-size: 15px;
    cursor: pointer;
}

.navbar-nav li {
    cursor: pointer;
}
</style>
</head>

<body>

    <!--===================
        Header
        =======================-->
    <header class="header">
        <nav class="bg-blue navbar navbar-toggleable-md navbar-light pt-0 pb-0 "
            style="height: 53px;padding-top: 10px;margin-bottom: 0px;">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <a class="navbar-brand p-0 mr-5" href="#">
                <h5 style="color:#fff;">SISTEMA DE VEHICULOS</h5>
            </a>
            <div class="float-left">
                <input id="SolicitudBuscada" type='text' placeholder="Numero de solicitud" class="input"><strong
                    style=" color: white;"><label class="BuscaSolicitud">&nbsp;&nbsp;&nbsp;<i class="fa fa-search"
                            style="font-size:15px;hsl(0,0%,0%);"></i></label></strong>
            </div>
            <div class="collapse navbar-collapse flex-row-reverse " id="navbarNavDropdown" style="width:60%;">

                <ul class="navbar-nav col-xs-12 col-md-12 col-sm-12 col-lg-12">

                    <?php

			// require('conexion/conexion.php');

			if($resultado==true){

				while( $row = sqlsrv_fetch_array( $resultado, SQLSRV_FETCH_ASSOC) ) {
?>
                    <li class="nav-item dropdown  user-menu">
                        <img id="<?php echo $row['nombre_link'];?>" class="submenu user-image"
                            src="<?php echo $row['imagen'];?>" width="35" height="35">
                    </li>
                    <li class="nav-item dropdown  user-menu">
                        <span style="color: #FFFFFF; font-size: 12px;" class="submenu "
                            id="<?php echo $row['nombre_link'];?>"><?php echo $row['Nombre_lk'];?></span>
                    </li>
                    <?php }
			}
			else
			{
				echo "<script>alert('Error al intentar abrir menus');</script>";
			}?>

                    <li class="nav-item dropdown  user-menu">
                        <a id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"><img onClick="location.replace('../SistemaLogueo/sistemas.php');"
                                class="user-image" src="png/house.png" width="36" height="32" /></a>
                    </li>
                    <li class="nav-item dropdown  user-menu"><span class="hidden-xs" style="color:#fff;">Inicio</span>
                    </li>
                    <li class="nav-item dropdown  user-menu">
                        <img class="user-image" src="png/012_power-512.png" onClick="window.location.href='logout.php'">
                    </li>
                    <li class="nav-item dropdown  user-menu " onClick="window.location.href='logout.php'"><span
                            class="hidden-xs" style="color:#fff;">Salir</span></li>

                </ul>

            </div>
        </nav>
    </header>

    <div>
        <section>


            <div style="background: white;height: 980px;">
                <!--Div para el menu-->
                <div class="unidossiempre" id="Contenido_Menu" style="float:left;width:20%;">
                </div>
                <!--Div para el contenido-->
                <div class="unidossiempre" id="cont" style="max-width:100%; ">


                </div>
            </div>
        </section>
    </div>



</body>

</html>