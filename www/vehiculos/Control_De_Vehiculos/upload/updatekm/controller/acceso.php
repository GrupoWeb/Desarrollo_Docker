<?php 
session_start();
include 'conexionSys.php';

$usuario=$_POST["usuarios"];
$clave=$_POST["clave"];



 //$usuario='ilutinnn';
 //$clave='Administrador';

$registro = "SELECT
                id_usu, usuario, nombre1, apellidop 
            FROM Tusuario 
            where usuario='$usuario' and passwordd='$clave' and estado = 1
";
echo $registro;
$result = sqlsrv_query($conn, $registro);

	while($row = sqlsrv_fetch_array($result)){		
        $usuarioEntra = $row['id_usu'];		
	}

if (!empty($usuarioEntra) && $usuarioEntra == 2029) {
    header ('Location: ../index.php');
}else{
    header ('Location: ../index.php');
}



//echo $usuarioEntra;

// $filas = sqlsrv_rows_affected($result);

// echo $filas;


?>