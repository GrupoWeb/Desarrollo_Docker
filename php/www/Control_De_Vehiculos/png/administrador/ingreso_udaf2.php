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
.Estilo3 {font-size: 50%}
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

<form action="guardarsolicitud_udaf.php" method="post" enctype="multipart/form-data" name="form1">
  
<header id="header" class="info">
<h2>Ingreso de Expedientes Internos MINECO </h2>

<p>
  <? include("consulta/fecha.php");  ?>
</p>
<p>&nbsp;</p>
</header>

<ul>

<li id="foli12"
class="notranslate      ">
  <label class="desc" id="title6" for="Field6"><br>
  </label>
</li>

<li id="foli4" class="notranslate       ">
<label class="desc" id="title4" for="Field4">Fecha de ingreso:
<? include("consulta/fecha.php");  ?>
<br>
</label>

<label class="desc" id="title4" for="Field4">Hora de ingreso:
<?

$Fecha= date('d-m-Y');
$Ho= date('H:i:s');

$hr = $Ho-1;
$Hora= date('i:s');

// este comando llama la ip de la maquina
//$Ip= $REMOTE_ADDR;

//echo $Fecha;
//echo "<br>";
echo $hr,":",$Hora;
//echo "<br>";
//echo "Ip: ".$Ip;

?>
<br>
</label>
<div>
  <label class="desc" id="title4" for="Field4">Empresa:
  <select name="emp" required="required">
    <?
	
	
	    $sql = "select nombre_empresa, id_empresa from empresa where activo=1";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}
?>
    <option value="<? $fila['id_sector'] ?>">-Seleccione-</option>
    <?
while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
print	  "<option value=\"".$row["id_empresa"]."\">".$row["nombre_empresa"]."</option>"; 
}
sqlsrv_free_stmt( $stmt);		
?>
  </select>
  <br>
  <br>
  <strong>Nombre de </strong><strong>Persona:</strong>
  <select name="select" required="required">
    <?
		
	
	    $sql = "select nombre_empresa, id_empresa from empresa where activo=1";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}
?>
    <option value="<? $fila['id_sector'] ?>">-Seleccione-</option>
    <?
while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
print	  "<option value=\"".$row["id_empresa"]."\">".$row["nombre_empresa"]."</option>"; 
}
sqlsrv_free_stmt( $stmt);		
?>
  </select>
  <br>
  <br>
  </label>
</div >
<label class="desc" id="title6" for="Field6"> Tipo de solicitud:
<select name="solic" required="required">
  <?
		
	
	    $sql = "select nombre_solicitud,id_solicitud from solicitud  where  tipoexpediente = 2  order by nombre_solicitud asc ";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt=== false) {
    die( print_r( sqlsrv_errors(), true) );
}	
?>
  <option value="<? $fila['id_solicitud'] ?>">-Seleccione-</option>
  <? 
while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
print "<option value=\"".$row["id_solicitud"]."\">".$row["nombre_solicitud"]."</option>"; 
}
sqlsrv_free_stmt( $stmt);		
?>
</select>
</label>
<div></div>
</li>



<li id="foli6" class="notranslate       ">
<label class="desc" id="title6" for="Field6">


  <span class="notranslate      "><span class="desc"><strong>N&uacute;mero de folio: </strong>
  <input type="text" name="fo2" size="10"  value="" required="required">
  </span></span>
  <p>&nbsp;</p>
</li>
<li id="foli8" class="notranslate       ">
<label class="desc" id="title8" for="Field8">
Dependencia</label>
<div>

<?php 
		$sql="select nombre_dependencia, id_dependencia from dependencia where activo = 1 order by nombre_dependencia asc";
		$stmt=sqlsrv_query($conn,$sql);
		/*while ($fila=mysql_fetch_array($res)){
		echo $fila['nombre'];
		}*/
?>
  <form name="form1" action="">
		<div>
		<select name="dept" id="" onChange="from(document.form1.dept.value,'midiv','usuarios.php')" required="required">
				<option value="<?php echo $fila['id_dependencia']?>">-Seleccione-</option>
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

	
	<input type="file"  name="userfile"  id="userfile" required="required"/>
   <input type="hidden" name="MAX_FILE_SIZE" value="9000000"  required="required"> 
	

</div>
</li>
<li id="foli12"
class="notranslate      ">Descripcion de Solicitud
  <div>
<textarea id="Field12" name="coment" class="field textarea medium" spellcheck="true" rows="10" cols="50" tabindex="6" onKeyUp="validateRange(12, 'word');" required="required" ></textarea>

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
