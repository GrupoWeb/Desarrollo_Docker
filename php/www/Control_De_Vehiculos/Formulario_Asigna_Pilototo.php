<body>
	<form id = "El_formato">
		<label>Vehiculo: </label>
		<select id = "LeVehiculo">
		</select>
		<input type = "text" id = "LeMarca" readonly />
		<input type = "text" id = "LeLinea" readonly />
		<input type = "text" id = "LeModelo" readonly />
		<br>
		<br>
		<label>Piloto: </label>
		<select id = "LePiloto">
		</select>
		<br>
		<br>
		<input type = "button" id = "ElBoton" value = "Aisgna Vehiculo" />
	</form>
	<style>
		#El_formato{
			border: 1px solid;
			border-radius: 25px;
			margin-left: 5%;
			padding: 3%;
			width: 50%;
			background: hsl(0, 0%, 90%);
		}
	</style>
	<script>
		$.ajax({
			url : 'PHP/Cargame_Los_Pilotos.php',
			data:{},
			type: "POST",
			async: false,
			success: function(data){
				$("#LeVehiculo").empty();
				$("#LeVehiculo").append(data);
			}
		});
		
		$.ajax({
			url : 'PHP/Cargame_Los_Vehiculo.php',
			data:{},
			type: "POST",
			async: false,
			success: function(data){
				$("#LePiloto").empty();
				$("#LePiloto").append(data);
			}
		});
		
		$(document).ready(function(){
			
			$("#LeVehiculo").change(function(){
				$.ajax({
					url : 'PHP/Cargame_Las_Informaciones.php',
					data:{idVehiculo: $(this).val()},
					type: "POST",
					async: false,
					success: function(data){
						data = JSON.parse(data);
						
						$("#LeMarca").val(data['strMarca_Vehiculo']);
						$("#LeLinea").val(data['strLinea_Vehiculo']);
						$("#LeModelo").val(data['strModelo_Vehiculo']);
					}
				});
			});
			
		});
	</script>
</body>