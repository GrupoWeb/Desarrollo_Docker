<?php
$Cod_Solicitud = $_GET['Solicitud'];
$stSolicitante = $_GET['Solicitante'];
?>

<body>

<!-- Llamado a css y js -->
	<link rel="stylesheet" href="css/cssControl/cssControl.css">
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">


<link rel="stylesheet" href="bootstrap/css/jquery.fileupload.css">
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->

<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="bootstrap/js/vendor/jquery.ui.widget.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="bootstrap/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="bootstrap/js/jquery.fileupload.js"></script>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
<!-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->

<!-- <script src="http://malsup.github.com/jquery.form.js"></script>  -->

	<!-- <div id = "ploader" style = "margin-left: -17%; width: 100%; height: 110%; position: absolute; z-index: 100000; background: hsla(0, 2%, 90%, 0.5);"><div class="loader"></div></div> -->

<form  id="retorno">
		<div class="container">
				<div class="tabla" >
					<table class="table table-striped table-bordered">
						<thead >
							<tr>
								<th scope="row" colspan=4 class="encabezado">Retorno de Vehiculos</th>
							</tr>
						</thead>
						<tbody >
							<tr>
								<td class="titulo">No. Solicitud:</td>
								<td class="dato">
									<?php echo $Cod_Solicitud; ?>
									<input type = "hidden" id = "idSolicitud" name = "idSolicitud" value = "<?php echo $Cod_Solicitud; ?>"/>
								</td>
								<td class="titulo">Municipio</td>
								<td id="municipio"></td>
							</tr>
							<tr>
								<td class="titulo">Departamento:</td>
								<td id="Departamento"></td>
								<td class="titulo">Dirección:</td>
								<td id="direccion"></td>
							</tr>
							<tr>
								<td class="titulo">Solicitante:</td>
								<td class="dato">
									<?php echo $stSolicitante; ?>
								</td>
								<td class="titulo">
									Kilometraje de Regreso: ***
								</td>
								<td class="dato">
									<input class="form-control" style="width:75%;border:1px solid #000;" type = "text" id = "KMRegreso" name = "KMRegreso" required/>
								</td>
							</tr>
							<tr>
								<td class="titulo">Aprobador:</td>
								<td id = "Aprobador" class="dato"></td>
								<td class="titulo" >
									Observaciones:
								</td>
								<td class="dato">
									<textarea rows="2" cols="20" class="form-control" style="border:1px solid #000;"type = "text" id = "ObRegreso" name = "ObRegreso" /></textarea>
								</td>
							</tr>
							<tr>
								<td class="titulo">Autorizador:</td>
								<td id = "Autorizador" class="dato"></td>
								<td class="titulo">
									Kilometro Total:
								</td>
								<td class="dato">
									<label id = "KMTotal">--Kilometraje Total--</label>
								</td>
							</tr>
							<tr>
								<td class="titulo">Fecha Solicitud:</td>
								<td id = "Fecha_Solicitud" class="dato"></td>
								<td class="dato">
									<input type = "submit" id = "submit2" value = "Verificar Solicitud" class="btn btn-success"/>
								</td>
								<td class="dato">
									<input type = "button" id = "printurl" value = "Imprimir constancia de solicitud"  class="btn btn-success"/>
								</td>
							</tr>
							<tr>
								<td class="titulo">Hora Solicitud:</td>
								<td id = "Hora_Solicitud" class="dato"></td>
								
							</tr>
							<tr>
								<td class="titulo"> Fecha Salida:</td>
								<td id = "Fecha_Salida" class="dato"></td>

							</tr>
							<tr>
								<td class="titulo">Hora Salida:</td>
								<td id = "Hora_Salida" class="dato"></td>

							</tr>
							<tr>
								<td class="titulo">Fecha Regreso:</td>
								<td id = "Fecha_Regreso" class="dato"></td>

							</tr>
							<tr>
								<td class="titulo">Hora Regreso:</td>
								<td id = "Hora_Regreso" class="dato"></td>
							</tr>
							<tr>
								<td class="titulo">Placas:</td>
								<td id = "Vehiculo" class="dato"></td>
							</tr>
							<tr>
								<td class="titulo">Piloto:</td>
								<td id = "Piloto" class="dato"></td>
							</tr>
							<tr>
								<td class="titulo">Tipo Comision:</td>
								<td id = "Tipo_Solicitud" class="dato"></td>
							</tr>
							<tr>
								<td class="titulo">Motivo:</td>
								<td id = "Motivo_Solicitud" class="dato" ></td>
							</tr>
							<tr>
								<td class="titulo">Comision:</td>
								<td id = "Tipo_Comision"class="dato"></td>
							</tr>
							<td>
								<td  style="padding:5px 5px 5px 5px; " >
									<input type="hidden" id="idpiloto" name="idpiloto" value="" >
								</td>
							</tr>
						</tbody>
					</table>
				</div>
		</div>
