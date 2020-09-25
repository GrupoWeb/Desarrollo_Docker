<style>
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
</style>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>

<?
  
include('../../conexion/conexion.php');
 while($row) 
	   {

	    $user2=($row["id_empresa"]); 
		
       }
	   
  	$cor=$_REQUEST["user2"];
	
	
	
	
	
	
	
	$sql = " select * from dbo.empresa as em inner join dbo.sector_empresa as secem
on em.id_sector = secem.id_sector  where em.id_empresa='$cor' and secem.activo = 1 and em.activo =1
 ";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
  

   $usp=($row["id_empresa"]); 
  $new=$row["nits"] ;
        $user=$usp;      
		
		
		
	?>
	
	  <form action=''  method='post' enctype='multipart/form-data' name='form2'>
	<table width='300'  border='1'>
  <tr>
    <td>Nombre Empresa:</td>
    <td><input type='text' size='40' name='nomempresa' value='<? echo $row["nombre_empresa"] ?>' required="required" /></td>
  </tr>
  <tr>
    <td>Sector Empresa:</td>
    <td><? echo $row["nombre_sector"] ?>    ----
	
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
    <td>Nit:</td>
    <td><input type='text' size='30' name='nit' value='<? echo $row["nits"] ?>' required="required"/></td>
  </tr>
    <tr>
    <td>Desea actualizar? </td>
    <td> <select name='usde'> 
			
<option value=0>- NO -</option>; 

<option value=1>- SI -</option>; 

      </select>
	  
	  <input type='submit' value='procesar' /> 
 </td>
 
  </tr>
</table>
			
     <? 	
 }
sqlsrv_free_stmt( $stmt);	
 
 

 include('edit2.php');
 ?>
</body>
</html>
