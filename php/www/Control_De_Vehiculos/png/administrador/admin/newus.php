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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>
<CENTER>
<body>
<form action="" method="post" enctype="multipart/form-data" name="form1">


<div style="background:WHITE" width:"100px">
INGRESO DE USUARIOS
<div>
<table width="306" border="1">
  <tr>
    <td>Nombre</td>
    <td><span style="margin-top:20px;">
      <input name="username" class="form-login" title="Username" value="" size="30" maxlength="2048"  required="required"/>
    </span></td>
  </tr>
  <tr>
    <td>Apellido</td>
    <td><span style="margin-top:20px;">
      <input name="username2" class="form-login" title="Username" value="" size="30" maxlength="2048"  required="required"/>
    </span></td>
  </tr>
  <tr>
    <td>Usuario</td>
    <td><span style="margin-top:20px;">
      <input name="username3" class="form-login" title="Username" value="" size="30" maxlength="2048"  required="required"/>
    </span></td>
  </tr>
  <tr>
    <td>Correo</td>
    <td><span style="margin-top:20px;">
      <input name="username4" class="form-login" title="Username" value="" size="30" maxlength="2048"  required="required"/>
    </span></td>
  </tr>
  <tr>
    <td>Rol Expediente</td>
    <td><span style="margin-top:20px;">
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
		$sql="select nombre_rol, id_roles from roles where codigo_select=1  order by nombre_rol ";
		$stmt=sqlsrv_query($conn,$sql);
		/*while ($fila=mysql_fetch_array($res)){
		echo $fila['nombre'];
		}*/
?>
      <select name="rol" id="select5" required="required"  >
        <option value="<? $fila['id_roles'] ?>">-Seleccione-</option>
        <?php while( $fila = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){ ?>
        <option value="<?php echo $fila['id_roles']?>"><?php echo $fila['nombre_rol']?> </option>
        <?php }?>
      </select>
    </span></span></td>
  </tr>
  <tr>
    <td>Rol Cor. UDAF </td>
    <td><span style="margin-top:20px;">
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
		$sql="select nombre_rol, id_roles from roles where codigo_select=6  order by nombre_rol ";
		$stmt=sqlsrv_query($conn,$sql);
		/*while ($fila=mysql_fetch_array($res)){
		echo $fila['nombre'];
		}*/
?>
      <select name="rol6" id="select5" required="required"  >
        <option value="<? $fila['id_roles'] ?>">-Seleccione-</option>
        <?php while( $fila = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){ ?>
        <option value="<?php echo $fila['id_roles']?>"><?php echo $fila['nombre_rol']?> </option>
        <?php }?>
      </select>
    </span></span></td>
  </tr>
  <tr>
    <td>Rol Dig. UDAF </td>
    <td><span style="margin-top:20px;">
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
		$sql="select nombre_rol, id_roles from roles where codigo_select=6  order by nombre_rol ";
		$stmt=sqlsrv_query($conn,$sql);
		/*while ($fila=mysql_fetch_array($res)){
		echo $fila['nombre'];
		}*/
?>
      <select name="rol7" id="select5" required="required"  >
        <option value="<? $fila['id_roles'] ?>">-Seleccione-</option>
        <?php while( $fila = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){ ?>
        <option value="<?php echo $fila['id_roles']?>"><?php echo $fila['nombre_rol']?> </option>
        <?php }?>
      </select>
      </span></span></td>
  </tr>
  <tr>
    <td>Rol vehiculos</td>
    <td><?php 
		$sql="select nombre_rol, id_roles from roles where codigo_select=2  order by nombre_rol ";
		$stmt=sqlsrv_query($conn,$sql);
		/*while ($fila=mysql_fetch_array($res)){
		echo $fila['nombre'];
		}*/
