<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<style type="text/css">
<!--
.Estilo1 {font-size: xx-large}

body {font-family: Arial, Helvetica, sans-serif;}

table {     font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
    font-size: 12px;    margin: 10px;     width: 800px; text-align: center;    border-collapse: collapse; }

th {     font-size: 18px;     font-weight: normal;     padding: 8px;     background: #b9c9fe;
    border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039; }

td {    padding: 15px;     background: #e8edff;     border-bottom: 1px solid #fff;
    color: #669;    border-top: 1px solid transparent; }
	

tr:hover td { background: #d0dafd; color: #339; }
.Estilo4 {font-size: 12px}
--> 
-->
</style>
</head>
<CENTER>
<body bgcolor="#CCCCCC">
<p>&nbsp;</p>
<p align="center" class="Estilo1">Usuario SICE </p>


  <form action=""  method="post" enctype="multipart/form-data" name="form2">
<table width="377" border="0" align="center">
  <tr>
    <td width="59">Nombre:</td>
    <td width="102"><input type="text" name="nombre1" value=""  /> </td>
    <td width="54">Apellido:</td>
    <td width="107"><input type="text" name="apellido1" value=""  /></td>
    <td width="21"><input type="submit" value="Buscar" /></td>
  </tr>
</table>
</form> 

<div>
 
 <?
 include 'buscaphp.php';
 ?>

</div>

</body>
</html>