</form>
	<script>
		$(document).ready(function(){
			$("#submit2").click(function () {
				Enviar("#retorno");
			})
			$("#printurl").click(function(){
				Imprimir();
			})
		});
		$("#submit").show();
		$("#printurl").hide();

		$.ajax({ url: 'PHP/Carga_Info_Vehiculo_Verificado.php',
        	data: {Solicitud: document.getElementById("idSolicitud").value},
        	type: 'POST',
			async: false,
        		success: function(data) {
					data = JSON.parse(data);

					$("#Aprobador").append(data['strAprobador']);
					$("#Autorizador").append(data['strAutorizador']);
					$("#Vehiculo").append(data['iPlaca']);
					$("#Piloto").append(data['strPiloto']);
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
					$("#idpiloto").val((data['idVehiculo']));


           	}
		});

		$.ajax({
			url: 'PHP/Carga_Direcciones.php',
			data: {idSolicitud: $("#idSolicitud").val()},
			type: 'POST',
			success: function(data){
				data = JSON.parse(data);
				$("#Departamento").append(data['strDepartamento']);
				$("#municipio").append(data['strMunicipio']);
				$("#direccion").append(data['strDireccion']);
			}
		});



			$("#KMRegreso").keyup(function(){
				$.ajax({
					url: 'PHP/KM_Regreso.php',
					data: {KMRegreso: $("#KMRegreso").val(), idSolicitud: $("#idSolicitud").val()},
					type: 'POST',
					async: false,
					success: function(data){
						$("#KMTotal").empty();
						$("#KMTotal").append(data);
					}
				});
			});


function Enviar(formulario) {
		$(formulario).submit(function (e) {
		e.preventDefault();
		var datos = $(formulario).serialize();
		console.log(datos);
		$.ajax(
			{
				type: "POST",
				url: 'PHP/Verifica_Solicitud.php',
				data: datos,
				success: function (r) {
					if (r == "true") {
						alert("Solicitud Verificada Correctamente.");
						$('#KMRegreso').prop('readonly', true);
						$('#chequea').prop('readonly', true);
						$("#printurl").show();
						$("#submit2").hide();
					} else {
						alert("Error al retornar vehiculo"); 
						alert(data);
					}
				}
			})
		})
}

function Imprimir() {
	var printWindow = window.open( "Reportes/ImpresionEntrada.php?p=" + $("#idSolicitud").val(), 'Print');
				//var printWindow = window.open( "impresion.php?p=" + $("#idSolicitud").val(), 'Print');
				//var printWindow = window.open( "Reportes/impresionVehiculos.php?p=" + $("#idSolicitud").val(), 'Print');
	printWindow.focus();
	printWindow.addEventListener('load', function(){
	printWindow.print();
	//printWindow.close()
	//( "ImprecionSolicitudFinalizada.php?p=" + $("#idSolicitud").val(), 'Print');;
	}, true);
	$('#cont').load("Verificar_Solicitud.php");
}

	</script>
</body>