?>
      <select name="rol2" id="select" required="required"  >
        <option value="<? $fila['id_roles'] ?>">-Seleccione-</option>
        <?php while( $fila = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){ ?>
        <option value="<?php echo $fila['id_roles']?>"><?php echo $fila['nombre_rol']?> </option>
        <?php }?>
      </select>
      </span></td>
  </tr>
  <tr>
    <td>Rol RRHH</td>
    <td><?php 
		$sql="select nombre_rol, id_roles from roles where codigo_select=3  order by nombre_rol ";
		$stmt=sqlsrv_query($conn,$sql);
		/*while ($fila=mysql_fetch_array($res)){
		echo $fila['nombre'];
		}*/
?>
      <select name="rol3" id="select2" required="required"  >
        <option value="<? $fila['id_roles'] ?>">-Seleccione-</option>
        <?php while( $fila = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){ ?>
        <option value="<?php echo $fila['id_roles']?>"><?php echo $fila['nombre_rol']?> </option>
        <?php }?>
      </select>
      </span></td>
  </tr>
  <tr>
    <td>Rol Soporte IT</td>
    <td><?php 
		$sql="select nombre_rol, id_roles from roles where codigo_select=4  order by nombre_rol ";
		$stmt=sqlsrv_query($conn,$sql);
		/*while ($fila=mysql_fetch_array($res)){
		echo $fila['nombre'];
		}*/
?>
      <select name="rol4" id="select3" required="required"  >
        <option value="<? $fila['id_roles'] ?>">-Seleccione-</option>
        <?php while( $fila = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){ ?>
        <option value="<?php echo $fila['id_roles']?>"><?php echo $fila['nombre_rol']?> </option>
        <?php }?>
      </select>
      </span></td>
  </tr>
  <tr>
    <td>Rol almacen</td>
    <td><?php 
		$sql="select nombre_rol, id_roles from roles where codigo_select=5 order by nombre_rol ";
		$stmt=sqlsrv_query($conn,$sql);
		/*while ($fila=mysql_fetch_array($res)){
		echo $fila['nombre'];
		}*/
?>
      <select name="rol5" id="select4" required="required"  >
        <option value="<? $fila['id_roles'] ?>">-Seleccione-</option>
        <?php while( $fila = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){ ?>
        <option value="<?php echo $fila['id_roles']?>"><?php echo $fila['nombre_rol']?> </option>
        <?php }?>
      </select>
      </span></td>
  </tr>
  <tr>
    <td>Dependencia</td>
    <td><span style="margin-top:20px;">
      <script languaje="javascript">

function validar(form)

{
    if (form.mes.options[form.mes.selectedIndex].value == "todos")

    {

    alert("Por favor, seleccione una opción válida");

    form.mes.focus(); return true;

    }
 

form.submit();

}
</script>
<?php 
		$sql="select nombre_dependencia, id_dependencia from dependencia order by nombre_dependencia ";
		$stmt=sqlsrv_query($conn,$sql);
		/*while ($fila=mysql_fetch_array($res)){
		echo $fila['nombre'];
		}*/
?>

		
		<select name="dept" id="" required="required"  >
				<option value="1">-Seleccione-</option>
				<?php while( $fila = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){ ?>
					<option value="<?php echo $fila['id_dependencia']?>"><?php echo $fila['nombre_dependencia']?> </option>
				<?php }?>
    </select>
			
		
  	
    </span></td>
  </tr>
  <tr>
    <td>Contrase&ntilde;a</td>
    <td><span style="margin-top:20px;">
      <input name="username6" class="form-login" title="Username"  type="password"value="" size="30" maxlength="2048"  required="required"/>
    </span></td>
  </tr>
  <tr>
    <td>extension </td>
    <td><span style="margin-top:20px;">
      <input name="username7" class="form-login" title="Username" value="" size="30" maxlength="2048"  required="required"/>
    </span></td>
  </tr>
  <tr>
    <td>Ingresar usuario. </td>
    <td><select name='usde'> 
			
<option value=0>- NO -</option>; 

<option value=1>- SI -</option>; 

      </select>
	  
	  <input type='submit' value='procesar' onClick="validar(this.form)" /> </td>
  </tr>
</table>
  <? include ('newus2.php'); ?>
<style>

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

</body>
</html>
