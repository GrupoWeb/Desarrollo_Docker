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
    font-size: 12px;    margin: 10px;     width: 500px; text-align: center;    border-collapse: collapse; }

th {     font-size: 18px;     font-weight: normal;     padding: 8px;     background: #b9c9fe;
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
	
	
#estilo1{

background:#003399;
width:auto;
height:160px;


}

#pie3

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
	



    

.Estilo5 {font-size: 14px; font-weight: bold; }
.Estilo6 {
	font-size: xx-large;
	color: #0033CC;
	font-weight: bold;
}




</style>

<!DOCTYPE html>
<html>
<head>

<title>
consultas
</title>

<!-- Meta Tags -->

<!-- CSS -->



<link href="css/structure.css" rel="stylesheet">
<link href="css/form.css" rel="stylesheet">
<link href="css/theme.css" rel="stylesheet">
<link href="https://" rel="stylesheet">

<!--<link href="css/form.css" rel="stylesheet">-->

<!--<link href="https://" rel="stylesheet">-->


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



 
<!--[if lt IE 10]>
<script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

</head>

<a><DIV STYLE="position:fixed; bottom:0; height:60px; width:100%; background-color:#253E66"><p id="tit" align="center">EXPEDIENTES MINECO</span> </P>
  <p align="center">  &copy; 2015 <a href="http://www.mineco.gob.gt">MINISTERIO DE ECONOMIA</a> </div></a>
<body>
<div id="container" class="ltr" align="center">



<form id="form5" name="for	m5" class="wufoo topLabel page" accept-charset="UTF-8" autocomplete="off" enctype="multipart/form-data" method="post" novalidate
      action="">
  
<header id="header" class="info">
<h2>Consultas</h2>
</header>

<ul>
  <p><a href="javascript:mostrarOcultarTablas('tabla1')"> <img src="images/no atendida.png"></a>
  <div id="tabla1" style="display: none">
    <table align="center" border="1" bordercolor="#0066FF">
      <tr>
        <th >Id</th>
        <th > fecha</th>
        <th >hora </th>
        <th>solicitante </th>
        <th>usuario recibe </th>
        <th>Descripcion </th>
        <th>ver </th>
      </tr>
      <?
		include("../conexion/conexion.php");
	    $sql = " select
  ex.Fecha_ingreso, us.usuario,  ex.comentario,ex.id_expediente, es.usuario as p
 from  usuario as us inner join expediente as ex  on us.id_usuario = ex.Id_usuario
 inner join usuario as es on  es.id_usuario=ex.id_solicitante inner join  dependencia as dep on us.id_dependencia = dep.id_dependencia
 inner join estado as est on ex.id_estado=est.Id_estado where est.codigo_estado = 1 and ex.id_usuario= '$uen'";
$stmt = sqlsrv_query( $conn, $sql );

if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
	
}
while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
	   {
	    $date = ($row["Fecha_ingreso"]);
	    $ex=($row["id_expediente"]); 
        $t=$ex;     
 
echo "<tr><td>".$row["id_expediente"]."</td> ";	   
echo "<td >",date_format ($date,'d-m-y'),"</td> ";
echo "<td>",date_format ($date, 'H:i:s'),"</td> ";
echo "<td>".$row["p"]."</td> ";
echo "<td>".$row["usuario"]."</td> ";
echo "<td>".$row["comentario"]."</td>";
echo "<td> <a href='../versolicitud/versolicitud.php?ex=$t' >  <img src='images/lupas.png' width='24' height='22'> </td> </tr>";


}


sqlsrv_free_stmt( $stmt);		
?>
    </table>
  </div>
  <p><a href="javascript:mostrarOcultarTablas('tabla2')"><img src="images/en proceso.png"></a></label>
   <div id="tabla2" style="display: none">
     <table align="center" border="1"  >
<tr>
<th >Id</th>
<th > fecha</th>
<th >hora </th>
<th>Usuario transfiere</th>
<th>usuario recibe </th>
<th>Comentario </th>
<th>ver </th>
</tr>
<?
		
	    $sql = "select mov.id_movimiento, mov.id_expediente, mov.fecha_traslado, us.usuario, usua.usuario as d, mov.comentarios from movimiento as mov inner join usuario as us
	on us.id_usuario = mov.id_usuario inner join usuario as usua on usua.id_usuario = mov.usuario_recibe  
		where  mov.id_estado=2 and mov.usuario_recibe='$uen' ";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
	
}
while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
	   {
  $date = ($row["fecha_traslado"]);
	   
  $ex=($row["id_expediente"]); 
        $t=$ex;     
	
echo "<tr><td width='1%' >".$row["id_expediente"]."</td> ";	   
echo "<td >",date_format ($date,'d-m-y'),"</td> ";
echo "<td>",date_format ($date, 'H:i:s'),"</td> ";
echo "<td>".$row["usuario"]."</td> ";
echo "<td>".$row["d"]."</td> ";
echo "<td>".$row["comentarios"]."</td>";
echo "<td> <a href='../versolicitud/versolicitud.php?ex=$t' >  <img src='images/lupas.png' width='24' height='22'> </td> </tr>";


}


sqlsrv_free_stmt( $stmt);		
?>
</table>
</div>
  <p><a href="javascript:mostrarOcultarTablas('tabla3')"> <img src="images/finalizadas.png"> </a> </label>  
  <div>
 <div id="tabla3" style="display: none">
    <table align="center" border="1"  >
<tr>
<th >Id</th>
<th > fecha</th>
<th >hora </th>
<!-- <th>solicitante </th> -->
<th>usuario finalizao </th>
<th>Descripcion </th>
<th>ver </th>
</tr>
<?
		
	    $sql = "select mov.id_movimiento, mov.id_expediente, mov.fecha_traslado, us.usuario, usua.usuario as d, mov.comentarios from movimiento as mov inner join usuario as us
	on us.id_usuario = mov.id_usuario inner join usuario as usua on usua.id_usuario = mov.usuario_recibe  
		where  mov.id_estado=3 and mov.usuario_recibe='$uen'";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
	
}
while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
	   {
  $date = ($row["fecha_traslado"]);
    $ex=($row["id_expediente"]); 
        $t=$ex;     
	   

	
echo "<tr><td width='1%' >".$row["id_expediente"]."</td> ";	   
echo "<td >",date_format ($date,'d-m-y'),"</td> ";	
echo "<td>",date_format ($date, 'H:i:s'),"</td> ";	
//echo "<td>".$row["p"]."</td> ";
echo "<td>".$row["usuario"]."</td> ";
echo "<td>".$row["comentarios"]."</td>";
echo "<td> <a href='../versolicitud/versolicitud.php?ex=$t' >  <img src='images/lupas.png' width='24' height='22'> </td> </tr>";


}


sqlsrv_free_stmt( $stmt);		
?>
</table>
</div>
</p>
</form> 

</div><!--container-->
</body>




</body>


</p>

</html>
