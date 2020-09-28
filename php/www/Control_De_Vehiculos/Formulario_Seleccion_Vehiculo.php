<html>
<head>
	<style>
	body {font-family: Arial, Helvetica, sans-serif;}

	#Vehiculo table {     font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
	font-size: 10px;    margin: 8px;     width: 90%; text-align: center;    border-collapse: collapse; }

	#Vehiculo th {     font-size: 14px;     font-weight: normal;     padding: 7px;     background: #b9c9fe;
		border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039; }

		#Vehiculo td {    padding: 15px;     background: #e8edff;     border-bottom: 1px solid #fff;
			color: #669;    border-top: 1px solid transparent; }

			#Vehiculo tr:hover td { background: #d0dafd; color: #339; }



			#main-header {
				background: white;
				top: 0;
				position: fixed;
				z-index: 1;
			}   
			#main-header a {
				color: white;
			}





			#main-content {
				background: white;
				margin: 20px auto;
				box-shadow: 0 0 10px rgba(0,0,0,.1);
				position: relative;
				top:250px;
			}

			#main-content header,
			#main-content .content {
				padding: 40px;
			}


			#pie

			{
				width:auto;
				height:12px;


				font-size:15px;
				font-family:"Segoe UI";
				font-style:normal;
				font-color:white;
				border-top-color:black;
				background:#0099FF


			}


			#pie2

			{
				font-size:12px;
				width:800px;
				font-family:"Segoe UI";
				font-style:normal;
				font-color:black;
				border-top-color:#666666;
				background:white;
				color: black;
				right: 300cm;

			}

			#pie2

			{
				font-size:12px;
				width:900px;
				font-family:"Segoe UI";
				font-style:normal;
				font-color:black;
				border-top-color:#666666;
				background:white;
				color: black;
				right: 300cm;

			}


			#estilo1{

				background:#003399;
				width:auto;
				height:160px;


			}

			#tit

			{
				font-size:12px;
				width:auto;
				height:80px;
				font-family:"Segoe UI";
				font-style:normal;
				font-color: white;
				border-top-color:black;
				background:#999999;
				color:#FFFFFF;
				right: 300cm;

			}


			#tit
			{
				font-size:12px;
				font-family:Arial, Helvetica, sans-serif;

			}
			.Estilo8 {color: #FFFFFF}
			.Estilo9 {font-size: 14px}
			.Estilo10 {font-size: 16px}

			#clickeame{
				color: hsl(240, 80%, 40%);
			}
			</style>
			 <script type='text/javascript' src="bootstrap/jquery/jquery-3.2.1.js"></script>
	
	<!-- <script type='text/javascript' src="js/jquery.dataTables.min.js"></script>-->
			<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
			<title>Buscar Vehiculo</title></head>
			<body style="font-family: 'Segoe UI';">
				<form>
					<table id = "Vehiculo" align="center" border="1" bordercolor="#0066FF">
					</table>
					<input type = "hidden" id = "idSolicitud" name = "idSolicitud" value = "<?php echo $_GET['p']; ?>"/>
					<div>
						<!--<p>Si desea asignar un piloto a un vehiculo especifico <a id = "clickeame">[Haga click aqui]</a>.</p>-->
					</div>
					<div id = "CaeAsignacion">

					</div>
				</form>
				<script>
				$.ajax({ url: 'PHP/Carga_Vehiculo2_0.php',
					data: {idSolicitud: $("#idSolicitud").val(), FechaSalida: "<?php echo $_GET['fs'];?>", FechaRegreso: "<?php echo $_GET['fr']; ?>", HoraSalida: "<?php echo $_GET['hs']; ?>", HoraRegreso: "<?php echo $_GET['hr']; ?>"},
					type: 'POST',
					async: false,
					success: function(data) {
						$("#Vehiculo").append(data);
						$('#Vehiculo').DataTable({
							"language": {
								"url": "js/Spanish.json"
							}
						});
					}
				});

				$(document).ready(function(){

					$(".envia").click(function(){
						var txtMuestra = window.opener.document.getElementById("Vehiculo_Seleccionado");
						var txtVehiculo = window.opener.document.getElementById("idVehiculo");
						var txtPiloto = window.opener.document.getElementById("idPiloto");
						txtVehiculo.value = this.id;
						txtPiloto.value = name;
						//txtPiloto.value = $("#idPiloto").val();
						var vehiculooo = this.id;

						$.ajax({ url: 'PHP/Selecciona_Vehiculo.php',
							data: {Placa: cantidad,Name: name,IDPiloto: pilot},
							type: 'POST',
							async: false,
							success: function(data) {
								$(txtMuestra).empty();
								$(txtMuestra).append(data);
								$.ajax({
									url: 'PHP/Compruba_Gasolina.php',
									data: {idVehiculo: vehiculooo},
									type: 'POST',
									async: false,
									success: function(data){
										if(data == "true")
										{
											alert("El vehiculo se encuentra en reserva de combustible ... Se le dara la opcion de asignarle un vale para combustible");
											var gasolina = window.opener.document.getElementById("divide_gasolina");
											$(gasolina).empty()
											$(gasolina).append("Asignacion de vale de combustible<br><input type = 'text' id = 'vale_gasolina' name = 'vale_gasolina' placeholder = 'Click para asignar vale de gasolina' readonly/>")
										}
									}
								});
							}
						});
						window.close();
					});

$("#clickeame").click(function(){
	$("#CaeAsignacion").load("Formulario_Asigna_Pilototo.php");
});
});

</script>
</body>