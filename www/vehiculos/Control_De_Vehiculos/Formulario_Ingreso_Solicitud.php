<?php
session_start();
if(!isset($_SESSION['username']) || empty($_SESSION['username']))
{
	echo "<script>alert('Debe inicial secion para poder acceder al sistema'); location.replace('../SistemaLogueo');</script>";
}
else
{
	require('conexion/conexion.php');
	$idUsuario = $_SESSION['username'];
}

$sql = "
SELECT
([u].[nombre1] + ' ' + [u].[apellidop]) AS Solicitante,
[d].[nombre_dependencia],
[d].[id_dependencia]
FROM
[syslogin].[dbo].[Tusuario] AS [u]
INNER JOIN [syslogin].[dbo].[dependencia] AS [d] ON [d].[id_dependencia] = [u].[id_dependencia]
WHERE 
id_usu = $idUsuario";

$result = sqlsrv_query($conn, $sql);

if($result)
{
	$row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
}
?>
<body>
	


	<!-- <div id = "ploader" style = "margin-left: -17%; width: 100%; height: 110%; position: absolute; z-index: 100000; background: hsla(0, 2%, 90%, 0.5);"><div class="loader"></div></div> -->
      <link rel="stylesheet" type="text/css" href="Date/src/DateTimePicker.css" />
      <script type="text/javascript" src="Date/demo/jquery-1.11.0.min.js"></script>
      <script type="text/javascript" src="Date/src/DateTimePicker.js"></script>
	<div id = "ploader" style = " width: 100%;  position: absolute; z-index: 100000; background: hsla(0, 2%, 90%, 0.5);"><div class="loader"></div></div>
	<h1 id="logo"><div style="background-color: #33CCFF; width:101%;">&nbsp;</div>
			</h1>
	<form id = "LeForme" method="POST" enctype="multipart/form-data" style = "position: relative;  width:72%;margin-left:72px; height: 100%;  display: inline-block;">
		
		<div id="container" style="  background:#FFFFF; width:100%;">

			
			<table class=" table-condensed" style = "width: 100%; " >
				<tr>
					<td width="100%" style="font-size:15px;text-align: right;">
						<center>		<h2>Solicitud de Vehiculos</h2></center>
						<label >Fecha:  <?php date_default_timezone_set("America/Guatemala"); echo date("d-m-Y"); ?></label>
					</td>
				</tr>
				<tr>
					<td >
						<label class = "desc" for = "Solicitante">Tipo de solicitud<font color="red">**</font></label>
						<br>
						<tr>
							<td width="42%" >
								<input name="TipoSolicitud" id = "IdaEsperaRegreso" type = "radio" value = "1" required/>
								<label>Completa (Ida, Espera, Regreso)</label>
							</td>
							<td width="20%" >
								<input name="TipoSolicitud" id = "IdaRegreso" type = "radio" value = "2"/>
								<label>Ida y regreso</label>
							</td>
							<td width="14%" >
								<input name="TipoSolicitud" id = "Ida" type = "radio" value = "3"/>
								<label>Solo Ida</label>
							</td>
							<td width="20%" ><input name="TipoSolicitud" id = "Regreso" type = "radio" value = "4"/>
								<label>Solo regreso</label>
							</td>
						</tr>
					</td>
				</tr>
				<br>
				<tr >
					<td  style = "width:15%;color: #000000; height:100%">
						<label class = "desc" for = "Solicitante">Solicitante<font color="red">**</font>
						</label>
					</td>

					<td width="30%" style="font-size:0.8em;" id = "Solicitante"><?php echo $row['Solicitante']; ?>
						<input type = "hidden" name = "idSolicitante" value = "<?php echo $idUsuario; ?>"/>
					</td>

					<td width="18%" style = "color: #000000;" >
						<label class = "desc" for = "Dependencia">Dependencia<font color="red">**</font>
						</label>
					</td>
					<td width="30%"  style="font-size:0.8em;" id = "Dependencia" ><?php echo $row['nombre_dependencia']; ?>
						<input type = "hidden" name = "idDependencia" value = "<?php echo $row['id_dependencia']; ?>"/>
					</td>
				</tr>
				<tr class = "SpaceSalida" id = "trEspace1" >
					<td>&nbsp;</td>
				</tr>
				<tr class = "SpaceSalida" id = "trSalidaSolicitud"  width="100%" height="40px">

				</tr>
				<tr class = "SpaceRegreso" id = "trEspace2">
					<td>&nbsp;</td>
				</tr>
				<tr class = "SpaceRegreso" id = "trRegresoSolicitud"  width="100%" height="40px">             
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
			</table>
			<table id = "cae_direcciones" width="100%" >
				<tr >
					<td width="29%"><label class = "desc" for = "Departamento">Departamento<font color="red">**</font></label><br>

						<select  class="form-control" style="width:90%"  id = "Departamento" name = "Departamento" required>
							<option    value = "0">--Seleccione una opcion--</option>
						</select>

					</td>
					<td width="29%" ><label class = "desc" for = "Municipio">Municipio<font color="red">**</font></label><br>

						<select class="form-control" style="width:100%" id = "Municipio" name = "Municipio" required>
							<option   value = "0" >--Seleccione una opcion--</option>
						</select>
					</td>
					<td width="35%"><label class = "desc" for = "Direccion">Direccion<font color="red">**</font></label><br>

						<input  class="form-control" style="width:100%" type = "text" id = "Direccion" name = "Direccion" required/>
					</td>
				</tr>
			</table>
			<table>
				<tr>
					<td>
						<br>
						<br>

						<div id="Direcciones"></div>
						<input type = "button" id= "agregarCampo" value = "Agregar Direccion" class="btn btn-primary"/>
						<label>&nbsp;&nbsp;&nbsp;&nbsp;</label>
						<input type = "button" id = "EliminarCampo" value = "Eliminar Direccion" class="btn btn-primary"/>
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
			</table>

		<div id="dtBox"></div>
				<tr>
					<td>
						<label class = "desc" for = "Motivo">Motivo de la solicitud (Maximo 500 caracteres)<font color="red">**</font> </label>
					</td>
					<td>&nbsp;</td>
					<!-- <td><input type = "button" value = "Buscar direccion" id = "BuscarDireccion" class="btn btn-danger"/></td> -->
				</tr>
				<tr >
					<td style="width:96%" >
						<textarea   class="form-control" style="width:100%"  id="Motivo" name="Motivo" class="field textarea medium" spellcheck="true" rows="4" abindex="6"placeholder = "Ingrese el motivo de la solicitud" required maxlength = "500"></textarea>			
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td><input name="submit" id = "leEnvia" type = "button" value = "Enviar Solicitud" class="btn btn-info"/>
					</td>
				</tr>
	

			</table>
