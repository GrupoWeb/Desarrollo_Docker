<? 
session_start();
include('../../conexion/conexion.php');

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

<table width="200" border="1">
  <tr>
    <td>Nombre empresa </td>
    <td><span style="margin-top:20px;">
	 <form action=''  method='post' enctype='multipart/form-data' name='form2'>
	 
      <input name="empresa" class="form-login" title="Username" value="" size="30" maxlength="2048"  required="required"/>
    </span></td>
  </tr>
  
  <tr>
    <td>Sector Empresa:</td>
    <td>
	
	<span style="margin-top:20px;">
      <script languaje="javascript">

function validar(form)

{
    if (form.mes.options[form.mes.selectedIndex].value == "todos")

    {

    alert("Por favor, seleccione una opci&oacute;n v&aacute;lida");

    form.mes.focus(); return true;

    }
 

form.submit();

}
  </script>
      <?php 
		$sql="select id_sector, nombre_sector from sector_empresa where activo = 1 order by nombre_sector asc ";
		$stmt=sqlsrv_query($conn,$sql);
		/*while ($fila=mysql_fetch_array($res)){
		echo $fila['nombre'];
		}*/
?>
      <select name="secem" id="" required="required"  >
        <option value="<? $fila['id_sector'] ?>">-Seleccione-</option>
        <?php while( $fila = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){ ?>
        <option value="<?php echo $fila['id_sector']?>"><?php echo $fila['nombre_sector']?> </option>
        <?php }?>
      </select>

	
	</td>

  </tr>
  
  
  
  
  <tr>
    <td>Nit</td>
    <td><span style="margin-top:20px;">
      <input name="nit" class="form-login" title="Username" value="" size="30" maxlength="2048"  required="required"/>
    </span></td>
  </tr>
  <tr>
    <td>Ingresar usuario. </td>
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
