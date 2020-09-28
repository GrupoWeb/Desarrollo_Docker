<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>
<CENTER>
<body>



<?
  
 include('../../conexion/conexion.php');
 while($row) 
	   {

	$user2=($row["id_usuario"]); 
	
       }
  	$cor=$_REQUEST["user2"];
	
	
	
	
	
	
	
	$sql = "select   us.nombre, us.apellido, us.usuario, us.id_usuario,us.correo,us.extencion, depts.Nombre_dependencia  from dbo.usuario as us inner join dbo.dependencia as depts 
on depts.id_dependencia= us.id_dependencia where us.id_usuario='$cor' and us.activo = 1";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
  

   $usp=($row["id_usuario"]); 
  $new=$row["usuario"] ;
        $user=$usp;      
		
		
		
?>
	
	  <form action=''  method='post' enctype='multipart/form-data' name='form2'>
	<table width='300'  border='1'>
  <tr>
    <td>Nombre:</td>
    <td><input type='text' name='nombre' value='<? echo $row["nombre"]; ?>'  required="required"/></td>
  </tr>
  <tr>
    <td>Apellido:</td>
    <td><input type='text' name='apellido' value='<? echo  $row["apellido"]; ?>' required="required"/></td>
  </tr>
  <tr>
    <td>Usuario</td>
    <td><? echo $row["usuario"]; ?></td>
  </tr>
  <tr>
    <td>correo</td>
    <td><input type='text' name='correo' value='<? echo $row["correo"]; ?>' required="required"/></td>
  </tr>
  <tr>
    <td>Extension </td>
    <td><input type='text' name='extension' value='<? echo $row["extencion"]; ?>' required="required"/></td>
  </tr>
  
    <tr>
    <td>Dependencia</td>
    <td><? echo $row["Nombre_dependencia"]; ?></td>
  </tr>
  
  <!-- rol de expedientres -->
 <tr>
   <td>Rol Expediente</td>
   <td><?php 
		$sql="select nombre_rol, id_roles from roles where codigo_select=1  order by nombre_rol ";
		$stmt=sqlsrv_query($conn,$sql);
		/*while ($fila=mysql_fetch_array($res)){
		echo $fila['nombre'];
		}*/
?>
       <select name="rol" id="" required="required"  >
         <option value="<? $fila['id_roles'] ?>">-Seleccione-</option>
         <?php while( $fila = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){ ?>
         <option value="<?php echo $fila['id_roles']?>"><?php echo $fila['nombre_rol']?> </option>
         <?php }?>
       </select>
       </span></td>
   </tr>
   
   <tr>
   <td>Rol Cor. UDAF </td>
   <td><?php 
		$sql="select nombre_rol, id_roles from roles where codigo_select=6  order by nombre_rol ";
		$stmt=sqlsrv_query($conn,$sql);
		/*while ($fila=mysql_fetch_array($res)){
		echo $fila['nombre'];
		}*/
?>
       <select name="rol6" id="" required="required"  >
         <option value="<? $fila['id_roles'] ?>">-Seleccione-</option>
         <?php while( $fila = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){ ?>
         <option value="<?php echo $fila['id_roles']?>"><?php echo $fila['nombre_rol']?> </option>
         <?php }?>
       </select>
       </span></td>
   </tr>
  
   <tr>
   <td>Rol Dig. UDAF </td>
   <td><?php 
		$sql="select nombre_rol, id_roles from roles where codigo_select=7  order by nombre_rol ";
		$stmt=sqlsrv_query($conn,$sql);
		/*while ($fila=mysql_fetch_array($res)){
		echo $fila['nombre'];
		}*/
?>
       <select name="rol7" id="" required="required"  >
         <option value="<? $fila['id_roles'] ?>">-Seleccione-</option>
         <?php while( $fila = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){ ?>
         <option value="<?php echo $fila['id_roles']?>"><?php echo $fila['nombre_rol']?> </option>
         <?php }?>
       </select>
       </span></td>
   </tr>
  
   
   
   
  <!-- rol de vehiculos -->
 <tr>
    <td>Rol vehiculos</td>
    <td>

      <?php 
		$sql="select nombre_rol, id_roles from roles where codigo_select=2  order by nombre_rol ";
		$stmt=sqlsrv_query($conn,$sql);
		/*while ($fila=mysql_fetch_array($res)){
		echo $fila['nombre'];
		}*/
?>
      <select name="rol2" id="" required="required"  >
 <option value="<? $fila['id_roles'] ?>">-Seleccione-</option>
        <?php while( $fila = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){ ?>
        <option value="<?php echo $fila['id_roles']?>"><?php echo $fila['nombre_rol']?> </option>
        <?php }?>
      </select>
    </span></td>
  </tr>
  
  
   <!-- rol de rrhh -->
 <tr>
    <td>Rol RRHH</td>
    <td>

      <?php 
		$sql="select nombre_rol, id_roles from roles where codigo_select=3  order by nombre_rol ";
		$stmt=sqlsrv_query($conn,$sql);
		/*while ($fila=mysql_fetch_array($res)){
		echo $fila['nombre'];
		}*/
?>
      <select name="rol3" id="" required="required"  >
      <option value="<? $fila['id_roles'] ?>">-Seleccione-</option>
        <?php while( $fila = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){ ?>
        <option value="<?php echo $fila['id_roles']?>"><?php echo $fila['nombre_rol']?> </option>
        <?php }?>
      </select>
    </span></td>
  </tr>
  
  
   <!-- rol de SOPORTE IT -->
 <tr>
    <td>Rol Soporte IT</td>
    <td>

      <?php 
		$sql="select nombre_rol, id_roles from roles where codigo_select=4  order by nombre_rol ";
		$stmt=sqlsrv_query($conn,$sql);
		/*while ($fila=mysql_fetch_array($res)){
		echo $fila['nombre'];
		}*/
?>
      <select name="rol4" id="" required="required"  >
   <option value="<? $fila['id_roles'] ?>">-Seleccione-</option>
        <?php while( $fila = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){ ?>
        <option value="<?php echo $fila['id_roles']?>"><?php echo $fila['nombre_rol']?> </option>
        <?php }?>
      </select>
    </span></td>
  </tr>
  
  <!-- rol de almacen -->
 <tr>
    <td>Rol almacen</td>
    <td>

      <?php 
		$sql="select nombre_rol, id_roles from roles where codigo_select=5 order by nombre_rol ";
		$stmt=sqlsrv_query($conn,$sql);
		/*while ($fila=mysql_fetch_array($res)){
		echo $fila['nombre'];
		}*/
?>
      <select name="rol5" id="" required="required"  >
     <option value="<? $fila['id_roles'] ?>">-Seleccione-</option>
        <?php while( $fila = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){ ?>
        <option value="<?php echo $fila['id_roles']?>"><?php echo $fila['nombre_rol']?> </option>
        <?php }?>
      </select>
    </span></td>
  

      
 </td>
   </tr>
  
  
  
  <tr>
    <td>Desea actualizar? </td>
    <td> <select name='usde'> 
			
<option value=0>- NO -</option>; 

<option value=1>- SI -</option>; 

      </select>
	  
	  <input type='submit' value='procesar' /> </td>
   </tr>
</table>
	<?		
      	
 }
sqlsrv_free_stmt( $stmt);	
 
 

 include('edit2.php');

 ?>
 
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