<!-- 						<div id="pie3" > 
							<p><center><span id="tit">SOLICITUD DE VEHICULO DIACO</span></center> </p>
							<p align="center">  &copy; 2017 <a href="http://www.diaco.gob.gt">Dirección de Atención y Asistencia al Consumidor</a></p>
						</div> -->
		</div>
	</form>
	<style>

	td
	{

		display: inline-block;
	}
	#pie3

	{	
		margin-top: 41px;
		font-size:12px;
		/*width:100%;*/
		height:80px;
		font-family:"Segoe UI";
		font-style:normal;
		font-color: white;
		border-top-color:black;
		background:#005588;
		color:#FFFFFF;

	}		
	.loader {
		border: 16px solid #ffffff; /* Light grey */
		border-top: 16px solid #005588; /* Blue */
		border-radius: 50%;
		width: 120px;
		height: 120px;
		animation: spin 2s linear infinite;
		margin-left: 35%;
		margin-top: 20%;
	}
	.fila{
		width: 15%;
		margin: 5px;
	}

	.input2{
		margin-left: 10px;
		margin-right: 30px;
		padding-left: 50px;
	}

	@keyframes spin {
		0% { transform: rotate(0deg); }
		100% { transform: rotate(360deg); }
	}
	</style>

	<script type='text/javascript' src="js/jquery.form.js"></script>

	<script>	



	$("#ploader").hide();

	$.ajax({
		url: 'PHP/Carga_Departamento.php',
		async: false,
		success: function(data)
		{
			$("#Departamento").empty();
			$("#Departamento").append(data);
		}
	});
