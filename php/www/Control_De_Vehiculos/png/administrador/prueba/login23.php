<?
session_start();

	
 include(".../conexion/conexion.php");

function protecVars($str)
{
  $str =addslashes($str);
  $str= mysql_real_escape_string ($str);
  $str= htmlspecialchars($str);
  return $str;

}

foreach($_POST as $param => $value)
{
  $_POST[$param]= protecVars($value);
}


foreach($_GET as $param => $value)
{
  $_GET[$param]= protecVars($value);
}
if (isset ($_POST['username']) && isset ($_POST['password']))
{
    $u=$_POST['username'];
	$p=$_POST['password'];
	
	$fail=false;
	$sql = "select id_usuario from usuario where usuario='$u' and passwordd='$p'" ;
    $GetUser = sqlsrv_query( $conn, $sql );
	
if( $GetUser === false) { //if de sql
    die( print_r( sqlsrv_errors(), true) );
}// fin if sql
while( $row = sqlsrv_fetch_array( $GetUser, SQLSRV_FETCH_ASSOC) ) {//while 
//print	  "ID  ".$row["id_usuario"]."<br>"; 
   $id=$row["id_usuario"];
}//fin while
	if(empty($u) && empty($p))
	{
	echo "los datos estan vacios";
		
	}
	elseif($id=='')
	{
	echo "El usuario no existe o la contraseña es incorecta";
	$fail=true;
	}
	
	if($fail==false)
      {	
	  
		if($id>0)
	     {
		// echo	  "ID  ",$id,"<br>"; 
		   $_SESSION['username']=$u;
	       $_SESSION['password']=$p;
		  // echo "id2 ", $_SESSION['username'];
		  // echo "pas: ",$_SESSION['Password'];
	      }
	 }
	 
	 
}
if(isset($_SESSION['username']) && isset($_SESSION['password']) )
{
 $su=$_SESSION['username'];
 $sp=$_SESSION['password'];
 $sql = "select id_usuario, usuario from usuario where usuario='$su' and passwordd='$sp'" ;
   $GetUser = sqlsrv_query( $conn, $sql );
	
if( $GetUser === false) {//if get
    die( print_r( sqlsrv_errors(), true) );
} //if get
while( $row = sqlsrv_fetch_array( $GetUser, SQLSRV_FETCH_ASSOC) ) {//while
//echo  "ID  ".$row["usuario"]."<br>"; 
   $dd=$row["id_usuario"];
   $jd=$row["usuario"];
 
} //while
 if($dd>0)
 
		 {
  		 $_SESSION['usern']=$lml=$jd;
		 
  		 define('user',true); 
		 
    	}
	}
	
	else {
			define ('user',false);
			}

//	$lml= mysql_fetch_assoc($GetUser);
  //		 define('user',true) ;

if ($_GET['action']=='exit')
{
  session_destroy();
}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login Box HTML Code - www.PSDGraphics.com</title>

<link href="login-box.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?  if(user==false) { ?>


<div style="padding: 100px 0 0 250px;">


<div id="login-box">

<H2>Iniciar Sesion</H2>
<br />
<br />

 <form action="" method="post">
 
 
<div id="login-box-name" style="margin-top:20px;">Usuario:</div><div id="login-box-field" style="margin-top:20px;"><input name="username" class="form-login" title="Username" value="" size="30" maxlength="2048" /></div>
<div id="login-box-name">Contraseña:</div><div id="login-box-field"><input name="password" type="password" class="form-login" title="Password" value="" size="30" maxlength="2048" /></div>
<br />
<span class="login-box-options"><input type="checkbox" name="1" value="1"> Recordarme <a href="#" style="margin-left:30px;">Olvidaste tu Contraseña?</a></span>
<br />
<br />
<center> <input type="submit"  value="entrar"/></center>








	<form action="" method="post">
	  <center></center>

  </form>
		  <? } if(user==true) { ?>
		 <b> <?
		 
		 // echo  "Bienvenido a expedientes ",$lml;
		  

		  
		   ?></b>	
		   
	
<meta http-equiv="Refresh" content="0;url=http://128.5.101.78:8080/phpformularioveta/index.php"> 


		<!-- <a href="?action=exit"> salir></a> -->
		 <? } ?>
  </body>
</html>
