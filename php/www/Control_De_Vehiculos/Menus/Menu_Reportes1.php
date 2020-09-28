<body>
    <style>
	#cssmenu {
			 background: #d8d8d8;
			  list-style: none;
			  margin-left: -3%;
			  padding: 0;
			  cursor: pointer;
			  position: relative;
			  display: inline-block;
			  color: white;
			  height: 1000px;
			  width: 98%;
			 float: left;
			  display: inline-block;
			  
        
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
		
		  border-bottom: 1px solid #393939;
		  color:#000000;
		  display: block;
		  margin: 0;
		  padding: 25px;
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

		<div id='cssmenu'>
			<ul>
				<li><a id = "Ver_Solicitudes">Ver Solicitudes</a></li>
				<li><a id = "Reportes_Vehiculos">Reportes de Vehiculos</a></li>
				<li><a id = "Reportes_Vales">Reportes de Vales de combustible</a></li>
				<li><a id = "consolidado">Consolidado de Movimiento de Vehiculos </a></li>
<!-- 				<li><a id = "Impresion_de_Solicitud">Ver Pilotos disponibles</a></li>
				<li><a id = "Impresion_de_Solicitud">Ver Lugares mas solicitados</a></li>
				<li><a id = "">Ver Servicios de vehiculos</a></li>
				<li><a id = "Impresion_de_Solicitud">Ver Reparacions de vehiculos</a></li> -->
			</ul>
		</div>
	
	<!-- <link rel="stylesheet" type="text/css" href = "css/Theme_Lista.css" /> -->
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