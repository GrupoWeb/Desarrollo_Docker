<?php 
	header('Content-Type: application/json');
	$id = $_GET['idVehiculo'];	
?>
	<link rel="stylesheet" href="css/custom.css">
	<script src="datatables/table/datatables.js"></script>
	<script src="datatables/table/fonts.js"></script>
	<script src="datatables/table/pdfmake.js"></script>
	<link rel="stylesheet" href="datatables/table/datatables.css">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="js/controles/TListaRetornoMantenimiento.js"></script>
<body>
	<div class="container containerr">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<form id="Vretorno">
						<legend>Retorno de Servicio</legend>
						<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 car">
								<i class="fa fa-car" aria-hidden="true"></i>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
								<table id="tableReturn" border="1" class="table ">
								</table>
						</div>
						<button type="submit" class="btn btn-primary">Enviar</button>
				</form>
			</div>
		</div>
	</div>
</body>
<script>
$(document).ready(function () {
	let vehiculo = "<?php echo $id; ?>";
	CargarData(vehiculo,'#tableReturn');
})

RetornoVehiculo('#Vretorno');
</script>
