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
	<form>
		<div id='cssmenu'>
			<ul>
				<li><a id = "Tabla_Vehiculos">Vehiculo</a></li>
				<li><a id = "Tabla_Tipo_Vehiculo">Tipo de Vehiculo</a></li>
				<li><a id = "Tabla_Estado_Vehiculo">Estado Vehiculo</a></li>
				<li><a id = "Tabla_Marca_Vehiculo">Marca Vehiculo</a></li>
				<li><a id = "Tabla_Modelo_Vehiculo">Modelo Vehiculo</a></li>
				<li><a id = "Tabla_Linea_Vehiculo">Linea Vehiculo</a></li>
				<li><a id = "Tabla_Tipo_Servicio">Tipo de Servicio</a></li>
				<li><a id = "Tabla_Lugar_Servicio">Lugar de Servicio</a></li>
				<li><a id = "Tabla_Departamento">Departamento</a></li>
				<li><a id = "Tabla_Municipio">Municipio</a></li>
				<li><a id = "Tabla_Repuesto">Repuesto</a><li>
			</ul>
		</div>
	</form>
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