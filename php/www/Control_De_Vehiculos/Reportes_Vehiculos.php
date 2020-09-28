<body  >
 		<div align = "center" class = "Carga_Reporte Disponibles" id = "Disponibles">
			<a class = "BuscaCont" id = "Reporte_Vehiculos_Disponibles">Vehículos Disponibles</a>
		</div>
		<br />
		<div align = "center" class = "Carga_Reporte Disponibles" id = "Disponibles">
			<a class = "BuscaCont" id = "Reporte_Vehiculos_Solicitas">Vehículos más solicitados</a>
		</div>
		<br />
		<div align = "center" class = "Carga_Reporte Disponibles" id = "Disponibles">
			<a class = "BuscaCont" id = "Reporte_Vehiculos_Concluidos">Vehículos por Solicitudes Concluidas</a>
		</div>
		<br />
		<div align = "center" class = "Carga_Reporte Disponibles" id = "Disponibles">
			<a class = "BuscaCont" id = "Reportes_Vehiculos_Pendientes">Vehículos por Solicitudes Pendientes</a>
		</div>
		<br>
		<div align = "center" class = "Carga_Reporte Disponibles" id = "Disponibles">
			<a class = "BuscaCont" id = "Reportes_Vehiculos_Mantenimientos">Vehículos con más servicios de Mantenimiento</a>
		</div>
		<br>
		<div align = "center" class = "Carga_Reporte Disponibles" id = "Disponibles">
			<a class = "BuscaCont" id = "Reportes_Vehiculos_Reparaciones">Vehículos con más servicios de Reparación</a>
		</div> 
		<br>
		<div align = "center" class = "Carga_Reporte Disponibles" id = "Disponibles">
			<a class = "BuscaCont" id = "Reportes_Vehiculos_Reparaciones">Consolidado de movimientos de vehiculos</a>
		</div>
	</div>
	<style>	
		
		#Continelo{
			margin-top: 15%;
			display: inline;
			width: 80%;
            cursor: pointer;
            background: #fea;
            text-align: center;

            
		}
	
	
		
		#Disponibles{
			    background-color: #005588; /* Green */
			    border: none;
			    color: white;
			    padding: 35px 32px 35px 50px;
			    text-align: center;
			    text-decoration: none;
			    display: inline-block;
			    font-size: 26px;
			    margin: 14px 12px 10px 55px;
			    cursor: pointer;
			    width: 50%;
		}

		
		
		.Disponibles {text-align: center;}

		.Carga_Reporte {
			color: hsl(0, 0%, 100%);
			font-size: 20px;
			border-radius: 8px;
			margin-left: 5%;
			padding: 60px;
			width: 50%;
			border: 1px;
			border-radius: 25px;

		}
		
		.Carga_Reporte:hover .Disponibles:hover{
			background: #fea;
		}
		
	</style>
	
	<script>
		$(document).ready(function(){
			$(".Carga_Reporte").click(function(){
				$("#cont").load($(this).children().attr('id') + ".php");
			})
		});
	</script>
</body>
