<? 
session_start();
include('../../conexion/conexion.php');

$usn=$_SESSION['usern'];

$sql = "select usuario from usuario where usuario='$usn'";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
//echo	  "hola".$row["usuario"]."  ".$row["apellido"]."</option>"; 
//$ap=$row["apellido"];
$nom=$row["usuario"];

}
sqlsrv_free_stmt( $stmt);	



if ($_GET['action']=='exit')
{
  session_destroy();
?>

 <meta http-equiv="refresh" target="true" content="0;url=http://128.5.8.40">
 
<? } ?>

  <style type="text/css">
<!--
.Estilo1 {
	color: #FFFFFF;
	
	font-size: 20px;
	font-family: Segoe UI;
	text-align: right;
}



--> empieza 

{
				margin:1px;
				padding:0px;
			}
			
			#header {
				margin:inherit;
				width:1540px;
				font-family:Arial, Helvetica, sans-serif;
				
				
				
			}
			
			ul, ol {
				list-style:none;
			}
			
			.nav > li {
				float:left;
			}
			
			.nav li a {
				background-color:white;
				color:black;
				text-decoration:none;
				padding:18px 46px;
				display:block;
			}
			
			.nav li a:hover {
				background-color:#DAA520;
			}
			
			.nav li ul {
				display:none;
				position:absolute;
				min-width:240px;
			}
			
			.nav li:hover > ul {
				display:block;
			}
			
			.nav li ul li {
				position:relative;
			}
			
			.nav li ul li ul {
				right:-240px;
				top:10px;
			}
			
			
			#cabeza
			{
			width:50px;
			height:40px;
			
		
			
			
			}
			
			
			#sesion
			
			{
			
				margin:auto;
				width:15px;
				font-family:Arial, Helvetica, sans-serif;
			
			}
			
			
			
			#titulo
			{
			font-size:35px;
			font-family:"Segoe UI";
			}
			
			#salir
			{
			background:red;
			}
			
			--> termina


<link rel="stylesheet" href="CSS3 Menu.html.css3prj_files/css3menu1/style.css" type="text/css" /><style type="text/css">
._css3m{display:none}


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
    

#menu
{
color:#FFFFFF;
font-family:"Segoe UI";
font-size:9px;

}


#Estilo2
{
font-size:10px;

}


#head
{
font-size:20px;
color:#FFFFFF;
font-family:"Segoe UI";
font-weight:500;
}

input
{
    background:url(../png/index_ico_lupa.gif) no-repeat scroll 0 0 transparent;
    border: 1px solid #BFBFBF;
    color: #BFBFBF;
    padding: 1px 1px 1px 20px;
    width: 230px;
}

input.submit
{
    width: auto;
    background-position: 4px -91px;
    background-color: #999999;
    color: #FFFFFF;
    cursor: pointer;
}

input.user{ background-position: 5px -21px; }
input.search{ background-position: 12px 5px; }



.verticalLine {
    border-left: thick solid #FFFFFF;
	height:40px;
	width:0;
	}
-->
</style>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />   <!-- permite mostrar tildes -->

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
   <link rel="stylesheet" type="text/css" href="css/site.css" />
   <script type="text/javascript" src="../../js/cssrefresh.js"></script>
</head>

<body bgcolor="#005588">





<!-- Start css3menu.com BODY section -->
	<!--<div id="header" >
	<ul class="nav" class="topmenu">
	<li class="topfirst"><a href="../ingreso.php" target="despliegue"  style="height:22px;line-height:22px;">Ingreso</a></li>
	<li class="espa"><style="height:22px;line-height:22px;>&nbsp;</a></li>
	<li class="topfirst"><a href="../consulta/consulta.php" target="despliegue" style="height:22px;line-height:22px;">Pendientes</a></li>
	<li class="espa"><style="height:22px;line-height:22px;>&nbsp;</a></li>
	<li class="toplast"><a href="../consulta_especifica/consultaespesifica.php" target="despliegue" style="height:22px;line-height:22px;">Consulta Especifia</a></li>
	<li class="espa"><style="height:22px;line-height:22px;>&nbsp;</a></li>
	<li class="toplast"><a href="../ingresoempresa/ingresoem.php" target="despliegue" style="height:22px;line-height:22px;">Ingrese empresas</a></li>
	<li class="espa"><style="height:22px;line-height:22px;>&nbsp;</a></li>
	<li class="toplast"><a href="../admin/admin.php" target="despliegue" style="height:22px;line-height:22px;">Admin</a></li>
	<li class="espa"><style="height:22px;line-height:22px;>&nbsp;</a></li>
	<li id="salir" class="toplast"><a href="?action=exit" target="_parent"" style="height:22px;line-height:22px;">Salir </a></li>
    
</ul>-->



<table border="0" width="100%">

<tr>
<td width="240" id="head">&nbsp; EXPEDIENTES MINECO </td>
<td width="10">&nbsp;</td>
   <td width="384">
  
  
  
   <form method='post' novalidate class="search"
      action='../consulta_especifica/versolicitudc.php' target="despliegue">
	
  <input name='pet' type='text' value='' size='5' maxlength='5'>
   </form>  </td>


<td width="49" id="menu"><p><a href="../ing.php" target="despliegue"> <img src="../png/1114_1727_48.png" width="35" height="35"></a>
<td width="61" id="menu"></a>Ingresar <br>
  Expediente </p>  </td>
  


<td width="49" id="menu"><a href="../consul.php" target="despliegue"><img src="../png/124519_43542_128.png" width="35" height="35"></a>
<td width="66" id="menu"></a>Expedientes <br>
  Pendientes </p>  </td>



<td width="49" id="menu"><a href="../consulta_especifica/cons.php" target="despliegue"><img src="../png/107823_25195_128.png" width="35" height="35"></a>
<td width="52" id="menu"></a>Consultas</td>



<td width="49" id="menu"><a href="../ingresoempresa/cons.php" target="despliegue"><img src="../png/124648_43671_128.png" width="35" height="35"></a><br> 
<td width="81" id="menu"></a>Mantenimiento <br>
   </p>  </td>
  

<td width="49" id="menu"><a href="../reporte/cons.php" target="despliegue"><img src="../png/107834_25198_128.png" width="35" height="35"></a><br> 
<td width="50" id="menu"></a>Reportes </p>  </td>


<td width="49" id="menu"><a href="../admin/consul.php" target="despliegue"><img src="../png/119037_36610_128.png" width="35" height="35"></a> <br>
<td width="38" id="menu"></a>Admin </p>  </td>
  <td width="112">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
  <td width="72" id="menu"><div align="left"><a href="../../sice.php" target="_parent"><img src="../../house.png" width="36" height="32"> </a>Inicio</div></td>
  

<td width="60" id="menu"> <span class="Estilo2"> Bienvenido:<br> 
 <img src="../png/2441_3503_128.png" width="20" height="20" align="center"> <?  echo  "&nbsp;",$nom," ";?></span></center></td>

<td width="74" id="menu"><a href="?action=exit" target="_parent"><img src="../png/012_power-512.png" width="35" height="35"> </a>Salir</td>
</tr>
</table>	
</body>
</html>
