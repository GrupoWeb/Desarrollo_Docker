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
 
  $cor=$_REQUEST["user2"];
   $si= $_POST["usde"];
   
   
   $nombre=$_POST["nombre"];
   $apellido=$_POST["apellido"];

   $correo=$_POST["correo"];
   $extension=$_POST["extension"];
   $rol=$_POST["rol"];
   $rol2=$_POST["rol2"];
   $rol3=$_POST["rol3"];
   $rol4=$_POST["rol4"];
   $rol5=$_POST["rol5"];
   $rol6=$_POST["rol6"];
   $rol7=$_POST["rol7"];
     
  
  
$sql = "select usuario from dbo.usuario where id_usuario='$cor' and activo = 1";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {

  $new=$row["usuario"] ;
   	
 }
sqlsrv_free_stmt( $stmt);




 
 if ($si == 1)
{ 
 $sqlz3 = "update 
dbo.usuario  set nombre= '$nombre' , apellido='$apellido' ,   correo ='$correo' , extencion = '$extension', id_roles='$rol',id_rolesrrhh = '$rol3', id_rolesalmacen = '$rol5', id_rolessoportit = '$rol4',
id_rolesveiculos = '$rol2' , id_rolesudaf = '$rol6', id_digitador = '$rol7'
where id_usuario = '$cor'";
sqlsrv_query($conn,$sqlz3 ) ; 
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

echo "Usuario Actualizado.";
}

else 

{
echo "Usuario No Actualizado.";
}


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
