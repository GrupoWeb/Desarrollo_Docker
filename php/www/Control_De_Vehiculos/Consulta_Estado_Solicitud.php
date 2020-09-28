<body>
	<form action="#" method="POST" enctype="multipart/form-data" name="form1" style = "position: relative;  width:80%;  display: inline-block;">
            <center><h2>Estado de la Solicitud</h2></center>
			<div  style="width:70%; position: relative; display: inline-flex;">
			<table id="Contenido_Solicitud" class="table2" style = "width: 100%; position:relative;">
			</table>
			
				<table class="table" style="width:10%;">
					<tr>
						<td id = "msAprueba">
							<i class="fa fa-clock-o" style="font-size:32px; color:hsl(0, 60%, 50%);"></i><label>En espera de Aprobacion</label>
						</td>
					</tr>
					<tr>
						<td id = "msAutoriza">
							<i class="fa fa-clock-o" style="font-size:32px; color:hsl(55, 100%, 50%);"></i><label>En espera de Autorizacion</label>
						</td>
					</tr>
					<tr>
						<td id = "msAutorizada">
							<i class="fa fa-clock-o" style="font-size:32px; color:hsl(120, 60%, 50%);"></i><label>Autorizada</label>
						</td>
					</tr>
					<tr>
						<td id = "msSinPiloto">
							<i class="fa fa-clock-o" style="font-size:32px; color:hsl(240, 60%, 50%);"></i><label>Asignacion de Vehiculo sin Piloto (Click para reenviar formulario)</label>
						</td>
					</tr>
					<tr>
						<td id = "msModifica">
							<i class="fa fa-clock-o" style="font-size:32px; color:hsl(180, 60%, 50%);"></i><label>Solicitud en espera(Debe modificar campos, click para modificar formulario)</label>
						</td>
					</tr>
					<tr>
						<td id = "msCongela"> 
							<i class="fa fa-clock-o" style="font-size:32px; color:hsl(280, 60%, 50%);"></i><label>Solicitud Congelada(Problemas con el Vehiculo Asignado)</label>
						</td>
					</tr>
				</table>
			</div>
		</form>
		<script>
						
			$("#msAprueba").hover(function() {
				$(this).css('cursor','pointer').attr('title', 'La solicitud a ingresado correctamente y se encuentra en espera de ser aprobada');
			}, function() {
				$(this).css('cursor','auto');
			});
			
			$("#msAutoriza").hover(function() {
				$(this).css('cursor','pointer').attr('title', 'La solicitud a sido aprobada y se encuentra en espera de ser autorizada');
			}, function() {
				$(this).css('cursor','auto');
			});
			
			$("#msAutorizada").hover(function() {
				$(this).css('cursor','pointer').attr('title', 'Se a seleccionado un vehiculo para la solicitud y se encuentra lista para marchar');
			}, function() {
				$(this).css('cursor','auto');
			});
			
			$("#msSinPiloto").hover(function() {
				$(this).css('cursor','pointer').attr('title', 'Se le a seleccionado un vehiculo sin piloto, debera confirmar que usted sera el piloto para esa solicitud, para ello clickee el icono (reloj) color azul que se encuentra a un lado de la solicitud');
			}, function() {
				$(this).css('cursor','auto');
			});
			
			$("#msModifica").hover(function() {
				$(this).css('cursor','pointer').attr('title', 'Se le pide al usuario que clickee el icono (reloj) color celeste para modificar los campos indicados y poder procegir con el proceso de la solicitud');
			}, function() {
				$(this).css('cursor','auto');
			});
			
			$("#msCongela").hover(function() {
				$(this).css('cursor','pointer').attr('title', 'Se a congelado la solicitud debido a que el vehiculo no se encuentra con todas sus herramientas');
			}, function() {
				$(this).css('cursor','auto');
			});
		</script>
		
    <style>
   
 .table2 {     font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
    font-size: 10px;    width: 100%; text-align: center;    border-collapse: collapse; }

 .table2 th {     font-size: 12px;     font-weight: normal;     padding: 7px;     background: #b9c9fe;
    border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039; }

 .table2 td {    padding: 13px;     background: #e8edff;     border-bottom: 1px solid #fff;
    color: #669;    border-top: 1px solid transparent; }

.table2 tr:hover td { background: #d0dafd; color: #339; }




</style>
<script type='text/javascript' src="js/jquery.min.js"></script> 
	<script type='text/javascript' src="js/jquery.dataTables.min.js"></script>
	 <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
		<script>
			$.ajax({ url: 'PHP/Consulta_Estado_Solicitud.php',
        		type: 'POST',
				async: false,
        		success: function(data) {
                    $("#Contenido_Solicitud").append(data);
					$("#Contenido_Solicitud").DataTable({
        				"language": {
			            	"url": "js/Spanish.json"
        				}
					});
        		}
			});
			
			$(document).ready(function(){
				$("#Contenido_Solicitud").on("click", ".mouseBlue", function(){
					var str = this.id;
					var slr = this.getAttribute("name").split(" ").join("%20");
                    $("#cont").load("Formulario_Reenvio_Solicitud.php?Solicitud="+str+"&Solicitante="+slr);
				});
          
				$("#Contenido_Solicitud").on("click", ".mouseBlueSky", function(){
					var str = this.id;
					var slr = this.getAttribute("name").split(" ").join("%20");
                   	$("#cont").load("Formulario_Modificacion.php?Solicitud="+str+"&Solicitante="+slr);
				});
          	});
		</script>
</body>