<? 
session_start();
include('../conexion/conexion.php');

$usn=$_SESSION['usern'];

$sql = "select apellido , nombre, id_usuario from usuario where usuario='$usn'";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
//echo	  "hola".$row["nombre"]."  ".$row["apellido"]."</option>"; 
$ap=$row["apellido"];
 //echo  $nom=$row["nombre"];
  // $uen=$row["id_usuario"];

}
sqlsrv_free_stmt( $stmt);	



?>
<style>

.button {
   border-top: 1px solid #96d1f8;
   background: #65a9d7;
   background: -webkit-gradient(linear, left top, left bottom, from(#3279a8), to(#65a9d7));
   background: -webkit-linear-gradient(top, #3279a8, #65a9d7);
   background: -moz-linear-gradient(top, #3279a8, #65a9d7);
   background: -ms-linear-gradient(top, #3279a8, #65a9d7);
   background: -o-linear-gradient(top, #3279a8, #65a9d7);
   padding: 9px 18px;
   -webkit-border-radius: 3px;
   -moz-border-radius: 3px;
   border-radius: 3px;
   -webkit-box-shadow: rgba(0,0,0,1) 0 1px 0;
   -moz-box-shadow: rgba(0,0,0,1) 0 1px 0;
   box-shadow: rgba(0,0,0,1) 0 1px 0;
   text-shadow: rgba(0,0,0,.4) 0 1px 0;
   color: white;
   font-size: 13px;
   font-family: 'Lucida Grande', Helvetica, Arial, Sans-Serif;
   text-decoration: none;
   vertical-align: middle;
   }
.button:hover {
   border-top-color: #28597a;
   background: #28597a;
   color: #ccc;
   }
.button:active {
   border-top-color: #1b435e;
   background: #1b435e;
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
.Estilo2 {font-size: 50%}
</style>

<!DOCTYPE html>
<html>	
<head>
<title>
Ingreso de Expedientes
</title>



<!-- CSS -->
<link href="css/structure.css" rel="stylesheet">
<link href="css/form.css" rel="stylesheet">
<link href="css/theme.css" rel="stylesheet">
<link href="https://" rel="stylesheet">

<!-- JavaScript -->

<script type="text/javascript" language="javascript" src="js/ajax.js"></script>	

<!--[if lt IE 10]>
<script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>

<body  >




<div id="container" class="ltr">
  
  <h1 id="logo">
<a>mineco</a>
 </h1>

<form action="guardarsolicitud.php" method="post" enctype="multipart/form-data" name="form1">
  
<header id="header" class="info">
<h2>Ingreso de Expedientes <span class="Estilo2">Asusntos Juridicos </span></h2>

<? include("consulta/fecha.php");  ?>

</header>

<ul>

<li id="foli12"
class="notranslate      ">
  <label class="desc" id="title6" for="Field6"></label>
</li>

<li id="foli4" class="notranslate       ">
<label class="desc" id="title4" for="Field4">
Empresa:
<select name="emp">
  <?
		
	
	    $sql = "select nombre_empresa, id_empresa from empresa";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}
print "<option value=\"0\">- Seleccione -</option>"; 
while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
print	  "<option value=\"".$row["id_empresa"]."\">".$row["nombre_empresa"]."</option>"; 
}
sqlsrv_free_stmt( $stmt);		
?>
</select>
</label>
<div>
  <p><span class="notranslate      ">
  <label class="desc" id="title6" for="Field6"> n&uacute;mero de nit:
  <input type="text" name="nits" size="7"  value="">
<br>
  </label>
  </span></p>
  <p><span class="notranslate      "><span class="desc"><strong>&uacute;mero de folio: </strong>
    <input type="text" name="fo2" size="7"  value="">
  </span></span></p>
  </div >
</li>



<li id="foli6" class="notranslate       ">
<label class="desc" id="title6" for="Field6">

Tipo de solicitud:</label>
<div>
<select name="solic"> 
			<?
	
	
	    $sql = "select nombre_solicitud,id_solicitud from solicitud ";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt=== false) {
    die( print_r( sqlsrv_errors(), true) );
}	
print "<option value=\"0\">- Seleccione -</option>"; 
while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
print "<option value=\"".$row["id_solicitud"]."\">".$row["nombre_solicitud"]."</option>"; 
}
sqlsrv_free_stmt( $stmt);		
?>
      </select>
</div>
</li>
<li id="foli8" class="notranslate       ">
<label class="desc" id="title8" for="Field8">
Dependencia</label>
<div>

<?php 
		$sql="select nombre_dependencia, id_dependencia from dependencia ";
		$stmt=sqlsrv_query($conn,$sql);
		/*while ($fila=mysql_fetch_array($res)){
		echo $fila['nombre'];
		}*/
?>
  <form name="form1" action="">
		<div>
		<select name="dept" id="" onChange="from(document.form1.dept.value,'midiv','usuarios.php')">
				<option value="0">-Seleccione-</option>
				<?php while( $fila = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){ ?>
					<option value="<?php echo $fila['id_dependencia']?>"><?php echo $fila['nombre_dependencia']?></option>
				<?php }?>
							
    </select>
			
		
  </form>	
</div>
	
</div>
</li>
<li id="foli10" class="notranslate       ">
<label class="desc" id="title10" for="Field10">
Usuario:</label>
<div id="midiv">
			
  </div>
</li>
<li id="foli13" class="notranslate      ">
<label class="desc" id="title13" for="Field13">
Adjunte documento</label>
<div>

	
	<input type="file"  name="userfile"  id="userfile"/>
   <input type="hidden" name="MAX_FILE_SIZE" value="9000000" > 
	

</div>
</li>
<li id="foli12"
class="notranslate      ">
  COMENTARIO

    <div>
<textarea id="Field12"
name="coment"
class="field textarea medium"
spellcheck="true"
rows="10" cols="50"
tabindex="6"
onkeyup="validateRange(12, 'word');"
 ></textarea>

<label for="Field12"><em class="currently">.</em></label>
</div>
</li>




<li id="foli21" class="notranslate       ">
<label class="desc" id="title21" for="Field21">
  <input type="submit"  value="Guardar Solicitud">
  <div>
    
    
    
  </form>		
  </form>
  </form>
  </form>
  </form>
  </form>
  </form>
    <!--container-->
  </div >

</body>
 <div id="pie3"> 
<p id="tit" align="center">EXPEDIENTES MINECO</span> </P>
  <p align="center">  &copy; 2015 <a href="http://www.mineco.gob.gt">MINISTERIO DE ECONOMIA</a> 
</div>
</html>
