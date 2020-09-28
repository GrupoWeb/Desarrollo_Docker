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
<script src="scripts/wufoo.js"></script>

<!--[if lt IE 10]>
<script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>

<body id="public">
<div id="container" class="ltr">
  
  <h1 id="logo">
<a>Wufoo</a>
 </h1>
<form action="guardarobservaciones.php" method="post" enctype="multipart/form-data" name="form1">
  
<header id="header" class="info">
<h2>Observaciones
 <?
	
	
	$tro=$_REQUEST["d"];
  

   

  
 // $variable=$tro;  $nombre = $_POST["$variable"] ; 
   echo "  EXPEDIENTE NO. #",$tro;
     //echo 	  "<select name='ids'> <option value=\"",$tro,"\">",$tro,"</option>  </select>" ;
	 
	 
   ?> 	
   <input name="md" type="hidden" value= <? echo $tro ?> >
   	
</h2>
</header>

<ul>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

</head>
<body>

 
 

<div align="center">
<li id="foli12"
class="notranslate      ">
<H3 class="estilo1">INGRESE OBSERVACION</H3>

    <div>
<textarea id="Field12"
name="arg"
class="field textarea medium"
spellcheck="true"
rows="10" cols="50"
tabindex="6"
onkeyup="validateRange(12, 'word');"
 ></textarea>
	
<label for="Field12"><em class="currently"></em></label>
</div>
</li>
  <!--container-->
</div>
<div align="center">
<input type="submit"  value="Guardar Descripcion"> 
<table width="100"align="right">
  <tr>
    <td><a href="javascript:history.go(-1);"> <img src="../adjunto/images/atras.png" height="50" width="50" alt="Bot?n" /> </a> </td>
    <td><a href="javascript:history.go(-1);">regresar</td>
  </tr>
</table>


</div>
</form>


<!--container-->
</body>
</html>