//		$("#Departamento").append("PHP/Carga_Departamento.php");

$(document).ready(function(){

	$("#leEnvia").click(function(){
		$("#ploader").show();
		$("#LeForme").ajaxSubmit({
			url: 'PHP/Ingreso_Solicitud.php', 
			type: 'POST',
			aynci: false,
			success: function(data){

				if(data === "true")
				{

					$("#cont").load("Muestro_NoSolicitud.php");
				}
				else
				{	

					$("#ploader").hide();
					$("#cont").load("Muestro_NoSolicitud.php");
				}
			}					
		});
	});

	$("#Departamento").change(function(){
		$.ajax({
			url: 'PHP/Carga_Municipio.php',
			type: 'POST',
			data: {idDepartamento: $("#Departamento").val()},
			async : false,
			success: function(data)
			{
				$("#Municipio").empty();
				$("#Municipio").append(data);
			}
		});
	});


	$("#IdaEsperaRegreso").click(function()
	{
		$("#trSalidaSolicitud").empty();
		$("#trRegresoSolicitud").empty();
		$("#trSalidaSolicitud").append('<td class="fila"><label class="desc" for = "Fecha_Salida">Fecha Salida<font color="red">**</font></label></td><td class="input2"><input type = "text" data-field="date" id = "Fecha_Salida"  name = "Fecha_Salida" required value=""></td><td class="fila"><label class = "desc" for ="Hora_Salida">Hora Salida<font color="red">**</font></label></td><td class="input2"><input type = "text" data-field="time" id = "Hora_Salida" name = "Hora_Salida" required /></td>');
		$("#trRegresoSolicitud").append('<td class="fila"><label class = "desc" for = "Fecha_Regreso">Fecha Regreso<font color="red">**</font></label></td><td class="input2"><input type = "text"   data-field="date" id = "Fecha_Regreso" name = "Fecha_Regreso" required /></td><td class="fila"><label class = "desc" for = "Hora_Regreso">Hora Regreso<font color="red">**</font></label></td><td class="input2"><input type = "text"  data-field="time" id = "Hora_Regreso" name = "Hora_Regreso" required /></td>');
	});

	$("#IdaRegreso").click(function(){
		$("#trSalidaSolicitud").empty();
		$("#trRegresoSolicitud").empty();
		$("#trSalidaSolicitud").append('<td class="fila"><label class="desc" for = "Fecha_Salida">Fecha Salida<font color="red">**</font></label></td><td class="input2"><input type = "text"  data-field="date" id = "Fecha_Salida" name = "Fecha_Salida" required /></td><td class="fila"><label class = "desc" for ="Hora_Salida">Hora Salida<font color="red">**</font></label></td><td class="input2"><input type = "text" id = "Hora_Salida" data-field="time" name = "Hora_Salida" required /></td>');
		$("#trRegresoSolicitud").append('<td class="fila"><label class = "desc" for = "Fecha_Regreso">Fecha Regreso<font color="red">**</font></label></td><td class="input2"><input type = "text" id = "Fecha_Regreso" data-field="date" name = "Fecha_Regreso" required /></td><td class="fila"><label class = "desc" for = "Hora_Regreso">Hora Regreso<font color="red">**</font></label></td><td class="input2"><input type = "text" id = "Hora_Regreso" data-field="time" name = "Hora_Regreso" required /></td>');
	});

	$("#Ida").click(function(){
		$("#trSalidaSolicitud").empty();
		$("#trRegresoSolicitud").empty();
		$("#trSalidaSolicitud").append('<td class="fila"><label class="desc" for = "Fecha_Salida">Fecha Salida<font color="red">**</font></label></td><td class="input2"><input data-field="date" type = "text" id = "Fecha_Salida" name = "Fecha_Salida" required /></td><td class="fila"><label class = "desc" for ="Hora_Salida">Hora Salida<font color="red">**</font></label></td><td class="input2"><input type = "text" id = "Hora_Salida"  data-field="time" name = "Hora_Salida" required /></td>');
	});

	$("#Regreso").click(function(){
		$("#trSalidaSolicitud").empty();
		$("#trRegresoSolicitud").empty();
		$("#trRegresoSolicitud").append('<td class="fila"><label class = "desc" for = "Fecha_Regreso">Fecha Regreso<font color="red">**</font></label></td class="input2"><td><input data-field="date" type = "text" id = "Fecha_Regreso" name = "Fecha_Regreso" required /></td><td class="fila"><label class = "desc" for = "Hora_Regreso">Hora Regreso<font color="red">**</font></label></td><td class="input2"><input type = "text" id = "Hora_Regreso"  data-field="time" name = "Hora_Regreso" required /></td>');
	});	

	var x = 1;
	$("#agregarCampo").click(function(){
		if(x <= 2){
			$("#cae_direcciones").append('<tr id = "'+x+'" class = "diralter"><td width="29%"><label class = "desc" for = "Departamento'+x+'">Departamento<font color="red">**</font></label><select  style="width:90%" class = "departamentoo form-control" id = "Departamento'+x+'" name = "Departamento'+x+'" required ><option value = "0">--Seleccione una opcion--</option></select></label></td><td width="29%"><label  style="width:100%" class = "desc" for = "Municipio'+x+'">Municipio<font color="red">**</font></label><select class="form-control" id = "Municipio'+x+'" name = "Municipio'+x+'" required ><option value = "0">--Seleccione una opcion--</option></select></td><td width="35%"><label class = "desc" for = "Direccion'+x+'">Dirección<font color="red">**</font></label><input  class="form-control" style="width:100%" type = "text" id = "Direccion'+x+'" name = "Direccion'+x+'" required /></td></tr>');
			var depa = "#Departamento" + x;
			$.ajax({
				url: 'PHP/Carga_Departamento.php',
				async: false,
				success: function(data)
				{
					$(depa).empty();
					$(depa).append(data);
				}
			});

			x++;
		}
	});

	 $(document).ready(function()
      {
        $("#dtBox").DateTimePicker();
      });


$("#EliminarCampo").click(function(){
	if(x > 0){
		x--;
		var contenedor = "#"+x;
		$(contenedor).remove();
	}

});


$("#cae_direcciones").on("change",".departamentoo", function(){
	var identidad = $(this);
	$.ajax({
		url: 'PHP/Carga_Municipio.php',
		type: 'POST',
		data: {idDepartamento: identidad.val()},
		async : false,
		success: function(data)
		{
			var mun = "#Municipio" + identidad.closest('tr').attr('id');
			$(mun).empty();
			$(mun).append(data);
		}
	});
});

$("#BuscarDireccion").click(function()
{
	var Direcciones = $("#Departamento option:selected").text().split(" ").join("%20")+","+$("#Municipio option:selected").text().split(" ").join("+")+","+$("#Direccion").val().split(" ").join("%20");
	$("#Mapas").empty();
	$("#Mapas").append('<iframe width="160%" height="350" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/search?q='+Direcciones+'&key=AIzaSyA7vC3XxdT72YAVZowxU5LI3L1nxJ5sxXo" allowfullscreen></iframe>');
});



});
</script>


</body>
