<script src="../js/jquery.js"></script>
<?php
include'../Conexiones/conexion.php';
	
	$usu=$_POST["usu"];
$email=$_POST["email"];


$sqlvldcn="select id_usu, usuario, email from Tusuario where usuario like'$usu' and email like '$email' and estado=1;";
$params = array();
$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
$stmt = sqlsrv_query( $conn, $sqlvldcn , $params, $options );
$row_count = sqlsrv_num_rows( $stmt );

if($row_count == 0 ){
$sql = "insert into Tusuario(nombre1, nombre2, apellidop, apellidom, usuario, passwordd, id_dependencia, email, estado)
    VALUES
    (
    '".$_POST["nombrea"]."',
		'".$_POST["nombreb"]."',
			'".$_POST["apellidoa"]."',
				'".$_POST["apellidob"]."',
			'".$_POST["usu"]."',
		'".$_POST["psw"]."',
	  ".$_POST["dep"].",
	  '".$_POST["email"]."',
    ".$_POST["estado"].");";
				
				
				
				$res=sqlsrv_query($conn,$sql);
	
	if($res==true){
			sqlsrv_close($conn);	
			echo " 
                <script > 
                alert('DATOS INGRESADOS CON EXITO'); 
				window.history.go(-1);
                </script>
				";}
	
} else{

		
		
		echo " 
                <script > 
				alert('EL USUARIO YA EXISTE');
					window.history.go(-1);
                </script>";
	}


?>