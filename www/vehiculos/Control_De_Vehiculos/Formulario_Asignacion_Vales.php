<body>
	<form action = "PHP/Asign_Vales_Combustible.php" method = "POST">
		<div id="container" style=" width:100%;">
			<br>
			<h2><center>Asignacion de vales de gasolina</center></h2>
			<table class="table table-condensed"  style="width:70%;">
				<tr>
					<td><label for = "Vehiculo">Vehiculo:<font color="red">**</font></label></td>
				</tr>
				<tr>
					<td>
							<input class="form-control" type = "text" id = "SeleccionaVehiculo" style = "width: 20%;" placeholder = "Click para buscar Vehiculo" readonly/>
							<input type = "hidden" id = "idVehiculo" name = "idVehiculo"/>
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td id = "VehiculoSeleccionado"></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>
						<input type = "radio" id = "xCantidad" name = "radius" /><label>Asignacion por cantidad de vales</label></td>
				</tr>
				<tr id = "Cantidad"></tr>	
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td><input type = "radio" id = "xCorrelativo" name = "radius" /><label>Asignacion por correlativo de vales</label></td>
				</tr>	
				<tr id = "Correlativo"></tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td><label>Seleccione la gasolinera a la que el vehiculo se dirijira</label></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td><select class="form-control" style="width:30%;" id = "Gasolineras" name = "idGasolinera" >
						<option>--Seleccione una opcion--</option>
					</select></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td><input type = "submit" value = "Asignar vales" class="btn btn-success"/></td>
				</tr>
			</table>

		</div>
	</form>
	<style>
/*	td{
		display: inline-block;
	}*/

	#VehiculoSeleccionado tr th td{
		border: 1px solid;
	}
	</style>
	<script type="text/javascript">

	$.ajax({
		url: 'PHP/Carga_Gasolinera.php',
		type: 'POST',
		data: {},
		async: false,
		success: function(data){
			$("#Gasolineras").empty();
			$("#Gasolineras").append(data);
		}	
	});

	$(document).ready(function() {
		$("#xCantidad").click(function(){
			if($("#Cantidad").children().text().length == 0)
			{			
				$("#Correlativo").empty();
				$("#Cantidad").append("<td><label>Ingrese la contidad de vales a asignar</label><br><input class=\"form-control\" style=\"width:20%;border:1px solid #000;\" type = 'text' name = 'CantidadVales' required /><br><br><label>Ingrese el monto de los vales: </label><br><input class=\"form-control\" style=\"width:20%;border:1px solid #000;\" type = 'text' name = 'MontoVale' required/></td>");		
			}
		});

		$("#xCorrelativo").click(function(){
			if($("#Correlativo").children().text().length == 0)
			{					
				$("#Cantidad").empty();
				$("#Correlativo").append("<tr><td><label>Del vale No.: </label><input class=\"form-control\" style=\"width:50%;border:1px solid #000;\" type = 'text' name = 'ValeInicial' required /></td><td><label>Al vale No.: </label><input class=\"form-control\" style=\"width:50%;border:1px solid #000;\" type = 'text' name = 'ValeFinal' required/></td><td><label>Ingrese el monto de los vales: </label><input class=\"form-control\" style=\"width:50%;border:1px solid #000;\" type = 'text' name = 'MontoVale' required/></td></tr>");		
			}
		});

		$("#SeleccionaVehiculo").click(function(){
			var popup = window.open("Formulario_Seleccion_Vehiculo_Vale.php", "Seleccion de vehiculo", 'width=2000,height=500');
			popup.focus();
		});

	});
</script>
</body>
