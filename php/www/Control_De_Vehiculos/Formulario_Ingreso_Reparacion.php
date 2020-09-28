<body>
	<form action = "PHP/Ingreso_Reparacion.php" method = "POST">
		<div id="container" style=" width:100%;">


			<br>
			<center><h2>Envio de vehiculo a reparación </h2></center>
			<ul class="list-group">
				<li id="foli4" class="notranslate list-group-item" style="border:none;">
					<label class = "desc" for = "Vehiculo">Vehiculo:<font color="red">**</font> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input class="form-control" style="border:1px solid #000;"type = "text" id = "Vehiculo" name = "Vehiculo" style = "width: 90%;" placeholder = "Click para buscar Vehiculo" readonly/>
						<input type = "hidden" id = "idVehiculo" name = "idVehiculo"/>
					</label>
				</li>
				<li><div id = "Vehiculo_Seleccionado"></div></li>
				<li>&nbsp;</li>
				<li id="foli4" class="notranslate list-group-item" style="border:none;">
					<label class = "desc" for = "Lugar_Servicio">Lugar de servicio:<font color="red">**</font> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input class="form-control" style="border:1px solid #000;" type = "text" id = "Lugar_Servicio" name = "Lugar_Servicio" style = "width: 90%;" placeholder = "Click para buscar Lugar de Servicio" readonly/>
						<input type = "hidden" id = "idLugarServicio" name = "idLugarServicio"/>
					</label>
				</li>
				<li><div id = "Lugar_Seleccionado"></div></li>
				<li>&nbsp;</li>
				<li id="foli4" class="notranslate list-group-item" style="border:none;">
					<label class = "desc" for = "Motivo_Servicio">Motivo del servicio:<font color="red">**</font>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<textarea class="form-control" style="border:1px solid #000;"  rows="4" cols="120" placeholder = "Maximo 150 caracteres" id = "Motivo" name = "Motivo"></textarea>
					</label>
				</li> 
				<li>&nbsp;</li> 
				<li id="foli4" class="notranslate list-group-item" style="border:none;">
					<input type = "submit" value = "Enviar formulario" class="btn btn-success"/>
				</li>
				<li>&nbsp;</li>

			</ul>

		</div>
	</form>


	<script>
	
	
	$(document).ready(function()
	{

		$("#Vehiculo").click(function()
		{
			var popup = window.open("Formulario_Seleccion_Vehiculo_Servicio.php","Envio de Vehiculo a Servio", 'width=1000,height=400');
			popup.focus();
		});
		
		$("#Lugar_Servicio").click(function()
		{
			var popup = window.open("Formulario_Seleccion_Lugar_Servicio.php","Envio de Vehiculo a Servio", 'width=1000,height=400');
			popup.focus();
		});
		

	});
	
	</script>
</body>
