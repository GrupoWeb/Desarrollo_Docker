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

menuz
{
border:1;
}

#main
{
width:170px
}
#public{
		
		width:100%;
		height:100%;
		}
--> 

#contenido
{
width:50%;
background-color:white;
}

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



	
	


</head>
<center>
<body id="public">
<div id="contenido" class="ltr">
<a><img src="../Captura.PNG" width="100%" height="32"></a>
  
<header id="header" class="info">
<h2>Ver Solicitud</h2>
</header>

<ul>

<li id="foli1" class="notranslate      ">
  <div>
  
  <p>
  
  

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
  
  
  
  
  
 				// envio de correo al abrir la notifiacion.



		$sqlls="	 select expt.Id_expediente, expt.id_solicitante, usert.nombre, usert.apellido, usert.correo		 
		  from expediente as expt inner join
		  usuario as usert on expt.id_solicitante = usert.id_usuario   where expt.Id_expediente = '$cor'";
		$stmtss = sqlsrv_query( $conn, $sqlls);
	
	 while( $ff = sqlsrv_fetch_array( $stmtss, SQLSRV_FETCH_ASSOC) ){ 
 
 //informacino del usuario que envio el expediente
 $correosolic= $ff['correo']; 
 $nombresolic=     $ff['nombre']; 
 $apellidosolic=     $ff['apellido'];
 
 
 }
 
 
 
 
 
 		$sqlls="select top 1  expt.Id_expediente, usert.nombre, usert.apellido, usert.correo, est.Estado,dept.Nombre_dependencia		 
		  from movimiento as expt inner join
		  usuario as usert on expt.usuario_recibe = usert.id_usuario  inner join 
		  estado as est on expt.id_estado = est.Id_estado inner join dependencia as dept on 
		  dept.id_dependencia = usert.id_dependencia
		    where expt.Id_expediente = '$cor'   order by id_movimiento desc";
		$stmtss = sqlsrv_query( $conn, $sqlls);
	
	 while( $ff = sqlsrv_fetch_array( $stmtss, SQLSRV_FETCH_ASSOC) ){ 
 
  //informacino del usuario que recibio el correo 
 $correoreb= $ff['correo']; 
 $nombrereb=     $ff['nombre']; 
 $apellidoreb=     $ff['apellido'];
 $dependenciareb= $ff ['Nombre_dependencia'];
 $estadoexp = $ff['Estado'];
 
 
 
 }
 
 



$Fecha= date('d-m-Y');

$Ho= date('H:i:s');


$hr = $Ho-1;
$Hora= date('i:s');


    $para = $correosolic; 
     $nombre = $nombresolic;
	 $asunto = "Revision de expedinte No. SG-$cor-$año";
	 $mensaje = "Estimado(a), $nombresolic $apellidosolic 
	
	Gusto en saludarle,
	
	Por este medio le informo que el dia de hoy  $Fecha siendo  $hr:$Hora hrs
	mi persona $nombrereb $apellidoreb de $dependenciareb 
	visualizo el  expediente No.  SG-$cor-$año que se encuentra en $estadoexp. 
	
	Para verificar el expediente ingrese al siguiente link
	http://128.5.101.78:8080/
	
	Saludos.
	

	
	";
	$de = "$nombrereb".$apellidoreb." ".$correoreb;
	
	
//	$headers = "MIME-version:1.0;\r\n";
//	$headers .= "Content-type: text/html; \r\n charset=iso-8859-1; \r\n";
//	$headers .= "From: $de \r\n";
//	$headers .= "To: $para; \r\n subject:$asunto \r\n";
	
	
	$headers = 'From: ' .$de. "\r\n" .
    'Reply-To: admin@dayshare.local' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

   //if( mail($para, $titulo, $mensaje, $cabeceras))
	
	
mail($para,$asunto,$mensaje,"De: admin@dayshare.local \ r \ nX-Mailer: PHP")

  
  








  
  
  
  
  
  
  
  ?>
  </p>

   <table width="180" height="165"  align="right" id="main">
                  
                
                <tr>
      <td>

