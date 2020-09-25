<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>Seleccione la empresa </p>

  <select name="select2" required="required">
    <?
		include('../../conexion/conexion.php');
	
	    $sql = "select nombre_empresa, id_empresa from empresa where activo=1";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}
?>
    <option value="<? $fila['id_sector'] ?>">-Seleccione-</option>
    <?
while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
print	  "<option value=\"".$row["id_empresa"]."\">".$row["nombre_empresa"]."</option>"; 
}
sqlsrv_free_stmt( $stmt);		
?>
  </select>
</body>
</html>
