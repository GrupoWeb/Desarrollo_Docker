<?
session_start();
include('../../conexion/conexion.php');

$usn=$_SESSION['usern'];

$sql = "select apellido , nombre, id_usuario from usuario where usuario='$usn'";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
//echo	  "hola".$row["nombre"]."  ".$row["apellido"]."</option>"; 
$ap=$row["apellido"];
 $nom=$row["nombre"];
 $uen=$row["id_usuario"];

}
sqlsrv_free_stmt( $stmt);	
?>
<style>
/* Curso CSS estilos aprenderaprogramar.com*/
body {font-family: Arial, Helvetica, sans-serif;}

table {     font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
    font-size: 10px;    margin: 8px;     width: 90%; text-align: center;    border-collapse: collapse; }

th {     font-size: 14px;     font-weight: normal;     padding: 7px;     background: #b9c9fe;
    border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039; }

td {    padding: 15px;     background: #e8edff;     border-bottom: 1px solid #fff;
    color: #669;    border-top: 1px solid transparent; }

tr:hover td { background: #d0dafd; color: #339; }



#main-header {
    background: white;
    top: 0;
    position: fixed;
	z-index: 1;
}   
    #main-header a {
        color: white;
    }
    
   
   
   
   
#main-content {
    background: white;
    margin: 20px auto;
    box-shadow: 0 0 10px rgba(0,0,0,.1);
	 position: relative;
	 top:250px;
}

    #main-content header,
    #main-content .content {
        padding: 40px;
    }
    
	
#pie

{
width:auto;
height:12px;


font-size:15px;
font-family:"Segoe UI";
font-style:normal;
font-color:white;
border-top-color:black;
background:#0099FF


}


#pie2

{
	font-size:12px;
	width:800px;
	font-family:"Segoe UI";
	font-style:normal;
	font-color:black;
	border-top-color:#666666;
	background:white;
	color: black;
	right: 300cm;

}
	
	#pie2

{
	font-size:12px;
	width:900px;
	font-family:"Segoe UI";
	font-style:normal;
	font-color:black;
	border-top-color:#666666;
	background:white;
	color: black;
	right: 300cm;

}
	
	
#estilo1{

background:#003399;
width:auto;
height:160px;


}

#tit

{
	font-size:12px;
	width:auto;
	height:80px;
	font-family:"Segoe UI";
	font-style:normal;
	font-color: white;
	border-top-color:black;
	background:#999999;
	color:#FFFFFF;
	right: 300cm;

}


#tit
{
font-size:12px;
font-family:Arial, Helvetica, sans-serif;

}
.Estilo8 {color: #FFFFFF}
.Estilo9 {font-size: 14px}
.Estilo10 {font-size: 16px}
</style>
<!DOCTYPE html>
<html>
<head>

<title>
consultas
</title>

<!-- Meta Tags -->

<!-- CSS -->

<link href="css/form.css" rel="stylesheet">

<link href="https://" rel="stylesheet">


<!-- JavaScript -->
<script src=></script>
 <script>
function mostrarOcultarTablas(id){
mostrado=0;
elem = document.getElementById(id);
if(elem.style.display=='block')mostrado=1;
elem.style.display='none';
if(mostrado!=1)elem.style.display='block';
}
</script>


<body>
 
<!--[if lt IE 10]>
<script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>
<DIV class="Estilo8" STYLE="position:fixed; bottom:0; height:69px; width:100%; background-color:#253E66">
  
  
  <p  id="pie3" align="center"><a class="Estilo9">EXPEDIENTES MINECO</span> </a></P>
<p align="center">  <a class="Estilo10">&copy; 2015  MINISTERIO DE ECONOMIA </a></div>
<body aling="center">
<div id="container" class="ltr" align="center">


<blockquote>&nbsp;</blockquote>
<form id="form5" name="for	m5" class="wufoo topLabel page" accept-charset="UTF-8" autocomplete="off" enctype="multipart/form-data" method="post" novalidate
      action="">
  
<header id="header" class="info" >
<h2>Consultas</h2>
</header>

<ul>
  <!--<p><a href="javascript:mostrarOcultarTablas('tabla1')"> <img src="images/no atendida.png"></a>
  <div id="tabla1" style="display: none left:43px; top:42px;
width:620px; height:500px; z-index:1; overflow: scroll">-->
    <table align="center" border="1" bordercolor="#0066FF"  >
      <tr>
        <th >No. Expediente</th>
        <th > Fecha</th>
        <th >Hora </th>
        <th>Solicitante </th>
        <th >Usuario que Recibe </th>
        <th>Descripcion </th>
        <th>Ver</th>
		<th>Recibir Exp.</th>
		<th>Estado de Exp. Recidibo</th>
      </tr>
<?
		
		
		
		 $año = date ('Y');
		
	    $sql = " select  
  ex.Fecha_ingreso, us.nombre,us.apellido,  ex.comentario,ex.id_expediente, es.nombre as p , es.apellido as a, spt.Estado as nota, spt.paht as th
 from  usuario as us inner join expediente as ex  on us.id_usuario = ex.Id_usuario
 inner join usuario as es on  es.id_usuario=ex.id_solicitante inner join  dependencia as dep on us.id_dependencia = dep.id_dependencia
 inner join estado as est on ex.id_estado=est.Id_estado inner join estado as spt on ex.id_recibido = spt.Id_estado where est.codigo_estado = 1 and ex.id_usuario= '$uen' order by  ex.id_expediente desc";
$stmt = sqlsrv_query( $conn, $sql );

if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
	
}
while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
	   {
	    $date = ($row["Fecha_ingreso"]);
	    $ex=($row["id_expediente"]); 	
        $t=$ex;     
		$thr=$row["th"];
 
echo "<tr><td> SG-".$row["id_expediente"]."-".$año."</td> ";	   
echo "<td >",date_format ($date,'d-m-y'),"</td> ";
echo "<td>",date_format ($date, 'H:i:s'),"</td> ";
echo "<td>".$row["p"]."".$row["a"]."</td> ";
echo "<td>".$row["nombre"]." ".$row["apellido"]." </td> ";
echo "<td>".$row["comentario"]."</td>";
echo "<td> <a href='../versolicitud/versolicitud.php?ex=$t' >  <img src='images/lupas.png' width='24' height='22'> </td></a>";
echo "<td><a href='recibido.php?ex=$t' >  <img src='images/$thr' width='24' height='22' > </td></a>";
echo "<td>".$row["nota"]." </td> </tr>";


}


sqlsrv_free_stmt( $stmt);		
?>