<ull id="menu">
<li><a href="./menuscript/jQuery.htm">Menu opciones</a>
	<ul style="display: block;">
		<li><? echo " <a href='../traslados/traslados.php?d=$k'>          "	?>  Trasferir</a></li>
		<li><? echo " <a href='../observaciones/observaciones.php?d=$k'>  "?>Observaciones</a></li>
		<li><? echo " <a href='../exterior/exterior.php?d=$k'>            "?>Exp. Exterior</a></li>
		<li><? echo " <a href='../adjunto/adjunto.php?d=$k'>              "	?>Adjuntos</a></li>
		<li><? echo " <a href='../finalizado/finalizado.php?d=$k'>              "	?>Finalizar</a></li>
	</ul>
</li>	  

      </td>
    
  </table>
  
  
    <table align="lefth" width="10%"    >
      
       <?

	
	    $sql = "select empt.nombre_empresa, expe.Fecha_ingreso, soli.Nombre_solicitud, us.nombre, us.apellido, usp.nombre as nom ,usp.apellido as ape, dep.Nombre_dependencia, expe.Comentario from expediente as expe inner join usuario as us 
on  expe.Id_usuario=us.id_usuario inner join dependencia as dep on us.id_dependencia= dep.id_dependencia inner join Solicitud as soli 
on soli.id_solicitud = expe.id_solicitud inner join usuario as usp on usp.id_usuario = expe.id_solicitante inner join empresa as empt
on expe.Id_empresa = empt.id_empresa 
 where expe.Id_expediente = '$cor'" ;
$stmt = sqlsrv_query( $conn, $sql );

if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
	
}
while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
	   {
	    $date = ($row["Fecha_ingreso"]);
	   


		echo "<tr><td bgcolor='#FFFFCC' width='50%'>   Fecha y Hora de Solicitud: </td> ";	   
				echo "<td >",date_format ($date,'d-m-y / H:i:s '),"</td> </tr>";
		echo "<tr><td bgcolor='#FFFFCC' width='50%'>   Tipo de solicitud:  </td> ";	
				echo "<td>".$row["Nombre_solicitud"]."</td> </tr> ";
		echo "<tr><td bgcolor='#FFFFCC' width='50%'>  Usuario recibe: </td> ";
				echo "<td>".$row["nombre"]." ".$row["apellido"]."</td> </tr> ";
		echo "<tr><td bgcolor='#FFFFCC' width='50%'>   Dependencia:  </td> ";
				echo "<td>".$row["Nombre_dependencia"]."</td></tr>";
		echo "<tr><td bgcolor='#FFFFCC' width='50%'>  Solicitante: </td> ";
				echo "<td>".$row["nom"]." ".$row["ape"]."</td> </tr> ";
		echo "<tr><td bgcolor='#FFFFCC' width='50%'>  Tipo empresa: </td> ";
				echo "<td>".$row["nombre_empresa"]."</td> </tr> ";	
		echo "<tr><td bgcolor='#FFFFCC' width='50%'>  ESTADO DEL EXPEDIENTE: </td> ";
				echo "<td> EN PROCESO</td> </tr> ";							
		echo "<tr><td bgcolor='#FFFFCC' width='50%'>   Descripcion:  </td> ";
				echo "<td>".$row["Comentario"]."</td> </tr>";




}


sqlsrv_free_stmt( $stmt);

?>
  </table>
	 
	 <p>&nbsp;</p>
    <div class="container1">
      <ul id="tabs1" class="mctabs">
        <li><a href="#view1">Traslados</a></li>
        <li><a href="#view2">Observaciones</a></li>
        <li><a href="#view3">Adjuntos</a></li>
      </ul>
      <div class="panel-container">
  <div id="view1">
    <table align="center" border="1" bordercolor="#0066FF"   >
<tr>

<th class="Estilo5"> Fecha</th>
<th class="Estilo5" >Hora </th>
<th class="Estilo5" >Proceso de Expediente </th>
<th class="Estilo5">Usuario envia  </th>
<th class="Estilo5">Usuario recibe </th>
<th class="Estilo5">Descripcion </th>
</tr>
<?
	

	    $sql = "select tipdoc.nombre_documento, mov.fecha_traslado, us.nombre, us.apellido, usua.nombre as d, usua.apellido as p,  mov.comentarios from movimiento as mov inner join usuario as us
	on us.id_usuario = mov.id_usuario inner join usuario as usua on usua.id_usuario = mov.usuario_recibe
	inner join dbo.tipo_documento as tipdoc on mov.id_tipodocumento = tipdoc.id_tipodocumento
	
	  where id_expediente = '$k'";
	
	$sql2 ="select  usua.usuario from movimiento as mov inner join usuario as usua on
	 usua.id_usuario = mov.usuario_recibe  where id_expediente = '$k'";
	 
