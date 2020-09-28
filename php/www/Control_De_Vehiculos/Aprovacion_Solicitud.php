<?php
$Cod_Solicitud = $_GET['Solicitud'];
$stSolicitante = $_GET['Solicitante'];
?>

<body>
	<form action="PHP/Aprovacion_Solicitud.php" method="POST"  >
		<div   style=" width:80%; margin-left:270px;" >
			</h1>
				<center><h2>Solicitudes de vehiculos para aprobar</h2></center>
			<table  class="table " style="width:80%;"   >
				<tr>
					<td width="100px" style = "background: #339999; color: #FFFFFF;" >No. Solicitud:</td>
					<td width="213">   <?php echo $Cod_Solicitud; ?>
						<input type = "hidden" id = "idSolicitud" name = "idSolicitud" value = "<?php echo $Cod_Solicitud; ?>"/>
					</td>
				</tr>
				<tr>
						<td>&nbsp;</td>
				</tr>
				<tr>
						<td style = "background: #339999; color: #FFFFFF;" >Solicitante:</td><td><?php echo $stSolicitante; ?></td>
				</tr>
				<tr>
						<td>&nbsp;</td>
				</tr>
				<tr>
						<td style = "background: #339999; color: #FFFFFF;" >Fecha Solicitud:</td>   <td id = "Fecha_Solicitud"></td>
						<td width="125" style = "background: #339999; color: #FFFFFF;" >Hora Solicitud:</td>
						<td width="250" id = "Hora_Solicitud"></td>
				</tr>
				<tr>
						<td>&nbsp;</td>
				</tr>
				<tr>
						<td style = "background: #339999; color: #FFFFFF;" ><input type = "checkbox" id = "FS" name ="FS" class="Modificar"/>Fecha Salida:   <td id = "Fecha_Salida"></td>
						<td width="125" style = "background: #339999; color: #FFFFFF;" ><input type = "checkbox" id = "HS" name = "HS" class="Modificar"/>Hora Salida:    
						<td  id = "Hora_Salida"></td>
				</tr>
				<tr>
							<td>&nbsp;</td>
				</tr>
				<tr>
						<td style = "background: #339999; color: #FFFFFF;" ><input type = "checkbox" id = "FR" name = "FR" class="Modificar"/>Fecha Regreso:   <td id = "Fecha_Regreso"></td>
						<td style = "background: #339999; color: #FFFFFF;" ><input type = "checkbox" id = "HR" name = "HR" class="Modificar"/>Hora Regreso:   <td id = "Hora_Regreso"></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<div id = "Direcciones">
					</div>
				</tr>
					<br>
				<tr>
						<td width="149" style = "background: #339999; color: #FFFFFF;" >Tipo de Solicitud: 
						<td width="231" id = "Tipo_Solicitud"></td>
						<td width="149" style = "background: #339999; color: #FFFFFF;" >Tipo de Comision:   
						<td width="434" id = "Tipo_Comision"></td>
				</tr>
				<tr>
						<td>&nbsp;</td>
				</tr>
				<tr>
						<td width="129" style = "background: #339999; color: #FFFFFF;" ><input type = "checkbox" id = "Mo" name = "Mo" class="Modificar"/>Motivo:</td> 
						<td width="100%"  id = "Motivo_Solicitud"></td>
				</tr>
				<tr>
						<td>&nbsp;</td>
				</tr>
				<tr>
						<td width="302"><input type = "submit" id = "submit" value = "Aprobar Solicitud" class="btn btn-success btn-lg"/></td>
						<td width="432"><input id = "Rechaza" type = "button" value = "Rechazar Solicitud" class="btn btn-success btn-lg "/></td>
				</tr>
				</table>

		</form>

		<style>
		</style>
		 <script type='text/javascript' src="js/jquery.min.js"></script>

							<script>			
							$.ajax({ url: 'PHP/Carga_Fechas_Solicitud_Aprueba.php',
								data: {Solicitud: document.getElementById("idSolicitud").value},
								type: 'POST',
								async: false,
								success: function(data) {
									data = JSON.parse(data);

									$("#Motivo_Solicitud").append(data['MotivoViaje']);
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


							$(document).ready(function()
							{
								var Numero = 0;
								$("#EnvioModificacion").click(function(){
									if(Numero == 0)
									{
										$("#submit").hide();
										$("#Rechaza").hide();
										$(".Modificar").show();
										alert("Seleccione los campos que el Solicitante debera modificar.. Luego vuelva a clicker el boton modificar");
									}
									else
									{
										var elementos = $("#idSolicitud").val()+"&fs="+$("#FS").prop("checked")+"&hs="+$("#HS").prop("checked")+"&fr="+$("#FR").prop("checked")+"&hr="+$("#HR").prop("checked")+"&ts="+$("#TS").prop("checked")+"&tc="+$("#TC").prop("checked")+"&mo="+$("#Mo").prop("checked");
										var popup = window.open("Formulario_Reenvio_Modificacion.php?p="+elementos, "Reenvio formulario a SOlicitante", 'width=1000,height=400');
										popup.focus();
									}
									Numero++;
								});

								$("#Rechaza").click(function(){

									$("#submit").hide();
									$("#EnvioModificacion").hide();

									var popup = window.open("Formulario_Rechaza_Solicitud.php?p="+$("#idSolicitud").val(), "Seleccion de vehiculos", 'width=1000,height=400'); 	
									popup.focus();
								});

							});
</script>
</body>