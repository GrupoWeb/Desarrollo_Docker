<?php 
//iniciamos la sesion
session_start();
//agregamos la conexion de la base de datos
require 'Conexiones/conexion.php';
//le indicamos que si la secion es diferente al id del usuario logueado nos redireccione hacia el login.php
if(!isset($_SESSION['username']))
{ header("location: error.html");}
//asignamos la sesion a la variable idusuario
$idusuario=$_SESSION['username'];
 ?>
 
<!DOCTYPE html>
<html lang="es">
<head>


  <title>SISI</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/acordeon.css">
  <link rel="stylesheet" type="text/css" href="media/css/jquery.dataTables.min.css">

  <script src="js/jquery.js"></script>
  <script src="media/js/jquery.dataTables.min.js"></script>
  
  
  <style>
body {
     background-color:aliceblue;
}
</style>
<style>

#login-box {
                width:333px;
                height: 352px;
                padding: 58px 76px 0 76px;
                color: #ebebeb;
                font: 12px Arial, Helvetica, sans-serif;
                background:url(phpformularioveta/images/login-box-backg.png) no-repeat left top;
}

#login-box img {
                border:none;
}

#login-box h2 {
                padding:0;
                margin:0;
                color: #ebebeb;
                font: bold 44px "Calibri", Arial;
}


#login-box-name {
                float: left;
                display:inline;
                width:80px;
                text-align: right;
                padding: 14px 10px 0 0;
                margin:0 0 7px 0;
}

#login-box-field {
                float: left;
                display:inline;
                width:230px;
                margin:0;
                margin:0 0 7px 0;
}


.form-login  {
                width: 205px;
                padding: 10px 4px 6px 3px;
                border: 1px solid #0d2c52;
                background-color:#1e4f8a;
                font-size: 16px;
                color: #ebebeb;
}


.login-box-options  {
                clear:both;
                padding-left:87px;
                font-size: 11px;
}

.login-box-options a {
                color: #ebebeb;
                font-size: 11px;
}
</style>

   
</style>

<style>
button.accordion {
    background-color: deepskyblue;
    color: #444444;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: inherit;
    font-size: 15px;
    transition: 0.4s;
}

button.accordion.active, button.accordion:hover {
    background-color: ‎#0CB7F2;
}

div.panel {
    padding: 0 18px;
    display: none;
    background-color: white;
    cursor: pointer;

}

div.panel ul{
     list-style:none;
     display:inline;
     padding-left:3px;
     padding-right:3px;
       }
div.panel.show {
    display: block;
}
</style>  
  


<script type="text/javascript">
//<![CDATA[
$(document).ready(function(){ // inicio ready.function
 
$('a').click(function(){
	$.get(this.id, function(data){
		$("#result").html(data);
		
	});
    
});
 
    
}); // fin ready.function
 
//]]>
</script>
<script>
    $(document).ready(function(){
        $('li a').find(li:eq(2)).css('border','1px solid black');
        
    });
    
    </script>
 
</head>
<body>


<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav" style = "width: 20%; position: relative; display: inline-block;">
      <a href="index.php"><h4>SISI</h4></a>
	<br>

	  
      <ul class="nav nav-pills nav-stacked">
	  
	            <button type="button" class="btn btn-default btn-sm" onClick="top.location.href= '../SistemaLogueo/login.php'" >
              <a class="glyphicon glyphicon-cog" href="../SistemaLogueo/login.php">HOME</a>
             </button> 
	           <br>
	           <br>
	           <button type="button" class="btn btn-default btn-sm" onClick="top.location.href= 'logout.php'">
                <a href="logout.php">Cerrar Session</a>
             </button>
	           <br>
	           <br>
	           <button class="accordion">APP</button>
            <div class="panel">
            <ul>
     
       <?php
 
              $sql="select enlace.id_link, ss.nombre_link, ss.Nombre_lk, usu.usuario
            from Tasignacion as enlace inner join Tlinks as ss 
            on enlace.id_link=ss.id_link inner join Trol as tl on tl.id_rol=enlace.id_rol inner join Tusuario as usu on usu.id_usu=enlace.id_usu where enlace.id_usu=$idusuario and enlace.id_tlink=2 and enlace.estado=1";

            $resultado=sqlsrv_query($conn, $sql);

            if($resultado==true){

            while( $row = sqlsrv_fetch_array( $resultado, SQLSRV_FETCH_ASSOC) ) {
       ?>
            <li><a  id="../<?php echo $row['nombre_link']?>">
              <i class="" aria-hidden="true"></i>&nbsp; <?php echo $row['Nombre_lk']?></a></li><br>

            <?php }}?>
             </ul>

          </div>

      </ul><br>

    </div>

    <div id="result" class="col-sm-9" style = "width: 50%; position: relative; display: inline-flex;">
		<br>
		<br>


          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].onclick = function(){
        this.classList.toggle("active");
        this.nextElementSibling.classList.toggle("show");
  }
}
</script>


</body>
</html>
