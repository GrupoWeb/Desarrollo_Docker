<?php
$Cod_Solicitud = $_GET['Solicitud'];
$stSolicitante = $_GET['Solicitante'];
?>
<body>
	<form action = "PHP/Autorizacion_Solicitud.php" method="POST" id = "Formulario" >
		<div id="container"  style=" width:100%; ">
			<center><h2>Solicitudes de vehiculos para Autorizar</h2></center>
			<table class="table" style="width:70%;">
				<tr>
					<td  style = "background: #339999; color: #FFFFFF;width:5%;" >No. Solicitud</td>
					<td ><?php echo $Cod_Solicitud; ?>
						<input type = "hidden" id = "idSolicitud" name = "idSolicitud" value = "<?php echo $Cod_Solicitud; ?>"/></td>
						<tr>
						</tr>
						<td>&nbsp;</td>
						<tr>
						</tr>
						<td style = "background: #339999; color: #FFFFFF; width:5%;" >Solicitante:<td><?php echo $stSolicitante; ?></label></td>

						<td style = "background: #339999; color: #FFFFFF;" >Aprobador:
							<td id = "Aprobador" ></td>
							<tr>
							</tr>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td style = "background: #339999; color: #FFFFFF;" >Fecha Solicitud:</td>
							<td id = "Fecha_Solicitud"></td>

							<td width="118" style = "background: #339999; color: #FFFFFF;" >Hora Solicitud:</td>
							<td width="325" id = "Hora_Solicitud"></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<tr>
							</tr>
							<td style = "background: #339999; color: #FFFFFF;" >Fecha Salida:</td>
							<td id = "Fecha_Salida"></td>

							<td style = "background: #339999; color: #FFFFFF;" >Hora Salida:</td>
							<td id = "Hora_Salida"></td>

						</tr>
						<tr>
							<td>&nbsp;</td>

						</tr>
						<tr>
							<td style = "background: #339999; color: #FFFFFF;" >Fecha Regreso:</td>
							<td id = "Fecha_Regreso"></td>

							<td style = "background: #339999; color: #FFFFFF;" >Hora Regreso:</td>
							<td id = "Hora_Regreso"></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
						</tr>
						<div id = "Direcciones">
						</div>
						<tr>
							<td width="138" height="29" style = "background: #339999; color: #FFFFFF;" >Tipo de la solicitud: 
								<td width="162" id = "Tipo_Solicitud"></td>
								<td width="137" style = "background: #339999; color: #FFFFFF;" >Tipo de comision: 
									<td width="281" id = "Tipo_Comision"></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
								</tr>

								<tr >
									<td width="157" style = "background: #339999; color: #FFFFFF;" >Motivo de la solicitud: 
										<td width="100%" id = "Motivo_Solicitud"></td>
										<tr>
											<td>
												<div class="row">
													<div class="col-md-12">
														    <div class='box-body'>
											                    <div class='form-group'>
											                      <label for="vehiculo">Seleccione Vehiculo:<font color="red">**</font></label>
											                      <input class="form-control " type = "text" id = "TocaVehiculo" name = "TocaVehiculo" width = "400%" placeholder = "Click para seleccionar un vehiculo" readonly />
																</div>
																<div class='form-group'>
											                      <label for="vehiculo">Seleccione Piloto:<font color="red">**</font></label>
											                      <select class="form-control" id = "SelecPiloto" name = "SelecPiloto" required>
											                      	<option value = "0">--Seleccione una opcion--</option>
											                      </select>  
											                     </div>
								                            </div>
								                   </div>
								                </div>
											</td>
											<td>
												<div id = "Vehiculo_Seleccionado"></div>
												<input type = "hidden" id = "idVehiculo" name = "idVehiculo"/>
												<input type = "hidden" id = "idPiloto" name = "idPiloto" />
											</td>
										</tr>
										<tr>
											<td>

											</td>
											<td>
												<div id = "divide_gasolina"></div>
											</td>
										</tr>	
										<tr>
											<td><input type = "submit" id = "submit" value = "Autorizar Solicitud" class="btn btn-success "/></td>
											<td width="432"><input id = "Rechaza" type = "button" value = "Rechazar Solicitud" class="btn btn-success "/></td>
		  </tr>

		</table>


	</div>
</form>
			 <script>	

			     $.ajax({
				      url: 'PHP/Carga_Piloto.php',
				      async: false,
				      success: function(data)
				      {
				        $("#SelecPiloto").empty();
				        $("#SelecPiloto").append(data);
				      }
				    });		
			 $.ajax({ url: 'PHP/Carga_Fechas_Solicitud_Autoriza.php',
			 	data: {Solicitud: $("#idSolicitud").val()},
			 	type: 'POST',
			 	async: false,
			 	success: function(data) {
			 		data = JSON.parse(data);
			 		$("#Aprobador").append(data['strAprobador']);
			 		$("#Motivo_Solicitud").append(data['MotivoSalida']);
			 		$("#Fecha_Solicitud").append(data['dFecha_Solicitud']);
			 		$("#Hora_Solicitud").append(data['hHora_Solicitud']);
			 		$("#Fecha_Salida").append(data['dFecha_Salida']);
			 		$("#Hora_Salida").append(data['hHora_Salida']);
			 		$("#Fecha_Regreso").append(data['dFecha_Regreso']);
			 		$("#Hora_Regreso").append(data['hHora_Regreso']);
			 		$("#Direccion").append(data['strDireccion']);
			 		$("#Tipo_Solicitud").append(data['strTipo_Solicitud']);
			 		$("#Tipo_Comision").append(data['strTipo_Comision']);	
			 	}
			 });

			 $.ajax({
			 	url: 'PHP/Carga_Direcciones.php',
			 	data: {idSolicitud: $("#idSolicitud").val()},
			 	type: 'POST',
			 	success: function(data){
			 		$("#Direcciones").append(data);
			 		$(".Modificar").hide();
			 	}
			 });

			 $(document).ready(function(){
	

$("#TocaVehiculo").click(function(){
	if($("#Tipo_Solicitud").text() !== "IDA,ESPERA,REGRESO")
	{
		var envio = "p="+$("#idSolicitud").val()+"&fs="+$("#Fecha_Salida").text()+"&fr="+$("#Fecha_Regreso").text()+"&hs="+$("#Hora_Salida").text()+"&hr="+$("#Hora_Regreso").text();
		var popup = window.open("Formulario_Seleccion_Vehiculo.php?"+ envio, "Seleccion de vehiculos", 'width=2000px,height=900'); 	
		popup.focus();
	}
	else
	{
		var envio = "p="+$("#idSolicitud").val()+"&fs="+$("#Fecha_Salida").text()+"&fr="+$("#Fecha_Regreso").text()+"&hs="+$("#Hora_Salida").text()+"&hr="+$("#Hora_Regreso").text();
		var popup = window.open("Formulario_Seleccion_Vehiculo_Completo.php?"+ envio, "Seleccion de vehiculos", 'width=2000px,height=900'); 	
		popup.focus();
	

	}
});

$("#Rechaza").click(function(){

	$("#submit").hide();

	var popup = window.open("Formulario_Rechaza_Solicitud.php?p="+$("#idSolicitud").val(), "Seleccion de vehiculos", 'width=1000,height=400'); 	
	popup.focus();
});

$("#divide_gasolina").on("click", "#vale_gasolina", function(){
	var envio = "p="+$("#idVehiculo").val();
	var popup = window.open("Formulario_Asignacion_Vale_Comision.php?"+ envio, "Asignacion de vales", 'width=1000,height=600'); 	
	popup.focus();
});

});
</script>
</body>