$stmt = sqlsrv_query( $conn, $sql );
$stmt2 = sqlsrv_query( $conn, $sql2 );

if( $stmt === false && $stmt2===false) {
    die( print_r( sqlsrv_errors(), true) );
	
}
while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
	   {
	    $date = ($row["fecha_traslado"]);
	    $ex=($row["id_expediente"]); 
        $t=$ex;     
 
echo "<tr><td>",date_format ($date,'d-m-y'),"</td> ";	   
echo "<td>",date_format ($date, 'H:i:s'),"</td> ";
echo "<td>".$row["nombre_documento"]."</td> ";
echo "<td>".$row["nombre"]." ".$row["apellido"]."</td> ";
echo "<td>".$row["d"]." ".$row["p"]."</td>";
echo "<td width='' > ".$row["comentarios"].   " </td> </tr>";


}


sqlsrv_free_stmt( $stmt);		
?>
</table>
  </div>
        <div class="Estilo5" id="view2">
          <table align="center" border="1" bordercolor="#0066FF"   >
<tr>

<th><span class="Estilo6"> Fecha</span></th>
<th ><span class="Estilo6">Hora </span></th>
<th><span class="Estilo6">Usuario   </span></th>
<th><span class="Estilo6">Descripcion </span></th>
</tr>
<?
	

	    $sql = "select des.fechadescripcion ,uss.nombre,uss.apellido,des.descripcion from descripciones_tab as des inner join expediente as expe
	on expe.Id_expediente = des.id_expediente inner join usuario as uss on uss.id_usuario = des.Id_usuario  where des.id_expediente = '$k'";
	
	 
$stmt = sqlsrv_query( $conn, $sql );


if( $stmt === false ) {
    die( print_r( sqlsrv_errors(), true) );
	
}
while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
	   {
	    $date = ($row["fechadescripcion"]);
	    $ex=($row["id_expediente"]); 
        $t=$ex;     
 
echo "<tr><td>",date_format ($date,'d-m-y'),"</td> ";	   
echo "<td>",date_format ($date, 'H:i:s'),"</td> ";
echo "<td>".$row["nombre"]." ".$row["apellido"]."</td> ";
echo "<td width='' > ".$row["descripcion"].   " </td> </tr>";


}


sqlsrv_free_stmt( $stmt);		
?>
</table>
  </div>
        <div id="view3">
        <span class="Estilo5">
        <table align="center" border="1" bordercolor="#0066FF"   >
        </span>
        <tr>

<th class="Estilo5"> Fecha</th>
<th class="Estilo5" >Hora </th>
<th class="Estilo5">Usuario   </th>
<th class="Estilo5">Archivo   </th>
<th class="Estilo5">Descripcion </th>
<th class="Estilo5">ver   </th>
</tr>
        <span class="Estilo5">
        <?
	

	  
	    $sql = "select ar.fechaad,  uss.nombre,uss.apellido,ar.nombrearchivo, ar.direccion, ar.descripcion from documento as ar inner join expediente as expe
	on expe.Id_expediente = ar.id_expediente inner join usuario as uss on uss.id_usuario = ar.Id_usuario  where ar.id_expediente = '$k'";
	
	 
$stmt = sqlsrv_query( $conn, $sql );


if( $stmt === false ) {
    die( print_r( sqlsrv_errors(), true) );
	
}
while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
	   {
	    $date = ($row["fechaad"]);
	    $ex=($row["id_expediente"]); 
		$archivoup = $row ['direccion'];
        $t=$ex;     
 
echo "<tr><td>",date_format ($date,'d-m-y'),"</td> ";	   
echo "<td>",date_format ($date, 'H:i:s'),"</td> ";
echo "<td>".$row["nombre"]." ".$row["apellido"]."</td> ";
echo "<td>".$row["nombrearchivo"]."</td> ";
echo "<td>".$row["descripcion"]."</td> ";
echo "<td width='' ><a href='../../upload/$archivoup' >  <img src='images/lupas.png' width='24' height='22'></td> </tr>";

}


sqlsrv_free_stmt( $stmt);		
?>
        </span>
        <!--container-->
</body>
</html>
