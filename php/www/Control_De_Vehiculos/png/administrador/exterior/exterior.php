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
<script type="text/javascript" language="javascript" src="js/ajax.js"></script>	

<!--[if lt IE 10]>
<script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]--> 
</head>

<body id="public">
<div id="container" class="ltr">
  
  <h1 id="logo">
<a>Wufoo</a>
 </h1>

<form action="guardartraslado.php" method="post" enctype="multipart/form-data" name="form1">
  
<header id="header" class="info">
<h2>Traslado 

    <?
	
	
	$tro=$_REQUEST["d"];
  

   

  
 // $variable=$tro;  $nombre = $_POST["$variable"] ; 
   echo "  EXPEDIENTE NO. #",$tro;
     //echo 	  "<select name='ids'> <option value=\"",$tro,"\">",$tro,"</option>  </select>" ;

   ?> 	
   <input name="mc" type="hidden" value= <? echo $tro ?> >
   </h2>


  
</header>

<span class="notranslate       ">
<label class="desc" id="title8" for="Field8">Sector de expediente </label>

  <select name="sectorex" required="required">
    <?
		include('../../conexion/conexion.php');
	
	    $sql = "select id_tipodocumento , nombre_documento from dbo.tipo_documento where activo= 1 order by nombre_documento asc";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}
?>
    <option value="<? $fila['id_sector'] ?>">-Seleccione-</option>
    <?
while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
print	  "<option value=\"".$row["id_tipodocumento"]."\">".$row["nombre_documento"]."</option>"; 
}
sqlsrv_free_stmt( $stmt);		
?>
  </select>
<div>

</span>
<ul>

<li id="foli8" class="notranslate       ">
<label class="desc" id="title8" for="Field8">
Dependencia</label>
<div>
<?

		$sql="select nombre_dependencia, id_dependencia from dependencia  ";
		$stmt=sqlsrv_query($conn,$sql);
		
?>


  <form name="form1" action="">
		<div>
		<select name="dept2" id="" onChange="from(document.form1.dept2.value,'midiv','usuarios.php')">
				<option value="0">-Seleccione-</option>
				<?php while( $fila = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){ ?>
					<option value="<?php echo $fila['id_dependencia']?>"><?php echo $fila['nombre_dependencia']?></option>
				<?php }?>
							
    </select>
			
		
  </form>	
</div>
</li>
<li id="foli10" class="notranslate       ">
<label class="desc" id="title10" for="Field10">
Usuario:</label>
<div id="midiv">		</div>
</li>

<li id="foli12"
class="notranslate      ">
  COMENTARIO

    <div>
<textarea id="Field12"
name="coment2"
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
</label>
<div></div>
</li> <li class="buttons ">
<div>
  


               <blockquote>
                 <p>
                   <input type="submit"  value="Guardar Traslado"> 
                   
                 </p>
               </blockquote>
               <table width="100"align="right">
  <tr>
    <td><a href="javascript:history.go(-1);"> <img src="../adjunto/images/atras.png" height="50" width="50" alt="Botón" /> </a> </td>
    <td><a href="javascript:history.go(-1);">regresar</td>
  </tr>
</table>     </div>
</li>
</ul>
</form> 


</div><!--container-->
</body>
</html>
