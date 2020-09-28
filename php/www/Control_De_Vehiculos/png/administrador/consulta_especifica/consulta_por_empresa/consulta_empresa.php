<?
session_start();
include('../../../conexion/conexion.php');

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
<!DOCTYPE html>
<html>
<head>

<title>
Reporte de Solicitudes
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
<script src="javascript-tabs.js" type="text/javascript"></script>
<!--[if lt IE 10]>
<script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>

<body>
<div id="container" class="ltr">

<a><img src="../../Captura.PNG" width="642" height="32"></a>
  
<header id="header" class="info">
<h2>Reporte de Solicitudes</h2><dr>

</header>

<ul>

<p>
  <label class="desc" id="title8" for="Field8"></label>
<div>
</table>
	 
	 <p>&nbsp;</p>
    
      <div class="panel-container">
        <div id="view1">
		
</p>
</form> 
        </div>
        <div id="view2">
       
		
   <form method='post' novalidate
      action='mostrar_consutla.php'	>
	  Busque la empresa 
	  
	  
  <select name="pet" required="required">
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
	  

  


</span></label>
<span class='symbol'>
<center>
  <p>&nbsp;</p>
  </center>
</span></li>
<input id='aveForm2' name='saveForm2' class='btTxt submit' type='submit' value='Generar Reporte'/>
	      </form>
</li> 
        </div>
</div>
<!--container-->
</body>
</html>
