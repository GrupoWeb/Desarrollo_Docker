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
  $correo=$row["correo"]; 
}
sqlsrv_free_stmt( $stmt);	

?>




<!DOCTYPE html>
<html>
<head>

<title>
Ver Solicitud
</title>

<!-- Meta Tags -->

<!-- CSS -->
<link href="css/structure.css" rel="stylesheet">
<link href="css/form.css" rel="stylesheet">
<link href="css/theme.css" rel="stylesheet">
<link href="https://" rel="stylesheet">
<link href="generic-notForMcTabs.css" rel="stylesheet" type="text/css" />	
<link href="template1/mctabs.css" rel="stylesheet" type="text/css" />
<!-- JavaScript -->
<script src="scripts/wufoo.js"></script>
<script src="scripts/wufoo.js"></script>
<script src="javascript-tabs.js" type="text/javascript"></script>

<script src="./menuscript/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript" charset="utf-8">
	$(function(){
		$('#menu li a').click(function(event){
			var elem = $(this).next();
			if(elem.is('ul')){
				event.preventDefault();
				$('#menu ul:visible').not(elem).slideUp();
				elem.slideToggle();
			}
		});
	});
	</script>
	<style type="text/css" media="screen">
		#menu{
			-moz-border-radius:5px;
			-webkit-border-radius:5px;
			border-radius:5px;
			-webkit-box-shadow:1px 1px 3px #888;
			-moz-box-shadow:1px 1px 3px #888;
		}
		#menu li{border-bottom:1px solid #FFF;}
		#menu ul li, #menu li:last-child{border:none}	
		a{
			display:block;
			color:#FFF;
			text-decoration:none;
			font-family:'Helvetica', Arial, sans-serif;
			font-size:13px;
			padding:3px 5px;
			text-shadow:1px 1px 1px #325179;
		}
		#menu a:hover{
			color:#F9B855;
			-webkit-transition: color 0.2s linear;
		}
		#menu ul a{background-color:#6594D1;}
		#menu ul a:hover{
			background-color:#FFF;
			color:#2961A9;
			text-shadow:none;
			-webkit-transition: color, background-color 0.2s linear;
		}
		ull{
			display:block;
			background-color:#2961A9;
			margin:0;
			padding:0;
			width:130px;
			list-style:none;
		}
		#menu ul{background-color:#6594D1;}
		#menu li ul {display:none;}
	</style>
	
	
	<style type="text/css"> 
<!-- 
.estilo1 { 
font-family: Arial, Helvetica, sans-serif; 
font-size: 12px; 
color: #003366; 
} 
.estilo2 { 
color: #990000; 
font-weight: bold; 
} 
.estilo3 {font-family: Arial, Helvetica, sans-serif; font-size: 11px; color: #660099; } 



body {font-family: Arial, Helvetica, sans-serif;}

table {     font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
    font-size: 12px;    margin: 10px;     width: 500px; text-align: center;    border-collapse: collapse; }

th {     font-size: 18px;     font-weight: normal;     padding: 8px;     background: #b9c9fe;
    border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039; }

td {    padding: 15px;     background: #e8edff;     border-bottom: 1px solid #fff;
    color: #669;    border-top: 1px solid transparent; }

tr:hover td { background: #d0dafd; color: #339; }
--> 
.Estilo5 {
	color: #EFEFEF;
	font-size: 12px;
}
.Estilo6 {font-size: 12px}



menuc
{
border:1;
left:80px;

}
#main
{
width:170px
}








#contenido
{
width:50%;
background-color:white;

}
--> 
    </style>

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
<center>
<body id="public">
<div id="contenido" class="ltr">

<a><img src="../Captura.PNG" width="100%" height="32"></a>

  <link rel="stylesheet" href="emer/css/estilos.css">
<header id="header" class="info">
<h2>Actualizar Expediente</h2>
</header>

<ul>

<li id="foli1" class="notranslate      ">

  

  
  

    <? 
 while($row) 
	   {
	    $date = ($row["Fecha_ingreso"]);
	    $ex=($row["id_expediente"]); 
		
       }
  	$cor=$_REQUEST["ex"];
	
	  $año = date ('Y');
	
  echo " EXPEDIENTE NO.  SG-",$cor,"-",$año,"<br>";
  
  $k=$cor;
  
  
  ?>
  
  
  
  
		

<?
		
		
		
		 $año = date ('Y');
		
	    $sql = " select * from expediente id_expediente    where id_expediente='$cor'


";
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
 

}


sqlsrv_free_stmt( $stmt);		
?>




		  <form action=''  method='post' enctype='multipart/form-data' name='form2'>
	<table width='300'  border='1'>
  <tr>
    <td>Expediente: </td>
    <td>
      <div align="center">
         <? echo "$cor";?>
		
		   
      </div></td>
  </tr>
  
   <tr>
    <td>Empresa: </td>
    <td>
      <div align="center">
         <? echo $row["id_expediente"] ?>
      </div>
	  </td>
  </tr>
  
  <tr>
    <td>Nombre de la Marca </td>
    <td>
      <div align="center">
        <input type='text' size='30' name='a' value='<? echo $row["id_empresa"] ?>'/>
      </div></td>
  </tr>
  
  
  
 
  
  
  
  
   <tr>
    <td>Numero de Folio </td>
    <td>
      <div align="center">
        <input type='text' size='30' name='b' value='<? echo $row["nombre1"] ?>'/>
      </div></td>
  </tr>
  
  
  
  
   <tr>
    <td>Tipo de Solicitud</td>
    <td>
      <div align="center">
        <input type='text' size='30' name='c' value='<? echo $row["nombre2"] ?>'/>
      </div></td>
  </tr>
  
  
  
   <tr>
    <td>Numero de Propiedad Industrial </td>
    <td>
      <div align="center">
        <input type='text' size='30' name='d' value='<? echo $row["nombre3"] ?>'/>
      </div></td>
  </tr>
  
  
   <tr>
    <td>Dependencia </td>
    <td>
      <div align="center">
        <input type='text' size='30' name='e' value='<? echo $row["apellido1"] ?>'/>
      </div></td>
  </tr>
  
  
   <tr>
    <td>Usuario </td>
    <td>
      <div align="center">
        <input type='text' size='30' name='f' value='<? echo $row["apellido2"] ?>'/>
      </div></td>
  </tr>
  
  
   <tr>
    <td>Adjunto Documento </td>
    <td>
      <div align="center">
        <input type='text' size='30' name='g' value='<? echo $row["apellido_casada"] ?>'/>
      </div></td>
  </tr>
  
  
   <tr>
    <td>Descripcion Solicitud </td>
    <td>
      <div align="center">
        <input type='text' size='30' name='h' value='<? echo $row["dpi"] ?>'/>
      </div></td>
  </tr>

    <tr>
    <td>Desea actualizar? </td>
    <td> <div align="left">
      <select name='usde'> 
        
        <option value=0>- NO -</option>
        ; 


        <option value=1>- SI -</option>
        ; 

      
      </select>
      
      <input type='submit' value='procesar' /> 
    </div></td>
  </tr>
</table>
	
	
	 
   <?
						







  ?>
  

	     
	     
       <!--container-->
	     
	     
       </body>