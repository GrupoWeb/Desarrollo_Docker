<?php
session_start();
if(!isset($_SESSION['username']) || empty($_SESSION['username']))
{
	echo "<script>alert('Debe inicial secion para poder acceder al sistema'); location.replace('../SistemaLogueo');</script>";
}
else
{
	require('../conexion/conexion.php');
	$idUsuario = $_SESSION['username'];
	
}
?>


<section class="sidebar" style="width: 100%;">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">

              <img src="dist/img/avatar.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION['nom1']
               ?></p>
              <!-- Status -->
              <a href="#"><i class="fa fa-circle text-success"></i> Conectado</a>
            </div>
          </div>

          <!-- search form (Optional)
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          search form -->

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
          	<li class="header">MENU</li>      	
        <li class="treeview"><a id = "Ver_Solicitudes">Ver Solicitudes</a></li>
        <li class="treeview"><a id = "Reportes_Vehiculos">Reportes de Vehiculos</a></li>
        <li class="treeview"><a id = "Reportes_Vales">Reportes de Vales de combustible</a></li>
       <li class="treeview"><a id = "consolidado">Consolidado de Movimiento de <br>Vehiculos</a></li>
				
          </ul><!-- /.sidebar-menu -->
        </section>

	<script>
		$(document).ready(function() {
				$("a").click(function(event) {
					var contenido = this.id;
					contenido = contenido + ".php";
					$("#cont").load(contenido);
				});
			});
	</script>
