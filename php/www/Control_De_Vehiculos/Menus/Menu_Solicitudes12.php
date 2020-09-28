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
			 

			  list-style: none;
			  margin-left: -3%;
			  padding: 0 auto;
			  cursor: pointer;
			  position: relative;
			  display: inline-block;
			  color: white;
			  height: 1100px;
			  background: #d8d8d8;
			  
			  float: left;
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



		<div id='cssmenu'  >
			
			<ul >
				<!--<li><a id = "Formulario_Ingreso_Solicitud">Crear nueva Solicitud</a></li>
				<li><a id = "Consulta_Estado_Solicitud">Consultar Solicitud</a></li>
				<li><a id = "Formulario_Aprobacion_Solicitud">Solicitudes de Vehiculos para Aprobar</a></li>
				<li><a id = "Formulario_Autoriza_Solicitud">Solicitudes de Vehiculos para Autorizar</a></li>
				<li><a id = "Formulario_Solicitudes_Piloto">Solicitudes Piloto</a></li>
				<li><a id = "Formulario_Solicitudes_sinPiloto">Solicitudes Sin Piloto</a></li>
				<li><a id = "Verificar_solicitud">Solicitudes de Vehiculos para Verificar</a></li>-->
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
					and enlace.id_tlink = 16 
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