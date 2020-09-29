	<link rel="stylesheet" href="css/custom.css">
	<script src="datatables/table/datatables.js"></script>
	<script src="datatables/table/fonts.js"></script>
	<script src="datatables/table/pdfmake.js"></script>
	<link rel="stylesheet" href="datatables/table/datatables.css">
	
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="js/controles/TListarMantenimiento.js"></script>
<body> 
	<div class="container containerr">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<form id="PostMantenimiento">
				<h2>Ingreso de Servicio de Mantenimiento</h2>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="row">
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<label for="nVehiculo">Vehiculo:</label>
							<input onClick="CargarVehiculos();" type="button"  id="nVehiculo" class="form-control buscadores" required="required" value="Buscar Vehiculo">	
							
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<label for="iServicio">Lugar Servicio:</label>
							<input onClick="CargarLugares();" type="button"  id="iServicio" class="form-control buscadores" required="required" value="Buscar Lugar">	
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<label for="Tipo_Servicio">Tipo:</label>
							<select name="Tipo_Servicio" id="Tipo_Servicio" required="required" class="form-control buscadores">
								<option value = "0">--Seleccione una opion--</option>
								<option value = "1">Servicio Mayor</option>
								<option value = "2">Servicio Menor</option>
							</select>
						</div>
					</div>
					<div class="row">
						<input type = "hidden" id = "idVehiculo" name = "idVehiculo"/>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" id="Vehiculo_Seleccionado"></div>
						<input type = "hidden" id = "idLugarServicio" name = "idLugarServicio"/>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" id="Lugar_Seleccionado"></div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<label for="iMotivo">Motivo:</label>
							
							<textarea name="iMotivo" id="iMotivo" class="form-control dmotivo" rows="8" required="required"></textarea>
						</div>
					</div>
					<div class="row" >
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 boton">
							<button type="submit" class="btn btn-default">Enviar</button>
						</div>
					</div>
				</div>
			</form>
			<div class="row cmantenimiento container-fluid">
				<table class="table table-hover" id="TMantenimiento">
					<thead>
						<tr>
							<th>Vehiculo</th>
							<th>Salida</th>
							<th>Fecha</th>
							<th>Lugar</th>
							<th>Tipo</th>
							<th>Motivo</th>
							<th>Envia</th>
							<th>Impresión</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>	
	</div>
</body>
<script>
	addServicio('#PostMantenimiento');
</script>
