<?php
require('conexion/conexion.php');
$Cod_Solicitud = $_GET['Solicitud'];
$stSolicitante = $_GET['Solicitante'];

$sql = "
SELECT 
[BK].[ftKM_Actual],
[BK].[ftKM_Proximo_Servicio]
FROM 
[dbo].[tbKM_Vehiculo_Soloicitud] AS [KS]
INNER JOIN [dbo].[tbBitacora_Kilometraje] AS [BK] ON [BK].[idVehiculo] = [KS].[idVehiculo] 
WHERE
[idSolicitud] = $Cod_Solicitud
AND [BK].[bActivo] = 1";

$result = sqlsrv_query($conn, $sql);

if($result)
{
	$row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
}
?>
<body>
	<form style="width:100%;">
		<div id="container"  style="width:100%;">

			<h1 id="logo"><div style="background-color: #33CCFF; width:100%;">&nbsp;</div>

				<h2>Confirmacion de Solicitud </h2>
				<table  class="table" id="confirmar" style="width:80%; ">
					<tr>
							<td style = "background: #339999; color: #FFFFFF;width:15%;" >No. Solicitud:</td>
							<td style = "width:15%;"><?php echo $Cod_Solicitud; ?>
								<input type = "hidden" id = "idSolicitud" value = "<?php echo $Cod_Solicitud; ?>"/></td><td  style = "background: #339999; color: #FFFFFF; width:15%;">Aprobador:</td>
								<td style = "width:15%;" id = "Aprobador"></td>
					</tr>
						<tr>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td style = "background: #339999; color: #FFFFFF;width:15%;">Autorizador:</td><td id = "Autorizador"></td>
						</tr>
						<td>&nbsp;</td>
						<tr>
						</tr>
						<td style = "background: #339999; color: #FFFFFF;width:15%;" >Solicitante:<td id = "sSolicita"></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
				<div id = "Direcciones">

				</div>
					<tr>
						<td style = "background: #339999; color: #FFFFFF;width:15%;" >Vehiculo:</td> <td style="width:15%;" id = "Vehiculo"></td>
						<td style = "background: #339999; color: #FFFFFF;width:15%;" >
							<label>Kilometraje Actual del vehiculo</label>
						</td>
						<td style="width:15%;">
							<label ><?php echo $row['ftKM_Actual']; ?> KM.</label>
						</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td style = "background: #339999; color: #FFFFFF;width:15%;">Tipo Solicitud:<td style="width:15%;" id = "TipoSolicitud"></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td style = "background: #339999; color: #FFFFFF;width:15%;">Tipo de comision:<td style="width:15%;" id = "TipoComision"></td>
					</tr>
			</table>
		<div style = "width: 100%" align="center"><input name="button" type = "button" id = "EnviaFormulario" value = "Confirmar Solicitud" class="btn btn-success btn-lg"/></div>

		</div>
	</div>
</form>
<style>

</style>
<script>

$("#EnviaFormulario").show();

$.ajax({ 
	url: 'PHP/Carga_Fechas_Solicitud_Confima.php',
	data: {Solicitud: $("#idSolicitud").val()},
	type: 'POST',
	async: false,
	success: function(data) {
		data = JSON.parse(data);
		$("#Aprobador").append(data['strAprobador']);
		$("#Autorizador").append(data['strAutorizador']);
		$("#Fecha_Solicitud").append(data['dFecha_Solicitud']);
		$("#Hora_Solicitud").append(data['hHora_Solicitud']);
		$("#Fecha_Salida").append(data['dFecha_Salida']);
		$("#Hora_Salida").append(data['hHora_Salida']);
		$("#Fecha_Regreso").append(data['dFecha_Regreso']);
		$("#Hora_Regreso").append(data['hHora_Regreso']);
		$("#Direccion").append(data['strDireccion']);
		$("#Vehiculo").append(data['iPlaca']);
		$("#TipoSolicitud").append(data['strTipo_Solicitud']);
		$("#TipoComision").append(data['strTipo_Comision']);
		$("#sSolicita").append(data['strSolicitante']);			
	},
	error: function(data){
		alert(data);
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
	$("#EnviaFormulario").click(function(){
		$.ajax({
			url: 'PHP/Confirma_Solicitud_Piloto.php',
			data: {idSolicitud: $("#idSolicitud").val()},
			type: 'POST',
			async: false,
			success: function(data){
				alert(data);
				$("#cont").load("verSolicitudesPendientes.php");
			},
			error: function(){
				alert(data);
			}
		});
	});

	$("#Herramientas").click(function(){
		$.ajax({
			url: 'PHP/Comprueba_Herramientas.php',
			data: {Llanta: $("#Llanta").prop("checked"), Tricket: $("#Tricket").prop("checked"), Llave: $("#Llave").prop("checked"), Tarjeta: $("#Tarjeta").prop("checked"), Extinguidor: $("#Estinguidor").prop("checked"), Triangulo: $("#Triangulo").prop("checked"), Vehiculo: $("#Vehiculo").text()},
			type: 'POST',
			async: false,
			success: function(data){
				if(data == "false"){
					$.ajax({
						url: 'PHP/Congela_Solicitud_Confirma.php',
						data: {idSolicitud: $("#idSolicitud").val()},
						type: 'POST',
						async: false,
						success: function(data){
							alert(data);
							$("#cont").load("Tabla_Indes.php");
						}
					});
				}
				else
				{
					alert("El vehiculo se encuentra con todas sus herramientas");
					$("#EnviaFormulario").show();
					$("#Herramientas").hide();
				}
			},
			error: function(){
				alert("Error en ajax");
			}
		});
	});

});
</script>
</body>