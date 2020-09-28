
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

<a><img src="../Captura.PNG" width="642" height="32"></a>
  
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
      action='mostrar_consutla.php'>
	  Busque por el Tipo de Solicitud
	  
	  

<select name="solic" required="required">
    <?
		include('../../../conexion/conexion.php');
	
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
