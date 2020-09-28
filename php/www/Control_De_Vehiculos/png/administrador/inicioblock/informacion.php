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


<?

session_start();

?>


<style type="text/css">
<!--
text {
	color: white;
	
	font-size: 20px;
	font-family: Segoe UI;
	text-align: right;
}


/* Curso CSS estilos aprenderaprogramar.com*/
body {font-family: Arial, Helvetica, sans-serif;}


th {     font-size: 9px;     font-weight: normal;     padding: 8px;     background: #b9c9fe;
    border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039; }

td {    padding: 8px;     background: #e8edff;     border-bottom: 1px solid #fff;
    color: #669;    border-top: 1px solid transparent; }

tr:hover td { background: #d0dafd; color: #339; }

{
    margin: 0;
    padding: 0;
    border: 0;
    position: relative;
  }
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
	width:1387px;
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
font-size:24px;
font-family:Arial, Helvetica, sans-serif;

}

#pagina
{height:auto;
}


#div1 {
 position:absolute;
 top:10%;
 left:20px;
 width:350px;
 height:680px;
 background:white;
}
.Estilo11 {font-size: 16px}
</style>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Expedientes Mineco</title>
</head>
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
<body bgcolor="#FFFFFF" id="pagina">

<p><br />	
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="67%" height="612" style="position:absolute;top:80px;left:28%;">
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





    
<?

	    $sql = " select  count(*) as numero from expediente where id_estado=1 and id_usuario= '$uen'";
$stmt = sqlsrv_query( $conn, $sql );

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
	   {
	    $no = ($row["numero"]);

}


sqlsrv_free_stmt( $stmt);		
?>


<?

	    $sql = " select  count(*) as numero from movimiento where id_estado=2 and usuario_recibe =	'$uen'";
$stmt = sqlsrv_query( $conn, $sql );

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
	   {
	    $noA = ($row["numero"]);

}


sqlsrv_free_stmt( $stmt);		
?>




<?
		
	    $sql = " select  count(*) as numero from movimiento where id_estado=3 and usuario_recibe = '$uen'";
$stmt = sqlsrv_query( $conn, $sql );

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
	   {
	    $noB = ($row["numero"]);

}


sqlsrv_free_stmt( $stmt);		
?>




<?
		
	    $sql = " select  count(*) as numero from movimiento where id_estado=18 and usuario_recibe= '$uen'";
$stmt = sqlsrv_query( $conn, $sql );

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
	   {
	    $noc = ($row["numero"]);

}


sqlsrv_free_stmt( $stmt);		
?>








  
<header id="header" class="info" >
<table border="0">

<tr>
<td colspan="3"><span class="Estilo11"><center>NOTICIAS </td> 

</tr>

<tr>
<td >EXPEDIENTES NO ATENDIDOS : </td> <td><? echo $no; ?> </td>
<td><a href="..\consulta/noantendidas.php"/>VER</A></td>
</tr>

<tr>
<td >EXPEDIENTES EN PRECESO : </td> <td><? echo $noA; ?> </td>
<td><a href="..\consulta/proceso.php"/>VER</A></td>
</tr>

<tr>
<td >EXPEDIENTES FINALIZADOS : </td> <td><? echo $noB; ?> </td>
<td><a href="..\consulta/finalizada.php"/>VER</A></td>
</tr>

<tr>
<td >EXPEDIENTES FUERA DE MINECO : </td> <td><? echo $noc; ?> </td>
<td><a href="..\consulta/exterior.php"/>VER</A></td>
</tr>

</div>





</body>

</html>
