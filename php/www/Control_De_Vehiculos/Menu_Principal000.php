<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
  <title>Menu control de vehiuclos</title>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 550px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
        
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;}
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Control de vehiculos MINECO</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="Formulario_Ingreso_Solicitud.php">Ingreso de nueva solicitud</a></li>
        <li><a href="#">Aprobar solicitudes</a></li>
        <li><a href="#">Autorizar solicitudes</a></li>
        <li><a href="#">Imprimir solicitud</a></li>
		<li><a href="#">Reportes</a></li>
		<li><a href="SubMenu_ABC.php">ABC</a></li>
		<li><a href="#">Salir</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
      <h2>Control de vehiculos MINECO</h2>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="Formulario_Ingreso_Solicitud.php">Ingreso de nueva solicitud</a></li>
        <li><a href="#">Aprobar solicitudes</a></li>
        <li><a href="#">Autorizar solicitudes</a></li>
        <li><a href="#">Imprimir solicitud</a></li>
		<li><a href="#">Reportes</a></li>
		<li><a href="SubMenu_ABC.php">ABC</a></li>
		<li><a href="#">Salir</a></li>
      </ul><br>
    </div>
    <br>
  <div id = "Informacion" class="col-sm-9">
      <div class="well">
        <table width="67%" height="612" >
  <tr>
    <td height="750"><table width="750"   align="center">
  <tr>
    <td><center> <span style="font-size:40px;color:black; font-family: Segoe UI">Control Registro de Expedientes</span> </center></td>
  </tr>
</table>
    <table width="400" align="left">
  <tr>
    <td><center>  <span style="font-size:30px;color:black; font-family: Segoe UI"> Misión </center></td>
  </tr>
  <br />
  <br />
   <tr>
    <td align="justify"> <span style="font-size:15px;color:black; font-family: Segoe UI"> "Administración eficiente, eficaz y transparente de los recursos humanos, técnicos y materiales del Ministerio de Economía de Guatemala, atendiendo los requerimientos de unidades sustantivas de los Viceministerios de Inversión y Competencia, Integración y Comercio Exterior y el de Desarrollo de la Micro, Pequeña y Mediana Empresa."</span></td>
</table>
	


		<table width="400" align="right">
  <tr>
    <td><center>  <span style="font-size:30px;color:black; font-family: Segoe UI">Visión </center></td>
  </tr>
   <tr>
   
    <td align="justify">  <span style="font-size:15px;color:black; font-family: Segoe UI">  "Ser una Unidad de apoyo a todas las unidades administrativas del Despacho del Ministro de Economía, vanguardista en el uso de métodos de trabajo y de comunicación moderna, así como ser un modelo estatal de desempeño en la prestación de servicios, respondiendo a las expectativas de los usuarios internos y externos.</span>	</td>
  </tr>
</table>
	<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<table width="300"  align="center">
 <br />
  <br />
   <br />
  <br />
  <tr>
    <td><center> <span style="font-size:30px;color:black; font-family: Segoe UI">Politica de Calidad</center></td>
  </tr>
   <tr>
    <td " align="justify"> <span style="font-size:15px;color:black; font-family: Segoe UI" >Brindar un servicio de excelencia, eficiente, oportuno y transparente dentro del esquema de mejora continua, implementado a través del Recurso Humano capacitado y un modelo Internacional de gestión, organización y documentación.</td>
  </tr>
</table>	</td>
  </tr>
</table>
      </div>
</body>
</html>