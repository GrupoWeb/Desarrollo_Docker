<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>


<?

include('../../conexion/conexion.php');
 
 $nombre=$_POST['username'];
 $apellido=$_POST['username2'];
 $usuario=$_POST['username3'];
 $correo=$_POST['username4'];
 $depen=$_POST['dept'];
 $pass=$_POST['username6'];
 $exten=$_POST['username7']; 
 $si= $_POST["usde"];
 $rol=$_POST['rol'];
 $rol2=$_POST["rol2"];
 $rol3=$_POST["rol3"];
 $rol4=$_POST["rol4"];
 $rol5=$_POST["rol5"];
 $rol6=$_POST["rol6"];
  $rol7=$_POST["rol7"];
 
 

 
 if ($si == 1)
{ 

    //validacion de reduncancia de usuarios verion veta 
	
	$sql="select  id_usuario from usuario where usuario= '$usuario' ";
		$stmt = sqlsrv_query( $conn, $sql );
		
	 while( $fila = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){ 
 $row= $fila['id_usuario']; 

 
 
 
 	  }
  if ($row=="")
  
 			{ 
  		
		 $sqlz3 = "insert into dbo.usuario(id_dependencia,usuario,passwordd,nombre,apellido,correo,activo,extencion,id_roles,id_rolesrrhh,id_rolesalmacen,id_rolessoportit,id_rolesveiculos,id_rolesudaf,id_digitador)
		values ('$depen','$usuario','$pass','$nombre','$apellido','$correo','1','$exten','$rol','$rol3', '$rol5','$rol4', '$rol2','$rol6','$rol7')";
			sqlsrv_query($conn,$sqlz3 ) ; 
			if( $stmt === false) {
		    die( print_r( sqlsrv_errors(), true) );
		   }
		
		   echo "Usuario ingrsado Correctamente";
		
		
		
			}
			else 
			{
			echo "usuario repetido";
    		}


}



else 

{
echo "Usuario no ingresado";
}


?>


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
</style
></body>
</html>
