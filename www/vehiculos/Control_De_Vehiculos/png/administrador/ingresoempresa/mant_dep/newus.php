<style>


body {font-family: Arial, Helvetica, sans-serif;}

table {     font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
    font-size: 12px;    margin: 10px;     width: 500px; text-align: center;    border-collapse: collapse; }

th {     font-size: 18px;     font-weight: normal;     padding: 8px;     background: #b9c9fe;
    border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039; }

td {    padding: 15px;     background: #e8edff;     border-bottom: 1px solid #fff;
    color: #669;    border-top: 1px solid transparent; }

tr:hover td { background: #d0dafd; color: #339; }
.Estilo4 {font-size: 12px}
--> 
    


</style>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
  <CENTER>
 <form action=''  method='post' enctype='multipart/form-data' name='form2'>
<table width="200" border="1">
  <tr>
    <td>Nombre dependencia </td>
    <td> <span style="margin-top:20px;">
	 
	 
      <input name="empresa" class="form-login" title="Username" value="" size="30" maxlength="2048"  required="required"/>
    </span> </td>
  </tr>
  <tr>
    <td>Ingresar. </td>
    <td><select name='usde'> 
			
<option value=0>- NO -</option>; 

<option value=1>- SI -</option>; 

      </select>
	  
	  <input type='submit' value='procesar' /> </td>
  </tr>
</table>


<?
 include('newus2.php');
?>
</body>
</html>
