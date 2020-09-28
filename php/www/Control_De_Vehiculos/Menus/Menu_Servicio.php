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
          	<li><h5>Vales de Combustible</h5></li>
            	<?php
				  $sql="
				  select 
					enlace.id_link, 
					ss.nombre_link,
					ss.imagen, 
					ss.Nombre_lk, 
					usu.usuario
				from 
					[syslogin].[dbo].[Tasignacion] as enlace 
					inner join [syslogin].[dbo].[Tlinks] as ss on enlace.id_link=ss.id_link 
					inner join [syslogin].[dbo].[Trol] as tl on tl.id_rol=enlace.id_rol 
					inner join [syslogin].[dbo].[Tusuario] as usu on usu.id_usu=enlace.id_usu 
				where 
					enlace.id_usu = $idUsuario 
					and enlace.id_tlink = 17
					and enlace.estado = 1";
					
				$resultado=sqlsrv_query($conn, $sql);
					
				if($resultado==true){
					
				while( $row = sqlsrv_fetch_array( $resultado, SQLSRV_FETCH_ASSOC) ) {?>
				<li class="treeview">
					<a id = "<?php echo $row['nombre_link']; ?>">
						<span><?php echo $row['Nombre_lk'];?>
						</span></a>
				</li>
				<?php }
				}
				else
				{
					echo "<script>alert('Error al intentar abrir menus');</script>";
				}?>
				<li><h5>Servicios para Vehiculos</h5></li>
				<li class="treeview">
					<a style ="word-wrap: break-word;" id = "Formulario_Ingreso_Servicio">Enviar a Mantenimiento</a></li>
				<li class="treeview">
					<a id = "Formulario_Ingreso_Reparacion">Enviar automovil a Reparación</a></li>
				<li class="treeview">
					<a id = "Tabla_Vehiculos_Mantenimiento">Retornado de Mantenimiento</a></li>
				<li class="treeview">
					<a id = "Tabla_Vehiculos_Reparacion">Retornado de Reparación</a></li>
				

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
