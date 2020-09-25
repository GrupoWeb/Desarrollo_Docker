<!DOCTYPE html>
<html>
<head>

<title>
Ingreso de Expedientes
</title>

<!-- Meta Tags -->


<!-- CSS -->
<link href="css/structure.css" rel="stylesheet">
<link href="css/form.css" rel="stylesheet">
<link href="css/theme.css" rel="stylesheet">
<link href="https://" rel="stylesheet">

<!-- JavaScript -->


<!--[if lt IE 10]>
<script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>

<body id="public">
<div id="container" class="ltr">
  
  <h1 id="logo">
<a>Wufoo</a>
 </h1>
<form action="guardaradjunto.php" method="post" enctype="multipart/form-data" name="form1">

<header id="header" class="info">
<h2>Adjunto
 <?
	
	
	$tro=$_REQUEST["d"];
  

   

  
 // $variable=$tro;  $nombre = $_POST["$variable"] ; 
   echo " EXPEDIENTE NO.",$tro;
     //echo 	  "<select name='ids'> <option value=\"",$tro,"\">",$tro,"</option>  </select>" ;
	 
	 
   ?> 	
   <input name="cmd" type="hidden" value= <? echo $tro ?> >
   	
</h2>

</header>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

</head>
<body> 

 
 
 
<table width="60%" border=0 align="center" cellspacing="0" id="tabla3">
  <tr>
	
    <td ><div align="center">Archivo</div></td>
    <td ><div align="center">Descripcion</div></td>
  </tr>
  <tr>
  	<td> 
	<input type="file"  name="userfile"  id="userfile"/>
   <input type="hidden" name="MAX_FILE_SIZE" value="9000000" > 
	</td>
	
	
	<td>
	<textarea
name="adjdes" cols="50"
rows="10"
class="field textarea medium" id="Field12"
tabindex="6"
onkeyup="validateRange(12, 'word');"
spellcheck="true"
 ></textarea>
	</td>
  </tr>


</table>
<div align="center">

  <!--container-->
</div>
<div align="center">
    <table width="100"align="right">
  <tr>
    <td><a href="javascript:history.go(-1);"> <img src="../adjunto/images/atras.png" height="50" width="50" alt="Bot?n" /> </a> </td>
    <td><a href="javascript:history.go(-1);">regresar</td>
  </tr>
</table>
  <p>&nbsp;    </p>
  <p>&nbsp;</p>
	
    <input type="submit"  value="Guardar Adjunto"> 
    
  </p>
</div>
</form>



  </body>
</html>
