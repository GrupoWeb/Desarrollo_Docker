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
<body>
	<style>
	#cssmenu {
			 background: #d8d8d8;
			  list-style: none;
			  margin-left: -3%;
			  padding: 0 auto;
			  /*width: 15em;*/
			  cursor: pointer;
			  position: relative;
			  display: inline-block;
			  color: white;
			  height: 1000px;
			  float: lef
			  t;
	}
	#cssmenu li {
			  margin: 0;
			  padding: 0;
			  list-style: none;
			  color: black;
	}
	/*#cssmenu li:hover
	{
	    background-color: cornflowerblue;
	}*/
	#cssmenu a{
		/*background: #d8d8d8;*/
		  border-bottom: 1px solid #393939;
		  color:#000000;
		  display: block;
		  margin: 0;
		  padding: 25px ;
		  text-decoration: none;
		  font-weight: normal;
}
	#cssmenu a:hover {
		background: cornflowerblue;
	  color:#000000;
	  padding-bottom: 25px;
	}
.Estilo4 {font-size: 25px;}
.Estilo5 {font-size: medium}


	</style>
	<form>
		<div id='cssmenu'>
			<ul>
				<li><h3>Vales de Combustible</h3></li>
				<!--<li><a id = "Tabla_Vale_Gasolina">Vales de Combustible</a></li>
				<li><a id = "Formulario_Asignacion_Vales">Asignar Vales de Gasolina</a></li>-->
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
				<li><a id = "<?php echo $row['nombre_link'];?>"><?php echo $row['Nombre_lk'];?></a></li>
				<?php }
				}
				else
				{
					echo "<script>alert('Error al intentar abrir menus');</script>";
				}?>
				 <li><h3>Servicios para Vehiculos</h3></li>
				<li><a id = "Formulario_Ingreso_Servicio">Enviar automovil a Servicio de Mantenimiento</a></li>
				<li><a id = "Formulario_Ingreso_Reparacion">Enviar automovil a Reparacion</a></li>
				<li><a id = "Tabla_Vehiculos_Mantenimiento">Vehiculo Retornado de Servicio de Mantenimiento</a></li>
				<li><a id = "Tabla_Vehiculos_Reparacion">Vehiculo Retornado de Reparacion</a></li>
				
			</ul>
		</div>
	</form>
	
	<script>
		$(document).ready(function() {
				$("a").click(function(event) {
					var contenido = this.id;
					contenido = contenido + ".php";
					$("#cont").load(contenido);
				});
			});
	</script>
</body>