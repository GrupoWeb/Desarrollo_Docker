
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
Unidad de Administracion Financiera	
</header>

<ul>

<p>
  <label class="desc" id="title8" for="Field8"></label>
<div>
</table>
	 
	 <p>&nbsp;</p>
    <div class="container1">
      <ul id="tabs1" class="mctabs">
        <li><a href="#view1">Consulta por fecha</a></li>
        <li><a href="#view2">Consulta por Correlativo</a></li>
        
      </ul>
      <div class="panel-container">
        <div id="view1">
		
</p>
<form method="post" novalidate
      action="../reporte/reporte.php">
<li class="date notranslate      ">
  <label class="desc" id="title3" for="Field3">
  Fecha inicial<span class="symbol">

     <input type="date" name="inic" step="1" min="2013-01-01" max="2018-12-31" value="date"> 

  </span><br>
</label> 
  <span class="symbol">
  <center>
  </center>
</span></li>
</li>
<li id="foli4" class="date notranslate      ">
<label class="desc" id="title4" for="Field4">
Fecha final<span class="symbol">
<input type="date" name="fn" step="1" min="2013-01-01" max="2018-12-31" value="date">


</span></label>
<span class="symbol">
<center>
</center>
</span></li> 


  <input id="saveForm2" name="saveForm2" class="btTxt submit" type="submit" value="Generar Reporte"/>
</form>
</li></form> 

        </div>
        <div id="view2">
       
		
   <form method='post' novalidate
      action='../consulta_especifica/versolicitudc.php'>
	  ingreso numero de correlativo 
  <input name='pet' type='text' value='' size='15' maxlength='50'> 
  


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
