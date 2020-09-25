<style>
#cssmenu {
  background: #D8D8D8;
  list-style: none;
  margin: 0;
  padding: 0;
  width: 15em;
}
#cssmenu li {
  font: 67.5% "Lucida Sans Unicode", "Bitstream Vera Sans", "Trebuchet Unicode MS", "Lucida Grande", Verdana, Helvetica, sans-serif;
  margin: 0;
  padding: 0;
  list-style: none;
}
#cssmenu a {
  background: #D8D8D8;
  border-bottom: 1px solid #393939;
  color:#000000;
  display: block;
  margin: 0;
  padding: 8px 12px;
  text-decoration: none;
  font-weight: normal;
}
#cssmenu a:hover {
  background: #2580a2 url("images/hover.gif") left center no-repeat;
  color:#000000;
  padding-bottom: 8px;
}

}
#cssmenu rojo:hover {
  background: red url("images/hover.gif") left center no-repeat;
  color:#000000;
  padding-bottom: 8px;
}



.Estilo1 {color: #000000;
font-size:25px}
.Estilo4 {font-size: 25px;}
</style>


<!doctype html>
<html lang=''>
<head>


   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
 
   <title>CSS MenuMaker</title>
</head>
<body bgcolor="#D8D8D8">

<div id='cssmenu'>
<ul>
   <li class='active'>&nbsp;&nbsp;</li>
   <li class='Estilo4'>TIPOS DE CONSULTAS MINECO </li>
   <li class='active'>&nbsp;&nbsp;</li>
   <li class='active'>&nbsp;&nbsp;</li>
   
   <li><a href='consulta/noantendidas.php' id="rojo"	target="central">No Atendidas </a></li>
   <li><a href='consulta/proceso.php' 			target="central">En Proceso</a></li>
   <li><a href='consulta/finalizada.php'			  	target="central">Finalizadas </a></li>
   <li><a href='consulta/archivados.php'			  	target="central">Archivados </a></li>
   <li><a href='consulta/exterior.php'			  	target="central">Exterior </a></li>
  
</ul>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<!--<ul>
  <li class='Estilo4'>TIPOS DE CONSULTAS UDAF </li>
  <li class='active'>&nbsp;&nbsp;</li>
  <li class='active'>&nbsp;&nbsp;</li>
  <li><a href='consultaudaf/noantendidas.php' id="rojo"	target="central">No Atendidas </a></li>
  <li><a href='consultaudaf/proceso.php' 			target="central">En Proceso</a></li>
  <li><a href='consultaudaf/finalizada.php'			  	target="central">Finalizadas </a></li>

  <li><a href='consultaudaf/exterior.php'			  	target="central">Exterior </a></li>
</ul>-->
<p>&nbsp;</p>
</div>
</body>
<html>












