<? require('conexion.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>SISI</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;}
    }
  </style>
   <link href="css/registro.css" rel="stylesheet">
	 <link href="css/fontbootstrap.css" rel="stylesheet">
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap-select.min.css">
<script src="js/bootstrap-select.min.js"></script>


<!-- Libreria DataTable-->


<script src="js/jquery.dataTables.min.js"></script>

<!-- Estilos DataTable-->

<link rel="stylesheet" href="css/dataTables.uikit.min.css">
<link rel="stylesheet" href="css/jquery.dataTables.min.css">

<!-- Estilos f-->
<link rel="stylesheet" href="css/font-awesome.css">
<link rel="stylesheet" href="css/font-awesome.min.css">

<style>
button.accordion {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
}

button.accordion.active, button.accordion:hover {
    background-color: #ddd;
}

div.panel {
    padding: 0 18px;
    display: none;
    background-color: white;
}

div.panel.show {
    display: block;
}
</style>



 
</head>
<body>

<div class="container-fluid">
  <div class="row content">
    <iframe class="col-sm-3 sidenav">
      
	  <h4>SISI</h4>

	  
      <ul class="nav nav-pills nav-stacked">
        <li><a href="" ></a></li>
	  <button id="div-btn1" class="accordion">APP</button>
<div class="panel">



<?php
 
  $sql="select enlace.id_link, ss.nombre_link, ss.Nombre_lk, usu.usuario
from Tasignacion as enlace inner join Tlinks as ss 
on enlace.id_link=ss.id_link inner join Trol as tl on tl.id_rol=enlace.id_rol inner join Tusuario as usu on usu.id_usu=enlace.id_usu where enlace.id_usu=$idusuario and enlace.id_tlink=6";

$resultado=sqlsrv_query($conn, $sql);

if($resultado==true){

while( $row = sqlsrv_fetch_array( $resultado, SQLSRV_FETCH_ASSOC) ) {?>
<a  id="../<?php echo $row['nombre_link']?>"><i class="fa fa-cog fa-fw" aria-hidden="true"></i>&nbsp; <?php echo $row['Nombre_lk']?></a><br>

<?php }}?>




</div>		
		
      </ul><br>

    </iframe>

    <div id="result" class="col-sm-9">
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
