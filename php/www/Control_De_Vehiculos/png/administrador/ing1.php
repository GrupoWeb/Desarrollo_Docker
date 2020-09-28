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

<form action="guardarsolicitud_rmg2.php" method="post" enctype="multipart/form-data" name="form1">
  
<header id="header" class="info">
<h2>PREINGRESO </h2>

<p>
  <? include("consulta/fecha.php");  ?>
</p>
</header>

<ul>

<li id="foli12"
class="notranslate      ">
  <label class="desc" id="title6" for="Field6"></label>
</li>

<li id="foli4" class="notranslate       ">
<label class="desc" id="title4" for="Field4">Fecha :
<? include("consulta/fecha.php");  ?></label>

<label class="desc" id="title4" for="Field4">Hora :
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
<!--   <p><span class="notranslate      ">
  <label class="desc" id="title6" for="Field6"> n&uacute;mero de nit:
  <input type="text" name="nits" size="7"  value=""> -->
<br>
  </label>
  </span></p>
  
  <label class="desc" id="title4" for="Field4"> Empresa:
  <select name="Id_empresa" >
    <?
		
	
	    $sql = "select nombre_empresa, id_empresa from empresa where activo=1 order by nombre_empresa asc";
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
  <a href="ingresoempresa/buscaus.php" title="nueva empresa">nueva empresa</a><br>
  </label>
</div >
<label class="desc" id="title6" for="Field6"> Tipo de solicitud:</label>
<div>
  <select name="id_solicitud" >
    <?
	
	
	    $sql = "select nombre_solicitud,id_solicitud from solicitud  where  activo = 1 order by nombre_solicitud asc ";
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
  <a href="ingresoempresa/mant_solic/buscaus.php" title="nuevo tipo de solicitud">nuevo tipo de solicitud</a></div>
</li>



</div>
	
</div>
</li>
<li id="foli10" class="notranslate       ">
  
  <label class="desc" id="title13" for="Field13"></label>
  <div></div>
</div>
</li>

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
