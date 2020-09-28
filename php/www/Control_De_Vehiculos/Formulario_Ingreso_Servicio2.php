<body>
	<form action = "PHP/Ingreso_Servicio.php" method = "POST">
		<div id="container" class="table" style=" width:100%;">

			<br>

			<center><h2>Ingreso de Servicio de mantenimiento del vehiculo</h2></center>
			<ul class="list-group">
				<li id="foli4" class="notranslate list-group-item" style="border:none;">
					<label class = "desc" for = "Vehiculo">Vehiculo:<font color="red">**</font> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input class="form-control" style="border:1px solid #000;" type = "text" id = "Vehiculo" name = "Vehiculo" style = "width: 90%;" placeholder = "Click para buscar Vehiculo" readonly/>
						<input type = "hidden" id = "idVehiculo" name = "idVehiculo"/>
					</label>
				</li>
				<li class="list-group-item" style="border:none;"><div id = "Vehiculo_Seleccionado"></div></li>
				<li>&nbsp;</li>
				<li id="foli4" class="notranslate list-group-item" style="border:none;">
					<label class = "desc" for = "Lugar_Servicio">Lugar de servicio:<font color="red">**</font> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input class="form-control"  style="border:1px solid #000;" type = "text" id = "Lugar_Servicio" name = "Lugar_Servicio" style = "width: 90%;" placeholder = "Click para buscar Lugar de Servicio" readonly/>
						<input type = "hidden" id = "idLugarServicio" name = "idLugarServicio"/>
					</label>
				</li>
				<li class="list-group-item" style="border:none;"><div id = "Lugar_Seleccionado"></div></li>
				<li>&nbsp;</li>
				<li id="foli4" class="notranslate list-group-item" style="border:none;">
					<label class = "desc" for = "Tipo_Servicio">Tipo de servicio:<font color="red">**</font>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<select class="form-control"  style="border:1px solid #000;" id = "Tipo_Servicio" name = "Tipo_Servicio">
							<option value = "0">--Seleccione una opion--</option>
							<option value = "1">Servicio Mayor</option>
							<option value = "2">Servicio Menor</option>
						</select>
					</label>
				</li> 
				<li>&nbsp;</li> 
				<li id="foli4" class="notranslate list-group-item" style="border:none;">
					<label class = "desc" for = "Motivo_Servicio">Motivo del servicio:<font color="red">**</font>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<textarea class="form-control" style="border:1px solid #000;" rows="4" cols="120" placeholder = "Maximo 150 caracteres" id = "Motivo" name = "Motivo"></textarea>
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
		<style>


		</style>

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
