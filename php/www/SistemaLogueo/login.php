<?php
session_start();

$id="";

include('conexion.php');	

function protecVars($str)
{
	$str =addslashes($str);
  //$str= mysql_real_escape_string ($str);
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
	$sql = "select id_usu, usuario, nombre1, apellidop from Tusuario where usuario='$u' and passwordd='$p' and estado = 1"  ;
	$GetUser = sqlsrv_query( $conn, $sql );
	
if( $GetUser === false) { //if de sql
	die( print_r( sqlsrv_errors(), true) );
}// fin if sql
while( $row = sqlsrv_fetch_array( $GetUser, SQLSRV_FETCH_ASSOC) ) {//while 
//print	  "ID  ".$row["id_usuario"]."<br>"; 
	$id=$row["id_usu"];
	$ususs=$row["usuario"];
	$nom1=$row["nombre1"];
	$apep=$row["apellidop"];
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
		$_SESSION['username']=$id;
		$_SESSION['password']=$p;
		$_SESSION['dato1']=$ususs;
		$_SESSION['usern']=$ususs;
		$_SESSION['nom1']=$nom1;
		$_SESSION['apellidop']=$apep;
		  // echo "id2 ", $_SESSION['username'];
		  // echo "pas: ",$_SESSION['Password'];
	}
}


}
if(isset($_SESSION['username']) && isset($_SESSION['password']) )
{
	$su=$_SESSION['username'];
	$sp=$_SESSION['password'];
	$sql = "select id_usu, usuario, roll.Nombre_rol  from Tusuario as uset inner join Trol as roll on 
	uset.id_usu = roll.id_rol where usuario='$su' and passwordd='$sp';" ;
	$GetUser = sqlsrv_query( $conn, $sql );
	
if( $GetUser === false) {//if get
	die( print_r( sqlsrv_errors(), true) );
} //if get
while( $row = sqlsrv_fetch_array( $GetUser, SQLSRV_FETCH_ASSOC) ) {//while
//echo  "ID  ".$row["usuario"]."<br>"; 
	$dd=$row["id_usu"];
	$jd=$row["usuario"];
	$rl=$row["Nombre_rol"];
	$_SESSION['usern']=$id;
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

// if ($_GET['action']=='exit')
// {
// 	session_destroy();
// }
?>

<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="es" dir="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Seguridad Informatica</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
        integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/login.css" />


</head>

<body>
    <?php  if(user==false) { ?>

    <div class="main">


        <div class="container">
            <center>
                <div class="middle">
                    <div id="login">

                        <form action="" method="post">

                            <fieldset class="clearfix">

                                <p><span class="fa fa-user"></span><input type="text" name="username"
                                        Placeholder="Usuario" required></p>
                                <!-- JS because of IE support; better: placeholder="Username" -->
                                <p><span class="fa fa-lock"></span><input type="password" name="password"
                                        Placeholder="Contraseña" required></p>
                                <!-- JS because of IE support; better: placeholder="Password" -->

                                <div>
                                    <!-- <span style="width:48%; text-align:left;  display: inline-block;"><a
                                            href="/phpformularioveta/olvidomipass.php" class="small-text"
                                            href="#">Olvidaste tu  contraseña?</a></span> -->
                                    <span style="width:50%; text-align:right;  display: inline-block;"><input
                                            type="submit" value="Entrar"></span>
                                </div>

                            </fieldset>
                            <div class="clearfix"></div>
                        </form>

                        <div class="clearfix"></div>

                    </div> <!-- end login -->
                    <div class="logo">
                        <img src="images/logo_rpt.jpg" alt="" />

                        <div class="clearfix"></div>
                    </div>

                </div>
            </center>
        </div>

    </div>





    <?php } if(user==true) { ?>
    <b> <?php

		



				?></b>


    <!-- llamado de roles temporal
	<meta http-equiv='Refresh' content='0;url=<? //echo $rl; ?>'>  -->
    <meta http-equiv='Refresh' content='0;url=sistemas.php'>


    <!-- <a href="?action=exit"> salir></a> -->
    <?php } ?>

    </form>
    </div>
    </div>

    </div>
    </div>

</body>

</html>